<?php

namespace App\Livewire\SuperAdmin;

use App\Models\company;
use App\Models\visitor as ModelsVisitor;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Visitor extends Component
{
    use WithPagination;

    public $companyList, $companyselect = '', $browser = '', $start_date = '', $end_date = '';
    
    // KPIs
    public $totalVisitors, $uniqueVisitors, $topBrowser, $topCompany;

    // Dados para gráficos
    public $visitsByCompany = [];
    public $visitsByBrowser = [];
    public $visitsByWeekDay = [];
    public $visitsByPeriod = [];
    public $visitsByDevice = [];

    public function mount()
    {
        $this->companyList = company::orderBy('companyname', 'asc')->get();
        $this->updateKPIs();
    }

    public function updated($property)
    {
        $this->updateKPIs();
    }

    private function baseQuery()
    {
        $query = ModelsVisitor::query();

        if ($this->companyselect) {
            $query->where('company', $this->companyselect);
        }

        if ($this->browser) {
            $query->where('browser', $this->browser);
        }

        if ($this->start_date && $this->end_date) {
            $start = Carbon::parse($this->start_date)->startOfDay();
            $end = Carbon::parse($this->end_date)->endOfDay();
            $query->whereBetween("created_at", [$start, $end]);
        }

        return $query;
    }

    public function updateKPIs()
    {
        try {
            $query = $this->baseQuery();

            // KPIs gerais
            $this->totalVisitors = $query->count();
            $this->uniqueVisitors = $query->distinct('ip')->count('ip');

            $this->topBrowser = ModelsVisitor::selectRaw('browser, count(*) as total')
                ->groupBy('browser')->orderByDesc('total')->first()?->browser ?? 'N/A';

            $this->topCompany = ModelsVisitor::selectRaw('company, count(*) as total')
                ->groupBy('company')->orderByDesc('total')->first()?->company ?? 'N/A';

            // 1. Total de visitas por empresa
            $this->visitsByCompany = $this->baseQuery()
                ->select('company', 
                    DB::raw('count(*) as total_visits'), 
                    DB::raw('count(distinct ip) as unique_visits'))
                ->groupBy('company')
                ->orderByDesc('total_visits')
                ->get()
                ->toArray();

            // 2. Visitas por navegador
            $this->visitsByBrowser = $this->baseQuery()
                ->select('browser', DB::raw('count(*) as total'))
                ->groupBy('browser')
                ->get()
                ->toArray();

            // 2. Visitas por dia da semana
            DB::statement("SET lc_time_names = 'pt_PT'");
            $this->visitsByWeekDay = $this->baseQuery()
            ->select(DB::raw('DATE_FORMAT(created_at, "%W") as weekday'), DB::raw('count(*) as total'))
            ->groupBy('weekday')->get()->toArray();

            // 4. Visitas por período do dia + intervalos de hora
            $this->visitsByPeriod = $this->baseQuery()
            ->select(
                DB::raw('HOUR(created_at) as hour'),
                DB::raw('CASE 
                    WHEN HOUR(created_at) BETWEEN 6 AND 11 THEN "Manhã"
                    WHEN HOUR(created_at) BETWEEN 12 AND 17 THEN "Tarde"
                    WHEN HOUR(created_at) BETWEEN 18 AND 23 THEN "Noite"
                    ELSE "Madrugada"
                END as period'),
                DB::raw('count(*) as total')
            )->groupBy('period', 'hour')->orderBy('hour')->get()->toArray();

            // 5. Visitas por dispositivo
            $this->visitsByDevice = $this->baseQuery()
                ->select('device', DB::raw('count(*) as total'))
                ->groupBy('device')
                ->get()
                ->toArray();

        } catch (\Throwable $th) {
            \Log::error("updateKPIs", [
                "message" =>  $th->getMessage(),
                "file" =>  $th->getFile(),
                "line" =>  $th->getLine(),
            ]);
        }
    }

    public function render()
    {
        $visitors = $this->baseQuery()->latest()->get();

        return view('livewire.super-admin.visitor', [
            'visitors' => $visitors,
            'visitsByCompany' => $this->visitsByCompany,
            'visitsByBrowser' => $this->visitsByBrowser,
            'visitsByWeekDay' => $this->visitsByWeekDay,
            'visitsByPeriod' => $this->visitsByPeriod,
            'visitsByDevice' => $this->visitsByDevice,
        ]);
    }
}

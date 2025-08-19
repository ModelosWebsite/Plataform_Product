<?php

namespace App\Livewire\SuperAdmin;

use App\Models\company;
use App\Models\visitor as ModelsVisitor;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;

class Visitor extends Component
{
    use WithPagination;

    public $companyList, $companyselect = '', $browser = '', $start_date = '', $end_date = '';
    
    // KPIs
    public $totalVisitors, $uniqueVisitors, $topBrowser, $topCompany;

    public function mount()
    {
        $this->companyList = company::latest()->orderBy('companyname', 'asc')->get();
        $this->updateKPIs();
    }

    public function updated($property)
    {
        // sempre que filtro mudar, atualiza KPIs
        $this->updateKPIs();
    }

    public function updateKPIs()
    {
        try {
            $query = ModelsVisitor::query();

            if ($this->companyselect) {
                $query->where('company', $this->companyselect);
            }

            if ($this->browser) {
                $query->where('browser', $this->browser);
            }

            if ($this->start_date and $this->end_date) {
                $start = Carbon::parse($this->start_date)->startOfDay();
                $end = Carbon::parse($this->end_date)->endOfDay();
                $query->whereBetween("created_at", [$start, $end]);
            }

            $this->totalVisitors = $query->count();
            $this->uniqueVisitors = $query->distinct('ip')->count('ip');

            $this->topBrowser = ModelsVisitor::selectRaw('browser, count(*) as total')
            ->groupBy('browser')->orderByDesc('total')->first()?->browser ?? 'N/A';

            $this->topCompany = ModelsVisitor::selectRaw('company, count(*) as total')
            ->groupBy('company')->orderByDesc('total')->first()?->company ?? 'N/A';
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
        $query = ModelsVisitor::query();

        if ($this->companyselect) {
            $query->where('company', $this->companyselect);
        }

        if ($this->browser) {
            $query->where('browser', $this->browser);
        }

        if ($this->start_date) {
            $start = Carbon::parse($this->start_date)->startOfDay();
            $end = Carbon::parse($this->end_date)->endOfDay();
            $query->whereBetween("created_at", [$start, $end]);
        }

        $visitors = $query->latest()->get();

        return view('livewire.super-admin.visitor', [
            'visitors' => $visitors,
        ]);
    }
}
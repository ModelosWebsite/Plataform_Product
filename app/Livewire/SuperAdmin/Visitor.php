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

    public $companyList, $companyselect = '';
    public $browser = '';
    public $month = '';
    
    // KPIs
    public $totalVisitors;
    public $uniqueVisitors;
    public $topBrowser;
    public $topCompany;

    public function mount()
    {
        $this->companyList = company::all();
        $this->updateKPIs();
    }

    public function updated($property)
    {
        // sempre que filtro mudar, atualiza KPIs
        $this->updateKPIs();
    }

    public function updateKPIs()
    {
        $query = ModelsVisitor::query();

        if ($this->companyselect) {
            $query->where('company', $this->companyselect);
        }

        if ($this->browser) {
            $query->where('browser', $this->browser);
        }

        if ($this->month) {
            $query->whereMonth('created_at', $this->month);
        }

        $this->totalVisitors = $query->count();
        $this->uniqueVisitors = $query->distinct('ip')->count('ip');

        $this->topBrowser = ModelsVisitor::selectRaw('browser, count(*) as total')
            ->groupBy('browser')
            ->orderByDesc('total')
            ->first()?->browser ?? 'N/A';

        $this->topCompany = ModelsVisitor::selectRaw('company, count(*) as total')
            ->groupBy('company')
            ->orderByDesc('total')
            ->first()?->company ?? 'N/A';
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

        if ($this->month) {
            $query->whereMonth('created_at', $this->month);
        }

        $visitors = $query->latest()->paginate(10);

        return view('livewire.super-admin.visitor', [
            'visitors' => $visitors,
        ]);
    }
}
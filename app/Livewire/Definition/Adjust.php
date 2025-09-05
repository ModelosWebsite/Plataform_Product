<?php

namespace App\Livewire\Definition;

use App\Models\{company, Termpb, Termpb_has_Company, TermsCompany};
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Adjust extends Component
{
    public $terms, $readMytermsId, $readMyterms = [], $termsGeneral, $statusSite, $privacity, $term, $config, $company; 
    use LivewireAlert;

    public function mount()
    {
        $this->readMyterms = TermsCompany::where("company_id", auth()->user()->company_id)->first();
        $this->termsGeneral = Termpb::first();
        $this->terms = Termpb_has_Company::where("company_id", isset(auth()->user()->company_id) ? auth()->user()->company_id : "")->first();
        $this->statusSite = company::where("id", auth()->user()->company_id)->first();
    }

    public function render()
    {
        $this->mount();
        return view('livewire.definition.adjust');
    }

    //Create - save terms and privacity
    public function myConditionsCreate(){
        DB::beginTransaction();
        try {

            TermsCompany::create([
                'privacity' => $this->privacity,
                'term' => $this->term,
                'company_id' => auth()->user()->company_id
            ]);

            DB::commit();

            $this->alert('success', 'SUCESSO', [
                'toast' => false,
                'position' => 'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text' => 'Termos Criados!'
            ]);            
            
        } catch (\Throwable $th) {
            \Log::error('Error creating terms: ', [
                'message' => $th->getMessage(),
                'trace' => $th->getTraceAsString(),
                'line' => $th->getLine(),
                'file' => $th->getFile()
            ]);
            DB::rollBack();
            $this->alert('error', 'ERRO', [
                'toast' => false,
                'position' => 'center',
                'showConfirmButton' => false,
                'confirmButtonText' => 'OK',
                'text' => 'Falha na operação'
            ]);
        }
    }

    public function updateStatus()
    {
        $item = company::find(auth()->user()->company_id);
        $hasTermsPb = Termpb_has_Company::where('company_id', auth()->user()->company_id)->first();

        if ($hasTermsPb->accept === 'yes') {
            // Atualiza o estado baseado no valor do checkbox
            $item->status = $this->statusSite->status === 'active' ? 'inactive' : 'active';
            $item->update();
        }else{
            $this->alert('info', 'ATENÇÃO', [
                'toast' => false,
                'position' => 'center',
                'showConfirmButton' => false,
                'confirmButtonText' => 'OK',
                'text' => 'Deve primeiro aceitar os termos e condições'
            ]);
        }

        $this->statusSite = company::where("id", auth()->user()->company_id)->first();

        $this->alert('success', 'SUCESSO', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => false,
            'confirmButtonText' => 'OK',
            'text' => 'Estado atualizado com sucesso!'
        ]);
    }

    public function termoStatus()
    {
        try {
            $termPbs = Termpb::first();
            
            if (!$termPbs) {
                return $this->alert('error', 'ERRO', [
                    'toast' => false,
                    'position' => 'center',
                    'showConfirmButton' => false,
                    'confirmButtonText' => 'OK',
                    'text' => 'Termo não encontrado'
                ]);
            }

            if (!$this->terms) {
                $termspb_has_company = new Termpb_has_Company();
                $termspb_has_company->company_id = auth()->user()->company_id;
                $termspb_has_company->termpb_id = $termPbs->id;
    
                // Verifique se a propriedade 'accept' existe
                $accept = isset($this->terms->accept) ? $this->terms->accept : 'no'; // Valor padrão
                $termspb_has_company->accept = $accept === 'yes' ? 'no' : 'yes';
    
                $termspb_has_company->save();

                $this->alert('success', 'SUCESSO', [
                    'toast' => false,
                    'position' => 'center',
                    'showConfirmButton' => false,
                    'confirmButtonText' => 'OK',
                    'text' => 'Termos e Politicas Aceites'
                ]);
            }else{
                $termspb_has_company = Termpb_has_Company::where("company_id", auth()->user()->company_id)->first();
                // Verifique se a propriedade 'accept' existe
                $accept = isset($this->terms->accept) ? $this->terms->accept : 'no'; // Valor padrão
                $termspb_has_company->accept = $accept === 'yes' ? 'no' : 'yes';
                $termspb_has_company->update();

                $this->terms = Termpb_has_Company::where("company_id", isset(auth()->user()->company_id) ? auth()->user()->company_id : "")->first();

                $this->alert('success', 'SUCESSO', [
                    'toast' => false,
                    'position' => 'center',
                    'showConfirmButton' => false,
                    'confirmButtonText' => 'OK',
                    'text' => 'Actualizado'
                ]);
            }

        } catch (\Throwable $th) {
            $this->alert('error', 'ERRO', [
                'toast' => false,
                'position' => 'center',
                'showConfirmButton' => false,
                'confirmButtonText' => 'OK',
                'text' => 'Falha na operação'
            ]);
        }
    }

    public function loadTerms()
    {
        try {
            if ($this->readMyterms) {
                $myTerms = TermsCompany::find($this->readMyterms ?? '')->first();
                if ($myTerms) {
                    $this->privacity = $myTerms->privacity;
                    $this->term = $myTerms->term;
                }
            }
        } catch (\Throwable $th) {
            $this->alert('error', 'ERRO', [
                'toast' => false,
                'position' => 'center',
                'showConfirmButton' => false,
                'confirmButtonText' => 'OK',
                'text' => 'Falha na operação'
            ]);
        }
    }

    public function saveTerms()
    {
        DB::beginTransaction();
        try {
            
            $readMyterms = TermsCompany::find($this->readMyterms);

            if ($readMyterms) {
                $readMyterms->privacity = $this->privacity;
                $readMyterms->term = $this->term;
                $readMyterms->save();
                DB::commit();

                $this->alert('success', 'SUCESSO', 
                [
                    'toast' => false,
                    'position' => 'center',
                    'showConfirmButton' => false,
                    'confirmButtonText' => 'OK',
                    'text' => 'Termos Actualizados!'
                ]);
            }
        } catch (\Throwable $th) {
            \Log::error('Error updating terms: ', [
                'message' => $th->getMessage(),
                'trace' => $th->getTraceAsString(),
                'line' => $th->getLine(),
                'file' => $th->getFile()
            ]);
            DB::rollBack();
            $this->alert('error', 'ERRO', [
                'toast' => false,
                'position' => 'center',
                'showConfirmButton' => false,
                'confirmButtonText' => 'OK',
                'text' => 'Falha na operação'
            ]);
        }
    }
}
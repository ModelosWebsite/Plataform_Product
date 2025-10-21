<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\CustomDomain;
use App\Mail\DomainProcessing;
use Illuminate\Support\Facades\Mail;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class CustomDomainForm extends Component
{
    public $domain;
    use LivewireAlert;

    protected $rules = [
        'domain' => 'required'
    ];

    protected $messages = [
        'domain.required' => 'Dominio é obrigatorio'
    ];

    public function save()
    {
        $this->validate();
        try {
            $parsed = parse_url($this->domain, PHP_URL_HOST) ?? $this->domain;

            $record = CustomDomain::create([
                'company_id' => auth()->user()->company_id,
                'domain' => strtolower($parsed),
                'verification_token' => Str::random(12),
            ]);

            //Enviar e-mail informando o usuário
            Mail::to("pachecobarrodig3@gmail.com")
            ->send(new DomainProcessing($record));

            $this->alert('success', 'Cadastrado', [
                'toast' => false,
                'position' => 'center',
                'confirmButtonText' => 'OK',
                'showConfirmButton' => false,
            ]);

        } catch (\Throwable $th) {
            \Log::error('CustomDomain@save', [
                'message' => $th->getMessage(),
                'file' => $th->getFile(),
                'line' => $th->getLine(),
            ]);

            $this->alert('error', 'Erro Interno', [
                 'toast' => false,
                 'position' => 'center',
                 'text' => 'Ocorreu um erro ao verificar o domínio. Verifique os logs.',
            ]);
        }
    }

    public function deleteDomain($domainId)
    {
        try {
            $domain = CustomDomain::findOrFail($domainId);

            $domain->delete();

            $this->alert('success', 'Domínio eliminado!', [
                'toast' => false,
                'position' => 'center',
                'text' => "",
            ]);
        } catch (\Throwable $th) {
            \Log::error('Erro ao eliminar dominio', [
                 'erro' => $th->getMessage(),
                 'file' => $th->getFile(),
                 'line' => $th->getLine(),
             ]);

             $this->alert('error', 'Erro Interno', [
                 'toast' => false,
                 'position' => 'center',
                 'text' => 'Ocorreu um erro. Verifique os logs.',
            ]);
        }
    }

    public function verify($domainId)
    {
        try {
            $domain = CustomDomain::findOrFail($domainId);
            $host = strtolower(trim($domain->domain));
            $expectedTarget = env('APP_URL'); // domínio base
            $expectedIp = gethostbyname($expectedTarget);

            $isValid = false;
            $foundTarget = null;
            $statusMsg = '';
            $dnsChecked = false;

             // 1️⃣ Tenta obter CNAME e A records
             $recordsCname = @dns_get_record($host, DNS_CNAME);
             $recordsA = @dns_get_record($host, DNS_A);

             \Log::info('DNS Verify: Início', [
                 'host' => $host,
                 'expectedTarget' => $expectedTarget,
                 'expectedIp' => $expectedIp,
                 'recordsCname' => $recordsCname,
                 'recordsA' => $recordsA,
             ]);

             // 2️⃣ Verifica se o CNAME aponta para o domínio base
             if (!empty($recordsCname)) {
                 foreach ($recordsCname as $record) {
                     if (!empty($record['target'])) {
                         $foundTarget = strtolower(rtrim($record['target'], '.'));
                         $dnsChecked = true;
                         if ($foundTarget === strtolower($expectedTarget)) {
                            $isValid = true;
                            $statusMsg = "CNAME aponta corretamente para {$expectedTarget}";
                            break;
                         }
                     }
                 }
             }

             // 3️⃣ Se não tiver CNAME, verifica IP (A record)
             if (!$isValid && !empty($recordsA)) {
                 foreach ($recordsA as $record) {
                     if (!empty($record['ip'])) {
                         $foundTarget = $record['ip'];
                         $dnsChecked = true;
                         if ($record['ip'] === $expectedIp) {
                            $isValid = true;
                            $statusMsg = "A record aponta corretamente para o IP {$expectedIp}";
                            break;
                         }
                     }
                 }
             }

             // Atualiza status no banco
             $domain->update(['verified' => $isValid]);

             //Log final e alerta visual
             \Log::info('DNS Verify: Resultado Final', [
                 'host' => $host,
                 'foundTarget' => $foundTarget,
                 'isValid' => $isValid,
                 'statusMsg' => $statusMsg,
             ]);

             if ($isValid) {
                 $this->alert('success', 'Domínio verificado!', [
                     'toast' => false,
                     'position' => 'center',
                     'text' => "{$host} está configurado corretamente ({$statusMsg})",
                 ]);
             } else {
                 $this->alert('warning', 'Domínio ainda não configurado', [
                     'toast' => false,
                     'position' => 'center',
                     'text' => "{$host} ainda não aponta para {$expectedTarget}. Verifique o CNAME no provedor DNS.",
                 ]);
             }
         } catch (\Throwable $th) {
             \Log::error('Erro ao verificar domínio', [
                 'erro' => $th->getMessage(),
                 'file' => $th->getFile(),
                 'line' => $th->getLine(),
             ]);

             $this->alert('error', 'Erro Interno', [
                 'toast' => false,
                 'position' => 'center',
                 'text' => 'Ocorreu um erro ao verificar o domínio. Verifique os logs.',
            ]);
        }
    }

    public function render()
    {
        return view('livewire.admin.custom-domain-form', [
            'domains' => CustomDomain::query()->where("company_id", auth()->user()->company_id)->get()
        ])->layout('layouts.config.app');
    }
}
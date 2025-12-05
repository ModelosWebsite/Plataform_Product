<?php

namespace App\Livewire\Admin;

use App\Mail\VerificationCodeMail;
use App\Models\company;
use Livewire\Component;
use Illuminate\Support\Facades\{Http, Log, Mail};
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class IdentifyValidator extends Component
{
    use LivewireAlert, WithFileUploads;

    public $step = 1;

    // Representante
    public $owner, $authority, $full_name, $nif_personal, $primary_phone, $secondary_phone, $whatsapp_option, $whatsapp_number, $email_personal;

    // Documentos
    public $certificate, $certificate_issue_date, $certificate_expire_date, $idCopy, $idCopy_issue_date, $idCopy_expire_date;
    public $representative_id_copy, $representative_id_issue_date, $representative_id_expire_date;
    public $business_license, $business_license_issue_date, $business_license_expire_date;
    public $contract, $product_photos = [], $owners_id_copies = [], $procuration, $code, $codeSend;
    public $notes, $description_products;

    public function render()
    {
        return view('livewire.admin.identify-validator');
    }

    public function setWhatsapp()
    {
        $this->whatsapp_option = $this->whatsapp_option;
    }

    public function nextStep()
    {
        $this->validateStep();
        $this->step++;
        if($this->step == 4){
            $this->step = 1;
        }
        Log::info(['step' => $this->step]);
    }

    public function previousStep()
    {
        if ($this->step > 1) {
            $this->step--;
            session(['step' => $this->step]);
        }
    }

    public function validateStep()
    {
        if ($this->step == 1) {
            $this->validate(
                [
                    'full_name' => 'required|string',
                    'owner' => 'required',
                    'nif_personal' => 'required|string',
                    'primary_phone' => 'required|string',
                    'email_personal' => 'required|email',
                    'authority' => 'required',
                    'secondary_phone' => 'required',
                    'whatsapp_option' => 'required',
                ],
                [
                    'full_name.required' => 'O nome é obrigatório.',
                    'owner.required' => 'É obrigatório.',
                    'nif_personal.required' => 'O NIF é obrigatório.',
                    'primary_phone.required' => 'O número de telefone principal é obrigatório.',
                    'secondary_phone.required' => 'O número de telefone secundário é obrigatório.',
                    'email_personal.required' => 'O e-mail é obrigatório.',
                    'email_personal.email' => 'Informe um endereço de e-mail válido.',
                    'authority.required' => 'A autoridade responsável é obrigatória.',
                    'whatsapp_option.required' => 'É necessário selecionar a opção de WhatsApp.',
                ],
            );

            // Validação do NIF através de método customizado
            // try {
            //     $isValid = Request::validateTaxPayer($this->nif_personal);

            //     if (!$isValid) {
            //         $this->addError('nif_personal', 'O NIF informado é inválido.');
            //         return;
            //     }
            // } catch (\Exception $e) {
            //     $this->addError('nif_personal', 'Erro ao validar o NIF: ' . $e->getMessage());
            //     return;
            // }

        } elseif ($this->step == 2) {
            $this->validate(
                [
                    'certificate' => 'required',
                    'certificate_issue_date' => 'required|date',
                    'certificate_expire_date' => 'required|date',
                    'idCopy' => 'required',
                    'idCopy_issue_date' => 'required|date',
                    'idCopy_expire_date' => 'required|date',
                ],
                [
                    'certificate.required' => 'A certidão da empresa é obrigatória.',
                    'certificate_issue_date.required' => 'Data obrigatória.',
                    'certificate_issue_date.date' => 'Data inválida.',

                    'certificate_expire_date.required' => 'Data obrigatória.',
                    'certificate_expire_date.date' => 'Data inválida',
                    'idCopy.required' => 'A cópia do BI é obrigatória.',

                    'idCopy_issue_date.required' => 'Data obrigatória.',
                    'idCopy_issue_date.date' => 'Data inválida.',

                    'idCopy_expire_date.required' => 'Data obrigatória.',
                    'idCopy_expire_date.date' => 'Data inválida.',
                ],
            );

            $company = company::where("id", auth()->user()->company_id)->first();

            $this->code = random_int(2000, 9000);
            session()->put('keyValidation', $this->code);

            Mail::to($this->email_personal)->send(new VerificationCodeMail($this->code, $company, auth()->user()));
        } elseif ($this->step == 3) {
            //enviar email
            $this->sendValidationRequest();
            // validar
        }
    }

    public function sendValidationRequest()
    {
        try {
            // Exemplo de ficheiros (assumindo que vieram do formulário Livewire ou Request)
            $certificate = $this->certificate;
            $idCopy = $this->idCopy;
            $business_license = $this->business_license;
            $contract = $this->contract;
            $procuration = $this->procuration;
            $product_photos = $this->product_photos ?? [];
            $owners_id_copies = $this->owners_id_copies ?? [];

            // Cria a requisição multipart
            $request = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . auth()->user()->company->token_xzero ?? '',
            ]);

            // Adiciona os ficheiros principais
            if ($certificate) {
                $request = $request->attach('certificate', file_get_contents($certificate->getRealPath(), 'r'), $certificate->getClientOriginalName());
            }

            if ($idCopy) {
                $request = $request->attach('representative_id_copy', file_get_contents($idCopy->getRealPath()), $idCopy->getClientOriginalName());
            }

            if ($business_license) {
                $request = $request->attach('business_license', file_get_contents($business_license->getRealPath(), 'r'), $business_license->getClientOriginalName());
            }

            if ($procuration) {
                $request = $request->attach('procuration', file_get_contents($procuration->getRealPath(), 'r'), $procuration->getClientOriginalName());
            }

            if ($contract) {
                $request = $request->attach('contract', file_get_contents($contract->getRealPath(), 'r'), $contract->getClientOriginalName());
            }

            // Se tiver múltiplas fotos de produtos
            foreach ($product_photos as $index => $photo) {
                $request = $request->attach("product_photos[$index]", file_get_contents($photo->getRealPath(), 'r'), $photo->getClientOriginalName());
            }

            foreach ($owners_id_copies as $index => $photo) {
                $request = $request->attach("owners_id_copies[$index]", file_get_contents($photo->getRealPath(), 'r'), $photo->getClientOriginalName());
            }

            // Dados adicionais do formulário (campos normais)
            $formData = [
                'full_name' => $this->full_name,
                'is_owner' => $this->owner,
                'has_authority' => $this->authority,
                'nif_personal' => $this->nif_personal,
                'primary_phone' => $this->primary_phone,
                'secondary_phone' => $this->secondary_phone,
                'whatsapp_option' => $this->whatsapp_option,
                'whatsapp_number' => $this->whatsapp_number ?? '',
                'email_personal' => $this->email_personal,
                'description_products' => $this->description_products,
                'certificate_issue_date' => $this->certificate_issue_date,
                'certificate_expire_date' => $this->certificate_expire_date,
                'representative_id_issue_date' => $this->idCopy_issue_date,
                'representative_id_expire_date' => $this->idCopy_expire_date,
                'business_license_issue_date' => $this->business_license_issue_date,
                'business_license_expire_date' => $this->business_license_expire_date,
                'code' => $this->code,
                'notes' => $this->notes
            ];

            //dd($request->asMultipart());
            // Envia os dados e ficheiros no formato multipart/form-data
            $request->asMultipart()->post('127.0.0.1:8000/api/validation/save', $formData);

            Log::info("SendDocs", ['message' => $request]);

            $this->dispatch('close-valid');

            $this->alert('success', 'SUCESSO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => true,
                'text' => 'Dados enviados com sucesso'
            ]);

            Log::info('IdentifyValidator@sendValidationRequest', ['message' => $request->json()]);

            return;

        } catch (\Throwable $th) {
            Log::error('ItentifyValidator@sendValidation', [
                'message' => 'Falha ao realizar operação',
                'error' => $th->getMessage(),
                'file' => $th->getFile(),
                'line' => $th->getLine(),
            ]);

            return [
                'status' => false,
                'message' => 'Falha ao realizar operação',
            ];
        }
    }

    public function validateCode()
    {
        try {

            if (session('keyValidation') == $this->codeSend) {
                $this->alert('success', 'Codigo Validado', [
                    'toast'=>false,
                    'position'=>'center',
                    'showConfirmButton' => true,
                    'confirmButtonText' => 'OK',
                ]);
                $this->reset(['codeSend']);
                session()->forget('keyValidation');
            }else{
                $this->alert('info', 'ATENÇÃO', [
                    'toast'=>false,
                    'position'=>'center',
                    'text' => 'codigo de validação incorreto'
                ]);
            }
            return;
        } catch (\Throwable $th) {
            Log::error('ItentifyValidator@valideCode', [
                'message' => 'Falha ao realizar operação',
                'error' => $th->getMessage(),
                'file' => $th->getFile(),
                'line' => $th->getLine(),
            ]);

            return [
                'status' => false,
                'message' => 'Falha ao realizar operação',
            ];
        }
    }
}
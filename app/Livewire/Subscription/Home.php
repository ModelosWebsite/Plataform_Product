<?php

namespace App\Livewire\Subscription;

use App\Mail\CreateSite;
use App\Models\{User, company};
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\{DB, Hash, Mail};
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Home extends Component
{
    use LivewireAlert;
    public $name, $password, $lastname, $companynif, $companybusiness, $email, $confirmpassword;

    protected $rules =[
        'name'=>'required',
        'lastname'=>'required',
        'email'=>'required|unique:users,email|email',
        'password'=>'required',
        'confirmpassword'=>'required|same:password',
        'companynif'=>'required',
        'companybusiness'=>'required',
    ];

    protected $messages =[
        'name.required'=>'Obrigatório',
        'lastname.required'=>'Obrigatório',
        'email.required'=>'Obrigatório',
        'companynif.required'=>'Obrigatório',
        'companybusiness.required'=>'Obrigatório',
        'email.unique'=>'Já existe uma conta com este email',
        'password.required'=>'Obrigatório',
        'confirmpassword.required' => 'A confirmação da senha é obrigatória.',
        'confirmpassword.same' => 'A confirmação da senha deve ser igual à senha.',
    ];

    public function render()
    {
        return view('livewire.subscription.home')->layout("layouts.subscription.app");
    }

    public function createAccountSite()
    {
        DB::beginTransaction();
        $this->validate($this->rules,$this->messages);
            try {
                // Create token for company
                $tokenCompany = $this->name. rand(2000, 3000);

                $company = new company();

                $company->companyname = $this->name;
                $company->companyemail = $this->email;
                $company->companynif = $this->companynif;
                $company->companybusiness = $this->companybusiness;
                $company->companyhashtoken = $tokenCompany;

                $company->save();

                $user = new User();
                $user->name = $this->name . " " .$this->lastname;
                $user->email = $this->email;
                $user->password = Hash::make($this->password); 
                $user->role = "Administrador";
                $user->company_id = $company->id;
                $user->save();

                event(new Registered($user));
                $this->clearForm();
                DB::commit();

                $this->alert('success', 'SUCESSO', [
                    'toast'=>false,
                    'position'=>'center',
                    'timer' => '3500',
                    'text'=>'Website Criado com sucesso, verifique seu email para para habilitar a sua Conta',
                ]);

            } catch (\Throwable $th) {
                dd($th->getMessage());
                DB::rollBack();
                $this->alert('error', 'ERRO', [
                    'toast'=>false,
                    'position'=>'center',
                    'timer' => '1500',
                    'text'=>'Ocorreu um erro'
                ]);
            }
    }

    public function clearForm()
    {
        $this->name = '';
        $this->lastname = '';
        $this->email = '';
        $this->password = '';
        $this->companybusiness = '';
        $this->companynif = '';
    }
}
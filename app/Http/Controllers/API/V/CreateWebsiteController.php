<?php

namespace App\Http\Controllers\API\V;

use App\Http\Controllers\Controller;
use App\Models\{company, User};
use Illuminate\Http\Request;
use App\Mail\SendAccount;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\{DB, Hash, Http, Validator};

class CreateWebsiteController extends Controller
{
    //CRIAÇÃO DA CONTA NO WEBSITE CLÁSSICO
    public function createCompany(Request $request)
    {
        //VALIDAÇÃO DOS DADOS DE ENTRADA
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|unique:companies,companyemail',
            'nif' => 'required|string|max:20|unique:companies,companynif',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        DB::beginTransaction();

        try {
            // GERAR TOKEN ÚNICO DA EMPRESA
            $tokenCompany = $request->name . rand(2000, 3000);

            // CRIAR REGISTRO DA EMPRESA
            $company = company::create([
                'companyname' => $request->name,
                'companyemail' => $request->email,
                'companynif' => $request->nif,
                'companybusiness' => 'Produto',
                'companyhashtoken' => $tokenCompany,
            ]);

            // CRIAR USUARIO ADMINISTRADOR DA EMPRESA
            $user = User::create([
                'name' => $request->name . ' ' . $request->lastname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'Administrador',
                'company_id' => $company->id,
                'email_verified_at' => now()
            ]);

                        //FAZER ENVIO DE EMAIL
            $data = [
                'name' => $company->companyname,
                'message' => 'Bem-vindo ao website clássico! Sua empresa ' . $request->name . ' foi registada com sucesso. aqui segui os seus dados de acesso',
                'email' => $user->email,
                'password' => $request->password,
            ];

            Mail::to($request->email)->send(new SendAccount($data));

            DB::commit();

            return response()->json(['status' => 'success','company' => $company->companyhashtoken], 201);
            
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['message' => 'Erro ao criar a empresa e o usuário administrador.','error' => $th->getMessage(),'file' => $th->getFile(), 'line' => $th->getLine()], 500);
        }
    }

    //BUSCAR CONTA DO WEBSITE DA EMPRESA
    public function getCompanyByNif(Request $request)
    {
        try {
            // BUSCAR EMPRESA PELO NIF
            $company = CompanyResource::collection(company::where('companynif', $request->nif)->get());

            if ($company != null) {
                return response()->json($company, 200);
            }else{
                return response()->json(['message' => 'Empresa não encontrada para o NIF fornecido'], 404);
            }
        } catch (\Throwable $th) {
            return response()->json(["message" => "Falhar ao procurar website"]);
        }
    }
}
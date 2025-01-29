@section("title", "Tela de Inscrição")
<div class="col-md-12 d-flex justify-content-center align-items-center flex-wrap">
    <div class="card col-md-6 bg-dark text-white" id="signap">
        <div class="card-header text-center">
            <h4 class="card-title">Crie aqui o seu Website Clássico</h4>
        </div>
        <div class="card-body">
            
            <form wire:submit="createAccountSite()">

                <div class="row">
                
                    <div class="form-group col-md-6">
                        <label for="name">Nome<span class="text-danger">*</span></label>
                        <input class="form-control  form-control-lg form-control  form-control-lg-lg" wire:model='name' type="text" name="name"  placeholder="Informe o Nome" autocomplete="off">
                        @error('name')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
    
                    <div class="form-group col-md-6">
                        <label for="lastname">Sobrenome<span class="text-danger">*</span></label>
                        <input class="form-control  form-control-lg form-control  form-control-lg-lg" wire:model='lastname' type="text" name="lastname"  placeholder="Informe o Sobrenome" autocomplete="off">
                        @error('lastname')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
    
                </div>

                <div class="row">
                
                    <div class="form-group col-md-6">
                        <label for="name">Email<span class="text-danger">*</span></label>
                        <input class="form-control  form-control-lg form-control  form-control-lg-lg" wire:model='email' type="email" name="name"  placeholder="Informe o email" autocomplete="off">
                        @error('email')<span class="text-danger">{{$message}}</span>@enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="name">Crie uma senha<span class="text-danger">*</span></label>
                        <input class="form-control  form-control-lg form-control  form-control-lg-lg" wire:model='password' type="password" name="name"  placeholder="Crie uma senha" autocomplete="off">
                        @error('password')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
    
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name">Confirme a senha <span class="text-danger">*</span></label>
                        <input class="form-control  form-control-lg form-control  form-control-lg-lg" wire:model='confirmpassword' type="password" name="name"  placeholder="Confirme a senha" autocomplete="off">
                        @error('confirmpassword')<span class="text-danger">{{$message}}</span>@enderror
                    </div> 
                    
                    <div class="form-group col-md-6">
                        <label for="name">NIF<span class="text-danger">*</span></label>
                        <input class="form-control  form-control-lg form-control  form-control-lg-lg" wire:model='companynif' type="text" name="name"  placeholder="Informe o NIF" autocomplete="off">
                        @error('companynif')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                </div>
    
                <div class="row">
    

    
                    <div class="form-group col-md-12">
                        <label for="lastname">Industria<span class="text-danger">*</span></label>
                        <select wire:model='companybusiness' class="form-control  form-control-lg form-control  form-control-lg-lg">
                            <option value="">Selecione a sua industria</option>
                            <option value="Artes">Artes</option>
                            <option value="Musical">Musical</option>
                            <option value="Apresentadores">Apresentadores</option>
                            <option value="Designer">Designer</option>
                            <option value="Outros">Outros...</option>
                        </select>
                        @error('companybusiness')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
    
                    <div class="form-group pt-4 col-md-12">
                        <button style="background-color: #ffffff; color:#242424 !important" class="btn btn-block" type="submit">Registrar minha Conta</button>
                    </div>
                </div>

            </form>

        </div>

        <div class="card-footer text-center" >
            <p class="lead">Já tem uma conta? <a style="color: #ffffff !important;" href="{{route("plataform.product.login.view")}}" class="text-secondary">Fazer Login.</a></p>
        </div>

    </div>
</div>
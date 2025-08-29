<div>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-4">
                            <div class="">
                                <h4 class="fw-bold text-center">Recuperar Senha</h4>

                                <form wire:submit.prevent="resetPassword()">
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="typeEmailX">Email</label>
                                        <input wire:model="email" name="email" type="email" class="form-control form-control-sm shadow-none" required />
                                    </div>

                                    <button class="btn btn-outline-light btn-sm px-5" type="submit">Recuperar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
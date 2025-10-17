<div wire:ignore.self class="modal fade" id="modalPayment" tabindex="-1" role="dialog" aria-labelledby="modalPaymentLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg border-0">

            <div class="modal-header bg-primary text-white">
                <h6 class="modal-title fw-bold" id="modalPaymentLabel">Processo de Pagamento</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body p-4">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="row shadow-sm rounded p-3">
                            <span><input type="checkbox" wire:change="accept">  Para proceder com a solicitação dos serviços e Processar o 
                                pagamento é necessário concordar com os nossos
                                <a target="_blank" href="https://www.pachecobarroso.com/pb-terms-conditions">Termos & Condições</a> e a
                                <a target="_blank" href="https://www.pachecobarroso.com/pb-privacy-policy">Política de Privacidade</a>.
                            </span>
                        </div>
                    </div>
                    @if($acceptTerms)
                        <div class="col-12 text-center bg-light p-3 rounded">
                            <h6 class="text-uppercase fw-bold">Entidade: Pacheco Barroso</h6>
                            <p class="mb-1">Nº da Entidade: <strong>10181</strong></p>
                            <p class="mb-0">Referência: <strong>{{$code}}</strong></p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="modal-footer d-flex justify-content-center align-items-center p-3">
                <span class="fw-bold fs-5">Total a Pagar: {{number_format($price, 2, ',', ' ')}} Kz</span>
                {{-- <button wire:click="sendReference" id="submitBtn" class="btn btn-success fw-bold shadow-sm">
                    <i class="fas fa-credit-card"></i> Processar Pagamento
                </button> --}}
            </div>
            
        </div>
    </div>
</div>

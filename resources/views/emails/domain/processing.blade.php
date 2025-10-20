@component('mail::message')
# Solicitação Recebida

Olá **{{ auth()->user()->name }}**,  
recebemos a sua solicitação para adicionar o domínio **{{ $domainRecord->domain }}** à sua conta.

Nossa equipa já está processando o pedido.  
Por favor, aguarde enquanto os nossos servidores verificam e configuram o seu domínio.

Assim que o processo for concluído, você receberá outro e-mail com mais instruções.

@component('mail::button', ['url' => config('app.url')])
Acessar Plataforma
@endcomponent

Obrigado,  
**{{ config('app.name') }}**
@endcomponent
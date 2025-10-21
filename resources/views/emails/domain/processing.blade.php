@component('mail::message')
# Novo Domínio Solicitado

Olá,  
um utilizador acaba de solicitar a configuração de um novo domínio na plataforma.

---

**Dados da Solicitação:**

- **Utilizador:** {{ auth()->user()->name }}
- **Domínio Adicionado:** {{ $domainRecord->domain }}
- **Data do Pedido:** {{ now()->format('d/m/Y H:i') }}

---

Aguardando revisão e validação técnica.  
Assim que for aprovado ou configurado, o utilizador receberá uma notificação automática.

@component('mail::button', ['url' => config('app.url') . '/login/view'])
Aceder ao Painel Administrativo
@endcomponent

Obrigado,  
**{{ config('app.name') }}**
@endcomponent

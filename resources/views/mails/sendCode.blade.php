<!-- resources/views/emails/validation_code.blade.php -->
<!doctype html>
<html lang="pt-PT">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Validação de Conta</title>
  <style>
    /* Inline-friendly, simples e responsivo */
    body {
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial;
      background-color: #f4f6fb;
      margin: 0;
      padding: 0;
      color: #333;
    }
    .email-wrapper {
      width: 100%;
      padding: 24px;
      box-sizing: border-box;
    }
    .email-body {
      max-width: 680px;
      margin: 0 auto;
      background: #ffffff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 6px 30px rgba(20,30,50,0.06);
    }
    .header {
      background: #006fdd;
      color: #fff;
      padding: 20px 28px;
    }
    .header h1 {
      margin: 0;
      font-size: 20px;
      letter-spacing: -0.2px;
    }
    .content {
      padding: 28px;
      line-height: 1.6;
      font-size: 15px;
    }
    .code-box {
      display: inline-block;
      background: #f1f6ff;
      border: 1px dashed #cfe2ff;
      padding: 14px 22px;
      border-radius: 6px;
      font-weight: 700;
      font-size: 20px;
      letter-spacing: 2px;
      color: #063e9c;
      margin: 12px 0 18px;
    }
    .btn {
      display: inline-block;
      background: #006fdd;
      color: #fff !important;
      text-decoration: none;
      padding: 12px 18px;
      border-radius: 8px;
      font-weight: 600;
      margin-top: 8px;
    }
    .meta {
      margin-top: 18px;
      font-size: 13px;
      color: #6b7280;
    }
    .company-card {
      border: 1px solid #eef2ff;
      padding: 12px;
      border-radius: 6px;
      background: #fbfdff;
      margin-top: 14px;
    }
    .footer {
      padding: 18px 28px;
      font-size: 13px;
      color: #7b7f87;
      background: #f8f9fb;
    }
    @media (max-width: 520px) {
      .content { padding: 20px; }
      .header { padding: 16px; }
      .code-box { font-size: 18px; padding: 10px 16px; }
    }
  </style>
</head>
<body>
  <div class="email-wrapper">
    <div class="email-body" role="article" aria-roledescription="email" aria-label="Código de Verificação">
      <div class="header">
        <h1>Validação de Conta — {{ $company->companyname ?? $company['companyname'] ?? 'Sua Empresa' }}</h1>
      </div>

      <div class="content">
        <p>Olá <strong>{{ $user->full_name ?? $user['full_name'] ?? $user->name ?? $user['name'] ?? 'Utilizador' }}</strong>,</p>

        <p>Recebemos um pedido para validar a conta associada à empresa <strong>{{ $company->companyname ?? $company['companyname'] ?? $company->name ?? $company['name'] ?? '—' }}</strong>.</p>

        <p>Use o código de verificação abaixo para concluir o processo:</p>

        <div class="code-box" aria-hidden="true">
          {{ $code }}
        </div>

      </div>

      <div class="footer">
        <div>
          <small>
            Para mais ajuda contacte: 
            <a href="mailto:suporte@exemplo.ao">suporte@exemplo.ao'</a>
          </small>
        </div>
        <div style="margin-top:6px;">
          <small>© {{ date('Y') }} xzero Todos os direitos reservados.</small>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
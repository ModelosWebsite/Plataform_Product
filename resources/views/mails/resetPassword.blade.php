<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperação de Senha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .email-container {
            max-width: 600px;
            margin: 40px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .email-header {
            background: #343a40;
            color: #ffffff;
            padding: 15px;
            border-radius: 10px 10px 0 0;
            font-size: 22px;
            font-weight: bold;
        }
        .email-body {
            padding: 20px;
        }
        .new-password {
            font-size: 20px;
            font-weight: bold;
            color: #dc3545;
            margin-top: 15px;
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">PLATAFORMA WEBSITE CLÁSSICO</div>
        <div class="email-body">
            <h3>Recuperação de Senha</h3>
            <p>Sua nova senha foi gerada com sucesso. Utilize-a para acessar sua conta e, se desejar, altere-a posteriormente no painel de configurações.</p>
            <div class="new-password">NOVA SENHA: {{$newPassword}}</div>
        </div>
        <div class="footer">
            <p>Se você não solicitou essa alteração, entre em contato com o suporte imediatamente.</p>
        </div>
    </div>
</body>
</html>
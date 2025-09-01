<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; background-color: #f4f4f4; color: #333333;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color: #f4f4f4; padding: 20px;">
        <tr>
            <td align="center">
                <table role="presentation" width="600" cellspacing="0" cellpadding="0" style="background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                    <!-- Header -->
                    <tr>
                        <td style="background-color: #007bff; border-radius: 8px 8px 0 0; padding: 20px; text-align: center;">
                            <h1 style="color: #ffffff; margin: 0; font-size: 24px;">Bem-vindo(a) ao Website Clássico!</h1>
                        </td>
                    </tr>
                    <!-- Content -->
                    <tr>
                        <td style="padding: 30px;">
                            <h2 style="font-size: 20px; color: #333333; margin-top: 0;">Olá, {{ $data['name'] }}!</h2>
                            <p style="font-size: 16px; line-height: 1.6; color: #555555;">
                                {{ $data['message'] }}
                            </p>
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="margin: 20px 0;">
                                <tr>
                                    <td style="background-color: #f8f9fa; padding: 15px; border-radius: 4px;">
                                        <h3 style="font-size: 18px; color: #333333; margin: 0 0 10px 0;">Seus Dados de Acesso</h3>
                                        <p style="font-size: 16px; color: #555555; margin: 5px 0;">
                                            <strong>E-mail:</strong> {{ $data['email'] }}
                                        </p>
                                        <p style="font-size: 16px; color: #555555; margin: 5px 0;">
                                            <strong>Senha:</strong> {{ $data['password'] }}
                                        </p>
                                        <p style="font-size: 14px; color: #777777; margin-top: 10px;">
                                            Por segurança, recomendamos alterar sua senha após o primeiro login.
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #f8f9fa; border-radius: 0 0 8px 8px; padding: 20px; text-align: center;">
                            <p style="font-size: 14px; color: #777777; margin: 0;">
                                &copy; {{ date('Y') }} Website Clássico. Todos os direitos reservados.
                            </p>
                            <p style="font-size: 14px; color: #777777; margin: 5px 0;">
                                <a href="https://on.xzero.live" style="color: #282828; text-decoration: none;">Visite nosso site</a>
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
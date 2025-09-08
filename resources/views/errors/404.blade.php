<!DOCTYPE html>
<html lang="pt-ao">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Redirecionamento</title>

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" lazy:loading href="{{asset("site/bootstrap.min.css")}}">
    <style>
        :root {
        --primary: #242424;
        --light: #F1F8FF;
        --dark: #242424;
        --yelow: #242424;
        }
        html,
        body {
            width: 100%;
        height: 100%;
        /* fallback for old browsers */
        background: #6a11cb;
        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
        a:hover{
            color: #242424 !important;
        }

        #signap form div input,
        #signap form div select{
            box-shadow: none !important;
        }
    </style>
</head>

<body>

<div class="container py-5 text-white">
    <div class="row align-items-center">
        
        <!-- Coluna Esquerda -->
        <div class="col-md-6 mb-4 mb-md-0">
            <h1 class="fw-bold display-5 mb-3">
                Como criar seu Website Clássico
            </h1>
            <p class="fs-5 mb-4">
                Siga estes 3 passos simples e tenha o seu <strong>Website Clássico</strong> 
                ativo hoje mesmo.
            </p>
            
            <!-- Botões -->
            <div class="d-flex gap-3">
                <a href="{{route('site.subscription')}}" 
                   class="btn btn-primary px-4 py-2 fw-semibold shadow-sm rounded-pill">
                   Criar Website
                </a>
                <a href="{{route('plataform.product.login.view')}}" 
                   class="btn btn-primary px-4 py-2 fw-semibold rounded-pill">
                   Já tenho conta
                </a>
            </div>
        </div>
        
        <!-- Coluna Direita -->
        <div class="col-md-6">
            <ol class="list-unstyled fs-6">
                <li class="mb-3">
                    <strong>1. Crie sua conta:</strong> Cadastre-se no Website Clássico e escolha um modelo pronto.
                </li>
                <li class="mb-3">
                    <strong>2. Personalize facilmente:</strong> Ajuste cores, logotipo e conteúdos ao seu estilo.
                </li>
                <li class="mb-3">
                    <strong>3. Publique e cresça:</strong> Ative sua loja online e use recursos de SEO e marketing já integrados.
                </li>
            </ol>
        </div>
    </div>
</div>
 
</body>
</html>
@extends('layouts.admin.app')
@section('title', 'Painel Administrativo')
@section('content')
    @include('sbadmin.includes.sidebar')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            @include('sbadmin.includes.topbar')
            <!-- End of Topbar -->
            <div class="container-fluid">
                <div class="row justify-content-center">
                    @include('sbadmin.active.app')

                    <!-- Header -->
                    <div class="col-12 text-center mb-4 mt-2">
                        <h3 class="fw-bold text-dark">
                            Bem-vindo ao painel administrativo do seu site
                            <span class="text-primary">{{ auth()->user()->name ?? '' }}</span>
                        </h3>
                        <p class="text-muted fs-5">
                            Link de acesso do seu site para partilhar nas redes sociais:
                            @php
                                $request = request();
                                $token = Str::lower(auth()->user()->company->companyhashtoken);
                                
                                if ($request->getHost() !== "https://on.xzero.live") {
                                    # code...
                                    $base = $request->getHost();
                                } else {
                                    # code...
                                    $base = $request->getHost().'/'.$token;
                                }
                            @endphp

                            <a id="share-link" target="_blank" class="fw-semibold text-decoration-none text-primary"
                                href="https://{{ $base }}">
                                https://{{ $base }}
                            </a>
                        </p>
                        <button id="copy-btn" class="btn btn-primary shadow-sm rounded-pill" onclick="copyToClipboard()">
                            Copiar Link
                        </button>
                        {{-- <livewire:admin.link-account /> --}}
                    </div>

                    <!-- Coluna 1 -->
                    <div class="col-xl-12 mb-4">
                        <div class="accordion" id="accordionLeft">

                            <!-- 1 -->
                            <div class="shadow-sm rounded-3">
                                <div class="card-header bg-white d-flex justify-content-between align-items-center rounded-top-3 collapsed"
                                    id="heading1" style="cursor:pointer;" data-toggle="collapse" data-target="#collapse1"
                                    aria-expanded="true" aria-controls="collapse1">
                                    <h6 class="mb-0 fw-semibold text-dark">Como adicionar itens na Loja?</h6>
                                    <!-- Ícone -->
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                                <div id="collapse1" class="collapse show" aria-labelledby="heading1"
                                    data-parent="#accordionLeft">
                                    <div class="card-body text-muted">
                                        <p>
                                            Para adicionar itens na Loja, clica na opção Loja/Produtos > Categoria >
                                            Adicionar >
                                            Insira o nome da categoria e Cadastre. Depois vai na opção Itens > Adicionar >
                                            Cadastrar o Produto com: Imagem, Categoria, Nome do Produto, Descrição, Preço
                                            e Quantidade e Salve.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- 2 -->
                            <div class="shadow-sm rounded-3">
                                <div class="card-header bg-white d-flex justify-content-between align-items-center rounded-top-3"
                                    id="heading2" style="cursor:pointer;" data-toggle="collapse" data-target="#collapse2"
                                    aria-expanded="false" aria-controls="collapse2">
                                    <h6 class="mb-0 fw-semibold text-dark">Como Website clássico conecta-se com o xZero?
                                    </h6>
                                    <!-- Ícone -->
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                                <div id="collapse2" class="collapse" aria-labelledby="heading2"
                                    data-parent="#accordionLeft">
                                    <div class="card-body text-muted">
                                        <p>O website clássico conecta-se com o xZero, por meio de emissão de facturas
                                            automatica.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- 3 -->
                            <div class="shadow-sm rounded-3">
                                <div class="card-header bg-white d-flex justify-content-between align-items-center"
                                    id="heading3" style="cursor:pointer;" data-toggle="collapse" data-target="#collapse3"
                                    aria-expanded="false" aria-controls="collapse3">
                                    <h6 class="mb-0 fw-semibold text-dark">O que são elementos premiums?</h6>
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                                <div id="collapse3" class="collapse" aria-labelledby="heading3"
                                    data-parent="#accordionLeft">
                                    <div class="card-body text-muted">
                                        <p>Elementos premiums são ferramentas pagas, existentes no website clássico, que lhe
                                            possibilita activar funcionalidades ou recursos avançados, como p/ex: WhatsApp e
                                            Transferência.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- 4 -->
                            <div class="shadow-sm rounded-3">
                                <div class="card-header bg-white d-flex justify-content-between align-items-center"
                                    id="heading4" style="cursor:pointer;" data-toggle="collapse" data-target="#collapse4"
                                    aria-expanded="false" aria-controls="collapse4">
                                    <h6 class="mb-0 fw-semibold text-dark">O que é o ecossistema xZero?</h6>
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                                <div id="collapse4" class="collapse" aria-labelledby="heading4"
                                    data-parent="#accordionLeft">
                                    <div class="card-body text-muted">
                                        <p>O ecossistema xZero é o conjunto de soluções, ferramentas e serviços interligados
                                            que a plataforma disponibiliza para ajudar micro, pequenas, médias empresas e
                                            profissionais a organizar, automatizar e otimizar processos.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- 5 -->
                            <div class="shadow-sm rounded-3">
                                <div class="card-header bg-white d-flex justify-content-between align-items-center"
                                    id="heading5" style="cursor:pointer;" data-toggle="collapse" data-target="#collapse5"
                                    aria-expanded="false" aria-controls="collapse5">
                                    <h6 class="mb-0 fw-semibold text-dark">Como o website clássico funciona dentro do
                                        ecossistema xZero?</h6>
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                                <div id="collapse5" class="collapse" aria-labelledby="heading5"
                                    data-parent="#accordionLeft">
                                    <div class="card-body text-muted">
                                        <p>Dentro do ecossistema xZero, o Website Clássico funciona como a porta de entrada
                                            digital das empresas, ou seja, é a camada de visibilidade e presença online que
                                            se conecta aos outros módulos da plataforma.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- 6 -->
                            <div class="shadow-sm rounded-3">
                                <div class="card-header bg-white d-flex justify-content-between align-items-center"
                                    id="heading6" style="cursor:pointer;" data-toggle="collapse" data-target="#collapse6"
                                    aria-expanded="false" aria-controls="collapse6">
                                    <h6 class="mb-0 fw-semibold text-dark">Como posso publicitar a minha marca no
                                        ecossistema xZero?</h6>
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                                <div id="collapse6" class="collapse" aria-labelledby="heading6"
                                    data-parent="#accordionLeft">
                                    <div class="card-body text-muted">
                                        <p>Para publicitar no ecossistema xZero, acesse a sua conta no painel de
                                            administração no xZero e utilize a ferramenta de anúncios disponível.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- 7 -->
                            <div class="shadow-sm rounded-3">
                                <div class="card-header bg-white d-flex justify-content-between align-items-center"
                                    id="heading7" style="cursor:pointer;" data-toggle="collapse"
                                    data-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                                    <h6 class="mb-0 fw-semibold text-dark">Como recebo pagamentos das vendas da loja?</h6>
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                                <div id="collapse7" class="collapse" aria-labelledby="heading7"
                                    data-parent="#accordionLeft">
                                    <div class="card-body text-muted">
                                        <p>Os pagamentos da loja por padrão são feitos por referência. Caso prefira
                                            Transferência, podes adiquirir na aba elementos premium, pagar pela
                                            funcionalidade e receber os pagamentos diretamente da sua conta bancária. Já na
                                            Referência, que é gratuita, o valor vai para a conta da entidade detentora da
                                            plataforma e no final de cada semana é enviado para o utilizador.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- 8 -->
                            <div class="shadow-sm rounded-3">
                                <div class="card-header bg-white d-flex justify-content-between align-items-center"
                                    id="heading8" style="cursor:pointer;" data-toggle="collapse"
                                    data-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                                    <h6 class="mb-0 fw-semibold text-dark">Posso mudar o conteúdo do meu website?</h6>
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                                <div id="collapse8" class="collapse" aria-labelledby="heading8"
                                    data-parent="#accordionLeft">
                                    <div class="card-body text-muted">
                                        <p>Para mudar o conteúdo do seu website, clica em Definições gerais > Conteúdo. É
                                            nesta pagina e secção em que vais poder alterar os conteúdos, clicando em cada
                                            secção vai abrir um formulario para adicionar informação ou alterar.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- 9 -->
                            <div class="shadow-sm rounded-3">
                                <div class="card-header bg-white d-flex justify-content-between align-items-center"
                                    id="heading9" style="cursor:pointer;" data-toggle="collapse"
                                    data-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
                                    <h6 class="mb-0 fw-semibold text-dark">Existem alguns erros no conteúdo do meu website,
                                        por quê?</h6>
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                                <div id="collapse9" class="collapse" aria-labelledby="heading9"
                                    data-parent="#accordionLeft">
                                    <div class="card-body text-muted">
                                        <p>Se identificou algum erro no conteúdo do seu website, entre em contacto com a
                                            equipa técnica, clicando em Definições > Ajuda > Descreve o erro identificado.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- 10 -->
                            <div class="shadow-sm rounded-3">
                                <div class="card-header bg-white d-flex justify-content-between align-items-center"
                                    id="heading10" style="cursor:pointer;" data-toggle="collapse"
                                    data-target="#collapse10" aria-expanded="false" aria-controls="collapse10">
                                    <h6 class="mb-0 fw-semibold text-dark">Como posso adicionar WhatsApp no meu website?
                                    </h6>
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                                <div id="collapse10" class="collapse" aria-labelledby="heading10"
                                    data-parent="#accordionLeft">
                                    <div class="card-body text-muted">
                                        <p>Para adicionar WhatsApp no seu website, tem de clicar na opção Elementos Premium
                                            > Escolher o botão WhatsApp > Ativar > Efetue o pagamento > Aguarde pela
                                            ativação.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- 11 -->
                            <div class="shadow-sm rounded-3">
                                <div class="card-header bg-white d-flex justify-content-between align-items-center"
                                    id="heading11" style="cursor:pointer;" data-toggle="collapse"
                                    data-target="#collapse11" aria-expanded="false" aria-controls="collapse11">
                                    <h6 class="mb-0 fw-semibold text-dark">Existem outros elementos que gostaria de
                                        adicionar - Como faço?</h6>
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                                <div id="collapse11" class="collapse" aria-labelledby="heading11"
                                    data-parent="#accordionLeft">
                                    <div class="card-body text-muted">
                                        <p>Caso elementos que gostaria de adicionar não estejam na lista dos elementos
                                            premium, escreva para o nosso centro de desenvolvimento e apoio técnico.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- 12 -->
                            <div class="shadow-sm rounded-3">
                                <div class="card-header bg-white d-flex justify-content-between align-items-center"
                                    id="heading12" style="cursor:pointer;" data-toggle="collapse"
                                    data-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
                                    <h6 class="mb-0 fw-semibold text-dark">Como posso modificar a estrutura do meu website?
                                    </h6>
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                                <div id="collapse12" class="collapse" aria-labelledby="heading12"
                                    data-parent="#accordionLeft">
                                    <div class="card-body text-muted">
                                        <p>Para modificar a estrutura do seu website, tem de ir em Definições > Temas >
                                            Definições de Tema.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- 13 -->
                            <div class="shadow-sm rounded-3">
                                <div class="card-header bg-white d-flex justify-content-between align-items-center"
                                    id="heading13" style="cursor:pointer;" data-toggle="collapse"
                                    data-target="#collapse13" aria-expanded="false" aria-controls="collapse13">
                                    <h6 class="mb-0 fw-semibold text-dark">Preciso de ajuda - como posso receber ajuda?
                                    </h6>
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                                <div id="collapse13" class="collapse" aria-labelledby="heading13"
                                    data-parent="#accordionLeft">
                                    <div class="card-body text-muted">
                                        <p>Para poder receber ajuda, clique no botão flutuante <i
                                                class="fa fa-question-circle"></i> de ajuda no canto inferior direito da
                                            tela.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- CSS para animação dos ícones -->
            <style>
                .card-header i {
                    transition: transform 0.3s ease;
                }

                .card-header[aria-expanded="true"] i {
                    transform: rotate(180deg);
                }
            </style>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function copyToClipboard() {
        // Seleciona o link pelo ID
        const linkElement = document.getElementById('share-link');
        const link = linkElement.href;

        // Usa a API de cópia para copiar o link
        navigator.clipboard.writeText(link)
            .then(() => {
                Swal.fire({
                    title: 'Sucesso!',
                    text: 'Link copiado para a área de transferência!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            })
            .catch(err => {
                Swal.fire({
                    title: 'Erro!',
                    text: 'Não foi possível copiar o link.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
    }
</script>

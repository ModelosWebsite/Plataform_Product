<style>
    :root{
        --background: {{$color->codigo ?? ""}};
        --color: {{$color->letra ?? ""}};
        --about: url('{{ isset($fundoAbout->image) ? Storage::url("arquivos/background/".$fundoAbout->image) : '' }}');
    }

    .hero_area .header_section .header_bottom{
        background: var(--background);
        color: var(--color);
    }

    .hero_area .header_section nav a span,
    .hero_area .header_section #navbarSupportedContent ul li a
    {
        color: var(--color);
    }

    #bgfooter{
        background: var(--background);
    }

    #slider_section .btn1{
        background: var(--background);
    }

    #about h2{
        color: var(--background);
    }

    #service h2 span{
        color: var(--background);
    }

    #start button{
        background: var(--background);
    }

    #contact button{
        background: var(--background);
    }

    /*Estilizaçao personalizada do menu*/
    #menu .section-header h2{
        color: var(--background);
    }

    #menu .container-fluid .menu-item .btn{
        background: var(--background);
        border-color: var(--background);
        cursor: pointer;
    }

    #cartcout{
        background: var(--background);
    }

    /*Estilização do carrinho de compra*/
    #main .shopping-cart .shopping__cart__table table thead{
        background: var(--background);
    }

    /*Menu*/
    .container-scroll i:hover {
        background: var(--background);
    }

    .container-scroll button:hover,
       .container-scroll button.active{
        background: var(--background);
    }
</style>
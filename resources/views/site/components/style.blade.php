<style>
    :root{
        --color: {{$color->codigo ?? ""}};
        --letra: {{$color->letra ?? ""}};
        --aboutg: url({{ isset($fundoAbout->image) ? asset("storage/".$fundoAbout->image) : 'none' }});
        --aboutp: url({{ isset($fundo->image) ? asset("storage/".$fundo->image) : 'none' }});
        --start: url({{ isset($start->image) ? asset("storage/".$start->image) : 'none' }});
    }
    .scroll-top{
        background: var(--color);
    }

    .scroll-top:hover{
        background: var(--color);
    }

    /* ======== Formatação da NAVBAR  ======= */
    .header{
      background: var(--color);
    }

    @media (max-width: 1279px) {
        .navbar ul{
            background: var(--color);
        }
    }

    header .container-fluid .navbar>ul>li>a{
        color: var(--letra); 
    }

    header .container-fluid .logo>h1{
        color: var(--letra); 
    }

    header .container-fluid .navbar>ul>li>a::before{
        background-color: var(--letra); 
    }
    
    /* ======== Formatação dinamica Pagina Inicil/Imagens  ======= */
    main #stats-counter {
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), var(--start) center center;
    background-size: cover;
    background-repeat: no-repeat;
    }

    /* ======== Pagina sobre o Karamba  ======= */
    main .about .container-fluid ul li i{
        color: var(--color);
    }
    
    main .about .container-fluid .reservas{
        background:  var(--color);
    }
    
    main .about .container-fluid .reservas:hover{
        color: var(--letra);
    }

    main .about .container-fluid .about-img {
        background-size: cover; 
        background-position: center;
        background-image: var(--aboutg);
    }

    main .about .container-fluid .image-fluid {
        background-image: var(--aboutp);
    }

    /* ======== Pagina Menu  ======= */ 
    main .menu .container-fluid span{
        color: var(--color);
    }

    main .menu .container-fluid .nav-link:hover{
        color: var(--color);
    }

    main .menu .container-fluid .nav-link.active{
        color: var(--color);
        border-color: var(--color);
    }

    main .menu .container-fluid #menu-breakfast h3{
        color: var(--color);
    }

    main .menu .container-fluid #menu-breakfast .price{
        color: var(--color);
    }

    main .menu .container-fluid #menu-lunch h3{
        color: var(--color);
    }

    main .menu .container-fluid #menu-lunch .price{
        color: var(--color);
    }

    main .menu .container-fluid #menu-dinner h3{
        color: var(--color);
    }

    main .menu .container-fluid #menu-dinner .price{
        color: var(--color);
    }

    /* ====== Pagina ou Area de Contacto ===== */
    main .contact .section-header span{
        color: var(--color);
    }

    main .contact .container .php-email-form-b input:focus,
    main .contact .php-email-form-b textarea:focus{
        border-color: var(--color);
    }

    #preloader:before,
    #preloader:after{
        border-color: var(--color);
    }
</style>
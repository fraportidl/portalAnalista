<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>@yield('TituloPagina')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,400i,500" rel="stylesheet">
    <link href="/storage/assets/css/socicon.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/storage/assets/css/entypo.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/storage/assets/css/theme.css" rel="stylesheet" type="text/css" media="all" />
</head>


<body>
@php
    $home = '/paineladm';
@endphp

{{--------MENU DE NAVEGAÇÃO--------}}
<div class="navbar-container">
    <div class="bg-dark navbar-dark" data-sticky="top">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="#">
                    <img alt="Logo" src="/storage/assets/img/Logaso.svg" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="icon-menu h4"></i>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{$home}}" class="nav-link">Home</a>
                        </li>

                        <li class="nav-item">
                            <a href="/paineladm/analistas?departamento=Suporte&ativo=1" class="nav-link">Analistas</a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">Processamento Ticket</a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">Tester</a>
                        </li>
                    </ul>

                </div>
            </nav>
        </div>
    </div>
</div>


    @yield('conteudo')


<script type="text/javascript" src="/storage/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="/storage/assets/js/popper.min.js"></script>
<script type="text/javascript" src="/storage/assets/js/bootstrap.js"></script>
<script type="text/javascript" src="/storage/assets/js/aos.js"></script>
<script type="text/javascript" src="/storage/assets/js/flatpickr.min.js"></script>
<script type="text/javascript" src="/storage/assets/js/flickity.pkgd.min.js"></script>
<script type="text/javascript" src="/storage/assets/js/jarallax.min.js"></script>
<script type="text/javascript" src="/storage/assets/js/jarallax-video.min.js"></script>
<script type="text/javascript" src="/storage/assets/js/jarallax-element.min.js"></script>
<script type="text/javascript" src="/storage/assets/js/scrollMonitor.js"></script>
<script type="text/javascript" src="/storage/assets/js/jquery.smartWizard.min.js"></script>
<script type="text/javascript" src="/storage/assets/js/smooth-scroll.polyfills.min.js"></script>
<script type="text/javascript" src="/storage/assets/js/prism.js"></script>
<script type="text/javascript" src="/storage/assets/js/zoom.min.js"></script>
<script type="text/javascript" src="/storage/assets/js/theme.js"></script>
</body>
</html>

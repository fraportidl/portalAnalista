<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Portal BlueTI</title>
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

<div class="main-container">
    <nav aria-label="breadcrumb" role="navigation" class="bg-primary text-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    <ol class="breadcrumb">
                        </li>
                        <li class="breadcrumb-item"><a href="{{$home}}">Home</a>
                        <li class="breadcrumb-item Ativo"><a href="{{$_SERVER['REQUEST_URI']}}">Gerenciamento de analistas</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </nav>

    <section>
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col">
                    <div class="media align-items-center">
                        <a href="#" class="mr-4">
                        </a>
                        <div class="media-body">
                            <div class="mb-3">
                                <h1 class="h2 mb-2">Gerenciamento de analistas</h1>
                                <span>Crie ou altere um novo analista para o portal.</span>
                            </div>
                            <div>
                                <ul class="list-inline text-small d-inline-block">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-primary" class="icon-add-user mr-1" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="icon-add-user mr-1"></i>Novo Analista</button>
                </div>
            </div>
        </div>
    </section>

    <section class="flush-with-above">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-md-auto mb-5">


                    <nav class="nav flex-md-column">
                        <div class="dropdown flex-md-column" >
                            <label for="filtro-departamento" class="col-form-label">Filtros:</label>
                            </br>
                            <select class="form-select" id="selectDepartamento">
                                <option selected>{{$nomeDepartamentoPesquisado}}</option>
                                @foreach($departamentos as $departamento)
                                <option value="{{$departamento->getId()}}">{{$departamento->getNomedep()}}</option>
                                @endforeach
                            </select>


{{--                            <button class="btn btn-outline-info dropdown-toggle" type="button" id="filtro-departamento" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Suporte
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <span class="h6 mb-0">Suporte</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <span class="h6 mb-0">Implantação</span>
                                    </a>
                                </li>
                            </ul>--}}
                    </nav>
                    <hr class="short">
                    {{------------CHECK BOX ATIVO/INATIVO-------------------}}
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                             @if($ativo == 1)  checked
                               @endif
                        >
                        <label class="form-check-label" for="flexCheckChecked">
                            Ativo
                        </label>
                    </div>

                    <button class="btn btn-primary" onclick="redirecionaPaginaDep()">Buscar Analistas</button>
                </div>

                <div class="col-12 col-md-10 col-lg-9">
                    <div class="col-12 col-md-10 col-lg-9">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <form class="d-flex align-items-center">
                                <span class="mr-2 text-muted text-small text-nowrap">Ordenar por:</span>
                                <select class="custom-select">
                                    <option value="nome">Alfabetica</option>
                                    <option value="novo" selected>Recentes</option>

                                    <option value="recente-modificado">Modificado recente</option>
                                </select>
                            </form>
                        </div>

                        <div class="row">
                            <div class="col">
                                <table class="table table-hover align-items-center table-borderless">
                                    <thead>
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Status</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($analistas as $analista)
                                        @php
                                        $tipoanalista = 'Analista';

                                        if($analista->getGerente() == 1)
                                            $tipoanalista = 'Gerente';

                                        @endphp
                                    <tr class="bg-white">
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <img alt="Image" src="/storage/assets/img/Matheus.jpeg" class="avatar" />
                                                <div class="media-body">
                          <span class="h6 mb-0">{{$analista->getNome()}}
                          </span>
                                                    <span class="text-muted">{{$tipoanalista}} {{$analista->getCoddepartamentoint()->getNomedep()}}</span>
                                                </div>
                                            </div>
                                        </th>

                                        <td>
                                            @if($ativo == 1)
                                            <span class="badge badge-success">Ativo</span>
                                            @else
                                             <span class="badge badge-danger">Inativo</span>
                                            @endif
                                        </td>

                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-primary dropdown-toggle dropdown-toggle-no-arrow" type="button" id="dropdownMenuButton-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="icon-dots-three-horizontal"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-sm">
                                                    <a class="dropdown-item" href="#">Alterar</a>
{{--                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Desativar</a>--}}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="table-divider">
                                        <th></th>
                                        <td></td>
                                    </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Novo Analista</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/paineladm/analistas/incluir" method="post">
            <div class="modal-body">

                    <div class="form-group row">
                        <div class=" col-sm">
                            <label for="modal-nome" class="col-form-label">Nome:</label>
                            <input type="text" class="form-control" id="modal-nome" name="nome">
                        </div>
                        <div class="col-sm">
                            <label for="modal-sobrenome" class="col-form-label">Sobrenome:</label>
                            <input type="text" class="form-control" id="modal-sobrenome" name="sobrenome">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class=" col-sm-6">
                            <label for="modal-numeroTicket" class="col-form-label">Numero Ticket:</label>
                            <input type="text" class="form-control" id="modal-numeroTicket" name="codTicket">
                        </div>
                        <div class="col-sm-auto">

                            <label for="departamento" class="col-form-label">Setor:</label>
                            </br>
                            <select class="form-select" name="departamento">
                                <option value="{{$nomeDepartamentoPesquisado}}" selected>{{$nomeDepartamentoPesquisado}}</option>
                                @foreach($departamentos as $departamento)
                                    <option value="{{$departamento->getNomedep()}}">{{$departamento->getNomedep()}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                <div class="form-group row">
                <div class="col-sm-auto">
                    <label for="gerente" class="col-form-label">Cargo:</label>
                    </br>
                    <select class="form-select" name="gerente">
                        <option value="0" selected>Analista</option>
                            <option value="1">Gerente</option>
                    </select>
                </div>

                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="imagemAnalista">Imagem Analista</label>
                        <input type="file" class="form-control-file" id="Imagem-Analista" name="imagemAnalista">
                    </div>
                </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
            </form>
        </div>
    </div>
</div>

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
    <script>

      function  redirecionaPaginaDep(){
          let selectDepartamento = document.getElementById("selectDepartamento");
          let nomeDepSelecionado= selectDepartamento.options[selectDepartamento.selectedIndex].text;
          let checkBoxAtivo = document.getElementById("flexCheckChecked");
          let ativo = 1;
          if (checkBoxAtivo.checked == false){
              ativo = 0;
          }
          window.location.href = '/paineladm/analistas?departamento='+nomeDepSelecionado+'&ativo='+ativo;

      }
    </script>

</body>

</html>

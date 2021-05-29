@extends('PainelAdministrativo\layout')

@section('TituloPagina') Analistas @endsection


@section('conteudo')

{{--------------Menu navegação -----------------------}}
<div class="main-container">
    <nav aria-label="breadcrumb" role="navigation" class="bg-primary text-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    <ol class="breadcrumb">
                        </li>
                        <li class="breadcrumb-item"><a href="/paineladm">Home</a>
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

    {{-------------FILTRO DEPARTAMENTO------------}}
    <section class="flush-with-above">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-md-auto mb-5">

                    <nav class="nav flex-md-column">
                        <div class="dropdown flex-md-column" >
                            <label for="filtro-departamento" class="col-form-label">Filtros:</label>
                            </br>
                            <select class="form-select btn" id="selectDepartamento">
                                <option selected>{{$nomeDepartamentoPesquisado}}</option>
                                @foreach($departamentos as $departamento)
                                <option value="{{$departamento->getId()}}">{{$departamento->getNomedep()}}</option>
                                @endforeach
                            </select>

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
 {{-----------------------TABELA DE ANALISTAS--------------------------}}
                <div class="col-12 col-md-10 col-lg-9">
                    <div class="col-12 col-md-10 col-lg-9">

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
                                                    <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal2" data-whatever="@ddo" onclick="carregaDadosAnalista({{$analista->getCodusuario()}})">Alterar</a>

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
{{-----------MODAL CADASTRO ANALISTA---------------}}
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
                        <div class=" col-sm-4">
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

                <div class="form-group row">
                <div class="col-sm-auto">
                    <label for="gerente" class="col-form-label">Cargo:</label>
                    </br>
                    <select class="form-select" name="gerente">
                        <option value="0" selected>Analista</option>
                            <option value="1">Gerente</option>
                    </select>
                </div>
                </div>
                    </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="imagemAnalista">Imagem Analista</label>
                        <input type="file" class="form-control-file" id="Imagem-Analista" name="imagemAnalista">
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

{{-------------------MODAL  ALTERAÇÃO DE ANALISTA----------------}}

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alterar Analista</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" id="form-altera">
                <div class="modal-body">

                    <div class="form-group row">
                        <div class=" col-sm">
                            <label for="nomeAltera" class="col-form-label">Nome:</label>
                            <input type="text" class="form-control" id="modal-nome-altera" name="nomeAltera">
                        </div>
                        <div class="col-sm">
                            <label for="sobrenomeAltera" class="col-form-label">Sobrenome:</label>
                            <input type="text" class="form-control" id="modal-sobrenome-altera" name="sobrenomeAltera">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class=" col-sm-4">
                            <label for="statusAltera" class="col-form-label">Status</label>
                            </br>
                            <select class="form-select" name="statusAltera">
                                @if($ativo == 1)
                                <option value="1" selected>Ativo</option>
                                <option value="0">Inativo</option>
                                @else
                                <option value="0" selected>Inativo</option>
                                <option value="1">Ativo</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-sm-auto">

                            <label for="departamentoAltera" class="col-form-label">Setor:</label>
                            </br>
                            <select class="form-select" name="departamentoAltera">
                                <option value="{{$nomeDepartamentoPesquisado}}" selected>{{$nomeDepartamentoPesquisado}}</option>
                                @foreach($departamentos as $departamento)
                                    <option value="{{$departamento->getNomedep()}}">{{$departamento->getNomedep()}}</option>
                                @endforeach
                            </select>
                        </div>

                    <div class="form-group row">
                        <div class="col-sm-auto">
                            <label for="cargoAltera" class="col-form-label">Cargo:</label>
                            </br>
                            <select class="form-select" name="cargoAltera" id="cargoAnalistaSelect">

                            </select>
                        </div>
                    </div>
                    </div>
                        <div class="col-sm-auto">
                            <div class="form-group">
                                <label for="imagemAnalista">Imagem Analista</label>
                                <input type="file" class="form-control-file" id="Imagem-Analista" name="imagemAnalista">
                            </div>
                        </div>
                    </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Alterar</button>
                </div>
            </form>
        </div>
    </div>
</div>

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

      function  carregaDadosAnalista(codAnalista){
          var requestURL = '/paineladm/analistas/editar?codAnalista='+codAnalista;
          var request = new XMLHttpRequest();
          request.open('GET', requestURL);
          request.responseType = 'json';
          request.send();
          request.onload = function() {
              var response = request.response;
              var analista = response[0];
              populaModalAlteracao(analista);

          }
      }

      function populaModalAlteracao(analista){
          let nomeAnalista = document.getElementById('modal-nome-altera');
          let sobrenomeAnalista = document.getElementById('modal-sobrenome-altera');
          let formAltera = document.getElementById('form-altera');

          formAltera.action = '/paineladm/analistas/editar?codAnalista='+analista['codusuario'];
          nomeAnalista.value = analista['nome'];
          sobrenomeAnalista.value = analista['sobrenome'];
          criaOptionCargo(analista['gerente'])
      }

      function criaOptionCargo(cargo){
          let cargoAnalista = document.getElementById('cargoAnalistaSelect');
          var tipoCargo = 'Analista';
          var tipoCargo2 = 'Gerente';
          if (cargo == 1){
            tipoCargo = 'Gerente';
            tipoCargo2 = 'Analista'
          }
          let optionSelected = new Option(tipoCargo,cargo,true,true);
          let optionNotSelected = new Option(tipoCargo2,cargo,false,false);
          cargoAnalista.add(optionSelected);
          cargoAnalista.add(optionNotSelected);
      }
    </script>

@endsection

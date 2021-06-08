@extends('PainelAdministrativo\layout')

@section('TituloPagina') Parametros @endsection


@section('conteudo')

<div class="main-container">
    <nav aria-label="breadcrumb" role="navigation" class="bg-primary text-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    <ol class="breadcrumb">
                        </li>
                        <li class="breadcrumb-item"><a href="/paineladm">Home</a>
                        <li class="breadcrumb-item Ativo"><a href="/paineladm/parametros">Gerenciamento de parametros</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </nav>
      <section class="bg-white space-sm pb-4">
        <div class="container">
          <div class="row justify-content-between align-items-center">
            <div class="col-auto">
              <h1 class="h2">Gerenciamento de parametros</h1>
            </div>

          </div>
        </div>
      </section>

      <section class="flush-with-above space-0">
        <div class="bg-white">
          <div class="container">
            <div class="row">
              <div class="col">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#general" role="tab" aria-selected="true">Suporte</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="billing-tab" data-toggle="tab" href="#billing" role="tab" aria-selected="false">Tester</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>


      <section class="flush-with-above height-80 d-block">
        <div class="tab-content">
          <div class="tab-pane fade show active" id="general" role="tabpanel">
           <form action="/paineladm/parametros" method="post">
            <div class="container">
              <div class="row mb-4">
                <div class="col">
                  <h5>Detalhes de reenvio e conclusão de tickets</h5>
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-md-4 order-md-2">
                  <div class="alert alert-info text-small" role="alert">
                    <i class="icon-shield"></i>
                    <span>
                      As alterações realizadas automaticamente entrarão em produção
                    </span>
                    <a href="https://blueti.atlassian.net/wiki/spaces/SUPORTE/pages/557514758/001+Fluxo+de+atendimento+geral" target="_blank">Consulte o fluxo operacional</a>
                  </div>
                </div>

                <div class="col-12 col-md-8 order-md-1">
                  <div class="row">

        {{-----------DIAS REENVIO TICKET---------------}}
                    <div class="col-6">
                      <div class="form-group">
                        <label for="diasReenvio">Dias de reenvio Ticket
                          <span class="text-red">*</span>
                        </label>
                        <input class="form-control form-control-lg" type="number" name="diasReenvio" value="{{$parametros->getDiasReenvioTicket()}}" id="diasReenvio" />
                      </div>
                    </div>

          {{------------DIAS CONCLUSÃO TICKET --------------}}
                    <div class="col-6">
                      <div class="form-group">
                        <label for="diasConclusao">Dias de conclusão Ticket
                          <span class="text-red">*</span>
                        </label>
                        <input class="form-control form-control-lg" type="number" name="diasConclusao" value="{{$parametros->getDiasConclusaoTicket()}}" id="diasConclusao" />
                      </div>
                    </div>

          {{--------------MENSAGEM SAUDAÇÃO ------------}}
                     <div class="col-12">
                          <div class="form-group">
                              <label for="msgSaudacao">Mensagem de saudação:
                                  <span class="text-red">*</span>
                              </label>
                              <textarea class="form-control form-control-lg" type="text-area" rows="4" name="msgSaudacao" id="msgSaudacao">{{$parametros->getMensagemSaudacao()}}</textarea>
                          </div>
                     </div>

          {{--------------MENSAGEM PRIMEIRO ENVIO ------------}}
                    <div class="col-12">
                      <div class="form-group">
                        <label for="msgPrimeiroEnvio">Mensagem primeiro envio:
                          <span class="text-red">*</span>
                        </label>
                        <textarea class="form-control form-control-lg" type="text-area" rows="4" name="msgPrimeiroEnvio" id="msgPrimeiroEnvio">{{$parametros->getMensagemReenvio()}}</textarea>
                      </div>
                    </div>

                {{---------MENSAGEM SEGUNDO ENVIO--------------}}
                    <div class="col-12">
                      <div class="form-group">
                        <label for="msgSegundoEnvio">Mensagem segundo envio:
                          <span class="text-red">*</span>
                        </label>
                        <textarea class="form-control form-control-lg" type="text-area" rows="4" name="msgSegundoEnvio" id="msgSegundoEnvio">{{$parametros->getMensagemReenvio2()}}</textarea>
                      </div>
                    </div>

                {{-----------MENSAGEM CONCLUSÃO-------------}}
                    <div class="col-12">
                      <div class="form-group">
                        <label for="msgConclusao">Mensagem conclusão:
                          <span class="text-red">*</span>
                        </label>
                        <textarea class="form-control form-control-lg" type="text-area" rows="4" name="msgConclusao" id="msgConclusao">{{$parametros->getMensagemConclusao()}}</textarea>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <hr>

              <div class="row mb-4">
                <div class="col">
                  <h5>Exclusão de regra</h5>
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-md-4 order-md-2">
                  <div class="alert alert-info text-small" role="alert">
                    <i class="icon-shield"></i>
                    <span>
                      Os Clientes cadastrados serão excluidos na rotina de cobrança e conclusão.
                    </span>
                  </div>
                </div>
                <div class="col-12 col-md-8 order-md-1">
                  <div class="row">
                    <div class="col-12">


                        <table class="table align-items-center" id="tabelaClientes" @if ($clientesNaoConclui == null) hidden @endif >

                            <thead>
                            <tr>
                                <th scope="col">Código Cliente</th>
                                <th scope="col">Nome Cliente</th>
                                <th scope="col">Ação</th>
                            </tr>
                            </thead>
                            <tbody id="CorpoTabelaClientesNaoConclui">
                            @if($clientesNaoConclui != null)
                            @foreach($clientesNaoConclui as $cliente)
                            <tr>
                                <th scope="row" >
                                    <input class="form-control form-control-lg" type="text" name="codClienteNaoConclui[]" value="{{$cliente['codcliente']}}" id="codClienteNaoConclui" readonly/>
                                </th>
                                <td>
                                    <input class="form-control form-control-lg" type="text" name="nomeClienteNaoConclui" value="{{$cliente['nomecliente']}}" id="nomeClienteNaoConclui"  readonly/>
                                </td>
                                <td>
                                    <button onclick="removeCliente(this)" class="btn btn-md btn-danger" type="button"><i class="icon-squared-cross"></i> Cliente</button>
                                </td>
                            </tr>
                            @endforeach
                                @endif
                            </tbody>
                        </table>





                      <table class="table align-items-center" >
                        <thead>
                          <tr>
                            <th scope="col">Numero Ticket</th>
                            <th scope="col">Ação</th>
                          </tr>
                        </thead>
                          <tbody>
                            <tr>
                              <th scope="row">
                                <input class="form-control form-control-lg" type="number" name="numeroTicketCliente" value="" id="numeroTicketCliente" placeholder="Numero do ticket de referencia" />
                              </th>
                              <td>
                                  <button onclick="adicionarCliente()" type="button" class="btn btn-md btn-danger"><i class="icon-squared-cross"></i>Adicionar</button>
                              </td>
                            </tr>
                          </tbody>
                      </table>


                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <button class="btn btn-secondary" type="submit" >Salvar alterações</button>
                        <button class="btn btn-secondary"  type="button" onclick="cancelarAlteracao()">Cancelar</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           </form>
          </div>

       {{--     --------------------------TESTER------------------------}}
          <div class="tab-pane fade" id="billing" role="tabpanel">
            <div class="container">
              <div class="row mb-4">
                <div class="col">
                  <h5>Solicitações para conclusão</h5>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <form>
                    <table class="table align-items-center">
                      <thead>
                        <tr>
                          <th scope="col">Numero Solicitação</th>
                          <th scope="col">Versao / Release</th>
                          <th scope="col">Envio para documentação</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">
                            <span class="d-block">5598</span>
                          </th>
                          <td>
                            <span class="d-block">3.10 / K 1</span>
                            <small class="text-muted">Previsão: 06/21</small>
                          </td>
                          <td>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" name="checkboxSolicitacao" id="checkboxSolicitacao">
                              <label class="custom-control-label" for="checkboxSolicitacao"></label>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">
                            <span class="d-block">6074</span>
                          </th>
                          <td>
                            <span class="d-block">3.10 / K 1</span>
                            <small class="text-muted">Previsão: 06/21</small>
                          </td>
                          <td>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" name="checkboxSolicitacao1" checked id="checkboxSolicitacao1">
                              <label class="custom-control-label" for="checkboxSolicitacao1"></label>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <button class="btn btn-success">Processar e enviar documentação</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

<script>

    function removeCliente(Cliente){
        if (confirm('Confirma remoção do cliente? ')){
            var tr = Cliente.parentNode.parentNode;
            tr.parentNode.removeChild(tr);
        }

    }

    function adicionarCliente() {
        let TicketInput = document.getElementById('numeroTicketCliente');
        let codTicketInput = TicketInput.value;
        var requestURL = '/paineladm/parametros/cliente?codTicket=' + codTicketInput;
        var request = new XMLHttpRequest();
        request.open('GET', requestURL);
        request.responseType = 'json';
        request.send();
        request.onload = function () {
            var response = request.response;
            var cliente = response[0];
            criaTrTd(cliente);

        }
    }

    function criaTrTd(cliente){
        let tabelaClientes = document.getElementById('tabelaClientes');
        tabelaClientes.hidden = false;
        let CorpoTabelaClientes = document.getElementById('CorpoTabelaClientesNaoConclui');
        let tr = document.createElement("tr");
        let th = document.createElement("th");
        let tdNomeCliente = document.createElement("td");
        let tdButtonRemoverCliente = document.createElement("td");
        let buttonRemoverCliente = criaButtonRemoverCliente();
        let inputcodcliente = criaInput('codClienteNaoConclui[]','codClienteNaoConclui',cliente['codcliente']);
        let inputnomecliente =criaInput('nomeClienteNaoConclui','nomeClienteNaoConclui',cliente['nomecliente']);

        th.setAttribute('scope','row');

        CorpoTabelaClientes.appendChild(tr);
        tr.appendChild(th);
        th.appendChild(inputcodcliente);
        tr.appendChild(tdNomeCliente);
        tdNomeCliente.appendChild(inputnomecliente);
        tr.appendChild(tdButtonRemoverCliente);
        tdButtonRemoverCliente.appendChild(buttonRemoverCliente);

        let TicketInput = document.getElementById('numeroTicketCliente').value = '';
    }

    function criaInput(name, id, value){
        let input = document.createElement("input");
        input.className= 'form-control form-control-lg';
        input.type='text';
        input.name= name;
        input.id = id;
        input.value = value;
        input.readOnly = true;
        return input;
    }

    function criaButtonRemoverCliente(){
        let button = document.createElement("button");
        let icone = document.createElement("i");
        icone.className = 'icon-squared-cross';;
        button.setAttribute('onclick','removeCliente(this)');
        button.className = 'btn btn-md btn-danger';
        button.type = 'button';
        button.innerHTML = '<i class="icon-squared-cross"></i> Cliente';


        return button;
    }

    function cancelarAlteracao(){
        window.location = '/paineladm';
    }

</script>

<script>
    tinymce.init({
        selector: 'textarea',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        schema: "html4",
        plugins: 'link',
        menubar:false,
        toolbar: ' formatselect | ' +
            'bold italic underline | fontsizeselect forecolor |' + 'link |' +
            'removeformat | help',
        toolbar_mode: 'floating',
        element_format: 'html',
        entity_encoding : 'raw',
        forced_root_block: false,
        convert_fonts_to_spans : false,
        link_assume_external_targets: true,
        link_context_toolbar: true,
        valid_elements : "b/strong,u,i/em,font[color|size],br/p,a[href],h1,h2,h3,h4,h5,h6",
        valid_children : "b,u,i,font[color|size},br,a,h1,h2,h3,h4,h5,h6",
        cleanup_on_startup : false,
        cleanup : false,
        relative_urls: false,
        remove_script_host: false,
        formats: {
            forecolor : {inline : 'font', attributes: { color: "%value" }},
            fontsize: {inline : 'font', attributes: { size: "%value" }},
            underline : {inline : 'u', exact : true},
        },
    });
</script>
@endsection

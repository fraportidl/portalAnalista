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
            <div class="container">
              <div class="row mb-4">
                <div class="col">
                  <h5>Detalhes de reenvio e conclusao de tickets</h5>
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
                  <form class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="diasReenvio">Dias de reenvio Ticket
                          <span class="text-red">*</span>
                        </label>
                        <input class="form-control form-control-lg" type="number" name="diasReenvio" value="" id="diasReenvio" />
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="ticketReferencia">Numero Ticket Referencia
                          <span class="text-red">*</span>
                        </label>
                        <input class="form-control form-control-lg" type="number" name="ticketReferencia" value="" id="ticketReferencia" />
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <label for="msgPrimeiroEnvio">Mensagem primeiro envio:
                          <span class="text-red">*</span>
                        </label>
                        <textarea class="form-control form-control-lg" type="text-area" rows="4" name="msgPrimeiroEnvio" id="msgPrimeiroEnvio"></textarea>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <label for="msgSegundoEnvio">Mensagem segundo envio:
                          <span class="text-red">*</span>
                        </label>
                        <textarea class="form-control form-control-lg" type="text-area" rows="4" name="msgSegundoEnvio" id="msgSegundoEnvio"></textarea>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <label for="msgConclusao">Mensagem conclusão:
                          <span class="text-red">*</span>
                        </label>
                        <textarea class="form-control form-control-lg" type="text-area" rows="4" name="msgConclusao" id="msgConclusao"></textarea>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <button class="btn btn-secondary" type="submit" disabled>Salvar Alterações</button>
                      </div>
                    </div>
                  </form>
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
                      As empresas cadastradas serão excluidas na rotina de cobrança e conclusão.
                    </span>
                  </div>
                </div>
                <div class="col-12 col-md-8 order-md-1">
                  <form class="row">
                    <div class="col-12">
                      <table class="table align-items-center">
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
                                <button type="submit" class="btn btn-md btn-danger"><i class="icon-squared-cross"></i> Ticket</button>
                              </td>
                            </tr>
                          </tbody>
                      </table>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <button class="btn btn-secondary" type="submit" disabled>Salvar alterações</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
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


@endsection

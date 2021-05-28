@extends('PainelAdministrativo\layout')

@section('cabecalho')
    Cadastro de Analista
@endsection

@section('conteudo')


    <form action="/paineladm/analistas/incluir" method="post">
        <div class="mb-3">
            <label for="Departamento" class="form-label">Departamento</label>
            <select class="form-select" aria-label="Selecionar Departamento" id="Departamento" name="Departamento">
            <option value="1" selected>Suporte</option>
            <option value="2">Implantação</option>
            <option value="3">Desenvolvimento</option>
            <option value="4">Comercial</option>
             </select>
        </div>

        <div class="mb-3">
            <label for="CodTicket" class="form-label">Numero Ticket Analista</label>
            <input type="text" class="form-control" id="CodTicket" name="CodTicket">
        </div>

        <div class="mb-3">
            <label for="Nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="Nome" name="Nome">
        </div>

        <div class="mb-3">
            <label for="Sobrenome" class="form-label">Sobrenome</label>
            <input type="text" class="form-control" id="Sobrenome" name="Sobrenome">
        </div>

        <div class="mb-3">
            <label for="NomeCompleto" class="form-label">Nome Completo</label>
            <input type="text" class="form-control" id="NomeCompleto" name="NomeCompleto">
        </div>

        <div class="mb-3">
            <label for="hrregrapainelticket" class="form-label">Tempo atendimento Ticket Painel</label>
            <input type="date" class="form-control" id="hrregrapainelticket" name="hrregrapainelticket">
        </div>

        <div class="mb-3">
            <label for="Gerente" class="form-label">Gerente</label>
            <select class="form-select" aria-label="Gerente?" id="Gerente" name="Gerente">
                <option value="0" selected>Não</option>
                <option value="1">Sim</option>
            </select>
        </div>

        <div class="col-12">
            <button class="btn btn-primary" type="submit">Salvar</button>
        </div>

    </form>







@endsection

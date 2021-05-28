@extends('PainelAdministrativo\layout')

@section('cabecalho')
    Analistas {{$departamento}}
@endsection

@section('conteudo')

    <div class="content">
        <div class="dropdown show">
            <a class="btn btn-secondary dropdown-toggle" href="{{$_SERVER['REQUEST_URI']}}" role="button" id="depPrincDrop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$departamento}}</a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#" id="depSecDrop" onclick="redirecionaPaginaDep()"></a>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">Sobrenome</th>
            <th scope="col">Nome Completo</th>
            <th scope="col">Gerente</th>
            <th scope="col">Tempo Ticket Painel</th>
            <th scope="col"></th>
            </thead>

            <tbody>
            @foreach($analistas as $analista)
                <tr>
                    <th scope="row">{{$analista->getcodusuario()}}</th>
                    <td>{{$analista->getnome()}}</td>
                    <td>{{$analista->getsobrenome()}}</td>
                    <td>{{$analista->getnomecompleto()}}</td>
                    <td>{{$analista->getgerente()}}</td>
                    <td></td>
                    <td><button type="button" class="btn btn-info" onclick="editarAnalista({{$analista->getcodusuario()}})">Editar</button></td>
                </tr>

            @endforeach

            </tbody>
        </table>







    </div>


    <script>
        const dropDownPrinc = document.getElementById('depPrincDrop');
        const  dropDownSec = document.getElementById('depSecDrop');
        var linkDepAlterantivo = '';

        if (dropDownPrinc.textContent === 'Suporte') {
            dropDownSec.textContent = 'Implantação';
            linkDepAlterantivo = '/paineladm/analistas?departamento=Implantacao';
        }else {
            dropDownSec.textContent = 'Suporte';
            linkDepAlterantivo = '/paineladm/analistas?departamento=Suporte'
        }

        function redirecionaPaginaDep(){
            window.location.href = linkDepAlterantivo;
        }

        function editarAnalista(idAnalista){
            window.location.href = '/paineladm/analistas/editar?codAnalista='+idAnalista;
        }

    </script>







@endsection

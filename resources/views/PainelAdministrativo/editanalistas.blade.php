@extends('PainelAdministrativo\layout')

@section('cabecalho')
    Alteração cadastro analista {{$analista->getnome()}}
@endsection

@section('conteudo')


        <table class="table table-striped">
            <thead>
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">Sobrenome</th>
            <th scope="col">Nome Completo</th>
            <th scope="col">Gerente</th>
            <th scope="col">Tempo Ticket Painel</th>
            <th scope="col">Departamento</th>
            <th scope="col">Status</th>
            </thead>

            <tbody>
                <tr>
                    <th scope="row">{{$analista->getcodusuario()}}</th>
                    <td><input type="text" class="form-control" value="{{$analista->getnome()}}"></td>
                    <td><input type="text" class="form-control" value="{{$analista->getsobrenome()}}"></td>
                    <td><input type="text" class="form-control" value="{{$analista->getnomecompleto()}}"></td>
                    <td>

                        <div class="input-group" >
                            <select class="custom-select" id="dropDownGerente">
                                <option value="{{$analista->getgerente()}}" selected>teste</option>
                                <option value="">One</option>
                            </select>
                        </div>
                    </td>
                    <td><input type="text" class="form-control" value="#"></td>
                    <td>{{$analista->getcoddepartamentoint()->getnomedep()}}</td>
                    <td>{{$analista->getativo()}}</td>
                </tr>


            </tbody>
        </table>

        <button type="button" class="btn btn-success">Salvar</button>
        <button type="button" class="btn btn-danger">Cancelar</button>





    </div>


    <script>
        const dropDownGerente = document.getElementById('dropDownGerente');


        for (let i =0 ; i < dropDownGerente.length ; i++){
            if(dropDownGerente.options[i].value === 1){
                dropDownGerente.options[i].textContent = 'Sim'
            }else {
                dropDownGerente.options[i].textContent = 'Não'
            }

        }


    </script>







@endsection

@extends('PainelAdministrativo\layout')

@section('cabecalho')
   Rotina de conclusão de Ticket
@endsection

@section('conteudo')

<div class="container">
    {{--    DIAS REENVIO TICKET--}}
            <div class="row">
                <div class="col col-2 ">
                    <label for="DiasReenvioTicket">Dias reenvio Ticket</label>

                    <input type="number" class="form-control" name="DiasReenvioTicket" id="DiasReenvioTicket" value="{{$parametros->getDiasReenvioTicket()}}" disabled>


                </div>
            </div>

    {{--    DIAS CONCLUSÃO TICKET--}}
            <div class="row"  >
                <div class="col col-2">
                    <label for="DiasConclusaoTicket">Dias Conclusão Ticket</label>
                    <input type="number" class="form-control" name="DiasConclusaoTicket" id="DiasConclusaoTicket" value="{{$parametros->getDiasConclusaoTicket()}}" disabled>
                </div>
            </div>

    {{--    MENSAGEM PRIMEIRO REENVIO TICKET--}}
            <div class="form-group Mensagens">
                <label for="MensagemPrimeiroReenvio">Mensagem primeiro Reenvio</label>
                <textarea class="form-control" id="MensagemPrimeiroReenvio" rows="3" disabled>{{$parametros->getMensagemReenvio()}}</textarea>
            </div>

    {{--    MENSAGEM SEGUNDO REENVIO TICKET--}}
            <div class="form-group Mensagens">
                <label for="MensagemSegundoReenvio">Mensagem segundo Reenvio</label>
                <textarea class="form-control" id="MensagemSegundoReenvio" rows="3" disabled>{{$parametros->getMensagemReenvio2()}}</textarea>
            </div>

    {{--    MENSAGEM CONCLUSÃO  TICKET--}}
            <div class="form-group Mensagens">
                <label for="MensagemConclusao">Mensagem Conclusão</label>
                <textarea class="form-control" id="MensagemConclusao" rows="3" disabled>{{$parametros->getMensagemConclusao()}}</textarea>
            </div>


        <ul class="list-group listaClientes">
            Clientes que não entram na Rotina
            @foreach($ClientesNaoConclui as  $cliente)
                <div class="row">
                <div class="col-10 mb-2">
                    <li  class="list-group-item" id="itemCliente{{$cliente['codcliente']}}" >{{$cliente['nomecliente']}} Codigo:  <span class="idCliente">{{$cliente['codcliente']}}</span></li>
                </div>
                <div class="col" >
                    <button class="btn btn-primary BtnRemoverCliente" id="BtnRemoverItemCliente{{$cliente['codcliente']}}"  hidden  onclick="removerCliente({{$cliente['codcliente']}},'{{$cliente['nomecliente']}}')">Remover</button>
                </div>

                </div>

            @endforeach

        </ul>
        <ul class="list-group" >
            <div class="row" data-listaClientesNovos>

            </div>
        </ul>
        <div>
            <button class="btn btn-primary mt-2 mb-2"  onclick="adicionaCliente()" id="BtnAdicionaCliente" hidden >Adicionar cliente</button>
        </div>



        <button type="button" class="btn btn-primary" onclick="mostraInput()" id="BtnAlterar">Alterar</button>
        <button type="button" class="btn btn-primary" onclick="salvarAlteracao()" id="BtnSalvar"  hidden >Salvar</button>

</div>
        <script>

            const DiasReenvioTicket = document.getElementById('DiasReenvioTicket');
            const DiasConclusaoTicket = document.getElementById('DiasConclusaoTicket');
            const idCliente = document.getElementsByClassName('idCliente');
            const Mensagens = document.querySelectorAll('.Mensagens textarea');
            const listaNovosClientes = document.querySelector('[data-listaClientesNovos]');
            const BotaoAdicionaCliente = document.getElementById('BtnAdicionaCliente');
            const BotaoSalvar = document.getElementById('BtnSalvar');
            const BotaoAlterar = document.getElementById('BtnAlterar');
            const BotaoRemoverCliente = document.getElementsByClassName('BtnRemoverCliente');
            const inputCliente = document.getElementsByName('inputCliente');


        function mostraInput() {
            DiasReenvioTicket.removeAttribute('disabled');
            DiasConclusaoTicket.removeAttribute('disabled');
            Mensagens.disabled=false;
            BotaoAdicionaCliente.hidden=false;
            BotaoSalvar.hidden=false;
            BotaoAlterar.hidden=true;
            for (let y= 0 ; y <Mensagens.length;y++ ){
                Mensagens.item(y).disabled= false;
            }
            for (let i = 0;i < BotaoRemoverCliente.length;i++){
                BotaoRemoverCliente.item(i).removeAttribute('hidden');
            }
            //BotaoRemoverCliente.hidden=false;
        }

        function adicionaCliente(){

            const div = document.createElement('div');
            const  liInput ='<li class = "list-group-item"' + '<label for="inputCliente">Numero Ticket Cliente: </label> '+'<input name="inputCliente" >' + '</li>';
            div.innerHTML = liInput;
            div.classList.add('col-10');
            div.classList.add('mb-2');
            listaNovosClientes.appendChild(div);
        }


            function removerCliente(idCliente, nomeCliente){
                if(confirm('Confirma remoção do Cliente: '+idCliente+' '+ nomeCliente)){
                    document.getElementById('itemCliente'+idCliente).remove();
                    document.getElementById('BtnRemoverItemCliente'+idCliente).remove();
                }
            }

        function salvarAlteracao(){
            let formdata = new FormData();
            const MensagemPrimeiroReenvio = document.getElementById('MensagemPrimeiroReenvio');
            const MensagemSegundoReenvio = document.getElementById('MensagemSegundoReenvio');
            const MensagemConclusao = document.getElementById('MensagemConclusao');


            const listaClientesNConclui = document.querySelectorAll('.listaClientes span');

            let arrayListaClientesNConclui = [];

            if(listaClientesNConclui.length > 0){
                for(let i = 0; i < listaClientesNConclui.length; i++){
                    let spanIdCliente = listaClientesNConclui.item(i).innerHTML;

                        arrayListaClientesNConclui.push(spanIdCliente);
                }


                for (let j = 0; j < arrayListaClientesNConclui.length; j++){
                    formdata.append('ClientesNConclui[]',arrayListaClientesNConclui[j]);
                }

            }



            if (inputCliente.length > 0){

                    const codticket = inputCliente.values();

                    var arrayCodTicket = [];
                    for (let codigo  of codticket){
                       const valorCodticket = codigo.value;
                        arrayCodTicket.push(valorCodticket);
                    }
                console.log(arrayCodTicket);
                    for (let v = 0; v < arrayCodTicket.length; v++){
                        formdata.append('CodTicket[]', arrayCodTicket[v]);
                    }

            }

                        formdata.append('DiasReenvioTicket', DiasReenvioTicket.value);
                        formdata.append('DiasConclusaoTicket', DiasConclusaoTicket.value);
                        formdata.append('MensagemPrimeiroReenvio', MensagemPrimeiroReenvio.value);
                        formdata.append('MensagemSegundoReenvio', MensagemSegundoReenvio.value);
                        formdata.append('MensagemConclusao', MensagemConclusao.value);

                        const url = '/paineladm/parametros';

                        fetch(url, {
                            method: 'POST',
                            body: formdata
                        });

        }






    </script>
@endsection

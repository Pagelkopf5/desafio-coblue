@extends('template')

@section('title', 'Novo Contato')

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" type="text/css" href={{asset("css/create.css")}}>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
@endsection

@section('content')
    <div id="createEditForm" class="create wrap-content row">
        <div class="wrap-title col-12">
            <a href={{route('index')}}>
                <img src={{asset("images/arrow.png")}} alt="seta de retorno" class="arrow">
            </a>
            @if($contato->id == null)
            <h3>Novo Contato</h3>
            @else
            <h3>Editar o Contato</h3>
            @endif
        </div>
        <div class="wrap-input col-12">
            <label>Nome do Vendedor</label>
            <input type="text" name="nome_vendedor" required value={{old('nome_vendedor', $contato->nome_vendedor)}}>
        </div>
        <div class="wrap-input col-12">
            <label>Empresa</label>
            <input type="text" name="empresa" value={{old('empresa', $contato->empresa)}}>
        </div>
        <div class="wrap-input col-12">
            <label>Nome do Contato</label>
            <input type="text" name="nome_contato" required value={{old('nome_contato', $contato->nome_contato)}}>
        </div>
        <div class="wrap-input col-12">
            <label>Email</label>
            <input type="email" name="email" required value={{old('email', $contato->email)}}>
        </div>
        <div class="wrap-input col-12">
            <label>Telefone</label>
            <input type="text" name="telefone" required value={{old('telefone', $contato->telefone)}}>
        </div>
        <div class="wrap-input half col-6">
            <label>Data de Contato</label>
            <input type="text" name="data_contato" value={{old('data_contato', $contato->data_contato->format('d/m/Y'))}}>
        </div>
        <div class="wrap-input half col-6">
            <label>Data de Validade</label>
            <input id="dataVal" type="text" name="data_validade" value={{old('data_validade', $contato->data_validade->format('d/m/Y'))}}>
        </div>
        <div class="button col-12">
        @if($contato->id == null)
            <button id="btn" data-rota={{route('contato.store')}} data-metodo="POST" class="green" onClick="sendData()">Salvar</button>
        @else
            <button id="btn" class="green"  data-metodo="PUT" data-rota={{route('contato.update', $contato->id)}} onClick="sendData()">Salvar</button>
        @endif
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('input[name=data_contato]').mask('00/00/0000');
            $('#dataVal').mask('00/00/0000');
            $('input[name=telefone]').mask('(00) 0000-0000');
        });
        function sendData(){
            const rota = $('#btn').data('rota');
            const metodo = $('#btn').data('metodo');
            const valores = {
                'nome_vendedor': $("input[name=nome_vendedor]").val(),
                'empresa': $("input[name=empresa]").val(),
                'nome_contato': $("input[name=nome_contato]").val(),
                'email': $("input[name=email]").val(),
                'telefone': $("input[name=telefone]").val(),
                'data_contato': $("input[name=data_contato]").val(),
                'data_validade': $("input[name=data_validade]").val()
            };

            if(valida() == false){
                return;
            }

            $.ajax({
                url: rota,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: metodo,
                data: valores,
                success: function(response) {
                    alert("Operação realizada com sucesso!");
                    console.log(response);
                    //window.location.replace(response);
                }
            });
        }

        function valida(){
            if($("input[name=nome_vendedor]").val() == ""){
                alert("É obrigatório informar o campo nome de vendedor.");
                return false;
            } else if($("input[name=nome_contato]").val() == ""){
                alert("É obrigatório informar o campo nome de contato.");
                return false;
            } else if($("input[name=email]").val() == ""){
                alert("É obrigatório informar o campo email.");
                return false;
            } else if($("input[name=telefone]").val() == ""){
                alert("É obrigatório informar o campo telefone.");
                return false;
            }

            let validade= $("input[name=data_validade]").val();
            let contato= $("input[name=data_contato]").val();
            let atual= new Date();
            validade.split('/');
            contato = contato.split('/');
            validade = new Date( validade[1]+'/'+validade[0]+'/'+validade[2]);
            contato = new Date( contato[1]+'/'+contato[0]+'/'+contato[2]);

            if(contato > atual || contato > validade){
                alert("Data invalida!");
                return false
            }

            return true;
        }
    </script>
@endsection

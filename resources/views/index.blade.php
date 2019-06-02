@extends('template')

@section('title', "Contatos")
@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')
    @if(Session::has('message'))
        <p class="alert">{{ Session::get('message') }}</p>
    @endif
    <div class="index wrap-content">
        <div class="title unit row">
            <div class="col-2">
                <span>Empresa</span>
            </div>
            <div class="col-3">
                <span>nome do contato</span>
            </div>
            <div class="col-3">
                <span>E-mail</span>
            </div>
            <div class="col-2">
                <span>Telefone</span>
            </div>
            <div class="col-2">
                <span>Validade</span>
            </div>
        </div>
        @foreach($contatos as $contato)
        <div class="contato unit row" onClick="showMore(this)" data-value={{$contato->id}}>
            <div class="col-2">
                <span>{{$contato->empresa}}</span>
            </div>
            <div class="col-3">
                <span>{{$contato->nome_contato}}</span>
            </div>
            <div class="col-3">
                <span>{{$contato->email}}</span>
            </div>
            <div class="col-2">
                <span>{{$contato->telefone}}</span>
            </div>
            <div class="col-2">
                <span>{{$contato->data_validade->format('d/m/Y')}}</span>
            </div>
        </div>
        <div id={{$contato->id}} class="info">
            <div class="sub-container row">
                <div class="col-4">
                    <span>Vendedor: {{$contato->nome_vendedor}}</span>
                </div>
                <div class="col-5">
                    <span>Data de contato: {{$contato->data_contato}}</span>
                </div>
                <div class="icons col-3">
                    <a href={{route('contato.edit', $contato->id)}}>
                        <img src={{asset("images/edit.png")}} alt="">
                    </a>
                    <span>/</span>
                    <img data-value={{$contato->id}} src={{asset("images/delet.png")}} alt="" onclick="showDelet(this)">
                </div>
                <div class="delete">
                    <button class="green" data-value={{$contato->id}} onClick="showDelet(this)">Cancelar</button>
                    <button class="red" data-rota={{route('contato.destroy', $contato->id)}} data-value={{$contato->id}} onClick="deletar(this)">Excluir</button>
                </div>
            </div>
        </div>
        @endforeach
        <div class="novo">
            <a href={{route('contato.create')}}>
                <button class="green">Novo Contato</button>
            </a>
        </div>
    </div>

    <script>
        function showMore(e){
            let id = $(e).data('value');
            $("#" + id).slideToggle();
        }
        function showDelet(e){
            let id = $(e).data('value');
            $("#" + id).find('.delete').slideToggle();
        }
        function deletar(e){
            let id = $(e).data('value');
            const rota = $(e).data('rota');
            console.log(rota);

            $.ajax({
                url: rota,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "DELETE",
                success: function(response) {
                    alert("Operação realizada com sucesso!");
                    console.log(response);
                    window.location.replace(response);
                }
            });
        }
    </script>
@endsection

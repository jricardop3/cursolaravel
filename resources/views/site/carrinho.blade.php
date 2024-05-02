@extends('site.layout')
@section('title', 'Carrinho')
@section('conteudo')
<div class="row contaier">

  @if ($mensagem = Session::get('sucesso'))
      <div class="card green darken-1">
        <div class="card-content white-text">
          <span class="card-title">Parabéns:</span>
          <p>{{$mensagem}}</p>
        </div>
      </div>
    @endif
    @if ($mensagem = Session::get('aviso'))
      <div class="card red darken-1">
        <div class="card-content white-text">
          <span class="card-title">=/</span>
          <p>{{$mensagem}}</p>
        </div>
      </div>
    @endif
    @if ($itens->count()== 0)
    <div class="card pink darken-1">
      <div class="card-content white-text">
        <span class="card-title">Carrinho vazio.</span>
        <p>Adicione algo ao seu carrinho.</p>
      </div>
    </div>
        @else
        <h4>Seu Carrinho possui: {{$itens->count()}} produtos.</h4>
        <table class="striped">
            <thead>
              <tr>
                  <th></th>
                  <th>Nome</th>
                  <th>Preço</th>
                  <th>Quantidade</th>
                  <th></th>
              </tr>
            </thead>
    
            <tbody>
                @foreach ($itens as $item)
                          <tr>
                            <td><img src="{{$item->attributes->image}}" alt="" width="70" class="responsiv-img circle"></td>
                            <td>{{$item->name}}</td>
                            <td>R$ {{number_format($item->price,2,',','.')}}</td>
                            {{-- Atualiza carrinho inicia aqui --}}  
                            <form action="{{route('site.atualizacarrinho')}}" method="POST" enctype="multipart/form-data" >
                                  @csrf
                                  <input type="hidden" name="id" value="{{$item->id}}">
                                <td><input style="width: 40px" class="white center" type="number" name="quantity" min="1" value="{{$item->quantity}}"></td>
                                <td>
                                    <button class="btn-floating waves-effect waves-light pink"><i class="material-icons">refresh</i></button>
                              </form>  {{-- <= Atualiza carrinho finaliza aqui --}}  
                                <form action="{{route('site.removecarrinho')}}" method="POST" enctype="multipart/form-data" >
                                    @csrf
                                  <input type="hidden" name="id" value="{{$item->id}}">
                                    <button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button>
                                </form>
                            </td>
                          </tr>
                @endforeach
             </tbody>
          </table>
          
          <div class="card pink">
            <div class="card-content white-text">
              <span class="card-title" style="text-align: right">R$ {{number_format(\Cart::getTotal(),2,',','.')}}</span>
              <p style="text-align: right">Em até 12x Sem juros*</p>
            </div>
          </div>
    @endif

   
    
<div class="row container center">
    <a href="{{route('site.index')}}" class="btn large waves-effect waves-light pink">Continuar comprando<i class="material-icons right">arrow_back</i></button>
    <a href="{{route('site.limparcarrinho')}}" class="btn large waves-effect waves-light pink">Limpar carrinho<i class="material-icons right">clear</i></a>
    <button class="btn large waves-effect waves-light pink">Finalizar pedido<i class="material-icons right">check</i></button>
</div>
@endsection

@extends('site.layout')
@section('title', 'Pagina inicial')
@section('conteudo')
<div class="row contaier">
    <h4>{{$categoria->nome}} </h4>
    @foreach ($produtos as $produto)
        
    <div class="col s12 m4">
        <div class="card ">
            <div class="card-image">
              <img src="{{$produto->imagem}}">
              <a href="{{route('site.details', $produto->slug)}}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">visibility</i></a>
            </div>
            <div class="card-content">
                <span class="card-title">{{Str::limit($produto->nome,20)}}</span>
              <p>{{Str::limit($produto->descricao,35)}}</p>
            </div>
          </div>
    </div>
    @endforeach
</div>
<div class="row container center">
    {{$produtos->links('custom.pagination')}}
</div>
@endsection

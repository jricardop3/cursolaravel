@if ($mensagem = Session::get('sucesso'))
<div class="card green darken-1">
  <div class="card-content white-text">
    <span class="card-title">Parabéns:</span>
    <p>{{$mensagem}}</p>
  </div>
</div>
@endif
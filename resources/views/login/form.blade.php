@if($mensagem = Session::get('erro'))
{{$mensagem}}
@endif
@if ($errors->any())
    @foreach($errors->all() as $error)
        {{$error}}<br>
    @endforeach
    
@endif
<form action="{{route('login.auth')}}" method="GET">
@csrf
Email: <br><input type="email" value="sac@spgweb.com.br" name="email" id="">
<input type="password" value="" name="password" id="">
<input type="checkbox" name="remember">Lembre-me
<button type="submit">Entrar</button>
</form>
@if ($errors->any())
    @foreach($errors->all() as $error)
        {{$error}}<br>
    @endforeach
@endif

<form action="{{route('users.store')}}" method="POST">
@csrf
Nome: <input type="text" name="firstName" id=""><br>
Sobrenome: <input type="text" name="lastName" id=""><br>
Email: <input type="email" value="sac@spgweb.com.br" name="email" id=""><br>
Senha: <input type="password" value="" name="password" id=""><br>
<button type="submit">Cadastrar</button>
</form>
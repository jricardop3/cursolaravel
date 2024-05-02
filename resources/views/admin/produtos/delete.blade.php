   
   
   
   <!-- Modal Structure -->
   <div id="delete-{{$produto->id}}" class="modal">
    <div class="modal-content">
      <h4><i class="material-icons">delete</i> tem certeza?</h4>
      
        <div class="row">
        <p>Tem certeza que quer excluir esse {{$produto->nome}}?</p>
        </div> 
       
        <a href="#!" class="modal-close waves-effect waves-green btn blue right">Cancelar</a>
        <form action="{{route('admin.produto.delete', $produto->id)}}" method="POST">
            @method('DELETE')
            @csrf
        <button type="submit" class="modal-close waves-effect waves-green btn red right">Excluir</button><br>
        </form>
    </div>
    

  </div>
  
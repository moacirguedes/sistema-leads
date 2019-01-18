<div id="editleadclient_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar Pessoa</h4>
            </div>
      
            <form action="{{ route('lead.update', $lead_client->id) }}" method="post">
                <input type='hidden' name='id' class='modal_hiddenid' value='{{$lead_client->id}}'> {{ method_field('PUT') }} {!! csrf_field() !!}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nome: </label>
                        <input class="form-control" name="name" id="name">
                    </div>
    
                    <div class="form-group">
                        <label for="email">Email: </label>
                        <input class="form-control" name="email" id="email">
                    </div>
    
                    <div class="form-group">
                        <label for="telephone">Telefone: </label>
                        <input class="form-control" name="telephone" id="telephone">
                    </div>
                
                    <div class="form-group">
                        <label for="score">Score: </label>
                        <select class="form-control" name="score" id="score">
                        <option value="0">0/5</option>
                        <option value="1">1/5</option>
                        <option value="2">2/5</option>
                        <option value="3">3/5</option>
                        <option value="4">4/5</option>
                        <option value="5">5/5</option>
                        </select>
                    </div>
                </div>
    
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
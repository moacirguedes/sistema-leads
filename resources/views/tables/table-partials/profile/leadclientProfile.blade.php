<div class="box">
    <div class="box-header">
        <h3 class="box-title">Dados Gerais</h3>
        <button class = "displayinline btn btn-primary btn-flat rightside" 
            leadclient-name="{{ $lead_client->name }}" leadclient-email="{{ $lead_client->email }}" leadclient-telephone="{{ $lead_client->telephone }}" leadclient-score="{{ $lead_client->score }}" leadclient-id = "{{ $lead_client->id }}"
            id = "edit_leadclient">Editar Pessoa
        </button>
    </div>
    <div class="box-body">
        <div class="row container">
        <div class="col-sm-3 col-md-2 col-5">
            <label>Nome: </label>
        </div>
        <div class="col-md-8 col-6">
            {{ $lead_client->name }}
        </div>
        </div>
        <hr>
        <div class="row container">
            <div class="col-sm-3 col-md-2 col-5">
                <label>Email: </label>
            </div>
            <div class="col-md-8 col-6">
                {{ $lead_client->email }}
            </div>
        </div>
        <hr>
        <div class="row container">
            <div class="col-sm-3 col-md-2 col-5">
              <label>Telefone: </label>
            </div>
            <div class="col-md-8 col-6">
              {{ $lead_client->telephone }}
            </div>
        </div>
        <hr>
        <div class="row container">
            <div class="col-sm-3 col-md-2 col-5">
                <label>Score: </label>
            </div>
            <div class="col-md-8 col-6">
                {{ $lead_client->score.'/5' }}
            </div>
        </div>
        <hr>
        <div class="row container">
            <div class="col-sm-3 col-md-2 col-5">
                <label>Canal: </label>
            </div>
            <div class="col-md-8 col-6">
              {{ $lead_client->channels->pluck('name')->last() }}
            </div>
        </div>
        <hr>
        <div class="row container">
            <div class="col-sm-3 col-md-2 col-5">
                <label>Lead desde: </label>
            </div>
            <div class="col-md-8 col-6">
                {{ date('d/m/Y', strtotime($lead_client->created_at)) }}
            </div>
        </div>
        <hr>
    </div>
</div>
      
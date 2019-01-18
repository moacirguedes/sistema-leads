<div class="box">

    <div class="box-body">

        <button class="btn btn-block btn-flat" data-toggle="collapse" data-target="#optionCollapse">Parâmetros de busca...</button>
        <div class="collapse" id="optionCollapse">

            <br>
            <div class="col-sm-3 form-group">
                <label for="searchDate">Data:</label>
                <input class="form-control" type="text" id="searchDate">
            </div>

            <div class="col-sm-2 form-group">
                <label for="selectChannel">Canal:</label>
                <select name="selectChannel" id="selectChannel" multiple="multiple" style="width: 100%">          
                    <?php $uniqueChannels = array_unique(($channels)->pluck('name')->toArray());
                    foreach ($uniqueChannels as $channel) : ?>
              
                    <option value="<?= $channel ?>"> <?= $channel ?></option>
                    
                    <?php endforeach ?>
                </select>
            </div>

            <div class="col-sm-2 form-group">
                <label for="selectScore">Score:</label>
                <select class="form-control" name="selectScore" id="selectScore" multiple="multiple" style="width: 100%">
          <option value="">Todos</option>
          <option value="0/5">0/5</option>
          <option value="1/5">1/5</option>
          <option value="2/5">2/5</option>
          <option value="3/5">3/5</option>
          <option value="4/5">4/5</option>
          <option value="5/5">5/5</option>
        </select>
            </div>

            <div class="col-sm-3 form-group">
                <label for="searchAll">Busca Geral:</label>
                <input class="form-control" type="text" id="searchAll">
            </div>

            <div class="col-sm-2 form-group">
                <label for="searchLength">Leads por Página:</label>
                <select class="form-control" id="searchLength" name="searchLength">
          <option value="10">10</option>
          <option value="25">25</option>
          <option value="50">50</option>
          <option value="-1">Todos</option>
        </select>
            </div>
        </div>
    </div>
</div>
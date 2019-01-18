<div class="box" style="overflow:hidden">
    <div class="box-body">
        <button class="btn btn-flat btn-block" data-toggle="collapse" data-target="#optionCollapse">Parâmetros de busca...</button>
        <div class = "collapse" id = "optionCollapse">  
            <br>
            <div class = "col-sm-4 form-group">
                <label for="searchDate">Data:</label>
                <input class = "form-control" type = "text" id="searchDate">
            </div>
        
            <div class = "col-sm-4 form-group">
                <label for="searchAll">Busca Geral:</label>
                <input class = "form-control" type="text" id="searchAll">
            </div>
        
            <div class = "col-sm-4 form-group">
                <label for="searchLength">Resultados por Página:</label>
                <select class = "form-control" id="searchLength" name = "searchLength">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="-1">Todos</option>
                </select>
            </div>
        </div>
    </div>
</div>
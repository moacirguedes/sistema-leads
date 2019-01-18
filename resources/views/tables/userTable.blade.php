@extends('adminlte::page')

@section('title', 'Usuários')

@section('content')

@include('partials.includes')

@section('content_header')
<h1>Listagem Geral de Usuários</h1>
@stop
  
@include('tables.table-partials.search-options.userInterestSearchOptions')

<div class="box" style="overflow:hidden">    
  <div class="box-body">
    
      <table id="usersTable" class="table table-bordered table-hover table-striped nodisplay" width="100%">        
        
        <thead>
          <tr>
            <th></th>
            <th>Nome</th>
            <th>Email</th>
            <th class = "width150">Data de criação</th>
          </tr>
        </thead>    

        <?php foreach ($users as $user) : ?>
        <tr>
          <td></td>
          <td><?= $user->name ?></td>
          <td><?= $user->email ?></td>
          <td align = "center"><?= date('d/m/Y', strtotime($user->created_at)) ?></td>
        </tr>
        <?php endforeach ?>  
        
      </table>
    </div>
  </div>
</div>

@stop
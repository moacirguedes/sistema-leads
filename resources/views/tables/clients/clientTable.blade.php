@extends('adminlte::page') 
@section('title', 'Tabela de Clientes') 
@section('content')
    @include('partials.includes') 
@section('content_header')
<h1>Listagem Geral de Clientes</h1>

@stop
    @include('tables.table-partials.search-options.leadClientSearchOptions')

<div class="box">
    <div class="box-body">
        <table id="leadClientTable" class="table table-bordered table-striped table-hover nodisplay" width="100%">
            <thead>
                <tr>
                    <th></th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Score</th>
                    <th>Canal</th>
                    <th>Cliente em:</th>
                    <th>Perfil</th>
                </tr>
            </thead>

            <?php foreach ($clients as $client) : ?>
            <tr>
                <td></td>
                <td>
                    <?= $client->name ?>
                </td>
                <td>
                    <?= $client->email ?>
                </td>
                <td align="center">
                    <?= $client->telephone ?>
                </td>
                <td align="center">
                    <?= $client->score ."/5" ?>
                </td>
                <td>
                    <?= $client->channels->pluck('name')->last() ?>
                </td>
                <td align="center">
                    <?= date('d/m/Y', strtotime($client->created_at)) ?>
                </td>
                <td align="center">
                    <a href='/client/consumed/<?=$client->id?>'>
                        <button class = "btn btn-info btn-flat"><i class = "fa fa-user"></i></button>
                    </a>
                </td>
            </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>

@stop
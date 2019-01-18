@extends('adminlte::page') 
@section('title', 'Tabela de Leads') 
@section('content')
    @include('partials.includes') 
@section('content_header')
<h1>Listagem Geral de Leads</h1>

@stop
    @include('tables.table-partials.search-options.leadClientSearchOptions')

<div class="box" style="overflow:hidden">
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
                    <th>Lead em:</th>
                    <th>Perfil</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($leads as $lead) : ?>
                <tr>
                    <td></td>
                    <td>
                        <?= $lead->name ?>
                    </td>
                    <td>
                        <?= $lead->email ?>
                    </td>
                    <td align="center">
                        <?= $lead->telephone ?>
                    </td>
                    <td align="center">
                        <?= $lead->score ."/5" ?>
                    </td>
                    <td>
                        <?= $lead->channels->pluck('name')->last() ?>
                    </td>
                    <td align="center">
                        <?= date('d/m/Y', strtotime($lead->created_at)) ?>
                    </td>
                    <td align="center">
                        <a class="btn btn-info btn-flat" href='/lead/interest/<?=$lead->id?>'><i class = "fa fa-user"></i></a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

@stop
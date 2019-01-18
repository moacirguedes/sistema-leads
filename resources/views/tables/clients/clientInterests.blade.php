@extends('adminlte::page') 
@section('title', 'Interesses consumidos') 
@section('content') @if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif 
@section('content_header')

<div class="displayinline">
    <h3 class="displayinline">Perfil do Cliente</h3>
</div>


@stop
    @include('partials.includes')
    @include('tables.table-partials.profile.leadclientProfile', ['lead_client' => $client])
    @include('tables.table-partials.profile.leadClientEditModal', ['lead_client' => $client])

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Lista de Interesses</h3>
        <a href="{{ route('consumed.create', $client->id) }}" class="btn btn-primary btn-flat rightside">Adicionar Interesse</a>
    </div>
    <div class="box-body">
        <table id="leadsInterestsTable" class="table table-bordered table-striped table-hover nodisplay" width="100%">
            <thead>
                <tr>
                    <th>Interesse</th>
                    <?php if (Auth::guard('admin')->check()) : ?>
                    <th>Usuário</th>
                    <?php endif ?>
                    <th class="textcenter width115">Ações</th>
                </tr>
            </thead>

            <?php foreach ($interests as $index => $interest) : ?>
                <?php if ($interest->pivot->client) : ?>
                    <tr>
                        <td>
                            <?= $interest->description ?>
                        </td>
                        <?php if (Auth::guard('admin')->check()) : ?>
                            <td>{{ $interest->user->name }}</td>
                        <?php endif ?>
                        <td class="textcenter">
                            <div>
                                <a href="{{ route('consumed.edit', $interest->pivot->id) }}">
                                    <button class="btn btn-primary btn-flat fa fa-edit"></button>
                                </a>
                                <form class="displayinline" action="{{ route('consumed.destroy', $interest->pivot->id) }}" method="post">
                                {{ csrf_field() }} {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger btn-flat delete-interest fa fa-trash"></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endif ?>
            <?php endforeach ?>
        </table>
    </div>
</div>

{{-- arruma aqui gabriel --}}

<div class="box">
    <div class="box-header">
        <h2 class="box-title">Dados adicionais</h2>
    </div>
    <div class="box-body">
        <table id="leadFieldsTable" class="table table-bordered table-striped table-hover nodisplay" width="100%" >
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Valor</th>
                    <?php if (Auth::guard('admin')->check()) : ?>
                    <th>Usuário</th>
                    <?php endif ?>
                    <th class="width15 textcenter">Ações</th>
                </tr>
            </thead>

            <?php foreach ($customFields as $index => $field) : ?>
            <tr>
                <td>
                    <?= $field->customField->name ?>
                </td>
                <td> 
                    <?= $field->value ?>
                </td>
                <?php if (Auth::guard('admin')->check()) : ?>
                <td>
                    <?= $field->customField->user->name ?>
                </td>
                <?php endif ?>
                <td class="textcenter">
                    <button field_value_id="{{ $field->id }}" field_value="{{ $field->value }}" id="field_value_edit" class="btn btn-primary btn-flat fa fa-edit"></button>
                </td>
            </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>

<div id="valueEdit" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar Campo</h4>
            </div>
            <form action="{{ route('customfieldvalue.update') }}" method="post">
                <input type='hidden' name='id' class='modal_hiddenid' value='0'> {{ method_field('PUT') }} {!! csrf_field()
                !!}
                <div class="modal-body">
                    <div id = "field" class="form-group"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>


@stop
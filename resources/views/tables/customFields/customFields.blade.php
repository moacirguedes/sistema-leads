@extends('adminlte::page') 
@section('title', 'Campos personalizados') 
@section('content')
    @include('partials.includes') 
@section('content_header')
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

<h1 class="displayinline">Campos personalizados</h1>
<button class="rightside btn btn-default btn-flat" data-toggle="modal" data-target="#customfieldCreate">Criar novo campo personalizado</button>
@stop

<div class="box" style="overflow:hidden">
    <div class="box-body">

        <table id="customFieldsTable" class="table table-condensed nodisplay" width="100%">

            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Usuário</th>
                    <th class="width150 textcenter">Opções</th>
                </tr>
            </thead>
            <?php foreach ($customFields as $index => $customField) : ?>
            <tr>
                <td>
                    <?= $customField->name ?>
                </td>
                <td>
                    <?= $customField->type_desc ?>
                </td>
                <td>
                    <?= $customField->user->name ?>
                </td>
                <td class="textcenter">
                    <button field-id="{{ $customField->id }}" field-name="{{ $customField->name }}" field-type="{{ $customField->type }}" id="editbtn"
                        class="btn btn-primary btn-flat fa fa-edit"></button>
                    <form class="displayinline" action="{{ route('customfield.destroy', $customField->id) }}" method="post">
                        {{ csrf_field() }} {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger btn-flat delete-field fa fa-trash"></button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<div id="customfieldCreate" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Novo Campo Personalizado</h4>
            </div>
            <form action="{{ route('customfield.store') }}" method="post">
                {!! csrf_field() !!}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nome: </label>
                        <input class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="type">Tipo:</label>
                        <div class="form-group">
                            <select id="type" class="selectType" style="width: 100%" name="type" required>
                                <option></option>
                                <option value="boolean">Sim/Não</option>
                                <option value="text">Texto Curto</option>
                                <option value="textarea">Texto Longo</option>
                                <option value="number">Numérico</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user_id" >Usuário:</label>
                        <div class="form-group">
                            <select id="user_id" class="selectUser" style="width: 100%" name="user_id" required>
                                <option></option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
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

<div id="customfieldEdit" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar Campo Personalizado</h4>
            </div>

            <form action="{{ route('customfield.update', 0) }}" method="post">
                <input type='hidden' name='id' class='modal_hiddenid' value='0'> {{ method_field('PUT') }} {!! csrf_field() !!}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="editName">Nome: </label>
                        <input class="form-control" name="editName" id="editName">
                    </div>
                    <div class="form-group">
                        <label for="editType">Tipo:</label>
                        <div class="form-group">
                            <select id="editType" class="editType" style="width: 100%" name="editType" required>
                                <option value="boolean">Sim/Não</option>
                                <option value="text">Texto Curto</option>
                                <option value="textarea">Texto Longo</option>
                                <option value="number">Numérico</option>
                            </select>
                        </div>
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

@stop
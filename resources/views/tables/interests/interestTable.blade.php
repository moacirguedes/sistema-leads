@extends('adminlte::page') 
@section('title', 'Tabela de Interesses') 
@section('content')
	@include('partials.includes') 
@section('content_header')
<div class="displayinline">
	<h3 class="displayinline">Listagem geral de interesses</h3>
	<button class="btn btn-default btn-flat rightside" id="editbtn" data-toggle="modal" data-target="#interestCreate">Adicionar Interesse</button>
</div>

@stop
	@include('tables.table-partials.search-options.userInterestSearchOptions')

<div class="box">
	<div style="overflow:hidden" class="box-body">
		<table id="interestsTable" class="table table-bordered table-striped table-hover" style="display:none">
			<thead>
				<tr>
					<th class="wb">Descrição</th>
					<th class="width5p">Data</th>
					<th class="width115 textcenter">Ação</th>
				</tr>
			</thead>

			<?php foreach ($interests as $interest) : ?>
			<tr>
				<td id="<?= $interest->description ?>">
					<?= $interest->description ?>
				</td>
				<td align="center">
					<?= date('d/m/Y', strtotime($interest->created_at)) ?>
				</td>
				<td class="textcenter">
					<button interest-id="{{ $interest->id }}" interest-desc="{{ $interest->description }}" id="editbtn" class="btn btn-primary btn-flat fa fa-edit"></button>
					<form class="displayinline" action="{{ route('interests.destroy', $interest->id) }}" method="post">
						{{ csrf_field() }} {{ method_field('DELETE') }}
						<button type="submit" class="btn btn-danger btn-flat delete-interest fa fa-trash"></button>
					</form>
				</td>
			</tr>
			<?php endforeach ?>
		</table>
	</div>
</div>


<div id="interestCreate" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Novo Interesse</h4>
			</div>
			<form action="{{ route('interests.store') }}" method="post">
				{!! csrf_field() !!}
				<div class="modal-body">
					<div class="form-group">
						<label for="description">Descrição</label>
						<textarea maxlength="191" class="form-control noresize" rows="3" name="description" id="description" placeholder="Descrição do interesse..."></textarea>
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

<div id="interestEdit" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Editar Interesse</h4>
			</div>
			<form action="{{ route('interests.update', 0) }}" method="post">
				<input type='hidden' name='id' class='modal_hiddenid' value='0'> {{ method_field('PUT') }} {!! csrf_field() !!}
				<div class="modal-body">
					<div class="form-group">
						<label for="editDescription">Descrição</label>
						<textarea maxlength="191" class="form-control noresize" rows="3" name="editDescription" id="editDescription" placeholder="Descrição do interesse..."></textarea>
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
@extends('adminlte::page') 
@section('title', 'Novo Lead') 
@section('content') @if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
    @include('partials.includes')

<div class="container width550">
    <div class="box box-solid box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Registro de Lead</h3>
        </div>
        <div class="box-body">
            <form id="form" action="{{ route('lead.store') }}" method="post">
                {!! csrf_field() !!}
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" required class="form-control" id="email" name="email" placeholder="E-mail">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nome">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="telephone" class="col-sm-2 col-form-label">Telefone</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Telefone">
                    </div>
                    <label for="channel" class="col-sm-1 col-form-label">Canal</label>
                    <div class="col-sm-5">
                        <select class="selectChannel widthcomplete" name="channel" required>
              <option></option>
              <option value="twitter">Twitter</option>
              <option value="facebook">Facebook</option>
              <option value="instagram">Instagram</option>
              <option value="web">Web</option>
            </select>
                    </div>
                </div>
                <fieldset class="form-group">
                    <div class="row textcenter">
                        <div class="form-check col-sm-6">
                            <input class="form-check-input" type="radio" name="client" id="gridRadios1" value="0" required oninput='on_change(event)'>
                            <label class="form-check-label" for="gridRadios1">
                    Lead
                  </label>
                        </div>
                        <div class="form-check col-sm-4">
                            <input class="form-check-input" type="radio" name="client" id="gridRadios2" value="1" required oninput='on_change(event)'>
                            <label class="form-check-label" for="gridRadios2">
                    Cliente
                  </label>
                        </div>
                    </div>
                </fieldset>
                <div class="form-group row">
                    <label for="interest" class="col-sm-2 col-form-label">Interesse</label>
                    <div class="col-sm-10">
                        <select class="selectInterest widthcomplete" name="interest" required>
                <option></option>
                @foreach ($interests as $interest)
                  <option value="{{ $interest->id }}">{{ $interest->description }}</option>
                @endforeach
              </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 rightside">
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@stop
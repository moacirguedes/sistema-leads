@extends('adminlte::page') 
@section('title', 'Novo Usuário') 

@section('content_header')
  <h1>Cadastrar Novo Usuário</h1>
@stop

@include('partials.includes')

@section('content')
<div class="box">
    <div class="box-body">
        <form action="/register" method="post">
            <div class="col-md-6 col-md-offset-3">            
            {!! csrf_field() !!}
                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Nome Completo</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password">Senha</label>
                    <input type="password" name="password" class="form-control">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                    <label for="password_confirmation">Confirme a Senha</label>
                    <input type="password" name="password_confirmation" class="form-control">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-flat rightside">Registrar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop

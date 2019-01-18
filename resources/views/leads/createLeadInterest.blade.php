@extends('adminlte::page') 
@section('title', 'Novo interesse') 
@section('content')
    @include('partials.includes')

<div class="container width550">
    <div class="box box-solid box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Adicionar interesse</h3>
        </div>
        <div class="box-body">
            <form id="form" action="{{ route('interest.store', $id) }}" method="post">
                {!! csrf_field() !!}

                <fieldset class="form-group">
                    <div class="row textcenter">
                        <div class="form-check col-sm-6">
                            <input checked class="form-check-input" type="radio" name="client" id="gridRadios1" value="0" required oninput='on_change(event)'>
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
                        <select id="interest" class="selectInterest widthcomplete" name="interest" required>
                <option></option>
                @foreach ($interests as $interest)
                  <option value="{{ $interest->id }}">{{ $interest->description }}</option>
                @endforeach
              </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 rightside">
                        <button type="submit" class="btn btn-primary rightside">Adicionar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@stop
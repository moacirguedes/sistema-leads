{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Importar Leads</h1>
@stop

@section('content')
<div class = "col-md-6 col-md-offset-3">
    <div class="box box-success">
        <div class="box-body">
            
            <form class="container-fluid form-horizontal" method="POST" action="{{ route('importParser') }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('csv_file') ? ' has-error' : '' }}">
                    <label for="csv_file">Busque um arquivo CSV para importar:</label>
                    <input id="csv_file" type="file" class="form-control" name="csv_file" required>
                    @if (session()->has('message'))
                        <?php (session()->has('success'))?
                            $alert = "alert alert-success" : $alert = "alert alert-danger" ?>   
                                    
                        <div class="<?=$alert?>" role ="alert">
                            {!! session("message") !!}
                        </div>
                    @endif 
                </div>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Importar Dados
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

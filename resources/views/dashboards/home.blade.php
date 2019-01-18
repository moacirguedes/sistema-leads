@extends('adminlte::page') 
@section('title', 'Admin Dashboard') 
@section('content_header')
<div class="displayinline">
    <h2 class="displayinline">Dashboard</h2>
    <h4 class="rightside">{{ $date->format('l, d \d\e F \d\e Y') }}</h4>
</div>
@stop 

@section('content')

@include('partials.includes')

<script>
    var leadsCount = JSON.parse('<?= json_encode($leads) ?>');
    var clientsCount = JSON.parse('<?= json_encode($clients) ?>');
</script>

<div class="row">
    <div class="col-sm-6 col-xs-12">
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{ $leads[$date->month] }}</h3>
                <p>Novos Leads este mês</p>
            </div>
            <div class="icon">
                <i class="ion ion-ios-people"></i>
            </div>
            <a href="{{ route('lead.index') }}" class="small-box-footer">
                Visualizar leads <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-sm-6 col-xs-12">
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{ $clients[$date->month] }}</h3>
                <p>Novos Clientes este mês</p>
            </div>
            <div class="icon">
                <i class="ion ion-ios-star"></i>
            </div>
            <a href="{{ route('clients') }}" class="small-box-footer">
                Visualizar clientes <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6 col-xs-12">
        <canvas id="line-lead-chart"></canvas>
    </div>

    <div class="col-sm-6 col-xs-12">
        <canvas id="line-client-chart"></canvas>
    </div>
</div>

@stop 




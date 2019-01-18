<?php $timestamp = file_get_contents(resource_path().'/assets/timestamp.txt'); ?>

@section('css')
  <link rel="stylesheet" href=<?= '/css/'.$timestamp.'-styles.min.css' ?>>
@stop

@section('js')
  <script type="text/javascript" src=<?= '/js/'.$timestamp.'-scripts.min.js' ?>></script>
@stop
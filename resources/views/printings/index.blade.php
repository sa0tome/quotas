@extends('master')
@section('title', 'Dashboard')
@section('content_header')
@stop
@section('content')
@parent

<!--
<form method="get" action="/printings">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Impressora ..." name="user">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-success"> Buscar </button>
            </span>
        </div>
</form>
-->

<br>

<table width="100%" border="0">
<tr>
<td width="100%" align="center" colspan="3"><b><font size="+1">Impressões</font></b></td>
</tr>
<tr style="border-bottom: 1px solid #cdd0d4;">
<td width="33%"><b>Total:</b> {{ $quantidades['total'] }}</td>
<td width="34%" align="center"><b>Hoje:</b> {{ $quantidades['hoje'] }}</td>
<td width="33%" align="right"><b>Neste mês:</b> {{ $quantidades['mes'] }}</td>
</tr>
</table>

<br>
{{ $printings->links() }}
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th width="5%">Job ID</th>
                @can('admin') <th width="5%">Pessoa</th> @endcan
                @can('admin') <th width="5%">Host</th> @endcan
                <th width="10%">Data</th>
                <th width="5%">Páginas</th>
		<th width="5%">Cópias</th>
		<th width="5%">Tamanho</th>
                <th width="30%">Arquivo</th>
                <th width="25%">Impressora</th>
                <th width="10%">Status</th>
                <th width="30%">Impressora</th>
                <th width="10%" style="min-width:120px">Status</th>
            </tr>
        </thead>
        <tbody>
    @include('printings/partials/printing')
</tbody>
</table>
{{ $printings->links() }}
</div>
@stop

@section('javascripts_bottom')
<script type="text/javascript">
  $(document).ready(function(){
    function verificaStatus(route) {
      $.ajax({
        url: route,
        type: 'get',
        dataType: "html",
        data: {
          route: route,
        },
        beforeSend: function() {
          var loading = '<div class="spinner-border spinner-border-sm text-muted"></div>';
          $("td.Fila,td.Processando").html(loading);
        },
        success: function( data ) {
          $('.table tbody').html(data);
        }
      });
    };

    setInterval(function(){
      var route = $(location).attr("pathname");
      verificaStatus(route)
    }, 5000);

  });
</script>
@endsection

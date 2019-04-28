{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Transactions')

@section('content_header')
    <h1>All Transactions</h1>
@stop

@section('content')

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">All Transactions</h3>
      </div>

      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Customer Name</th>
            <th>Mobile</th>
            <th>Order ID</th>
            <th>Amount Paid</th>
            <th>Previous Balance</th>
            <th>Current Balance</th>
          </tr>
          </thead>
          <tbody>
          
            @foreach ($transactions as $transaction)
            <tr>
              <td>{{$transaction->customer_name}}</td>
              <td>{{$transaction->mobile}}</td>
              <td>{{$transaction->order_id}}</td>
              <td>{{$transaction->paid_amount}}</td>
              <td>{{$transaction->current_balance}}</td>
              <td>{{$transaction->balance}}</td>
            </tr>
            @endforeach
          
          </tbody>
          <tfoot>
          <tr>
            <th>Customer Name</th>
            <th>Mobile</th>
            <th>Order ID</th>
            <th>Amount Paid</th>
            <th>Previous Balance</th>
            <th>Current Balance</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset('css/public.css') }}">
@stop

@section('js')
  <script> 
$(document).ready(function() {
    $('#example1').DataTable( {
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
} );

  </script>
@stop
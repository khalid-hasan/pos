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
            <th>Due Status</th>
            <th>Date</th>
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
              <td>{{$transaction->due_status}}</td>
              <td>{{$transaction->date}}</td>
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
            <th>Due Status</th>
            <th>Date</th>
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

<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

  <script> 
$(document).ready(function() {
    $('#example1').DataTable( {
      'dom'         : 'Bfrtip',
      'buttons'     : ['copy', 'csv', 'excel', 'pdf', 'print'],
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
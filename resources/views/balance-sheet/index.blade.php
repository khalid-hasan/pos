{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Balance Sheet')

@section('content_header')
    <h1>Balance Sheet</h1>
@stop

@section('content')

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Balance Sheet</h3>
      </div>

      <!-- /.box-header -->
      <div class="box-body">
        <p class="text-center"><strong>Received Money From INDIA</strong></p>
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>ID</th>
            <th>Received Amount</th>
            <th>Date</th>
          </tr>
          </thead>
          <tbody>
          
            @foreach ($transfers as $transfer)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$transfer->amount}}</td>
              <td>{{$transfer->created_at}}</td>
            </tr>
            @endforeach
          
          </tbody>
          <tfoot>
          <tr>
            <th>ID</th>
            <th>Received Amount</th>
            <th>Date</th>
          </tr>
          </tfoot>
        </table>
        <h3 class="text-center"><strong>Total Money In Hand: {{$total_money}}</strong></h3>
        <hr>
        <p class="text-center"><strong>Factory Expenses</strong></p>
        <table id="example2" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>ID</th>
            <th>Factory Name</th>
            <th>Quantity</th>
            <th>Expense</th>
          </tr>
          </thead>
          <tbody>
          
            @foreach ($expenses as $expense)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$expense->factory_name}}</td>
              <td>{{$expense->product_quantity}}</td>
              <td>{{$expense->raw_material_total_price}}</td>
            </tr>
            @endforeach
          
          </tbody>
          <tfoot>
          <tr>
            <th>ID</th>
            <th>Factory Name</th>
            <th>Quantity</th>
            <th>Expense</th>
          </tr>
          </tfoot>
        </table>
        <h3 class="text-center"><strong>Total Expenses: {{$total_expenses}}</strong></h3>
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
    console.log('Hi!'); 

    $(function () {
    $('#example1').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : false
    })
  })

    $(function () {
    $('#example2').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : false
    })
  })

  </script>
@stop
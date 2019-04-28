{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Customers')

@section('content_header')
    <h1>All Customers</h1>
@stop

@section('content')

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">All Customers</h3>
      </div>

      <div class="col-6 col-sm-4">
      <button onclick="location.href='{{route('customer.create')}}'" type="button" class="btn btn-block btn-primary add-btn">Add Customer</button>
      </div>

      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Mobile</th>
            <th>Customer Name</th>
            <th>Balance</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
          
            @foreach ($customers as $customer)
            <tr>
              <td>{{$customer->mobile}}</td>
              <td>{{$customer->customer_name}}</td>
              <td>{{$customer->balance}}</td>
              <td><a href="{{route('customer.edit', $customer->mobile)}}">Edit</a> | <a href="{{route('customer.delete', $customer->mobile)}}">Delete</a></td>
            </tr>
            @endforeach
          
          </tbody>
          <tfoot>
          <tr>
            <th>Mobile</th>
            <th>Customer Name</th>
            <th>Balance</th>
            <th>Action</th>
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
    console.log('Hi!'); 

    $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })

  </script>
@stop
{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Products')

@section('content_header')
    <h1>All Products</h1>
@stop

@section('content')

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">All Products</h3>
      </div>

      <div class="col-6 col-sm-4">
      <button onclick="location.href='{{route('product.create')}}'" type="button" class="btn btn-block btn-primary add-btn">Add Product</button>
      </div>

      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Initial Quantity</th>
            <th>Added By</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
          
            @foreach ($products as $product)
            <tr>
              <td>{{$product->product_id}}</td>
              <td>{{$product->name}}</td>
              <td>{{$product->description}}</td>
              <td>{{$product->price}}</td>
              <td>{{$product->quantity}}</td>
              <td>{{$product->added_by}}</td>
              <td>{{$product->status}}</td>
              <td>
                @if ( $product->status == 'In System' )
                <a href="{{route('product.add', $product->product_id)}}">Add</a> | <a href="{{route('product.edit', $product->product_id)}}">Edit</a> | <a href="{{route('product.delete', $product->product_id)}}">Delete</a>

                @elseif ( $product->status == 'In Stock')
                <a href="{{route('product.remove', $product->product_id)}}">Remove</a> | <a href="{{route('product.edit', $product->product_id)}}">Edit</a> | <a href="{{route('product.delete', $product->product_id)}}">Delete</a>
                @endif
              </td>
            </tr>
            @endforeach
          
          </tbody>
          <tfoot>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Initial Quantity</th>
            <th>Added By</th>
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
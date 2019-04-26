{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Add Product')

@section('content_header')
    <h1>Add Product</h1>
@stop

@section('content')

        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Product</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" >
              <div class="box-body">

                <div class="form-group">
                  @csrf
                  <label>Product Name</label>
                  <input type="text" class="form-control" id="name" placeholder="Product Name" name="name" value="{{ old('product_name') }}">
                </div>
                <div class="form-group">
                  <label>Product Description</label>
                  <textarea class="form-control" rows="3" id="description" placeholder="Product Description" name="description">{{ old('description') }}</textarea>
                </div> 
                <div class="form-group">
                  <label>Quantity</label>
                  <input type="text" class="form-control" id="quantity" placeholder="Quantity" name="quantity" value="{{ old('quantity') }}" required>
                </div>  
                <div class="form-group">
                  <label>Price</label>
                  <input type="text" class="form-control" id="price" placeholder="Price" name="price" value="{{ old('price') }}" required>
                </div>
              <!-- /.box-body -->

              <div class="box-footer">

            @if ($errors->any())
                <div class="error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session()->has('message'))
              <div class="error">{{ session('message') }}</div>
            @endif

                <button type="submit" class="btn btn-primary">ADD</button>
              </div>
           </div>
            </form>
          </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset('css/public.css') }}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Add Customer')

@section('content_header')
    <h1>Add Customer</h1>
@stop

@section('content')

        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Customer</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" >
              <div class="box-body">

                <div class="form-group">
                  @csrf
                  <label>Customer Name</label>
                  <input type="text" class="form-control" id="customer_name" placeholder="Customer Name" name="customer_name" value="{{ old('customer_name') }}">
                </div>
                <div class="form-group">
                  <label>Mobile</label>
                  <input type="text" class="form-control" id="mobile" placeholder="Mobile" name="mobile" value="{{ old('mobile') }}" required>
                </div>  
                <div class="form-group">
                  <label>Balance</label>
                  <input type="text" class="form-control" id="balance" placeholder="Balance" name="balance" value="{{ old('balance') }}" required>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="{{ old('password') }}" required>
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
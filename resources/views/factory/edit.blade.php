{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Edit Factory')

@section('content_header')
    <h1>Edit Factory</h1>
@stop

@section('content')

        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Factory</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" >
              <div class="box-body">

                <div class="form-group">
                  @csrf
                  <label>Factory Name</label>
                  <input type="text" class="form-control" id="factory_name" placeholder="Factory Name" name="factory_name" value="{{ $factory['factory_name'] }}">
                </div>
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" class="form-control" id="address" placeholder="Address" name="address" value="{{ $factory['address'] }}" required>
                </div>  
                <div class="form-group">
                  <label>Phone</label>
                  <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone" value="{{ $factory['phone'] }}" required>
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

                <button type="submit" class="btn btn-primary">UPDATE</button>
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
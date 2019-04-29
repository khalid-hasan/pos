{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Shipment Request')

@section('content_header')
    <h1>Shipment Request</h1>
@stop

@section('content')

        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Shipment Request</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" >
              <div class="box-body">

                <div class="form-group">
                  @csrf
                  <label>Select Product</label>
                  <select class="form-control" name="product_id" id="product_id" required>
                    <option value="">--SELECT--</option>
                    @foreach ($shipments as $shipment)
                    <option value="{{$shipment->product_id}}">{{$shipment->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Quantity</label>
                  <input type="text" class="form-control" id="quantity" placeholder="Quantity" name="quantity" value="{{ old('quantity') }}" required>
                </div>  

                <div class="alert alert-primary quantity-unavailable" role="alert"></div>

                <div class="form-group">
                  <label>Send Date</label>
                  <input type="date" class="form-control" id="send_date" placeholder="Send Date" name="send_date" value="{{ old('send_date') }}" required>
                </div>
                <div class="form-group">
                  <label>Receive Date</label>
                  <input type="date" class="form-control" id="receive_date" placeholder="Receive Date" name="receive_date" value="{{ old('receive_date') }}" required>
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
    <script type="text/javascript">

    $(document).ready(function() {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $(".quantity-unavailable").css("display", "none");
      $('#quantity').keyup(function() {
        var value = $(this).val();
        var product_id= $("#product_id").val();
        console.log(value);
        $.ajax({
          type: 'post',
          url: '/admin/quantity-check',
          data: {
            'value' : value,
            'product_id' : product_id,
            _token: '{!! csrf_token() !!}'
          },
          success: function(r) {
            $('.quantity-unavailable').html(r.success);
            $('.quantity-unavailable').css("display", "");
          }
        });
      });
    });
    </script>

@stop
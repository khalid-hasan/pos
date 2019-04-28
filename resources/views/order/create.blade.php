{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Place Order')

@section('content_header')
    <h1>Place Order</h1>
@stop

@section('content')

        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Place New Order</h3>
            </div>

      <div class="panel panel-default">

        <div class="panel-body">
          <form class="form-horizontal" id="yoyo" role="form" method="POST" ">
                        @csrf
                        <table class="table table-striped">
              <tr>
                <td>
                  Customer Name: <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                </td>
                <td>
                  Contact Number: <input type="text" class="form-control" name="mobile" value="{{ old('mobile') }}" required>
                </td>
              </tr>
            </table>
            
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>Discount</th>
                  <th>Amount</th>
                  <th>Delete</th>
                  
                </tr>
              </thead>
              <tbody class="neworderbody">
                <tr>
                  <td class="no">1</td>
                  <td>
                    <select class="form-control product_id" name="product_id[]" required>
                      @foreach($products as $product)
                      <option data-price="{{$product->price}}" value="{{ $product->product_id }}" >{{ $product->name }}</option>
                      @endforeach
                    </select>
                  </td>
                  <td>
                    <input type="text" class="qty form-control" name="qty[]" required">
                  </td>
                  <td>
                    <input type="text" class="price form-control" name="price[]" required">
                  </td>
                  <td>
                    <input type="text" class="dis form-control" name="dis[]">
                  </td>
                  <td>
                    <input type="text" class="amount form-control" name="amount[]" required>
                  </td>
                  <td>
                    <input type="button" class="btn btn-danger delete" value="x">
                  </td>
                </tr>

              </tbody>
              
              <tfoot>
                <th colspan="6">Total:<b class="total">0</b></th>
              </tfoot>
                            

            </table>  
            <input type="button" class="btn btn-lg btn-primary add" value="Add Item">
            <hr>  

          <td>
            Get Money:
            <input type="text" class="getmoney form-control">
          </td>
          <td>
            Back Money:
              <input type="text" class="backmoney form-control">
          </td>
          <hr> 


          @if (session()->has('message'))
            <div class="error">{{ session('message') }}</div>
          @endif

          @if (session()->has('payment_method'))
            <div class="error">Payment Method: {{ session('payment_method') }}</div>
          @endif

          <button type="submit" class="btn btn-primary" name="save">PLACE ORDER</button>
          
          
        </div>
        
      </div>

        </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset('css/public.css') }}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>

    <script type="text/javascript">
      function totalAmount(){
        var t = 0;
        $('.amount').each(function(i,e){
          var amt = $(this).val()-0;
          t += amt;
        });
        $('.total').html(t);
      }
      $(function () {
        $('.getmoney').change(function(){
          var total = $('.total').html();
          var getmoney = $(this).val();
          var t = getmoney - total;
          $('.backmoney').val(t).toFixed(2);
        });
        $('.add').click(function () {
          var product = $('.product_id').html();
          var n = ($('.neworderbody tr').length - 0) + 1;
          var tr = '<tr><td class="no">' + n + '</td>' + '<td><select class="form-control product_id" name="product_id[]">' + product + '</select></td>' +
            '<td><input type="text" class="qty form-control" name="qty[]"></td>' +
            '<td><input type="text" class="price form-control" name="price[]"></td>' +
            '<td><input type="text" class="dis form-control" name="dis[]"></td>' +
            '<td><input type="text" class="amount form-control" name="amount[]"></td>' +
            '<td><input type="button" class="btn btn-danger delete" value="x"></td></tr>';
          $('.neworderbody').append(tr);
        });
        $('.neworderbody').delegate('.delete', 'click', function () {
          $(this).parent().parent().remove();
          totalAmount();
        });
        $('.neworderbody').delegate('.product_id', 'change', function () {
          var tr = $(this).parent().parent();
          var price = tr.find('.product_id option:selected').attr('data-price');
          tr.find('.price').val(price);
          
          var qty = tr.find('.qty').val() - 0;
          var dis = tr.find('.dis').val() - 0;
          var price = tr.find('.price').val() - 0;
        
          var total = (qty * price) - ((qty * price * dis)/100);
          tr.find('.amount').val(total);
          totalAmount();
        });
        $('.neworderbody').delegate('.qty , .dis', 'keyup', function () {
          var tr = $(this).parent().parent();
          var qty = tr.find('.qty').val() - 0;
          var dis = tr.find('.dis').val() - 0;
          var price = tr.find('.price').val() - 0;
        
          var total = (qty * price) - ((qty * price * dis)/100);
          tr.find('.amount').val(total);
          totalAmount();
        });
        
            $('#hideshow').on('click', function(event) {  
           $('#content').removeClass('hidden');
          $('#content').addClass('show'); 
                 $('#content').toggle('show');
            });
        

        
      });
    </script>
@stop
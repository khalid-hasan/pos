{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Local Inventory')

@section('content_header')
    <h1>Local Inventory</h1>
@stop

@section('content')

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Local Inventory</h3>
      </div>

      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Quantity</th>
          </tr>
          </thead>
          <tbody>
          
            @foreach ($inventories as $inventory)
            <tr>
              <td>{{$inventory->product_id}}</td>
              <td>{{$inventory->name}}</td>
              <td>{{$inventory->quantity}}</td>
            </tr>
            @endforeach
          
          </tbody>
          <tfoot>
          <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Quantity</th>
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

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Receive Product</h4>
          </div>
            <div class="modal-body">
              <div class="panel-body">

                <form role="form" method="post" >
                  @csrf
                  <div class="box-body">

                    <div class="form-group">
                      <label>Work ID</label>
                      <input type="text" class="form-control" id="work_id" name="work_id" readonly>
                    </div> 

                    <div class="form-group">
                      <label>Product ID</label>
                      <input type="text" class="form-control" id="product_id" name="product_id" readonly>
                    </div> 

                    <div class="form-group">
                      <label>Received Quantity</label>
                      <input type="text" class="form-control" id="received_quantity" placeholder="Received Quantity" name="received_quantity" value="{{ old('received_quantity') }}" required>
                    </div> 

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

                    <button type="submit" class="btn btn-primary">Receive</button>

                    </div>
                  </div>
                </form>
          </div>
        </div>
      </div>
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

  $('#myModal').on('show.bs.modal', function(e) {
      var workId = $(e.relatedTarget).data('work-id');
      $(e.currentTarget).find('input[name="work_id"]').val(workId);
  });

  $('#myModal').on('show.bs.modal', function(e) {
      var productId = $(e.relatedTarget).data('product-id');
      $(e.currentTarget).find('input[name="product_id"]').val(productId);
  });
  </script>
@stop
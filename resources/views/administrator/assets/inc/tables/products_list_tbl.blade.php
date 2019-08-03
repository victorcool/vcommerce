<div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Table With Full Features</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped example1">
            <thead>
            <tr>
              <th>Product Name</th>
              <th>Quantity</th>
              <th>Regular price</th>
              <th>Discount price</th>
              <th>Date created</th>
              <th>More</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
              <tr>
                  <td>{{$product->product_name}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>@php echo number_format($product->regular_price); @endphp</td>
                    <td>@php echo number_format($product->discount_price); @endphp</td>
                    <td>{{$product->created_at}}</td>
                  <td><a href="{{url('administrator/products/create')}}"><i class="fa fa-eye"></i></a></td>              
                  </tr> 
              @endforeach
                     
            </tbody>
            <tfoot>
            <tr>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Regular price</th>
            <th>Discount price</th>
            <th>Date created</th>
            <th>More</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
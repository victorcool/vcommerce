 <!-- TABLE: LATEST ORDERS -->
 <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Sub Categories</h3>      
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="table-responsive">
        <table class="table no-margin">
          <thead>
          <tr>
            <th>#</th>
            <th>Category</th>
            <th>SubCategory</th>
            <th>Date added</th>
            <th>More..</th>
          </tr>
          </thead>
          <tbody>
            <?php $i = 0;?>
              @foreach ($categories as $category)
                <tr>
                <td>{{'#'.++$i}}</td>
                    <td>{{$category->category_name}}</td>
                    <td>{{$category->created_at}}</td>
                    <td>
                    <a href="categories/{{$category->id}}/edit" class="label label-success"><i class="fa fa-pencil"></i> Edit</span></a>
                        <a href="#" class="label label-danger"><i class="fa fa-remove"></i> remove</span></a>
                    </td>                  
                </tr>
              @endforeach 
              {{$categories->links()}}        
          </tbody>
        </table>
      </div>
      <!-- /.table-responsive -->
    </div>
    <!-- /.box-body -->
    {{-- <div class="box-footer clearfix">
      <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
      <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
    </div> --}}
    <!-- /.box-footer -->
  </div>
  <!-- /.box -->
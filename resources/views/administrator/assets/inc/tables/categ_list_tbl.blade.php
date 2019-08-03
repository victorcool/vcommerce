 <!-- TABLE: LATEST ORDERS -->
 <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Products Categories</h3>      
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="table-responsive">
        <table class="table no-margin">
          <thead>
          <tr>
            <th>CategID</th>
            <th>Category name</th>
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
                       {{!! Form::open(['action' => ['admin\CategoriesController@destroy',$category->id], 'method' => 'POST'])!!}}
                       
                       {{Form::hidden('_method','DELETE')}}
                       {{Form::submit('remove', ['class' => 'btn btn-default btn-xs'])}}
                       {{!! Form::close() !!}}
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
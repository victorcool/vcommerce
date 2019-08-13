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
            <th>#ID</th>
            <th>service name</th>
            <th>Date added</th>
            <th>More..</th>
          </tr>
          </thead>
          <tbody>
            <?php $i = 0;?>
              @foreach ($services as $service)
                <tr>
                <td>{{'#'.++$i}}</td>
                    <td>{{$service->title}}</td>
                    <td>{{$service->created_at}}</td>
                    <td>
                    <a href="services/{{$service->id}}" class="label label-info"><i class="fa fa-eye"></i></span></a>
                    <a href="services/edit/{{$service->id}}" class="label label-success"><i class="fa fa-pencil"></i></span></a>
                    <a href="#" class="label label-danger rmServiceBtn" data-id="{{$service->id}}"><i class="fa fa-remove"></i></span></a>
                      
                    </td>                  
                </tr>
              @endforeach 
                    
          </tbody>
        </table>
      </div>
      <!-- /.table-responsive -->
    </div>
  </div>
  <!-- /.box -->
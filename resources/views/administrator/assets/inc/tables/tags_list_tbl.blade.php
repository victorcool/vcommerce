<div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Table With Full Features</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped example1">
        <thead>
        <tr>
          <th>Tag Name</th>
          <th>Date created</th>
          <th>Last Updated</th>
          <th>More</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($tags as $tag)
          <tr>
              <td>{{$tag->name}}</td>
                <td>{{$tag->created_at}}</td>
                <td>{{$tag->updated_at}}</td>
              <td>
                <a class="btn btn-default btn-xs" href="{{url('administrator/tags/'.$tag->id.'/edit')}}"><i class="fa fa-pencil"></i></a> 
              <a href="#" class="btn btn-danger btn-xs rmTagBtn" data-id="{{$tag->id}}"><i class="fa fa-trash">
                  </i></a></td>       
              </tr> 
          @endforeach
                 
        </tbody>
       
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
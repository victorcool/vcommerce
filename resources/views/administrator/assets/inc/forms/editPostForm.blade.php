 <!-- Input addon -->
 <div class="box box-success">
           
    <div class="box-body">  
        
            <div class="box-body">
              <div class="form-group">
                <label for="title">Email address</label>
              <input type="text" name="postTitle" class="form-control" value="{{$post->title}}" id="Title" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="postBody">Password</label>
                <textarea name="postBody" id="article-ckeditor" class="form-control">{{$post->body}}</textarea>
              </div>
              
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
             
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
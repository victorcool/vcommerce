 <!-- Input addon -->
 <div class="box box-success">
           
  <div class="box-body">          
          <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                    <input type="text" name="category_name" class="form-control" value="{{$categoryToEdit->category_name}}" id="Title" placeholder="Product name">
                      </div>
                </div>   
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="category_url">Url</label>
                        <input type="text" name="category_url" class="form-control" value="{{$categoryToEdit->url}}" id="Title" placeholder="Product name">
                      </div>
                </div>                 
            <div class="col-md-12">
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="article-ckeditor" class="form-control">{{$categoryToEdit->description}}</textarea>
                  </div>
            </div> 
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
            
  </div>
      </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
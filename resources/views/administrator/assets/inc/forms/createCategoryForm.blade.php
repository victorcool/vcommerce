 <!-- Input addon -->
 <div class="box box-success">
           
    <div class="box-body">          
            <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                  <div class="form-group {{ ($errors->has('category_name')) ? 'has-error' : '' }}">
                          <label for="category_name">Category Name</label>
                          <input type="text" name="category_name" class="form-control" id="Title" placeholder="Product name">
                          @if($errors->has('category_name'))
                            <span class="help-block">
                              <strong>{{ $errors->first('category_name') }}</strong>
                            </span>
                          @endif
                        </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                          <label for="category_url">Url</label>
                          <input type="text" name="category_url" class="form-control" id="Title" placeholder="Product name">
                        </div>
                  </div>                  
              <div class="col-md-12">
                  <div class="form-group {{ ($errors->has('description')) ? 'has-error' : ''}}">
                      <label for="description">Description</label>
                      <textarea name="description" id="article-ckeditor" class="form-control"></textarea>
                      @if ($errors->has('description'))
                      <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                      </span>
                      @endif
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
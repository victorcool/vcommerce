 <!-- Input addon -->
 <div class="box box-success">
           
    <div class="box-body">          
            <div class="box-body">
                <div class="row">                 
                  <div class="col-md-12">
                  <div class="form-group {{ ($errors->has('service_name')) ? 'has-error' : '' }}">
                          <label for="service_name">Service Name</label>
                          <input type="text" name="service_name" class="form-control" id="Title" placeholder="Service name">
                          @if($errors->has('service_name'))
                            <span class="help-block">
                              <strong>{{ $errors->first('service_name') }}</strong>
                            </span>
                          @endif
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
              <div class="wrap-custom-file col-md-3 col-xs-6">
                  <input type="file" name="image" id="image2" accept=".gif, .jpg, .png" />
                  <label  for="image2">
                    <span>Image Two</span>
                    <i class="fa fa-plus-circle"></i>
                  </label>
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
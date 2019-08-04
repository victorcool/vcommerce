 <!-- Input addon -->
 <div class="box box-success">           
    <div class="box-body">          
        <div class="box-body">
             <div class="row">
                <div class="col-md-12">
                  <div class="form-group {{ ($errors->has('tag_name')) ? 'has-error' : '' }}">
                          <label for="tag_name">Tag Name</label>
                          <input type="text" name="tag_name" class="form-control" id="Title" placeholder="Tag name" required>
                          @if($errors->has('tag_name'))
                            <span class="help-block">
                              <strong>{{ $errors->first('tag_name') }}</strong>
                            </span>
                          @endif
                        </div>
                  </div>
                </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-success btn-block">Submit</button>
            </div>
             
    </div>
  </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
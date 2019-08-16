 <!-- Input addon -->
 <div class="box box-success">
           
    <div class="box-body">          
            <div class="box-body">
                <div class="row">                 
                  <div class="col-md-12">
                  <div class="form-group {{ ($errors->has('role_name')) ? 'has-error' : '' }}">
                          <label for="service_name">Role Name</label>
                          <input type="text" name="role_name" class="form-control" id="Title" placeholder="Role name" required>
                          @if($errors->has('role_name'))
                            <span class="help-block">
                              <strong>{{ $errors->first('role_name') }}</strong>
                            </span>
                          @endif
                        </div>
                  </div>       
                </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-success btn-block">Save</button>
            </div>
        </div>
     </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
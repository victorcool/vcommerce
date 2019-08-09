 <!-- Input addon -->
 <div class="box box-success">
           
    <div class="box-body">          
            <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="site_title {{ ($errors->has('site_title')) ? 'has-error' : '' }}">Site title</label>
                        <input type="text" name="site_title" value="{{$setting->title}}" class="form-control" id="Title" >
                    </div>
                    @if($errors->has('site_title'))
                    <span class="help-block">
                      {{ $errors->first('site_title') }}
                    </span>
                  @endif
                  </div>
                  <div class="col-md-12">
                        <div class="form-group">
                            <label for="first_email {{ ($errors->has('first_email')) ? 'has-error' : '' }}">First email (compulsory)</label>
                            <input type="text" name="first_email" value="{{$setting->email1}}" class="form-control" id="Title" >
                        </div>
                        @if($errors->has('first_email'))
                        <span class="help-block">
                          {{ $errors->first('first_email') }}
                        </span>
                      @endif
                  </div> 
                  <div class="col-md-12">
                        <div class="form-group">
                            <label for="second_mail">Second email (Optional)</label>
                            <input type="text" name="second_email" value="{{$setting->email2}}" class="form-control" id="Title" >
                        </div>
                  </div> 
                    <div class="col-md-12">
                        <div class="form-group {{ ($errors->has('first_number')) ? 'has-error' : '' }}">
                            <label for="first_number">First PhoneNumber (Compulsory)</label>
                            <input type="text" name="first_number" value="{{$setting->phone1}}" class="form-control" id="Title" >
                        </div>
                        @if($errors->has('first_number'))
                        <span class="help-block">
                          {{ $errors->first('first_number') }}
                        </span>
                      @endif
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="second_number">Second PhoneNumber (optional)</label>
                            <input type="text" name="second_number" value="{{$setting->phone2}}" class="form-control" id="Title" >
                        </div>
                    </div> 
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="facebook {{ ($errors->has('facebook')) ? 'has-error' : '' }}">facebook (optional)</label>
                            <input type="text" name="facebook" value="{{$setting->facebook}}" class="form-control" id="Title" >
                        </div>
                        @if($errors->has('facebook'))
                            <span class="help-block">
                              {{ $errors->first('facebook') }}
                            </span>
                          @endif
                    </div>  
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="instagram {{ ($errors->has('instagram')) ? 'has-error' : '' }}">Instagram(optional)</label>
                            <input type="text" name="instagram" value="{{$setting->instagram}}" class="form-control" id="Title" >
                        </div>
                        @if($errors->has('instagram'))
                            <span class="help-block">
                              {{ $errors->first('instagram') }}
                            </span>
                          @endif
                    </div> 
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="twitter">twitter (optional)</label>
                            <input type="text" name="twitter" value="{{$setting->twitter}}" class="form-control" id="Title" >
                        </div>
                    </div> 
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="address">address (optional)</label>
                            <input type="text" name="address" value="{{$setting->address}}" class="form-control" id="Title" >
                        </div>
                    </div>                 
                       
              
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-success">Click to Update</button>
            </div>
             
    </div>
  </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
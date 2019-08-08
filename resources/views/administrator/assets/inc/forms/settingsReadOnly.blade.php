 <!-- Input addon -->
 <div class="box box-success">
           
    <div class="box-body">          
            <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="category_name">Site title</label>
                        <input type="text" name="site_title" value="{{$setting->title}}" class="form-control" id="Title" >
                    </div>
                  </div>
                  <div class="col-md-12">
                        <div class="form-group">
                            <label for="second_mail">First email (compulsory)</label>
                            <input type="text" name="second_mail" value="{{$setting->email1}}" class="form-control" id="Title" >
                        </div>
                  </div> 
                  <div class="col-md-12">
                        <div class="form-group">
                            <label for="second_mail">Second email (Optional)</label>
                            <input type="text" name="second_mail" value="{{$setting->email2}}" class="form-control" id="Title" >
                        </div>
                  </div> 
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="first_number">First PhoneNumber (Compulsory)</label>
                            <input type="text" name="first_number" value="{{$setting->phone1}}" class="form-control" id="Title" >
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="second_number">Second PhoneNumber (optional)</label>
                            <input type="text" name="second_number" value="{{$setting->phone2}}" class="form-control" id="Title" >
                        </div>
                    </div> 
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="facebook">facebook (optional)</label>
                            <input type="text" name="facebook" value="{{$setting->facebook}}" class="form-control" id="Title" >
                        </div>
                    </div>  
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="instagram">Instagram(optional)</label>
                            <input type="text" name="second_number" value="{{$setting->instagram}}" class="form-control" id="Title" >
                        </div>
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
 <!-- Input addon -->
 <div class="box box-success">
           
<div class="box-body">          
<div class="box-body">
    <div class="row">
       
        <div class="col-md-6">
        <div class="form-group {{ ($errors->has('fullname')) ? 'has-error' : '' }}">
                <label for="fullname">Full Name</label>
                <input type="text" name="fullname" autofocus class="form-control" id="fullname" placeholder="full name">
                @if($errors->has('fullname'))
                <span class="help-block">
                    <strong>{{ $errors->first('fullname') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
        <div class="form-group {{ ($errors->has('phone')) ? 'has-error' : '' }}">
            <label for="phone">Phone number</label>
            <input type="number" name="phone" class="form-control" id="phone" placeholder="Phone Number">
            @if($errors->has('phone'))
            <span class="help-block">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
            @endif
         </div>
        </div>    
        <div class="col-md-6">
            <div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="email">
                @if($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group {{ ($errors->has('password')) ? 'has-error' : '' }}">
                <label for="email">password</label>
                <input type="text" name="password" class="form-control" id="password" placeholder="password">
                @if($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group {{ ($errors->has('role')) ? 'has-error' : '' }}">
                <label for="role">Role</label>
                <select name="role" class="form-control" id="assignRole">
                    <option value="" hidden>Choose role</option>
                    @foreach ($roles as $role) 
                    <option value="{{$role->role_name}}">{{$role->role_name}}</option> 
                    @endforeach
                </select>                
                @if($errors->has('role'))
                <span class="help-block">
                    <strong>{{ $errors->first('role') }}</strong>
                </span>
                @endif
            </div>
        </div>    

        <div class="col-md-12" id="">
            <div class="well" id="adminDetailForm">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="role">facebook</label>
                            <input type="text" class="form-control" name="facebook">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="role">Instagram</label>
                            <input type="text" class="form-control" name="instagram">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="role">twitter</label>
                            <input type="text" class="form-control" name="twitter">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="role">Linkedin</label>
                            <input type="text" class="form-control" name="linkedin">
                        </div>
                    </div>
                    <div class="col-md-12">
                            <div class="form-group">
                                <label for="role">Position</label>
                                <input type="text" class="form-control" name="position">
                            </div>
                        </div>
                        <div class="col-md-12">
                                <div class="form-group">
                                    <label for="role">image</label>
                                    <input type="file" class="form-control" name="cover_img">
                                </div>
                        </div>
                </div>
                
            </div>
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
 <!-- Input addon -->
 <div class="box box-success">           
    <div class="box-body">          
        <div class="box-body">
             <div class="row">
                <div class="col-md-12">

                <div class="form-group {{ ($errors->has('utility_label')) ? 'has-error' : '' }}">
                        <label for="utility_title">label</label>
                        <select name="utility_label" class="form-control" id="UtilityTitle" required>
                            <option value="" hidden>-- Select label --</option>
                            <optgroup>
                                @foreach ($labelsToSelect as $LabelSel)
                            <option value="{{$LabelSel->id}}">{{$LabelSel->name}}</option>  
                                @endforeach
                                
                            </optgroup>
                        </select>
                        @if($errors->has('utility_label'))
                            <span class="help-block">
                            <strong>{{ $errors->first('utility_label') }}</strong>
                            </span>
                        @endif
                    </div>

                  <div class="form-group {{ ($errors->has('utility_title')) ? 'has-error' : '' }}">
                          <label for="utility_title">utility title</label>
                          <input type="text" name="utility_title" class="form-control" id="Title" placeholder="utility name" required>
                          @if($errors->has('utility_title'))
                            <span class="help-block">
                              <strong>{{ $errors->first('utility_title') }}</strong>
                            </span>
                          @endif
                    </div>
                   
                    <div class="form-group {{ ($errors->has('utilityBody')) ? 'has-error' : '' }}">
                        <label for="utilityBody">Password</label>
                        <textarea name="utilityBody" id="article-ckeditor" class="form-control"></textarea>
                        @if($errors->has('utilityBody'))
                            <span class="help-block">
                                <strong>{{ $errors->first('utilityBody') }}</strong>
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
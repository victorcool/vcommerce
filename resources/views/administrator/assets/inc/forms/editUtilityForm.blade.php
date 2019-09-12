 <!-- Input addon -->
 <div class="box box-success">           
        <div class="box-body">          
            <div class="box-body">
                 <div class="row">
                    <div class="col-md-8">
                    <form action="{{route('utilityUpdate', $utility->id)}}" method="post">
                        {{ csrf_field() }}
                    <div class="form-group {{ ($errors->has('utility_label')) ? 'has-error' : '' }}">
                            <label for="utility_title">label</label>
                            <select name="utility_label" class="form-control" id="UtilityTitle" required>
                                <option value="{{$prevLabel->id}}">prev({{$prevLabel->name}})</option>
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
                        <input type="text" name="utility_title" value="{{$utility->title}}" class="form-control" id="Title" placeholder="utility name" required>
                            @if($errors->has('utility_title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('utility_title') }}</strong>
                            </span>
                            @endif
                        </div>
                        
                        <div class="form-group {{ ($errors->has('utilityBody')) ? 'has-error' : '' }}">
                            <label for="utilityBody">Password</label>
                            <textarea name="utilityBody" id="article-ckeditor" class="form-control">
                                {{$utility->body}}
                            </textarea>
                            @if($errors->has('utilityBody'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('utilityBody') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        <div class="box-footer">
                                <button type="submit" class="btn btn-success btn-block">Apply</button>
                        </div>
                    </form>
                    
                      </div>

                      <div class="col-md-4">
                      <form action="{{route('utility.image.update',$utility->id)}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                            <div class="form-group">
                                    <input type="file" name="image" class="form-group input-sm">
                                </div>
                                <div class="box-footer">
                                <button type="submit" class="btn btn-success btn-block">Apply</button>
                            </div>
                          </form>                            
                      </div>

                    </div>
                <!-- /.box-body -->
                
                 
        </div>
      </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
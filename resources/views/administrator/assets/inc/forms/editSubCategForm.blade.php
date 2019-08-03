 <!-- Input addon -->
 <div class="box box-success">
           
        <div class="box-body">          
        <div class="box-body">
            <div class="row">
                <div class="col-md-5">
                <div class="form-group {{ ($errors->has('category')) ? 'has-error': '' }}">
                        <label for="category">Category</label>
                        <select name="category" class="form-control" id="">
                                <option hidden value="">Choose category</option>
                                @if (count($categories) > 0)
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category_name}}</option>  
                                    @endforeach
                                @endif
                            </select>
                    </div>
                </div>
                <div class="col-md-5">
                <div class="form-group {{($errors->has('subcategory')) ? 'has-error' : '' }}">
                        <label for="subcategory">SubCateg title</label>
                    <input type="text" name="subcategory" class="form-control" value="{{$subcategory->subcateg_name}}" id="" placeholder="Title">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" id="">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                        <div class="form-group {{($errors->has('subcategory_url')) ? 'has-error' : '' }}">
                            <label for="subcategory_url">Url</label>
                            <input type="text" name="subcategory_url" value="{{$subcategory->url}}" class="form-control" id="Title" placeholder="Enter Url">
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
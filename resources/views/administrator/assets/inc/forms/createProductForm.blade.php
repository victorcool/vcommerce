 <!-- Input addon -->
 <div class="box box-success">
           
    <div class="box-body">          
            <div class="box-body">
              <div class="row">
                @include('administrator/assets.inc.forms.imageUploadBox')
               
              </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="category">Category</label>
                          <select name="category" id="Categ" class="form-control input-sm">
                            @foreach ($categories as $category)
                          <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="subcategory">subCategory</label>
                          <select name="subcategory" id="Subcategory"  class="form-control input-sm">
                            
                          </select>
                        </div>
                      </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="product_name">Product Name</label>
                          <input type="text" value="{{old('product_name')}}" name="product_name" class="input-sm form-control" id="Title" placeholder="Product name">
                        </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="status">Product Status</label>
                          <select class="form-control input-sm" name="status" id="Status">
                            <option value="1">Active</option>
                            <option value="0">inactive</option>
                          </select>
                        </div>
                  </div>
                  
                  <div class="col-md-3">
                      <div class="form-group">
                          <label for="regularprice">Regular price</label>
                          <input type="number" value="{{old('regularPrice')}}" name="regularPrice" class="input-sm form-control" id="rprice" placeholder="Regular price">
                        </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group">
                          <label for="discountPrice">Discount price</label>
                          <input type="number" value="{{old('discountPrice')}}" name="discountPrice" class="input-sm form-control" id="dprice" placeholder="Discount price">
                        </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group {{($errors->has('quantity')) ? 'has-error' : ''}}">
                          <label for="qauntity">Quantity</label>
                      <input type="number" value="{{old('quantity')}}" name="quantity" class="form-control input-sm" id="Quantity" placeholder="Quantity">
                        </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group {{($errors->has('tag')) ? 'has-error' : ''}}">
                      <label for="tag">Tag</label>
                      <select class="form-control select2 input-sm" name="tag[]" multiple="multiple" data-placeholder="Select a Tag"
                              style="width: 100%;">
                        <option>healmass</option>
                        <option>parent</option>
                        <option>banner</option>
                        <option>slider</option>
                        <option>Tennessee</option>
                        <option>Texas</option>
                        <option>Washington</option>
                      </select>
                    </div>
                  </div>

              <div class="col-md-12">
                  <div class="form-group">
                      <label for="description">Description</label>
                      <textarea name="description" id="article-ckeditor" class="form-control"></textarea>
                    </div>
              </div>            
              
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
             
    </div>
  </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
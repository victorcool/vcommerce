 <!-- Input addon -->
 <div class="box box-success">
           
        <div class="box-body">          
                <div class="box-body">
                  <div class="row">
                       @foreach ($prevProduct as $prevPro)
                           <div class="col-md-3">
                           <img src="{{asset('uploads/products_images/'.$prevPro->image)}}" class="img-thumbnail" alt="no image" sizes="" srcset="">
                           <div class="wrap-custom-file col-md-3 col-xs-6 {{($errors->has('image1')) ? 'has-error' : '' }}">
                                <input type="file" name="image[]" id="image1" accept=".gif, .jpg, .png" />
                                <label  for="image1">
                                  <span>Image One</span>
                                  <i class="fa fa-plus-circle"></i>
                                </label>
                              </div>
                              <button type="button" class="btn btn-xs btn-default">Save</button>
                           </div>
                       @endforeach             
                  </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="category">Category</label>
                              <select name="category" id="Categ" class="form-control input-sm">
                                @foreach ($prevProduct as $prevPro)@endforeach
                                <option value="{{$prevPro->productId}}"> {{$prevPro->category_name}}</option>

                                @foreach ($categories as $category)                               
                              <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="subcategory">subCategory</label>
                              <select name="subcategory"  id="Subcategory"  class="form-control input-sm">
                                <option value="{{$prevPro->subcateg_id}}">{{$prevPro->subcateg_name}}</option>
                              </select>
                            </div>
                          </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="product_name">Product Name</label>
                              <input type="text" value="{{$prevPro->product_name}}" name="product_name" class="input-sm form-control" id="Title" placeholder="Product name">
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
                              <input type="number" value="{{$prevPro->regular_price}}" name="regularPrice" class="input-sm form-control" id="rprice" placeholder="Regular price">
                            </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                              <label for="discountPrice">Discount price</label>
                              <input type="number" value="{{$prevPro->discount_price}}" name="discountPrice" class="input-sm form-control" id="dprice" placeholder="Discount price">
                            </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group {{($errors->has('quantity')) ? 'has-error' : ''}}">
                              <label for="qauntity">Quantity</label>
                          <input type="number" value="{{$prevPro->qauntity}}" name="quantity" class="form-control input-sm" id="Quantity" placeholder="Quantity">
                            </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group {{($errors->has('tag')) ? 'has-error' : ''}}">
                          <label for="tag">Tag</label>
                          <select class="form-control select2 input-sm" name="tag[]" multiple="multiple" data-placeholder="Select a Tag"
                                  style="width: 100%;">
                            @foreach ($prevProduct as $prevPro)
                            <option value="{{$prevPro->tagId}}">{{$prevPro->name}} - prev</option>
                            @endforeach 
                            {{-- from ProductsController --}}                            
                            @foreach ($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach                        
                          </select>
                        </div>
                      </div>
    
                  <div class="col-md-12">
                      <div class="form-group">
                          <label for="description">Description</label>
                          <textarea name="description" id="article-ckeditor" class="form-control">                             
                                {{$prevPro->productDescription}}                             
                          </textarea>
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
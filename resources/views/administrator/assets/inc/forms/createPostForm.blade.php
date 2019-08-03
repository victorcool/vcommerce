<!-- Input addon -->
<div class="box box-success">
    <div class="box-body">  
		<div class="box-body">
				<div class="form-group {{ ($errors->has('postTitle')) ? 'has-error' : '' }}">
					<label for="title">Email address</label>
					<input type="text" name="postTitle" class="form-control" id="Title" placeholder="Enter email">
					@if($errors->has('postTitle'))
						<span class="help-block">
							<strong>{{ $errors->first('postTitle') }}</strong>
						</span>
					@endif
				</div>
				<div class="form-group {{ ($errors->has('postBody')) ? 'has-error' : '' }}">
					<label for="postBody">Password</label>
					<textarea name="postBody" id="article-ckeditor" class="form-control"></textarea>
					@if($errors->has('postBody'))
						<span class="help-block">
							<strong>{{ $errors->first('postBody') }}</strong>
						</span>
					@endif
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
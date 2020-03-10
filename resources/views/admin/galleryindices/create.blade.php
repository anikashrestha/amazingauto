@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')
<div class="content-wrapper">
                <div class="panel pandel-default">
                                <div class="panel-heading">
                               <h1 style="text-align:center">     
                              Add Car
                               </h1>
                                    <br>
                                    <small style="text-align:center">All filed with <label class="required-field-class">*</label> are mandatory.</small>
                                </div>

      <div class="panel-body">
                <form action="{{ route('admin.galleryindices.store')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                     
                        <div class="form-group {{ $errors->has('car')?'has-error':'' }}">
                            <label for="car">Title<label class="required-field-class">*</label></label>
                            <input type="text" class="form-control" name="car" id="car" placeholder="Title" value="{{ old('car') }}">
                            @if($errors->has('car'))
                            <span class="help-block">
                                {{ $errors->first('car') }}
                            </span>
                            @endif
                        </div>
                       
                                <div class="form-group">
                               <label for="carphoto">Photo<label class="required-field-class">*</label></label>
                               <input type="file" class="form-control" name="carphoto" id="carphoto">
                               <small>Please Upload Image Size up to 2mb</small>
                               @if($errors->has('carphoto'))
                               <span class="help-block">
                                       {{ $errors->first('carphoto') }}
                               </span>
                               @endif       
                        </div>
                        <div class="form-group {{ $errors->has('price')?'has-error':'' }}">
                            <label for="price">Price<label class="required-field-class">*</label></label>
                            <input type="textbox" class="form-control" name="price" id="price" placeholder="Price" value="{{ old('price') }}">
                             @if($errors->has('price'))
                            <span class="help-block">
                                {{ $errors->first('price') }}
                            </span>
                            @endif
                        </div>
                       

                        <div class="form-group {{ $errors->has('status')?'has-error':'' }}">
                            <input type="checkbox" value="1" checked id="status" name="status">
                            <label for="status">Status</label>
                            </div>
            
    
        
                        <div class="form-group">
                            <button class="btn btn-success">
                                Add Car in index page
                            </button>
                        </div>
        
                    </form>
                </div>
            

        </div>
</div>

        @include('admin.adminfooter')

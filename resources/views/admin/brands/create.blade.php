@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')
<div class="content-wrapper">
                <div class="panel pandel-default">
                                <div class="panel-heading">
                               <h1 style="text-align:center">     
                              Add Brands
                               </h1>
                                    <br>
                                    <small style="text-align:center">All filed with <label class="required-field-class">*</label> are mandatory.</small>
                                </div>

      <div class="panel-body">
                <form action="{{ route('admin.brands.store')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                     
                        <div class="form-group {{ $errors->has('name')?'has-error':'' }}">
                            <label for="name">Title<label class="required-field-class">*</label></label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Title" value="{{ old('name') }}">
                            @if($errors->has('name'))
                            <span class="help-block">
                                {{ $errors->first('name') }}
                            </span>
                            @endif
                        </div>
                       
                                <div class="form-group">
                               <label for="brand_icon">Icon<label class="required-field-class">*</label></label>
                               <input type="file" class="form-control" name="brand_icon" id="brand_icon">
                               <small>Please Upload Image Size up to 2mb</small>
                               @if($errors->has('brand_icon'))
                               <span class="help-block">
                                       {{ $errors->first('brand_icon') }}
                               </span>
                               @endif       
                        </div>

                        <div class="form-group {{ $errors->has('status')?'has-error':'' }}">
                            <input type="checkbox" value="1" checked id="status" name="status">
                            <label for="status">Status</label>
                            </div>
            
    
        
                        <div class="form-group">
                            <button class="btn btn-success">
                                Add Brand
                            </button>
                        </div>
        
                    </form>
                </div>
            

        </div>
</div>

        @include('admin.adminfooter')
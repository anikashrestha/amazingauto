@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')
<div class="content-wrapper">
                <div class="panel pandel-default">
                                <div class="panel-heading">
                               <h1 style="text-align:center">     
                              Create Banner
                               </h1>
                                    <br>
                                    <small style="text-align:center">All filed with <label class="required-field-class">*</label> are mandatory.</small>
                                </div>

      <div class="panel-body">
                <form action="{{ route('admin.banner.store')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                     
                        <div class="form-group {{ $errors->has('name')?'has-error':'' }}">
                            <label for="name">Title<label class="required-field-class">*</label></label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Banner Name" value="{{ old('name') }}">
                            @if($errors->has('name'))
                            <span class="help-block">
                                {{ $errors->first('name') }}
                            </span>
                            @endif
                        </div>
                       
                                <div class="form-group">
                               <label for="banner">Banner<label class="required-field-class">*</label></label>
                               <input type="file" class="form-control" name="banner" id="banner">
                               <small>Please Upload Image Size up to 2mb</small>
                               @if($errors->has('banner'))
                               <span class="help-block">
                                       {{ $errors->first('banner') }}
                               </span>
                               @endif       
                        </div>

                        <div class="form-group {{ $errors->has('status')?'has-error':'' }}">
                            <input type="checkbox" value="1" checked id="status" name="status">
                            <label for="status">Status</label>
                            </div>
            
    
        
                        <div class="form-group">
                            <button class="btn btn-success">
                                Create Banner
                            </button>
                        </div>
        
                    </form>
                </div>
            

        </div>
</div>

        @include('admin.adminfooter')
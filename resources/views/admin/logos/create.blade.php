@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')
<div class="content-wrapper">
                <div class="panel pandel-default">
                                <div class="panel-heading">
                               <h1 style="text-align:center">     
                              Add Logos
                               </h1>
                                    <br>
                                    <small style="text-align:center">All filed with <label class="required-field-class">*</label> are mandatory.</small>
                                </div>

      <div class="panel-body">
                <form action="{{ route('admin.logos.store')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                     
                        <div class="form-group {{ $errors->has('name')?'has-error':'' }}">
                            <label for="name">Title<label class="required-field-class">*</label></label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{ old('title') }}">
                            @if($errors->has('title'))
                            <span class="help-block">
                                {{ $errors->first('title') }}
                            </span>
                            @endif
                        </div>
                       
                                <div class="form-group">
                               <label for="logo">Logo<label class="required-field-class">*</label></label>
                               <input type="file" class="form-control" name="logo" id="logo">
                               <small>Please Upload Image Size up to 2mb</small>
                               @if($errors->has('logo'))
                               <span class="help-block">
                                       {{ $errors->first('logo') }}
                               </span>
                               @endif       
                        </div>

                        <div class="form-group {{ $errors->has('status')?'has-error':'' }}">
                            <input type="checkbox" value="1" checked id="status" name="status">
                            <label for="status">Status</label>
                            </div>
            
    
        
                        <div class="form-group">
                            <button class="btn btn-success">
                                Add Logo
                            </button>
                        </div>
        
                    </form>
                </div>
            

        </div>
</div>

        @include('admin.adminfooter')
@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')
<div class="content-wrapper">
                <div class="panel pandel-default">
                                <div class="panel-heading">
                               <h1 style="text-align:center">     
                              Create Gallery
                               </h1>
                                    <br>
                                    <small style="text-align:center">All filed with <label class="required-field-class">*</label> are mandatory.</small>
                                </div>

      <div class="panel-body">
                <form action="{{ route('admin.gallery.store')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                     
                        <div class="form-group {{ $errors->has('name')?'has-error':'' }}">
                            <label for="name">Name<label class="required-field-class">*</label></label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Gallery Name" value="{{ old('name') }}">
                            @if($errors->has('name'))
                            <span class="help-block">
                                {{ $errors->first('name') }}
                            </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('description')?'has-error':'' }}">
                                        <label for="description">Description<label class="required-field-class">*</label></label>
                        
                                        <textarea name="description" id="experience_required" placeholder="Description" cols="5" rows="5" class="form-control">{{ old('description') }}</textarea>
                                @if($errors->has('description'))
                                <span class="help-block">
                                        {{ $errors->first('description') }}
                                </span>
                                @endif
                                </div>

                                <div class="form-group">
                               <label for="cover_image">Cover Image<label class="required-field-class">*</label></label>
                               <input type="file" class="form-control" name="cover_image" id="cover_image">
                               <small>Please Upload Image Size up to 2mb</small>
                               @if($errors->has('cover_image'))
                               <span class="help-block">
                                       {{ $errors->first('cover_image') }}
                               </span>
                               @endif       
                        </div>
        
                        <div class="form-group">
                            <button class="btn btn-success">
                                Create Gallery
                            </button>
                        </div>
        
                    </form>
                </div>
            

        </div>
</div>

        @include('admin.adminfooter')
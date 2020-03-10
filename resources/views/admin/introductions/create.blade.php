@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')
<div class="content-wrapper">
                <div class="panel pandel-default">
                                <div class="panel-heading">
                               <h1 style="text-align:center">     
                              Add Introduction
                               </h1>
                                    <br>
                                    <small style="text-align:center">All filed with <label class="required-field-class">*</label> are mandatory.</small>
                                </div>

      <div class="panel-body">
                <form action="{{ route('admin.introductions.store')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                     
                        <div class="form-group {{ $errors->has('title')?'has-error':'' }}">
                            <label for="name">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{ old('title') }}">
                            @if($errors->has('title'))
                            <span class="help-block">
                                {{ $errors->first('title') }}
                            </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('text')?'has-error':'' }}">
                            <label for="text">Text<label class="required-field-class">*</label></label>
            
                            <textarea style="height: 200px;" name="text" id="body" cols="5" rows="10" class="form-control">{{ old('text') }}</textarea>
                    @if($errors->has('text'))
                    <span class="help-block">
                            {{ $errors->first('text') }}
                    </span>
                    @endif
                    </div>
                       
                                <div class="form-group">
                               <label for="image">Image<label class="required-field-class">*</label></label>
                               <input type="file" class="form-control" name="image" id="image">
                               <small>Please Upload Image Size up to 2mb</small>
                               @if($errors->has('image'))
                               <span class="help-block">
                                       {{ $errors->first('image') }}
                               </span>
                               @endif       
                        </div>

                      
            
    
        
                        <div class="form-group">
                            <button class="btn btn-success">
                               Add  Introduction
                            </button>
                        </div>
        
                    </form>
                </div>
            

        </div>
</div>

        @include('admin.adminfooter')
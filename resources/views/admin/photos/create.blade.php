@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')
<div class="content-wrapper">

      <div class="panel pandel-default">
                <div class="panel-heading">
               <h1 style="text-align:center">     
              Add Photos to Gallery
               </h1>
                    <br>
                    <small style="text-align:center">All filed with <label class="required-field-class">*</label> are mandatory.</small>
                </div>
        

    <div class="panel-body">
                <form action="{{ route('admin.photos.store',['id'=>$album->id])}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                <input type="hidden" name="album_id" value="{{$album->id}}" id="album_id"/>
                        {{-- <div class="form-group {{ $errors->has('name')?'has-error':'' }}">
                            <label for="title">Title<label class="required-field-class">*</label></label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{ old('title') }}">
                            @if($errors->has('title'))
                            <span class="help-block">
                                {{ $errors->first('title') }}
                            </span>
                            @endif
                        </div> --}}
                        {{-- <div class="form-group {{ $errors->has('description')?'has-error':'' }}">
                                        <label for="description">Description<label class="required-field-class">*</label></label>
                        
                                        <textarea name="description" id="experience_required" placeholder="Description" cols="5" rows="5" class="form-control">{{ old('description') }}</textarea>
                                @if($errors->has('description'))
                                <span class="help-block">
                                        {{ $errors->first('description') }}
                                </span>
                                @endif
                                </div> --}}

                         

                                <div class="form-group">
                               <label for="photo">Photos<label class="required-field-class">*</label></label>
                               <input type="file" class="form-control" name="photo[]" multiple id="photo">
                               @if($errors->has('photo'))
                               <span class="help-block">
                                       {{ $errors->first('photo') }}
                               </span>
                               @endif       
                        </div>
        
                        <div class="form-group">
                            <button class="btn btn-success">
                                Add Photos
                            </button>
                        </div>
        
                    </form>
                </div>
      </div>
            
{{-- <div class = "row" >
        <div class = "col-md-12 ">
        <div class = "panel panel-default">
        <div class = "panel-heading">Upload Photo</div>
        <div class = "panel-body">
{!!Form::open(['action' => 'PhotosController@store','method' => 'POST','enctype' => 'multipart/form-data'])!!}
{{Form::bsText('title','',['placeholder' => 'Photo Name'])}}
{{Form::bsTextArea('description','',['placeholder' => 'Photo Description'])}}
 {{Form::hidden('album_id',$album_id)}}
 {{-- {{Form::file('photo')}} --}}
 {{-- <div class="form-group">
<input type="file" name="photo[]" multiple/>
 </div>
<br>

{{Form::submit('Create',['class' =>'btn btn-sm btn-primary'])}}

{!!Form::close()!!}

        </div>
        </div>
    </div>
</div>
        </div>
        </div> --}} 
        </div>
        @include('admin.adminfooter')

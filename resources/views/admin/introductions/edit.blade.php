@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')



<div class="content-wrapper">
  <div class="panel pandel-default">
    <div class="panel-heading">
      <h1 style="text-align:center">
        Edit Introduction
      </h1>
      <br>
      <small style="text-align:center">All filed with <label class="required-field-class">*</label> are
        mandatory.</small>
    </div>

    <div class="panel-body">
      <form action="{{ route('admin.introductions.update',['id'=>$introduction->id])}}" method="POST"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $introduction->id}}" />
        <div class="form-group {{ $errors->has('title')?'has-error':'' }}">
          <label for="title">Title</label>
          <input type="text" class="form-control" name="title" id="title" placeholder="Title"
            value="{{$introduction->title }}">
          @if($errors->has('title'))
          <span class="help-block">
            {{ $errors->first('title') }}
          </span>
          @endif
        </div>
        <div>

          <div class="form-group {{ $errors->has('text')?'has-error':'' }}">
            <label for="text">Text<label class="required-field-class">*</label></label>

            <textarea style="height: 200px;" name="text" id="body" cols="5" rows="10"
              class="form-control">{{ $introduction->text }}</textarea>
            @if($errors->has('text'))
            <span class="help-block">
              {{ $errors->first('text') }}
            </span>
            @endif
          </div>
          <div class="form-group">

            <img src="/storage/introductions/{{$introduction->image}}" height="100px" width="200px"
              alt="{{ $introduction->title }}">
            <br>
            <small><a href="#" id="imageButton">View Image</a></small>
          </div>

          <div class="form-group">
            <label for="image">Change Image</label>
            <input type="file" class="form-control" name="image" id="image"
              value="/storage/introductions/{{$introduction->image}}">
            <small>Please Upload Image Size up to 2mb</small>
          </div>
        </div>




        <div class="form-group">
          <button class="btn btn-success">
            Edit Introduction
          </button>
        </div>

      </form>
    </div>


    <div id="imageModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Image</h4>
          </div>
          <div class="modal-body">
            <img src="/storage/introductions/{{$introduction->image}}" alt="" class="img-responsive">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>



  </div>
</div>
@include('admin.adminfooter')
@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')
<div class="content-wrapper">
                <div class="panel pandel-default">
                                <div class="panel-heading">
                               <h1 style="text-align:center">
                              Edit Gallery
                               </h1>
                                    <br>
                                    <small style="text-align:center">All filed with <label class="required-field-class">*</label> are mandatory.</small>
                                </div>

      <div class="panel-body">

                <form action="{{ route('admin.gallery.update',['id'=>$album->id])}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('name')?'has-error':'' }}">
                            <label for="name">Name<label class="required-field-class">*</label></label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $album->name}}" placeholder="Gallery Name" value="{{ old('name') }}">
                            @if($errors->has('name'))
                            <span class="help-block">
                                {{ $errors->first('name') }}
                            </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('description')?'has-error':'' }}">
                                        <label for="description">Description<label class="required-field-class">*</label></label>

                                        <textarea name="description" id="experience_required"  placeholder="Description" cols="5" rows="5" class="form-control">{{ $album->description}}</textarea>
                                @if($errors->has('description'))
                                <span class="help-block">
                                        {{ $errors->first('description') }}
                                </span>
                                @endif
                                </div>
                            <div>
                                <div class="form-group">

                                            <img src="/storage/album_covers/{{$album->cover_image}}" height="100px" width="200px" alt="{{ $album->name }}">
                                            <br>
                                            <small><a href="#" id="imageButton">View Image</a></small>
                                        </div>

                                            <div class="form-group">
                                                <label for="cover_image">Change Cover image</label>
                                                <input type="file" class="form-control" name="cover_image" id="cover_image">
                                                <small>Please Upload Image Size up to 2mb</small>
                                            </div>

                                        </div>

                        <div class="form-group">
                            <button class="btn btn-success">
                               Save
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
                      <img src="/storage/album_covers/{{$album->cover_image}}"  alt="" class="img-responsive">
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

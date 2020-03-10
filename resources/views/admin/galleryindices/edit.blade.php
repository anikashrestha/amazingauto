@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')



<div class="content-wrapper">
                <div class="panel pandel-default">
                                <div class="panel-heading">
                               <h1 style="text-align:center">     
                              Edit Cars
                               </h1>
                                    <br>
                                    <small style="text-align:center">All filed with <label class="required-field-class">*</label> are mandatory.</small>
                                </div>

      <div class="panel-body">
            <form action="{{ route('admin.galleryindices.update',['id'=>$galleryindex->id])}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $galleryindex->id}}"/>
                        <div class="form-group {{ $errors->has('car')?'has-error':'' }}">
                            <label for="car">Title<label class="required-field-class">*</label></label>
                            <input type="text" class="form-control" name="car" id="car" placeholder="Car Name" value="{{$galleryindex->car }}">
                            @if($errors->has('car'))
                            <span class="help-block">
                                {{ $errors->first('car') }}
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                                        
                                <img src="/storage/car/{{$galleryindex->carphoto}}" height="100px" width="200px" alt="{{ $galleryindex->carphoto }}">
                                <br>
                                <small><a href="#" id="imageButton">View Image</a></small>
                            </div>
                          
                                <div class="form-group">
                                    <label for="carphoto">Change Car Photo</label>
                                <input type="file" class="form-control" name="carphoto" id="carphoto" value="/storage/car/{{$galleryindex->carphoto}}">
                                <small>Please Upload Image Size up to 2mb</small>
                            </div>

                            <div class="form-group {{ $errors->has('price')?'has-error':'' }}">
                            <label for="price">Price<label class="required-field-class">*</label></label>
                            <input type="text" class="form-control" name="price" id="price" placeholder="Price" value="{{$galleryindex->price }}">
                            @if($errors->has('price'))
                            <span class="help-block">
                                {{ $errors->first('price') }}
                            </span>
                            @endif
                        </div>

                            <div class="form-group">
                                    <input type="checkbox" value="{{ $galleryindex->status}}"  id="status" name="status" <?php echo ($galleryindex->status==1 ? 'checked' : '')?>
                                            <label for="status">Show in Home</label>
                                            </div>
                                        
            
                        <div class="form-group">
                            <button class="btn btn-success">
                                Edit cars
                            </button>
                        </div>
        
                    </form>
                </div>

                                
        <div id="imageModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
              
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Cars</h4></h4>
                    </div>
                    <div class="modal-body">
                      <img src="/storage/car/{{$galleryindex->carphoto}}"  alt="" class="img-responsive">
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
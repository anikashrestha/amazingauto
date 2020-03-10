@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')



<div class="content-wrapper">
                <div class="panel pandel-default">
                                <div class="panel-heading">
                               <h1 style="text-align:center">     
                              Edit Banner
                               </h1>
                                    <br>
                                    <small style="text-align:center">All filed with <label class="required-field-class">*</label> are mandatory.</small>
                                </div>

      <div class="panel-body">
            <form action="{{ route('admin.banners.update',['id'=>$banner->id])}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $banner->id}}"/>
                        <div class="form-group {{ $errors->has('name')?'has-error':'' }}">
                            <label for="name">Title<label class="required-field-class">*</label></label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Banner Name" value="{{$banner->name }}">
                            @if($errors->has('name'))
                            <span class="help-block">
                                {{ $errors->first('name') }}
                            </span>
                            @endif
                        </div>
                       <div>
                        <div class="form-group">
                                        
                                <img src="/storage/banners/{{$banner->banner}}" height="100px" width="200px" alt="{{ $banner->name }}">
                                <br>
                                <small><a href="#" id="imageButton">View Image</a></small>
                            </div>
                          
                                <div class="form-group">
                                    <label for="banner">Change Banner</label>
                                <input type="file" class="form-control" name="banner" id="banner" value="/storage/banners/{{$banner->banner}}">
                                <small>Please Upload Image Size up to 2mb</small>
                            </div>
                            </div>

                            <div class="form-group">
                                    <input type="checkbox" value="{{ $banner->status}}"  id="status" name="status" <?php echo ($banner->status==1 ? 'checked' : '')?>>
                                            <label for="status">Show in Home</label>
                                            </div>
                                        
            
                        <div class="form-group">
                            <button class="btn btn-success">
                                Edit Banner
                            </button>
                        </div>
        
                    </form>
                </div>

                                
        <div id="imageModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
              
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Banner</h4>
                    </div>
                    <div class="modal-body">
                      <img src="/storage/banners/{{$banner->banner}}"  alt="" class="img-responsive">
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
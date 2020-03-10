@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')



<div class="content-wrapper">
                <div class="panel pandel-default">
                                <div class="panel-heading">
                               <h1 style="text-align:center">     
                              Edit Brands
                               </h1>
                                    <br>
                                    <small style="text-align:center">All filed with <label class="required-field-class">*</label> are mandatory.</small>
                                </div>

      <div class="panel-body">
            <form action="{{ route('admin.brands.update',['id'=>$brand->id])}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $brand->id}}"/>
                        <div class="form-group {{ $errors->has('name')?'has-error':'' }}">
                            <label for="name">Title<label class="required-field-class">*</label></label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Title Name" value="{{$brand->name }}">
                            @if($errors->has('name'))
                            <span class="help-block">
                                {{ $errors->first('name') }}
                            </span>
                            @endif
                        </div>
                       <div>
                        <div class="form-group">
                                        
                                <img src="/storage/brand/{{$brand->brand_icon}}" height="100px" width="200px" alt="{{ $brand->name }}">
                                <br>
                                <small><a href="#" id="imageButton">View Image</a></small>
                            </div>
                          
                                <div class="form-group">
                                    <label for="brand_icon">Change icon</label>
                                <input type="file" class="form-control" name="brand_icon" id="brand_icon" value="/storage/brands/{{$brand->brand_icon}}">
                                <small>Please Upload Image Size up to 2mb</small>
                            </div>
                            </div>

                            <div class="form-group">
                                    <input type="checkbox" value="{{ $brand->status}}"  id="status" name="status" <?php echo ($brand->status==1 ? 'checked' : '')?>>
                                            <label for="status">Show in Home</label>
                                            </div>
                                        
            
                        <div class="form-group">
                            <button class="btn btn-success">
                                Edit Brand
                            </button>
                        </div>
        
                    </form>
                </div>

                                
        <div id="imageModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
              
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Brands</h4></h4>
                    </div>
                    <div class="modal-body">
                      <img src="/storage/brands/{{$brand->brand_icon}}"  alt="" class="img-responsive">
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
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
            <form action="{{ route('admin.brandii.update',['id'=>$brandii->id])}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $brandii->id}}"/>
                        <div class="form-group {{ $errors->has('name')?'has-error':'' }}">
                            <label for="name">Title<label class="required-field-class">*</label></label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Title Name" value="{{$brandii->name }}">
                            @if($errors->has('name'))
                            <span class="help-block">
                                {{ $errors->first('name') }}
                            </span>
                            @endif
                        </div>
                       <div>
                        <div class="form-group">
                                        
                                <img src="/storage/brandii/{{$brandii->brandicon}}" height="100px" width="200px" alt="{{ $brandii->name }}">
                                <br>
                                <small><a href="#" id="imageButton">View Image</a></small>
                            </div>
                          
                                <div class="form-group">
                                    <label for="brandicon">Change icon</label>
                                <input type="file" class="form-control" name="brandicon" id="brandicon" value="/storage/brandii/{{$brandii->brandicon}}">
                                <small>Please Upload Image Size up to 2mb</small>
                            </div>
                            </div>

                            <div class="form-group">
                                    <input type="checkbox" value="{{ $brandii->status}}"  id="status" name="status" <?php echo ($brandii->status==1 ? 'checked' : '')?>>
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
                      <img src="/storage/brandii/{{$brandii->brandicon}}"  alt="" class="img-responsive">
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
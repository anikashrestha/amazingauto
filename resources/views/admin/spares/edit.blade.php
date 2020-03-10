@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')



<div class="content-wrapper">
                <div class="panel pandel-default">
                                <div class="panel-heading">
                               <h1 style="text-align:center">     
                              Edit Spare Parts
                               </h1>
                                    <br>
                                    <small style="text-align:center">All filed with <label class="required-field-class">*</label> are mandatory.</small>
                                </div>

      <div class="panel-body">
            <form action="{{ route('admin.spares.update',['id'=>$spare->id])}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $spare->id}}"/>
                        <div class="form-group {{ $errors->has('title')?'has-error':'' }}">
                            <label for="title">Title<label class="required-field-class">*</label></label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Title Name" value="{{$spare->title }}">
                            @if($errors->has('title'))
                            <span class="help-block">
                                {{ $errors->first('title') }}
                            </span>
                            @endif
                        </div>
                       <div>
                        <div class="form-group">
                                        
                                <img src="/storage/spares/{{$spare->spareimage}}" height="100px" width="200px" alt="{{ $spare->title }}">
                                <br>
                                <small><a href="#" id="imageButton">View Image</a></small>
                            </div>
                          
                                <div class="form-group">
                                    <label for="spareimage">Change Image</label>
                                <input type="file" class="form-control" name="logo" id="spareimage" value="/storage/spares/{{$spare->spareimage}}">
                                <small>Please Upload Image Size up to 2mb</small>
                            </div>
                            </div>

                            <div class="form-group">
                                    <input type="checkbox" value="{{ $spare->status}}"  id="status" name="status" <?php echo ($spare->status==1 ? 'checked' : '')?>>
                                            <label for="status">Show in Home</label>
                                            </div>
                                        
            
                        <div class="form-group">
                            <button class="btn btn-success">
                                Edit Spare Parts
                            </button>
                        </div>
        
                    </form>
                </div>

                                
        <div id="imageModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
              
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Spare Parts</h4>
                    </div>
                    <div class="modal-body">
                      <img src="/storage/spares/{{$spare->spareimage}}"  alt="" class="img-responsive">
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
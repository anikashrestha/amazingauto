@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')



<div class="content-wrapper">
                <div class="panel pandel-default">
                                <div class="panel-heading">
                               <h1 style="text-align:center">     
                              Edit Logos
                               </h1>
                                    <br>
                                    <small style="text-align:center">All filed with <label class="required-field-class">*</label> are mandatory.</small>
                                </div>

      <div class="panel-body">
            <form action="{{ route('admin.logos.update',['id'=>$logo->id])}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $logo->id}}"/>
                        <div class="form-group {{ $errors->has('title')?'has-error':'' }}">
                            <label for="title">Title<label class="required-field-class">*</label></label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Title Name" value="{{$logo->title }}">
                            @if($errors->has('title'))
                            <span class="help-block">
                                {{ $errors->first('title') }}
                            </span>
                            @endif
                        </div>
                       <div>
                        <div class="form-group">
                                        
                                <img src="/storage/logos/{{$logo->logo}}" height="100px" width="200px" alt="{{ $logo->title }}">
                                <br>
                                <small><a href="#" id="imageButton">View Image</a></small>
                            </div>
                          
                                <div class="form-group">
                                    <label for="logo">Change Logo</label>
                                <input type="file" class="form-control" name="logo" id="logo" value="/storage/logos/{{$logo->logo}}">
                                <small>Please Upload Image Size up to 2mb</small>
                            </div>
                            </div>

                            <div class="form-group">
                                    <input type="checkbox" value="{{ $logo->status}}"  id="status" name="status" <?php echo ($logo->status==1 ? 'checked' : '')?>>
                                            <label for="status">Show in Home</label>
                                            </div>
                                        
            
                        <div class="form-group">
                            <button class="btn btn-success">
                                Edit Logo
                            </button>
                        </div>
        
                    </form>
                </div>

                                
        <div id="imageModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
              
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Logo</h4>
                    </div>
                    <div class="modal-body">
                      <img src="/storage/logos/{{$logo->logo}}"  alt="" class="img-responsive">
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
@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')
<div class="content-wrapper">
        <div class="panel pandel-default">
                <div class="panel-heading">
               <h1 style="text-align:center">     
            Update Profile
               </h1>
                    <br>
                    <small style="text-align:center">All filed with <label class="required-field-class">*</label> are mandatory.</small>
                </div>
      

      <div class="panel panel-default">
            <form action="{{ route('admin.users.update') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="panel-heading">
                    Update your profile
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}">
                    </div>

                    <div class="form-group">
                            <label for="name">Password</label>
                            <input type="password" class="form-control" name="password" id="password" value="{{ $user->password }}">
                        </div>

                    
                    <div class="row">
                        <div class="col col-md-2 text-center">
                            <img src="{{ asset($user->profile->avatar) }}" height="50px" width="50px" alt="{{ $user->name }}">
                            <br>
                            <small><a href="#" id="imageButton">View Image</a></small>
                        </div>
                        <div class="col col-md-10">
                            <div class="form-group">
                                <label for="avatar">Change image</label>
                                <input type="file" class="form-control" name="avatar" id="avatar">
                            </div>
                        </div>
                    </div>
                    
                        <div class="form-group">
                            <label>About</label>
                            <textarea name="about" id="about" cols="5" rows="5" class="form-control">{{ $user->profile->about }}</textarea>
                        </div>
    
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Update profile</button>
                        </div>
    
    
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
                      <img src="{{ asset($user->profile->avatar) }}" alt="" class="img-responsive">
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
     
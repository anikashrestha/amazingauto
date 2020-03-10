@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')
<div class="content-wrapper">
                <div class="panel pandel-default">
                                <div class="panel-heading">
                               <h1 style="text-align:center">     
                              Edit Roles
                               </h1>
                                    <br>
                                    <small style="text-align:center">All filed with <label class="required-field-class">*</label> are mandatory.</small>
                                </div>

      <div class="panel-body">
                <form action="{{ route('admin.roles.update',['id'=>$role->id])}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                     
                        <div class="form-group {{ $errors->has('name')?'has-error':'' }}">
                            <label for="name">Name<label class="required-field-class">*</label></label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="name" value="{{ $role->name }}">
                            @if($errors->has('name'))
                            <span class="help-block">
                                {{ $errors->first('name') }}
                            </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('description')?'has-error':'' }}">
                            <label for="description">Description<label class="required-field-class">*</label></label>
                            <input type="text" class="form-control" name="description" id="description" placeholder="description" value="{{ $role->description}}">
                            @if($errors->has('description'))
                            <span class="help-block">
                                {{ $errors->first('description') }}
                            </span>
                            @endif
                        </div>
                       
                             
                     
        
                        <div class="form-group">
                            <button class="btn btn-success">
                                Edit Roles
                            </button>
                        </div>
        
                    </form>
                </div>
            

        </div>
</div>

        @include('admin.adminfooter')
@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')
<div class="content-wrapper">
        <div class="panel pandel-default">
                <div class="panel-heading">
               <h1 style="text-align:center">     
             Create User
               </h1>
                    <br>
                    <small style="text-align:center">All filed with <label class="required-field-class">*</label> are mandatory.</small>
                </div>


        <div class="panel-body">
        <form action="{{ route('admin.users.store')}}" method="POST">
                {{ csrf_field() }}
             
                <div class="form-group {{ $errors->has('name')?'has-error':'' }}">
                    <label for="name">Name<label class="required-field-class">*</label></label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                    @if($errors->has('name'))
                    <span class="help-block">
                        {{ $errors->first('name') }}
                    </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('email')?'has-error':'' }}">
                    <label for="name">Email<label class="required-field-class">*</label></label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                    @if($errors->has('email'))
                    <span class="help-block">
                        {{ $errors->first('email') }}
                    </span>
                    @endif
                </div>

                  <div class="form-group {{ $errors->has('role_id')?'has-error':'' }}">
                        <label for="role_id">Role<label class="required-field-class">*</label></label>
                        <select name="role_id" id="role_id"  class="form-control">
                                
                            @foreach($roles as $type)
                              
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        @if($errors->has('role_id'))
                        <span class="help-block">
                            {{ $errors->first('role_id') }}
                        </span>
                        @endif
                    </div>

                <div class="form-group">
                    <button class="btn btn-success">
                        Create User
                    </button>
                </div>

            </form>
        </div>
    
    </div>
</div>

    @include('admin.adminfooter')
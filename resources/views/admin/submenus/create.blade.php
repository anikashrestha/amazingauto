@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')
<div class="content-wrapper">
        <div class="panel pandel-default">
                <div class="panel-heading">
               <h1 style="text-align:center">     
             Create Sub Menu
               </h1>
                    <br>
                    <small style="text-align:center">All filed with <label class="required-field-class">*</label> are mandatory.</small>
                </div>


        <div class="panel-body">
            <form action="{{ route('admin.submenus.store',['id'=>$menu->id])}}" method="POST" >
                {{ csrf_field() }}
                <input type="hidden" name="menu_id" value="{{$menu->id}}" id="menu_id"/>
                <div class="form-group {{ $errors->has('name')?'has-error':'' }}">
                    <label for="sub_menu_name">SubMenu Name<label class="required-field-class">*</label></label>
                    <input type="text" class="form-control" name="sub_menu_name" id="sub_menu_name" value="{{ old('sub_menu_name') }}">
                    @if($errors->has('sub_menu_name'))
                    <span class="help-block">
                        {{ $errors->first('sub_menu_name') }}
                    </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('description')?'has-error':'' }}">
                    <label for="description">Description<label class="required-field-class">*</label></label>
                    <input type="description" class="form-control" name="description" id="description" value="{{ old('description') }}">
                    @if($errors->has('description'))
                    <span class="help-block">
                        {{ $errors->first('description') }}
                    </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('link')?'has-error':'' }}">
                    <label for="link">Link<label class="required-field-class">*</label></label>
                    <input type="text" class="form-control" name="link" id="link" value="{{ old('link') }}">
                    @if($errors->has('link'))
                    <span class="help-block">
                        {{ $errors->first('link') }}
                    </span>
                    @endif
                </div>

                <div class="form-group">
                    <button class="btn btn-success">
                        Add Sub Menu
                    </button>
                </div>

            </form>
        </div>
    
    </div>
</div>

    @include('admin.adminfooter')
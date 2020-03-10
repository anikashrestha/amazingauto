@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')
<div class="content-wrapper">
        <div class="panel pandel-default">
                <div class="panel-heading">
               <h1 style="text-align:center">     
             Create Menu
               </h1>
                    <br>
                    <small style="text-align:center">All filed with <label class="required-field-class">*</label> are mandatory.</small>
                </div>


        <div class="panel-body">
            <form  action="{{ route('admin.menus.store')}}" method="POST" >
                {{ csrf_field() }}
             
                <div class="form-group {{ $errors->has('title')?'has-error':'' }}">
                    <label for="name">Title<label class="required-field-class">*</label></label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                    @if($errors->has('title'))
                    <span class="help-block">
                        {{ $errors->first('title') }}
                    </span>
                    @endif
                </div>
                <div class = "form-group">
                <label><input type="checkbox" name="parent_id"  id="check" onchange="show(this.checked)"> Click it if it have parent</label>
                </div>
             
                <div id="hiddenField"  style="display:none;"  class="form-group {{ $errors->has('parent_id')?'has-error':'' }}">
                    <label for="parent_id">Parent Menu<label class="required-field-class">*</label></label>
                    <select name="parent_id" id="parent_id" name="hidden" class="form-control">
                            
                        <option hidden>0</option> 
                        @foreach($menus as $type)
                          
                                <option value="{{ $type->id }}">{{ $type->title }}</option>
                            @endforeach
                        </select>
                    @if($errors->has('parent_id'))
                    <span class="help-block">
                        {{ $errors->first('parent_id') }}
                    </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('display_order')?'has-error':'' }}">
                    <label for="display_order">Display Order<label class="required-field-class">*</label></label>
                    <input type="number" class="form-control" name="display_order" id="display_order" value="{{ old('display_order') }}">
                    @if($errors->has('display_order'))
                    <span class="help-block">
                        {{ $errors->first('display_order') }}
                    </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('link')?'has-error':'' }}">
                    <label for="link">Link</label>
                    <input type="text" class="form-control" name="link" id="link" value="{{ old('link') }}">
                    @if($errors->has('link'))
                    <span class="help-block">
                        {{ $errors->first('link') }}
                    </span>
                    @endif
                </div>

                <div class="form-group">
                    <button class="btn btn-success">
                        Add Menu
                    </button>
                </div>

            </form>
        </div>
    
    </div>
</div>
<script type="text/javascript">
 function show(checked){
     if(checked == true){
         $('#hiddenField').fadeIn();
     }else{
         $('#hiddenField').fadeOut();
     }
 }
    </script>
    @include('admin.adminfooter')
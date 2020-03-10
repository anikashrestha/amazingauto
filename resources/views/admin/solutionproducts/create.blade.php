@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')
<div class="content-wrapper">
        <div class="panel pandel-default">
                <div class="panel-heading">
               <h1 style="text-align:center">     
             Add Solution Products
               </h1>
                    <br>
                    <small style="text-align:center">All filed with <label class="required-field-class">*</label> are mandatory.</small>
                </div>


        <div class="panel-body">
            <form  action="{{ route('admin.solutionproducts.store')}}" method="POST"  enctype="multipart/form-data">
                {{ csrf_field() }}
             
                <div class="form-group {{ $errors->has('heading')?'has-error':'' }}">
                    <label for="heading">Heading<label class="required-field-class">*</label></label>
                    <input type="text" class="form-control" name="heading" id="heading" value="{{ old('heading') }}">
                    @if($errors->has('heading'))
                    <span class="help-block">
                        {{ $errors->first('heading') }}
                    </span>
                    @endif
                </div>

           
                 
                <div class="form-group {{ $errors->has('slug')?'has-error':'' }}">
                    <label for="buttonslug">Button Slug<label class="required-field-class">*</label></label>
                <input type="text" class="form-control" name="buttonslug" id="buttonslug" value="{{ old('buttonslug') }}">
                    @if($errors->has('buttonslug'))
                    <span class="help-block">
                        {{ $errors->first('buttonslug') }}
                    </span>
                    @endif
                </div>

             
        <div class="form-group {{ $errors->has('text')?'has-error':'' }}">
                <label for="text">Text<label class="required-field-class">*</label></label>

                <textarea style="height: 200px;" name="text" id="text" cols="5" rows="10" class="form-control">{{ old('text') }}</textarea>
        @if($errors->has('text'))
        <span class="help-block">
                {{ $errors->first('text') }}
        </span>
        @endif
        </div>

        <div class="form-group">
            <label for="image">Image<label class="required-field-class">*</label></label>
            <input type="file" class="form-control" name="image" id="image">
            <small>Please Upload Image Size up to 2mb</small>
            @if($errors->has('image'))
            <span class="help-block">
                    {{ $errors->first('image') }}
            </span>
            @endif       
     </div>

    <div class="form-group {{ $errors->has('status')?'has-error':'' }}">
            <input type="checkbox" value="{{ old('status')}}"  id="status" name="status">
                    <label for="status">Show</label>
                    </div>
               

                <div class="form-group">
                    <button class="btn btn-success">
                        Add
                    </button>
                </div>

            </form>
        </div>
    
    </div>
</div>
<script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: 'textarea',
    plugins: "textcolor",
    height : "480"
    
  });
 function show(checked){
     if(checked == true){
         $('#hiddenField').fadeIn();
     }else{
         $('#hiddenField').fadeOut();
     }
 }
    </script>
    @include('admin.adminfooter')
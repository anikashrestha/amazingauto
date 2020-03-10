@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')
<div class="content-wrapper">
        <div class="panel pandel-default">
                <div class="panel-heading">
               <h1 style="text-align:center">     
             Create Pages
               </h1>
                    <br>
                    <small style="text-align:center">All filed with <label class="required-field-class">*</label> are mandatory.</small>
                </div>


        <div class="panel-body">
            <form  action="{{ route('admin.pages.store')}}" method="POST" >
                {{ csrf_field() }}
             
                <div class="form-group {{ $errors->has('title')?'has-error':'' }}">
                    <label for="title">Title<label class="required-field-class">*</label></label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                    @if($errors->has('title'))
                    <span class="help-block">
                        {{ $errors->first('title') }}
                    </span>
                    @endif
                </div>

           
                    <div class="form-group {{ $errors->has('slug')?'has-error':'' }}">
                            <label for="slug">Slug<label class="required-field-class">*</label></label>
                            <input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug') }}">
                            @if($errors->has('slug'))
                            <span class="help-block">
                                {{ $errors->first('slug') }}
                            </span>
                            @endif
                        </div>

             
                        <div class="form-group {{ $errors->has('body')?'has-error':'' }}">
                                <label for="body">Content<label class="required-field-class">*</label></label>
                
                                <textarea style="height: 200px;" name="body" id="body" cols="5" rows="10" class="form-control">{{ old('body') }}</textarea>
                        @if($errors->has('body'))
                        <span class="help-block">
                                {{ $errors->first('body') }}
                        </span>
                        @endif
                        </div>
                        <div class="form-group {{ $errors->has('status')?'has-error':'' }}">
                                <input type="checkbox" value="{{ old('status')}}"  id="status" name="status">
                                        <label for="status">Show</label>
                                        </div>
               

                <div class="form-group">
                    <button class="btn btn-success">
                        Create Page
                    </button>
                </div>

            </form>
        </div>
    
    </div>
</div>
<script  src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
<script  type="text/javascript">
tinymce.init({
    selector: 'textarea',
    plugins: "textcolor table code link lists",
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
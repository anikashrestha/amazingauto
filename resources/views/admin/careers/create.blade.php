@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')
<div class="content-wrapper">
        <div class="panel pandel-default">
                <div class="panel-heading">
               <h1 style="text-align:center">     
             Create Career Page
               </h1>
                    <br>
                    <small style="text-align:center">All filed with <label class="required-field-class">*</label> are mandatory.</small>
                </div>


        <div class="panel-body">
            <form  action="{{ route('admin.careers.store')}}" method="POST" >
                {{ csrf_field() }}
             
        
                        <div class="form-group {{ $errors->has('body')?'has-error':'' }}">
                                <label for="body1">Content<label class="required-field-class">*</label></label>
                
                                <textarea style="height: 200px;" name="body1" id="body1" cols="5" rows="10" class="form-control">{{ old('body1') }}</textarea>
                        @if($errors->has('body1'))
                        <span class="help-block">
                                {{ $errors->first('body1') }}
                        </span>
                        @endif
                        </div>
                       

                        <div class="form-group {{ $errors->has('body')?'has-error':'' }}">
                                <label for="body2">Content<label class="required-field-class">*</label></label>
                
                                <textarea style="height: 200px;" name="body2" id="body2" cols="5" rows="10" class="form-control">{{ old('body2') }}</textarea>
                        @if($errors->has('body2'))
                        <span class="help-block">
                                {{ $errors->first('body2') }}
                        </span>
                        @endif
                        </div>
                       
                <div class="form-group">
                    <button class="btn btn-success">
                       Save
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
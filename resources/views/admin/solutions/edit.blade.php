@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')
<div class="content-wrapper">
        <div class="panel pandel-default">
                <div class="panel-heading">
               <h1 style="text-align:center">     
             Add IT Solution
               </h1>
                    <br>
                    <small style="text-align:center">All filed with <label class="required-field-class">*</label> are mandatory.</small>
                </div>


        <div class="panel-body">
            <form  action="{{ route('admin.solutions.update',['id'=> $solution->id])}}" method="POST" >
                {{ csrf_field() }}
             
                <div class="form-group {{ $errors->has('title')?'has-error':'' }}">
                    <label for="title">Title<label class="required-field-class">*</label></label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $solution->title }}">
                    @if($errors->has('title'))
                    <span class="help-block">
                        {{ $errors->first('title') }}
                    </span>
                    @endif
                </div>

           
                  
             
                        <div class="form-group {{ $errors->has('content')?'has-error':'' }}">
                                <label for="content">Content<label class="required-field-class">*</label></label>
                
                                <textarea style="height: 200px;" name="content" id="body" cols="5" rows="10" class="form-control">{{ $solution->content}}</textarea>
                        @if($errors->has('content'))
                        <span class="help-block">
                                {{ $errors->first('content') }}
                        </span>
                        @endif
                        </div>
                        <div class="form-group {{ $errors->has('status')?'has-error':'' }}">
                            <input type="checkbox" value="{{ $solution->status}}"  id="status" name="status" <?php echo ($solution->status==1 ? 'checked' : '')?>>
                                    <label for="status">Show</label>
                                    </div>
               

                <div class="form-group">
                    <button class="btn btn-success">
                        Edit
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
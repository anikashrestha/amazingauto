@include('admin.adminhead')
<style>
    .hidden{

        display:none;
    }
</style>
@include('admin.mainheader')
@include('admin.mainnavbar')
<style>
</style>
<div class="content-wrapper">
        <div class="panel pandel-default">
                <div class="panel-heading">
               <h1 style="text-align:center">     
             Add About Us Content
               </h1>
                    <br>
                    <small style="text-align:center">All filed with <label class="required-field-class">*</label> are mandatory.</small>
            </div>


        <div class="panel-body">
            <form  action="{{ route('admin.about.update',['id'=> $about->id])}}" method="POST" >
                {{ csrf_field() }}

                <div class="form-group {{ $errors->has('heading')?'has-error':'' }}">
                    <label for="heading">Heading<label class="required-field-class">*</label></label>
                    <input type="text" class="form-control" name="heading" id="heading" value="{{ $about->heading }}">
                    @if($errors->has('heading'))
                    <span class="help-block">
                        {{ $errors->first('heading') }}
                    </span>
                    @endif
                </div>

            
                        <div class="form-group {{ $errors->has('title')?'has-error':'' }}">
                                <label for="title">Title<label class="required-field-class">*</label></label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ $about->title }}">
                                @if($errors->has('title'))
                                <span class="help-block">
                                    {{ $errors->first('title') }}
                                </span>
                                @endif
                            </div>

                        
              
               
                <div class="form-group {{ $errors->has('description')?'has-error':'' }}">
                        <label for="content">Description<label class="required-field-class">*</label></label>
        
                        <textarea style="height: 200px;" name="description" id="description" cols="5" rows="10" class="form-control">{{ $about->description }}</textarea>
                @if($errors->has('description'))
                <span class="help-block">
                        {{ $errors->first('description') }}
                </span>
                @endif
                </div>


                <div class="form-group {{ $errors->has('status')?'has-error':'' }}">
                        <input type="checkbox" value="{{ $about->status}}"  id="status" name="status" <?php echo ($about->status==1 ? 'checked' : '')?>>
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
  </script>

    @include('admin.adminfooter')
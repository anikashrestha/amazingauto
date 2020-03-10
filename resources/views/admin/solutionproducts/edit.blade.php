@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')
<div class="content-wrapper">
    <div class="panel pandel-default">
        <div class="panel-heading">
            <h1 style="text-align:center">
                Edit Solution Products
            </h1>
            <br>
            <small style="text-align:center">All filed with <label class="required-field-class">*</label> are
                mandatory.</small>
        </div>


        <div class="panel-body">
            <form action="{{ route('admin.solutionproducts.update',['id'=>$solutionproduct->id])}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group {{ $errors->has('heading')?'has-error':'' }}">
                    <label for="heading">Heading<label class="required-field-class">*</label></label>
                    <input type="text" class="form-control" name="heading" id="heading"
                        value="{{ $solutionproduct->heading}}">
                    @if($errors->has('heading'))
                    <span class="help-block">
                        {{ $errors->first('heading') }}
                    </span>
                    @endif
                </div>


                <div class="form-group {{ $errors->has('slug')?'has-error':'' }}">
                    <label for="buttonslug">Button Slug<label class="required-field-class">*</label></label>
                    <input type="text" class="form-control" name="buttonslug" id="buttonslug"
                        value="{{ $solutionproduct->buttonslug}}">
                    @if($errors->has('buttonslug'))
                    <span class="help-block">
                        {{ $errors->first('buttonslug') }}
                    </span>
                    @endif
                </div>


                <div class="form-group {{ $errors->has('body')?'has-error':'' }}">
                    <label for="text">Text<label class="required-field-class">*</label></label>

                    <textarea name="text" id="text" cols="5" rows="5"
                        class="form-control">{{ $solutionproduct->text}}</textarea>
                    @if($errors->has('text'))
                    <span class="help-block">
                        {{ $errors->first('text') }}
                    </span>
                    @endif
                </div>

                <div class="form-group">

                    <img src="/storage/solutionproducts/{{$solutionproduct->image}}" height="100px" width="200px"
                        alt="{{ $solutionproduct->heading }}">
                    <br>
                    <small><a href="#" id="imageButton">View Image</a></small>
                </div>

                <div class="form-group">
                    <label for="image">Change Image</label>
                    <input type="file" class="form-control" name="image" id="image"
                        value="/storage/solutionproducts/{{$solutionproduct->image}}">
                    <small>Please Upload Image Size up to 2mb</small>
                </div>
        </div>
        <div class="form-group {{ $errors->has('status')?'has-error':'' }}">
            <input type="checkbox" value="{{ $solutionproduct->status}}" id="status" name="status"
                <?php echo ($solutionproduct->status==1 ? 'checked' : '')?>>
            <label for="status">Show</label>
        </div>


        <div class="form-group">
            <button class="btn btn-success">
                Edit Solution Product
            </button>
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
                    <img src="/storage/solutionproducts/{{$solutionproduct->image}}" alt="" class="img-responsive">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

</div>
</div>
<script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
    selector: 'textarea',
    plugins: "textcolor"
    
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
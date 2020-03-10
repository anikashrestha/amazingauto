@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')
<div class="content-wrapper">
                <div class="panel pandel-default">
                                <div class="panel-heading">
                               <h1 style="text-align:center">     
                              Add Benifits
                               </h1>
                                    <br>
                                    <small style="text-align:center">All filed with <label class="required-field-class">*</label> are mandatory.</small>
                                </div>

      <div class="panel-body">
                <form action="{{ route('admin.benifits.store')}}" method="POST" >
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('title')?'has-error':'' }}">
                                <label for="heading">Heading</label>
                                <input type="text" class="form-control" name="heading" id="heading" placeholder="Heading" value="{{ old('heading') }}">
                                @if($errors->has('heading'))
                                <span class="help-block">
                                    {{ $errors->first('heading') }}
                                </span>
                                @endif
                            </div>
                     

                        <div class="form-group {{ $errors->has('content')?'has-error':'' }}">
                            <label for="text">Text<label class="required-field-class">*</label></label>
            
                            <textarea style="height: 200px;" name="content" id="content" cols="5" rows="10" class="form-control">{{ old('content') }}</textarea>
                    @if($errors->has('content'))
                    <span class="help-block">
                            {{ $errors->first('content') }}
                    </span>
                    @endif
                    </div>
                    <div class="form-group {{ $errors->has('list')?'has-error':'' }}">
                            <label for="list">List<label class="required-field-class">*</label></label>
            
                            <textarea style="height: 200px;" name="list" id="list" cols="5" rows="10" class="form-control">{{ old('list') }}</textarea>
                    @if($errors->has('list'))
                    <span class="help-block">
                            {{ $errors->first('list') }}
                    </span>
                    @endif
                    </div>
                             
                      
            
    
        
                        <div class="form-group">
                            <button class="btn btn-success">
                               Add  Benifit
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
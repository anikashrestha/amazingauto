@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')
<div class="content-wrapper">
    <div class="panel pandel-default">
        <div class="panel-heading">
            <h1 style="text-align:center">
                Add Address
            </h1>
            <br>
            <small style="text-align:center">All filed with <label class="required-field-class">*</label> are mandatory.</small>
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.address.update',['id'=>$address->id])}}" method="POST" >
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('place')?'has-error':'' }}">
                    <label for="text">Place<label class="required-field-class">*</label>
                    <input type="text" name="place" id="place" cols="5" rows="10" class="form-control">{{ old('place') }}</textarea>
                    @if($errors->has('place'))
                    <span class="help-block">
                            {{ $errors->first('place') }}
                    </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('municipality')?'has-error':'' }}">
                    <label for="list">Municipality<label class="required-field-class">*</label></label>
                    <input type="text" id="municipality" name="municipality" cols="5" rows="10" class="form-control">{{ old('municipality') }}</textarea>
                    @if($errors->has('municipality'))
                        <span class="help-block">
                            {{ $errors->first('municipality') }}
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('personmail')?'has-error':'' }}">
                    <label for="list">Person Email<label class="required-field-class">*</label></label>
                    <input type="text" id="personmail" name="personmail" cols="5" rows="10" class="form-control">{{ old('personmail') }}</textarea>
                    @if($errors->has('personmail'))
                        <span class="help-block">
                            {{ $errors->first('personmail') }}
                        </span>
                    @endif
                </div>
                        
                <div class="form-group {{ $errors->has('officemail')?'has-error':'' }}">
                    <label for="list">Office Email<label class="required-field-class">*</label></label>

                    <input type="text" id="officemail" name="officemail" cols="5" rows="10" class="form-control">{{ old('officemail') }}</textarea>
                    @if($errors->has('officemail'))
                        <span class="help-block">
                            {{ $errors->first('officemail') }}
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('phone')?'has-error':'' }}">
                        <label for="list">Phone<label class="required-field-class">*</label></label>
    
                        <input type="number" id="phone" name="phone" cols="5" rows="10" class="form-control">{{ old('phone') }}</textarea>
                        @if($errors->has('phone'))
                            <span class="help-block">
                                {{ $errors->first('phone') }}
                            </span>
                        @endif
                    </div>
                <div class="form-group">
                    <button class="btn btn-success">
                        Edit  Address
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
    plugins: "textcolor table",
    height : "480",
  menubar: "table",


  });
  </script>
        @include('admin.adminfooter')

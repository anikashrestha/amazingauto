@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')
<div class="content-wrapper">
    <div class="panel pandel-default">
        <div class="panel-heading">
            <h1 style="text-align:center">
                Edit Partner Product
            </h1>
            <br>
            <small style="text-align:center">All filed with <label class="required-field-class">*</label> are
                mandatory.</small>
        </div>


        <div class="panel-body">
            <form action="{{ route('admin.partnerproduct.update',['id'=>$partnerproduct->id])}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <div class="{{ $errors->has('heading')?'has-error':'' }}">
                        <label for="title">Heading<label class="required-field-class">*</label></label>
                    <input type="text" name="heading" id="js-input-company-heading" placeholder="Heading" value="{{ $partnerproduct->heading}}" class="form-control">

                    @if($errors->has('heading'))
                    <span class="help-block">
                        {{ $errors->first('heading') }}
                    </span>
                    @endif
                </div>
                </div>

                <div class="form-group">
                    <div class="{{ $errors->has('text')?'has-error':'' }}">
                        <label for="title">Text<label class="required-field-class">*</label></label>
                    <textarea name="text" id="js-input-text" class="form-control"  placeholder="Text">{{ $partnerproduct->text}}</textarea>

                    @if($errors->has('text'))
                    <span class="help-block">
                        {{ $errors->first('text') }}
                    </span>
                    @endif
                </div>

                </div>

                <div class="form-group {{ $errors->has('partner_id')?'has-error':'' }}">
                    <label for="partner_id">Partner<label class="required-field-class">*</label></label>
                    <select name="partner_id" id="partner_id"  class="form-control">

                        @foreach($partners as $type)

                        <option value="{{ $type->id }}">{{ $type->title }}</option>
                    @endforeach
                        </select>
                    @if($errors->has('partner_id'))
                    <span class="help-block">
                        {{ $errors->first('partner_id') }}
                    </span>
                    @endif
                </div>
                <div class="form-group">

                    <img src="/storage/partnerproduct/files/{{$partnerproduct->file}}" height="100px" width="200px" alt="{{ $partnerproduct->file }}">
                    <br>

                </div>
                <div class="form-group">

                    <div class="{{ $errors->has('file')?'has-error':'' }}">

                        <label for="title">File Upload<label class="required-field-class">*</label></label>
                        <input type="file" class="form-control" name="file" id="file">

                    @if($errors->has('file'))
                    <span class="help-block">
                        {{ $errors->first('file') }}
                    </span>
                    @endif
                </div>


                </div>

                <div class="form-group">

                    <img src="/storage/partnerproduct/logo/{{$partnerproduct->logo}}" height="100px" width="200px" alt="{{ $partnerproduct->heading }}">
                    <br>

                </div>
                <div class="form-group">


                <div class="{{ $errors->has('logo')?'has-error':'' }}">

                    <label for="title">Logo Upload<label class="required-field-class">*</label></label>
                    <input type="file" class="form-control" name="logo" id="logo">

                @if($errors->has('logo'))
                <span class="help-block">
                    {{ $errors->first('logo') }}
                </span>
                @endif
            </div>
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

@include('admin.adminfooter')

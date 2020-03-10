@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')
<div class="content-wrapper">
    <div class="panel pandel-default">
        <div class="panel-heading">
            <h1 style="text-align:center">
                Edit Partners
            </h1>
            <br>
            <small style="text-align:center">All filed with <label class="required-field-class">*</label> are
                mandatory.</small>
        </div>


        <div class="panel-body">
            <form action="{{ route('admin.partner.update',['id'=>$partner->id])}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group {{ $errors->has('title')?'has-error':'' }}">
                    <label for="title">Title<label class="required-field-class">*</label></label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $partner->title }}">
                    @if($errors->has('title'))
                    <span class="help-block">
                        {{ $errors->first('title') }}
                    </span>
                    @endif
                </div>




                <div class="form-group {{ $errors->has('content')?'has-error':'' }}">
                    <label for="content">Description<label class="required-field-class">*</label></label>

                    <textarea style="height: 200px;" name="description" id="description" cols="5" rows="10"
                        class="form-control">{{ $partner->description }}</textarea>
                    @if($errors->has('description'))
                    <span class="help-block">
                        {{ $errors->first('description') }}
                    </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('status')?'has-error':'' }}">
                    <input type="checkbox" value="{{  $partner->status }}" id="status" name="status"
                        <?php echo ($partner->status==1 ? 'checked' : '')?>>
                    <label for="status">Show</label>
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

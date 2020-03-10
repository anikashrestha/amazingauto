@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')
<div class="content-wrapper">
    <div class="panel pandel-default">
        <div class="panel-heading">
            <h1 style="text-align:center">
                Add Map Co-ordinates
            </h1>
            <br>
            <small style="text-align:center">All filed with <label class="required-field-class">*</label> are
                mandatory.</small>
        </div>

        <div class="panel-body">
            <form action="{{ route('admin.map.update',['id'=>$map->id])}}" method="POST">
                {{ csrf_field() }}

                <div class="form-group {{ $errors->has('lat')?'has-error':'' }}">
                    <label for="lat">Lattitude<label class="required-field-class">*</label></label>
                    <input type="text" class="form-control" name="lat" id="lat" placeholder="Lattitude"
                        value="{{ $map->lat }}">
                    @if($errors->has('lat'))
                    <span class="help-block">
                        {{ $errors->first('lat') }}
                    </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('lon')?'has-error':'' }}">
                    <label for="lon">Longitude<label class="required-field-class">*</label></label>
                    <input type="text" class="form-control" name="lon" id="lat" placeholder="Longitude"
                        value="{{ $map->lon }}">
                    @if($errors->has('lon'))
                    <span class="help-block">
                        {{ $errors->first('lon') }}
                    </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('lon')?'has-error':'' }}">
                    <label for="address">Location<label class="required-field-class">*</label></label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="Address"
                        value="{{ $map->address }}">
                    @if($errors->has('address'))
                    <span class="help-block">
                        {{ $errors->first('address') }}
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

@include('admin.adminfooter')
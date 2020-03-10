@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')
<div class="content-wrapper">
    <div class="panel pandel-default">
        <div class="panel-heading">
            <h1 style="text-align:center">
                Add Partners Services
            </h1>
            <br>
            <small style="text-align:center">All filed with <label class="required-field-class">*</label> are
                mandatory.</small>
        </div>


        <div class="panel-body">
            <form action="{{ route('admin.partnerproduct.store',['id'=>$partnerproduct->id])}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
        
                        <table class="table table-bordered table-striped" id="partnerservice">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Upload Image</th>
                                    <th style="text-align:center;"><a href="#" class="btn btn-info " id="btnPartnerServiceAdd">+</a></th>
                                </tr>
                            </thead>
                            <tbody class ="partnerservice-body">
                                <tr>
                                    <div class="{{ $errors->has('title')?'has-error':'' }}">
                                        <td>
                                            <input type="text" name="title[]" id="js-input-title"
                                                class="form-control">
                                        </td>
                                        @if($errors->has('title'))
                                        <span class="help-block">
                                            {{ $errors->first('title') }}
                                        </span> 
                                        @endif
                                    </div>
        
                                    <div class="{{ $errors->has('image')?'has-error':'' }}">
                                        <td>
                            
                                        <input type="file" class="form-control" name="image[]"  id="image" multiple>
                                        </td>
                                        @if($errors->has('image'))
                                        <span class="help-block">
                                                {{ $errors->first('image') }}
                                        </span>
                                        @endif       
                                 </div>
                                   
        
                                    <td style="text-align:center;"><a href="#" class="btn btn-danger" id="btnPartnerServiceSub">-</a>
                                    </td>
                                </tr>
                            </tbody>
        
                        </table>
        
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
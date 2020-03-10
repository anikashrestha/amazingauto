@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')
<div class="content-wrapper">
<div class="panel pandel-default">
                <div class="panel-heading">
                <h1 style="text-align:center">     
                Create Vacancy
                </h1>
                        <br>
                        <small style="text-align:center">All filed with <label class="required-field-class">*</label> are mandatory.</small>
                </div>
    
    <div class="panel-body">
                <form autocomplete="off" action="{{ route('admin.vacancy.store')}}" method="POST">
                        {{ csrf_field() }}
                     
                        <div class="row col-md-12" style="padding:0px;margin:auto;">
                        <div class="col col-md-6">
                        <div class="form-group {{ $errors->has('job_title')?'has-error':'' }}">
                            <label for="job_title">Job Title<label class="required-field-class">*</label></label>
                            <input type="text" class="form-control" name="job_title" id="job_title" value="{{ old('job_title') }}">
                            @if($errors->has('job_title'))
                            <span class="help-block">
                                {{ $errors->first('job_title') }}
                            </span>
                            @endif
                        </div>
                        </div>
                        <div class="col col-md-6">
                        <div class="form-group {{ $errors->has('position')?'has-error':'' }}">
                            <label for="position">Position<label class="required-field-class">*</label></label>
                            <input type="text" class="form-control" name="position" id="position" value="{{ old('position') }}">
                            @if($errors->has('position'))
                            <span class="help-block">
                                {{ $errors->first('position') }}
                            </span>
                            @endif
                        </div>
                        </div>
                </div>
                <div class="col-md-12" style="padding:0px;margin:auto;">
                        <div class="col col-md-6">
                        <div class="form-group {{ $errors->has('no_of_opening')?'has-error':'' }}">
                                        <label for="no_of_opening">No of Openings<label class="required-field-class">*</label></label>
                                        <input type="number" class="form-control" name="no_of_opening" id="no_of_opening" value="{{ old('no_of_opening') }}">
                                        @if($errors->has('no_of_opening'))
                                        <span class="help-block">
                                            {{ $errors->first('no_of_opening') }}
                                        </span>
                                        @endif
                                    </div>
                                </div>
                       
                       
                        <div class="col col-md-6">
                        <div class="form-group {{ $errors->has('education_level')?'has-error':'' }}">
                                <label for="education_level">Education Level<label class="required-field-class">*</label></label>
                                <input type="text" class="form-control" name="education_level" id="education_level" value="{{ old('education_level') }}">
                                @if($errors->has('education_level'))
                                        <span class="help-block">
                                            {{ $errors->first('education_level') }}
                                        </span>
                                        @endif
                                </div>
                        </div>
                </div>

                <div class="row col-md-12" style="padding:0px; margin-left: 14px;">
                                <div class="form-group {{ $errors->has('experience_required')?'has-error':'' }}">
                                <label for="experience_required">Experience required<label class="required-field-class">*</label></label>
                
                                <textarea name="experience_required" id="experience_required" cols="5" rows="5" class="form-control">{{ old('experience_required') }}</textarea>
                        @if($errors->has('experience_required'))
                        <span class="help-block">
                                {{ $errors->first('experience_required') }}
                        </span>
                        @endif
                        </div>
                </div>

                <div class="row col-md-12" style="padding:0px;margin-left:14px;">
                        <div class="form-group {{ $errors->has('job_specification')?'has-error':'' }}">
                                <label for="job_specification">Job Specification<label class="required-field-class">*</label></label>
                                <textarea name="job_specification" id="job_specification" cols="5" rows="5" class="form-control">{{ old('job_specification') }}</textarea>
                                        
                        @if($errors->has('job_specification'))
                        <span class="help-block">
                                {{ $errors->first('job_specification') }}
                        </span>
                        @endif
                        </div>
                </div>

                <div class="row col-md-12" style="padding:0px;margin-left: 14px;">
                        <div class="form-group {{ $errors->has('job_description')?'has-error':'' }}">
                                        <label for="job_description">Job Description<label class="required-field-class">*</label></label>
                                        <textarea name="job_description" id="job_description" cols="5" rows="5" class="form-control">{{ old('job_description') }}</textarea>
                                                
                                @if($errors->has('job_description'))
                                <span class="help-block">
                                        {{ $errors->first('job_description') }}
                                </span>
                                @endif
                                </div>
                </div>
                <div class="row col-md-12" style="padding:0px;margin-left: 14px;">
                 <div class="col-md-6">
                <div class="form-group {{ $errors->has('deadline')?'has-error':'' }}">
                                <label for="deadline">Deadline<label class="required-field-class">*</label></label>
                                <input type="text" name="deadline" id="datepicker1" class="form-control" value="{{ old('deadline') }}">
                        
                        @if($errors->has('deadline'))
                        <span class="help-block">
                                {{ $errors->first('deadline') }}
                        </span>
                        @endif
                        </div>
                 </div>

                 <div class="col-md-6">
                
                <div class="form-group {{ $errors->has('status')?'has-error':'' }}">
                        <input type="checkbox" value="1" checked id="status" name="status">
                        <label for="status">Status</label>
                        </div>
                        </div>


                </div>

                
        
                        <div class="form-group">
                            <button class="btn btn-success" style="margin-left: 14px;">
                                Create Vacancy
                            </button>
                        </div>
        
                    </form>
                </div>
            
            </div>
</div>

 @include('admin.adminfooter')
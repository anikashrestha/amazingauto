@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')
<div class="content-wrapper">
        <div class="panel pandel-default">
                <div class="panel-heading">
               <h1 style="text-align:center">     
             Edit Footer
               </h1>
                    <br>
                    <small style="text-align:center">All filed with <label class="required-field-class">*</label> are mandatory.</small>
                </div>


        <div class="panel-body">
            <form  action="{{ route('admin.footers.update',['id'=>$footer->id])}}" method="POST" >
                {{ csrf_field() }}
             
                <div class="form-group {{ $errors->has('copyright')?'has-error':'' }}">
                    <label for="name">Copyright<label class="required-field-class">*</label></label>
                    <input type="text" class="form-control" name="copyright" id="copyright" value="{{$footer->copyright }}">
                    @if($errors->has('copyright'))
                    <span class="help-block">
                        {{ $errors->first('copyright') }}
                    </span>
                    @endif
                </div>
                


                    <table class="table table-bordered table-striped" id="tbl_quick_links">
                            <thead>
                                <tr>
                                    <th>Quick Links Name</th>
                                    <th>Quick Link</th>
                                    <th style="text-align:center;"><a href="#" class="btn btn-info " id="btnQuickAdd">+</a></th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach($quickLinks as $quicklink)
                                <tr>
                                    <div class="{{ $errors->has('quick_links_name')?'has-error':'' }}">
                                        <td>
                                        <input type="text" name="quick_links_name[]" value="{{$quicklink->quick_links_name}}" id="js-input-quick_links_name" class="form-control">
                                        </td>
                                        @if($errors->has('quick_links_name'))
                                        <span class="help-block">
                     {{ $errors->first('quick_links_name') }}
                 </span> @endif
                                    </div>

                                    <div class="{{ $errors->has('quick_links')?'has-error':'' }}">
                                        <td>
                                        <input type="text" name="quick_links[]" id="js-input-quick_links" value="{{ $quicklink->quick_links }}"class="form-control"></td>
                                        @if($errors->has('quick_links'))
                                        <span class="help-block">
                             {{ $errors->first('quick_links') }}
                         </span> @endif
                                    </div>

                                    <td style="text-align:center;"><a href="#" class="btn btn-danger" id="btnQuickSub">-</a></td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>


                        <table class="table table-bordered table-striped" id="tbl_useful_links">
                                <thead>
                                    <tr>
                                        <th>Useful Links Name</th>
                                        <th>Useful Link</th>
                                        <th style="text-align:center;"><a href="#" class="btn btn-info " id="btnUsefulAdd">+</a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($usefulLinks as $usefullink)
                                    <tr>
                                        <div class="{{ $errors->has('useful_links_name')?'has-error':'' }}">
                                            <td>
                                                <input type="text" name="useful_links_name[]" id="js-input-useful_links_name" value="{{ $usefullink->useful_links_name }}" class="form-control">
                                            </td>
                                            @if($errors->has('useful_links_name'))
                                            <span class="help-block">
                         {{ $errors->first('useful_links_name') }}
                     </span> @endif
                                        </div>
    
                                        <div class="{{ $errors->has('useful_links')?'has-error':'' }}">
                                            <td>
                                            <input type="text" name="useful_links[]" id="js-input-useful_links" value="{{$usefullink->useful_links }}" class="form-control"></td>
                                            @if($errors->has('useful_links'))
                                            <span class="help-block">
                                 {{ $errors->first('useful_links') }}
                             </span> @endif
                                        </div>
    
                                        <td style="text-align:center;"><a href="#" class="btn btn-danger" id="btnUsefulSub">-</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
    
                            </table>
                  

                 
                            <table class="table table-bordered table-striped" id="tbl_social_links">
                                <thead>
                                    <tr>
                                        <th>Social Link</th>
                                        <th>Social Icon</th>
                                        <th style="text-align:center;"><a href="#" class="btn btn-info " id="btnSocialAdd">+</a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($socialLinks as $sociallink)
                                    <tr>
                                        <div class="{{ $errors->has('social_links')?'has-error':'' }}">
                                            <td>
                                            <input type="text" name="social_links[]" id="js-input-social_links" value="{{ $sociallink->social_links}} " class="form-control">
                                            </td>
                                            @if($errors->has('social_links'))
                                            <span class="help-block">
                         {{ $errors->first('social_links') }}
                     </span> @endif
                                        </div>
    
                                        <div class="{{ $errors->has('social_icon')?'has-error':'' }}">
                                            <td>
                                            <input type="text" name="social_icon[]" id="js-input-social_icon" value="{{ $sociallink->social_icon}}" class="form-control"></td>
                                            @if($errors->has('social_icon'))
                                            <span class="help-block">
                                 {{ $errors->first('social_icon') }}
                             </span> @endif
                                        </div>
    
                                        <td style="text-align:center;"><a href="#" class="btn btn-danger" id="btnSocialSub">-</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
    
                            </table>
                  
                  
                            <table class="table table-bordered table-striped" id="tbl_contact_links">
                                    <thead>
                                        <tr>
                                            <th>Contact Info</th>
                                            <th>Icon</th>
                
                                            <th style="text-align:center;"><a href="#" class="btn btn-info " id="btnContactAdd">+</a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach($contacts as $contact)
                                        <tr>
                                            <div class="{{ $errors->has('contact_info')?'has-error':'' }}">
                                                <td>
                                                    <input type="text" name="contact_info[]" id="js-input-contact_info"
                                                class="form-control" value="{{ $contact->contact_info}}">
                                                </td>
                                                @if($errors->has('contact_info'))
                                                <span class="help-block">
                                                    {{ $errors->first('contact_info') }}
                                                </span> @endif
                                            </div>
                                            
                                             <div class="{{ $errors->has('icon')?'has-error':'' }}">
                                <td>
                                    <input type="text" name="icon[]" id="js-input-icon"
                                        class="form-control" value="{{ $contact->icon}}">
                                </td>
                                @if($errors->has('icon'))
                                <span class="help-block">
                                    {{ $errors->first('icon') }}
                                </span> @endif
                            </div>
                
                
                                            <td style="text-align:center;"><a href="#" class="btn btn-danger" id="btnContactSub">-</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                
                                </table>
                
                
                                  
                                 

                <div class="form-group">
                    <button class="btn btn-success">
                        Save Footer
                    </button>
                </div>

            </form>
        </div>
    
    </div>
</div>

    @include('admin.adminfooter')
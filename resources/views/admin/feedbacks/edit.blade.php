@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')



<div class="content-wrapper">
        <div class="panel pandel-default">
                <div class="panel-heading">
               <h1 style="text-align:center">     
    Show or Dont Show in Home Page
               </h1>
                    
                </div>

                <div class="container">
                        <main class="py-4">
                                @include('inc.messages')
                        </main>
                    </div>

                    <form autocomplete="off" action="{{ route('admin.feedbacks.update',['id'=>$feedback->id]) }}" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="id"/>
    <input type="hidden" name="full_name"/>
    <input type="hidden" name="email"/>
    <input type="hidden" name="contact_no"/>
    <input type="hidden" name="feedback"/>
<div class="panel-body">


        <div class="form-group">
                <input type="checkbox" value="{{ $feedback->status}}"  id="status" name="status" <?php echo ($feedback->status==1 ? 'checked' : '')?>>
                        <label for="status">Show in Home</label>
                        </div>
                    


               
   
        
<div class="form-group">
                    <button class="btn btn-success" style="margin-left: 14px;">
                        Edit
                    </button>
                </div>
        </div>   

</form>

                
</div>
</div>
@include('admin.adminfooter')
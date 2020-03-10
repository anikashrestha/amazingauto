@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')



<div class="content-wrapper">
        <div class="panel-heading">
                <h1 style="text-align:center">     
               Search Results for Client Feedbacks
                </h1>
                <p>Total Count : {{ $feedbacksearch->count()}} '{{ request()->input('query')}}'</p>
                 </div>
                 <div class ="pull-right">
                    <a class="btn btn-danger btn-sm" href="/admin/feedbacks/">Back to Feedbacks</a>
                 </div>
                 <br><br>

                    <div class="panel-body">
                   

    @if(count($feedbacksearch)>0)
   

     <table class="table table-responsive table-bordered table-hover table-striped">
    <tr>
        <th>Id</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Contact No</th>
        <th>Feedback</th>
        <th>Show in Home</th>   
        <th>Action</th>  
         
    </tr> 
    @foreach($feedbacksearch as $feedback)
    <tr>
    <td>{{$feedback->id}}</td>
    <td>{{$feedback->full_name}}</td>
    <td>{{$feedback->email}}</td>
    <td>{{$feedback->contact_no}}</td>
    <td style="width:30%;">{{$feedback->feedback}}</td>
    <td>{{ ($feedback->status?'Show':'Dont Show')}}</td>
    <td>
        <a  href="/admin/feedbacks/edit/{{ $feedback->id }}" class="btn btn-info btn-xs">Edit Status</a>
         <a onclick="return confirm('are you sure you want to delele?')" href="/admin/feedbacks/{{ $feedback->id }}" class="btn btn-danger btn-xs">Delete</a>
  
    </td>
   
</td>
    </tr>
    @endforeach


    </table>
    
 @else
 <p>No Client Feedbacks Found</p>
 @endif
</div>
</div>
</div>
@include('admin.adminfooter')
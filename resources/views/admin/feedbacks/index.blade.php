@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')



<div class="content-wrapper">
        <div class="panel pandel-default">
                <div class="panel-heading">
               <h1 style="text-align:center">     
              View ClientFeedback
               </h1>
                    
                </div>

                <div class="container">
                        <main class="py-4">
                                @include('inc.messages')
                        </main>
                    </div>

                    <div class="panel-body">
                    <form action="{{ route('feedbacksearch') }}" method="GET" style="margin-bottom:30px">
                                        
                            <div class="input-group">
                                            <input type="text" name="query" value="{{ request()->input('query')}}" class="form-control" placeholder="Search">
                                            <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default">
                                            <span class="fa fa-search"></span>
                                    </button>
                                    </span>
                            </div>
                            </form>

    @if(count($clientfeedbacks)>0)
   

     <table class="table table-responsive table-bordered table-hover table-striped">
    <tr>
        <th>Id</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Contact No</th>
        <th>Feedback</th>
        <th>Show in Home</th>   
        @if(Auth::check())
        @if(Auth::user()->isAdmin())
         <th>Action</th>  
        @endif
        @endif 
    </tr> 
    @foreach($clientfeedbacks as $feedback)
    <tr>
    <td>{{$feedback->id}}</td>
    <td>{{$feedback->full_name}}</td>
    <td>{{$feedback->email}}</td>
    <td>{{$feedback->contact_no}}</td>
    <td style="width:30%;">{{$feedback->feedback}}</td>
    <td>{{ ($feedback->status?'Show':'Dont Show')}}</td>
    @if(Auth::check())
    @if(Auth::user()->isAdmin())
    <td>
        <a  href="/admin/feedbacks/edit/{{ $feedback->id }}" class="btn btn-info btn-xs">Edit Status</a>
         <a onclick="return confirm('are you sure you want to delele?')" href="/admin/feedbacks/{{ $feedback->id }}" class="btn btn-danger btn-xs">Delete</a>
  
    </td>
    @endif
    @endif
   
</td>
    </tr>
    @endforeach


    </table>
    <div class="mx-auto">
        {{ $clientfeedbacks->links() }}
</div>
 @else
 <p>No Client Feedbacks Found</p>
 @endif
</div>
</div>
</div>
@include('admin.adminfooter')
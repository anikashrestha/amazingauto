@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')



<div class="content-wrapper">
        <div class="panel pandel-default">
                <div class="panel-heading">
               <h1 style="text-align:center">     
              View JobSeekers Detail
               </h1>
                </div>

                  <div class="container">
                <main class="py-4">
                        @include('inc.messages')
                </main>
            </div>

         <div class="panel-body">
        <form action="{{ route('jobseekersSsearch') }}" method="GET" style="margin-bottom:30px">
                                        
                <div class="input-group">
                                <input type="text" name="query" value="{{ request()->input('query')}}" class="form-control" placeholder="Search">
                                <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                                <span class="fa fa-search"></span>
                        </button>
                        </span>
                </div>
                </form>


    @if(count($jobseekers)>0)
     <table class="table table-responsive table-bordered 
     table-hover table-striped">
    <tr>
            <th>Id</th>
       <th>Full Name</th>
       <th>Email</th>
       <th>Address</th>
       <th>Phone</th>
       <th>Job Title</th>
       <th>CV</th>

      
    </tr> 
    @foreach($jobseekers as $jobSeeker)
    <tr>
    <td>{{ $jobSeeker->seeker_id}}</td>
    <td>{{ $jobSeeker->full_name}}</td>
    <td>{{ $jobSeeker->email}}</td>
    <td>{{ $jobSeeker->address}}</td>
    <td>{{ $jobSeeker->phone}}</td>
    <td>{{ $jobSeeker->vacancy->job_title}}</td>
    <td><a href="/storage/cv/{{$jobSeeker->cv }}">View CV</a></td>

    </tr>
    @endforeach


    </table>
 @else
 <p>No JobSeeker Found</p>
 @endif
</div>
</div>
</div>
@include('admin.adminfooter')
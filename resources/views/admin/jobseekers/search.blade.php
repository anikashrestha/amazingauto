@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')



<div class="content-wrapper">
        <div class="panel pandel-default">
                <div class="panel-heading">
               <h1 style="text-align:center">     
              Search Results for JobSeeker
               </h1>
               <p>Total Count : {{ $jobseekersearch->count()}} '{{ request()->input('query')}}'</p>
                </div>
                <div class ="pull-right">
                        <a class="btn btn-danger btn-sm" href="/admin/jobseekers/">Back to JobSeekers</a>
                     </div>
                     <br><br>
              
       <div class="panel-body">
                @if(count( $jobseekersearch)>0)
                <table class="table table-responsive table-bordered table-hover table-striped">
                                <tr>
                                 <td>Id</td>
                                   <th>Full Name</th>
                                   <th>Email</th>
                                   <th>Address</th>
                                   <th>Phone</th>
                                   <th>Job Title</th>
                                   <th>CV</th>
                            
                                  
                                </tr> 
         @foreach( $jobseekersearch as $jobseeker)
         <tr>
                      <td>{{ $jobseeker->seeker_id}}</td>
                        <td>{{ $jobseeker->full_name}}</td>
                        <td>{{ $jobseeker->email}}</td>
                        <td>{{ $jobseeker->address}}</td>
                        <td>{{ $jobseeker->phone}}</td>
                        <td>{{ $jobseeker->vacancy->job_title}}</td>
                        <td><a href="/storage/cv/{{$jobseeker->cv }}">View CV</a></td>
                    
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
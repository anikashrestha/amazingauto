@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')
<div class="content-wrapper">
<div class="panel pandel-default">
                <div class="panel-heading">
                <h1 style="text-align:center">     
                    Search Results for Vacancy List
                </h1>
                <p>Total Count : {{ $vacancysearch->count()}} '{{ request()->input('query')}}'</p>   
                </div>
                <div class ="pull-right">
                    <a class="btn btn-danger btn-sm" href="/admin/vacancy/">Back to Vacancies</a>
                 </div>
                 <br><br>
      <div class="panel panel-default">
            <div class="panel-heading"> Search Vacancy List</div>
            <div class="panel-body">
                    @if(count( $vacancysearch)>0)
                <table class="table table-bordered table-striped table-hover">
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Position</th>
                            <th>Education Level</th>
                            <th>Experience Required</th>
                            <th>Job Specification</th>
                            <th>Job Description</th>
                            <th>Deadline</th>
                            <th>Status</th>   
                            @if(Auth::check())
                            @if(Auth::user()->isAdmin()) 
                            <th colspan="2">Action</th>                
                            @endif
                            @endif
                        </tr>
                        @foreach($vacancysearch as $Vacancy)
                            <tr>
                            <td>{{ $Vacancy->id}}</td>
                                <td><a data-toggle="modal" data-target="#myModal{{$Vacancy->id}}">{{ $Vacancy->job_title }}</a> </td>
                                <td>{{ $Vacancy->position }}</td>
                            <td>{{ $Vacancy->education_level}}</td>
                            <td>{{ str_limit($Vacancy->experience_required,100)}}</td>
                            <td>{{str_limit( $Vacancy->job_specification,100)}}</td>
                            <td>{{ str_limit($Vacancy->job_description,100)}}</td>
                           <td 
                               @if(($Vacancy->deadline <  Carbon\Carbon::today()->format('m/d/y')) ) )
                            style="background-color:#dd4b39"
                    
                        @else
                            style="background-color:#3c763d;color:white"
                        @endif
                        >{{$Vacancy->deadline }}</td>
                            <td>{{ ($Vacancy->status?'Available':'Expired')}}</td>
                            @if(Auth::check())
                        @if(Auth::user()->isAdmin()) 
                            <td colspan="2">
                                <a  href="/admin/vacancy/edit/{{ $Vacancy->id }}" class="btn btn-info btn-xs">Edit</a>
                        
                           <br><br>
                            <a onclick="return confirm('are you sure you want to delele?')" href="/admin/vacancy/{{ $Vacancy->id }}" class="btn btn-danger btn-xs">Delete</a>
                          
                            </td>
                                @endif
                                @endif
                            </tr>
                        @endforeach
                    </table>
                    <div class="mx-auto">
                            {{ $vacancysearch->links() }}
                    </div>
                       

                        @foreach($vacancysearch as $v)
<!-- Modal -->
<div class="modal fade" id="myModal{{$v->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" ><strong>{{$v->job_title}}</strong></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
      
        <h5>Position :&nbsp;&nbsp;&nbsp; {{$v->position}}</h5>
        <h5>No of Openings :&nbsp;&nbsp;&nbsp; {{$v->no_of_opening}}</h5>
        <h5>Education Level :&nbsp;&nbsp;&nbsp; {{$v->education_level}}</h5>
        <hr>
        <h5><strong>Experiece Required:</strong></h5>
        <p style=" white-space:pre-wrap;margin:auto;">  {{$v->experience_required}}</p>
        <hr>
      
        <h5><strong>Job Specification:</strong></h5>
        <p style=" white-space:pre-wrap;margin:auto; ">{{$v->job_specification}}</p>
        <hr>
        <h5><strong>Job Description:</strong></h5>
        <p style="white-space:pre-wrap;margin:auto;">{{$v->job_specification}}</p>
   
      
        </div>
        {{-- <div class="modal-footer">
          
          <a href="/vacancy/apply/{{$v->id}}"  class="btn btn-sm btn-success" >Apply Now</a>
         
        </div> --}}
      
      </div>
    </div>
  </div>
@endforeach
               
                @else
                <p>No Vacancy Found</p>
                @endif
            </div>
        </div>
    





</div>
</div>
@include('admin.adminfooter')


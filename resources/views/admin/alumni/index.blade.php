@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')



<div class="content-wrapper">
        <div class="panel pandel-default">
                <div class="panel-heading">
               <h1 style="text-align:center">     
              View Alumni
               </h1>
                    
                </div>

                <div class="container">
                        <main class="py-4">
                                @include('inc.messages')
                        </main>
                    </div>
                    

                    <div class="panel-body">
                    <form action="{{ route('alumnisearch') }}" method="GET" style="margin-bottom:30px">
                                        
                            <div class="input-group">
                                            <input type="text" name="query" value="{{ request()->input('query')}}" class="form-control" placeholder="Search">
                                            <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default">
                                            <span class="fa fa-search"></span>
                                    </button>
                                    </span>
                            </div>
                            </form>

    @if(count($alumnis)>0)
   

     <table class="table table-responsive table-bordered table-hover table-striped">
    <tr>
        <th style="text-align:center">Id</th>
        <th style="text-align:center">Full Name</th>
        <th style="text-align:center">Address</th>
        <th style="text-align:center">Joined Year</th>
        <th style="text-align:center">Resigned Year</th>
        <th style="text-align:center">Current Organization</th>
        <th style="text-align:center">Current Position</th>
        <th style="text-align:center">Contact Number</th>
       <th style="text-align:center">Email Address</th>
       <th style="text-align:center">Photo</th>
      
    </tr> 
    @foreach($alumnis as $alumni)
    <tr>
    <td style="text-align:center">{{$alumni->id}}</td>
    <td style="text-align:center">{{$alumni->first_name}}  {{$alumni->middle_name}}   {{$alumni->last_name}}</td>
    <td style="text-align:center">{{$alumni->address}}</td>
    <td style="text-align:center">{{$alumni->joined_year}}</td>
    <td style="text-align:center">{{$alumni->resigned_year}}</td>
    <td style="text-align:center">{{$alumni->current_organization}}</td>
    <td style="text-align:center">{{$alumni->current_position}}</td>
    <td style="text-align:center">{{$alumni->contact_number}}</td>
    <td style="text-align:center">{{$alumni->email_id}}</td>
    <td style="text-align:center"><img style="width:50px;height:50px;" src="/storage/alumnis/{{$alumni->photo}}" /></td>

</td>
    </tr>
    @endforeach


    </table>
 @else
 <p>No Alumni Found</p>
 @endif
</div>
</div>
</div>
@include('admin.adminfooter')
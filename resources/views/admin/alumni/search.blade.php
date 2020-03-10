@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')



<div class="content-wrapper">
        <div class="panel pandel-default">
                <div class="panel-heading">
                        <h1 style="text-align:center">     
                                Search Results for Alumni
                                 </h1>
                                 <p>Total Count : {{ $alumnisearch->count()}} '{{ request()->input('query')}}'</p>
                    
                </div>
                <div class ="pull-right">
                        <a class="btn btn-danger btn-sm" href="/admin/alumnis/">Back to Alumnis</a>
                     </div>
                     <br><br>

                <div class="container">
                        <main class="py-4">
                                @include('inc.messages')
                        </main>
                    </div>

                    <div class="panel-body">
                

    @if(count($alumnisearch)>0)
   

     <table class="table table-responsive table-bordered table-hover table-striped">
    <tr>
        <th>Id</th>
        <th>Full Name</th>
        <th>Address</th>
        <th>Joined Year</th>
        <th>Resigned Year</th>
        <th>Current Organization</th>
        <th>Current Position</th>
        <th>Contact Number</th>
       <th>Email Address</th>
       <th>Photo</th>
      
    </tr> 
    @foreach($alumnisearch as $alumni)
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
@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')



<div class="content-wrapper">
        <div class="panel pandel-default">
                <div class="panel-heading">
               <h1 style="text-align:center">     
              View Research Work
               </h1>
                    
                </div>

                <div class="container">
                        <main class="py-4">
                                @include('inc.messages')
                        </main>
                    </div>

                    @if(Auth::check())
                    @if(Auth::user()->isAdmin())
                    <div class = "pull-right">
                                <p>
                                    <a href="/admin/research/create" class ="btn btn-primary btn-md"><span class = "glyphicon glyphicon-plus"> </span></a>
                                </p>
                                </div>

                                <br><br>
                             
     
        @endif
        @endif

                    <div class="panel-body">
                   

    @if(count($researchs)>0)
   

     <table class="table table-responsive table-bordered table-hover table-striped">
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Text</th>
        <th>Show in Site</th>   
        @if(Auth::check())
    @if(Auth::user()->isAdmin())
        <th>Action</th>  
        @endif
        @endif
         
    </tr> 
    @foreach($researchs as $research)
    <tr>
    <td>{{$research->id}}</td>
    <td>{{$research->title}}</td>
    <td style="width:40%;">{{$research->description}}</td>
    <td>{{ ($research->status?'Show':'Dont Show')}}</td>
    @if(Auth::check())
    @if(Auth::user()->isAdmin())
    <td>
        <a  href="/admin/research/edit/{{ $research->id }}" class="btn btn-info btn-xs">Edit</a>
    <a onclick="return confirm('are you sure you want to delele?')" href="/admin/research/{{  $research->id }}" class="btn btn-danger btn-xs">Delete</a>
    </td>
    @endif
    @endif
   
</td>
    </tr>
    @endforeach


    </table>
    <div class="mx-auto">
        {{ $researchs->links() }}
</div>
 @else
 <p>No Research Found</p>
 @endif
</div>
</div>
</div>
@include('admin.adminfooter')
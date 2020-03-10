@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')



<div class="content-wrapper">
        <div class="panel pandel-default">
                <div class="panel-heading">
               <h1 style="text-align:center">     
              View About Us List
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
                            <a href="/admin/about/create" class ="btn btn-primary btn-md"><span class = "glyphicon glyphicon-plus"> </span></a>
                        </p>
                        </div>
                        <br><br>
                        @endif
                        @endif

                    <div class="panel-body">
                   

    @if(count($abouts)>0)
   

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
    @foreach($abouts as $about)
    <tr>
    <td>{{$about->id}}</td>
    <td>{{$about->title}}</td>
    <td style="width:40%;">{{$about->description}}</td>
    <td>{{ ($about->status?'Show':'Dont Show')}}</td>
    {{-- {{Auth::user()->roles->first()->name=='User'}}  --}}
    
    @if(Auth::check())
    @if(Auth::user()->isAdmin())
    <td >   
        <a  href="/admin/about/edit/{{ $about->id }}" class="btn btn-info btn-xs">Edit</a>
    <a onclick="return confirm('are you sure you want to delele?')" href="/admin/about/{{  $about->id }}" class="btn btn-danger btn-xs">Delete</a>
    
</td>
@endif
@endif

  
  
   
</td>
    </tr>
    @endforeach


    </table>
    <div class="mx-auto">
        {{ $abouts->links() }}
</div>
 @else
 <p>No About Us Content Found</p>
 @endif
</div>
</div>
</div>
@include('admin.adminfooter')
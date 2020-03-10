@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')
<div class="content-wrapper">
        <div class="panel pandel-default">
                <div class="panel-heading">
               <h1 style="text-align:center">     
              View Career Body 
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
                                    <a href="/admin/careers/create" class ="btn btn-primary btn-md"><span class = "glyphicon glyphicon-plus"> </span></a>
                                </p>
                                </div>
                                <br><br>
                             
     
        @endif
        @endif

                    <div class="panel-body">
                    

    @if(count($careers)>0)
   

     <table class="table table-responsive table-bordered table-hover table-striped">
    <tr>
        <th>Id</th>
        <th>Content 1</th>
        <th>Content 2</th>
       
        @if(Auth::check())
    @if(Auth::user()->isAdmin())
    <th>Action</th>
    @endif
    @endif  
         
    </tr> 
    @foreach($careers as $career)
    <tr>
    <td>{{$career->id}}</td>
    
    <td style="width:40%;">{!!$career->body1!!}</td>
    <td style="width:40%;">{!!career->body2!!}</td>
    @if(Auth::check())
    @if(Auth::user()->isAdmin())
    <td>
        <a  href="/admin/careers/edit/{{ $career->id }}" class="btn btn-info btn-xs">Edit</a>
    <a onclick="return confirm('are you sure you want to delele?')" href="/admin/careers/{{ $career->id }}" class="btn btn-danger btn-xs">Delete</a>
    </td>
    @endif
    @endif
   
</td>
    </tr>
    @endforeach


    </table>
    <div class="mx-auto">
        {{ $pages->links() }}
</div>
 @else
 <p>No Pages Found</p>
 @endif
</div>
</div>
</div>
@include('admin.adminfooter')
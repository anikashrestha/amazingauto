@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')



<div class="content-wrapper">
        <div class="panel pandel-default">
                <div class="panel-heading">
               <h1 style="text-align:center">     
              View Benifits
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
                                    <a href="/admin/benifits/create" class ="btn btn-primary btn-md"><span class = "glyphicon glyphicon-plus"> </span></a>
                                </p>
                                </div>
                                <br><br>
                             
     
        @endif
        @endif

                    <div class="panel-body">
                  

    @if(count($benifits)>0)
   <table class = "table table-bordered table-striped">
<tr>
    <th>Id</th>
    <th>Heading</th>
    <th>Text</th>
    <th>List</th>
    @if(Auth::check())
    @if(Auth::user()->isAdmin()) 
    <th>Action</th>
    @endif
    @endif
</tr>
@foreach($benifits as $intro)
<tr>
<td>{{$intro->id}}</td>
<td>{{ $intro->heading}}</td>
<td>{!!$intro->content!!}</td>
<td>{!!$intro->list!!}</td>
@if(Auth::check())
    @if(Auth::user()->isAdmin())
<td>
        <a  href="/admin/benifits/edit/{{ $intro->id }}" class="btn btn-info btn-xs">Edit</a>

   <br><br>
    <a onclick="return confirm('are you sure you want to delele?')" href="/admin/benifits/{{ $intro->id }}" class="btn btn-danger btn-xs">Delete</a>
  
    </td>
    @endif
    @endif
</tr>

@endforeach
   </table>

 @else
 <p>No Benifit Found</p>
 @endif
</div>
</div>
</div>
@include('admin.adminfooter')
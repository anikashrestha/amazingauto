@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')



<div class="content-wrapper">
        <div class="panel pandel-default">
                <div class="panel-heading">
               <h1 style="text-align:center">     
              View Introduction
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
                                    <a href="/admin/introductions/create" class ="btn btn-primary btn-md"><span class = "glyphicon glyphicon-plus"> </span></a>
                                </p>
                                </div>
                                <br><br>
                             
     
        @endif
        @endif

                    <div class="panel-body">
                  

    @if(count($introductions)>0)
   <table class = "table table-bordered table-striped">
<tr>
    <th>Id</th>
    <th>Title</th>
    <th>Text</th>
    <th style="wdith:20px;">Image</th>
    @if(Auth::check())
    @if(Auth::user()->isAdmin())
    <th>Action</th>
     @endif
     @endif
</tr>
@foreach($introductions as $intro)
<tr>
<td>{{$intro->id}}</td>
<td>{{$intro->title}}</td>
<td>{{$intro->text}}</td>
<td>
<img class="img-responsive" style="height:50px;" src="/storage/introductions/{{$intro->image}}" >
</td>
@if(Auth::check())
    @if(Auth::user()->isAdmin())
<td>
        <a  href="/admin/introductions/edit/{{ $intro->id }}" class="btn btn-info btn-xs">Edit</a>
    <a onclick="return confirm('are you sure you want to delele?')" href="/admin/introductions/{{ $intro->id }}" class="btn btn-danger btn-xs">Delete</a>
  
    </td>
    @endif
    @endif
</tr>

@endforeach
   </table>

 @else
 <p>No Introduction Found</p>
 @endif
</div>
</div>
</div>
@include('admin.adminfooter')
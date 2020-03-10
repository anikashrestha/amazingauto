@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')



<div class="content-wrapper">
        <div class="panel pandel-default">
                <div class="panel-heading">
                    <h1 style="text-align:center">     
                        Search Results for Pages
                         </h1>
                         <p>Total Count : {{ $pagesearch->count()}} '{{ request()->input('query')}}'</p>
                    
                </div>
                <div class ="pull-right">
                    <a class="btn btn-danger btn-sm" href="/admin/pages/">Back to Pages</a>
                 </div>
                 <br><br>

              

                    <div class="panel-body">
                   

    @if(count($pagesearch)>0)
   

     <table class="table table-responsive table-bordered table-hover table-striped">
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Slug</th>
        <th>Body</th>
        <th>Show in Site</th>   
        @if(Auth::check())
        @if(Auth::user()->isAdmin())
        <th>Action</th>  
        @endif
        @endif
         
    </tr> 
    @foreach($pagesearch as $page)
    <tr>
    <td>{{$page->id}}</td>
    <td>{{$page->title}}</td>
    <td>{{$page->slug}}</td>
    <td style="width:40%;">{{$page->body}}</td>
    <td>{{ ($page->status?'Show':'Dont Show')}}</td>
    @if(Auth::check())
    @if(Auth::user()->isAdmin())
    <td>
        <a  href="/admin/pages/edit/{{ $page->id }}" class="btn btn-info btn-xs">Edit</a>
    <a onclick="return confirm('are you sure you want to delele?')" href="/admin/pages/{{ $page->id }}" class="btn btn-danger btn-xs">Delete</a>
    </td>
    @endif
    @endif
   
</td>
    </tr>
    @endforeach


    </table>
   
 @else
 <p>No Pages Found</p>
 @endif
</div>
</div>
</div>
@include('admin.adminfooter')
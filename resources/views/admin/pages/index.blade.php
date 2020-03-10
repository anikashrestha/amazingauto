@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')
<div class="content-wrapper">
        <div class="panel pandel-default">
                <div class="panel-heading">
               <h1 style="text-align:center">     
              View Pages
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
                                    <a href="/admin/pages/create" class ="btn btn-primary btn-md"><span class = "glyphicon glyphicon-plus"> </span></a>
                                </p>
                                </div>
                                <br><br>
                             
     
        @endif
        @endif

                    <div class="panel-body">
                    <form action="{{ route('pagesearch') }}" method="GET" style="margin-bottom:30px">
                                        
                            <div class="input-group">
                                            <input type="text" name="query" value="{{ request()->input('query')}}" class="form-control" placeholder="Search">
                                            <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default">
                                            <span class="fa fa-search"></span>
                                    </button>
                                    </span>
                            </div>
                            </form>

    @if(count($pages)>0)
   

     <table class="table table-responsive table-bordered table-hover table-striped">
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Slug</th>
        <th>Content</th>
        <th>Show in Site</th>   
        @if(Auth::check())
    @if(Auth::user()->isAdmin())
    <th>Action</th>
    @endif
    @endif  
         
    </tr> 
    @foreach($pages as $page)
    <tr>
    <td>{{$page->id}}</td>
    <td>{{$page->title}}</td>
    <td>{{$page->slug}}</td>
    <td style="width:40%;">{!!$page->body!!}</td>
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
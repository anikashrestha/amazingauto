@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')



<div class="content-wrapper">
        <div class="panel pandel-default">
                <div class="panel-heading">
               <h1 style="text-align:center">     
              View IT Solution
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
                                    <a href="/admin/solutions/create" class ="btn btn-primary btn-md"><span class = "glyphicon glyphicon-plus"> </span></a>
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

    @if(count($solutions)>0)
   

     <table class="table table-responsive table-bordered table-hover table-striped">
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Content</th>
        <th>Show in Site</th> 
        @if(Auth::check())
    @if(Auth::user()->isAdmin())  
        <th>Action</th>  
        @endif
        @endif
         
    </tr> 
    @foreach($solutions as $solution)
    <tr>
    <td>{{$solution->id}}</td>
    <td>{{$solution->title}}</td>
    <td style="width:40%;">{!!$solution->content!!}</td>
    <td>{{ ($solution->status?'Show':'Dont Show')}}</td>
    @if(Auth::check())
    @if(Auth::user()->isAdmin())
    <td>
        <a  href="/admin/solutions/edit/{{ $solution->id }}" class="btn btn-info btn-xs">Edit</a>
    <a onclick="return confirm('are you sure you want to delele?')" href="/admin/solutions/{{  $solution->id }}" class="btn btn-danger btn-xs">Delete</a>
    </td>
    @endif
    @endif
   
</td>
    </tr>
    @endforeach


    </table>
    <div class="mx-auto">
        {{ $solutions->links() }}
</div>
 @else
 <p>No SolutionProducts Found</p>
 @endif
</div>
</div>
</div>
@include('admin.adminfooter')
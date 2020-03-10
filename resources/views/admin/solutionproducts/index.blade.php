@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')



<div class="content-wrapper">
        <div class="panel pandel-default">
                <div class="panel-heading">
               <h1 style="text-align:center">     
              View SolutionProducts
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
                                    <a href="/admin/solutionproducts/create" class ="btn btn-primary btn-md"><span class = "glyphicon glyphicon-plus"> </span></a>
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

    @if(count($solutionproducts)>0)
   

     <table class="table table-responsive table-bordered table-hover table-striped">
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Slug</th>
        <th>Content</th>
        <th>Image</th>
        <th>Show in Site</th>   
        <th>Action</th>  
         
    </tr> 
    @foreach($solutionproducts as $solutionproduct)
    <tr>
    <td>{{$solutionproduct->id}}</td>
    <td>{{$solutionproduct->heading}}</td>
    <td>{{$solutionproduct->buttonslug}}</td>
    <td style="width:40%;">{{ str_limit($solutionproduct->text,100)}}</td>
    <td><img class="img-responsive" style="height:50px;" src="/storage/solutionproducts/{{$solutionproduct->image}}" ></td>
    <td>{{ ($solutionproduct->status?'Show':'Dont Show')}}</td>
    <td>
        <a  href="/admin/solutionproducts/edit/{{ $solutionproduct->id }}" class="btn btn-info btn-xs">Edit</a>
    <a onclick="return confirm('are you sure you want to delele?')" href="/admin/solutionproducts/{{  $solutionproduct->id }}" class="btn btn-danger btn-xs">Delete</a>
    </td>
   
</td>
    </tr>
    @endforeach


    </table>
    <div class="mx-auto">
        {{ $solutionproducts->links() }}
</div>
 @else
 <p>No SolutionProducts Found</p>
 @endif
</div>
</div>
</div>
@include('admin.adminfooter')
@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')



<div class="content-wrapper">
        <div class="panel pandel-default">
                <div class="panel-heading">
               <h1 style="text-align:center">     
              View Logo
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
                                    <a href="/admin/logos/create" class ="btn btn-primary btn-md"><span class = "glyphicon glyphicon-plus"> </span></a>
                                </p>
                                </div>
                                <br><br>
                             
     
        @endif
        @endif

                    <div class="panel-body">
                    <form action="{{ route('logosearch') }}" method="GET" style="margin-bottom:30px">
                                        
                            <div class="input-group">
                                            <input type="text" name="query" value="{{ request()->input('query')}}" class="form-control" placeholder="Search">
                                            <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default">
                                            <span class="fa fa-search"></span>
                                    </button>
                                    </span>
                            </div>
                            </form>

    @if(count($logos)>0)
   <table class = "table table-bordered table-striped">
<tr>
    <th>Id</th>
    <th>Title</th>
    <th>Logo</th>
    <th>Show in Home</th>
    @if(Auth::check())
    @if(Auth::user()->isAdmin())
    <th>Action</th>
    @endif
    @endif
</tr>
@foreach($logos as $logo)
<tr>
<td>{{$logo->id}}</td>
<td>{{$logo->title}}</td>
<td><img style="width:50px;height:50px;" src="/storage/logos/{{$logo->logo}}" /></td>
<td>{{ ($logo->status?'Show':'Dont Show')}}</td>
@if(Auth::check())
    @if(Auth::user()->isAdmin())
<td>
        <a  href="/admin/logos/edit/{{ $logo->id }}" class="btn btn-info btn-xs">Edit</a>

   {{-- <br><br> --}}
    <a onclick="return confirm('are you sure you want to delele?')" href="/admin/logos/{{ $logo->id }}" class="btn btn-danger btn-xs">Delete</a>
  
    </td>
    @endif
    @endif
</tr>

@endforeach
   </table>

 @else
 <p>No logo Found</p>
 @endif
</div>
</div>
</div>
@include('admin.adminfooter')
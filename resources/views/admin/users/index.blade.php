@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')
<div class="content-wrapper">
        <div class="panel pandel-default">
                <div class="panel-heading">
               <h1 style="text-align:center">     
                View User List
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
                                    <a href="/admin/users/create" class ="btn btn-primary btn-md"><span class = "glyphicon glyphicon-plus"> </span></a>
                                </p>
                                </div>
                                <br><br>
                             
     
        @endif
        @endif
      <div class="panel panel-default">
            <div class="panel-heading">User List</div>
            <div class="panel-body">

                    <form action="{{ route('usersearch') }}" method="GET" style="margin-bottom:30px">
                                        
                            <div class="input-group">
                                            <input type="text" name="query" value="{{ request()->input('query')}}" class="form-control" placeholder="Search">
                                            <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default">
                                            <span class="fa fa-search"></span>
                                    </button>
                                    </span>
                            </div>
                            </form>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            @if(Auth::check())
                        @if(Auth::user()->isAdmin())  
                            <th>Action</th>                      
                        @endif
                        @endif                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td><img src="{{ asset($user->profile->avatar) }}" alt="{{ $user->name }}" height="50px" width="50px"></td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                @if(Auth::check())
                                @if(Auth::user()->isAdmin()) 
                                <td>
                                        <a  href="/admin/user/edit/{{ $user->id }}" class="btn btn-info btn-xs">Edit</a>
                                        <a onclick="return confirm('are you sure you want to delele?')" href="/admin/user/{{  $user->id }}" class="btn btn-danger btn-xs">Delete</a>
                                </td>
                                @endif
                                @endif
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    

</div>
</div>

@include('admin.adminfooter')
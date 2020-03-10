@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')
<div class="content-wrapper">
        <div class="panel pandel-default">
                <div class="panel-heading">
                        <h1 style="text-align:center">     
                                Search Results for User
                                 </h1>
                                 <p>Total Count : {{ $usersearch->count()}} '{{ request()->input('query')}}'</p>
                                </div>

                                <div class ="pull-right">
                                    <a class="btn btn-danger btn-sm" href="/admin/users/list">Back to Users</a>
                                 </div>
                                 <br><br>
      <div class="panel panel-default">
            
            <div class="panel-body">
                    @if(count( $usersearch)>0)
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>                        
                                                   
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usersearch as $user)
                            <tr>
                                <td><img src="{{ asset($user->profile->avatar) }}" alt="{{ $user->name }}" height="50px" width="50px"></td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
        <p>No User Found</p>
    @endif
            </div>
        </div>
    

</div>
</div>

@include('admin.adminfooter')
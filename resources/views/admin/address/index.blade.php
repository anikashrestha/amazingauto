@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')
<div class="content-wrapper">
    <div class="panel pandel-default">
        <div class="panel-heading">
            <h1 style="text-align:center">
            View Address
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
                    <a href="/admin/address/create" class ="btn btn-primary btn-md"><span class = "glyphicon glyphicon-plus"> </span></a>
                </p>
            </div>
            <br><br>
            @endif
        @endif
        <div class="panel-body">
            @if(count($address)>0)
                <table class = "table table-bordered table-striped">
                    <tr>
                        <th>Id</th>
                        <th>Place</th>
                        <th>Municipality</th>
                        <th>Person E-mail</th>
                        <th>Office E-Mail</th>
                        <th>Phone Number</th>    
                    </tr>
                    @foreach($address as $place)
                        <tr>
                            <td>{{$place->id}}</td>
                            <td>{{ $place->place}}</td>
                            <td>{!!$place->municipality!!}</td>
                            <td>{!!$place->personmail!!}</td>
                            <td>{!!$place->officemail!!}</td>
                            <td>{!!$place->phone!!}</td>
                            @if(Auth::check())
                                @if(Auth::user()->isAdmin())
                                <td>
                                    <a  href="/admin/address/edit/{{ $place->id }}" class="btn btn-info btn-xs">Edit</a>
                                    <br><br>
                                    <a onclick="return confirm('are you sure you want to delete?')" href="/admin/address/{{ $place->id }}" class="btn btn-danger btn-xs">Delete</a>
                                </td>
                                @endif
                            @endif
                        </tr>
                    @endforeach
                </table>
                @else
                <p>No address Found</p>
            @endif
        </div>
    </div>
</div>
@include('admin.adminfooter')

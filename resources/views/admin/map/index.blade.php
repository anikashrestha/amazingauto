@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')
<div class="content-wrapper">
        <div class="panel pandel-default">
                <div class="panel-heading">
               <h1 style="text-align:center">     
              View Map Co-ordinates
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
                                    <a href="/admin/map/create" class ="btn btn-primary btn-md"><span class = "glyphicon glyphicon-plus"> </span></a>
                                </p>
                                </div>
                                <br><br>
                             
     
        @endif
        @endif

                    <div class="panel-body">
        

    @if(count($maps)>0)
   <table class = "table table-bordered table-striped">
<tr>
    <th>Id</th>
    <th>Latitude</th>
    <th>Longitude</th>
    <th>Address</th>
    @if(Auth::check())
    @if(Auth::user()->isAdmin())
    <th>Action</th>
    @endif
    @endif
</tr>
@foreach($maps as $map)
<tr>
<td>{{$map->id}}</td>
<td>{{$map->lat}}</td>
<td>{{$map->lon}}</td>
<td>{{$map->address}}</td>
@if(Auth::check())
    @if(Auth::user()->isAdmin())
<td>
        <a  href="/admin/map/edit/{{ $map->id }}" class="btn btn-info btn-xs">Edit</a>

   {{-- <br><br> --}}
    <a onclick="return confirm('are you sure you want to delele?')" href="/admin/map/{{ $map->id }}" class="btn btn-danger btn-xs">Delete</a>
  
    </td>
    @endif
    @endif
</tr>

@endforeach
   </table>

 @else
 <p>No Map Found</p>
 @endif
</div>
</div>
</div>
@include('admin.adminfooter')
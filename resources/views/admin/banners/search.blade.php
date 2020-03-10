@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')



<div class="content-wrapper">
        <div class="panel pandel-default">
                <div class="panel-heading">
                    <h1 style="text-align:center">     
                        Search Results for Banners
                         </h1>
                         <p>Total Count : {{ $bannersearch->count()}} '{{ request()->input('query')}}'</p>
                          </div>
         
                          <div class ="pull-right">
                            <a class="btn btn-danger btn-sm" href="/admin/banners/">Back to Banners</a>
                         </div>
                         <br><br>
    
 <div class="panel-body">
                 
                           

    @if(count($bannersearch)>0)
   <table class = "table table-bordered table-striped">
<tr>
    <th>Id</th>
    <th>Title</th>
    <th>Bannner</th>
    <th>Show in Home</th>
    <th>Action</th>
</tr>
@foreach($bannersearch as $banner)
<tr>
<td>{{$banner->id}}</td>
<td>{{$banner->name}}</td>
<td><img style="width:50px;height:50px;" src="/storage/banners/{{$banner->banner}}" /></td>
<td>{{ ($banner->status?'Show':'Dont Show')}}</td>
<td>
        <a  href="/admin/banners/edit/{{ $banner->id }}" class="btn btn-info btn-xs">Edit</a>

   {{-- <br><br> --}}
    <a onclick="return confirm('are you sure you want to delele?')" href="/admin/banners/{{ $banner->id }}" class="btn btn-danger btn-xs">Delete</a>
  
    </td>
</tr>

@endforeach
   </table>

 @else
 <p>No Banner Found</p>
 @endif
</div>
</div>
</div>
@include('admin.adminfooter')
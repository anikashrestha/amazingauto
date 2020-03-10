@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')
<div class="content-wrapper">
        <div class="panel-heading">
                <h1 style="text-align:center">     
               Search Results for Menus
                </h1>
                <p>Total Count : {{ $menusearch->count()}} '{{ request()->input('query')}}'</p>
                 </div>

                 <div class ="pull-right">
                    <a class="btn btn-danger btn-sm" href="/admin/menus/">Back to Menus</a>
                 </div>
                 <br><br>
    <div class="panel-body">
                    

    @if(count($menusearch)>0)
     <table class="table table-responsive table-bordered table-hover table-striped">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Parent Menu</th>
        <th>Display Order</th>
        <th>Link</th>
        @if(Auth::check())
        @if(Auth::user()->isAdmin())
        <th>Action</th>
    @endif
    @endif
      
    </tr> 
    @foreach($menusearch as $menu)
    <tr>
    <td>{{$menu->id}}</td>
    <td>{{ $menu->title}}</td>
    <td>
 @if($menu->parent_id >0)
 {{$menu->title}}
 @else
 Parent
 @endif
 </td>
    <td>{{ $menu->display_order}}</td>
    <td>{{ $menu->link}}</td>
    @if(Auth::check())
    @if(Auth::user()->isAdmin())
    <td>
                <a  href="/admin/menus/edit/{{ $menu->id }}" class="btn btn-info btn-xs">Edit</a>
            <a onclick="return confirm('are you sure you want to delele?')" href="/admin/menus/{{ $menu->id }}" class="btn btn-danger btn-xs">Delete</a>
            </td>
            @endif
            @endif
    </tr>
    @endforeach


    </table>
   
 @else
 <p>No Menu Found</p>
 @endif
</div>
</div>
</div>
@include('admin.adminfooter')
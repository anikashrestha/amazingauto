@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')
<div class="content-wrapper">
        <div class="panel pandel-default">
                <div class="panel-heading">
               <h1 style="text-align:center">     
              View Menus
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
                                    <a href="/admin/menus/create" class ="btn btn-primary btn-md"><span class = "glyphicon glyphicon-plus"> </span></a>
                                </p>
                                </div>
                                <br><br>
                             
     
        @endif
        @endif

                    <div class="panel-body">
                    <form action="{{ route('menusearch') }}" method="GET" style="margin-bottom:30px">
                                        
                            <div class="input-group">
                                            <input type="text" name="query" value="{{ request()->input('query')}}" class="form-control" placeholder="Search">
                                            <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default">
                                            <span class="fa fa-search"></span>
                                    </button>
                                    </span>
                            </div>
                            </form>

    @if(count($menus)>0)
   

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
    @foreach($menus as $menu)
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
    <div class="mx-auto">
                {{ $menus->links() }}
        </div>
 @else
 <p>No Menu Found</p>
 @endif
</div>
</div>
</div>
@include('admin.adminfooter')
@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')



<div class="content-wrapper">
        <div class="panel pandel-default">
                <div class="panel-heading">
               <h1 style="text-align:center">     
              View Partners
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
                                    <a href="/admin/partner/create" class ="btn btn-primary btn-md"><span class = "glyphicon glyphicon-plus"> </span></a>
                                </p>
                                </div>

                                <br><br>
                             
     
        @endif
        @endif

                    <div class="panel-body">
                   

    @if(count($partners)>0)
   

     <table class="table table-responsive table-bordered table-hover table-striped">
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Text</th>
        <th>Show in Site</th>   
        <th>Action</th>  
         
    </tr> 
    @foreach($partners as $pro)
    <tr>
    <td>{{$pro->id}}</td>
    <td>{{$pro->title}}</td>
    <td style="width:40%;">{{$pro->description}}</td>
    <td>{{ ($pro->status?'Show':'Dont Show')}}</td>
    <td>
        <a  href="/admin/partner/edit/{{ $pro->id }}" class="btn btn-info btn-xs">Edit</a>
    <a onclick="return confirm('are you sure you want to delele?')" href="/admin/partner/delete/{{  $pro->id }}" class="btn btn-danger btn-xs">Delete</a>
    </td>
   
</td>
    </tr>
    @endforeach


    </table>
    <div class="mx-auto">
        {{ $partners->links() }}
</div>
 @else
 <p>No Partners Found</p>
 @endif
</div>
</div>
</div>
@include('admin.adminfooter')
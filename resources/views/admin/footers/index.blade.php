@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')
<div class="content-wrapper">
        <div class="panel pandel-default">
                <div class="panel-heading">
               <h1 style="text-align:center">     
              View Footer
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
                                    <a href="/admin/footers/create" class ="btn btn-primary btn-md"><span class = "glyphicon glyphicon-plus"> </span></a>
                                </p>
                                </div>
                                <br><br>
                             
     
        @endif
        @endif

                    <div class="panel-body">
                   

    @if(count($footers)>0)
   

     <table class="table table-responsive table-bordered table-hover table-striped">
    <tr>
        <th>Id</th>
        <th>Copyright</th>
        <th>Office Detail</th>
        <th>Quick Links</th>
        <th>Useful Links</th>
        <th>Social Links</th>    
        @if(Auth::check())
    @if(Auth::user()->isAdmin())
    <th>Action</th>
    @endif
    @endif  
         
    </tr> 
    @foreach($footers as $footer)
    <tr>
    <td>{{$footer->id}}</td>
    <td>{{$footer->copyright}}</td>
    <td>{{$footer->office_detail}}</td>
   
<td>
        @foreach($quickLinks as $type)
        {{ $loop->first ? '' : ', ' }}
        @if($type->footer_id == $footer->id)
         {{ $type->quick_links_name}} 
         @endif
        
     @endforeach 
        
     </td>

<td>
        @foreach($usefulLinks as $type)
        {{ $loop->first ? '' : ', ' }}
        @if($type->footer_id == $footer->id)
         {{ $type->useful_links_name}} 
         @endif
        
     @endforeach 
        
     </td>

     <td>
            @foreach($socialLinks as $type)
            {{ $loop->first ? '' : ', ' }}
            @if($type->footer_id == $footer->id)
             {{ $type->social_links}} 
             @endif
            
         @endforeach 
            
         </td>

   
    @if(Auth::check())
    @if(Auth::user()->isAdmin())
    <td>
        <a  href="/admin/footers/edit/{{ $footer->id }}" class="btn btn-info btn-xs">Edit</a>
    <a onclick="return confirm('are you sure you want to delete?')" href="/admin/footers/{{ $footer->id }}" class="btn btn-danger btn-xs">Delete</a>
    </td>
    @endif
    @endif
   
</td>
    </tr>
    @endforeach


    </table>
    
 @else
 <p>No Footer Found</p>
 @endif
</div>
</div>
</div>
@include('admin.adminfooter')
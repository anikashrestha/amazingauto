@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')



<div class="content-wrapper">
    <div class="panel pandel-default">
        <div class="panel-heading">
       <h1 style="text-align:center">     
        View Gallery
       </h1>
            
        </div>
     
      
        @if(Auth::check())
        @if(Auth::user()->isAdmin())
        <div class = "pull-right">
                    <p>
                        <a href="/admin/gallery/create" class ="btn btn-primary btn-md"><span class = "glyphicon glyphicon-plus"> </span></a>
                    </p>
                    </div>
                    <br><br>
                 

@endif
@endif
        
        <div class="panel-body">
                <form action="{{ route('gallerysearch') }}" method="GET" style="margin-bottom:30px">
                                        
                        <div class="input-group">
                                        <input type="text" name="query" value="{{ request()->input('query')}}" class="form-control" placeholder="Search">
                                        <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                        <span class="fa fa-search"></span>
                                </button>
                                </span>
                        </div>
                        </form>
      
      @if(count($albums) > 0)
      <?php
      $colcount = count($albums);
      $i = 1;
      
      ?>
      <div class ="albums">
      <div class ="row">
      @foreach($albums as $album)
      @if($i == $colcount)
      <div class ="col-md-4 col-lg-3" style="padding:12px;">
      <a href="/admin/gallery/{{$album->id}}">
      <img class ="thumnail" src="/storage/album_covers/{{$album->cover_image}}" alt="{{$album->name}}">
      </a>
      <h4 style="text-align: center;">{{$album->name}}</h4>
      {{-- <p>{{str_limit($album->description, 250)}}</p> --}}
      @if(Auth::check())
      @if(Auth::user()->isAdmin())
      <div style="text-align: center;margin-left:50px;">
      <a  href="/admin/gallery/edit/{{ $album->id }}" class="btn btn-success btn-xs">Edit</a>
      <a  onclick="return confirm('are you sure you want to delele?')" href="/admin/gallery/delete/{{ $album->id }}" class="btn btn-danger btn-xs">Delete</a>
      </div>  
      @endif
      @endif
    </div>
      
      @else
      <div class = "col-md-4 col-lg-3" style="padding:12px;">
      <a href= "/admin/gallery/{{$album->id}}">
      <img class="thumbnail" src="/storage/album_covers/{{$album->cover_image}}" alt="{{$album->name}}" />
      </a>
      
      <h4 style="text-align: center;" >{{$album->name}}</h4>
      <div style="text-align:center;margin-left:50px;">
      <a href="/admin/gallery/edit/{{ $album->id }}" class="btn btn-success btn-xs">Edit</a>
      <a  onclick="return confirm('are you sure you want to delele?')" href="/admin/gallery/delete/{{ $album->id }}" class="btn btn-danger btn-xs">Delete</a>
      </div>
      {{-- <p>{{str_limit($album->description, 20)}}</p> --}}
      
      @endif
      
      @if($i % 4 == 0)
      </div>
      </div>
      
      <div class = "row" >
          @else
        
      </div>
      @endif
      <?php $i++; ?>
      @endforeach
      </div>
      </div>
      @else
      <p>No Albums To Display</p>
      @endif
    </div>
      </div>
    </div>
@include('admin.adminfooter')
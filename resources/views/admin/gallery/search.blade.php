@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')



<div class="content-wrapper">
        <div class="panel pandel-default">
                <div class="panel-heading">
               <h1 style="text-align:center">     
              Search Results for Gallery
               </h1>
               <p>Total Count : {{ $gallerysearch->count()}} '{{ request()->input('query')}}'</p>
               <div class ="pull-right">
                <a class="btn btn-danger btn-sm" href="/admin/gallery/">Back to Gallery</a>
             </div>
             <br><br>
               @foreach($gallerysearch as $album)
               <div class ="panel-body">
                   <div class="col-md-3 albums">
                    <a href="/admin/gallery/{{$album->id}}">
                    <img class ="thumnail" src="/storage/album_covers/{{$album->cover_image}}" alt="{{$album->name}}">
                    </a>
                    <h4 style="text-align: center;">{{$album->name}}</h4>
                    {{-- <p>{{str_limit($album->description, 250)}}</p> --}}
                    </div>
               </div>
                @endforeach
              
      
</div>
</div>
</div>

@include('admin.adminfooter')
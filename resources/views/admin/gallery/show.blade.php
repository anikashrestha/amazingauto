@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')



<div class="content-wrapper">

        <div class="panel pandel-default">
                <div class="panel-heading">
               <h1 style="text-align:center">     
               {{$album->name}}
               </h1>
                    
                </div>
<div>
<a class="btn btn-danger btn-sm" href="/admin/gallery">Go Back</a>
@if(Auth::check())
    @if(Auth::user()->isAdmin())
<a class="btn btn-primary btn-sm" href="/admin/photos/create/{{$album->id}}">Upload Photo to ALbum</a>
@endif
@endif
</div>

<div class="container">
        <main class="py-4" style="margin-left:-35px;padding:21px;">
                @include('inc.messages')
        </main>
    </div>



@if(count($album->photos) > 0)
<?php
$colcount = count($album->photos);
$i = 1;

?>
<div class ="photos">
<div class ="row">
@foreach($album->photos as $photo)
@if($i == $colcount)
<div class ="col-md-4 col-lg-3" style="padding:12px;">
                <a data-fancybox="gallery" data-caption="{{$photo->description}}" href="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}">
<img class ="thumnail" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}" >
</a>
@if(Auth::check())
    @if(Auth::user()->isAdmin())
<div style="text-align: center;margin-top:20px;">
                <a  onclick="return confirm('are you sure you want to delele?')" href="/admin/photos/delete/{{ $photo->id }}" class="btn btn-danger btn-xs">Delete</a>
                </div>
                @endif
                @endif
</div>

@else
<div class = "col-md-4 col-lg-3" style="padding:12px;">
        <a data-fancybox="gallery" data-caption="{{$photo->description}}" href="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}">
            <img class ="thumnail" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}" >
            </a>
            <div style="text-align:center;margin-top:20px;">
                       
                        <a  onclick="return confirm('are you sure you want to delele?')" href="/admin/photos/delete/{{ $photo->id }}" class="btn btn-danger btn-xs">Delete</a>
                        </div>


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
<p>No Photo To Display</p>
@endif

      
        </div>
        </div>
    </div>
    <script>
                $("[data-fancybox]").fancybox();
                </script>
    @include('admin.adminfooter')
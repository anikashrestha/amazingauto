@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')



<div class="content-wrapper">
    <div class="panel pandel-default">
        <div class="panel-heading">
       <h1 style="text-align:center">     
          {{$photo->title}}
          <br>
          <small>{{$photo->description}}</small>
       </h1>
        </div>
      <br>
      <br>
<div class ="pull-right">
<a class="btn btn-danger btn-sm" href="/admin/gallery/{{$photo->album_id}}">Back to Gallery</a>
</div>
<div class ="image-show">

<img  src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}" style="width:100%;max-width:300px">
</div>
<br><br>
@if(Auth::check())
    @if(Auth::user()->isAdmin())
{!!Form::open(['action'=>['PhotosController@destroy',$photo->id],'method' =>'POST'])!!}
{{Form::hidden('_method','DELETE')}}
{{Form::submit('Delete Photo',['class' =>'btn btn-danger btn-sm'])}}
{!!Form::close()!!}
@endif
@endif
<hr>

</div>


</div>

@include('admin.adminfooter')
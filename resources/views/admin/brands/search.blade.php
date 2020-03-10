@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')



<div class="content-wrapper">
    <div class="panel pandel-default">
        <div class="panel-heading">
            <h1 style="text-align:center">
                Search Results for Brands
            </h1>
            <p>Total Count : {{ $brandsearch->count()}} '{{ request()->input('query')}}'</p>
        </div>

        <div class="pull-right">
            <a class="btn btn-danger btn-sm" href="/admin/brands/">Back to brands</a>
        </div>
        <br><br>

        <div class="panel-body">



            @if(count($brandsearch)>0)
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Icon</th>
                    <th>Show in Home</th>
                    <th>Action</th>
                </tr>
                @foreach($brandsearch as $brand)
                <tr>
                    <td>{{$brand->id}}</td>
                    <td>{{$brand->name}}</td>
                    <td><img style="width:50px;height:50px;" src="/storage/brands/{{$brand->brand_icon}}" /></td>
                    <td>{{ ($brand->status?'Show':'Dont Show')}}</td>
                    <td>
                        <a href="/admin/brands/edit/{{ $brand->id }}" class="btn btn-info btn-xs">Edit</a>

                        {{-- <br><br> --}}
                        <a onclick="return confirm('are you sure you want to delete?')"
                            href="/admin/brands/{{ $brand->id }}" class="btn btn-danger btn-xs">Delete</a>

                    </td>
                </tr>

                @endforeach
            </table>

            @else
            <p>No brand Found</p>
            @endif
        </div>
    </div>
</div>
@include('admin.adminfooter')
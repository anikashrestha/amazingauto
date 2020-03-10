@include('admin.adminhead')
@include('admin.mainheader')
@include('admin.mainnavbar')



<div class="content-wrapper">
    <div class="panel pandel-default">
        <div class="panel-heading">
            <h1 style="text-align:center">
                View Partner Products
            </h1>

        </div>

        <div class="container">
            <main class="py-4">
                @include('inc.messages')
            </main>
        </div>



        @if(Auth::check())
        @if(Auth::user()->isAdmin())
        <div class="pull-right">
            <p>
                <a href="/admin/partnerproduct/create" class="btn btn-primary btn-md"><span
                        class="glyphicon glyphicon-plus"> </span></a>
            </p>
        </div>

        <br><br>


        @endif
        @endif
        <div class="panel-body">


            @if(count($partnerproducts)>0)


            <table class="table table-responsive table-bordered table-hover table-striped">
                <tr>
                    <th>Id</th>
                    <th>Heading</th>
                    <th>Text</th>
                    <th>File</th>
                    <th>Logo</th>
                    <th>Action</th>

                </tr>
                @foreach($partnerproducts as $pro)
                <tr>
                    <td>{{$pro->id}}</td>
                    <td>{{$pro->heading}}</td>
                    <td style="width:40%;">{{$pro->text}}</td>
                    <td><a href="/storage/partnerproduct/files/{{$pro->file }}" target="_blank">View PDF</a></td>
                    <td><img style="width:50px;height:50px;" src="/storage/partnerproduct/logo/{{$pro->logo}}" /></td>

                    <td>
                            <a href="/admin/partnerproduct/edit/{{ $pro->id }}" class="btn btn-success btn-xs">Edit
                            </a>
                        <a href="/admin/partnerproduct/create/{{ $pro->id }}" class="btn btn-info btn-xs">Add
                            Services</a>
                        <a onclick="return confirm('are you sure you want to delele?')"
                            href="/admin/partnerproduct/delete/{{  $pro->id }}" class="btn btn-danger btn-xs">Delete</a>
                    </td>

                    </td>
                </tr>
                @endforeach


            </table>

            @else
            <p>No Partner Product Found</p>
            @endif
        </div>
    </div>
</div>
@include('admin.adminfooter')

@include('layouts.metaheader')
 
@include('inc.nav')    


<div class="section-title">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <ol class="breadcrumb">
                    <li class="active">{!!$page->title!!}</h2></li>
                </ol>
                <div class="section-content">
                    {!!$page->body!!}
                </div>
            
         </div>
    </div>
</div>

@include('inc.footer')

@include('layouts.metafooter')


<style type="text/css">

</style>

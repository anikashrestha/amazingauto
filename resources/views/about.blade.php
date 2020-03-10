@include('layouts.metaheader') 
@include('inc.nav') 
    <section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
		<div class="container">
			<div class="row">				
				<div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
	                <div class="heading-section-bold mb-4 mt-md-5">
                        <div class="ml-md-0">
                            <h2 class="mb-4">Welcome to car buy &amp; sell website</h2>
                        </div>
	                </div>
	                <div class="pb-md-5">
                        @foreach($abouts ?? '' as $about)
                            <div>
                                <h4 style="color:#07858d;">{{ $about->title}}</h4>
                                <p>{!! $about->description !!}</p>
                            </div>
                            <hr>
                        @endforeach
					</div>
				</div>
			</div>
		</div>
    </section>
 @include('inc.footer') 
 @include('layouts.metafooter')
 
 
 <style type="text/css">
 
 </style>
 
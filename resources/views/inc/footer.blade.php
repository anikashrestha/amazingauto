<footer class="ftco-footer ftco-section">
      <div class="container">
		<div class="row">
				<div class="mouse">
							<a href="#" class="mouse-icon">
								<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
							</a>
						</div>
			</div>

      	@foreach($footers as $footer)
				<div class="row ">
						<div class="col-md-4 col-lg-4">
								<h5 style="color:orange;">Quick links</h5>
								<ul style="list-style: none;">
												@foreach($quickLinks as $quicklink)
												@if($quicklink->footer_id == $footer->id)
										
												<li><a href="{{$quicklink->quick_links}}"><i class="fa fa-angle-double-right"></i> {{$quicklink->quick_links_name}}</a></li>
												@endif
												@endforeach
												
						
														</ul>
						</div>
						<div class="col-md-4 col-lg-4">
								<h5 style="color:orange;">Useful links</h5>
								<ul style="list-style: none;">
								@foreach($usefulLinks as $usefullink)
								@if($usefullink->footer_id == $footer->id)
						
								<li><a href="{{$usefullink->useful_links}}"><i class="fa fa-angle-double-right"></i> {{$usefullink->useful_links_name}}</a></li>
								@endif
								@endforeach
								</ul>
						</div>
						<div class="col-md-4 col-lg-4">
								<h5 style="color:orange;">Contact Detail</h5>
								<ul style="list-style: none;">
												@foreach($contacts as $contact)
												@if($contact->footer_id == $footer->id)
										
												<li>{{$contact->contact_info}}</li>
												@endif
												@endforeach
								</ul>
						</div>


				</div>
				<div class="row">
						<div class="col-md-4 col-lg-12">
										<ul style="list-style: none;" class="list-unstyled list-inline social text-center">
										@foreach($socialLinks as $sociallink)
										@if($sociallink->footer_id == $footer->id)
						<li class="list-inline-item"><a href="{{$sociallink->social_links}}"><i class="{{ $sociallink->social_icon}}"></i></a></li>
									 
										@endif
										@endforeach
							 
									
								</ul>
						</div>
				
				</div>	
				<div class="row ">
								<div class="col-md-4 col-lg-12 ">
												
								<p style="text-align:center;"class ="h6">{{ $footer->copyright}}</p>
												{{-- <a class="text-green ml-2" href="#" target="_blank">ESC Pvt Ltd</a> --}}
								</div>
						
						</div>	
				
		@endforeach
      </div>
      
    </footer>
    
  

  <!-- loader -->
  <!-- <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div> -->



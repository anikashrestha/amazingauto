
<div class="backgroundcolorcustomize"style="margin-top: 20px;">
	<div class="container">
		<section class="ftco-section ftco-category ftco-no-pt ">
			<p class="buttonastext"></p>
		</section>
	</div>
			<!-- <section class="ftco-section ftco-category ftco-no-pt backgroundcolorcustomize"> -->
	<section class="ftco-section ftco-category ftco-no-pt backgroundcolorcustomize" style="height: 750px;">
		<p style="visibility: hidden;">Gallery</p>
		<div class="container">
			<div class="row" style="margin-top: -120px;">
			<!-- <div class="row" style="margin-top: -70px;"> -->
				@foreach($galleryindex as $brand)
					<div class="col-md-6 col-lg-3 ftco-animate">				
						<div class="product productborder">
							<a href="/galleryindex/{{$brand->id}}" class="img-prod"  data-toggle="modal" data-target="#myModal{{$brand->id}}">
								<img class="img-fluid" src="/storage/car/{{$brand->carphoto}}" alt="Colorlib Template">
								<div class="overlay"></div>
									<div class="text py-3 pb-4 px-3 text-center description">
										<h3>{{$brand->car}}</h3>
										<div class="d-flex">
											<div class="pricing">
												<p class="price"><span>{{$brand->price}}</span></p>
											</div>
										</div>
								</div>
							</a>
						</div>					
					</div>
					<!-- Modal -->
					@endforeach
					
@foreach($galleryindex as $brand)
<div class="modal fade" id="myModal{{$brand->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    					<div class="modal-dialog modal-dialog-centered" role="document">
      						<div class="modal-content">
        						<div class="modal-header">
        							<h5 class="modal-title" ><strong>{{$brand->car}}</strong></h5>
          							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
            							<span aria-hidden="true">&times;</span>
          							</button>
        						</div>
        						<div class="modal-body" >   
								<div style="float:left; width:35%;"> 
									<img style="float: left; margin: 0px 15px 15px 0px;" src="/storage/car/{{$brand->carphoto}}"/>  
        							</div>
									<div class="keyfeatures"style="float:right; width:60%; margin-left:5%"> 
<h2>Features</h2>
<ul>
<li>4 cylinder Diesel Turbo Intercooled</li>
<li>6 speed Automatic</li>
<li>Rear Wheel Drive</li>
<li>5 Star ANCAP Rating</li>
<li>Diesel 7.8 L/100km</li>
</ul>

														 <p class="subtitile">Price : {{$brand->price}}</p>
														 <a href="contact">
														 <button class="enquirybutton" style="border-radius: 84px;  "> Enquiry Now</button>
														 </a>
        						</div>      
      						</div>
    					</div>
  					</div>

					  
					

			

							
				
			</div>
			@endforeach

		</div>
	</section>
</div>
	<!-- Gallary section end-->

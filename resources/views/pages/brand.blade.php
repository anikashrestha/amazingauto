
 <!-- to display  cars according to body type or brand -->



 <!-- ----to display brand type of body type on click of view all brand or view all bodytype------ -->

 <div class="backgroundcolorcustomize">	
	<p style="visibility: hidden;">Gallery</p>
			<div class="container">
				<div class="row" style="margin-top: -120px;">
				@foreach($brands as $brand)
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="product">
						<a href="car" class="img-prod"><img class="img-fluid brandbodyimage " src="storage/brands/{{ $brand->brand_icon}}" alt="Colorlib Template">
								<div class="overlay"></div>
							
							<div class="  textbrandbody py-3 pb-4 px-3 text-center">
								<h3> {{$brand->name}} </h3>
								<div class="d-flex">
									
								</div>
							</div>
						</a>
						</div>
					</div>
					@endforeach
				</div>
			</div>
</div>



<!-------------------------------------------------------------------------------------------------->
<script>
	var myIndex = 0;
	carousel();
	
	function carousel() {
	var i;
	var x = document.getElementsByClassName("mySlides");
	for (i = 0; i < x.length; i++) {
		x[i].style.display = "none";  
	}
	myIndex++;
	if (myIndex > x.length) {myIndex = 1}    
	x[myIndex-1].style.display = "block";  
	setTimeout(carousel, 2000); // Change image every 2 seconds
	}
	</script>
	
	


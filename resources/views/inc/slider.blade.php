<div class="slider-itemmo">
	<div class="w3-content w3-section" style="max-height:369px">	
		@foreach( $banners as $banner)
			<img class="mySlides" src="/storage/banners/{{ $banner->banner}}" alt="{{ $banner->name}}"  style="width:100% ">
			
			<div class="top-left">
				<a class="navbar-brand" href="index">
					
				</a>
			</div>	
		@endforeach	
	</div>
</div>
	
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
	
	
									











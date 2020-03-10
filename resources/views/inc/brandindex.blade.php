<!-- new arrival section new start- -->
<div class="backgroundcolorcustomize" style="margin-top:-16px">
{{-- ------------------------------------------ --}}
<div class="container" >
			<section class="ftco-section ftco-category ftco-no-pt ">
				<!-- <button class="buttonastext ml-3"  onclick="myFunction22()"  ><a href = "brand"> Brand</a></button> -->
				<button class="buttonastext ml-3 "  onclick="myFunction22()"  ></button>
				 
				<p id="brandmorescript" style="float:right; "> <a href = "/brand" style="text-decoration:none;">Find your car.. </a> </p>
				 
				</section>
	    </div>
			
					<section class="ftco-section ftco-category ftco-no-pt "  >
			<div class="container newrrivalbrand" >
				
				


				<div id="myDIV22"> {{-- Company type section  --}}

					<ul class="secondndpart">
					@foreach($brandii as $brand)
								<li >
										<a  href="/cardetail" id ="{{$brand->id}}"style="background-color:white">
											<img class="bgimage-manufactor ftco-animate ford" src="/storage/brandii/{{$brand->brandicon}}" alt="{{$brand->brandicon}}"></img>
											
										 <span class="spanarrival" >{{$brand->name}}</span>
										</a>
								</li>
								@endforeach
								<!-- <li >
										<a  href="brand" >
											<div class="bgimage-manufactor ftco-animate toyota"></div>
											<span class="spanarrival">TOYOTA</span>
										</a>
								</li>		
								<li >
										<a  href="brand" >
											<div class="bgimage-manufactor ftco-animate tata"></div>
											<span class="spanarrival">TATA</span>
										</a>
								</li>
								<li >
										<a  href="brand" >
											<div class="bgimage-manufactor ftco-animate mahindra"></div>
											<span class="spanarrival">MAHINDRA</span>
										</a>
								</li>
								<li >
										<a  href="brand" >
											<div class="bgimage-manufactor ftco-animate isuzu"></div>
											<span class="spanarrival">ISUZU</span>
										</a>
								</li>
								<li >
										<a  href="brand" >
											<div class="bgimage-manufactor ftco-animate greatwall"></div>
											<span class="spanarrival">GREAT WALL</span>
										</a>
								</li> -->
					</ul>
				</div>
		</div>
	</section>
{{-- ------------------------------------------ --}}



</div>

<script>
	// function myFunction1() {
	//   var x = document.getElementById("myDIV1");
	//   var y = document.getElementById("myDIV2");
	// 	x.style.display = "block";
	// 	 y.style.display = "none";
	// }
	// function myFunction2() {
	// 	var x = document.getElementById("myDIV1");
	// 	 var y = document.getElementById("myDIV2");
	  
	// 	y.style.display = "block";
	// 	 x.style.display = "none";
	// }



	// -------------------------
	// function myFunction11() {
	//   var a = document.getElementById("myDIV11");
	//   var b = document.getElementById("myDIV22");
	// 	a.style.display = "block";
	// 	 b.style.display = "none";
	// }
	// function myFunction22() {
	// 	var a = document.getElementById("myDIV11");
	// 	 var b = document.getElementById("myDIV22");
	  
	// 	b.style.display = "block";
	// 	 a.style.display = "none";
	// }
	// ---------------------



	 
	function myFunction22() {
	  var a = document.getElementById("myDIV11");
	  var b = document.getElementById("myDIV22");
	  var c = document.getElementById("bodytypescript");
	  var d = document.getElementById("brandmorescript");
	  a.style.display = "none";
		c.style.display = "none";
		 b.style.display = "block";
		d.style.display = "block";
	}
	function myFunction11() {
		var a = document.getElementById("myDIV11");
	    var b = document.getElementById("myDIV22");
		var c = document.getElementById("bodytypescript");
	    var d = document.getElementById("brandmorescript");
	  
		b.style.display = "none";
		d.style.display = "none";
		 a.style.display = "block";
		 c.style.display = "block";
		 }
	</script>
<!-- new arrival end new--->
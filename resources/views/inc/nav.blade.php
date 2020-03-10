<body class="goto-here">
  <nav class="navbar navbar-expand-lg navbar-dark  bg-dark ftco-navbar-light bg-faded" >
		<div class="container">
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a class="navbar-brand" href="#">
				@foreach($logos as $logo)
					<img src="/storage/logos/{{ $logo->logo}}" alt="{{$logo->title}}"  height="50" style = "width:auto;">					
				@endforeach	 
			</a>    
	      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
	        <ul class="navbar-nav ml-auto">
						@foreach($categories as $item)
							@if($item->children->count() > 0)
	          		<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="={{ $item->link}} " id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										{{$item->title}}
									</a>								
									<div class="dropdown-menu" aria-labelledby="dropdown04">									
										@foreach($item->children as $submenu)
											<a class="dropdown-item" href="={{$submenu->link}}">
												{{$submenu->title}}
											</a>
										@endforeach
								</div>
							</li>
							@else
								<li class="nav-item"><a href={{$item->link}} class="nav-link">{{ $item->title}}</a></li>
							@endif	
						@endforeach          
	        </ul>
	      </div>
	    </div>
	  </nav>


	  
    <!-- END nav -->
    
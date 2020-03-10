<section class="ftco-section ftco-cart" style = "background-color:#F7F6F2;">
		<div class="container">
			<div class="row">				
			<div class="col-md-12 ftco-animate">
				<table class="table">
					<thead class="thead-primary">
						<tr class="text-center">
						<th colspan='2'>Product List</th>
						
						</tr>
					</thead>
					<tbody>
						@foreach($spares as $spare)
							<tr class="text-center">
								<td class="image-prod"><div class="img" style="background-image:url(storage/spares/{{ $spare->spareimage}});"></div></td>
							
								<td class="product-name">
								<h3>{{$spare->title}}</h3>
								<!-- <p>Far far away, behind the word mountains, far from the countries</p> -->
								</td>					
							</tr>
						@endforeach
					</tbody>
				</table>
		</div>
			</div>
		</div>
    </section>



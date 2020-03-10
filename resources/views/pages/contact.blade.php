<section class="ftco-section contact-section bg-light">
  <div class="container">
    <div class="row d-flex mb-5 contact-info">
      <div class="w-100"></div>          
      @foreach($contactDetails as $detail)
        <div class="col-md-3 d-flex">
          <div class="info bg-white p-4">
            <p>
              <span><i class={{ $detail->icon}}></i></span>
                {{ $detail->contact_info}}
            </p>
          </div>
        </div>
      @endforeach  
    </div>
    <div class="row block-9">
      <div class="col-md-6 order-md-last d-flex" style="justify-content: center;">
        <form autocomplete="off" action="{{ url('sendemail/send')}}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group {{ $errors->has('full_name')?'has-error':'' }}">
            <label for="full_name">Full Name<label class="required-field-class">*</label></label>
            <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Full Name" value="{{ old('full_name') }}" style="width:150%;">
            @if($errors->has('full_name'))
              <span class="help-block">
                {{ $errors->first('full_name') }}
              </span>
              @endif
          </div>
          <div class="form-group {{ $errors->has('email')?'has-error':'' }}">
            <label for="email">Email<label class="required-field-class">*</label></label>
            <input type="email" class="form-control" name="email" id="email" placeholder="email" value="{{ old('email') }}">
            @if($errors->has('email'))
              <span class="help-block">
                {{ $errors->first('email') }}
              </span>
            @endif
          </div>
          <div class="form-group {{ $errors->has('phone')?'has-error':'' }}">
            <label for="phone">Phone<label class="required-field-class">*</label></label>
            <input type="phone" class="form-control" name="phone" id="phone" placeholder="phone" value="{{ old('phone') }}">
            @if($errors->has('phone'))
              <span class="help-block">
                {{ $errors->first('phone') }}
              </span>
            @endif
          </div>
          <div class="form-group {{ $errors->has('reason')?'has-error':'' }}">
            <label for="reason">Reason<label class="required-field-class">*</label></label>
            <input type="reason" class="form-control" name="reason" id="reason" placeholder="reason" value="{{ old('reason') }}">
            @if($errors->has('reason'))
              <span class="help-block">
                {{ $errors->first('reason') }}
              </span>
            @endif
          </div>
          <div class="form-group {{ $errors->has('message')?'has-error':'' }}">
            <label for="message">Message<label class="required-field-class">*</label></label>
            <textarea name="message" id="message" cols="5" rows="5" class="form-control">{{ old('message') }}</textarea>
            @if($errors->has('message'))
              <span class="help-block">
                {{ $errors->first('message') }}
              </span>
            @endif
          </div>
          <div class="form-group">
            <button class="btn btn-success" style="margin-left: 14px;">
                Submit
            </button>
          </div>
        </form>          
      </div>
      <div class="col-md-6 d-flex">
        <div id="map" class="bg-white"></div>
      </div>
    </div>
  </div>
</section>
<script sync defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsFi2V5AA3A7PPTF5h9xMnGycwJvEIXN8&callback=initMap">
</script>
<script>
    var sites = {!! json_encode($maps->toArray()) !!};
  var latitude;
  var longitude;

function initMap(){
    console.log('sites',sites);
    
    // for(var i = 0; i < sites.length; i++) {
    //     latitude = sites[i].lat;
    //     longitude = sites[i].lon;    
    // }

 // Map Option
 var lat = latitude;
 var lon = longitude; 
    var options = {
      zoom:17,
      center:{  lat:parseFloat(sites[0].lat),lng:parseFloat(sites[0].lon)}
    }
   
    // New Map
    var map = new google.maps.Map(document.getElementById('map'),options);
  
    // Add marker
    var marker = new google.maps.Marker({
    position:{lat:parseFloat(sites[0].lat),lng:parseFloat(sites[0].lon)},
    map:map
    });
    
    var infoWindow = new google.maps.InfoWindow({
        content:sites[0].address
    });
    
    marker.addListener('click', function(){
        infoWindow.open(map, marker);
    })
  
  }
</script>


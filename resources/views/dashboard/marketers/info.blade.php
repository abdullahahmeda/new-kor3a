@extends('layouts.admin')

@section('additional_css')
<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIg793UIO-lGCHUeNURCT8mYFM63o6Czo&callback=initMap&libraries=&v=weekly"
      defer
    ></script>

    <style>
        #address_on_map {
            max-width: 400px;
            height: 400px;
        }
    </style>
@stop

@section('content_header')
    <h1>معلومات المسوق</h1>
@stop

@section('content')
    <div class="pb-4">
        <div class="form-group">
            <label for="name">الاسم</label>
            <input type="text" class="form-control-plaintext" readonly id="name" value="عبدالله أحمد">
        </div>
        <div class="form-group">
            <label for="id">الرقم الخاص للمسوق بالنظام</label>
            <input type="text" class="form-control-plaintext" readonly id="id" value="1234">
        </div>
        <div class="form-group">
            <label for="id">رقم الجوال المعتمد</label>
            <input type="text" class="form-control-plaintext" readonly id="id" value="+967123131313">
        </div>
        <div class="form-group">
            <label for="id">الرصيد (ريال سعودي)</label>
            <input type="text" class="form-control-plaintext" readonly id="id" value="5000">
        </div>
        <div class="form-group">
            <label for="id">الرصيد (ريال يمني)</label>
            <input type="text" class="form-control-plaintext" readonly id="id" value="200">
        </div>
        <h4>موقع المسوق</h4>
        <div class="form-group">
            <label for="city">المدينة</label>
            <input type="text" class="form-control-plaintext" readonly id="city" value="أبها">
        </div>
        <div class="form-group">
            <label for="district">الحي</label>
            <input type="text" class="form-control-plaintext" readonly id="district" value="حي قحطان">
        </div>
        <div class="form-group">
            <label for="street">الشارع</label>
            <input type="text" class="form-control-plaintext" readonly id="street" value="شارع النور">
        </div>
        <div class="form-group">
            <label for="city">العنوان</label>
            <input type="text" class="form-control-plaintext" readonly id="city" value="45 شارع النور">
        </div>
        <div class="form-group">
            <label for="address_on_map">الموقع على الخريطة</label>
            <div id="address_on_map"></div>
        </div>
    </div>
@stop

@section('additional_js')
<script>
// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
function initMap() {
  const map = new google.maps.Map(document.getElementById("address_on_map"), {
    center: { lat: -33.8688, lng: 151.2195 },
    zoom: 13,
  });
  const card = document.getElementById("pac-card");
  const input = document.getElementById("pac-input");
  map.controls[google.maps.ControlPosition.TOP].push(card);
  const autocomplete = new google.maps.places.Autocomplete(input);
  // Bind the map's bounds (viewport) property to the autocomplete object,
  // so that the autocomplete requests use the current map bounds for the
  // bounds option in the request.
  autocomplete.bindTo("bounds", map);
  // Set the data fields to return when the user selects a place.
  autocomplete.setFields(["address_components", "geometry", "icon", "name"]);
  const infowindow = new google.maps.InfoWindow();
  const infowindowContent = document.getElementById("infowindow-content");
  infowindow.setContent(infowindowContent);
  const marker = new google.maps.Marker({
    map,
    anchorPoint: new google.maps.Point(0, -29),
  });
  autocomplete.addListener("place_changed", () => {
    infowindow.close();
    marker.setVisible(false);
    const place = autocomplete.getPlace();

    if (!place.geometry) {
      // User entered the name of a Place that was not suggested and
      // pressed the Enter key, or the Place Details request failed.
      window.alert("No details available for input: '" + place.name + "'");
      return;
    }

    // If the place has a geometry, then present it on a map.
    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17); // Why 17? Because it looks good.
    }
    marker.setPosition(place.geometry.location);
    marker.setVisible(true);
    let address = "";

    if (place.address_components) {
      address = [
        (place.address_components[0] &&
          place.address_components[0].short_name) ||
          "",
        (place.address_components[1] &&
          place.address_components[1].short_name) ||
          "",
        (place.address_components[2] &&
          place.address_components[2].short_name) ||
          "",
      ].join(" ");
    }
    infowindowContent.children["place-icon"].src = place.icon;
    infowindowContent.children["place-name"].textContent = place.name;
    infowindowContent.children["place-address"].textContent = address;
    infowindow.open(map, marker);
  });
}
</script>

@endsection
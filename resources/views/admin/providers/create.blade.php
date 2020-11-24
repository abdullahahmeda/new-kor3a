@extends('layouts.admin')

@section('additional_css')
<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIg793UIO-lGCHUeNURCT8mYFM63o6Czo&callback=initMap&libraries=&v=weekly"
      defer
    ></script>

    <style>
        #address_on_map_sa, #address_on_map_ye, #starting_point {
            max-width: 400px;
            height: 400px;
        }
    </style>
@stop

@section('content_header')
    <h1>إضافة مزود</h1>
@stop

@section('content')

    <form method="POST" {{-- action="{{ route('admin.competitions.store') }}" --}} class="pb-4 @if ($errors->any()) was-validated @endif" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">اسم الشركة</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group" id="discount_percentage-warapper">
            <label for="phone">جوال الحجز المعتمد</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="مثال +123456789" required>
            @error('phone')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="delegate_name">اسم الشخص المفوض</label>
            <input type="text" class="form-control" id="delegate_name" name="delegate_name" value="{{ old('delegate_name') }}" required>
            @error('delegate_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="bank_account_number_sa">رقم الحساب البنكي (السعودية)</label>
            <input type="text" class="form-control" id="bank_account_number_sa" name="bank_account_number_sa" value="{{ old('bank_account_number_sa') }}" required>
            @error('bank_account_number_sa')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="iban_number_sa">رقم الايبان (إن وجد) (السعودية)</label>
            <input type="text" class="form-control" id="iban_number_sa" name="iban_number_sa" value="{{ old('iban_number_sa') }}">
            @error('iban_number_sa')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="bank_name_sa">اسم البنك (السعودية)</label>
            <input type="text" class="form-control" id="bank_name_sa" name="bank_name_sa" value="{{ old('bank_name_sa') }}">
            @error('bank_name_sa')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="bank_soft_code_sa">السوفت كود للبنك (السعودية)</label>
            <input type="text" class="form-control" id="bank_soft_code_sa" name="bank_soft_code_sa" value="{{ old('bank_soft_code_sa') }}" required>
            @error('bank_soft_code_sa')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="address_sa">العنوان (السعودية)</label>
            <input type="text" class="form-control" id="address_sa" name="address_sa" value="{{ old('address_sa') }}" required>
            @error('address_sa')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="address_on_map_sa">الموقع على الخريطة (السعودية)</label>
            <div class="pac-card" id="pac-card">
                <div>
                    <div id="title">بحث</div>
                </div>
                <div id="pac-container">
                    <input id="pac-input" type="text" placeholder="اكتب المكان" />
                </div>
            </div>

            <div id="address_on_map_sa"></div>
            @error('address_on_map_sa')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="bank_account_number_ye">رقم الحساب البنكي (اليمن)</label>
            <input type="text" class="form-control" id="bank_account_number_ye" name="bank_account_number_ye" value="{{ old('bank_account_number_ye') }}" required>
            @error('bank_account_number_ye')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="iban_number_ye">رقم الايبان (إن وجد) (اليمن)</label>
            <input type="text" class="form-control" id="iban_number_ye" name="iban_number_ye" value="{{ old('iban_number_ye') }}">
            @error('iban_number_ye')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="bank_name_ye">اسم البنك (اليمن)</label>
            <input type="text" class="form-control" id="bank_name_ye" name="bank_name_ye" value="{{ old('bank_name_ye') }}">
            @error('bank_name_ye')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="bank_soft_code_ye">السوفت كود للبنك (اليمن)</label>
            <input type="text" class="form-control" id="bank_soft_code_ye" name="bank_soft_code_ye" value="{{ old('bank_soft_code_ye') }}" required>
            @error('bank_soft_code_ye')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="address_ye">العنوان (اليمن)</label>
            <input type="text" class="form-control" id="address_ye" name="address_ye" value="{{ old('address_ye') }}" required>
            @error('address_ye')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="address_on_map_ye">الموقع على الخريطة (اليمن)</label>
            <div class="pac-card" id="pac-card">
                <div>
                    <div id="title">بحث</div>
                </div>
                <div id="pac-container">
                    <input id="pac-input" type="text" placeholder="اكتب المكان" />
                </div>
            </div>

            <div id="address_on_map_ye"></div>
            @error('address_on_map_ye')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="starting_point_location">موقع مكان الصعود على الخريطة</label>
            <div class="pac-card" id="pac-card">
                <div>
                    <div id="title">بحث</div>
                </div>
                <div id="pac-container">
                    <input id="pac-input" type="text" placeholder="اكتب المكان" />
                </div>
            </div>

            <div id="starting_point_location"></div>
            @error('starting_point_location')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="city">المدينة</label>
            <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" required>
            @error('city')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="starting_point_url">رابط الصعود على الخريطة</label>
            <input type="url" class="form-control" id="starting_point_url" name="starting_point_url" value="{{ old('starting_point_url') }}" required>
            @error('starting_point_url')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="d-flex my-2">
            <button type="button" class="btn btn-primary ml-1">أضف مكان صعود</button>
            <button type="button" disabled class="btn btn-danger">حذف مكان صعود</button>
        </div>
        <div class="form-group">
            <label for="website">الموقع على الانترنت</label>
            <input type="url" class="form-control" id="website" name="website" value="{{ old('website') }}" required>
            @error('website')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>صلاحية الوكلاء المالية</label>
            <div class="agents-wrapper">
                <div class="agent mb-2 row">
                    <input type="text" class="form-control col-4" name="agent_name[]" placeholder="اسم الوكيل">
                    <input type="text" class="form-control col-4" name="agent_value[]" placeholder="الصلاحية المالية">
                    <select class="form-control col-4" name="agent_currency[]">
                        <option value="sar" selected>ريال سعودي</option>
                        <option value="yer">ريال يمني</option>
                    </select>
                </div>
                <div class="agent row">
                    <input type="text" class="form-control col-4" name="agent_name[]" placeholder="اسم الوكيل">
                    <input type="text" class="form-control col-4" name="agent_value[]" placeholder="الصلاحية المالية">
                    <select class="form-control col-4" name="agent_currency[]">
                        <option value="sar">ريال سعودي</option>
                        <option value="yer" selected>ريال يمني</option>
                    </select>
                </div>
            </div>
            <div class="d-flex mt-2">
                <button type="button" class="btn btn-primary ml-1">أضف وكيل آخر</button>
                <button type="button" disabled class="btn btn-danger">حذف وكيل</button>
            </div>
            @error('agents')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">إنشاء</button>
    </form>
@stop

@section('additional_js')
<script>
// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
function initMap() {
  const map = new google.maps.Map(document.getElementById("address_on_map_sa"), {
    center: { lat: -33.8688, lng: 151.2195 },
    zoom: 13,
  });
  const map2 = new google.maps.Map(document.getElementById("address_on_map_ye"), {
    center: { lat: -33.8688, lng: 151.2195 },
    zoom: 13,
  });
  const map3 = new google.maps.Map(document.getElementById("starting_point_location"), {
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
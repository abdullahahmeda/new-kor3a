@extends('layouts.admin')

@section('content_header')
    <h1>إنشاء قرعة</h1>
    <p class="mt-1 text-muted">ملحوظة: جميع الأوقات الآتية بتوقيت اليمن</p>
@stop

@section('content')

    <form method="POST" action="{{ route('admin.competitions.store') }}" class="pb-4" enctype="multipart/form-data">
        @csrf
        {{-- <div class="form-group">
            <label for="type">النوع</label>
            <select name="type" id="type" class="form-control" onchange="checkType()">
                <option value="free">مجانية</option>
                <option value="discount">مخفضة</option>
            </select>
        </div> --}}
        <div class="form-group" id="discount_percentage-warapper">
            <label for="discount_percentage">نسبة التخفيض</label>
            <input type="number" class="form-control" id="discount_percentage" min="1" max="100" name="discount_percentage" value="{{ old('discount_percentage') }}" required>
            <small class="form-text text-muted">
                ضع 100 للقرع المجانية
            </small>
            @error('discount_percentage')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="available_tickets">عدد التذاكر المجانية / المخفضة</label>
            <input type="number" class="form-control" id="available_tickets" min="0" name="available_tickets" value="{{ old('available_tickets') }}" required>
            @error('available_tickets')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        {{-- <div class="form-group">
            <label for="week">اسبوع بدء القرعة</label>
            <input type="date" class="form-control" id="week" min="0" name="week" required>
            <small class="form-text text-muted">
                اختر أي يوم من أيام الاسبوع الذي سوف تظهر فيه القرعة
            </small>
        </div> --}}
        <div class="form-group">
            <label for="trip_at">معاد الرحلة</label>
            <input type="date" class="form-control" id="trip_at" name="trip_at" onchange="setTripMaxDate()" value="{{ old('trip_at') }}" required>
            @error('trip_at')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="finish_at">معاد اختيار الفائز</label>
            <input type="date" class="form-control" id="finish_at" name="finish_at" value="{{ old('finish_at') }}" required>
            <small>
                في أول هذا اليوم (منتصف الليل)، سيتم إختيار الفائز
            </small>
            @error('finish_at')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="direction">اتجاه الرحلة</label>
            <select name="direction" id="direction" class="bg-gray-300 text-sm form-control" required>
                <option value="saudia_yemen" {{ old('direction') == 'saudia_yemen' ? 'selected' : '' }}>من السعودية إلى اليمن</option>
                <option value="yemen_saudia" {{ old('direction') == 'yemen_saudia' ? 'selected' : '' }}>من اليمن إلى السعودية</option>
                <option value="in_yemen" {{ old('direction') == 'in_yemen' ? 'selected' : '' }}>داخل المدن اليمنية</option>
            </select>
            @error('direction')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="starting_place">نقطة الانطلاق</label>
            <input type="text" class="form-control" name="starting_place" value="{{ old('starting_place') }}" id="starting_place" required>
            @error('starting_place')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="finishing_place">نقطة النهاية</label>
            <input class="form-control" name="finishing_place" value="{{ old('finishing_place') }}" id="finishing_place" required>
            @error('finishing_place')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="transportation_company">الشركة الناقلة</label>
            <input type="text" class="form-control" id="transportation_company" name="transportation_company" value="{{ old('transportation_company') }}" required>
            @error('transportation_company')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="booking_link">رابط الحجز من يمن باص</label>
            <input type="url" class="form-control" id="booking_link" name="booking_link" value="{{ old('booking_link') }}" required>
            @error('booking_link')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="result_phone">الجوال الخاص باستقبال النتائج</label>
            <input type="text" class="form-control" id="result_phone" name="result_phone" placeholder="مثال: +20101234567" value="{{ old('result_phone') }}" required>
            @error('result_phone')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="sponsor">الراعي</label>
            <input type="text" class="form-control" id="sponsor" name="sponsor" value="{{ old('sponsor') }}" required>
            @error('sponsor')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="banner">بانر الراعي (اختياري)</label>
            <div class="form-check">
                <input class="form-check-input banner-type" checked type="radio" onchange="checkBannerType()" name="banner_type" value="banner_image" id="banner_image">
                <label class="form-check-label mr-4" for="banner_image">
                    ملف
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input banner-type" type="radio" onchange="checkBannerType()" name="banner_type" value="banner_url" id="banner_url">
                <label class="form-check-label mr-4" for="banner_url">
                    رابط (صورة)
                </label>
            </div>
            <input type="file" class="form-control mt-2" id="banner" name="banner" value="{{ old('banner') }}">
            @error('banner')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button class="btn btn-success">إنشاء</button>
    </form>
@stop

{{-- @section('plugins.Select2', true) --}}

@section('additional_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/luxon/1.25.0/luxon.min.js"></script>
    <script>
        //var tomorrow = new Date( new Date().getTime() + (1000 * 60 * 60 *24) );
        //document.getElementById('week').setAttribute('min', new Date().toISOString().split("T")[0]);
        var tomorrow = luxon.DateTime.local().setZone('Asia/Aden').plus({ days: 1 });
        document.getElementById('finish_at').setAttribute('min', tomorrow.toISODate());
        document.getElementById('trip_at').setAttribute('min', tomorrow.toISODate());

        function setTripMaxDate() {
            document.getElementById('finish_at').setAttribute('max', document.getElementById('trip_at').value);
        }
        setTripMaxDate()
        
        function checkBannerType() {
            var type = $('.banner-type:checked').val();

            if (type === 'banner_image') {
                $('#banner').attr('type', 'file');
            }
            else {
                $('#banner').attr('type', 'text');
            }
        }
        checkBannerType();

        /*function checkType() {
            if (document.getElementById('type').value === 'free') {
                $('discount_percentage').prop('required', false);
                $('#discount_percentage-warapper').addClass('d-none');
                return;
            }
            $('#discount_percentage-warapper').removeClass('d-none');
            $('discount_percentage').prop('required', true);
            return;
        }*/
        //checkType();
    </script>
@stop
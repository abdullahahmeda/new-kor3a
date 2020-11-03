@extends('layouts.admin')

@section('content_header')
    <h1>إنشاء قرعة</h1>
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
            <input type="file" class="form-control" id="banner" name="banner" value="{{ old('banner') }}">
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
    <script>
        document.getElementById('finish_at').setAttribute('min', new Date().toISOString().split("T")[0]);
        //document.getElementById('week').setAttribute('min', new Date().toISOString().split("T")[0]);
        document.getElementById('trip_at').setAttribute('min', new Date().toISOString().split("T")[0]);

        function setTripMaxDate() {
            document.getElementById('finish_at').setAttribute('max', document.getElementById('trip_at').value);
        }
        setTripMaxDate()

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
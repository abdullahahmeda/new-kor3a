@extends('layouts.admin')

@section('content_header')
    <h1>القرعة رقم {{ $competition->id }}</h1>
@stop

@section('content')

    <div class="pb-4">
        <div class="form-group" id="discount_percentage-warapper">
            <label for="discount_percentage">سعر التذكرة قبل التخفيض</label>
            <input type="text" class="form-control-plaintext" readonly id="old_ticket_price" value="{{ $competition->old_ticket_price }} ريال" required>
        </div>
        <div class="form-group" id="discount_percentage-warapper">
            <label for="discount_percentage">نسبة التخفيض</label>
            <input type="text" class="form-control-plaintext" readonly id="discount_percentage" value="{{ $competition->discount_percentage }}%" required>
        </div>
        <div class="form-group" id="discount_percentage-warapper">
            <label for="discount_percentage">سعر التذكرة بعد التخفيض</label>
            <input type="text" class="form-control-plaintext" readonly id="new_ticket_price" value="{{ $competition->old_ticket_price * ( (100 - $competition->discount_percentage) / 100 ) }} ريال (سيتم توفير {{ $competition->old_ticket_price * $competition->discount_percentage / 100 }} ريال)" required>
        </div>
        <div class="form-group">
            <label for="available_tickets">عدد التذاكر المجانية / المخفضة</label>
            <input type="text" class="form-control-plaintext" readonly id="available_tickets" min="0" value="{{ $competition->available_tickets }} تذكرة" required>
        </div>
        <div class="form-group">
            <label for="trip_at">معاد الرحلة</label>
            <input type="text" class="form-control-plaintext" readonly id="trip_at" onchange="setTripMaxDate()" value="{{ $competition->trip_at }}" required>
        </div>
        <div class="form-group">
            <label for="finish_at">معاد اختيار الفائز</label>
            <input type="text" class="form-control-plaintext" readonly id="finish_at" value="{{ $competition->finish_at }}" required>
        </div>
        <div class="form-group">
            <label for="direction">اتجاه الرحلة</label>
            <input type="text" class="form-control-plaintext" readonly id="direction" value="{{ $competition->directionText() }}" required>
        </div>
        <div class="form-group">
            <label for="starting_place">نقطة الانطلاق</label>
            <input type="text" class="form-control-plaintext" readonly value="{{ $competition->starting_place }}" id="starting_place" required>
        </div>
        <div class="form-group">
            <label for="finishing_place">نقطة النهاية</label>
            <input type="text" class="form-control-plaintext" readonly value="{{ $competition->finishing_place }}" id="finishing_place" required>
        </div>
        <div class="form-group">
            <label for="booking_link">رابط الحجز من يمن باص</label>
            <a type="url" id="booking_link" class="d-block" href="{{ $competition->booking_link }}">{{ $competition->booking_link }}</a>
        </div>
        <div class="form-group">
            <label for="result_phone">الجوال الخاص باستقبال النتائج</label>
            <input type="text" class="form-control-plaintext" readonly id="result_phone" placeholder="مثال: +20101234567" value="{{ $competition->result_phone }}" required>
        </div>
        <div class="form-group">
            <label for="sponsor">الراعي</label>
            <input type="text" class="form-control-plaintext" readonly id="sponsor" value="{{ $competition->sponsor }}" required>
        </div>
        <div class="form-group">
            <label for="sponsor">رابط الراعي</label>
            <a class="d-block" href="{{ $competition->sponsor_url }}">{{ $competition->sponsor_url }}</a>
        </div>
        <div class="form-group">
            <label for="banner">بانر الراعي</label>
            <img id="banner" class="d-block" src="{{ $competition->sponsor_banner }}" alt="لا يمكن تحميل البانر">
        </div>
        <div class="form-group">
            <label for="transportation_company">الشركة الناقلة</label>
            <input type="text" class="form-control-plaintext" readonly id="transportation_company" value="{{ $competition->transportation_company }}" required>
        </div>
        <div class="form-group">
            <label for="transportation_company">رابط الشركة الناقلة</label>
            <a id="transportation_company" class="d-block" href="{{ $competition->transportation_company_url }}">{{ $competition->transportation_company_url }}</a>
        </div>
        <div class="form-group">
            <label for="transportation_company">بانر الشركة الناقلة</label>
            <img id="banner" class="d-block" src="{{ $competition->transportation_company_banner }}" alt="لا يمكن تحميل البانر">
        </div>
    </div>
@stop
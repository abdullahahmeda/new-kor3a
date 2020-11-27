@extends('layouts.admin')

@section('content_header')
    <h1>خدمات المسوق</h1>
@stop

@section('content')
    <a href="{{ route('dashboard.reservations.confirm') }}" class="btn btn-primary mb-2">طلب تأكيد حجز</a>
    <a href="{{ route('dashboard.reservations.postpone') }}" class="btn btn-warning mb-2">طلب تأجيل حجز</a>
    <a href="{{ route('dashboard.reservations.cancel') }}" class="btn btn-danger mb-2">طلب إلغاء حجز</a>
    <a href="{{ route('dashboard.marketers.sms') }}" class="btn btn-info mb-2">إرسال رسالة نصية لعميل</a>
@stop

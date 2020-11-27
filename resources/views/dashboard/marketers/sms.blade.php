@extends('layouts.admin')

@section('content_header')
    <h1>طلب تأجيل حجز</h1>
@stop

@section('content')
    <form class="pb-4 @if ($errors->any()) was-validated @endif" method="POST">
        @csrf
        <div class="form-group mt-2">
            <label for="order_id">رقم الطلب</label>
            <input type="text" class="form-control" id="order_id" name="order_id" required>
        </div>
        <div class="form-group mt-2">
            <label for="passenger_phone">جوال المسافر</label>
            <input type="text" class="form-control" id="passenger_phone" name="passenger_phone" placeholder="مثال +9661231313131" required>
        </div>
        <div class="form-group mt-2">
            <label for="currency">العملة</label>
            <select name="currency" class="form-control" id="currency" required>
                <option value="sar">ريال سعودي</option>
                <option value="yer">ريال يمني</option>
            </select>
        </div>
        <div class="form-group mt-2">
            <label for="amount">المبلغ</label>
            <input type="number" min="1" class="form-control" id="amount" name="amount" required>
        </div>
        <div class="form-group mt-2">
            <label for="subject">موضوع الرسالة</label>
            <input type="text" class="form-control" name="subject" id="subject" required>
        </div>
        <div class="form-group mt-2">
            <label for="message">الرسالة</label>
            <textarea class="form-control" id="message" name="message"></textarea>
        </div>
        <button class="btn btn-info">أرسل الرسالة</button>
    </form>
@stop

@section('additional_js')
    <script>
        $('#postpone_to').attr('min', new Date().toISOString().split('T')[0]);
    </script>

@endsection
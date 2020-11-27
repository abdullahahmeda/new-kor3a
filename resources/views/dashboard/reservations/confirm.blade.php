@extends('layouts.admin')

@section('content_header')
    <h1>تأكيد حجز</h1>
@stop

@section('content')
    <form class="pb-4 @if ($errors->any()) was-validated @endif" method="POST">
        @csrf
        <div class="form-group mt-2">
            <label for="order_id">رقم الطلب</label>
            <input type="text" class="form-control" id="order_id" name="order_id" required>
        </div>
        <div class="form-group mt-2">
            <label for="order_url">رابط الطلب</label>
            <input type="url" class="form-control" id="order_url" name="order_url" required>
        </div>
        <div class="form-group mt-2">
            <label for="passenger_name">اسم المسافر</label>
            <input type="text" class="form-control" id="passenger_name" name="passenger_name" required>
        </div>
        <div class="form-group mt-2">
            <label for="passenger_phone">جوال المسافر</label>
            <input type="text" class="form-control" id="passenger_phone" name="passenger_phone" placeholder="مثال +9661231313131" required>
        </div>
        <div class="form-group mt-2">
            <label for="company">الشركة</label>
            <select name="company" class="form-control" id="company" required>
                <option value="1">شركة رقم 1</option>
                <option value="2">شركة رقم 2</option>
                <option value="3">شركة رقم 3</option>
            </select>
        </div>
        <div class="form-group mt-2">
            <label for="currency">العملة</label>
            <select name="currency" class="form-control" id="currency" required>
                <option value="sar">ريال سعودي</option>
                <option value="yer">ريال يمني</option>
            </select>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="amount_type" id="amount_type" value="full">
            <label class="form-check-label mr-4" for="amount_type">
                المبلغ كاملاً
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="amount_type" id="amount_type" value="deposit">
            <label class="form-check-label mr-4" for="amount_type">
                المبلغ بعربون
            </label>
        </div>
        <div class="form-group mt-2">
            <label for="amount">المبلغ</label>
            <input type="number" min="1" class="form-control" name="amount">
        </div>
        <button class="btn btn-success">تأكيد الحجز</button>
        <!-- TODO confirmation message after submission: سوف يتم خصم مبلغ الحجز () ريال. / سعودي. /يمني. من رصيدك ... -->
    </form>
@stop

@extends('layouts.admin')

@section('content_header')
    <h1>شحن رصيد المسوق</h1>
@stop

@section('content')
    <form class="pb-4 @if ($errors->any()) was-validated @endif" method="POST">
        @csrf
        <div class="form-group mt-2">
            <label for="amount">المبلغ</label>
            <input type="number" class="form-control" name="amount">
        </div>
        <div class="form-group mt-2">
            <label for="currency">العملة</label>
            <select name="currency" class="form-control" id="currency">
                <option value="sar">ريال سعودي</option>
                <option value="yer">ريال يمني</option>
            </select>
        </div>
        <div class="form-group mt-2">
            <label for="notes">ملاحظات</label>
            <textarea class="form-control" name="notes"></textarea>
        </div>
        <div class="form-group mt-2">
            <label for="transfer_img">صورة الحوالة</label>
            <input type="file" class="form-control" name="transfer_img">
        </div>
        <button class="btn btn-success">شحن الرصيد</button>
    </form>
@stop

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
            <label for="postpone_to">التأجيل إلى تاريخ</label>
            <input type="date" class="form-control" name="postpone_to" id="postpone_to" required>
                
        </div>
        <div class="form-group mt-2">
            <label for="notes">ملاحظات</label>
            <textarea class="form-control" name="notes"></textarea>
        </div>
        <button class="btn btn-warning">طلب تأجيل الحجز</button>
    </form>
@stop

@section('additional_js')
    <script>
        $('#postpone_to').attr('min', new Date().toISOString().split('T')[0]);
    </script>

@endsection
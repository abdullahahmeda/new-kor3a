@extends('layouts.admin')

@section('additional_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/css/tempusdominus-bootstrap-4.min.css" integrity="sha512-PMjWzHVtwxdq7m7GIxBot5vdxUY+5aKP9wpKtvnNBZrVv1srI8tU6xvFMzG8crLNcMj/8Xl/WWmo/oAP/40p1g==" crossorigin="anonymous" />
@endsection

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.31/moment-timezone-with-data.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/js/tempusdominus-bootstrap-4.min.js" crossorigin="anonymous"></script>
    <script>
        $.fn.datetimepicker.Constructor.Default = $.extend({}, $.fn.datetimepicker.Constructor.Default, {
            icons: {
                time: 'fas fa-clock',
                date: 'fas fa-calendar',
                up: 'fas fa-arrow-up',
                down: 'fas fa-arrow-down',
                previous: 'fas fa-chevron-right',
                next: 'fas fa-chevron-left',
                today: 'fas fa-calendar-check-o',
                clear: 'fas fa-trash',
                close: 'fas fa-times'
            } });

        $('#postpone_to').attr('min', new Date().toISOString().split('T')[0]);
    </script>

@endsection
@extends('layouts.admin')

@section('content_header')
    <h1>أرشيف المسوق</h1>
@stop

@section('content')
    <div class="pb-4">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="small-box bg-info">
                    <div class="inner">
                    <h3>150</h3>
                        <p>حجوزاتي بعربون</p>
                    </div>
                    {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="small-box bg-success">
                    <div class="inner">
                    <h3>200</h3>
                        <p>حجوزاتي بالمبغ كاملاً</p>
                    </div>
                    {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                    <h3>10</h3>
                        <p>طلبات تعديل حجز</p>
                    </div>
                    {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                    <h3>5</h3>
                        <p>طلبات الغاء حجز</p>
                    </div>
                    {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                    <h3>120</h3>
                        <p>الرسائل النصية المرسلة</p>
                    </div>
                    {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="small-box bg-default">
                    <div class="inner">
                    <h3>70</h3>
                        <p>الملفات المرفوعة</p>
                    </div>
                    {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                </div>
            </div>
        </div>

        <div>
            <form action="dashboard/marketers/search" method="GET">
                <div class="form-group">
                    <label for="order_id">البحث برقم الطلب</label>
                    <input type="text" class="form-control" id="order_id" name="order_id">
                </div>
                <button class="btn btn-primary">بحث</button>
            </form>
            <form action="dashboard/marketers/search" class="mt-4" method="GET">
                <div class="form-group">
                    <label for="phone">البحث برقم الهاتف</label>
                    <input type="text" class="form-control" id="phone" name="phone">
                </div>
                <button class="btn btn-primary">بحث</button>
            </form>
        </div>
    </div>
@stop
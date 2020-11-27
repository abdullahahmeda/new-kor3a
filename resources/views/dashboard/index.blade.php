@extends('layouts.admin')

@section('content_header')
    <h1>لوحة التحكم</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card text-white bg-primary">
                    <div class="card-body text-center mx-auto">
                        <h5 class="card-title mb-2">إجمالي المشاركين في القرع</h5>
                        <p class="card-text h3">{{ $total_participants }}</p>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card text-white bg-primary">
                    <div class="card-body text-center mx-auto">
                        <h5 class="card-title mb-2">عدد القرع الكلي</h5>
                        <p class="card-text h3">{{ $total_competitions }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

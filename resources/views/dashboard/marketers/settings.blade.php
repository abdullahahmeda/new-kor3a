@extends('layouts.admin')

@section('content_header')
    <h1>إعدادات المسوق</h1>
@stop

@section('content')
    <form class="pb-4 @if ($errors->any()) was-validated @endif" method="POST">
        @csrf
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="available" id="available">
            <label class="form-check-label mr-4" for="available">
                إظهار بقائمة المسوقين المتاحين للجمهور
            </label>
        </div>
        <button class="btn mt-2 btn-primary">تحديث</button>
    </form>
@stop

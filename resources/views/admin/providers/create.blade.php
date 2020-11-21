@extends('layouts.admin')

@section('content_header')
    <h1>إضافة مسوق</h1>
@stop

@section('content')

    <form method="POST" {{-- action="{{ route('admin.competitions.store') }}" --}} class="pb-4 @if ($errors->any()) was-validated @endif" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">اسم مقدم الخدمة</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group" id="discount_percentage-warapper">
            <label for="phone">رقم الجوال</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="مثال +123456789" required>
            @error('phone')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <input class="form-check-input" type="checkbox" name="is_certified" id="is_certified">
            <label class="form-check-label mr-4" for="is_certified">
                الحجز المعتمد
            </label>
        </div>
        <div class="form-group">
            <label for="password">كلمة السر</label>
            <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" required>
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="status">الحالة</label>
            <select name="status" id="status" required class="form-control">
                <option value="active">مفعل</option>
                <option value="not_active">غير مفعل</option>
                <option value="suspended">موقوف</option>
            </select>
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">إنشاء</button>
    </form>
@stop

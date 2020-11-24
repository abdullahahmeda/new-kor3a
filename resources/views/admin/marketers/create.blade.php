@extends('layouts.admin')

@section('content_header')
    <h1>إضافة مسوق</h1>
@stop

@section('content')

    <form method="POST" {{-- action="{{ route('admin.competitions.store') }}" --}} class="pb-4 @if ($errors->any()) was-validated @endif" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">اسم المسوق</label>
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
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="is_certified" id="is_certified">
                <label class="form-check-label mr-4" for="is_certified">
                    الحجز المعتمد
                </label>
            </div>
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
        <div class="form-group">
            <label>الصلاحيات</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="is_certified" id="is_certified">
                <label class="form-check-label mr-4" for="is_certified">
                    الحجز
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="is_certified" id="is_certified">
                <label class="form-check-label mr-4" for="is_certified">
                    تعديل الموعد
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="is_certified" id="is_certified">
                <label class="form-check-label mr-4" for="is_certified">
                    إلغاء الحجز
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="is_certified" id="is_certified">
                <label class="form-check-label mr-4" for="is_certified">
                    قبض العربون نقداً
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="is_certified" id="is_certified">
                <label class="form-check-label mr-4" for="is_certified">
                    قبض كامل المبلغ
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="">المزودين ( شركة النقل) المفوض بها عليهم</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="provider" id="provider_global" value="global">
                <label class="form-check-label mr-4" for="provider_global">
                    عام
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="provider" id="provider_specific" value="specific">
                <label class="form-check-label mr-4 d-inline-block" for="provider_specific">
                    محدد لشركة <input type="text" class="form-control" placeholder="اسم الشركة">
                </label>
            </div>
        </div>

        <h4>الحدود المالية</h4>
        <div class="form-group">
            <label for="max_rs">الحد الاعلى رصيدا (ريال سعودي)</label>
            <input type="number" min="0" id="max_rs" name="max_rs" class="form-control">
        </div>
        <div class="form-group">
            <label for="max_ry">الحد الاعلى رصيدا (ريال يمني)</label>
            <input type="number" min="0" id="max_ry" name="max_ry" class="form-control">
        </div>
        <div class="form-group">
            <label for="tip_rs">عمولة التسويق (ريال سعودي / تذكرة)</label>
            <input type="number" min="0" id="tip_rs" name="tip_rs" class="form-control">
        </div>
        <div class="form-group">
            <label for="tip_ry">عمولة التسويق (ريال يمني / تذكرة)</label>
            <input type="number" min="0" id="tip_ry" name="tip_ry" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">إنشاء</button>
    </form>
@stop

@extends('layouts.admin')

@section('content_header')
    @if (Session::has('message'))
        <div class="alert alert-{{ Session::get('type', 'warning') }}">
            {{ Session::get('message') }}
        </div>
    @endif
    <h1>إعدادات الأدمن</h1>
@stop

@section('content')
    <div>
        <form action="{{ route('admin.admin.update') }}" method="POST" class="@if (count($errors)) was-validated @endif">
            @csrf
            <div class="form-group">
                <label for="name">الاسم</label>
                <input type="text" class="form-control" value="{{ $admin->name }}" name="name" id="name" required>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">الإيميل</label>
                <input type="email" class="form-control" value="{{ $admin->email }}" name="email" id="email" required>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">كلمة المرور</label>
                <input type="password" class="form-control" name="password" id="password" required>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation">إعادة تأكيد كلمة المرور</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
                @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button class="btn btn-primary">تحديث</button>
        </form>
    </div>
@stop

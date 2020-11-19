@extends('adminlte::page')

@section('css')
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@400;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @yield('additional_css')
@stop

@section('js')
    @yield('additional_js')
@stop
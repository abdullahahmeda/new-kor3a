@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @yield('additional_css')
@stop

@section('js')
    @yield('additional_js')
@stop
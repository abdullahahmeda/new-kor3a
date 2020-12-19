@extends('layouts.admin')

@section('additional_css')
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css">
@stop

@section('content_header')
    @if (Session::has('message'))
        <div class="alert alert-{{ Session::get('type', 'warning') }}">
            {{ Session::get('message') }}
        </div>
    @endif
    <div class="d-flex justify-content-between">
        <h1>أرقام الواتساب</h1>
    </div>
@stop

@section('content')
    <table class="datatable w-100">
        <thead>
            <th>رقم الواتساب</th>
        </thead>
        <tbody>
            @foreach ($whatsapp_phones as $whatsapp_phone)
                <tr>
                    <td>{{ $whatsapp_phone->phone }}</td>
                    <td>
                        <a class="btn btn-sm btn-info" target="_blank" href="{{ $whatsapp_phone->link }}">إرسال رسالة واتساب</a>
                        <form class="d-inline-block" method="POST" action="{{ route('dashboard.whatsapp.destroy', $whatsapp_phone) }}" onsubmit="event.preventDefault(); confirmDelete(this)">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" href="">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


@stop

@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('additional_js')
<script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
<script>
    $('.datatable').DataTable({
        responsive: true,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Arabic.json'
        }
    });

    function confirmDelete(form) {
        event.preventDefault();
        Swal.fire({
            title: 'هل أنت متأكد من رغبتك في حذف هذا الرقم؟',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'نعم',
            cancelButtonText: 'لا'
            }).then((result) => {
            
            if (result.isConfirmed) {
                form.submit();
            }
        })
    }
</script>
@endsection
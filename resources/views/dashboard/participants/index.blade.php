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
        <h1>المشاركين</h1>
    </div>
@stop

@section('content')
    <table class="datatable w-100">
        <thead>
            <th>ID</th>
            <th>رقم الجوال</th>
            <th>نقطة الانطلاق</th>
            <th>نقطة النهاية</th>
            <th>الإجراءات</th>
        </thead>
        <tbody>
            @foreach ($participants as $participant)
                <tr>
                    <td>{{ $participant->id }}</td>
                    <td>{{ $participant->phone }}</td>
                    <td>{{ $participant->competition->starting_place }}</td>
                    <td>{{ $participant->competition->finishing_place }}</td>
                    <td>
                        <form class="d-inline-block" method="POST" action="{{ route('dashboard.participants.destroy', $participant) }}" onsubmit="event.preventDefault(); confirmDelete(this)">
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
            title: 'هل أنت متأكد من رغبتك في حذف هذا المشارك؟',
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
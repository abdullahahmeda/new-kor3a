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
        <h1>القرع</h1>
        <a href="{{ route('admin.competitions.create') }}" class="btn btn-success">إضافة قرعة</a>
    </div>
@stop

@section('content')
    <table class="datatable w-100">
        <thead>
            <th>ID</th>
            <th>ميعاد الرحلة</th>
            <th>تنتهي في</th>
            <th>عدد التذاكر المتاحة</th>
            <th>عدد المشاركين</th>
            <th>الراعي</th>
            <th>الحالة</th>
            <th>الإجراءات</th>
        </thead>
        <tbody>
            @foreach ($competitions as $competition)
                <tr>
                    <td>{{ $competition->id }}</td>
                    <td>{{ $competition->trip_at }}</td>
                    <td>{{ $competition->finish_at }}</td>
                    <td>{{ $competition->available_tickets }}</td>
                    <td>{{ count($competition->participants) }}</td>
                    <td>{{ $competition->sponsor }}</td>
                    <td>{{ $competition->status == 'active' ? 'مفعلة' : 'منتهية' }}</td>
                    <td>
                        <a class="btn btn-sm btn-info" href="{{ route('admin.competitions.show', $competition) }}">عرض</a>
                        <a class="btn btn-sm btn-warning" href="{{ route('admin.competitions.edit', $competition) }}">تعديل</a>
                        <form class="d-inline-block" method="POST" action="{{ route('admin.competitions.destroy', $competition) }}" onsubmit="event.preventDefault(); confirmDelete(this)">
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
            title: 'هل أنت متأكد من رغبتك في حذف هذه القرعة؟',
            text: "هذا سيحذف المشاركين أيضاً",
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
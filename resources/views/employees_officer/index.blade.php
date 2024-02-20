@extends('layout.main')
@section('content')
@section('title_content_main')
    الضباط
@section('title_content_sub')
    عرض الضباط
@endsection
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
    integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="panel">
<div class="panel-body">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">
        <div class="">
            <div class="m-b-30">
                <a id="addToTable" href="{{ route('employeesofficer.create') }}"
                    class="btn btn-success waves-effect waves-light">Add <i
                        class="mdi mdi-plus-circle-outline"></i></a>
            </div>
        </div>
    </div>
    <form>
        <input type="search" class="form-control" placeholder="البحث بالرقم الوطني" name="search">
    </form>
    <br>
    <div class="table-responsive">
        <table class="table m-0 table-colored table-success" id="datatable-editable">
            <thead>
                <tr>
                    <th>رقم الملف</th>
                    <th>الاسم</th>
                    <th>الرقم الوطني</th>
                    <th>تاريخ الميلاد</th>
                    <th>الرقم العسكري</th>
                    <th>الرتبه</th>
                    <th>رقم الحساب</th>
                    <th>-</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($employeesOfficer as $employee)
                    {{-- @if ($employees_type = $employee->financial_Figure) --}}
                    <tr>
                        <th scope="row">{{ $employee->id }}</th>
                        <td>{{ $employee->full_name }}</td>
                        <td>{{ $employee->national_no }}</td>
                        <td>{{ $employee->birth_d }}</td>
                        <td>{{ $employee->military_number }}</td>
                        <td>{{ $employee->Rank }}</td>
                        <td>{{ $employee->bank_accountNo }}</td>
                        <td class="actions">
                            
                            {{-- <form action="{{ route('employeesofficer.destroy', $employee->id) }}" method="Post">

                                <a href="{{ route('employeesofficer.edit', $employee->id) }}"
                                    class="on-default edit-row"><i class="fa fa-pencil"></i></a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>
                            </form> --}}

                            <form method="POST" action="{{ route('employeesofficer.destroy', $employee->id) }}">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('employeesofficer.edit', $employee->id) }}"
                                    class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                <input name="_method" type="hidden" value="DELETE">
                                <a type="submit" class="confirm-button"><i class="fa fa-trash-o"></i></a>
                            </form>
                        </td>
                    </tr>
                    {{-- @endif --}}
                @endforeach

            </tbody>
        </table>
    </div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
    $('.confirm-button').click(function(event) {
        var form = $(this).closest("form");
        event.preventDefault();
        swal({
                title: `هل أنت متأكد من حذف هذا الضابط ؟`,
                text: "سيتم حذفه نهائيا من السجل ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });
</script>
@endsection

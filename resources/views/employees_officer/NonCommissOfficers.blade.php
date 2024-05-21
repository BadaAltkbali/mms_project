@extends('layout.main')
@section('content')
@section('title_content_main')
    الضباط
@section('title_content_sub')
    ضباط الصف
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
                <a id="addToTable" href="{{ route('employeesofficer/PrintNonCommissOfficers') }}"
                    class="btn btn-success waves-effect waves-light">Print <i class="mdi mdi-printer"></i></a>
            </div>
        </div>
    </div>

    <button type="button" class="btn btn-success waves-effect waves-light" id="btnExport"
        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
        style="padding: 9px; margin-left: 78%;">Export To Excel
    </button>
    <br> <br>

    <form>
        <input type="search" class="form-control" placeholder="البحث بالرقم العسكري" name="search">
    </form>
    <br>
    <div class="table-responsive">
        <table class="table m-0 table-colored table-success">
            <thead>
                <tr>
                    <th>رقم الملف</th>
                    <th>الرقم العسكري</th>
                    <th>الاسم</th>
                    <th>الرتبه</th>
                    <th>الرقم الوطني</th>
                    <th>الوحدة الفرعية</th>


                    {{-- <th>رقم الحساب</th> --}}
                    <th>-</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($employeesOfficer as $employee)
                    <tr>
                        <th scope="row">{{ ++$i }}</th>
                        {{-- <th scope="row">{{ $employee->id }}</th> --}}
                        <td>{{ $employee->military_number }}</td>
                        <td>{{ $employee->full_name }}</td>
                        <td>

                            @if ($employee->Rank == 'اللواء')
                                اللواء
                            @endif
                            @if ($employee->Rank == 'عميد')
                                عميد
                            @endif
                            @if ($employee->Rank == 'عقيد')
                                عقيد
                            @endif
                            @if ($employee->Rank == 'رائد')
                                رائد
                            @endif
                            @if ($employee->Rank == 'نقيب')
                                نقيب
                            @endif
                            @if ($employee->Rank == 'ملازم أول')
                                ملازم أول
                            @endif
                            @if ($employee->Rank == 'ملازم ثاني')
                                ملازم ثاني
                            @endif
                            @if ($employee->Rank == 'رئيس عرفه وحدة')
                                رئيس عرفة وحدة
                            @endif
                            @if ($employee->Rank == 'رئيس عرفه سريه')
                                رئيس عرفة سرية
                            @endif
                            @if ($employee->Rank == 'عريف')
                                عريف
                            @endif
                            @if ($employee->Rank == 'نائب عريف')
                                نائب عريف
                            @endif
                            @if ($employee->Rank == 'جندي أول')
                                جندي أول
                            @endif
                            @if ($employee->Rank == 'جندي')
                                جندي
                            @endif

                        </td>
                        <td>{{ $employee->national_no }}</td>


                        @foreach ($UnitBranches as $id => $Branch_Name)
                            @if ($employee->unitBranch_id == $id)
                                <td> {{ $Branch_Name }}</td>
                            @endif
                        @endforeach


                        {{-- <td>{{ $employee->bank_accountNo }}</td> --}}
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
                                @can('empOffice-update')
                                    <a href="{{ route('employeesofficer.edit', $employee->id) }}"
                                        class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                @endcan
                                @can('empOffice-delete')
                                    <input name="_method" type="hidden" value="DELETE">
                                    <a type="submit" class="confirm-button"><i class="fa fa-trash-o"></i></a>
                                @endcan
                            </form>
                        </td>
                    </tr>
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


{{-- Export to Excel Fife  --}}


<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
<script>
    $(document).ready(function() {
        $("#btnExport").click(function() {
            let table = document.getElementsByTagName("table");
            console.log(table);
            debugger;
            TableToExcel.convert(table[0], {
                name: `UserManagement.xlsx`,
                sheet: {
                    name: 'Usermanagement'
                }
            });
        });
    });
</script>
@endsection

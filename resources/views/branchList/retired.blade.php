@extends('layout.main')
@section('content')
@section('title_content_main')
    الموظفين
@section('title_content_sub')
    قائمة المتقاعدين
@endsection
@endsection

<div class="table-responsive " id="print">
<button type="button" class="btn btn-success waves-effect waves-light" id="btnExport" data-kt-menu-trigger="click"
    data-kt-menu-placement="bottom-end" style="padding: 9px; margin-left: 78%;">Export To Excel
</button>
<br> <br>
<h1>قائمة المتقاعدين</h1>
<table class="table m-0 table-colored table-success" id="mydatatable">
    <thead>
        <tr>
            <th>الرقم التسلسلي</th>
            <th>الرقم المالي</th>
            <th>الصفه</th>
            <th>الاسم</th>
            <th>الرقم الوطني</th>
            <th>-</th>
        </tr>
    </thead>
    <tbody>


        @foreach ($retiredsOfficer as $retired)
            <tr>
                <th scope="row">{{ ++$i }}</th>
                <td>{{ $retired->military_number }}</td>
                <td>

                    @if ($retired->Rank == 'اللواء')
                        اللواء
                    @endif
                    @if ($retired->Rank == 'عميد')
                        عميد
                    @endif
                    @if ($retired->Rank == 'عقيد')
                        عقيد
                    @endif
                    @if ($retired->Rank == 'رائد')
                        رائد
                    @endif
                    @if ($retired->Rank == 'نقيب')
                        نقيب
                    @endif
                    @if ($retired->Rank == 'ملازم أول')
                        ملازم أول
                    @endif
                    @if ($retired->Rank == 'ملازم ثاني')
                        ملازم ثاني
                    @endif
                    @if ($retired->Rank == 'رئيس عرفة وحدة')
                        رئيس عرفة وحدة
                    @endif
                    @if ($retired->Rank == 'رئيس عرفة سرية')
                        رئيس عرفة سرية
                    @endif
                    @if ($retired->Rank == 'عريف')
                        عريف
                    @endif
                    @if ($retired->Rank == 'نائب عريف')
                        نائب عريف
                    @endif
                    @if ($retired->Rank == 'جندي أول')
                        جندي أول
                    @endif
                    @if ($retired->Rank == 'جندي')
                        جندي
                    @endif

                </td>
                <td>{{ $retired->full_name }}</td>
                <td>{{ $retired->national_no }}</td>
                <td>
                    @can('empOffice-update')
                        <a href="{{ route('employeesofficer.edit', $retired->id) }}" class="on-default edit-row"><i
                                class="fa fa-pencil"></i></a>
                    @endcan
                </td>
            </tr>
        @endforeach

        <hr>



        @foreach ($retireds as $retired)
            {{-- @if ($employees_type = $employee->financial_Figure)  --}}
            <tr>
                <th scope="row">{{ ++$i }}</th>
                <td>{{ $retired->financial_Figure }}</td>

                @foreach ($Adjectives as $id => $Adjective_Name)
                    @if ($retired->adjective_id == $id)
                        <td> {{ $Adjective_Name }}</td>
                    @endif
                @endforeach

                <td>{{ $retired->full_name }}</td>
                <td>{{ $retired->national_no }}</td>
                <td>
                    @can('empOffice-update')
                        <a href="{{ route('employees.edit', $retired->id) }}" class="on-default edit-row"><i
                                class="fa fa-pencil"></i></a>
                    @endcan
                </td>

            </tr>
        @endforeach

    </tbody>
</table>
{{-- <div class="Print">
    <button onclick="printDiv('printme')" id="PrintBtn">
        <i class="fi fi-rs-print"></i>
    </button>
</div> --}}
</div>



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
                name: `المتقاعدين.xlsx`,
                sheet: {
                    name: 'المتقاعدين'
                }
            });
        });
    });
</script>



@endsection

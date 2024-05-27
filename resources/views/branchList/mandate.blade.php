@extends('layout.main')
@section('content')
@section('title_content_main')
    الموظفين
@section('title_content_sub')
    قائمة الندب
@endsection
@endsection

<div class="table-responsive" id="print">
<button type="button" class="btn btn-success waves-effect waves-light" id="btnExport" data-kt-menu-trigger="click"
    data-kt-menu-placement="bottom-end" style="padding: 9px; margin-left: 78%;">Export To Excel
</button>
<br> <br>
<h1>قائمة الندب</h1>
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


        @foreach ($mandatesOfficer as $mandate)
            <tr>
                <th scope="row">{{ ++$i }}</th>
                <td>{{ $mandate->military_number }}</td>
                <td>

                    @if ($mandate->Rank == 'اللواء')
                        اللواء
                    @endif
                    @if ($mandate->Rank == 'عميد')
                        عميد
                    @endif
                    @if ($mandate->Rank == 'عقيد')
                        عقيد
                    @endif
                    @if ($mandate->Rank == 'رائد')
                        رائد
                    @endif
                    @if ($mandate->Rank == 'نقيب')
                        نقيب
                    @endif
                    @if ($mandate->Rank == 'ملازم أول')
                        ملازم أول
                    @endif
                    @if ($mandate->Rank == 'ملازم ثاني')
                        ملازم ثاني
                    @endif
                    @if ($mandate->Rank == 'رئيس عرفة وحدة')
                        رئيس عرفة وحدة
                    @endif
                    @if ($mandate->Rank == 'رئيس عرفة سرية')
                        رئيس عرفة سرية
                    @endif
                    @if ($mandate->Rank == 'عريف')
                        عريف
                    @endif
                    @if ($mandate->Rank == 'نائب عريف')
                        نائب عريف
                    @endif
                    @if ($mandate->Rank == 'جندي أول')
                        جندي أول
                    @endif
                    @if ($mandate->Rank == 'جندي')
                        جندي
                    @endif

                </td>
                <td>{{ $mandate->full_name }}</td>
                <td>{{ $mandate->national_no }}</td>
                <td>
                    @can('empOffice-update')
                        <a href="{{ route('employeesofficer.edit', $mandate->id) }}" class="on-default edit-row"><i
                                class="fa fa-pencil"></i></a>
                    @endcan
                </td>
            </tr>
        @endforeach

        <hr>




        @foreach ($mandates as $mandate)
            {{-- @if ($employees_type = $employee->financial_Figure)  --}}
            <tr>
                <th scope="row">{{ ++$i }}</th>
                <td>{{ $mandate->financial_Figure }}</td>

                @foreach ($Adjectives as $id => $Adjective_Name)
                    @if ($mandate->adjective_id == $id)
                        <td> {{ $Adjective_Name }}</td>
                    @endif
                @endforeach

                <td>{{ $mandate->full_name }}</td>
                <td>{{ $mandate->national_no }}</td>
                <td>
                    @can('empOffice-update')
                        <a href="{{ route('employees.edit', $mandate->id) }}" class="on-default edit-row"><i
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
                name: `الندب.xlsx`,
                sheet: {
                    name: 'الندب'
                }
            });
        });
    });
</script>


@endsection

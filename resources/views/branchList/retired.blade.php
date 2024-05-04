@extends('layout.main')
@section('content')
@section('title_content_main')
    الموظفين
@section('title_content_sub')
   قائمة المتقاعدين
@endsection
@endsection

<div class="table-responsive "  id="print">
<h1>قائمة المتقاعدين</h1>
<table class="table m-0 table-colored table-success" id="datatable-editable">
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
                @if ($retired->Rank == '/')
                    /
                @elseif ($retired->Rank == '')
                    /
                @elseif ($retired->Rank == '1')
                    اللواء
                @elseif ($retired->Rank == '2')
                    عميد
                @elseif ($retired->Rank == '3')
                    عقيد
                @elseif ($retired->Rank == '4')
                    رائد
                @elseif ($retired->Rank == '5')
                    نقيب
                @elseif ($retired->Rank == '6')
                    ملازم أول
                @elseif ($retired->Rank == '7')
                    ملازم ثاني
                @elseif ($retired->Rank == '8')
                    رئيس عرفة وحدة
                @elseif ($retired->Rank == '9')
                    رئيس عرفة سرية
                @elseif ($retired->Rank == '10')
                    عريف
                @elseif ($retired->Rank == '11')
                    نائب عريف
                @elseif ($retired->Rank == '12')
                    جندي أول
                @elseif ($retired->Rank == '13')
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




@endsection

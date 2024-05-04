@extends('layout.main')
@section('content')
@section('title_content_main')
    الموظفين
@section('title_content_sub')
    قائمة المنقطعين
@endsection
@endsection

<div class="table-responsive" id="print">
<h1>قائمة المنقطعين</h1>
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


        @foreach ($stoppingsOfficer as $stopping)
            <tr>
                <th scope="row">{{ ++$i }}</th>
                <td>{{ $stopping->military_number }}</td>
                <td>
                    @if ($stopping->Rank == '/')
                        /
                    @elseif ($stopping->Rank == '')
                        /
                    @elseif ($stopping->Rank == '1')
                        اللواء
                    @elseif ($stopping->Rank == '2')
                        عميد
                    @elseif ($stopping->Rank == '3')
                        عقيد
                    @elseif ($stopping->Rank == '4')
                        رائد
                    @elseif ($stopping->Rank == '5')
                        نقيب
                    @elseif ($stopping->Rank == '6')
                        ملازم أول
                    @elseif ($stopping->Rank == '7')
                        ملازم ثاني
                    @elseif ($stopping->Rank == '8')
                        رئيس عرفة وحدة
                    @elseif ($stopping->Rank == '9')
                        رئيس عرفة سرية
                    @elseif ($stopping->Rank == '10')
                        عريف
                    @elseif ($stopping->Rank == '11')
                        نائب عريف
                    @elseif ($stopping->Rank == '12')
                        جندي أول
                    @elseif ($stopping->Rank == '13')
                        جندي
                    @endif
                </td>
                <td>{{ $stopping->full_name }}</td>
                <td>{{ $stopping->national_no }}</td>
                <td>
                    @can('empOffice-update')
                        <a href="{{ route('employeesofficer.edit', $stopping->id) }}" class="on-default edit-row"><i
                                class="fa fa-pencil"></i></a>
                    @endcan
                </td>
            </tr>
        @endforeach

        <hr>




        @foreach ($stoppings as $stopping)
            {{-- @if ($employees_type = $employee->financial_Figure)  --}}
            <tr>
                <th scope="row">{{ ++$i }}</th>
                <td>{{ $stopping->financial_Figure }}</td>

                @foreach ($Adjectives as $id => $Adjective_Name)
                    @if ($stopping->adjective_id == $id)
                        <td> {{ $Adjective_Name }}</td>
                    @endif
                @endforeach

                <td>{{ $stopping->full_name }}</td>
                <td>{{ $stopping->national_no }}</td>
                <td>
                    @can('empOffice-update')
                        <a href="{{ route('employees.edit', $stopping->id) }}" class="on-default edit-row"><i
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

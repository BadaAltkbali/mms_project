@extends('layout.main')
@section('content')
@section('title_content_main')
    الموظفين
@section('title_content_sub')
    قائمه الهروب
@endsection
@endsection

<div class="table-responsive" id="print">
<h1>قائمة الهروب</h1>
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

        @foreach ($fleeingsOfficer as $fleeing)
            <tr>
                <th scope="row">{{ ++$i }}</th>
                <td>{{ $fleeing->military_number }}</td>
                <td>
                    @if ($fleeing->Rank == '/')
                        /
                    @elseif ($fleeing->Rank == '')
                        /
                    @elseif ($fleeing->Rank == '1')
                        اللواء
                    @elseif ($fleeing->Rank == '2')
                        عميد
                    @elseif ($fleeing->Rank == '3')
                        عقيد
                    @elseif ($fleeing->Rank == '4')
                        رائد
                    @elseif ($fleeing->Rank == '5')
                        نقيب
                    @elseif ($fleeing->Rank == '6')
                        ملازم أول
                    @elseif ($fleeing->Rank == '7')
                        ملازم ثاني
                    @elseif ($fleeing->Rank == '8')
                        رئيس عرفة وحدة
                    @elseif ($fleeing->Rank == '9')
                        رئيس عرفة سرية
                    @elseif ($fleeing->Rank == '10')
                        عريف
                    @elseif ($fleeing->Rank == '11')
                        نائب عريف
                    @elseif ($fleeing->Rank == '12')
                        جندي أول
                    @elseif ($fleeing->Rank == '13')
                        جندي
                    @endif
                </td>
                <td>{{ $fleeing->full_name }}</td>
                <td>{{ $fleeing->national_no }}</td>
                <td>
                    @can('empOffice-update')
                        <a href="{{ route('employeesofficer.edit', $fleeing->id) }}" class="on-default edit-row"><i
                                class="fa fa-pencil"></i></a>
                    @endcan
                </td>
            </tr>
        @endforeach

        <hr>

        @foreach ($fleeings as $fleeing)
            {{-- @if ($employees_type = $employee->financial_Figure)  --}}
            <tr>
                <th scope="row">{{ ++$i }}</th>
                <td>{{ $fleeing->financial_Figure }}</td>

                @foreach ($Adjectives as $id => $Adjective_Name)
                    @if ($fleeing->adjective_id == $id)
                        <td> {{ $Adjective_Name }}</td>
                    @endif
                @endforeach

                <td>{{ $fleeing->full_name }}</td>
                <td>{{ $fleeing->national_no }}</td>
                <td>
                    @can('empOffice-update')
                        <a href="{{ route('employees.edit', $fleeing->id) }}" class="on-default edit-row"><i
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

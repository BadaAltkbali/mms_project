@extends('layout.main')
@section('content')
@section('title_content_main')
    الموظفين
@section('title_content_sub')
    قائمة الندب
@endsection
@endsection

<div class="table-responsive" id="print">
<h1>قائمة الندب</h1>
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


        @foreach ($mandatesOfficer as $mandate)
            <tr>
                <th scope="row">{{ ++$i }}</th>
                <td>{{ $mandate->military_number }}</td>
                <td>
                    @if ($mandate->Rank == '/')
                        /
                    @elseif ($mandate->Rank == '')
                        /
                    @elseif ($mandate->Rank == '1')
                        اللواء
                    @elseif ($mandate->Rank == '2')
                        عميد
                    @elseif ($mandate->Rank == '3')
                        عقيد
                    @elseif ($mandate->Rank == '4')
                        رائد
                    @elseif ($mandate->Rank == '5')
                        نقيب
                    @elseif ($mandate->Rank == '6')
                        ملازم أول
                    @elseif ($mandate->Rank == '7')
                        ملازم ثاني
                    @elseif ($mandate->Rank == '8')
                        رئيس عرفة وحدة
                    @elseif ($mandate->Rank == '9')
                        رئيس عرفة سرية
                    @elseif ($mandate->Rank == '10')
                        عريف
                    @elseif ($mandate->Rank == '11')
                        نائب عريف
                    @elseif ($mandate->Rank == '12')
                        جندي أول
                    @elseif ($mandate->Rank == '13')
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


@endsection

@extends('layout.main')
@section('content')
@section('title_content_main')
    الموظفين
@section('title_content_sub')
    قائمة المحكومين
@endsection
@endsection

<div class="table-responsive" id="print">
<h1>قائمة المحكومين</h1>
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


        @foreach ($doomedsOfficer as $doomed)
            <tr>
                <th scope="row">{{ ++$i }}</th>
                <td>{{ $doomed->military_number }}</td>
                <td>
                    @if ($doomed->Rank == '/')
                        /
                    @elseif ($doomed->Rank == '')
                        /
                    @elseif ($doomed->Rank == '1')
                        اللواء
                    @elseif ($doomed->Rank == '2')
                        عميد
                    @elseif ($doomed->Rank == '3')
                        عقيد
                    @elseif ($doomed->Rank == '4')
                        رائد
                    @elseif ($doomed->Rank == '5')
                        نقيب
                    @elseif ($doomed->Rank == '6')
                        ملازم أول
                    @elseif ($doomed->Rank == '7')
                        ملازم ثاني
                    @elseif ($doomed->Rank == '8')
                        رئيس عرفة وحدة
                    @elseif ($doomed->Rank == '9')
                        رئيس عرفة سرية
                    @elseif ($doomed->Rank == '10')
                        عريف
                    @elseif ($doomed->Rank == '11')
                        نائب عريف
                    @elseif ($doomed->Rank == '12')
                        جندي أول
                    @elseif ($doomed->Rank == '13')
                        جندي
                    @endif
                </td>
                <td>{{ $doomed->full_name }}</td>
                <td>{{ $doomed->national_no }}</td>
                <td>
                    @can('empOffice-update')
                        <a href="{{ route('employeesofficer.edit', $doomed->id) }}" class="on-default edit-row"><i
                                class="fa fa-pencil"></i></a>
                    @endcan
                </td>
            </tr>
        @endforeach

        <hr>




        @foreach ($doomeds as $doomed)
            {{-- @if ($employees_type = $employee->financial_Figure)  --}}
            <tr>
                <th scope="row">{{ ++$i }}</th>
                <td>{{ $doomed->financial_Figure }}</td>

                @foreach ($Adjectives as $id => $Adjective_Name)
                    @if ($doomed->adjective_id == $id)
                        <td> {{ $Adjective_Name }}</td>
                    @endif
                @endforeach

                <td>{{ $doomed->full_name }}</td>
                <td>{{ $doomed->national_no }}</td>
                <td>
                    @can('empOffice-update')
                        <a href="{{ route('employees.edit', $doomed->id) }}" class="on-default edit-row"><i
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

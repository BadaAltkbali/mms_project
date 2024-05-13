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

                    @if ($doomed->Rank == 'اللواء')
                        اللواء
                    @endif
                    @if ($doomed->Rank == 'عميد')
                        عميد
                    @endif
                    @if ($doomed->Rank == 'عقيد')
                        عقيد
                    @endif
                    @if ($doomed->Rank == 'رائد')
                        رائد
                    @endif
                    @if ($doomed->Rank == 'نقيب')
                        نقيب
                    @endif
                    @if ($doomed->Rank == 'ملازم أول')
                        ملازم أول
                    @endif
                    @if ($doomed->Rank == 'ملازم ثاني')
                        ملازم ثاني
                    @endif
                    @if ($doomed->Rank == 'رئيس عرفة وحدة')
                        رئيس عرفة وحدة
                    @endif
                    @if ($doomed->Rank == 'رئيس عرفة سرية')
                        رئيس عرفة سرية
                    @endif
                    @if ($doomed->Rank == 'عريف')
                        عريف
                    @endif
                    @if ($doomed->Rank == 'نائب عريف')
                        نائب عريف
                    @endif
                    @if ($doomed->Rank == 'جندي أول')
                        جندي أول
                    @endif
                    @if ($doomed->Rank == 'جندي')
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
            {{-- @if ($employees_type = $doomed->financial_Figure)  --}}
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

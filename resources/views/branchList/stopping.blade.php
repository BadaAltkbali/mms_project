@extends('layout.main')
@section('content')
@section('title_content_main')
    الموظفين
@section('title_content_sub')
    قائمة المنقطعين
@endsection
@endsection

<div class="table-responsive"  id="print">
    <h1>قائمة المنقطعين</h1>
<table class="table m-0 table-colored table-success" id="datatable-editable">
    <thead>
        <tr>
            <th>الرقم التسلسلي</th>
            <th>الرقم المالي</th>
            <th>الصفه</th>
            <th>الاسم</th>
            <th>الرقم الوطني</th>
        </tr>
    </thead>
    <tbody>

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


            </tr>
        @endforeach

    </tbody>
</table>
<div class="Print">
    <button onclick="printDiv('printme')" id="PrintBtn">
        {{-- <a href="" @click.prevent="printme"> --}}
        <i class="fi fi-rs-print"></i>
        {{-- </a> --}}
    </button>
</div>
</div>


@endsection

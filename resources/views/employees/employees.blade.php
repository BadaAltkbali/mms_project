@extends('layout.main')
@section('content')
@section('title_content_main')
    الموظفين
@section('title_content_sub')
    عرض الموظفين
@endsection
@endsection
<div class="panel">
<div class="panel-body">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    <div class="table-responsive">
        <table class="table m-0 table-colored table-success" id="datatable-editable">
            <thead>
                <tr>
                    <th>رقم الملف</th>
                    <th>الرقم المالي</th>
                    <th>الاسم</th>
                    <th>المهنه</th>
                    <th>قرار التعيين</th>
                    <th>الرقم الوطني</th>
                    <th>الدرجة الحاليه</th>
                    <th>تاريخ الحصول عليها</th>
                    <th>المؤهل العلمي</th>
                    <th>رقم الهاتف</th>
                    <th>رقم القيد</th>
                    <th>ملاحظات</th>
                    <th>-</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($employees as $employee)
                    {{-- @if ($employees_type = $employee->financial_Figure) --}}
                    <tr>
                        <th scope="row">{{ $employee->id }}</th> 
                        <td>{{ $employee->financial_Figure }}</td>
                        <td>{{ $employee->full_name }}</td>
                        <td>{{ $employee->adjective }}</td>
                        <td>{{ $employee->appointment_decision }}</td>
                        <td>{{ $employee->national_no }}</td>

                        <td>{{ $employee->current_grade }}</td>
                        <td>{{ $employee->current_grade_date }}</td>
                       
                        
                        <td>{{ $employee->qualification }}</td>
                        <td>{{ $employee->phone_n }}</td>
                        <td>{{ $employee->Contract_registrationNo }}</td>
                        {{-- <td class="actions">
                            <a href="{{ route('employees.edit', $employee->id) }}" class="on-default edit-row"><i
                                    class="fa fa-pencil"></i></a>
                            <a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                        </td> --}}
                    </tr>
                    {{-- @endif --}}
                @endforeach
                @foreach ($employeesOfficer as $employee)
                    {{-- @if ($employees_type = $employee->financial_Figure) --}}
                    <tr>
                        <th scope="row">{{ $employee->id }}</th> 
                        <td>{{ $employee->financial_Figure }}</td>
                        <td>{{ $employee->full_name }}</td>
                        <td>{{ $employee->adjective }}</td>
                        <td>{{ $employee->appointment_decision }}</td>
                        <td>{{ $employee->national_no }}</td>

                        <td>{{ $employee->current_grade }}</td>
                        <td>{{ $employee->current_grade_date }}</td>
                       
                        
                        <td>{{ $employee->qualification }}</td>
                        <td>{{ $employee->phone_n }}</td>
                        <td>{{ $employee->Contract_registrationNo }}</td>
                        {{-- <td class="actions">
                            <a href="{{ route('employees.edit', $employee->id) }}" class="on-default edit-row"><i
                                    class="fa fa-pencil"></i></a>
                            <a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                        </td> --}}
                    </tr>
                    {{-- @endif --}}
                @endforeach

            </tbody>
        </table>
    </div>
</div>
</div>
@endsection

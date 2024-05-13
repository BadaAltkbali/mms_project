<!DOCTYPE html>
<html dir="rtl">

<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: center;
            padding: 2px;
            font-size: 0.7rem
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .container_search {
            width: 100%;
            /* background-color: #531616; */
            display: flex;
            justify-content: center;
            padding: 10px 0;
        }

        .container_search .btn-search {
            border: none;
            outline: none;
            background: #f2f2f2;
            padding: 8px 5px;
        }
    </style>
</head>

<body>

    <form action="{{ route('printAllEmp') }}" method ="GET" class="container_search" dir="ltr">
        <input type="search" class="form-control input-sm btn-search" name="search"
            placeholder=" click here to filter .." />
    </form>

    <div class="table-responsive">
        <table class="table m-0 table-colored table-success" id="datatable-editable">
            <thead style="font-size: 12px;">
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>الرقم المالي</th>
                    <th>الصفة</th>
                    <th>الرقم الوطني</th>
                    <th>اسم الأم</th>
                    <th>نوع الاثبات</th>
                    <th>رقم الاثبات</th>
                    <th>رقم القيد</th>
                    <th>رقم القرار</th>
                    <th>المصرف</th>
                    <th>الفرع</th>
                    <th>رقم الحساب</th>
                    <th>الدرجة</th>
                    <th>آخر للترقية</th>
                    <th>الوحدة الفرعيه</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <th scope="row">{{ ++$i }}</th>
                        <td>{{ $employee->full_name }}</td>
                        <td>{{ $employee->financial_Figure }}</td>
                        @foreach ($Adjectives as $id => $Adjective_Name)
                            @if ($employee->adjective_id == $id)
                                <td> {{ $Adjective_Name }}</td>
                            @endif
                        @endforeach
                        <td>{{ $employee->national_no }}</td>
                        <td>{{ $employee->familyHandbook_No }}</td>
                        <td>{{ $employee->passport_or_card }}</td>
                        <td>{{ $employee->passport }}</td>
                        <td>{{ $employee->Contract_registrationNo }}</td>
                        <td>{{ $employee->appointment_decision }}</td>
                        @foreach ($Banks as $id => $BankName)
                            @if ($employee->bankName_id == $id)
                                <td> {{ $BankName }}</td>
                            @endif
                        @endforeach
                        @foreach ($BanksBranchs as $id => $BranchName)
                            @if ($employee->bankBranch_id == $id)
                                <td> {{ $BranchName }}</td>
                            @endif
                        @endforeach
                        <td>{{ $employee->bank_accountNo }}</td>
                        <td>{{ $employee->current_grade }}</td>
                        <td>{{ $employee->current_grade_date }}</td>

                        @foreach ($UnitBranches as $id => $Branch_Name)
                            @if ($employee->unitBranch_id == $id)
                                <td> {{ $Branch_Name }}</td>
                            @endif
                        @endforeach
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>

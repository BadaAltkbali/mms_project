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
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <h2> &nbsp;&nbsp; &nbsp; المدنيين</h2>

    <div class="table-responsive">
        <table class="table m-0 table-colored table-success" id="datatable-editable">
            <thead>
                <tr>
                    <th>رقم الملف</th>
                    <th>الرقم المالي</th>
                    <th>الصفه</th>
                    <th>الاسم</th>
                    <th>الرقم الوطني</th>
                    <th>الوحدة الفرعية</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($employees as $employee)
                    <tr>
                        <th scope="row">{{ ++$i }}</th>
                        <td>{{ $employee->financial_Figure }}</td>
                        @foreach ($Adjectives as $id => $Adjective_Name)
                            @if ($employee->adjective_id == $id)
                                <td> {{ $Adjective_Name }}</td>
                            @endif
                        @endforeach
                        <td>{{ $employee->full_name }}</td>
                        <td>{{ $employee->national_no }}</td>

                        @foreach ($UnitBranches as $id => $Branch_Name)
                            @if ($employee->unitBranch_id == $id)
                                <td> {{ $Branch_Name }}</td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
</body>

</html>

<!DOCTYPE html>
<html dir="rtl">
<head>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: center;
  padding: 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;}

</style>
</head>
<body>

<h2> &nbsp;&nbsp; &nbsp;  ضباط الصف</h2>
    <div class="table-responsive">
        <table class="table m-0 table-colored table-success" id="datatable-editable">
            <thead>
                <tr>
                    <th>رقم الملف</th>
                    <th>الرقم العسكري</th>
                    <th>الاسم</th>
                    <th>الرتبه</th>
                    <th>الرقم الوطني</th>
                    <th>الوحدة الفرعية</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($employeesOfficer as $employee)
                    <tr>
                        <th scope="row">{{ ++$i }}</th>
                        <td>{{ $employee->military_number }}</td>
                        <td>{{ $employee->full_name }}</td>
                        <td>

                            @if ($employee->Rank == 'اللواء')
                                اللواء
                            @endif
                            @if ($employee->Rank == 'عميد')
                                عميد
                            @endif
                            @if ($employee->Rank == 'عقيد')
                                عقيد
                            @endif
                            @if ($employee->Rank == 'رائد')
                                رائد
                            @endif
                            @if ($employee->Rank == 'نقيب')
                                نقيب
                            @endif
                            @if ($employee->Rank == 'ملازم أول')
                                ملازم أول
                            @endif
                            @if ($employee->Rank == 'ملازم ثاني')
                                ملازم ثاني
                            @endif
                            @if ($employee->Rank == 'رئيس عرفة وحدة')
                                رئيس عرفة وحدة
                            @endif
                            @if ($employee->Rank == 'رئيس عرفة سرية')
                                رئيس عرفة سرية
                            @endif
                            @if ($employee->Rank == 'عريف')
                                عريف
                            @endif
                            @if ($employee->Rank == 'نائب عريف')
                                نائب عريف
                            @endif
                            @if ($employee->Rank == 'جندي أول')
                                جندي أول
                            @endif
                            @if ($employee->Rank == 'جندي')
                                جندي
                            @endif

                        </td>
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

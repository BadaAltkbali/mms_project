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

    <form action="{{ route('printsOffice') }}" method ="GET" class="container_search" dir="ltr">
        <input type="search" class="form-control input-sm btn-search" name="search"
            placeholder=" click here to filter .." />
    </form>

    <div class="table-responsive">
        <table class="table m-0 table-colored table-success" id="datatable-editable">

            <thead style="font-size: 12px;">
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>الرقم العسكري</th>
                    <th>الرتبة</th>
                    <th>الرقم الوطني</th>
                    <th>الوحدة الفرعيه</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <th scope="row">{{ ++$i }}</th>
                        <td>{{ $employee->full_name }}</td>
                        <td>{{ $employee->military_number }}</td>
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
                        @foreach ($UnitsBranche as $id => $Branch_Name)
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

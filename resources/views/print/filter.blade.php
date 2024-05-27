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

    <button type="button" class="btn btn-success waves-effect waves-light" id="btnExport"
        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
        style="padding: 9px; margin-left: 78%;">Export To Excel
    </button>
    <br> <br>

    <form action="{{ route('prints') }}" method ="GET" class="container_search" dir="ltr">
        <input type="search" class="form-control input-sm btn-search" name="search"
            placeholder=" click here to filter .." />
    </form>

    <div class="table-responsive">
        <table class="table m-0 table-colored table-success">
            <thead style="font-size: 12px;">
                <tr>
                    <th>#</th>

                    <th>الرقم المالي</th>
                    <th>الصفة</th>
                    <th>الاسم</th>
                    <th>الرقم الوطني</th>
                    <th>الوحدة الفرعيه</th>
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

                        {{-- <td>{{ $employee->familyHandbook_No }}</td> --}}
                        {{-- <td>{{ $employee->passport_or_card }}</td>
                                        <td>{{ $employee->passport }}</td> --}}
                        {{-- @foreach ($Banks as $id => $BankName)
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
                                        <td>{{ $employee->current_grade_date }}</td> --}}

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

{{-- Export to Excel Fife  --}}


<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
<script>
    $(document).ready(function() {
        $("#btnExport").click(function() {
            let table = document.getElementsByTagName("table");
            console.log(table);
            debugger;
            TableToExcel.convert(table[0], {
                name: `مدنيين.xlsx`,
                sheet: {
                    name: 'مدنيين'
                }
            });
        });
    });
</script>

</html>

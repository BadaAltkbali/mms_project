<!DOCTYPE html>
<html dir="rtl">

<head>
    @extends('layout.head')
</head>


<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">
        {{-- 
        <!-- Top Bar Start -->
        @extends('layout.header')
        <!-- Top Bar End -->



 --}}

        <!-- Start content -->
        <div class="content">
            <div class="container">
                <center>
                    <br><br>
                    {{-- <input type="button" onclick="printableDiv('printableArea')" value="print a div!" /> --}}

                    {{-- <a href="{{ url('/prnpriview') }}" class="btnprn btn">Print Preview</a> --}}
                </center>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('.btnprn').printPage();
                    });
                    // function printableDiv(printableAreaDivId) {
                    //     var printContents = document.getElementById(printableAreaDivId).innerHTML;
                    //     var originalContents = document.body.innerHTML;

                    //     document.body.innerHTML = printContents;

                    //     window.print();

                    //     document.body.innerHTML = originalContents;
                    // }
                </script>


                <section class="forms" id="printableArea">
                    <div class="container-fluid">
                        <center>
                            <form action="{{ route('printsOffice') }}" method ="GET">
                                <br>
                                <div class="container">
                                    <div class="row">
                                        <div class="container-fluid">

                                            <div class="form-group row">

                                                <input type="search" class="form-control input-sm" name="search"
                                                    placeholder="" />

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </form>
                        </center>
                        <a href="javascript:window.print();"><i class="fas fa-print"></i></a>


                        <table class="table table-striped table-bordered nowrap" style="width:100%">
                            <thead style="font-size: 12px;">
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>الرقم العسكري</th>
                                    <th>الرتبة</th>
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
                                        <td>{{ $employee->military_number }}</td>
                                        <td>
                                            @if ($employee->Rank == '/')
                                                /
                                            @elseif ($employee->Rank == '')
                                                /
                                            @elseif ($employee->Rank == '1')
                                                اللواء
                                            @elseif ($employee->Rank == '2')
                                                عميد
                                            @elseif ($employee->Rank == '3')
                                                عقيد
                                            @elseif ($employee->Rank == '4')
                                                رائد
                                            @elseif ($employee->Rank == '5')
                                                نقيب
                                            @elseif ($employee->Rank == '6')
                                                ملازم أول
                                            @elseif ($employee->Rank == '7')
                                                ملازم ثاني
                                            @elseif ($employee->Rank == '8')
                                                رئيس عرفة وحدة
                                            @elseif ($employee->Rank == '9')
                                                رئيس عرفة سرية
                                            @elseif ($employee->Rank == '10')
                                                عريف
                                            @elseif ($employee->Rank == '11')
                                                نائب عريف
                                            @elseif ($employee->Rank == '12')
                                                جندي أول
                                            @elseif ($employee->Rank == '13')
                                                جندي
                                            @endif
                                        </td>

                                        <td>{{ $employee->national_no }}</td>
                                        <td>{{ $employee->familyHandbook_No }}</td>
                                        <td>{{ $employee->passport_or_card }}</td>
                                        <td>{{ $employee->passport }}</td>

                                        <td>{{ $employee->familyRegistration_No }}</td>
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

                                        @foreach ($UnitsBranche as $id => $Branch_Name)
                                            @if ($employee->unitBranch_id == $id)
                                                <td> {{ $Branch_Name }}</td>
                                            @endif
                                        @endforeach
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </section>

            </div> <!-- container -->

        </div> <!-- content -->

        @extends('layout.footer')



    </div>
    <!-- END wrapper -->

</body>


</html>

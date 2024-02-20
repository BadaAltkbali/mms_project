<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>فلترة بيانات الموظفين</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" />
</head>

<body>
    <div class="container">
        <div class="row">
            {{-- <h1 class="text-center"> Datatables Filter</h1> --}}
            <hr>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-5">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">الرقم الوطني</label>
                            </div>
                            <select class="custom-select form-select" id="select_std">
                                <option value="">Choose...</option>
                            </select>
                        </div>
                    </div>
                    {{-- <div class="col-5">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">رقم الحساب</label>
                            </div>
                            <select class="custom-select form-select" id="select_res">
                                <option value="">Choose...</option>
                            </select>
                        </div>
                    </div> --}}
                    <div class="col-2">
                        <button id="filter" class="btn btn-md btn-outline-success">Filter</button>
                        <button id="reset" class="btn btn-md btn-outline-warning">Reset</button>
                    </div>
                </div>

            </div>
        </div>
        <br>
        <br>

        <div class="row" id="TablePrint">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="display" id="record_table" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>الاسم</th>
                                <th>الوحدة الفرعيه</th>
                                <th>الرقم المالي</th>
                                <th>الرقم الوطني</th>
                                <th>رقم الحساب</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

        </div>
        <button id="print" onclick="printout('#record_table')" class="btn btn-sm btn-outline-success">Print</button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="assets/js/printout.js"></script>
    <script>
        function fetch_std() {
            $.ajax({
                url: "{{ route('nationals') }}",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var stdBody = "";
                    for (var key in data) {
                        stdBody +=
                            `<option value="${data[key]['national_no']}">${data[key]['national_no']}</option>`;
                    }
                    $("#select_std").append(stdBody);
                }
            });
        }
        fetch_std();



        // Fetch Result

        function fetch_res() {
            $.ajax({
                url: "{{ route('accountNo') }}",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var resBody = "";
                    for (var key in data) {
                        resBody +=
                            `<option value="${data[key]['bank_accountNo']}">${data[key]['bank_accountNo']}</option>`;
                    }
                    $("#select_res").append(resBody);
                }
            });
        }
        fetch_res();



        // Fetch Records

        function fetch(std, res) {
            $.ajax({
                url: "{{ route('prints/records') }}",
                type: "GEt",
                data: {
                    std: std,
                    res: res
                },
                dataType: "json",
                success: function(data) {
                    var i = 1;
                    $('#record_table').DataTable({
                        "data": data.employees,
                        "responsive": true,
                        "columns": [{
                                "data": "id",
                                // "render": function(data, type, row, meta) {
                                //     return i++;
                                // }
                            },
                            {
                                "data": "full_name"
                            },
                            {
                                "data": "unitBranch_id",

                                // "render": function(data, type, row, meta) {

                                //     foreach($unitBranch as $id => $unitBranch_Name) {
                                //         if ($employeeunitBranch_id == $id) {
                                //             <
                                //             td >  < /td>
                                //         }
                                //     }

                                //     return `${row.military_number}`;
                                // }
                            },
                            {
                                "data": "financial_Figure",
                                // "render": function(data, type, row, meta) {
                                //     return `${row.financial_Figure}`;
                                // }
                            },
                            {
                                "data": "national_no"
                            },
                            {
                                "data": "bank_accountNo",
                                // "render": function(data, type, row, meta) {
                                //     return `${row.bank_accountNo}`;
                                // }

                            }
                        ]
                    });
                }
            });
        }
        fetch();


        // Filter
        $(document).on("click", "#filter", function(e) {
            e.preventDefault();
            var std = $("#select_std").val();
            var res = $("#select_res").val();
            if (std !== "" && res !== "") {
                $('#record_table').DataTable().destroy();
                fetch(std, res);
            } else if (std !== "" && res == "") {
                $('#record_table').DataTable().destroy();
                fetch(std, '');
            } else if (std == "" && res !== "") {
                $('#record_table').DataTable().destroy();
                fetch('', res);
            } else {
                $('#record_table').DataTable().destroy();
                fetch();
            }
        });

        // Reset
        $(document).on("click", "#reset", function(e) {
            e.preventDefault();
            $("#select_std").html(`<option value="">Choose...</option>`);
            $("#select_res").html(`<option value="">Choose...</option>`);
            $('#record_table').DataTable().destroy();
            fetch();
            fetch_std();
            fetch_res();
        });

        //     printout("#example1", {
        //     pageTitle: window.document.title, // Title of the page
        //     importCSS: true, // Import parent page css
        //     inlineStyle: true, // If true it takes inline style tag
        //     autoPrint: true, // Print automatically when the page is open
        //     autoPrintDelay: 1000, // Delay in milliseconds before printing
        //     header: null, // String or element this will be appended to the top of the printout
        //     footer: null, // String or element this will be appended to the bottom of the printout
        //     noPrintClass: "no-print", // Class to remove the elements that should not be printed
        // });
    </script>
</body>

</html>

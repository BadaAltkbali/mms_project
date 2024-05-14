@extends('layout.main')
@section('content')
@section('title_content_main')
    الموظفين
@section('title_content_sub')
    عرض الموظفين
@endsection
@endsection

<meta name="_token" content="{{ csrf_token() }}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
    integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<div class="panel">
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css"
    integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<div class="panel-body">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @can('emp-create')
        <div class="row">
            <div class="">
                <div class="m-b-30">
                    <a id="addToTable" href="{{ route('employees.create') }}"
                        class="btn btn-success waves-effect waves-light">Add <i
                            class="mdi mdi-plus-circle-outline"></i></a>

                    <a id="addToTable" href="{{ route('employees/PrintEmployees') }}"
                        class="btn btn-success waves-effect waves-light">Print <i class="mdi mdi-printer"></i></a>
                </div>
            </div>
        </div>
    @endcan

    <form action="{{ url('employees/export') }}" method="GET">
        <label>Export Customer Data in Excel File</label>
        <div class="input-group mt-2">
            <select name="type" class="form-control" required>
                <option value="">Select Excel Format</option>
                <option value="xlsx">XLSX</option>
                <option value="csv">CSV</option>
                <option value="xls">XLS</option>
            </select>
            <button type="submit" class="btn btn-success">Export</button>
        </div>
    </form>

    <form>
        <input type="search" class="form-control" placeholder="البحث بالرقم المالي" name="search">
    </form>
    <br>
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

                    <th>-</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($employees as $employee)
                    <tr>
                        <th scope="row">{{ ++$i }}</th>
                        {{-- <th scope="row">{{ $employee->id }}</th> --}}
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



                        <td class="actions">
                            <form method="POST" action="{{ route('employees.destroy', $employee->id) }}">
                                @csrf
                                @method('DELETE')
                                @can('emp-show')
                                    {{-- <a href="{{ route('employees.show', $employee->id) }}"
                                        class="on-default edit-row"><i class="fi fi-rr-eye"></i></a> --}}
                                @endcan
                                @can('emp-update')
                                    <a href="{{ route('employees.edit', $employee->id) }}"
                                        class="on-default edit-row">
                                        {{-- <i class="fi fi-rr-pen-square"></i> --}}
                                    تعديل
                                    </a>
                                @endcan
                                @can('emp-delete')
                                    <input name="_method" type="hidden" value="DELETE">
                                    <a type="submit" class="confirm-button">
                                        {{-- <i class="fi fi-rr-trash"></i> --}}
                                        حذف
                                    </a>
                                @endcan
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <div dir="ltr">

            {{-- @empty($employees)
                {!! $employees->withQueryString()->links('pagination::bootstrap-4') !!}
            @endempty --}}

            {{-- @if ($employees->withQueryString() != null)
            {!! $employees->withQueryString()->links('pagination::bootstrap-4') !!}
            @else
            {{-- {!! $employees->withQueryString()->links('pagination::bootstrap-4') !!} 
            @endif --}}



        </div>
    </div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
    $('.confirm-button').click(function(event) {
        var form = $(this).closest("form");
        event.preventDefault();
        swal({
                title: `هل أنت متأكد من حذف هدا الموظف`,
                text: "سيتم حذفه نهائيا من السجل",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });






    // var table = $('table'); //add an id if necessary
    // var cols = $('th', table); //headers
    // var div = $('<div>'); //new div for checkboxes
    // cols.each(function(ind) {
    //     $('<label>').text($(this).text()).append(
    //         $('<input type="checkbox" checked=true>') //create new checkbox
    //         .change(function() {
    //             $('tr *:nth-child(' + (ind + 1) + ')', table).toggle();
    //         })
    //     ).appendTo(div);
    // });

    // table.before(div); //insert the new div before the table
</script>


<script type="text/javascript">
    $('#search').on('keyup', function() {
        $value = $(this).val();
        $.ajax({
            type: 'get',
            url: '{{ URL::to('search') }}',
            data: {
                'search': $value
            },
            success: function(data) {
                $('tbody').html(data);
            }
        });
    })
</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'csrftoken': '{{ csrf_token() }}'
        }
    });
</script>
@endsection

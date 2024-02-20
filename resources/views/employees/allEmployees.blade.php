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
<style>
    /* .blur_effect {
background: rgba( 187, 40, 40, 0.25 );
box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
backdrop-filter: blur( 4px );
-webkit-backdrop-filter: blur( 4px );
border-radius: 10px;
border: 1px solid rgba( 255, 255, 255, 0.18 );
} */
</style>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<div class="panel-body">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    {{-- <div class="row">
        <div class="">
            <div class="m-b-30">
                <a id="addToTable" href="{{ route('employees.create') }}"
                    class="btn btn-success waves-effect waves-light">Add <i
                        class="mdi mdi-plus-circle-outline"></i></a>
            </div>
        </div>
    </div> --}}

    {{-- Upload employee file Excel --}}
    {{-- <form action="{{ route('uploadusers') }}" enctype="multipart/form-data" method="POST" class="blur_effect">
        @csrf
        <div class="col-lg-12 py-3">
            <label for="users">Upload Users File</label>
            <input type="file" class="form-control" style="padding: 3px;" name="employees_data" required />
            <br><br>
        </div>
        <br><br>
        <button type="submit" class="btn btn-success" name="upload">Upload</button>
        <br><br><br>
    </form><br><br> --}}
    {{-- <br><br><br><br><br><br><br>
    @foreach ($emp_data as $emp)
        {{ $emp->name }}<br>
    @endforeach --}}
    {{-- End Upload employee file Excel --}}
    {{-- <form>
        <input type="search" class="form-control" placeholder="Find user here" name="search">
    </form> --}}

    
    <form>
        <input type="search" class="form-control" placeholder="البحث بالرقم الوطني" name="search">
    </form>
    <br>
    <div class="table-responsive">
        <table class="table m-0 table-colored table-success" id="datatable-editable">
            <thead>
                <tr>
                    <th>رقم الملف</th>
                    <th>الرقم العسكري / الرقم المالي</th>
                    <th>الصفه / الرتبه</th>
                    <th>الاسم</th>
                    <th>الرقم الوطني</th>
                    <th>-</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($employeesOfficer as $employeeOfficer)
                    {{-- @if ($employees_type = $employee->financial_Figure)  --}}
                    <tr>
                        <th scope="row"> {{ ++$i }} </th>
                        <td>{{ $employeeOfficer->military_number }}</td>



                        <td> {{ $employeeOfficer->Rank }}</td>



                        <td>{{ $employeeOfficer->full_name }}</td>
                        <td>{{ $employeeOfficer->national_no }}</td>
                        {{-- <td>{{ $employeeOfficer->birth_d }}</td> --}}
                        {{-- @if ($employeeOfficer->adjective)
                            <td>{{$employeeOfficer->adjective}}</td>
                        @else --}}
                        {{-- @endif --}}

                        {{-- <td>{{ $employeeOfficer->bank_accountNo }}</td> --}}
                        <td class="actions">
                            <form method="POST"
                                action="{{ route('employeesofficer.destroy', $employeeOfficer->id) }}">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('employeesofficer.show', $employeeOfficer->id) }}"
                                    class="on-default edit-row"><i class="fi fi-rr-eye"></i></a>

                                <a href="{{ route('employeesofficer.edit', $employeeOfficer->id) }}"
                                    class="on-default edit-row"><i class="fi fi-rr-pen-square"></i></a>

                                <input name="_method" type="hidden" value="DELETE">
                                <a type="submit" class="confirm-button"><i class="fi fi-rr-trash"></i></a>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @foreach ($employees as $employee)
                    {{-- @if ($employees_type = $employee->financial_Figure)  --}}
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
                        {{-- <td>{{ $employee->birth_d }}</td> --}}
                        {{-- @if ($employee->adjective)
                            <td>{{$employee->adjective}}</td>
                        @else --}}
                        {{-- @endif --}}

                        {{-- <td>{{ $employee->bank_accountNo }}</td> --}}
                        <td class="actions">
                            <form method="POST" action="{{ route('employees.destroy', $employee->id) }}">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('employees.show', $employee->id) }}"
                                    class="on-default edit-row"><i class="fi fi-rr-eye"></i></a>

                                <a href="{{ route('employees.edit', $employee->id) }}"
                                    class="on-default edit-row"><i class="fi fi-rr-pen-square"></i></a>

                                <input name="_method" type="hidden" value="DELETE">
                                <a type="submit" class="confirm-button"><i class="fi fi-rr-trash"></i></a>
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

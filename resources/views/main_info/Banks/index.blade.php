@extends('layout.main')
@section('content')
@section('title_content_main')
    لوحه التحكم
@section('title_content_sub')
    المصارف
@endsection
@endsection

<div class="panel">
<div class="panel-body">
    <div class="row">
        <div class="">

        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="table-responsive col-md-6">
        <div class="m-b-30">
            <a id="addToTable" href="{{ route('Bank.create') }}" class="btn btn-success waves-effect waves-light">Add
                <i class="mdi mdi-plus-circle-outline"></i></a>
        </div>
        <table class="table m-0 table-colored table-success " id="datatable-editable">
            <thead>
                <tr>
                    <th>رقم المصرف</th>
                    <th>اسم المصرف</th>
                    <th>-</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($Banks as $Bank)
                    <tr>
                        <th scope="row">{{ $Bank->id }}</th>
                        <td>{{ $Bank->BankName }}</td>

                        <td class="actions">
                            <form action="{{ route('Bank.destroy', $Bank->id) }}" method="Post">

                                <a href="{{ route('Bank.edit', $Bank->id) }}" class="on-default edit-row"><i
                                        class="fa fa-pencil"></i></a>

                                @csrf
                                @method('DELETE')

                                {{-- <button type="submit" class="btn"><i class="fa fa-trash-o"></i></button> --}}
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        <div dir="ltr">
            {!! $Banks->withQueryString()->links('pagination::bootstrap-4') !!}
        </div>
    </div>


    <div class="table-responsive col-md-6">
        <div class="m-b-30">
            <a id="addToTable" href="{{ route('Branch.create') }}"
                class="btn btn-success waves-effect waves-light">Add <i class="mdi mdi-plus-circle-outline"></i></a>
        </div>
        <table class="table m-0 table-colored table-success " id="datatable-editable">
            <thead>
                <tr>
                    <th>رقم الفرع</th>
                    <th>الفرع</th>
                    <th>-</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($Branches as $Branch)
                    <tr>
                        <th scope="row">{{ $Branch->id }}</th>
                        <td>{{ $Branch->BranchName }}</td>

                        <td class="actions">
                            <form action="{{ route('Branch.destroy', $Branch->id) }}" method="Post">

                                <a href="{{ route('Branch.edit', $Branch->id) }}" class="on-default edit-row"><i
                                        class="fa fa-pencil"></i></a>

                                @csrf
                                @method('DELETE')

                                {{-- <button type="submit" class="btn"><i class="fa fa-trash-o"></i></button> --}}
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        <div dir="ltr">
            {!! $Branches->withQueryString()->links('pagination::bootstrap-4') !!}
        </div>
    </div>


</div>
</div>



@endsection

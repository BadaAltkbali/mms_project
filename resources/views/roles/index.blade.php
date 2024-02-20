@extends('layout.main')
@section('content')
@section('title_content_main')
    الصلاحيات
@section('title_content_sub')
    عرض الصلاحيات
@endsection
@endsection

<div class="row">
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="col-lg-12 margin-tb">
    <div class="pull-left">
        <h2>ادارة الصلاحيات</h2>
    </div>
    <div class="row">
        <div class="">
            <div class="m-b-30">
                @can('role-create')
                    <a id="addToTable" href="{{ route('roles.create') }}"
                        class="btn btn-success waves-effect waves-light">Add <i
                            class="mdi mdi-plus-circle-outline"></i></a>
                @endcan
            </div>
        </div>
    </div>
</div>
</div>

<div class="table-responsive">
<table class="table m-0 table-colored table-success" id="datatable-editable">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($roles as $key => $role)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('roles.show', $role->id) }}">Show</a>
                    @can('role-edit')
                        <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                    @endcan
                    @can('role-delete')
                        {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    @endcan
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
<div dir="ltr">

</div>
</div>
{!! $roles->render() !!}

@endsection

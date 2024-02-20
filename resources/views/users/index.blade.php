@extends('layout.main')
@section('content')
@section('title_content_main')
    المستخدمين
@section('title_content_sub')
    عرض المستخدمين
@endsection
@endsection
@if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
<div class="panel">
<div class="panel-body">
    <div class="row">
        <div class="">
            <div class="m-b-30">
                <a href="{{ route('users.create') }}" id="addToTable"
                    class="btn btn-success waves-effect waves-light">Add <i
                        class="mdi mdi-plus-circle-outline"></i></a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        
        <table class="table m-0 table-colored table-success" id="datatable-editable">
            <thead>
                <tr>
                    <th>رقم المستخدم</th>
                    <th>الاسم الكامل</th>
                    <th>اسم المستخدم</th>
                    <th>الصلاحيات</th>
                    <th>-</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $user)
                    <tr>
                        <th scope="row">{{ ++$i }}</th>
                        <td>{{ $user->fullname }}</td>
                        <td>{{ $user->username }}</td>
                        <td>
                            @if (!empty($user->getRoleNames()))
                                @foreach ($user->getRoleNames() as $v)
                                    <span class="badge rounded-pill bg-dark">{{ $v }}</span>
                                @endforeach
                            @endif
                        </td>

                        <td class="actions">
                            {{-- <a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                        <a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a> --}}


                            <a class="btn btn-info" href="{{ route('users.show', $user->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}


                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {!! $data->render() !!}
    </div>
</div>
</div>
@endsection

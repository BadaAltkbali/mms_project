@extends('layout.main')
@section('content')
@section('title_content_main')
    المستخدمين
@section('title_content_sub')
    تعديل بيانات مستخدم
@endsection
@endsection


@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="col-sm-12">
<div class="card-box">


    <div class="row">
        {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
        <fieldset class="m-t-50">

            {{-- <legend>البيانات الاساسيه : </legend> --}}
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">الاسم</label>
                {!! Form::text('fullname', null, array('placeholder' => 'Name','class' => 'form-control')) !!}            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputPassword1">اسم المستخدم</label>
                {!! Form::text('username', null, array('placeholder' => 'User Name','class' => 'form-control')) !!}            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputPassword1">كلمة المرور</label>
                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputPassword1">تأكيد كلمة المرور</label>
                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}            </div>

            <div class="form-group col-md-6">
                <label for="exampleInputPassword1">الصلاحيات</label>
                {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}            </div>

        </fieldset>
        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10 btn-md">حفظ</button>
        {!! Form::close() !!}

    </div>

    <!-- end row -->

</div>

</div>


@endsection

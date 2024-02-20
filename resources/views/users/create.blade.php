@extends('layout.main')
@section('content')
@section('title_content_main')
    المستخدمين
@section('title_content_sub')
    اضافه مستخدم
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
        {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}

        <fieldset class="m-t-50">

            {{-- <legend>البيانات الاساسيه : </legend> --}}
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">الاسم</label>
                {!! Form::text('fullname', null, ['placeholder' => 'Full Name', 'class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputPassword1">اسم المستخدم</label>
                {!! Form::text('username', null, ['placeholder' => 'User Name', 'class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputPassword1">كلمة المرور</label>
                {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputPassword1">تأكيد كلمة المرور</label>
                {!! Form::password('confirm-password', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
            </div>

            <div class="form-group col-md-6">
                <label for="exampleInputPassword1">الصلاحيات</label>
                {!! Form::select('roles[]', $roles, [], ['class' => 'form-control', 'multiple']) !!}
            </div>

        </fieldset>
        {{-- <button type="submit" class="btn btn-success waves-effect waves-light m-r-10 btn-md">حفظ</button> --}}

        <div class="w-full h-40 flex items-center justify-center">
            <button type="submit"
                class="relative inline-flex items-center justify-center p-4 px-6 py-3 overflow-hidden font-medium text-indigo-600 transition duration-300 ease-out border-2 border-success rounded-full shadow-md group">
                <span
                    class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 -translate-x-full bg-success group-hover:translate-x-0 ease">
                    {{-- <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg> --}}

                    <img width="30" height="30"
                        src="https://img.icons8.com/sf-regular/48/FFFFFF/add-user-male.png" alt="add-user-male" />
                </span>
                <span
                    class="absolute flex items-center justify-center w-full h-full text-success transition-all duration-300 transform group-hover:translate-x-full ease">حفظ
                </span>
                <span class="relative invisible">Button</span>
            </button>
        </div>
        {!! Form::close() !!}

    </div>

    <!-- end row -->

</div>

</div>


@endsection

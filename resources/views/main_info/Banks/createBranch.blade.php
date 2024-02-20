@extends('layout.main')
@section('content')
@section('title_content_main')
    فروع المصارف
@section('title_content_sub')
    اضافه فرع مصرف
@endsection
@endsection
@if (session('status'))
<div class="alert alert-success mb-1 mt-1">
    {{ session('status') }}
</div>
@endif
<form action="{{ route('Branch.store') }}" method="post" class="form-inline m-r-10" role="form"
enctype="multipart/form-data">
@csrf
<div class="form-group">
    <input type="text" class="form-control" id="BranchName" name="BranchName" placeholder="ادخل اسم فرع المصرف">
</div>

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
                src="https://img.icons8.com/sf-regular/48/FFFFFF/add-user-male.png"
                alt="add-user-male" /> </span>
        <span
            class="absolute flex items-center justify-center w-full h-full text-success transition-all duration-300 transform group-hover:translate-x-full ease">حفظ
        </span>
        <span class="relative invisible">Button</span>
    </button>
</div>
@error('BranchName')
    <p style="font-size: 15px;position: absolute;color:#f5707a"> {{ $message }} </p>
@enderror
</form>
@endsection

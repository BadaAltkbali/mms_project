@extends('layout.main')
@section('content')
@section('title_content_main')
    الوحدات
@section('title_content_sub')
    تعديل الوحدة
@endsection
@endsection
@if (session('status'))
<div class="alert alert-success mb-1 mt-1">
    {{ session('status') }}
</div>
@endif
<form action="{{ route('wehda.update', $wehda->id) }}" method="post" class="form-inline m-r-10" role="form"
enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="form-group">
    <input type="text" class="form-control" id="unitBranch_Name" name="unitBranch_Name"
        value="{{ $wehda->unitBranch_Name }}">
</div>

<button type="submit" class="btn btn-success waves-effect waves-light m-r-10 btn-md">تحديث</button>
@error('unitBranch_Name')
    <p style="font-size: 15px;position: absolute;color:#f5707a"> {{ $message }} </p>
@enderror
</form>
@endsection

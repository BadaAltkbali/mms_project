@extends('layout.main')
@section('content')
@section('title_content_main')
    الفروع
@section('title_content_sub')
    تعديل فرع المصرف
@endsection
@endsection
@if (session('status'))
<div class="alert alert-success mb-1 mt-1">
    {{ session('status') }}
</div>
@endif
<form action="{{ route('Branch.update', $Branch->id) }}" method="post" class="form-inline m-r-10" role="form"
enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="form-group">
    <input type="text" class="form-control" id="BankName" name="BranchName" value="{{ $Branch->BranchName }}">
    @error('BranchName')
        <p style="font-size: 15px;position: absolute;color:#f5707a"> {{ $message }} </p>
    @enderror
</div>

<button type="submit" class="btn btn-success waves-effect waves-light m-r-10 btn-md">تحديث</button>
</form>
@endsection

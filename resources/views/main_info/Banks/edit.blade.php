@extends('layout.main')
@section('content')
@section('title_content_main')
    المصرف
@section('title_content_sub')
    تعديل المصرف
@endsection
@endsection
@if (session('status'))
<div class="alert alert-success mb-1 mt-1">
    {{ session('status') }}
</div>
@endif
<form action="{{ route('Bank.update', $Bank->id) }}" method="post" class="form-inline m-r-10" role="form"
enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="form-group">
    <input type="text" class="form-control" id="BankName" name="BankName" value="{{ $Bank->BankName  }}">
    @error('BankName')
        <p style="font-size: 15px;position: absolute;color:#f5707a"> {{' ( '. old('BankName').' ) ' .'  :  ' .$message }} </p>
    @enderror
</div>

<button type="submit" class="btn btn-success waves-effect waves-light m-r-10 btn-md">تحديث</button>
</form>
@endsection

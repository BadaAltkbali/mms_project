@extends('layout.main')
@section('content')
@section('title_content_main')
    لوحه التحكم
@section('title_content_sub')
    الوحدات
@endsection
@endsection

<div class="panel">
<div class="panel-body">
    <div class="row">
        <div class="">
            <div class="m-b-30">
                <a id="addToTable" href="{{ route('wehda.create') }}"
                    class="btn btn-success waves-effect waves-light">Add <i
                        class="mdi mdi-plus-circle-outline"></i></a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="table-responsive">
        <table class="table m-0 table-colored table-success" id="datatable-editable">
            <thead>
                <tr>
                    <th>رقم الوحدة</th>
                    <th>اسم الوحدة</th>
                    <th>-</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($wahadat as $wehda)
                    <tr>
                        <th scope="row">{{ $wehda->id }}</th>
                        <td>{{ $wehda->unitBranch_Name }}</td>

                        <td class="actions">
                            <form action="{{ route('wehda.destroy', $wehda->id) }}" method="Post">

                                <a href="{{ route('wehda.edit', $wehda->id) }}" class="on-default edit-row"><i
                                        class="fa fa-pencil"></i></a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{-- <ul class="pagination pagination-split">
            <li class="disabled"><a href="#"><i class="fa fa-angle-left"></i></a></li>
            <li><a href="#">1</a></li>
            <li class="active"><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
        </ul>
         --}}
        <div dir="ltr">
            {!! $wahadat->withQueryString()->links('pagination::bootstrap-4') !!}
        </div>
    </div>
</div>
</div>



@endsection

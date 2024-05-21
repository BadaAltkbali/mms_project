@extends('layout.main')
@section('content')
@section('title_content_main')
    لوحه التحكم
@section('title_content_sub')
    الصفات
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
            <a id="addToTable" href="{{ route('Adjective.create') }}"
                class="btn btn-success waves-effect waves-light">Add <i class="mdi mdi-plus-circle-outline"></i></a>
        </div>
        <table class="table m-0 table-colored table-success ">
            <thead>
                <tr>
                    <th>رقم الصفه</th>
                    <th>اسم الصفه</th>
                    <th>-</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($adjectives as $adjective)
                    <tr>
                        <th scope="row">{{ $adjective->id }}</th>
                        <td>{{ $adjective->AdjName }}</td>

                        <td class="actions">
                            <form action="{{ route('Adjective.destroy', $adjective->id) }}" method="Post">

                                <a href="{{ route('Adjective.edit', $adjective->id) }}"
                                    class="on-default edit-row"><i class="fa fa-pencil"></i></a>

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
            {!! $adjectives->withQueryString()->links('pagination::bootstrap-4') !!}
        </div>
    </div>

</div>
</div>



@endsection

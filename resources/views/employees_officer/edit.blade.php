@extends('layout.main')
@section('content')
@section('title_content_main')
    الضباط
@section('title_content_sub')
    تعديل بيانات الضابط
@endsection
@endsection
@if (session('status'))
<div class="alert alert-success mb-1 mt-1">
    {{ session('status') }}
</div>
@endif

<div class="col-sm-12">
<div class="card-box">

    <div class="row">
        <form action="{{ route('employeesofficer.update', $employeeOfficers->id) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <fieldset class="m-t-50">
                <legend>البيانات الاساسيه : </legend>

                <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">رقم الملف</label>
                    <input type="text" class="form-control text-center" name="fileNumber"
                        value="{{ $employeeOfficers->id }}" disabled>
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">الرقم المالي</label>
                    <input type="text" class="form-control" name="military_number"
                        value="{{ $employeeOfficers->military_number }}">
                    @foreach ($errors->get('military_number') as $error)
                        <span style="font-size: 15px;position: absolute;color:#f5707a">{{ $error }}</span>
                    @endforeach
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">الرتبة</label>
                    <select class="form-control" id="" name="Rank">
                        @if ($employeeOfficers->Rank == '/' || $employeeOfficers->Rank == '')
                            <option value="/" selected> -- اختر -- </option>
                            <option value="اللواء">اللواء</option>
                            <option value="عميد">عميد</option>
                            <option value="عقيد">عقيد</option>
                            <option value="رائد">رائد</option>
                            <option value="نقيب">نقيب</option>
                            <option value="ملازم أول">ملازم أول </option>
                            <option value="ملازم ثاني">ملازم ثاني</option>
                            <option value="رئيس عرفه وحدة">رئيس عرفه وحدة</option>
                            <option value="رئيس عرفه سريه">رئيس عرفه سريه</option>
                            <option value="عريف">عريف</option>
                            <option value="نائب عريف">نائب عريف</option>
                            <option value="جندي أول">جندي أول </option>
                            <option value="جندي">جندي</option>
                        @elseif ($employeeOfficers->Rank == 'اللواء')
                            <option value="/"> -- اختر -- </option>
                            <option value="اللواء" selected>اللواء</option>
                            <option value="عميد">عميد</option>
                            <option value="عقيد">عقيد</option>
                            <option value="رائد">رائد</option>
                            <option value="نقيب">نقيب</option>
                            <option value="ملازم أول">ملازم أول </option>
                            <option value="ملازم ثاني">ملازم ثاني</option>
                            <option value="رئيس عرفه وحدة">رئيس عرفه وحدة</option>
                            <option value="رئيس عرفه سريه">رئيس عرفه سريه</option>
                            <option value="عريف">عريف</option>
                            <option value="نائب عريف">نائب عريف</option>
                            <option value="جندي أول">جندي أول </option>
                            <option value="جندي">جندي</option>
                        @elseif ($employeeOfficers->Rank == 'عميد')
                            <option value="/"> -- اختر -- </option>
                            <option value="اللواء">اللواء</option>
                            <option value="عميد" selected>عميد</option>
                            <option value="عقيد">عقيد</option>
                            <option value="رائد">رائد</option>
                            <option value="نقيب">نقيب</option>
                            <option value="ملازم أول">ملازم أول </option>
                            <option value="ملازم ثاني">ملازم ثاني</option>
                            <option value="رئيس عرفه وحدة">رئيس عرفه وحدة</option>
                            <option value="رئيس عرفه سريه">رئيس عرفه سريه</option>
                            <option value="عريف">عريف</option>
                            <option value="نائب عريف">نائب عريف</option>
                            <option value="جندي أول">جندي أول </option>
                            <option value="جندي">جندي</option>
                        @elseif ($employeeOfficers->Rank == 'عقيد')
                            <option value="/"> -- اختر -- </option>
                            <option value="اللواء">اللواء</option>
                            <option value="عميد">عميد</option>
                            <option value="عقيد" selected>عقيد</option>
                            <option value="رائد">رائد</option>
                            <option value="نقيب">نقيب</option>
                            <option value="ملازم أول">ملازم أول </option>
                            <option value="ملازم ثاني">ملازم ثاني</option>
                            <option value="رئيس عرفه وحدة">رئيس عرفه وحدة</option>
                            <option value="رئيس عرفه سريه">رئيس عرفه سريه</option>
                            <option value="عريف">عريف</option>
                            <option value="نائب عريف">نائب عريف</option>
                            <option value="جندي أول">جندي أول </option>
                            <option value="جندي">جندي</option>
                        @elseif ($employeeOfficers->Rank == 'رائد')
                            <option value="/"> -- اختر -- </option>
                            <option value="اللواء">اللواء</option>
                            <option value="عميد">عميد</option>
                            <option value="عقيد">عقيد</option>
                            <option value="رائد" selected>رائد</option>
                            <option value="نقيب">نقيب</option>
                            <option value="ملازم أول">ملازم أول </option>
                            <option value="ملازم ثاني">ملازم ثاني</option>
                            <option value="رئيس عرفه وحدة">رئيس عرفه وحدة</option>
                            <option value="رئيس عرفه سريه">رئيس عرفه سريه</option>
                            <option value="عريف">عريف</option>
                            <option value="نائب عريف">نائب عريف</option>
                            <option value="جندي أول">جندي أول </option>
                            <option value="جندي">جندي</option>
                        @elseif ($employeeOfficers->Rank == 'نقيب')
                            <option value="/"> -- اختر -- </option>
                            <option value="اللواء">اللواء</option>
                            <option value="عميد">عميد</option>
                            <option value="عقيد">عقيد</option>
                            <option value="رائد">رائد</option>
                            <option value="نقيب" selected>نقيب</option>
                            <option value="ملازم أول">ملازم أول </option>
                            <option value="ملازم ثاني">ملازم ثاني</option>
                            <option value="رئيس عرفه وحدة">رئيس عرفه وحدة</option>
                            <option value="رئيس عرفه سريه">رئيس عرفه سريه</option>
                            <option value="عريف">عريف</option>
                            <option value="نائب عريف">نائب عريف</option>
                            <option value="جندي أول">جندي أول </option>
                            <option value="جندي">جندي</option>
                        @elseif ($employeeOfficers->Rank == 'ملازم أول')
                            <option value="/"> -- اختر -- </option>
                            <option value="اللواء">اللواء</option>
                            <option value="عميد">عميد</option>
                            <option value="عقيد">عقيد</option>
                            <option value="رائد">رائد</option>
                            <option value="نقيب">نقيب</option>
                            <option value="ملازم أول" selected>ملازم أول </option>
                            <option value="ملازم ثاني">ملازم ثاني</option>
                            <option value="رئيس عرفه وحدة">رئيس عرفه وحدة</option>
                            <option value="رئيس عرفه سريه">رئيس عرفه سريه</option>
                            <option value="عريف">عريف</option>
                            <option value="نائب عريف">نائب عريف</option>
                            <option value="جندي أول">جندي أول </option>
                            <option value="جندي">جندي</option>
                        @elseif ($employeeOfficers->Rank == 'ملازم ثاني')
                            <option value="/"> -- اختر -- </option>
                            <option value="اللواء">اللواء</option>
                            <option value="عميد">عميد</option>
                            <option value="عقيد">عقيد</option>
                            <option value="رائد">رائد</option>
                            <option value="نقيب">نقيب</option>
                            <option value="ملازم أول">ملازم أول </option>
                            <option value="ملازم ثاني" selected>ملازم ثاني</option>
                            <option value="رئيس عرفه وحدة">رئيس عرفه وحدة</option>
                            <option value="رئيس عرفه سريه">رئيس عرفه سريه</option>
                            <option value="عريف">عريف</option>
                            <option value="نائب عريف">نائب عريف</option>
                            <option value="جندي أول">جندي أول </option>
                            <option value="جندي">جندي</option>
                        @elseif ($employeeOfficers->Rank == 'رئيس عرفه وحدة')
                            <option value="/"> -- اختر -- </option>
                            <option value="اللواء">اللواء</option>
                            <option value="عميد">عميد</option>
                            <option value="عقيد">عقيد</option>
                            <option value="رائد">رائد</option>
                            <option value="نقيب">نقيب</option>
                            <option value="ملازم أول">ملازم أول </option>
                            <option value="ملازم ثاني">ملازم ثاني</option>
                            <option value="رئيس عرفه وحدة" selected>رئيس عرفه وحدة</option>
                            <option value="رئيس عرفه سريه">رئيس عرفه سريه</option>
                            <option value="عريف">عريف</option>
                            <option value="نائب عريف">نائب عريف</option>
                            <option value="جندي أول">جندي أول </option>
                            <option value="جندي">جندي</option>
                        @elseif ($employeeOfficers->Rank == 'رئيس عرفه سريه')
                            <option value="/"> -- اختر -- </option>
                            <option value="اللواء">اللواء</option>
                            <option value="عميد">عميد</option>
                            <option value="عقيد">عقيد</option>
                            <option value="رائد">رائد</option>
                            <option value="نقيب">نقيب</option>
                            <option value="ملازم أول">ملازم أول </option>
                            <option value="ملازم ثاني">ملازم ثاني</option>
                            <option value="رئيس عرفه وحدة">رئيس عرفه وحدة</option>
                            <option value="رئيس عرفه سريه" selected>رئيس عرفه سريه</option>
                            <option value="عريف">عريف</option>
                            <option value="نائب عريف">نائب عريف</option>
                            <option value="جندي أول">جندي أول </option>
                            <option value="جندي">جندي</option>
                        @elseif ($employeeOfficers->Rank == 'عريف')
                            <option value="/"> -- اختر -- </option>
                            <option value="اللواء">اللواء</option>
                            <option value="عميد">عميد</option>
                            <option value="عقيد">عقيد</option>
                            <option value="رائد">رائد</option>
                            <option value="نقيب">نقيب</option>
                            <option value="ملازم أول">ملازم أول </option>
                            <option value="ملازم ثاني">ملازم ثاني</option>
                            <option value="رئيس عرفه وحدة">رئيس عرفه وحدة</option>
                            <option value="رئيس عرفه سريه">رئيس عرفه سريه</option>
                            <option value="عريف" selected>عريف</option>
                            <option value="نائب عريف">نائب عريف</option>
                            <option value="جندي أول">جندي أول </option>
                            <option value="جندي">جندي</option>
                        @elseif ($employeeOfficers->Rank == 'نائب عريف')
                            <option value="/"> -- اختر -- </option>
                            <option value="اللواء">اللواء</option>
                            <option value="عميد">عميد</option>
                            <option value="عقيد">عقيد</option>
                            <option value="رائد">رائد</option>
                            <option value="نقيب">نقيب</option>
                            <option value="ملازم أول">ملازم أول </option>
                            <option value="ملازم ثاني">ملازم ثاني</option>
                            <option value="رئيس عرفه وحدة">رئيس عرفه وحدة</option>
                            <option value="رئيس عرفه سريه">رئيس عرفه سريه</option>
                            <option value="عريف">عريف</option>
                            <option value="نائب عريف" selected>نائب عريف</option>
                            <option value="جندي أول">جندي أول </option>
                            <option value="جندي">جندي</option>
                        @elseif ($employeeOfficers->Rank == 'جندي أول')
                            <option value="/"> -- اختر -- </option>
                            <option value="اللواء">اللواء</option>
                            <option value="عميد">عميد</option>
                            <option value="عقيد">عقيد</option>
                            <option value="رائد">رائد</option>
                            <option value="نقيب">نقيب</option>
                            <option value="ملازم أول">ملازم أول </option>
                            <option value="ملازم ثاني">ملازم ثاني</option>
                            <option value="رئيس عرفه وحدة">رئيس عرفه وحدة</option>
                            <option value="رئيس عرفه سريه">رئيس عرفه سريه</option>
                            <option value="عريف">عريف</option>
                            <option value="نائب عريف">نائب عريف</option>
                            <option value="جندي أول" selected>جندي أول </option>
                            <option value="جندي">جندي</option>
                        @elseif ($employeeOfficers->Rank == 'جندي')
                            <option value="/"> -- اختر -- </option>
                            <option value="اللواء">اللواء</option>
                            <option value="عميد">عميد</option>
                            <option value="عقيد">عقيد</option>
                            <option value="رائد">رائد</option>
                            <option value="نقيب">نقيب</option>
                            <option value="ملازم أول">ملازم أول </option>
                            <option value="ملازم ثاني">ملازم ثاني</option>
                            <option value="رئيس عرفه وحدة">رئيس عرفه وحدة</option>
                            <option value="رئيس عرفه سريه">رئيس عرفه سريه</option>
                            <option value="عريف">عريف</option>
                            <option value="نائب عريف">نائب عريف</option>
                            <option value="جندي أول">جندي أول </option>
                            <option value="جندي" selected>جندي</option>
                        @endif
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="exampleInputEmail1">الاسم رباعي</label>
                    <input type="text" class="form-control" name="full_name"
                        value="{{ $employeeOfficers->full_name }}">
                    @foreach ($errors->get('full_name') as $error)
                        <span style="font-size: 15px;position: absolute;color:#f5707a">{{ $error }}</span>
                    @endforeach
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">الرقم الوطني</label>
                    <input type="text" class="form-control" name="national_no"
                        value="{{ $employeeOfficers->national_no }}">
                    @foreach ($errors->get('national_no') as $error)
                        <span style="font-size: 15px;position: absolute;color:#f5707a">{{ $error }}</span>
                    @endforeach
                </div>
                <div class="form-group col-md-3">
                    <label for="exampleInputPassword1">اسم الأم ثلاثي</label>
                    <input type="text" class="form-control" name="familyHandbook_No"
                        value="{{ $employeeOfficers->familyHandbook_No }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputEmail1">تاريخ الميلاد</label>
                    <input type="date" class="form-control" name="birth_d"
                        value="{{ $employeeOfficers->birth_d }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputEmail1">مكان الميلاد</label>
                    <input type="text" class="form-control" name="place_birth"
                        value="{{ $employeeOfficers->place_birth }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">مكان الاقامه الحاليه</label>
                    <input type="text" class="form-control"
                        name="place_residence"value="{{ $employeeOfficers->place_residence }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">أقرب نقطه داله</label>
                    <input type="text" class="form-control" name="closest_point"
                        value="{{ $employeeOfficers->closest_point }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputEmail1">الجنسية</label>
                    <input type="text" class="form-control" name="nationality"
                        value="{{ $employeeOfficers->nationality }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputEmail1">الديانه</label>
                    <input type="text" class="form-control" name="religion"
                        value="{{ $employeeOfficers->religion }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputEmail1">فصيله الدم</label>
                    <select class="form-control" id="" name="blood_t">
                        @if ($employeeOfficers->blood_t == 'A+')
                            <option value="/"> -- اختر -- </option>
                            <option value="A+" selected>A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        @elseif ($employeeOfficers->blood_t == 'A-')
                            <option value="/"> -- اختر -- </option>
                            <option value="A+">A+</option>
                            <option value="A-" selected>A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        @elseif ($employeeOfficers->blood_t == 'B+')
                            <option value="/"> -- اختر -- </option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+" selected>B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        @elseif ($employeeOfficers->blood_t == 'B-')
                            <option value="/"> -- اختر -- </option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-" selected>B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        @elseif ($employeeOfficers->blood_t == 'AB+')
                            <option value="/"> -- اختر -- </option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+" selected>AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        @elseif ($employeeOfficers->blood_t == 'AB-')
                            <option value="/"> -- اختر -- </option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-" selected>AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        @elseif ($employeeOfficers->blood_t == 'O+')
                            <option value="/"> -- اختر -- </option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+" selected>O+</option>
                            <option value="O-">O-</option>
                        @elseif ($employeeOfficers->blood_t == 'O-')
                            <option value="/"> -- اختر -- </option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-" selected>O-</option>
                        @elseif ($employeeOfficers->blood_t == '/' || $employeeOfficers->blood_t == '')
                            <option value="/" selected> -- اختر -- </option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        @endif

                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputEmail1">الحاله الاجتماعيه</label>
                    <select class="form-control" id="" name="marital_status">
                        @if ($employeeOfficers->marital_status == '/' || $employeeOfficers->marital_status == '')
                            <option value="/" selected> -- اختر -- </option>
                            <option value="متزوج">متزوج</option>
                            <option value="أعزب">أعزب</option>
                            <option value="أرملة">أرملة</option>
                        @elseif ($employeeOfficers->marital_status == 'متزوج')
                            <option value="/"> -- اختر -- </option>
                            <option value="متزوج" selected>متزوج</option>
                            <option value="أعزب">أعزب</option>
                            <option value="أرملة">أرملة</option>
                        @elseif ($employeeOfficers->marital_status == 'أعزب')
                            <option value="/"> -- اختر -- </option>
                            <option value="متزوج">متزوج</option>
                            <option value="أعزب" selected>أعزب</option>
                            <option value="أرملة">أرملة</option>
                        @elseif ($employeeOfficers->marital_status == 'أرملة')
                            <option value="/"> -- اختر -- </option>
                            <option value="متزوج">متزوج</option>
                            <option value="أعزب">أعزب</option>
                            <option value="أرملة" selected>أرملة</option>
                        @endif
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputEmail1">عدد الأبناء - الذكور</label>
                    <input type="text" class="form-control" name="sons"
                        value="{{ $employeeOfficers->sons }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputEmail1">عدد الأبناء - الاناث</label>
                    <input type="text" class="form-control" name="daughter"
                        value="{{ $employeeOfficers->daughter }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">رقم الهاتف</label>
                    <input type="number" class="form-control" name="phone_n"
                        value="{{ $employeeOfficers->phone_n }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="exampleInputPassword1">رقم جواز السفر أو البطاقه الشخصيه</label>
                    <select class="form-control" id="" name="passport_or_card">
                        @if ($employeeOfficers->passport_or_card == '/' || $employeeOfficers->passport_or_card == '')
                            <option value="/" selected> -- اختر -- </option>
                            <option value="جواز سفر">جواز سفر</option>
                            <option value="بطاقة شخصيه">بطاقه شخصيه</option>
                        @elseif ($employeeOfficers->passport_or_card == 'جواز سفر')
                            <option value="/"> -- اختر -- </option>
                            <option value="جواز سفر" selected>جواز سفر</option>
                            <option value="بطاقة شخصيه">بطاقه شخصيه</option>
                        @elseif ($employeeOfficers->passport_or_card == 'بطاقة شخصيه')
                            <option value="/"> -- اختر -- </option>
                            <option value="جواز سفر">جواز سفر</option>
                            <option value="بطاقة شخصيه" selected>بطاقه شخصيه</option>
                        @endif
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">الرقم</label>
                    <input type="text" class="form-control" name="passport"
                        value="{{ $employeeOfficers->passport }}">
                </div>
                {{-- <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">تاريخ الاصدار</label>
                    <input type="date" class="form-control" name="passport_releaseDate"
                        value="{{ $employeeOfficers->passport_releaseDate }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">مكان الاصدار</label>
                    <input type="text" class="form-control" name="passport_placeOfissue"
                        value="{{ $employeeOfficers->passport_placeOfissue }}">
                </div> --}}
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">رقم قيد العائله</label>
                    <input type="text" class="form-control" name="familyRegistration_No"
                        value="{{ $employeeOfficers->familyRegistration_No }}">
                </div>
                {{-- <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">رقم كتيب العائله</label>
                    <input type="text" class="form-control" name="familyHandbook_No"
                        value="{{ $employeeOfficers->familyHandbook_No }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">رقم ورقه العائله</label>
                    <input type="text" class="form-control" name="familyPaper_No"
                        value="{{ $employeeOfficers->familyPaper_No }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">تاريخ الاصدار</label>
                    <input type="date" class="form-control" name="familyHandbook_No___releaseDate"
                        value="{{ $employeeOfficers->familyHandbook_No___releaseDate }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">مكان الاصدار</label>
                    <input type="text" class="form-control" name="familyHandbook_No___placeOfissue"
                        value="{{ $employeeOfficers->familyHandbook_No___placeOfissue }}">
                </div> --}}

                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">أقرب الأقارب</label>
                    <input type="text" class="form-control" name="closest_relatives"
                        value="{{ $employeeOfficers->closest_relatives }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="exampleInputPassword1">رقم هاتف (أقرب الأقارب)</label>
                    <input type="text" class="form-control" name="closest_relatives_Phone"
                        value="{{ $employeeOfficers->closest_relatives_Phone }}">
                </div>
                <div class="form-group col-md-12">
                    <label for="exampleInputPassword1">هل تعاني من امراض مزمنه</label>
                    <input type="text" class="form-control" name="diseases"
                        value="{{ $employeeOfficers->diseases }}">
                </div>
            </fieldset>

            <fieldset class="m-t-50">
                <legend>البيانات المالية : </legend>



                <div class="form-group col-md-4">
                    <label for="exampleInputPassword1">اسم الوحدة</label>
                    <input type="text" class="form-control" name="unitName" value="الخدمات الطبية العسكرية"
                        disabled>
                </div>
                <div class="form-group col-md-4">
                    <label for="exampleInputPassword1"> الوحدة الفرعية</label>
                    {{-- <input type="text" class="form-control" name="unitBranch_id"
                        value="{{ $employeeOfficers->unitBranch_id }}"> --}}

                    <select id="unitBranch_id" class="form-control" name="unitBranch_id">
                        @foreach ($wahadat as $id => $unitBranch_Name)
                            <option @selected($employeeOfficers->unitBranch_id == $id) value="{{ $id }}">
                                {{ $unitBranch_Name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="placement">التنسيب الداخلي</label>
                    <input id="placement" type="text" class="form-control" name="placement"
                        value="{{ $employeeOfficers->placement }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="exampleInputPassword1">المصرف</label>
                    <select class="form-control" name="bankName_id">

                        @foreach ($Banks as $id => $BankName)
                            <option @selected($employeeOfficers->bankName_id == $id) value="{{ $id }}">
                                {{ $BankName }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="exampleInputPassword1">الفرع</label>
                    {{-- <input type="text" class="form-control" name="bankBranch_id"
                        value="{{ $employeeOfficers->bankBranch_id }}"> --}}
                    <select id="bankBranch_id" class="form-control" name="bankBranch_id">
                        @foreach ($Branches as $id => $BranchName)
                            <option @selected($employeeOfficers->bankName_id == $id) value="{{ $id }}">
                                {{ $BranchName }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="exampleInputPassword1">رقم الحساب</label>
                    <input type="text" class="form-control" name="bank_accountNo"
                        value="{{ $employeeOfficers->bank_accountNo }}">
                    @foreach ($errors->get('bank_accountNo') as $error)
                        <span style="font-size: 15px;position: absolute;color:#f5707a">{{ $error }}</span>
                    @endforeach
                </div>

            </fieldset>

            <fieldset class="m-t-50">
                <legend>بيانات العمل : </legend>

                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">تصنيف عقد العمل</label>
                    <select class="form-control" id="" name="classificationEmpContract">
                        @if ($employeeOfficers->classificationEmpContract == '/' || $employeeOfficers->classificationEmpContract == '')
                            <option value="/" selected> -- اختر -- </option>
                            <option value="تعيين">تعيين</option>
                            <option value="عقد عمل">عقد عمل</option>
                        @elseif ($employeeOfficers->classificationEmpContract == 'تعيين')
                            <option value="/"> -- اختر -- </option>
                            <option value="تعيين" selected>تعيين</option>
                            <option value="عقد عمل">عقد عمل</option>
                        @elseif ($employeeOfficers->classificationEmpContract == 'عقد عمل')
                            <option value="/"> -- اختر -- </option>
                            <option value="تعيين">تعيين</option>
                            <option value="عقد عمل" selected>عقد عمل</option>
                        @endif
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">تاريخ التعيين</label>
                    <input type="date" class="form-control" name="hiringDate"
                        value="{{ $employeeOfficers->hiringDate }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">قرار التعيين</label>
                    <input type="text" class="form-control" name="appointment_decision"
                        value="{{ $employeeOfficers->appointment_decision }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">تاريخ المباشره</label>
                    <input type="date" class="form-control" name="startJopDate"
                        value="{{ $employeeOfficers->startJopDate }}">
                </div>

                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">رقم قيد العقد</label>
                    <input type="text" class="form-control" name="Contract_registrationNo"
                        value="{{ $employeeOfficers->Contract_registrationNo }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="current_grade">الدرجة الحاليه</label>
                    <input id="current_grade" type="text" class="form-control" name="current_grade"
                        value="{{ $employeeOfficers->current_grade }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="current_grade_date">تاريخ الحصول عليها</label>
                    <input id="current_grade_date" type="date" class="form-control" name="current_grade_date"
                        value="{{ $employeeOfficers->current_grade_date }}">
                    @foreach ($errors->get('current_grade_date') as $error)
                        <span style="font-size: 15px;position: absolute;color:#f5707a">{{ $error }}</span>
                    @endforeach
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">تاريخ آخر قرار ترقيه</label>
                    <input type="date" class="form-control" name="lastPromotion"
                        value="{{ $employeeOfficers->lastPromotion }}">
                </div>

                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">الدورات المتحصل عليها</label>
                    <input type="text" class="form-control" name="courses_obtained"
                        value="{{ $employeeOfficers->courses_obtained }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">الاجازات</label>
                    <input type="text" class="form-control" name="vacations"
                        value="{{ $employeeOfficers->vacations }}">
                </div>

                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">المؤهل العلمي</label>
                    <select class="form-control" id="" name="qualification">
                        @if ($employeeOfficers->qualification == '/' || $employeeOfficers->qualification == '')
                            <option value="/" selected> -- اختر -- </option>
                            <option value="دكتوراء">دكتوراء</option>
                            <option value="ماجستير">ماجستير</option>
                            <option value="باكالوريوس">باكالوريوس</option>
                            <option value="معهد عالي">معهد عالي</option>
                            <option value="معهد متوسط">معهد متوسط</option>
                            <option value="ثانوي">ثانوي</option>
                            <option value="اعدادي">اعدادي</option>
                        @elseif ($employeeOfficers->qualification == 'دكتوراء')
                            <option value="/"> -- اختر -- </option>
                            <option value="دكتوراء" selected>دكتوراء</option>
                            <option value="ماجستير">ماجستير</option>
                            <option value="باكالوريوس">باكالوريوس</option>
                            <option value="معهد عالي">معهد عالي</option>
                            <option value="معهد متوسط">معهد متوسط</option>
                            <option value="ثانوي">ثانوي</option>
                            <option value="اعدادي">اعدادي</option>
                        @elseif ($employeeOfficers->qualification == 'ماجستير')
                            <option value="/"> -- اختر -- </option>
                            <option value="دكتوراء">دكتوراء</option>
                            <option value="ماجستير" selected>ماجستير</option>
                            <option value="باكالوريوس">باكالوريوس</option>
                            <option value="معهد عالي">معهد عالي</option>
                            <option value="معهد متوسط">معهد متوسط</option>
                            <option value="ثانوي">ثانوي</option>
                            <option value="اعدادي">اعدادي</option>
                        @elseif ($employeeOfficers->qualification == 'باكالوريوس')
                            <option value="/"> -- اختر -- </option>
                            <option value="دكتوراء">دكتوراء</option>
                            <option value="ماجستير">ماجستير</option>
                            <option value="باكالوريوس" selected>باكالوريوس</option>
                            <option value="معهد عالي">معهد عالي</option>
                            <option value="معهد متوسط">معهد متوسط</option>
                            <option value="ثانوي">ثانوي</option>
                            <option value="اعدادي">اعدادي</option>
                        @elseif ($employeeOfficers->qualification == 'معهد عالي')
                            <option value="/"> -- اختر -- </option>
                            <option value="دكتوراء">دكتوراء</option>
                            <option value="ماجستير">ماجستير</option>
                            <option value="باكالوريوس">باكالوريوس</option>
                            <option value="معهد عالي" selected>معهد عالي</option>
                            <option value="معهد متوسط">معهد متوسط</option>
                            <option value="ثانوي">ثانوي</option>
                            <option value="اعدادي">اعدادي</option>
                        @elseif ($employeeOfficers->qualification == 'معهد متوسط')
                            <option value="/"> -- اختر -- </option>
                            <option value="دكتوراء">دكتوراء</option>
                            <option value="ماجستير">ماجستير</option>
                            <option value="باكالوريوس">باكالوريوس</option>
                            <option value="معهد عالي">معهد عالي</option>
                            <option value="معهد متوسط" selected>معهد متوسط</option>
                            <option value="ثانوي">ثانوي</option>
                            <option value="اعدادي">اعدادي</option>
                        @elseif ($employeeOfficers->qualification == 'ثانوي')
                            <option value="/"> -- اختر -- </option>
                            <option value="دكتوراء">دكتوراء</option>
                            <option value="ماجستير">ماجستير</option>
                            <option value="باكالوريوس">باكالوريوس</option>
                            <option value="معهد عالي">معهد عالي</option>
                            <option value="معهد متوسط">معهد متوسط</option>
                            <option value="ثانوي" selected>ثانوي</option>
                            <option value="اعدادي">اعدادي</option>
                        @elseif ($employeeOfficers->qualification == 'اعدادي')
                            <option value="/"> -- اختر -- </option>
                            <option value="دكتوراء">دكتوراء</option>
                            <option value="ماجستير">ماجستير</option>
                            <option value="باكالوريوس">باكالوريوس</option>
                            <option value="معهد عالي">معهد عالي</option>
                            <option value="معهد متوسط">معهد متوسط</option>
                            <option value="ثانوي" selected>ثانوي</option>
                            <option value="اعدادي">اعدادي</option>
                        @endif
                    </select>
                </div>

                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">التخصص</label>
                    <input type="text" class="form-control" name="specialization"
                        value="{{ $employeeOfficers->specialization }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">مكان التخرج</label>
                    <input type="text" class="form-control" name="graduationPlace"
                        value="{{ $employeeOfficers->graduationPlace }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="">تاريخ التخرج</label>
                    <input id="" type="date" class="form-control" name="graduationDate"
                        value="{{ $employeeOfficers->graduationDate }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">جهة العمل</label>
                    <input type="text" class="form-control" name="workplace"
                        value="{{ $employeeOfficers->workplace }}">
                </div>
                {{-- <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">التنسيب</label>
                    <input type="text" class="form-control" name="placement"
                        value="{{ $employeeOfficers->placement }}">
                </div> --}}

                <div class="form-group col-md-4">
                    <label for="exampleInputPassword1">ملاحظات</label>
                    <textarea name="notes" class="form-control" cols="30" rows="5"
                        value="{{ $employeeOfficers->notes }}"></textarea>
                </div>


            </fieldset>
            <fieldset class="m-t-50">
                <legend>اضافه الى قائمه : </legend>

                <div class="body_switch">
                    <p class="checkbox__textwrapper"> &nbsp; هارب &nbsp;&nbsp;</p>

                    <div class="toggle-container">

                        @if ($employeeOfficers->fleeing == 'on')
                            <input class="toggle-input" type="checkbox" name="fleeing" checked>
                        @elseif($employeeOfficers->fleeing == 'off')
                            <input class="toggle-input" type="checkbox" name="fleeing">
                        @endif

                        <svg class="toggle" viewBox="0 0 292 142" xmlns="http://www.w3.org/2000/svg">
                            <path class="toggle-background"
                                d="M71 142C31.7878 142 0 110.212 0 71C0 31.7878 31.7878 0 71 0C110.212 0 119 30 146 30C173 30 182 0 221 0C260 0 292 31.7878 292 71C292 110.212 260.212 142 221 142C181.788 142 173 112 146 112C119 112 110.212 142 71 142Z" />
                            <rect class="toggle-icon on" x="64" y="39" width="12" height="64"
                                rx="6" />
                            <path class="toggle-icon off" fill-rule="evenodd"
                                d="M221 91C232.046 91 241 82.0457 241 71C241 59.9543 232.046 51 221 51C209.954 51 201 59.9543 201 71C201 82.0457 209.954 91 221 91ZM221 103C238.673 103 253 88.6731 253 71C253 53.3269 238.673 39 221 39C203.327 39 189 53.3269 189 71C189 88.6731 203.327 103 221 103Z" />
                            <g filter="url('#goo')">
                                <rect class="toggle-circle-center" x="12" y="42" width="116" height="58"
                                    rx="29" fill="#fff" />
                                <rect class="toggle-circle left" x="14" y="14" width="114" height="114"
                                    rx="58" fill="#fff" />
                                <rect class="toggle-circle right" x="164" y="14" width="114" height="114"
                                    rx="58" fill="#fff" />
                            </g>
                            <filter id="goo">
                                <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10" />
                                <feColorMatrix in="blur" mode="matrix"
                                    values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
                            </filter>
                        </svg>
                    </div>
                </div>
                <div class="body_switch">
                    <p class="checkbox__textwrapper"> &nbsp; منقطع &nbsp;&nbsp;</p>

                    <div class="toggle-container">

                        @if ($employeeOfficers->stopping == 'on')
                            <input class="toggle-input" type="checkbox" name="stopping" checked>
                        @elseif($employeeOfficers->stopping == 'off')
                            <input class="toggle-input" type="checkbox" name="stopping">
                        @endif

                        <svg class="toggle" viewBox="0 0 292 142" xmlns="http://www.w3.org/2000/svg">
                            <path class="toggle-background"
                                d="M71 142C31.7878 142 0 110.212 0 71C0 31.7878 31.7878 0 71 0C110.212 0 119 30 146 30C173 30 182 0 221 0C260 0 292 31.7878 292 71C292 110.212 260.212 142 221 142C181.788 142 173 112 146 112C119 112 110.212 142 71 142Z" />
                            <rect class="toggle-icon on" x="64" y="39" width="12" height="64"
                                rx="6" />
                            <path class="toggle-icon off" fill-rule="evenodd"
                                d="M221 91C232.046 91 241 82.0457 241 71C241 59.9543 232.046 51 221 51C209.954 51 201 59.9543 201 71C201 82.0457 209.954 91 221 91ZM221 103C238.673 103 253 88.6731 253 71C253 53.3269 238.673 39 221 39C203.327 39 189 53.3269 189 71C189 88.6731 203.327 103 221 103Z" />
                            <g filter="url('#goo')">
                                <rect class="toggle-circle-center" x="12" y="42" width="116" height="58"
                                    rx="29" fill="#fff" />
                                <rect class="toggle-circle left" x="14" y="14" width="114" height="114"
                                    rx="58" fill="#fff" />
                                <rect class="toggle-circle right" x="164" y="14" width="114" height="114"
                                    rx="58" fill="#fff" />
                            </g>
                            <filter id="goo">
                                <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10" />
                                <feColorMatrix in="blur" mode="matrix"
                                    values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
                            </filter>
                        </svg>
                    </div>
                </div>
                <div class="body_switch">
                    <p class="checkbox__textwrapper"> &nbsp; متقاعد &nbsp;&nbsp;</p>

                    <div class="toggle-container">
                        @if ($employeeOfficers->retired == 'on')
                            <input class="toggle-input" type="checkbox" name="retired" checked>
                        @elseif($employeeOfficers->retired == 'off')
                            <input class="toggle-input" type="checkbox" name="retired">
                        @endif

                        <svg class="toggle" viewBox="0 0 292 142" xmlns="http://www.w3.org/2000/svg">
                            <path class="toggle-background"
                                d="M71 142C31.7878 142 0 110.212 0 71C0 31.7878 31.7878 0 71 0C110.212 0 119 30 146 30C173 30 182 0 221 0C260 0 292 31.7878 292 71C292 110.212 260.212 142 221 142C181.788 142 173 112 146 112C119 112 110.212 142 71 142Z" />
                            <rect class="toggle-icon on" x="64" y="39" width="12" height="64"
                                rx="6" />
                            <path class="toggle-icon off" fill-rule="evenodd"
                                d="M221 91C232.046 91 241 82.0457 241 71C241 59.9543 232.046 51 221 51C209.954 51 201 59.9543 201 71C201 82.0457 209.954 91 221 91ZM221 103C238.673 103 253 88.6731 253 71C253 53.3269 238.673 39 221 39C203.327 39 189 53.3269 189 71C189 88.6731 203.327 103 221 103Z" />
                            <g filter="url('#goo')">
                                <rect class="toggle-circle-center" x="12" y="42" width="116" height="58"
                                    rx="29" fill="#fff" />
                                <rect class="toggle-circle left" x="14" y="14" width="114" height="114"
                                    rx="58" fill="#fff" />
                                <rect class="toggle-circle right" x="164" y="14" width="114" height="114"
                                    rx="58" fill="#fff" />
                            </g>
                            <filter id="goo">
                                <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10" />
                                <feColorMatrix in="blur" mode="matrix"
                                    values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
                            </filter>
                        </svg>
                    </div>
                </div>
                <div class="body_switch">
                    <p class="checkbox__textwrapper"> &nbsp; محكوم &nbsp;&nbsp;</p>

                    <div class="toggle-container">
                        @if ($employeeOfficers->doomed == 'on')
                            <input class="toggle-input" type="checkbox" name="doomed" checked>
                        @elseif($employeeOfficers->doomed == 'off')
                            <input class="toggle-input" type="checkbox" name="doomed">
                        @endif

                        <svg class="toggle" viewBox="0 0 292 142" xmlns="http://www.w3.org/2000/svg">
                            <path class="toggle-background"
                                d="M71 142C31.7878 142 0 110.212 0 71C0 31.7878 31.7878 0 71 0C110.212 0 119 30 146 30C173 30 182 0 221 0C260 0 292 31.7878 292 71C292 110.212 260.212 142 221 142C181.788 142 173 112 146 112C119 112 110.212 142 71 142Z" />
                            <rect class="toggle-icon on" x="64" y="39" width="12" height="64"
                                rx="6" />
                            <path class="toggle-icon off" fill-rule="evenodd"
                                d="M221 91C232.046 91 241 82.0457 241 71C241 59.9543 232.046 51 221 51C209.954 51 201 59.9543 201 71C201 82.0457 209.954 91 221 91ZM221 103C238.673 103 253 88.6731 253 71C253 53.3269 238.673 39 221 39C203.327 39 189 53.3269 189 71C189 88.6731 203.327 103 221 103Z" />
                            <g filter="url('#goo')">
                                <rect class="toggle-circle-center" x="13" y="42" width="116" height="58"
                                    rx="29" fill="#fff" />
                                <rect class="toggle-circle left" x="14" y="14" width="114" height="114"
                                    rx="58" fill="#fff" />
                                <rect class="toggle-circle right" x="164" y="14" width="114" height="114"
                                    rx="58" fill="#fff" />
                            </g>
                            <filter id="goo">
                                <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10" />
                                <feColorMatrix in="blur" mode="matrix"
                                    values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
                            </filter>
                        </svg>
                    </div>
                </div>
                <div class="body_switch">
                    <p class="checkbox__textwrapper"> &nbsp;&nbsp; ندب &nbsp;&nbsp;</p>

                    <div class="toggle-container">
                        @if ($employeeOfficers->mandate == 'on')
                            <input class="toggle-input" type="checkbox" name="mandate" checked>
                        @elseif($employeeOfficers->mandate == 'off')
                            <input class="toggle-input" type="checkbox" name="mandate">
                        @endif

                        <svg class="toggle" viewBox="0 0 292 142" xmlns="http://www.w3.org/2000/svg">
                            <path class="toggle-background"
                                d="M71 142C31.7878 142 0 110.212 0 71C0 31.7878 31.7878 0 71 0C110.212 0 119 30 146 30C173 30 182 0 221 0C260 0 292 31.7878 292 71C292 110.212 260.212 142 221 142C181.788 142 173 112 146 112C119 112 110.212 142 71 142Z" />
                            <rect class="toggle-icon on" x="64" y="39" width="12" height="64"
                                rx="6" />
                            <path class="toggle-icon off" fill-rule="evenodd"
                                d="M221 91C232.046 91 241 82.0457 241 71C241 59.9543 232.046 51 221 51C209.954 51 201 59.9543 201 71C201 82.0457 209.954 91 221 91ZM221 103C238.673 103 253 88.6731 253 71C253 53.3269 238.673 39 221 39C203.327 39 189 53.3269 189 71C189 88.6731 203.327 103 221 103Z" />
                            <g filter="url('#goo')">
                                <rect class="toggle-circle-center" x="13" y="42" width="116" height="58"
                                    rx="29" fill="#fff" />
                                <rect class="toggle-circle left" x="14" y="14" width="114" height="114"
                                    rx="58" fill="#fff" />
                                <rect class="toggle-circle right" x="164" y="14" width="114" height="114"
                                    rx="58" fill="#fff" />
                            </g>
                            <filter id="goo">
                                <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10" />
                                <feColorMatrix in="blur" mode="matrix"
                                    values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
                            </filter>
                        </svg>
                    </div>
                </div>
            </fieldset>
            <div class="w-full h-40 flex items-center justify-center">
                <button type="submit"
                    class="relative inline-flex items-center justify-center p-4 px-6 py-3 overflow-hidden font-medium text-indigo-600 transition duration-300 ease-out border-2 border-success rounded-full shadow-md group">
                    <span
                        class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 -translate-x-full bg-success group-hover:translate-x-0 ease">

                        <img width="30" height="30"
                            src="https://img.icons8.com/sf-regular/48/FFFFFF/edit-user-male.png"
                            alt="add-user-male" /> </span>
                    <span
                        class="absolute flex items-center justify-center w-full h-full text-success transition-all duration-300 transform group-hover:translate-x-full ease">تعديل
                    </span>
                    <span class="relative invisible">Button</span>
                </button>
            </div>
            {{-- <button type="submit" class="btn btn-success waves-effect waves-light m-r-0 btn-md">تعديل</button> --}}
        </form>

    </div>

    <!-- end row -->

</div>

</div>


@endsection

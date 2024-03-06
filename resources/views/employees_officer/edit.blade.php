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
                    <label for="exampleInputEmail1">الاسم رباعي</label>
                    <input type="text" class="form-control" name="full_name"
                        value="{{ $employeeOfficers->full_name }}">
                    @foreach ($errors->get('full_name') as $error)
                        <span style="font-size: 15px;position: absolute;color:#f5707a">{{ $error }}</span>
                    @endforeach
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">الرتبة</label>
                    <select class="form-control" id="" name="Rank">
                        @if ($employeeOfficers->Rank == '/')
                            <option value="/" selected> -- اختر -- </option>
                            <option value="اللواء">اللواء</option>
                            <option value="عميد">عميد</option>
                            <option value="عقيد">عقيد</option>
                            <option value="رائد">رائد</option>
                            <option value="نقيب">نقيب</option>
                            <option value="ملازم أول">ملازم أول </option>
                            <option value="ملازم ثاني">ملازم ثاني</option>
                            <option value="رئيس عرفه سريه">رئيس عرفه سريه</option>
                            <option value="رئيس عرفه وحدة">رئيس عرفه وحدة</option>
                            <option value="عريف">عريف</option>
                            <option value="نائب عريف">نائب عريف</option>
                            <option value="جندي">جندي</option>
                            <option value="جندي أول">جندي أول </option>
                        @elseif ($employeeOfficers->Rank == 'اللواء')
                            <option value="/"> -- اختر -- </option>
                            <option value="اللواء" selected>اللواء</option>
                            <option value="عميد">عميد</option>
                            <option value="عقيد">عقيد</option>
                            <option value="رائد">رائد</option>
                            <option value="نقيب">نقيب</option>
                            <option value="ملازم أول">ملازم أول </option>
                            <option value="ملازم ثاني">ملازم ثاني</option>
                            <option value="رئيس عرفه سريه">رئيس عرفه سريه</option>
                            <option value="رئيس عرفه وحدة">رئيس عرفه وحدة</option>
                            <option value="عريف">عريف</option>
                            <option value="نائب عريف">نائب عريف</option>
                            <option value="جندي">جندي</option>
                            <option value="جندي أول">جندي أول </option>
                        @elseif ($employeeOfficers->Rank == 'عميد')
                            <option value="/"> -- اختر -- </option>
                            <option value="اللواء">اللواء</option>
                            <option value="عميد" selected>عميد</option>
                            <option value="عقيد">عقيد</option>
                            <option value="رائد">رائد</option>
                            <option value="نقيب">نقيب</option>
                            <option value="ملازم أول">ملازم أول </option>
                            <option value="ملازم ثاني">ملازم ثاني</option>
                            <option value="رئيس عرفه سريه">رئيس عرفه سريه</option>
                            <option value="رئيس عرفه وحدة">رئيس عرفه وحدة</option>
                            <option value="عريف">عريف</option>
                            <option value="نائب عريف">نائب عريف</option>
                            <option value="جندي">جندي</option>
                            <option value="جندي أول">جندي أول </option>
                        @elseif ($employeeOfficers->Rank == 'عقيد')
                            <option value="/"> -- اختر -- </option>
                            <option value="اللواء">اللواء</option>
                            <option value="عميد">عميد</option>
                            <option value="عقيد" selected>عقيد</option>
                            <option value="رائد">رائد</option>
                            <option value="نقيب">نقيب</option>
                            <option value="ملازم أول">ملازم أول </option>
                            <option value="ملازم ثاني">ملازم ثاني</option>
                            <option value="رئيس عرفه سريه">رئيس عرفه سريه</option>
                            <option value="رئيس عرفه وحدة">رئيس عرفه وحدة</option>
                            <option value="عريف">عريف</option>
                            <option value="نائب عريف">نائب عريف</option>
                            <option value="جندي">جندي</option>
                            <option value="جندي أول">جندي أول </option>
                        @elseif ($employeeOfficers->Rank == 'رائد')
                            <option value="/"> -- اختر -- </option>
                            <option value="اللواء">اللواء</option>
                            <option value="عميد">عميد</option>
                            <option value="عقيد">عقيد</option>
                            <option value="رائد" selected>رائد</option>
                            <option value="نقيب">نقيب</option>
                            <option value="ملازم أول">ملازم أول </option>
                            <option value="ملازم ثاني">ملازم ثاني</option>
                            <option value="رئيس عرفه سريه">رئيس عرفه سريه</option>
                            <option value="رئيس عرفه وحدة">رئيس عرفه وحدة</option>
                            <option value="عريف">عريف</option>
                            <option value="نائب عريف">نائب عريف</option>
                            <option value="جندي">جندي</option>
                            <option value="جندي أول">جندي أول </option>
                        @elseif ($employeeOfficers->Rank == 'نقيب')
                            <option value="/"> -- اختر -- </option>
                            <option value="اللواء">اللواء</option>
                            <option value="عميد">عميد</option>
                            <option value="عقيد">عقيد</option>
                            <option value="رائد">رائد</option>
                            <option value="نقيب" selected>نقيب</option>
                            <option value="ملازم أول">ملازم أول </option>
                            <option value="ملازم ثاني">ملازم ثاني</option>
                            <option value="رئيس عرفه سريه">رئيس عرفه سريه</option>
                            <option value="رئيس عرفه وحدة">رئيس عرفه وحدة</option>
                            <option value="عريف">عريف</option>
                            <option value="نائب عريف">نائب عريف</option>
                            <option value="جندي">جندي</option>
                            <option value="جندي أول">جندي أول </option>
                        @elseif ($employeeOfficers->Rank == 'ملازم أول')
                            <option value="/"> -- اختر -- </option>
                            <option value="اللواء">اللواء</option>
                            <option value="عميد">عميد</option>
                            <option value="عقيد">عقيد</option>
                            <option value="رائد">رائد</option>
                            <option value="نقيب">نقيب</option>
                            <option value="ملازم أول" selected>ملازم أول </option>
                            <option value="ملازم ثاني">ملازم ثاني</option>
                            <option value="رئيس عرفه سريه">رئيس عرفه سريه</option>
                            <option value="رئيس عرفه وحدة">رئيس عرفه وحدة</option>
                            <option value="عريف">عريف</option>
                            <option value="نائب عريف">نائب عريف</option>
                            <option value="جندي">جندي</option>
                            <option value="جندي أول">جندي أول </option>
                        @elseif ($employeeOfficers->Rank == 'ملازم ثاني')
                            <option value="/"> -- اختر -- </option>
                            <option value="اللواء">اللواء</option>
                            <option value="عميد">عميد</option>
                            <option value="عقيد">عقيد</option>
                            <option value="رائد">رائد</option>
                            <option value="نقيب">نقيب</option>
                            <option value="ملازم أول">ملازم أول </option>
                            <option value="ملازم ثاني" selected>ملازم ثاني</option>
                            <option value="رئيس عرفه سريه">رئيس عرفه سريه</option>
                            <option value="رئيس عرفه وحدة">رئيس عرفه وحدة</option>
                            <option value="عريف">عريف</option>
                            <option value="نائب عريف">نائب عريف</option>
                            <option value="جندي">جندي</option>
                            <option value="جندي أول">جندي أول </option>
                        @elseif ($employeeOfficers->Rank == 'رئيس عرفه سرسه')
                            <option value="/"> -- اختر -- </option>
                            <option value="اللواء">اللواء</option>
                            <option value="عميد">عميد</option>
                            <option value="عقيد">عقيد</option>
                            <option value="رائد">رائد</option>
                            <option value="نقيب">نقيب</option>
                            <option value="ملازم أول">ملازم أول </option>
                            <option value="ملازم ثاني">ملازم ثاني</option>
                            <option value="رئيس عرفه سريه" selected>رئيس عرفه سريه</option>
                            <option value="رئيس عرفه وحدة">رئيس عرفه وحدة</option>
                            <option value="عريف">عريف</option>
                            <option value="نائب عريف">نائب عريف</option>
                            <option value="جندي">جندي</option>
                            <option value="جندي أول">جندي أول </option>
                        @elseif ($employeeOfficers->Rank == 'رئيس عرفه وحدة')
                            <option value="/"> -- اختر -- </option>
                            <option value="اللواء">اللواء</option>
                            <option value="عميد">عميد</option>
                            <option value="عقيد">عقيد</option>
                            <option value="رائد">رائد</option>
                            <option value="نقيب">نقيب</option>
                            <option value="ملازم أول">ملازم أول </option>
                            <option value="ملازم ثاني">ملازم ثاني</option>
                            <option value="رئيس عرفه سريه">رئيس عرفه سريه</option>
                            <option value="رئيس عرفه وحدة" selected>رئيس عرفه وحدة</option>
                            <option value="عريف">عريف</option>
                            <option value="نائب عريف">نائب عريف</option>
                            <option value="جندي">جندي</option>
                            <option value="جندي أول">جندي أول </option>
                        @elseif ($employeeOfficers->Rank == 'عريف')
                            <option value="/"> -- اختر -- </option>
                            <option value="اللواء">اللواء</option>
                            <option value="عميد">عميد</option>
                            <option value="عقيد">عقيد</option>
                            <option value="رائد">رائد</option>
                            <option value="نقيب">نقيب</option>
                            <option value="ملازم أول">ملازم أول </option>
                            <option value="ملازم ثاني">ملازم ثاني</option>
                            <option value="رئيس عرفه سريه">رئيس عرفه سريه</option>
                            <option value="رئيس عرفه وحدة">رئيس عرفه وحدة</option>
                            <option value="عريف" selected>عريف</option>
                            <option value="نائب عريف">نائب عريف</option>
                            <option value="جندي">جندي</option>
                            <option value="جندي أول">جندي أول </option>
                        @elseif ($employeeOfficers->Rank == 'نائب عريف')
                            <option value="/"> -- اختر -- </option>
                            <option value="اللواء">اللواء</option>
                            <option value="عميد">عميد</option>
                            <option value="عقيد">عقيد</option>
                            <option value="رائد">رائد</option>
                            <option value="نقيب">نقيب</option>
                            <option value="ملازم أول">ملازم أول </option>
                            <option value="ملازم ثاني">ملازم ثاني</option>
                            <option value="رئيس عرفه سريه">رئيس عرفه سريه</option>
                            <option value="رئيس عرفه وحدة">رئيس عرفه وحدة</option>
                            <option value="عريف">عريف</option>
                            <option value="نائب عريف" selected>نائب عريف</option>
                            <option value="جندي">جندي</option>
                            <option value="جندي أول">جندي أول </option>
                        @elseif ($employeeOfficers->Rank == 'جندي')
                            <option value="/"> -- اختر -- </option>
                            <option value="اللواء">اللواء</option>
                            <option value="عميد">عميد</option>
                            <option value="عقيد">عقيد</option>
                            <option value="رائد">رائد</option>
                            <option value="نقيب">نقيب</option>
                            <option value="ملازم أول">ملازم أول </option>
                            <option value="ملازم ثاني">ملازم ثاني</option>
                            <option value="رئيس عرفه سريه">رئيس عرفه سريه</option>
                            <option value="رئيس عرفه وحدة">رئيس عرفه وحدة</option>
                            <option value="عريف">عريف</option>
                            <option value="نائب عريف">نائب عريف</option>
                            <option value="جندي" selected>جندي</option>
                            <option value="جندي أول">جندي أول </option>
                        @elseif ($employeeOfficers->Rank == 'جندي أول')
                            <option value="/"> -- اختر -- </option>
                            <option value="اللواء">اللواء</option>
                            <option value="عميد">عميد</option>
                            <option value="عقيد">عقيد</option>
                            <option value="رائد">رائد</option>
                            <option value="نقيب">نقيب</option>
                            <option value="ملازم أول">ملازم أول </option>
                            <option value="ملازم ثاني">ملازم ثاني</option>
                            <option value="رئيس عرفه سريه">رئيس عرفه سريه</option>
                            <option value="رئيس عرفه وحدة">رئيس عرفه وحدة</option>
                            <option value="عريف">عريف</option>
                            <option value="نائب عريف">نائب عريف</option>
                            <option value="جندي">جندي</option>
                            <option value="جندي أول" selected>جندي أول </option>
                        @endif
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">اسم الأم ثلاثي</label>
                    <input type="text" class="form-control" name="familyHandbook_No"
                        value="{{ $employeeOfficers->familyHandbook_No }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">الرقم الوطني</label>
                    <input type="number" class="form-control" name="national_no"
                        value="{{ $employeeOfficers->national_no }}">
                    @foreach ($errors->get('national_no') as $error)
                        <span style="font-size: 15px;position: absolute;color:#f5707a">{{ $error }}</span>
                    @endforeach
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
                        @elseif ($employeeOfficers->blood_t == '/')
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
                        @if ($employeeOfficers->marital_status == '/')
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
                <div class="form-group col-md-2">
                    <label for="exampleInputEmail1">رقم الهاتف</label>
                    <input type="number" class="form-control" name="phone_n"
                        value="{{ $employeeOfficers->phone_n }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">رقم جواز السفر أو البطاقه الشخصيه</label>
                    <select class="form-control" id="" name="passport_or_card">
                        @if ($employeeOfficers->passport_or_card == '/')
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
                    <input type="number" class="form-control" name="passport"
                        value="{{ $employeeOfficers->passport }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">تاريخ الاصدار</label>
                    <input type="date" class="form-control" name="passport_releaseDate"
                        value="{{ $employeeOfficers->passport_releaseDate }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">مكان الاصدار</label>
                    <input type="text" class="form-control" name="passport_placeOfissue"
                        value="{{ $employeeOfficers->passport_placeOfissue }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">رقم قيد العائله</label>
                    <input type="text" class="form-control" name="familyRegistration_No"
                        value="{{ $employeeOfficers->familyRegistration_No }}">
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
                </div>

                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">أقرب الأقارب</label>
                    <input type="text" class="form-control" name="closest_relatives"
                        value="{{ $employeeOfficers->closest_relatives }}">
                </div>
                <div class="form-group col-md-2">
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


                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">المصرف</label>
                    <select class="form-control" name="bankName_id">
                        @if ($employeeOfficers->bankName_id == '/')
                            <option value="/" selected> -- اختر -- </option>
                            <option value="الجمهوريه">الجمهوريه</option>
                            <option value="الوحدة">الوحدة</option>
                            <option value="شمال أفريقيا">شمال أفريقيا</option>
                            <option value="اليقين">اليقين</option>
                            <option value="النوران">النوران</option>
                            <option value="الأمان">الأمان</option>
                        @elseif ($employeeOfficers->bankName_id == 'الجمهوريه')
                            <option value="/"> -- اختر -- </option>
                            <option value="الجمهوريه" selected>الجمهوريه</option>
                            <option value="الوحدة">الوحدة</option>
                            <option value="شمال أفريقيا">شمال أفريقيا</option>
                            <option value="اليقين">اليقين</option>
                            <option value="النوران">النوران</option>
                            <option value="الأمان">الأمان</option>
                        @elseif ($employeeOfficers->bankName_id == 'الوحدة')
                            <option value="/"> -- اختر -- </option>
                            <option value="الجمهوريه">الجمهوريه</option>
                            <option value="الوحدة" selected>الوحدة</option>
                            <option value="شمال أفريقيا">شمال أفريقيا</option>
                            <option value="اليقين">اليقين</option>
                            <option value="النوران">النوران</option>
                            <option value="الأمان">الأمان</option>
                        @elseif ($employeeOfficers->bankName_id == 'شمال أفريقيا')
                            <option value="/"> -- اختر -- </option>
                            <option value="الجمهوريه">الجمهوريه</option>
                            <option value="الوحدة">الوحدة</option>
                            <option value="شمال أفريقيا" selected>شمال أفريقيا</option>
                            <option value="اليقين">اليقين</option>
                            <option value="النوران">النوران</option>
                            <option value="الأمان">الأمان</option>
                        @elseif ($employeeOfficers->bankName_id == 'اليقين')
                            <option value="/"> -- اختر -- </option>
                            <option value="الجمهوريه">الجمهوريه</option>
                            <option value="الوحدة">الوحدة</option>
                            <option value="شمال أفريقيا">شمال أفريقيا</option>
                            <option value="اليقين" selected>اليقين</option>
                            <option value="النوران">النوران</option>
                            <option value="الأمان">الأمان</option>
                        @elseif ($employeeOfficers->bankName_id == 'النوران')
                            <option value="/"> -- اختر -- </option>
                            <option value="الجمهوريه">الجمهوريه</option>
                            <option value="الوحدة">الوحدة</option>
                            <option value="شمال أفريقيا">شمال أفريقيا</option>
                            <option value="اليقين">اليقين</option>
                            <option value="النوران" selected>النوران</option>
                            <option value="الأمان">الأمان</option>
                        @elseif ($employeeOfficers->bankName_id == 'الأمان')
                            <option value="/"> -- اختر -- </option>
                            <option value="الجمهوريه">الجمهوريه</option>
                            <option value="الوحدة">الوحدة</option>
                            <option value="شمال أفريقيا">شمال أفريقيا</option>
                            <option value="اليقين">اليقين</option>
                            <option value="النوران">النوران</option>
                            <option value="الأمان" selected>الأمان</option>
                        @endif
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">الفرع</label>
                    <input type="text" class="form-control" name="bankBranch_id"
                        value="{{ $employeeOfficers->bankBranch_id }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">رقم الحساب</label>
                    <input type="text" class="form-control" name="bank_accountNo"
                        value="{{ $employeeOfficers->bank_accountNo }}">
                    @foreach ($errors->get('bank_accountNo') as $error)
                        <span style="font-size: 15px;position: absolute;color:#f5707a">{{ $error }}</span>
                    @endforeach
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">الرقم المالي</label>
                    <input type="text" class="form-control" name="military_number"
                        value="{{ $employeeOfficers->military_number }}">
                    @foreach ($errors->get('military_number') as $error)
                        <span style="font-size: 15px;position: absolute;color:#f5707a">{{ $error }}</span>
                    @endforeach
                </div>

            </fieldset>

            <fieldset class="m-t-50">
                <legend>بيانات العمل : </legend>


                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">اسم الوحدة</label>
                    <input type="text" class="form-control" name="unitName"
                        value="{{ $employeeOfficers->unitName }}" disabled>
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1"> الوحدة الفرعية</label>
                    <input type="text" class="form-control" name="unitBranch_id"
                        value="{{ $employeeOfficers->unitBranch_id }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">تصنيف عقد العمل</label>
                    <select class="form-control" id="" name="classificationEmpContract">
                        @if ($employeeOfficers->classificationEmpContract == '/')
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
                    <label for="exampleInputPassword1">تاريخ آخر قرار ترقيه</label>
                    <input type="date" class="form-control" name="lastPromotion"
                        value="{{ $employeeOfficers->lastPromotion }}">
                </div>
                {{-- <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">الجهه المنتقل منها</label>
                    <input type="text" class="form-control" name="current_grade"
                        value="{{ $employeeOfficers->current_grade }}">
                </div> --}}
                {{-- <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">تاريخ النقل</label>
                    <input type="date" class="form-control" name="current_grade_date"
                        value="{{ $employeeOfficers->current_grade_date }}">
                </div> --}}
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
                {{-- <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">الراحة الطبيه</label>
                    <input type="text" class="form-control" name="medical_comfort"
                        value="{{ $employeeOfficers->medical_comfort }}">
                </div> --}}
                {{-- <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">التسويات</label>
                    <input type="text" class="form-control" name="altasweat"
                        value="{{ $employeeOfficers->altasweat }}">
                </div> --}}
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">المؤهل العلمي</label>
                    <select class="form-control" id="" name="qualification">
                        @if ($employeeOfficers->qualification == '/')
                            <option value="/" selected> -- اختر -- </option>
                            <option value="دكتوراء">دكتوراء</option>
                            <option value="ماجستير">ماجستير</option>
                            <option value="باكالوريوس">باكالوريوس</option>
                            <option value="معهد عالي">معهد عالي</option>
                            <option value="معهد متوسط">معهد متوسط</option>
                            <option value="ثانوي">ثانوي</option>
                        @elseif ($employeeOfficers->qualification == 'دكتوراء')
                            <option value="/"> -- اختر -- </option>
                            <option value="دكتوراء" selected>دكتوراء</option>
                            <option value="ماجستير">ماجستير</option>
                            <option value="باكالوريوس">باكالوريوس</option>
                            <option value="معهد عالي">معهد عالي</option>
                            <option value="معهد متوسط">معهد متوسط</option>
                            <option value="ثانوي">ثانوي</option>
                        @elseif ($employeeOfficers->qualification == 'ماجستير')
                            <option value="/"> -- اختر -- </option>
                            <option value="دكتوراء">دكتوراء</option>
                            <option value="ماجستير" selected>ماجستير</option>
                            <option value="باكالوريوس">باكالوريوس</option>
                            <option value="معهد عالي">معهد عالي</option>
                            <option value="معهد متوسط">معهد متوسط</option>
                            <option value="ثانوي">ثانوي</option>
                        @elseif ($employeeOfficers->qualification == 'باكالوريوس')
                            <option value="/"> -- اختر -- </option>
                            <option value="دكتوراء">دكتوراء</option>
                            <option value="ماجستير">ماجستير</option>
                            <option value="باكالوريوس" selected>باكالوريوس</option>
                            <option value="معهد عالي">معهد عالي</option>
                            <option value="معهد متوسط">معهد متوسط</option>
                            <option value="ثانوي">ثانوي</option>
                        @elseif ($employeeOfficers->qualification == 'معهد عالي')
                            <option value="/"> -- اختر -- </option>
                            <option value="دكتوراء">دكتوراء</option>
                            <option value="ماجستير">ماجستير</option>
                            <option value="باكالوريوس">باكالوريوس</option>
                            <option value="معهد عالي" selected>معهد عالي</option>
                            <option value="معهد متوسط">معهد متوسط</option>
                            <option value="ثانوي">ثانوي</option>
                        @elseif ($employeeOfficers->qualification == 'معهد متوسط')
                            <option value="/"> -- اختر -- </option>
                            <option value="دكتوراء">دكتوراء</option>
                            <option value="ماجستير">ماجستير</option>
                            <option value="باكالوريوس">باكالوريوس</option>
                            <option value="معهد عالي">معهد عالي</option>
                            <option value="معهد متوسط" selected>معهد متوسط</option>
                            <option value="ثانوي">ثانوي</option>
                        @elseif ($employeeOfficers->qualification == 'ثانوي')
                            <option value="/"> -- اختر -- </option>
                            <option value="دكتوراء">دكتوراء</option>
                            <option value="ماجستير">ماجستير</option>
                            <option value="باكالوريوس">باكالوريوس</option>
                            <option value="معهد عالي">معهد عالي</option>
                            <option value="معهد متوسط">معهد متوسط</option>
                            <option value="ثانوي" selected>ثانوي</option>
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
                    <label for="exampleInputPassword1">جهة العمل</label>
                    <input type="text" class="form-control" name="workplace"
                        value="{{ $employeeOfficers->workplace }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">التنسيب</label>
                    <input type="text" class="form-control" name="placement"
                        value="{{ $employeeOfficers->placement }}">
                </div>
                {{-- <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">تاريخ التنسيب</label>
                    <input type="date" class="form-control" name="graduationDate"
                        value="{{ $employeeOfficers->graduationDate }}">
                </div> --}}
                <div class="form-group col-md-4">
                    <label for="exampleInputPassword1">ملاحظات</label>
                    <textarea name="notes" class="form-control" cols="30" rows="5"
                        value="{{ $employeeOfficers->notes }}"></textarea>
                </div>


            </fieldset>
            <button type="submit" class="btn btn-success waves-effect waves-light m-r-0 btn-md">تعديل</button>
        </form>
    </div>

    <!-- end row -->

</div>

</div>


@endsection

@extends('layout.main')
@section('content')
@section('title_content_main')
    الضباط
@section('title_content_sub')
    اضافه ضابط
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
        <form action="{{ route('employeesofficer.store') }}" method="post">
            @csrf

            <fieldset class="m-t-50">
                <legend>البيانات الاساسيه : </legend>
                {{-- <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">رقم الملف</label>
                    <input type="text" class="form-control" name="fileNumber" >
                </div> --}}
                <div class="form-group col-md-2  m-b-30">
                    <label for="exampleInputEmail1">الاسم رباعي</label>
                    <input type="text" class="form-control" name="full_name" value="{{ old('full_name') }}">
                    {{-- @error('full_name')
                        <span class="" style="font-size: 15px;position: absolute;color:#f5707a">الرجاء ادخال اسم
                            الموظف</span>
                    @enderror --}}
                    @foreach ($errors->get('full_name') as $error)
                        <span style="font-size: 15px;position: absolute;color:#f5707a">{{ $error }}</span>
                    @endforeach
                </div>

                <div class="form-group col-md-2 m-b-30">
                    <label for="exampleInputPassword1">اسم الأم ثلاثي</label>
                    <input type="text" class="form-control" name="familyHandbook_No"
                        value="{{ old('familyHandbook_No') }}">
                </div>

                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1"> الرتبه</label>
                    <select class="form-control" id="" name="Rank">
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
                        <option value="جندي">جندي</option>
                    </select>
                </div>

                <div class="form-group col-md-2 m-b-30">
                    <label for="exampleInputPassword1">الرقم الوطني</label>
                    <input type="text" class="form-control" name="national_no" value="{{ old('national_no') }}">
                    @foreach ($errors->get('national_no') as $error)
                        <span style="font-size: 15px;position: absolute;color:#f5707a">{{ $error }}</span>
                    @endforeach
                    {{-- @error('national_no')
                        <span class="" style="font-size: 15px;position: absolute;color:#f5707a">الرجاء ادخال اسم
                            الموظف</span>
                    @enderror --}}
                </div>
                <div class="form-group col-md-2 m-b-30">
                    <label for="exampleInputEmail1">تاريخ الميلاد</label>
                    <input type="date" class="form-control" name="birth_d" value="{{ old('birth_d') }}">
                </div>
                <div class="form-group col-md-2 m-b-30">
                    <label for="exampleInputEmail1">مكان الميلاد</label>
                    <input type="text" class="form-control" name="place_birth" value="{{ old('place_birth') }}">
                </div>
                <div class="form-group col-md-2 m-b-30">
                    <label for="exampleInputPassword1">مكان الاقامه الحاليه</label>
                    <input type="text" class="form-control" name="place_residence"
                        value="{{ old('place_residence') }}">
                </div>
                <div class="form-group col-md-2 m-b-30">
                    <label for="exampleInputPassword1">أقرب نقطه داله</label>
                    <input type="text" class="form-control" name="closest_point"
                        value="{{ old('closest_point') }}">
                </div>
                <div class="form-group col-md-2 m-b-30">
                    <label for="exampleInputEmail1">الجنسية</label>
                    <input type="text" class="form-control" name="nationality" value="{{ old('nationality') }}">
                </div>
                <div class="form-group col-md-2 m-b-30">
                    <label for="exampleInputEmail1">الديانه</label>
                    <input type="text" class="form-control" name="religion" value="{{ old('religion') }}">
                </div>
                <div class="form-group col-md-2 m-b-30">
                    <label for="exampleInputEmail1">فصيله الدم</label>
                    <select class="form-control" id="" name="blood_t" value="{{ old('blood_t') }}">
                        <option value="/"> -- اختر -- </option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
                </div>
                <div class="form-group col-md-2 m-b-30">
                    <label for="exampleInputEmail1">الحاله الاجتماعيه</label>
                    <select class="form-control" id="" name="marital_status"
                        value="{{ old('marital_status') }}">
                        <option value=""> -- اختر -- </option>
                        <option value="متزوج">متزوج</option>
                        <option value="أعزب">أعزب</option>
                        <option value="أرملة">أرملة</option>
                    </select>
                </div>
                <div class="form-group col-md-2 m-b-30">
                    <label for="exampleInputEmail1">عدد الأبناء - الذكور</label>
                    <input type="text" class="form-control" name="sons" value="{{ old('sons') }}">
                </div>
                <div class="form-group col-md-2 m-b-30">
                    <label for="exampleInputEmail1">عدد الأبناء - الاناث</label>
                    <input type="text" class="form-control" name="daughter" value="{{ old('daughter') }}">
                </div>
                <div class="form-group col-md-2 m-b-30">
                    <label for="exampleInputEmail1">رقم الهاتف</label>
                    <input type="number" class="form-control" name="phone_n" value="{{ old('phone_n') }}">
                </div>
                <div class="form-group col-md-2 m-b-30">
                    <label for="exampleInputPassword1">رقم جواز السفر أو البطاقه الشخصيه</label>
                    <select class="form-control" id="" name="passport_or_card"
                        value="{{ old('passport_or_card') }}">
                        <option value=""> -- اختر -- </option>
                        <option value="جواز سفر">جواز سفر</option>
                        <option value="بطاقة شخصيه">بطاقه شخصيه</option>
                    </select>
                </div>
                <div class="form-group col-md-2 m-b-30">
                    <label for="exampleInputPassword1">الرقم</label>
                    <input type="text" class="form-control" name="passport" value="{{ old('passport') }}">
                </div>
                {{-- <div class="form-group col-md-2 m-b-30">
                    <label for="exampleInputPassword1">تاريخ الاصدار</label>
                    <input type="date" class="form-control" name="passport_releaseDate"
                        value="{{ old('passport_releaseDate') }}">
                </div>
                <div class="form-group col-md-2 m-b-30">
                    <label for="exampleInputPassword1">مكان الاصدار</label>
                    <input type="text" class="form-control" name="passport_placeOfissue"
                        value="{{ old('passport_placeOfissue') }}">
                </div> --}}
                <div class="form-group col-md-2 m-b-30">
                    <label for="exampleInputPassword1">رقم قيد العائله</label>
                    <input type="text" class="form-control" name="familyRegistration_No"
                        value="{{ old('familyRegistration_No') }}">
                </div>
                
                {{-- <div class="form-group col-md-2 m-b-30">
                    <label for="exampleInputPassword1">رقم ورقه العائله</label>
                    <input type="text" class="form-control" name="familyPaper_No"
                        value="{{ old('familyPaper_No') }}">
                </div>
                <div class="form-group col-md-2 m-b-30">
                    <label for="exampleInputPassword1">تاريخ/مكان الاصدار</label>
                    <input type="date" class="form-control" name="familyHandbook_No___releaseDate"
                        value="{{ old('familyHandbook_No___releaseDate') }}">
                </div> --}}

                <div class="form-group col-md-2 m-b-30">
                    <label for="exampleInputPassword1">أقرب الأقارب</label>
                    <input type="text" class="form-control" name="closest_relatives"
                        value="{{ old('closest_relatives') }}">
                </div>
                <div class="form-group col-md-2 m-b-30">
                    <label for="exampleInputPassword1">رقم هاتف (أقرب الأقارب)</label>
                    <input type="text" class="form-control" name="closest_relatives_Phone"
                        value="{{ old('closest_relatives_Phone') }}">
                </div>
                <div class="form-group col-md-12 m-b-30">
                    <label for="exampleInputPassword1">هل تعاني من امراض مزمنه</label>
                    <input type="text" class="form-control" name="diseases" value="{{ old('diseases') }}">
                </div>
            </fieldset>

            <fieldset class="m-t-50">
                <legend>البيانات المالية : </legend>


                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">المصرف</label>
                    <select class="form-control" name="bankName_id" value="{{ old('bankName_id') }}">
                        <option value="/"> -- اختر -- </option>
                        <option value="الجمهوريه">الجمهوريه</option>
                        <option value="الوحدة">الوحدة</option>
                        <option value="شمال أفريقيا">شمال أفريقيا</option>
                        <option value="اليقين">اليقين</option>
                        <option value="النوران">النوران</option>
                        <option value="الأمان">الأمان</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">الفرع</label>
                    <input type="text" class="form-control" name="bankBranch_id"
                        value="{{ old('bankBranch_id') }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">رقم الحساب</label>
                    <input type="text" class="form-control" name="bank_accountNo"
                        value="{{ old('bank_accountNo') }}">
                    @foreach ($errors->get('bank_accountNo') as $error)
                        <span style="font-size: 15px;position: absolute;color:#f5707a">{{ $error }}</span>
                    @endforeach
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">الرقم العسكري</label>
                    <input type="text" class="form-control" name="military_number"
                        value="{{ old('military_number') }}">
                    @foreach ($errors->get('military_number') as $error)
                        <span style="font-size: 15px;position: absolute;color:#f5707a">{{ $error }}</span>
                    @endforeach
                </div>

            </fieldset>

            <fieldset class="m-t-50">
                <legend>بيانات العمل : </legend>


                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">اسم الوحدة</label>

                    <input type="text" class="form-control" name="unitName" value="الخدمات الطبية العسكرية"
                        disabled>
                </div>
                <div class="form-group col-md-2">
                    <label for="unitBranch_id"> الوحدة الفرعية</label>
                    <select class="form-control" id="unitBranch_id" name="unitBranch_id">
                        <option value="/"> -- اختر -- </option>
                        @foreach ($wahadat as $wehda)
                            <option value="{{ $wehda->unitBranch_Name }}">{{ $wehda->unitBranch_Name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">تصنيف عقد العمل</label>
                    <select class="form-control" id="" name="classificationEmpContract"
                        value="{{ old('classificationEmpContract') }}">
                        <option value="/"> -- اختر -- </option>
                        <option value="تعيين">تعيين</option>
                        <option value="عقد عمل">عقد عمل</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">تاريخ التعيين</label>
                    <input type="date" class="form-control" name="hiringDate"
                        value="{{ old('hiringDate') }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">قرار التعيين</label>
                    <input type="text" class="form-control" name="appointment_decision"
                        value="{{ old('appointment_decision') }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">تاريخ المباشره</label>
                    <input type="date" class="form-control" name="startJopDate"
                        value="{{ old('startJopDate') }}">
                </div>

                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">رقم قيد العقد</label>
                    <input type="text" class="form-control" name="Contract_registrationNo"
                        value="{{ old('Contract_registrationNo') }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">تاريخ آخر قرار ترقيه</label>
                    <input type="date" class="form-control" name="lastPromotion"
                        value="{{ old('lastPromotion') }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">الدورات المتحصل عليها</label>
                    <input type="text" class="form-control" name="courses_obtained"
                        value="{{ old('courses_obtained') }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">الاجازات</label>
                    <input type="text" class="form-control" name="vacations" value="{{ old('vacations') }}">
                </div>
              
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">المؤهل العلمي</label>
                    <select class="form-control" id="" name="qualification"
                        value="{{ old('qualification') }}">
                        <option value="/"> -- اختر -- </option>
                        <option value="دكتوراء">دكتوراء</option>
                        <option value="ماجستير">ماجستير</option>
                        <option value="باكالوريوس">باكالوريوس</option>
                        <option value="معهد عالي">معهد عالي</option>
                        <option value="معهد متوسط">معهد متوسط</option>
                        <option value="ثانوي">ثانوي</option>
                    </select>
                </div>


                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">التخصص</label>
                    <input type="text" class="form-control" name="specialization"
                        value="{{ old('specialization') }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">مكان التخرج</label>
                    <input type="text" class="form-control" name="graduationPlace"
                        value="{{ old('graduationPlace') }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">جهة العمل</label>
                    <input type="text" class="form-control" name="workplace" value="{{ old('workplace') }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">التنسيب</label>
                    <input type="text" class="form-control" name="placement" value="{{ old('placement') }}">
                </div>
              

                <div class="form-group col-md-4">
                    <label for="exampleInputPassword1">ملاحظات</label>
                    <textarea name="notes" class="form-control" cols="30" rows="5" value="{{ old('notes') }}"></textarea>
                </div>


            </fieldset>
            <fieldset class="m-t-50">
                <legend>اضافه الى قائمه : </legend>

                <div class="body_switch">
                    <p class="checkbox__textwrapper"> &nbsp; هارب &nbsp;&nbsp;</p>

                    <div class="toggle-container">
                        <input class="toggle-input" type="checkbox" name="fleeing">
                        <svg class="toggle" viewBox="0 0 292 142" xmlns="http://www.w3.org/2000/svg">
                            <path class="toggle-background"
                                d="M71 142C31.7878 142 0 110.212 0 71C0 31.7878 31.7878 0 71 0C110.212 0 119 30 146 30C173 30 182 0 221 0C260 0 292 31.7878 292 71C292 110.212 260.212 142 221 142C181.788 142 173 112 146 112C119 112 110.212 142 71 142Z" />
                            <rect class="toggle-icon on" x="64" y="39" width="12"
                                height="64" rx="6" />
                            <path class="toggle-icon off" fill-rule="evenodd"
                                d="M221 91C232.046 91 241 82.0457 241 71C241 59.9543 232.046 51 221 51C209.954 51 201 59.9543 201 71C201 82.0457 209.954 91 221 91ZM221 103C238.673 103 253 88.6731 253 71C253 53.3269 238.673 39 221 39C203.327 39 189 53.3269 189 71C189 88.6731 203.327 103 221 103Z" />
                            <g filter="url('#goo')">
                                <rect class="toggle-circle-center" x="13" y="42" width="116"
                                    height="58" rx="29" fill="#fff" />
                                <rect class="toggle-circle left" x="14" y="14" width="114"
                                    height="114" rx="58" fill="#fff" />
                                <rect class="toggle-circle right" x="164" y="14" width="114"
                                    height="114" rx="58" fill="#fff" />
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
                        <input class="toggle-input" type="checkbox" name="stopping">
                        <svg class="toggle" viewBox="0 0 292 142" xmlns="http://www.w3.org/2000/svg">
                            <path class="toggle-background"
                                d="M71 142C31.7878 142 0 110.212 0 71C0 31.7878 31.7878 0 71 0C110.212 0 119 30 146 30C173 30 182 0 221 0C260 0 292 31.7878 292 71C292 110.212 260.212 142 221 142C181.788 142 173 112 146 112C119 112 110.212 142 71 142Z" />
                            <rect class="toggle-icon on" x="64" y="39" width="12"
                                height="64" rx="6" />
                            <path class="toggle-icon off" fill-rule="evenodd"
                                d="M221 91C232.046 91 241 82.0457 241 71C241 59.9543 232.046 51 221 51C209.954 51 201 59.9543 201 71C201 82.0457 209.954 91 221 91ZM221 103C238.673 103 253 88.6731 253 71C253 53.3269 238.673 39 221 39C203.327 39 189 53.3269 189 71C189 88.6731 203.327 103 221 103Z" />
                            <g filter="url('#goo')">
                                <rect class="toggle-circle-center" x="13" y="42" width="116"
                                    height="58" rx="29" fill="#fff" />
                                <rect class="toggle-circle left" x="14" y="14" width="114"
                                    height="114" rx="58" fill="#fff" />
                                <rect class="toggle-circle right" x="164" y="14" width="114"
                                    height="114" rx="58" fill="#fff" />
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
                        <input class="toggle-input" type="checkbox" name="retired">
                        <svg class="toggle" viewBox="0 0 292 142" xmlns="http://www.w3.org/2000/svg">
                            <path class="toggle-background"
                                d="M71 142C31.7878 142 0 110.212 0 71C0 31.7878 31.7878 0 71 0C110.212 0 119 30 146 30C173 30 182 0 221 0C260 0 292 31.7878 292 71C292 110.212 260.212 142 221 142C181.788 142 173 112 146 112C119 112 110.212 142 71 142Z" />
                            <rect class="toggle-icon on" x="64" y="39" width="12"
                                height="64" rx="6" />
                            <path class="toggle-icon off" fill-rule="evenodd"
                                d="M221 91C232.046 91 241 82.0457 241 71C241 59.9543 232.046 51 221 51C209.954 51 201 59.9543 201 71C201 82.0457 209.954 91 221 91ZM221 103C238.673 103 253 88.6731 253 71C253 53.3269 238.673 39 221 39C203.327 39 189 53.3269 189 71C189 88.6731 203.327 103 221 103Z" />
                            <g filter="url('#goo')">
                                <rect class="toggle-circle-center" x="13" y="42" width="116"
                                    height="58" rx="29" fill="#fff" />
                                <rect class="toggle-circle left" x="14" y="14" width="114"
                                    height="114" rx="58" fill="#fff" />
                                <rect class="toggle-circle right" x="164" y="14" width="114"
                                    height="114" rx="58" fill="#fff" />
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
                        <input class="toggle-input" type="checkbox" name="doomed">
                        <svg class="toggle" viewBox="0 0 292 142" xmlns="http://www.w3.org/2000/svg">
                            <path class="toggle-background"
                                d="M71 142C31.7878 142 0 110.212 0 71C0 31.7878 31.7878 0 71 0C110.212 0 119 30 146 30C173 30 182 0 221 0C260 0 292 31.7878 292 71C292 110.212 260.212 142 221 142C181.788 142 173 112 146 112C119 112 110.212 142 71 142Z" />
                            <rect class="toggle-icon on" x="64" y="39" width="12"
                                height="64" rx="6" />
                            <path class="toggle-icon off" fill-rule="evenodd"
                                d="M221 91C232.046 91 241 82.0457 241 71C241 59.9543 232.046 51 221 51C209.954 51 201 59.9543 201 71C201 82.0457 209.954 91 221 91ZM221 103C238.673 103 253 88.6731 253 71C253 53.3269 238.673 39 221 39C203.327 39 189 53.3269 189 71C189 88.6731 203.327 103 221 103Z" />
                            <g filter="url('#goo')">
                                <rect class="toggle-circle-center" x="13" y="42" width="116"
                                    height="58" rx="29" fill="#fff" />
                                <rect class="toggle-circle left" x="14" y="14" width="114"
                                    height="114" rx="58" fill="#fff" />
                                <rect class="toggle-circle right" x="164" y="14" width="114"
                                    height="114" rx="58" fill="#fff" />
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
                        <input class="toggle-input" type="checkbox" name="mandate">
                        <svg class="toggle" viewBox="0 0 292 142" xmlns="http://www.w3.org/2000/svg">
                            <path class="toggle-background"
                                d="M71 142C31.7878 142 0 110.212 0 71C0 31.7878 31.7878 0 71 0C110.212 0 119 30 146 30C173 30 182 0 221 0C260 0 292 31.7878 292 71C292 110.212 260.212 142 221 142C181.788 142 173 112 146 112C119 112 110.212 142 71 142Z" />
                            <rect class="toggle-icon on" x="64" y="39" width="12"
                                height="64" rx="6" />
                            <path class="toggle-icon off" fill-rule="evenodd"
                                d="M221 91C232.046 91 241 82.0457 241 71C241 59.9543 232.046 51 221 51C209.954 51 201 59.9543 201 71C201 82.0457 209.954 91 221 91ZM221 103C238.673 103 253 88.6731 253 71C253 53.3269 238.673 39 221 39C203.327 39 189 53.3269 189 71C189 88.6731 203.327 103 221 103Z" />
                            <g filter="url('#goo')">
                                <rect class="toggle-circle-center" x="13" y="42" width="116"
                                    height="58" rx="29" fill="#fff" />
                                <rect class="toggle-circle left" x="14" y="14" width="114"
                                    height="114" rx="58" fill="#fff" />
                                <rect class="toggle-circle right" x="164" y="14" width="114"
                                    height="114" rx="58" fill="#fff" />
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
                            src="https://img.icons8.com/sf-regular/48/FFFFFF/add-user-male.png"
                            alt="add-user-male" /> </span>
                    <span
                        class="absolute flex items-center justify-center w-full h-full text-success transition-all duration-300 transform group-hover:translate-x-full ease">حفظ
                    </span>
                    <span class="relative invisible">Button</span>
                </button>
            </div>
        </form>
    </div>

    <!-- end row -->

</div>

</div>


@endsection

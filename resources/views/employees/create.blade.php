@extends('layout.main')
@section('content')
@section('title_content_main')
    الموظفين
@section('title_content_sub')
    اضافه موظف
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
        <form action="{{ route('employees.store') }}" method="post">
            @csrf

            <fieldset class="m-t-50">
                <legend>البيانات الاساسيه : </legend>
                {{-- <div class="form-group col-md-12">
                     <label for="">رقم الملف</label>
                     <input id="" type="text" class="form-control" name="fileNumber" >
                </div> --}}
                <div class="form-group col-md-2">
                    <label for="financial_Figure">الرقم المالي</label>
                    <input id="financial_Figure" type="number" class="form-control" name="financial_Figure"
                        value="{{ old('financial_Figure') }}">

                    @foreach ($errors->get('financial_Figure') as $error)
                        @if ($error == 'الرجاء ادخال الرقم المالي')
                            <span @class([
                                'errorText' => $errors->get('financial_Figure'),
                            ])>
                                <i class="fa fa-info-circle" aria-hidden="true"></i> {{ $error }}
                                <script>
                                    document.getElementById("financial_Figure").classList.add("inputHasError");
                                    document.getElementById("financial_Figure").focus();
                                </script>
                            </span>
                        @elseif ($error == 'الرقم المالي موجود مسبقاً ')
                            <span @class([
                                'WarningText' => $errors->get('financial_Figure'),
                            ])>
                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                {{ $error }}
                                <script>
                                    document.getElementById("financial_Figure").classList.add("inputHasWarning");
                                    document.getElementById("financial_Figure").focus();
                                </script>
                            </span>
                        @endif
                    @endforeach
                </div>
                <div class="form-group col-md-2  m-b-30">
                    <label for="adjective">الصفه</label>
                    <select id="adjective" class="form-control"name="adjective_id">
                        @foreach ($Adjectives as $id => $Adjective_Name)
                            <option value="{{ $id }}">
                                {{ $Adjective_Name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3  m-b-30">
                    <label for="full_name">الاسم رباعي</label>

                    <input id="full_name" type="text" name="full_name" value="{{ old('full_name') }}"
                        @class(['form-control'])>

                    @foreach ($errors->get('full_name') as $error)
                        @if ($error == 'الرجاء ادخال اسم الموظف ')
                            <span @class([
                                'errorText' => $errors->get('full_name'),
                            ])>
                                <i class="fa fa-info-circle" aria-hidden="true"></i> {{ $error }}
                                <script>
                                    document.getElementById("full_name").classList.add("inputHasError");
                                    document.getElementById("full_name").focus();
                                </script>
                            </span>
                        @elseif ($error == 'اسم الموظف موجود مسبقا')
                            <span @class([
                                'WarningText' => $errors->get('full_name'),
                            ])>
                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                {{ $error }}
                                <script>
                                    document.getElementById("full_name").classList.add("inputHasWarning");
                                    document.getElementById("full_name").focus();
                                </script>
                            </span>
                        @endif
                    @endforeach
                </div>
 <div class="form-group col-md-2 m-b-30">
                    <label for="national_no">الرقم الوطني</label>
                    <input id="national_no" type="number" class="form-control" name="national_no"
                        value="{{ old('national_no') }}">
                    @foreach ($errors->get('national_no') as $error)
                        @if ($error == 'الرقم الوطني الذي ادخلته موجود مسبقاً')
                            <span @class([
                                'errorText' => $errors->get('national_no'),
                            ])>
                                <i class="fa fa-info-circle" aria-hidden="true"></i> {{ $error }}
                                <script>
                                    document.getElementById("national_no").classList.add("inputHasError");
                                    document.getElementById("national_no").focus();
                                </script>
                            </span>
                        @elseif ($error == 'الحد الأقصى للادخال 12 رقم')
                            <span @class([
                                'WarningText' => $errors->get('national_no'),
                            ])>
                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                {{ $error }}
                                <script>
                                    document.getElementById("national_no").classList.add("inputHasWarning");
                                    document.getElementById("national_no").focus();
                                </script>
                            </span>
                        @endif
                    @endforeach
                </div>
                <div class="form-group col-md-3 m-b-30">
                    <label for="familyHandbook_No">اسم الأم ثلاثي</label>
                    <input id="familyHandbook_No" type="number" class="form-control" name="familyHandbook_No"
                        value="{{ old('familyHandbook_No') }}">
                </div>

               

                <div class="form-group col-md-2  m-b-30">
                    <label for="birth_d">تاريخ الميلاد</label>
                    <input id="birth_d" type="date" class="form-control" name="birth_d"
                        value="{{ old('birth_d') }}">
                </div>
                <div class="form-group col-md-2 m-b-30">
                    <label for="place_birth">مكان الميلاد</label>
                    <input id="place_birth" type="text" class="form-control" name="place_birth"
                        value="{{ old('place_birth') }}">
                </div>
                <div class="form-group col-md-2 m-b-30">
                    <label for="place_residence">مكان الاقامه الحاليه</label>
                    <input id="place_residence" type="text" class="form-control" name="place_residence"
                        value="{{ old('place_residence') }}">
                </div>
                <div class="form-group col-md-2 m-b-30">
                    <label for="closest_point">أقرب نقطه داله</label>
                    <input id="closest_point" type="text" class="form-control" name="closest_point"
                        value="{{ old('closest_point') }}">
                </div>
                <div class="form-group col-md-2 m-b-30">
                    <label for="nationality">الجنسية</label>
                    <input id="nationality" type="text" class="form-control" name="nationality"
                        value="{{ old('nationality') }}">
                </div>
                <div class="form-group col-md-2 m-b-30">
                    <label for="religion">الديانه</label>
                    <input id="religion" type="text" class="form-control" name="religion"
                        value="{{ old('religion') }}">
                </div>
                <div class="form-group col-md-2 m-b-30">
                    <label for="blood_t">فصيله الدم</label>
                    <select id="blood_t" class="form-control" name="blood_t">
                        <option value="/" {{ old('blood_t') == '/' ? 'selected' : '' }}> -- اختر -- </option>
                        <option value="A+" {{ old('blood_t') == 'A+' ? 'selected' : '' }}>A+</option>
                        <option value="A-" {{ old('blood_t') == 'A-' ? 'selected' : '' }}>A-</option>
                        <option value="B+" {{ old('blood_t') == 'B+' ? 'selected' : '' }}>B+</option>
                        <option value="B-" {{ old('blood_t') == 'B-' ? 'selected' : '' }}>B-</option>
                        <option value="AB+" {{ old('blood_t') == 'AB+' ? 'selected' : '' }}>AB+</option>
                        <option value="AB-" {{ old('blood_t') == 'AB-' ? 'selected' : '' }}>AB-</option>
                        <option value="O+" {{ old('blood_t') == 'O+' ? 'selected' : '' }}>O+</option>
                        <option value="O-" {{ old('blood_t') == 'O-' ? 'selected' : '' }}>O-</option>
                    </select>
                </div>
                <div class="form-group col-md-2 m-b-30">
                    <label for="marital_status">الحاله الاجتماعيه</label>
                    <select id="marital_status" class="form-control" name="marital_status">
                        <option value="/" {{ old('marital_status') == '/' ? 'selected' : '' }}> -- اختر --
                        </option>
                        <option value="متزوج" {{ old('marital_status') == 'متزوج' ? 'selected' : '' }}>متزوج
                        </option>
                        <option value="أعزب" {{ old('marital_status') == 'أعزب' ? 'selected' : '' }}>أعزب
                        </option>
                        <option value="أرملة" {{ old('marital_status') == 'أرملة' ? 'selected' : '' }}>أرملة
                        </option>
                    </select>
                </div>
                {{-- <div class="form-group col-md-2 m-b-30">
                    <label for="sons"> الأبناء - الذكور</label>
                    <input id="sons" type="number" class="form-control" name="sons"
                        value="{{ old('sons') }}">
                </div> --}}
                {{-- <div class="form-group col-md-2 m-b-30">
                    <label for="daughter"> الأبناء - الاناث</label>
                    <input id="daughter" type="number" class="form-control" name="daughter"
                        value="{{ old('daughter') }}">
                </div> --}}
                <div class="form-group col-md-2 m-b-30">
                    <label for="phone_n">رقم الهاتف</label>
                    <input id="phone_n" type="number" class="form-control" name="phone_n"
                        value="{{ old('phone_n') }}">
                </div>
                <div class="form-group col-md-3 m-b-30">
                    <label for="passport_or_card">رقم جواز السفر أو البطاقه الشخصيه</label>
                    <select id="passport_or_card" class="form-control" name="passport_or_card">
                        <option value="/" {{ old('passport_or_card') == '/' ? 'selected' : '' }}> -- اختر --
                        </option>
                        <option value="جواز سفر" {{ old('passport_or_card') == 'جواز سفر' ? 'selected' : '' }}>
                            جواز سفر</option>
                        <option value="بطاقة شخصيه"
                            {{ old('passport_or_card') == 'بطاقة شخصيه' ? 'selected' : '' }}>بطاقه شخصيه</option>
                    </select>
                </div>
                <div class="form-group col-md-2 m-b-30">
                    <label for="passport">الرقم</label>
                    <input id="passport" type="text" class="form-control" name="passport"
                        value="{{ old('passport') }}">
                </div>
                {{-- <div class="form-group col-md-2 m-b-30">
                    <label for="passport_releaseDate">تاريخ الاصدار</label>
                    <input id="passport_releaseDate" type="date" class="form-control"
                        name="passport_releaseDate" value="{{ old('passport_releaseDate') }}">
                </div> --}}
                {{-- <div class="form-group col-md-2 m-b-30">
                    <label for="passport_placeOfissue">مكان الاصدار</label>
                    <input id="passport_placeOfissue" type="text" class="form-control"
                        name="passport_placeOfissue" value="{{ old('passport_placeOfissue') }}"> 
                </div> --}}
                <div class="form-group col-md-2 m-b-30">
                    <label for="familyRegistration_No">رقم قيد العائله</label>
                    <input id="familyRegistration_No" type="number" class="form-control"
                        name="familyRegistration_No" value="{{ old('familyRegistration_No') }}">
                </div>

                {{-- <div class="form-group col-md-2 m-b-30">
                    <label for="familyPaper_No">رقم ورقه العائله</label>
                    <input id="familyPaper_No" type="number" class="form-control" name="familyPaper_No"
                        value="{{ old('familyPaper_No') }}">
                </div>
                <div class="form-group col-md-2 m-b-30">
                    <label for="familyHandbook_No___releaseDate">تاريخ/مكان الاصدار</label>
                    <input id="familyHandbook_No___releaseDate" type="date" class="form-control"
                        name="familyHandbook_No___releaseDate"
                        value="{{ old('familyHandbook_No___releaseDate') }}"> 
                </div> --}}
                {{-- <div class="form-group col-md-2 m-b-30">
                     <label for="" >مكان الاصدار</label>
                     <input id="" type="text" class="form-control" name="familyHandbook_No___placeOfissue" value="{{ old('familyHandbook_No___placeOfissue') }}">
                </div> --}}
                <div class="form-group col-md-2 m-b-30">
                    <label for="closest_relatives">أقرب الأقارب</label>
                    <input id="closest_relatives" type="text" class="form-control" name="closest_relatives"
                        value="{{ old('closest_relatives') }}">
                </div>
                <div class="form-group col-md-3 m-b-30">
                    <label for="closest_relatives_Phone">رقم هاتف (أقرب الأقارب)</label>
                    <input id="closest_relatives_Phone" type="number" class="form-control"
                        name="closest_relatives_Phone" value="{{ old('closest_relatives_Phone') }}">
                </div>
                <div class="form-group col-md-12 m-b-30">
                    <label for="diseases">هل تعاني من امراض مزمنه</label>
                    <input id="diseases" type="text" class="form-control" name="diseases"
                        value="{{ old('diseases') }}">
                </div>
            </fieldset>

            <fieldset class="m-t-50">
                <legend>البيانات المالية : </legend>

                <div class="form-group col-md-4">
                    <label for="unitName">اسم الوحدة</label>
                    <input id="unitName" type="text" class="form-control" name="unitName"
                        value="الخدمات الطبية العسكرية" disabled>
                </div>

                <div class="form-group col-md-4">
                    <label for="unitBranch_id"> الوحدة الفرعية</label>
                    <select id="unitBranch_id" class="form-control" name="unitBranch_id">
                        @foreach ($wahadat as $id => $wehda_Name)
                            <option value="{{ $id }}">
                                {{ $wehda_Name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="placement">التنسيب الداخلي</label>
                    <input id="placement" type="text" class="form-control" name="placement"
                        value="{{ old('placement') }}">
                </div>

                <div class="form-group col-md-4">
                    <label for="bankName_id">المصرف</label>
                    <select id="bankName_id" class="form-control" name="bankName_id">
                        @foreach ($Banks as $id => $Bank_Name)
                            <option value="{{ $id }}">
                                {{ $Bank_Name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="bankBranch_id">الفرع</label>
                    <select id="bankBranch_id" class="form-control" name="bankBranch_id">
                        @foreach ($Branches as $id => $Branche_Name)
                            <option value="{{ $id }}">
                                {{ $Branche_Name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="bank_accountNo">رقم الحساب</label>
                    <input id="bank_accountNo" type="number" class="form-control" name="bank_accountNo"
                        value="{{ old('bank_accountNo') }}">

                    @foreach ($errors->get('bank_accountNo') as $error)
                        @if ($error == 'رقم الحساب الذي ادخلته موجود مسبقاً')
                            <span @class([
                                'errorText' => $errors->get('bank_accountNo'),
                            ])>
                                <i class="fa fa-info-circle" aria-hidden="true"></i> {{ $error }}
                                <script>
                                    document.getElementById("bank_accountNo").classList.add("inputHasError");
                                    document.getElementById("bank_accountNo").focus();
                                </script>
                            </span>
                        @endif
                    @endforeach
                </div>

            </fieldset>

            <fieldset class="m-t-50">
                <legend>بيانات العمل : </legend>

                <div class="form-group col-md-2">
                    <label for="classificationEmpContract">تصنيف عقد العمل</label>
                    <select id="classificationEmpContract" class="form-control" name="classificationEmpContract">
                        <option value="/" {{ old('classificationEmpContract') == '/' ? 'selected' : '' }}> --
                            اختر -- </option>
                        <option value="تعيين"
                            {{ old('classificationEmpContract') == 'تعيين' ? 'selected' : '' }}>تعيين</option>
                        <option value="عقد عمل"
                            {{ old('classificationEmpContract') == 'عقد عمل' ? 'selected' : '' }}>عقد عمل</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="hiringDate">تاريخ التعيين</label>
                    <input id="hiringDate" type="date" class="form-control" name="hiringDate"
                        value="{{ old('hiringDate') }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="appointment_decision">قرار التعيين</label>
                    <input id="appointment_decision" type="text" class="form-control"
                        name="appointment_decision" value="{{ old('appointment_decision') }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="startJopDate">تاريخ المباشره</label>
                    <input id="startJopDate" type="date" class="form-control" name="startJopDate"
                        value="{{ old('startJopDate') }}">
                </div>
                {{-- <div class="form-group col-md-2">
                    <label for="Contract_registrationNo">رقم قيد العقد</label>
                    <input id="Contract_registrationNo" type="number" class="form-control"
                        name="Contract_registrationNo" value="{{ old('Contract_registrationNo') }}">
                </div> --}}
                <div class="form-group col-md-2">
                    <label for="lastPromotion">تاريخ آخر قرار ترقيه</label>
                    <input id="lastPromotion" type="date" class="form-control" name="lastPromotion"
                        value="{{ old('lastPromotion') }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="current_grade">الدرجة الحاليه</label>
                    <input id="current_grade" type="text" class="form-control" name="current_grade"
                        value="{{ old('current_grade') }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="current_grade_date">تاريخ الحصول عليها</label>
                    <input id="current_grade_date" type="date" class="form-control" name="current_grade_date"
                        value="{{ old('current_grade_date') }}">
                    @foreach ($errors->get('current_grade_date') as $error)
                        <span style="font-size: 15px;position: absolute;color:#f5707a">{{ $error }}</span>
                    @endforeach
                </div>
                <div class="form-group col-md-2">
                    <label for="courses_obtained">الدورات المتحصل عليها</label>
                    <input id="courses_obtained" type="text" class="form-control" name="courses_obtained"
                        value="{{ old('courses_obtained') }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="vacations">الاجازات</label>
                    <input id="vacations" type="text" class="form-control" name="vacations"
                        value="{{ old('vacations') }}">
                </div>
                {{-- <div class="form-group col-md-2">
                     <label for="" >الراحة الطبيه</label>
                     <input id="" type="text" class="form-control" name="medical_comfort">
                </div> --}}
                {{-- <div class="form-group col-md-2">
                     <label for="" >التسويات</label>
                     <input id="" type="text" class="form-control" name="altasweat">
                </div> --}}
                <div class="form-group col-md-2">
                    <label for="qualification">المؤهل العلمي</label>
                    <select id="qualification" class="form-control" name="qualification">
                        <option value="/" {{ old('qualification') == '/' ? 'selected' : '' }}> -- اختر --
                        </option>
                        <option value="دكتوراء" {{ old('qualification') == 'دكتوراء' ? 'selected' : '' }}>دكتوراء
                        </option>
                        <option value="ماجستير" {{ old('qualification') == 'ماجستير' ? 'selected' : '' }}>ماجستير
                        </option>
                        <option value="باكالوريوس" {{ old('qualification') == 'باكالوريوس' ? 'selected' : '' }}>
                            باكالوريوس</option>
                        <option value="معهد عالي" {{ old('qualification') == 'معهد عالي' ? 'selected' : '' }}>معهد
                            عالي</option>
                        <option value="معهد متوسط" {{ old('qualification') == 'معهد متوسط' ? 'selected' : '' }}>
                            معهد متوسط</option>
                        <option value="ثانوي" {{ old('qualification') == 'ثانوي' ? 'selected' : '' }}>ثانوي
                        </option>
                        <option value="اعدادي" {{ old('qualification') == 'اعدادي' ? 'selected' : '' }}>اعدادي
                        </option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="specialization">التخصص</label>
                    <input id="specialization" type="text" class="form-control" name="specialization"
                        value="{{ old('specialization') }}">
                </div>
                {{-- <div class="form-group col-md-2">
                    <label for="graduationPlace">مكان التخرج</label>
                    <input id="graduationPlace" type="text" class="form-control" name="graduationPlace"
                        value="{{ old('graduationPlace') }}">
                </div> --}}
                <div class="form-group col-md-2">
                    <label for="">سنه التخرج</label>
                    <input id="" type="number" class="form-control" name="graduationDate">
                </div>
                {{-- <div class="form-group col-md-2">
                    <label for="workplace">جهة العمل</label>
                    <input id="workplace" type="text" class="form-control" name="workplace"
                        value="{{ old('workplace') }}">
                </div> --}}
                <div class="form-group col-md-4">
                    <label for="notes">ملاحظات</label>
                    <textarea id="notes" name="notes" class="form-control" cols="30" rows="5"
                        value="{{ old('notes') }}"></textarea>
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
                    <p class="checkbox__textwrapper"> &nbsp; منقطع &nbsp;&nbsp;</p>

                    <div class="toggle-container">
                        <input class="toggle-input" type="checkbox" name="stopping">
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
                    <p class="checkbox__textwrapper"> &nbsp; متقاعد &nbsp;&nbsp;</p>

                    <div class="toggle-container">
                        <input class="toggle-input" type="checkbox" name="retired">
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
                    <p class="checkbox__textwrapper"> &nbsp; محكوم &nbsp;&nbsp;</p>

                    <div class="toggle-container">
                        <input class="toggle-input" type="checkbox" name="doomed">
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
                        <input class="toggle-input" type="checkbox" name="mandate">
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

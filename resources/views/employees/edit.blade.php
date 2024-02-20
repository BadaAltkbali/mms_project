@extends('layout.main')
@section('content')
@section('title_content_main')
    الموظفين
@section('title_content_sub')
    تعديل بيانات موظف
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
        <form action="{{ route('employees.update', $employee->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <fieldset class="m-t-50">
                <legend>البيانات الاساسيه : </legend>

                <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">رقم الملف</label>
                    <input type="text" class="form-control text-center" name="fileNumber"
                        value="{{ $employee->id }}" disabled>
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputEmail1">الاسم رباعي</label>
                    <input type="text" class="form-control" name="full_name" value="{{ $employee->full_name }}">
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

                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">الصفه</label>
                    {{-- @dd($Adjectives_ids), --}}
                    {{-- @dd($employee->adjective_id)  --}}
                    <select class="form-control" id="" name="adjective_id">
                        @foreach ($Adjectives as $id => $adjname)
                            <option @selected($employee->adjective_id == $id) value="{{ $id }}">
                                {{ $adjname }}
                            </option>
                        @endforeach

                    </select>
                    {{-- {!! Form::Label('item', 'الصفه') !!}
                    {!! Form::select('item_id', $Adjectives, $selectedID, ['class' => 'form-control']) !!} --}}
                </div>

                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">الرقم الوطني</label>
                    <input type="number" class="form-control" name="national_no"
                        value="{{ $employee->national_no }}">
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
                <div class="form-group col-md-2">
                    <label for="exampleInputEmail1">تاريخ الميلاد</label>
                    <input type="date" class="form-control" name="birth_d" value="{{ $employee->birth_d }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputEmail1">مكان الميلاد</label>
                    <input type="text" class="form-control" name="place_birth"
                        value="{{ $employee->place_birth }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">مكان الاقامه الحاليه</label>
                    <input type="text" class="form-control"
                        name="place_residence"value="{{ $employee->place_residence }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">أقرب نقطه داله</label>
                    <input type="text" class="form-control" name="closest_point"
                        value="{{ $employee->closest_point }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputEmail1">الجنسية</label>
                    <input type="text" class="form-control" name="nationality"
                        value="{{ $employee->nationality }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputEmail1">الديانه</label>
                    <input type="text" class="form-control" name="religion" value="{{ $employee->religion }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputEmail1">فصيله الدم</label>
                    <select class="form-control" id="" name="blood_t">
                        @if ($employee->blood_t == 'A+')
                            <option value="/"> -- اختر -- </option>
                            <option value="A+" selected>A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        @elseif ($employee->blood_t == 'A-')
                            <option value="/"> -- اختر -- </option>
                            <option value="A+">A+</option>
                            <option value="A-" selected>A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        @elseif ($employee->blood_t == 'B+')
                            <option value="/"> -- اختر -- </option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+" selected>B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        @elseif ($employee->blood_t == 'B-')
                            <option value="/"> -- اختر -- </option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-" selected>B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        @elseif ($employee->blood_t == 'AB+')
                            <option value="/"> -- اختر -- </option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+" selected>AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        @elseif ($employee->blood_t == 'AB-')
                            <option value="/"> -- اختر -- </option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-" selected>AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        @elseif ($employee->blood_t == 'O+')
                            <option value="/"> -- اختر -- </option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+" selected>O+</option>
                            <option value="O-">O-</option>
                        @elseif ($employee->blood_t == 'O-')
                            <option value="/"> -- اختر -- </option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-" selected>O-</option>
                        @elseif ($employee->blood_t == '/')
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
                        @if ($employee->marital_status == '/')
                            <option value="/" selected> -- اختر -- </option>
                            <option value="متزوج">متزوج</option>
                            <option value="أعزب">أعزب</option>
                            <option value="أرملة">أرملة</option>
                        @elseif ($employee->marital_status == 'متزوج')
                            <option value="/"> -- اختر -- </option>
                            <option value="متزوج" selected>متزوج</option>
                            <option value="أعزب">أعزب</option>
                            <option value="أرملة">أرملة</option>
                        @elseif ($employee->marital_status == 'أعزب')
                            <option value="/"> -- اختر -- </option>
                            <option value="متزوج">متزوج</option>
                            <option value="أعزب" selected>أعزب</option>
                            <option value="أرملة">أرملة</option>
                        @elseif ($employee->marital_status == 'أرملة')
                            <option value="/"> -- اختر -- </option>
                            <option value="متزوج">متزوج</option>
                            <option value="أعزب">أعزب</option>
                            <option value="أرملة" selected>أرملة</option>
                        @endif
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputEmail1">عدد الأبناء - الذكور</label>
                    <input type="text" class="form-control" name="sons" value="{{ $employee->sons }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputEmail1">عدد الأبناء - الاناث</label>
                    <input type="text" class="form-control" name="daughter"
                        value="{{ $employee->daughter }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputEmail1">رقم الهاتف</label>
                    <input type="number" class="form-control" name="phone_n" value="{{ $employee->phone_n }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">رقم جواز السفر أو البطاقه الشخصيه</label>
                    <select class="form-control" id="" name="passport_or_card">
                        @if ($employee->passport_or_card == '/')
                            <option value="/" selected> -- اختر -- </option>
                            <option value="جواز سفر">جواز سفر</option>
                            <option value="بطاقة شخصيه">بطاقه شخصيه</option>
                        @elseif ($employee->passport_or_card == 'جواز سفر')
                            <option value="/"> -- اختر -- </option>
                            <option value="جواز سفر" selected>جواز سفر</option>
                            <option value="بطاقة شخصيه">بطاقه شخصيه</option>
                        @elseif ($employee->passport_or_card == 'بطاقة شخصيه')
                            <option value="/"> -- اختر -- </option>
                            <option value="جواز سفر">جواز سفر</option>
                            <option value="بطاقة شخصيه" selected>بطاقه شخصيه</option>
                        @endif
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">الرقم</label>
                    <input type="number" class="form-control" name="passport"
                        value="{{ $employee->passport }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">تاريخ الاصدار</label>
                    <input type="date" class="form-control" name="passport_releaseDate"
                        value="{{ $employee->passport_releaseDate }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">مكان الاصدار</label>
                    <input type="text" class="form-control" name="passport_placeOfissue"
                        value="{{ $employee->passport_placeOfissue }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">رقم قيد العائله</label>
                    <input type="text" class="form-control" name="familyRegistration_No"
                        value="{{ $employee->familyRegistration_No }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">رقم كتيب العائله</label>
                    <input type="text" class="form-control" name="familyHandbook_No"
                        value="{{ $employee->familyHandbook_No }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">رقم ورقه العائله</label>
                    <input type="text" class="form-control" name="familyPaper_No"
                        value="{{ $employee->familyPaper_No }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">تاريخ الاصدار</label>
                    <input type="date" class="form-control" name="familyHandbook_No___releaseDate"
                        value="{{ $employee->familyHandbook_No___releaseDate }}">
                </div>
                {{-- <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">مكان الاصدار</label>
                    <input type="text" class="form-control" name="familyHandbook_No___placeOfissue"
                        value="{{ $employee->familyHandbook_No___placeOfissue }}">
                </div> --}}

                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">أقرب الأقارب</label>
                    <input type="text" class="form-control" name="closest_relatives"
                        value="{{ $employee->closest_relatives }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">رقم هاتف (أقرب الأقارب)</label>
                    <input type="text" class="form-control" name="closest_relatives_Phone"
                        value="{{ $employee->closest_relatives_Phone }}">
                </div>
                <div class="form-group col-md-12">
                    <label for="exampleInputPassword1">هل تعاني من امراض مزمنه</label>
                    <input type="text" class="form-control" name="diseases"
                        value="{{ $employee->diseases }}">
                </div>
            </fieldset>

            <fieldset class="m-t-50">
                <legend>البيانات المالية : </legend>


                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">المصرف</label>
                    <select class="form-control" name="bankName_id">
                        {{-- @foreach ($Banks as $Bank)
                            <option value="{{ $Bank->id }}"
                                {{ old('bankName_id') == $Bank->id ? 'selected' : '' }}>
                                {{ $Bank->BankName }} </option>
                        @endforeach --}}

                        @foreach ($Banks as $id => $BankName)
                            <option @selected($employee->bankName_id == $id) value="{{ $id }}">
                                {{ $BankName }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">الفرع</label>
                    <select id="bankBranch_id" class="form-control" name="bankBranch_id">
                        @foreach ($Branches as $id => $BranchName)
                            <option @selected($employee->bankName_id == $id) value="{{ $id }}">
                                {{ $BranchName }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">رقم الحساب</label>
                    <input type="text" class="form-control" name="bank_accountNo"
                        value="{{ $employee->bank_accountNo }}">
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
                <div class="form-group col-md-3">
                    <label for="unitName">اسم الوحدة</label>
                    <input id="unitName" type="text" class="form-control" name="unitName"
                        value="الخدمات الطبية العسكرية" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label for="unitBranch_id"> الوحدة الفرعية</label>
                    <select id="unitBranch_id" class="form-control" name="unitBranch_id">
                        @foreach ($wahadat as $id => $unitBranch_Name)
                            <option @selected($employee->unitBranch_id == $id) value="{{ $id }}">
                                {{ $unitBranch_Name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">التنسيب الداخلي</label>
                    <input type="text" class="form-control" name="placement"
                        value="{{ $employee->placement }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">الرقم المالي</label>
                    <input type="text" class="form-control" name="financial_Figure"
                        value="{{ $employee->financial_Figure }}">
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
            </fieldset>

            <fieldset class="m-t-50">
                <legend>بيانات العمل : </legend>

                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">تصنيف عقد العمل</label>
                    <select class="form-control" id="" name="classificationEmpContract">
                        @if ($employee->classificationEmpContract == '/')
                            <option value="/" selected> -- اختر -- </option>
                            <option value="تعيين">تعيين</option>
                            <option value="عقد عمل">عقد عمل</option>
                        @elseif ($employee->classificationEmpContract == 'تعيين')
                            <option value="/"> -- اختر -- </option>
                            <option value="تعيين" selected>تعيين</option>
                            <option value="عقد عمل">عقد عمل</option>
                        @elseif ($employee->classificationEmpContract == 'عقد عمل')
                            <option value="/"> -- اختر -- </option>
                            <option value="تعيين">تعيين</option>
                            <option value="عقد عمل" selected>عقد عمل</option>
                        @endif
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">تاريخ التعيين</label>
                    <input type="date" class="form-control" name="hiringDate"
                        value="{{ $employee->hiringDate }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">قرار التعيين</label>
                    <input type="text" class="form-control" name="appointment_decision"
                        value="{{ $employee->appointment_decision }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">تاريخ المباشره</label>
                    <input type="date" class="form-control" name="startJopDate"
                        value="{{ $employee->startJopDate }}">
                </div>

                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">رقم قيد العقد</label>
                    <input type="text" class="form-control" name="Contract_registrationNo"
                        value="{{ $employee->Contract_registrationNo }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">تاريخ آخر قرار ترقيه</label>
                    <input type="date" class="form-control" name="lastPromotion"
                        value="{{ $employee->lastPromotion }}">
                </div>

                <div class="form-group col-md-2">
                    <label for="current_grade">الدرجة الحاليه</label>
                    <input id="current_grade" type="text" class="form-control" name="current_grade"
                        value="{{ $employee->current_grade }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="current_grade_date">تاريخ الحصول عليها</label>
                    <input id="current_grade_date" type="date" class="form-control" name="current_grade_date"
                        value="{{ $employee->current_grade_date }}">
                    @foreach ($errors->get('current_grade_date') as $error)
                        <span style="font-size: 15px;position: absolute;color:#f5707a">{{ $error }}</span>
                    @endforeach
                </div>
                {{-- <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">الجهه المنتقل منها</label>
                    <input type="text" class="form-control" name="current_grade"
                        value="{{ $employee->current_grade }}">
                </div> --}}
                {{-- <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">تاريخ النقل</label>
                    <input type="date" class="form-control" name="current_grade_date"
                        value="{{ $employee->current_grade_date }}">
                </div> --}}
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">الدورات المتحصل عليها</label>
                    <input type="text" class="form-control" name="courses_obtained"
                        value="{{ $employee->courses_obtained }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">الاجازات</label>
                    <input type="text" class="form-control" name="vacations"
                        value="{{ $employee->vacations }}">
                </div>
                {{-- <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">الراحة الطبيه</label>
                    <input type="text" class="form-control" name="medical_comfort"
                        value="{{ $employee->medical_comfort }}">
                </div> --}}
                {{-- <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">التسويات</label>
                    <input type="text" class="form-control" name="altasweat"
                        value="{{ $employee->altasweat }}">
                </div> --}}
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">المؤهل العلمي</label>
                    <select class="form-control" id="" name="qualification">
                        @if ($employee->qualification == '/')
                            <option value="/" selected> -- اختر -- </option>
                            <option value="دكتوراء">دكتوراء</option>
                            <option value="ماجستير">ماجستير</option>
                            <option value="باكالوريوس">باكالوريوس</option>
                            <option value="معهد عالي">معهد عالي</option>
                            <option value="معهد متوسط">معهد متوسط</option>
                            <option value="ثانوي">ثانوي</option>
                        @elseif ($employee->qualification == 'دكتوراء')
                            <option value="/"> -- اختر -- </option>
                            <option value="دكتوراء" selected>دكتوراء</option>
                            <option value="ماجستير">ماجستير</option>
                            <option value="باكالوريوس">باكالوريوس</option>
                            <option value="معهد عالي">معهد عالي</option>
                            <option value="معهد متوسط">معهد متوسط</option>
                            <option value="ثانوي">ثانوي</option>
                        @elseif ($employee->qualification == 'ماجستير')
                            <option value="/"> -- اختر -- </option>
                            <option value="دكتوراء">دكتوراء</option>
                            <option value="ماجستير" selected>ماجستير</option>
                            <option value="باكالوريوس">باكالوريوس</option>
                            <option value="معهد عالي">معهد عالي</option>
                            <option value="معهد متوسط">معهد متوسط</option>
                            <option value="ثانوي">ثانوي</option>
                        @elseif ($employee->qualification == 'باكالوريوس')
                            <option value="/"> -- اختر -- </option>
                            <option value="دكتوراء">دكتوراء</option>
                            <option value="ماجستير">ماجستير</option>
                            <option value="باكالوريوس" selected>باكالوريوس</option>
                            <option value="معهد عالي">معهد عالي</option>
                            <option value="معهد متوسط">معهد متوسط</option>
                            <option value="ثانوي">ثانوي</option>
                        @elseif ($employee->qualification == 'معهد عالي')
                            <option value="/"> -- اختر -- </option>
                            <option value="دكتوراء">دكتوراء</option>
                            <option value="ماجستير">ماجستير</option>
                            <option value="باكالوريوس">باكالوريوس</option>
                            <option value="معهد عالي" selected>معهد عالي</option>
                            <option value="معهد متوسط">معهد متوسط</option>
                            <option value="ثانوي">ثانوي</option>
                        @elseif ($employee->qualification == 'معهد متوسط')
                            <option value="/"> -- اختر -- </option>
                            <option value="دكتوراء">دكتوراء</option>
                            <option value="ماجستير">ماجستير</option>
                            <option value="باكالوريوس">باكالوريوس</option>
                            <option value="معهد عالي">معهد عالي</option>
                            <option value="معهد متوسط" selected>معهد متوسط</option>
                            <option value="ثانوي">ثانوي</option>
                        @elseif ($employee->qualification == 'ثانوي')
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
                        value="{{ $employee->specialization }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">مكان التخرج</label>
                    <input type="text" class="form-control" name="graduationPlace"
                        value="{{ $employee->graduationPlace }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">تاريخ التخرج</label>
                    <input type="date" class="form-control" name="graduationDate"
                        value="{{ $employee->graduationDate }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">جهة العمل</label>
                    <input type="text" class="form-control" name="workplace"
                        value="{{ $employee->workplace }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="exampleInputPassword1">ملاحظات</label>
                    <textarea name="notes" class="form-control" cols="30" rows="5">{{ $employee->notes }}</textarea>
                </div>
            </fieldset>
            <button type="submit" class="btn btn-success waves-effect waves-light m-r-0 btn-md">تعديل</button>
        </form>
    </div>
    <!-- end row -->
</div>
</div>
@endsection

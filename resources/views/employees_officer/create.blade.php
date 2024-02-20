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

                {{-- <div class="form-group col-md-2  m-b-30">
                    <label for="exampleInputPassword1">الصفه</label>
                    <select class="form-control" id="" name="adjective" value="{{ old('adjective') }}">
                        <option value="/"> -- اختر -- </option>
                        <option value="مدير">مدير</option>
                        <option value="رئيس قسم">رئيس قسم</option>
                        <option value="موظف">موظف</option>
                    </select>
                </div> --}}
                <div class="form-group col-md-2 m-b-30">
                    <label for="exampleInputPassword1">الرقم الوطني</label>
                    <input type="number" class="form-control" name="national_no" value="{{ old('national_no') }}">
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
                    <input type="number" class="form-control" name="passport" value="{{ old('passport') }}">
                </div>
                <div class="form-group col-md-2 m-b-30">
                    <label for="exampleInputPassword1">تاريخ الاصدار</label>
                    <input type="date" class="form-control" name="passport_releaseDate"
                        value="{{ old('passport_releaseDate') }}">
                </div>
                <div class="form-group col-md-2 m-b-30">
                    <label for="exampleInputPassword1">مكان الاصدار</label>
                    <input type="text" class="form-control" name="passport_placeOfissue"
                        value="{{ old('passport_placeOfissue') }}">
                </div>
                <div class="form-group col-md-2 m-b-30">
                    <label for="exampleInputPassword1">رقم قيد العائله</label>
                    <input type="text" class="form-control" name="familyRegistration_No"
                        value="{{ old('familyRegistration_No') }}">
                </div>
                <div class="form-group col-md-2 m-b-30">
                    <label for="exampleInputPassword1">رقم كتيب العائله</label>
                    <input type="text" class="form-control" name="familyHandbook_No"
                        value="{{ old('familyHandbook_No') }}">
                </div>
                <div class="form-group col-md-2 m-b-30">
                    <label for="exampleInputPassword1">رقم ورقه العائله</label>
                    <input type="text" class="form-control" name="familyPaper_No"
                        value="{{ old('familyPaper_No') }}">
                </div>
                <div class="form-group col-md-2 m-b-30">
                    <label for="exampleInputPassword1">تاريخ/مكان الاصدار</label>
                    <input type="date" class="form-control" name="familyHandbook_No___releaseDate"
                        value="{{ old('familyHandbook_No___releaseDate') }}">
                </div>
                {{-- <div class="form-group col-md-2 m-b-30">
                    <label for="exampleInputPassword1">مكان الاصدار</label>
                    <input type="text" class="form-control" name="familyHandbook_No___placeOfissue" value="{{ old('familyHandbook_No___placeOfissue') }}">
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

                {{-- <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">الرقم المالي</label>
                    <input type="text" class="form-control" name="financial_Figure"
                        value="{{ old('financial_Figure') }}"> --}}
                {{-- @error('financial_Figure')
                        <span class="" style="font-size: 15px;position: absolute;color:#f5707a">الرجاء ادخال
                            الرقم المالي</span>
                    @enderror --}}
                {{-- @foreach ($errors->get('financial_Figure') as $error)
                        <span style="font-size: 15px;position: absolute;color:#f5707a">{{ $error }}</span>
                    @endforeach
                </div> --}}


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
                    {{-- <input type="text" class="form-control" name="unitBranch_id"> --}}
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
                {{-- <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">الجهه المنتقل منها</label>
                    <input type="text" class="form-control" name="current_grade">
                </div> --}}
                {{-- <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">تاريخ النقل</label>
                    <input type="date" class="form-control" name="current_grade_date">
                </div> --}}
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">الدورات المتحصل عليها</label>
                    <input type="text" class="form-control" name="courses_obtained"
                        value="{{ old('courses_obtained') }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">الاجازات</label>
                    <input type="text" class="form-control" name="vacations" value="{{ old('vacations') }}">
                </div>
                {{-- <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">الراحة الطبيه</label>
                    <input type="text" class="form-control" name="medical_comfort">
                </div> --}}
                {{-- <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">التسويات</label>
                    <input type="text" class="form-control" name="altasweat">
                </div> --}}
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
                {{-- <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">تاريخ التنسيب</label>
                    <input type="date" class="form-control" name="graduationDate">
                </div> --}}

                <div class="form-group col-md-4">
                    <label for="exampleInputPassword1">ملاحظات</label>
                    <textarea name="notes" class="form-control" cols="30" rows="5" value="{{ old('notes') }}"></textarea>
                </div>


            </fieldset>
            {{-- <button type="submit" class="btn btn-success waves-effect waves-light m-r-0 btn-md">حفظ</button> --}}
        
            <div class="w-full h-40 flex items-center justify-center">
                <button type="submit"
                    class="relative inline-flex items-center justify-center p-4 px-6 py-3 overflow-hidden font-medium text-indigo-600 transition duration-300 ease-out border-2 border-success rounded-full shadow-md group">
                    <span
                        class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 -translate-x-full bg-success group-hover:translate-x-0 ease">
                        {{-- <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg> --}}

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

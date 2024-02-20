@extends('layout.main')
@section('content')
@section('title_content_main')
    الموظفين
@section('title_content_sub')
    عرض بيانات موظف
@endsection
@endsection

<div class="panel-body">
<div class="container" id="print">
    <div class="groups header_Print">

        <div class="flex_column">
            <div class="group">
                <label for=""> رقم الموظف :</label>
                <span>{{ $employee->id }}</span>
            </div>
            <div class="group">
                <label for=""> التاريخ :</label>
                <span>{{ $date }}</span>
            </div>
        </div>
        <div class="flex_column">
            <div class="group">
                <img src="{{ url('assets/images/logo.jpg') }}" alt="" srcset="" width="200px">
            </div>
            <div class="group">
                <label for="">الرقم الوطني :</label>
                <span>{{ $employee->national_no }}</span>
            </div>
        </div>
    </div>

    <div class="groups">
        <div class="group full-w ">
            <label for="">الاسم الكامل :</label>
            <span>{{ $employee->full_name }}</span>
        </div>
    </div>
    @if ($employee->adjective_id == '1')
        @foreach ($Adjectives as $id => $adjname)
            <div class="group">
                <label for="">1</label>
                <span></span>
            </div>
        @endforeach
    @else
        @foreach ($Adjectives as $id => $adjname)
            <div class="group">
                <label for="">2</label>
                <span></span>
            </div>
        @endforeach
    @endif
    <div class="group">
        <label for="">تاريخ الميلاد :</label>
        <span>{{ $employee->birth_d }}</span>
    </div>
    <div class="group">
        <label for="">مكان الميلاد :</label>
        <span>{{ $employee->place_birth }}</span>
    </div>
    <div class="group flexEnd">
        <label for="">مكان الاقامه الحاليه :</label>
        <span>{{ $employee->place_residence }}</span>
    </div>
    <div class="group">
        <label for="">أقرب نقطه دالة :</label>
        <span>{{ $employee->closest_point }}</span>
    </div>
    <div class="group">
        <label for=""> الجنسيه :</label>
        <span>{{ $employee->nationality }}</span>
    </div>
    <div class="group">
        <label for=""> الديانه :</label>
        <span>{{ $employee->religion }}</span>
    </div>
    <div class="group">
        <label for=""> فصيلة الدم :</label>
        <span>{{ $employee->blood_t }}</span>
    </div>
    <div class="group">
        <label for=""> رقم الهاتف :</label>
        <span>{{ $employee->phone_n }}</span>
    </div>
    <div class="group">
        <label for=""> الحاله الاجتماعية :</label>
        <span>{{ $employee->marital_status }}</span>
    </div>
    <div class="group">
        <label for=""> الابناء :</label>
        <span>{{ $employee->sons }}</span>
    </div>
    <div class="group">
        <label for=""> البنات :</label>
        <span>{{ $employee->daughter }}</span>
    </div>
    <div class="group">
        <label for=""> الرقم المالي :</label>
        <span>{{ $employee->financial_Figure }}</span>
    </div>
    <div class="group">
        <label for=""> المصرف :</label>
        <span>
            @foreach ($Banks as $id => $BankName)
                @if ($employee->bankName_id == $id)
                    {{ $BankName }}
                @endif
            @endforeach
        </span>
    </div>
    <div class="group">
        <label for=""> الفرع :</label>
        <span>
            @foreach ($BankBranches as $id => $BankBranchesName)
                @if ($employee->bankBranch_id == $id)
                    {{ $BankBranchesName }}
                @endif
            @endforeach
        </span>
    </div>
    <div class="group">
        <label for=""> رقم الحساب :</label>
        <span>{{ $employee->bank_accountNo }}</span>
    </div>
    <div class="group">
        <label for=""> الوحدة الرئيسية :</label>
        <span>{{ $employee->unitName }}</span>
    </div>
    <div class="group">
        <label for=""> الوحدة الفرعية :</label>
        <span>
            @foreach ($UnitBranches as $id => $UnitBranchesName)
                @if ($employee->unitBranch_id == $id)
                    {{ $UnitBranchesName }}
                @endif
            @endforeach
        </span>
    </div>
    <div class="group">
        <label for=""> التنسيب الداخلي :</label>
        <span>{{ $employee->placement }}</span>
    </div>
    <div class="group">
        <label for=""> تصنيف عقد العمل :</label>
        <span>{{ $employee->classificationEmpContract }}</span>
    </div>
    <div class="group">
        <label for=""> قرار التعيين :</label>
        <span>{{ $employee->appointment_decision }}</span>
    </div>
    <div class="group">
        <label for=""> تاريخ التعيين :</label>
        <span>{{ $employee->hiringDate }}</span>
    </div>
    <div class="group">
        <label for=""> تاريخ المباشرة :</label>
        <span>{{ $employee->startJopDate }}</span>
    </div>
    <div class="group">
        <label for=""> رقم قيد العقد :</label>
        <span>{{ $employee->Contract_registrationNo }}</span>
    </div>
    <div class="group">
        <label for=""> تاريخ اخر قرار ترقيه :</label>
        <span>{{ $employee->lastPromotion }}</span>
    </div>
    <div class="group">
        <label for=""> الدرجة الحالية :</label>
        <span>{{ $employee->current_grade }}</span>
    </div>
    <div class="group">
        <label for=""> تاريخ الحصول عليها :</label>
        <span>{{ $employee->current_grade_date }}</span>
    </div>
    <div class="group">
        <label for=""> الدورات المتحصل عليها :</label>
        <span>{{ $employee->courses_obtained }}</span>
    </div>
    <div class="group">
        <label for=""> الأمراض :</label>
        <span>{{ $employee->diseases }}</span>
    </div>
    <div class="group">
        <label for=""> ملاحظات :</label>
        <span>{{ $employee->notes }}</span>
    </div>
    <div class="group">
        <label for=""> الاجازات :</label>
        <span>{{ $employee->vacations }}</span>
    </div>
    <div class="group">
        <label for=""> المؤهل العلمي :</label>
        <span>{{ $employee->qualification }}</span>
    </div>
    <div class="group">
        <label for=""> التخصص :</label>
        <span>{{ $employee->specialization }}</span>
    </div>
    <div class="group">
        <label for=""> مكان التخرج :</label>
        <span>{{ $employee->graduationPlace }}</span>
    </div>
    <div class="group">
        <label for=""> مكان التخرج :</label>
        <span>{{ $employee->graduationDate }}</span>
    </div>
    <div class="group">
        <label for=""> جهه العمل :</label>
        <span>{{ $employee->workplace }}</span>
    </div>

    <div class="Print">
        <button onclick="printDiv('printme')" id="PrintBtn">
            {{-- <a href="" @click.prevent="printme"> --}}
            <i class="fi fi-rs-print"></i>
            {{-- </a> --}}
        </button>
    </div>
</div>
</div>

@endsection

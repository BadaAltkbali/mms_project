@extends('layout.main')
@section('content')
@section('title_content_main')
    لوحه التحكم
@section('title_content_sub')
    الرئيسيه
@endsection
@endsection
<style>
.indexpagelogo {}
</style>


<div style="display: flex;
    justify-content: center;">
<img src="{{ url('assets/images/logo.jpg') }}" class="indexpagelogo" alt="" srcset="" width="70%">
</div>

<a href="{{ route('allEmployees') }}">
<div class="col-lg-6 col-md-6">
    <div class="card-box widget-box-two widget-two-danger" dir="rtl">
        <i class="fi fi-rr-users-alt widget-two-icon"></i>
        <div class="wigdet-two-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="employees">كل الموظفين</p>
            <h2><span data-plugin="counterup">{{ $allEmployees }} </span>
            </h2>
        </div>
    </div>
</div><!-- end col -->
</a>




<a href="{{ route('employees.index') }}">
<div class="col-lg-6 col-md-6">
    <div class="card-box widget-box-two widget-two-primary" dir="rtl">
        <i class="fi fi-rs-users-alt widget-two-icon"></i>
        <div class="wigdet-two-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">الموظفين المدنيين
            </p>
            <h2><span data-plugin="counterup">{{ $employees }}</span>
            </h2>
        </div>
    </div>
</div><!-- end col -->
</a>



<a href="{{ route('employeesofficer.index') }}">
<div class="col-lg-6 col-md-6">
    <div class="card-box widget-box-two widget-two-warning" dir="rtl">
        
        <i class="fi fi-rr-badge-sheriff widget-two-icon"></i>
        <div class="wigdet-two-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">الضباط</p>
            <h2><span data-plugin="counterup">{{ $employeesOfficer }}</span>
            </h2>
        </div>
    </div>
</div><!-- end col -->
</a>

<a href="{{ route('employeesofficer/NonCommissOfficers') }}">
<div class="col-lg-6 col-md-6">
    <div class="card-box widget-box-two widget-two-warning" dir="rtl">
   
        <i class="fi fi-rr-badge-sheriff widget-two-icon"></i>
        <div class="wigdet-two-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">ضباط الصف</p>
            <h2><span data-plugin="counterup">{{ $NonCommissOfficers }}</span>
            </h2>
        </div>
    </div>
</div><!-- end col -->
</a>

<a href="{{ route('subList/retired') }}">
<div class="col-lg-3 col-md-6">
    <div class="card-box widget-box-two widget-two-success flex justify-start" dir="rtl">
        <i class="fi fi-rr-user widget-two-icon"></i>
        <div class="wigdet-two-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow " title="employees">تقاعد</p>
            <h2>
                <span data-plugin="counterup">{{ $retireds + $retiredsOfficer }}</span>
            </h2>
        </div>
    </div>
</div><!-- end col -->
</a>

<a href="{{ route('subList/stopping') }}">
<div class="col-lg-6 col-md-6">
    <div class="card-box widget-box-two widget-two-babyBlue flex justify-start" dir="rtl">
        <i class="fi fi-rr-user widget-two-icon"></i>
        <div class="wigdet-two-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow " title="employees">منقطعين</p>
            <h2>
                <span data-plugin="counterup">{{ $stoppings + $stoppingsOfficer }}</span>
            </h2>
        </div>
    </div>
</div><!-- end col -->
</a>

<a href="{{ route('subList/fleeing') }}">
<div class="col-lg-3 col-md-6">
    <div class="card-box widget-box-two widget-two-success" dir="rtl">
        <i class="fi fi-rr-user widget-two-icon"></i>
        <div class="wigdet-two-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="employees"> الهروب </p>
            <h2><span data-plugin="counterup">{{ $fleeings + $fleeingsOfficer }} </span>
            </h2>
        </div>
    </div>
</div><!-- end col -->
</a>

<a href="{{ route('subList/doomed') }}">
<div class="col-lg-3 col-md-6">
    <div class="card-box widget-box-two widget-two-danger" dir="rtl">
        <i class="fi fi-rr-user widget-two-icon"></i>
        <div class="wigdet-two-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="employees"> المحكومين </p>
            <h2><span data-plugin="counterup">{{ $doomeds + $doomedsOfficer }} </span>
            </h2>
        </div>
    </div>
</div><!-- end col -->
</a>

<a href="{{ route('subList/mandate') }}">
<div class="col-lg-6 col-md-6">
    <div class="card-box widget-box-two wigdet-two-content" dir="rtl">
        <i class="fi fi-rr-user widget-two-icon"></i>
        <div class="wigdet-two-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="employees"> الندب </p>
            <h2><span data-plugin="counterup">{{ $mandates + $mandatesOfficer }} </span>
            </h2>
        </div>
    </div>
</div><!-- end col -->
</a>

<a href="{{ route('wehda.index') }}">
<div class="col-lg-3 col-md-6">
    <div class="card-box widget-box-two widget-two-warning" dir="rtl">
        <i class="fi fi-rs-city widget-two-icon"></i>
        <div class="wigdet-two-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User Today"> الوحدات
                الفرعية
            </p>
            <h2><span data-plugin="counterup">{{ $unitsBranch }}</span>
            </h2>
        </div>
    </div>
</div><!-- end col -->
</a>

<a href="{{ route('Bank.index') }}">
<div class="col-lg-6 col-md-6">
    <div class="card-box widget-box-two widget-two-warning" dir="rtl">
        <i class="fi fi-rs-city widget-two-icon"></i>
        <div class="wigdet-two-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User Today">المصارف</p>
            <h2><span data-plugin="counterup">{{ $Banks }}</span>
            </h2>
        </div>
    </div>
</div><!-- end col -->
</a>

<a href="{{ route('Bank.index') }}">
<div class="col-lg-6 col-md-6">
    <div class="card-box widget-box-two widget-two-warning" dir="rtl">
        <i class="fi fi-rs-city widget-two-icon"></i>
        <div class="wigdet-two-content">
            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User Today">فروع المصارف
            </p>
            <h2><span data-plugin="counterup">{{ $BanksBranchs }}</span>
            </h2>
        </div>
    </div>
</div><!-- end col -->
</a>

<div class="col-lg-12 col-md-6">
<div class="card-box widget-box-two widget-two-pink" dir="rtl">
    <i class="fi fi-rr-user widget-two-icon"></i>
    <div class="wigdet-two-content">
        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User Today">المستخدمين</p>
        <h2><span data-plugin="counterup">{{ $users }}</span>
        </h2>
    </div>
</div>
</div><!-- end col -->


</div>
<!-- end row -->

<!-- end row -->


<script>
    var hour = document.getElementById("hour");
    var minute = document.getElementById("minute");
    var seconds = document.getElementById("seconds");

    var set_clock = setInterval(
        function clock() {
            var date_now = new Date();
            var hr = date_now.getHours();
            var min = date_now.getMinutes();
            var sec = date_now.getSeconds();

            var calc_hr = (hr * 30) + (min / 2);
            var calc_min = (min * 6);
            var calc_sec = sec * 6;

            hour.style.transform = "rotate(" + calc_hr + "deg)";
            minute.style.transform = "rotate(" + calc_min + "deg)";
            seconds.style.transform = "rotate(" + calc_sec + "deg)";
        }, 1000);

    VanillaTilt.init(document.querySelector(".container"), {
        max: 15,
        speed: 400,
        glare: true,
        "max-glare": 0.2
    });
</script>
@endsection

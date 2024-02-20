@extends('layout.main')
@section('content')
@section('title_content_main')
    لوحه التحكم
@section('title_content_sub')
    الرئيسيه
@endsection
@endsection
<style>

</style>

{{-- <img src="{{ url('assets/images/logo.png') }}" alt="" srcset="" width="70%">  --}}



{{-- <div class="row_">

<div class="container">
    <div class="col-lg-2 col-md-6">
        <div class="card-box widget-box-two widget-two-primary flex justify-start" dir="ltr">
            <i class="fi fi-rr-users-alt widget-two-icon"></i>
            <div class="wigdet-two-content">
                <p class="m-0 text-uppercase font-600 font-secondary text-overflow " title="employees">تقاعد</p>
                <h2>
                    <span data-plugin="counterup">{{ $employees }}</span>
                </h2>
            </div>
        </div>
    </div>

    <div class="col-lg-2 col-md-6">
        <div class="card-box widget-box-two widget-two-primary flex justify-start" dir="ltr">
            <i class="fi fi-rr-users-alt widget-two-icon"></i>
            <div class="wigdet-two-content">
                <p class="m-0 text-uppercase font-600 font-secondary text-overflow " title="employees">تقاعد</p>
                <h2>
                    <span data-plugin="counterup">{{ $employees }}</span>
                </h2>
            </div>
        </div>
    </div>
</div>
<div class="colmn_glass">
    <div class="container_calculator">
        <div class="container">

            <form class="calculator" name="calc">
                <textarea name="txt" readonly class="value" rows="3"></textarea>
                <span class="num clear" onclick="calc.txt.value = ''">c</span>
                <span class="num" onclick="document.calc.txt.value +='/'">/</span>
                <span class="num" onclick="document.calc.txt.value +='*'">*</span>
                <span class="num" onclick="document.calc.txt.value +='7'">7</span>
                <span class="num" onclick="document.calc.txt.value +='8'">8</span>
                <span class="num" onclick="document.calc.txt.value +='9'">9</span>
                <span class="num" onclick="document.calc.txt.value +='-'">-</span>
                <span class="num" onclick="document.calc.txt.value +='4'">4</span>
                <span class="num" onclick="document.calc.txt.value +='5'">5</span>
                <span class="num" onclick="document.calc.txt.value +='6'">6</span>
                <span class="num plus" onclick="document.calc.txt.value +='+'">+</span>
                <span class="num" onclick="document.calc.txt.value +='1'">1</span>
                <span class="num" onclick="document.calc.txt.value +='2'">2</span>
                <span class="num" onclick="document.calc.txt.value +='3'">3</span>
                <span class="num" onclick="document.calc.txt.value +='0'">0</span>
                <span class="num" onclick="document.calc.txt.value +='00'">00</span>
                <span class="num" onclick="document.calc.txt.value +='.'">.</span>
                <span class="num equal" onclick="document.calc.txt.value =eval(calc.txt.value)">=</span>
            </form>
        </div>
    </div>
    <div class="clock">
        <img src="https://dl.dropbox.com/s/f3b3lyanili7zl2/clock%20template-01.svg?raw=1">

        <div class="hour hand" id="hour"></div>
        <div class="minute hand" id="minute"></div>
        <div class="seconds hand" id="seconds"></div>
    </div>
</div>


</div> --}}

<div class="col-lg-2 col-md-6">
<div class="card-box widget-box-two widget-two-primary flex justify-start" dir="ltr">
    {{-- <i class="mdi mdi-chart-areaspline "></i> --}}
    <i class="fi fi-rr-users-alt widget-two-icon"></i>
    <div class="wigdet-two-content">
        <p class="m-0 text-uppercase font-600 font-secondary text-overflow " title="employees">تقاعد</p>
        <h2>
            <span data-plugin="counterup">{{ $retireds }}</span>
        </h2>
    </div>
</div>
</div><!-- end col -->
<div class="col-lg-2 col-md-6">
<div class="card-box widget-box-two widget-two-primary flex justify-start" dir="ltr">
    {{-- <i class="mdi mdi-chart-areaspline "></i> --}}
    <i class="fi fi-rr-users-alt widget-two-icon"></i>
    <div class="wigdet-two-content">
        <p class="m-0 text-uppercase font-600 font-secondary text-overflow " title="employees">منقطعين</p>
        <h2>
            <span data-plugin="counterup">{{ $stoppings }}</span>
            {{-- <small><i class="mdi mdi-arrow-up text-success"></i></small> --}}
        </h2>
        {{-- <p class="text-muted m-0"><b>Last:</b> 30.4k</p> --}}
    </div>
</div>
</div><!-- end col -->
<div class="col-lg-3 col-md-6">
<div class="card-box widget-box-two widget-two-warning" dir="ltr">
    {{-- <i class="mdi mdi-layers widget-two-icon"></i> --}}
    <i class="fi fi-rs-city widget-two-icon"></i>
    <div class="wigdet-two-content">
        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title=employees"> الهروب </p>
        <h2><span data-plugin="counterup">{{ $fleeings }} </span>
            {{-- <small><i class="mdi mdi-arrow-up text-success"></i></small> --}}
        </h2>
        {{-- <p class="text-muted m-0"><b>Last:</b> 40.33k</p> --}}
    </div>
</div>
</div><!-- end col -->
<div class="col-lg-5 col-md-6">
<div class="card-box widget-box-two widget-two-warning" dir="ltr">
    {{-- <i class="mdi mdi-layers widget-two-icon"></i> --}}
    <i class="fi fi-rs-city widget-two-icon"></i>
    <div class="wigdet-two-content">
        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="employees">كل الموظفين</p>
        <h2><span data-plugin="counterup">{{ $allEmployees }} </span>
            {{-- <small><i class="mdi mdi-arrow-up text-success"></i></small> --}}
        </h2>
        {{-- <p class="text-muted m-0"><b>Last:</b> 40.33k</p> --}}
    </div>
</div>
</div><!-- end col -->

<div class="col-lg-5 col-md-6">
<div class="card-box widget-box-two widget-two-danger" dir="ltr">
    {{-- <i class="mdi mdi-access-point-network"></i> --}}
    <i class="fi fi-rs-users-alt widget-two-icon"></i>
    <div class="wigdet-two-content">
        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">الموظفين المدنيين</p>
        <h2><span data-plugin="counterup">{{ $employees }}</span>
            {{-- <small><i class="mdi mdi-arrow-up text-success"></i></small> --}}
        </h2>
        {{-- <p class="text-muted m-0"><b>Last:</b> 30.4k</p> --}}
    </div>
</div>
</div><!-- end col -->
<div class="col-lg-2 col-md-6">
<div class="card-box widget-box-two widget-two-danger" dir="ltr">
    {{-- <i class="mdi mdi-access-point-network"></i> --}}
    <i class="fi fi-rs-users-alt widget-two-icon"></i>
    <div class="wigdet-two-content">
        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">الضباط</p>
        <h2><span data-plugin="counterup">{{ $employeesOfficer }}</span>
            {{-- <small><i class="mdi mdi-arrow-up text-success"></i></small> --}}
        </h2>
        {{-- <p class="text-muted m-0"><b>Last:</b> 30.4k</p> --}}
    </div>
</div>
</div><!-- end col -->

<div class="col-lg-5 col-md-6">
<div class="card-box widget-box-two widget-two-success" dir="ltr">
    {{-- <i class="mdi-account-key widget-two-icon"></i> --}}
    <i class="fi fi-rr-user widget-two-icon"></i>
    <div class="wigdet-two-content">
        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User Today">المستخدمين</p>
        <h2><span data-plugin="counterup">{{ $users }}</span>
            {{-- <small><i class="mdi mdi-arrow-down text-danger"></i></small> --}}
        </h2>
        {{-- <p class="text-muted m-0"><b>Last:</b> 1250</p> --}}
    </div>
</div>
</div><!-- end col -->
<div class="col-lg-6 col-md-6">
<div class="card-box widget-box-two widget-two-success" dir="ltr">
    {{-- <i class="mdi-account-key widget-two-icon"></i> --}}
    <i class="fi fi-rr-user widget-two-icon"></i>
    <div class="wigdet-two-content">
        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User Today">المصارف</p>
        <h2><span data-plugin="counterup">{{ $Banks - 1 }}</span>
            {{-- <small><i class="mdi mdi-arrow-down text-danger"></i></small> --}}
        </h2>
        {{-- <p class="text-muted m-0"><b>Last:</b> 1250</p> --}}
    </div>
</div>
</div><!-- end col -->
<div class="col-lg-6 col-md-6">
<div class="card-box widget-box-two widget-two-success" dir="ltr">
    {{-- <i class="mdi-account-key widget-two-icon"></i> --}}
    <i class="fi fi-rr-user widget-two-icon"></i>
    <div class="wigdet-two-content">
        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User Today">الوحدات</p>
        <h2><span data-plugin="counterup">{{ $unitsBranch - 1 }}</span>
            {{-- <small><i class="mdi mdi-arrow-down text-danger"></i></small> --}}
        </h2>
        {{-- <p class="text-muted m-0"><b>Last:</b> 1250</p> --}}
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

{{-- @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="row mb-3">
        <label for="username" class="col-md-4 col-form-label text-md-end">user name</label>

        <div class="col-md-6">
            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                name="username" value="{{ old('username') }}">

            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="password" class="col-md-4 col-form-label text-md-end">password</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>


    <button type="submit" class="btn btn-primary">
        login
    </button>


</form> --}}


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/logo.ico">
    <!-- App title -->
    <title>Login to MMS System</title>

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

    <script src="assets/js/modernizr.min.js"></script>

</head>

<style>
    .loginform{
        display: flex;
        height: 350px;
    }
</style>

<body class="bg-transparent">

    <!-- HOME -->
    <section>
        <div class="container-alt">
            <div class="row">
                <div class="col-sm-12">
                    <div class="wrapper-page">

                        <div class="m-t-40 account-pages loginform">               
                            
                        <span><img src="assets/images/logo.jpg" alt="" height="300"></span>

                            <!-- <div class="text-center account-logo-box">
                                <h2 class="text-uppercase">
                                    <a href="index.html" class="text-success">
                                        <span><img src="assets/images/logo.ico" alt="" height="100"></span>
                                    </a>
                                </h2>
                                <h4 class="text-uppercase font-bold m-b-0">Sign In</h4>
                            </div> -->
                            <div class="account-content">

                                <form method="POST" class="form-horizontal" action="{{ route('login') }}"  dir="rtl">
                                    @csrf


                                    <br><br>
                                    <div class="form-group " >
                                        <div class="col-xs-12">
                                            <input class="form-control @error('username') is-invalid @enderror"
                                                type="text" required="" name="username" placeholder="اسم المستخدم"
                                                value="{{ old('username') }}">

                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
<br>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <input class="form-control" type="password" required=""
                                              name="password"  placeholder="كلمة المرور">
                                              @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <div class="col-xs-12">
                                            <div class="checkbox checkbox-success">
                                                <input id="checkbox-signup" type="checkbox" checked>
                                                <label for="checkbox-signup">
                                                    تذكرني
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="form-group text-center m-t-30">
                                        <div class="col-sm-12">
                                            <a href="page-recoverpw.html" class="text-muted"><i
                                                    class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                                        </div>
                                    </div> -->

                                    <div class="form-group account-btn text-center m-t-10">
                                        <div class="col-xs-12">
                                            <button class="btn w-lg btn-bordered btn-danger waves-effect waves-light"
                                                type="submit">تسجيل الدخول</button>
                                        </div>
                                    </div>

                                </form>

                                <div class="clearfix"></div>

                            </div>
                        </div>
                        <!-- end card-box-->


                        <!-- <div class="row m-t-50">
                            <div class="col-sm-12 text-center">
                                <p class="text-muted">Don't have an account? <a href="page-register.html"
                                        class="text-primary m-l-5"><b>Sign Up</b></a></p>
                            </div>
                        </div> -->

                    </div>
                    <!-- end wrapper -->

                </div>
            </div>
        </div>
    </section>
    <!-- END HOME -->

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>

    <!-- App js -->
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>

</body>

</html>

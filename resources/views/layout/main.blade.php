<!DOCTYPE html>
<html dir="rtl">

<head>
    @extends('layout.head')
</head>


<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        @extends('layout.header')
        <!-- Top Bar End -->


        <!-- ========== Left Sidebar Start ========== -->
        @extends('layout.sidebar')
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start Right Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="page-title-box">
                                <h4 class="page-title">لوحة التحكم</h4>
                                <ol class="breadcrumb p-0 m-0">
                                    <li>
                                        <a href="#">الخدمات الطبية</a>
                                    </li>
                                    <li>
                                        <a href="#"> @yield('title_content_main')</a>
                                    </li>
                                    <li class="active">
                                        @yield('title_content_sub')
                                    </li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    @yield('content')


                </div> <!-- container -->

            </div> <!-- content -->

            @extends('layout.footer')

        </div>


        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    {{-- @extends('layout.scriptPage') --}}
</body>

</html>

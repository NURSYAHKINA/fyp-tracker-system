@include('admin.layouts.master')

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="dark-topbar">
    <!-- Page Content-->
    <div class="page-content">

        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-8">
                    <div class="page-title-box">
                        <div class="float-center">
                        </div>
                    </div><!--end page-title-box-->
                </div><!--end col-->
            </div>
            <!-- end page title end breadcrumb -->

            <!-- <div class="row">                         -->
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body center">
                            <div id='calendar'>
                            </div>
                            <div style='clear:both'></div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end col-->
                <!-- </div>End row  -->

            </div><!-- container -->

        </div>
        <!-- end page content -->


    </div>


</body>

</html>
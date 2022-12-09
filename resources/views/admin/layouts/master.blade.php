<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>:: My-Task:: Employee Dashboard </title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->



    <!-- plugin css file  -->

    <link rel="stylesheet" href="admin/dist/assets/plugin/datatables/responsive.dataTables.min.css">
    <link rel="stylesheet" href="admin/dist/assets/plugin/datatables/dataTables.bootstrap5.min.css">
    
    
    <!-- project css file  -->
    <link rel="stylesheet" href="admin/dist/assets/css/my-task.style.min.css">
</head>
<body>

<div id="mytask-layout" class="theme-indigo">
    
    <!-- sidebar -->
   
    {{View::make('admin.layouts.sidebar')}}

    <!-- main body area -->
    <div class="main px-lg-4 px-md-4">

        <!-- Body: Header -->
        
        {{View::make('admin.layouts.header')}}

        <!-- Body: Body -->
       @yield('content') 
   
   
   
    </div>
</div>

<!-- Jquery Core Js -->
<script src="/admin/dist/assets/bundles/libscripts.bundle.js"></script>

<!-- Plugin Js-->
<script src="../admin/dist/assets/bundles/apexcharts.bundle.js"></script>
<script src="../admin/dist/assets/bundles/dataTables.bundle.js"></script>

<!-- Jquery Page Js -->
<script src="../admin/js/template.js"></script>
<script src="../admin/js/page/hr.js"></script>
<script src="../admin/js/page/index.js"></script>
</body>
</html> 
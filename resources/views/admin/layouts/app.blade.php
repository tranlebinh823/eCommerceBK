<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.blocks.head')



</head>

<body class="body-padding body-p-top light-theme">
    <!-- header start -->
    @include('admin.layouts.blocks.header')
    <!-- header end -->
    <!-- main sidebar start -->
    @include('admin.layouts.blocks.main-sidebar')
    <!-- main sidebar end -->

    <!-- main content start -->
    <div class="main-content">
        @include('admin.layouts.blocks.title')
        @yield('content')
        <!-- footer start -->
        @include('admin.layouts.blocks.footer')
        <!-- footer end -->
    </div>
    <!-- main content end -->
</body>
<script src="{{ asset('administrator/dashboard/assets/vendor/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('administrator/dashboard/assets/vendor/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('administrator/dashboard/assets/vendor/js/ckeditor.js') }}"></script>
<script src="{{ asset('administrator/dashboard/assets/vendor/js/jquery.uploader.min.js') }}"></script>
<script src="{{ asset('administrator/dashboard/assets/vendor/js/select2.min.js') }}"></script>
<script src="{{ asset('administrator/dashboard/assets/vendor/js/moment.min.js') }}"></script>
<script src="{{ asset('administrator/dashboard/assets/vendor/js/bootstrap-material-datetimepicker.js') }}"></script>
<script src="{{ asset('administrator/dashboard/assets/vendor/js/selectize.min.js') }}"></script>
<script src="{{ asset('administrator/dashboard/assets/vendor/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('administrator/dashboard/assets/js/main.js') }}"></script>
<script src="{{ asset('administrator/dashboard/assets/js/select2-init.js') }}"></script>
<script src="{{ asset('administrator/dashboard/assets/js/add-product.js') }}"></script>

<script src="{{ asset('administrator/dashboard/assets/vendor/js/apexcharts.js') }}"></script>
<script src="{{ asset('administrator/dashboard/assets/vendor/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('administrator/dashboard/assets/vendor/js/daterangepicker.js') }}"></script>
<script src="{{ asset('administrator/dashboard/assets/js/dashboard.js') }}"></script>
<script src="{{ asset('administrator/dashboard/assets/js/category.js') }}"></script>
<script src="{{ asset('administrator/dashboard/assets/vendor/js/jquery.uploader.min.js') }}"></script>


<script src="{{ asset('administrator/dashboard/assets/vendor/js/html2canvas.min.js') }}"></script>
<script src="{{ asset('administrator/dashboard/assets/vendor/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('administrator/dashboard/assets/js/order-list.js') }}"></script>
<script src="{{ asset('administrator/dashboard/assets/vendor/js/jquery.table2excel.min.js') }}"></script>

</html>

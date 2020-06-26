<!-- BEGIN VENDOR JS-->
<script src="{{asset('js/vendors.min.js')}}"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{asset('vendors/formatter/jquery.formatter.min.js')}}"></script>
<script src="{{asset('vendors/croppie/js/croppie.js')}}"></script>
@yield('vendor-script')
@include('sweetalert::alert')
<!-- END PAGE VENDOR JS-->
<!-- BEGIN THEME  JS-->
<script src="{{asset('js/plugins.js')}}"></script>
<!-- <script src="{{asset('js/search.js')}}"></script> -->
<script src="{{asset('js/custom/custom-script.js')}}"></script>
<!-- END THEME  JS-->
<!-- BEGIN PAGE LEVEL JS-->
@yield('page-script')
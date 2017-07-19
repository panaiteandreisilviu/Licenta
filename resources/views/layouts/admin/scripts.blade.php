{{-- ------------------  SCRIPTS ------------------ --}}

{{--<!-- jQuery 2.2.3 -->--}}
{{--<script src="{{ URL::asset('AdminLTE-2.3.11/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>--}}


<!-- LARAVEL APP JS -->
<script>
    window.Laravel = { csrfToken: '{{ csrf_token() }}' };
</script>

<script src="{{ URL::asset('js/app.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ URL::asset('AdminLTE-2.3.11/dist/js/app.min.js') }}"></script>

<!-- Bootstrap 3.3.6 -->
<script src="{{ URL::asset('AdminLTE-2.3.11/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- FastClick -->
<script src="{{ URL::asset('AdminLTE-2.3.11/plugins/fastclick/fastclick.js') }}"></script>
<!-- Sparkline -->
<script src="{{ URL::asset('AdminLTE-2.3.11/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ URL::asset('AdminLTE-2.3.11/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ URL::asset('AdminLTE-2.3.11/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{{ URL::asset('AdminLTE-2.3.11/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- ChartJS 1.0.1 -->
<script src="{{ URL::asset('AdminLTE-2.3.11/plugins/chartjs/Chart.min.js') }}"></script>

<!-- DataTables -->
<script src="{{ URL::asset('AdminLTE-2.3.11/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('AdminLTE-2.3.11/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ URL::asset('AdminLTE-2.3.11/dist/js/demo.js') }}"></script>
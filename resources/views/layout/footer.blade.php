<footer class="main-footer">
 <div class="text-center">Nguyễn Hoàng Phúc - Ps12099</div>
  <div class="float-right d-none d-sm-inline-block">
  </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>

<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- Page specific script -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

{{-- -- Ship -- --}}
<script type="text/javascript">
  $(document).ready(function(){
      $('.choose').on('change',function(){
          var action = $(this).attr('id');
          var ma_id =  $(this).val();
          var _token = $('input[name="_token"]').val();
          var result = '';

          if(action=='city'){
              result = 'district';
          }else{
              result = 'village';
          }
          console.log("ma_id", ma_id);
          $.ajax({
              url: '{{url('/feeship/add')}}',
              method: 'POST',
              data: {action:action, ma_id:ma_id, _token:_token},
              success:function(data){
                  $('#'+result).html(data);
              }
          });
      });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
      $('.choose').on('change',function(){
          var action = $(this).attr('id');
          var ma_id =  $(this).val();
          var _token = $('input[name="_token"]').val();
          var result = '';

          if(action=='city'){
              result = 'district';
          }else{
              result = 'village';
          }
          console.log("ma_id", ma_id);
          $.ajax({
              url: '{{url('/feeship/update')}}',
              method: 'POST',
              data: {action:action, ma_id:ma_id, _token:_token},
              success:function(data){
                  $('#'+result).html(data);
              }
          });
      });
  });
</script>
</body>
</html>

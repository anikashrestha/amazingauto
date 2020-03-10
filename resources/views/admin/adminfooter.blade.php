
  </div>
  <footer class="main-footer">
    <strong>Copyright &copy; <a href="">ESC Pvt Ltd</a>.</strong> All rights
    reserved.
  </footer>



 

<!-- ./wrapper -->


<!-- jQuery 3 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>


<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('dist/js/custom.js') }}"></script>
<script src="{{ asset('dist/js/partnerproduct.js') }}"></script>
<script src="{{ asset('dist/js/partnerservice.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>	
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.6/jquery.fancybox.js"></script>

@yield('script-import-section')

<script>
   
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif;
        @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}");
        @endif;
        @yield('script-section');


  $('form').on('focus', 'input[type=number]', function (e) {
  $(this).on('mousewheel.disableScroll', function (e) {
    e.preventDefault()
  })
  })
  $('form').on('blur', 'input[type=number]', function (e) {
  $(this).off('mousewheel.disableScroll')
  })
  
     $('#imageButton').click(function(){
        $('#imageModal').modal('show');
    });
   
    

</script>


@yield('script')
	

</body>
</html>

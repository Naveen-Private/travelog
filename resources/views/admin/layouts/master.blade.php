<!DOCTYPE html>
<html lang="en">
  @include('admin.includes.head')
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title">{{ HTML::image('assets/Logo.png', 'Travelog',array('height' => '50')) }} <span>Travelog</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Admin</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
           @include('admin.includes.sidebar')
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        @include('admin.includes.navbar')
        <!-- /top navigation -->

        <!-- page content -->
        @yield('main_content')
        
        <!-- /page content -->

        <!-- footer content -->
       @include('admin.includes.footer')
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    {!! HTML::script('assets/admin/vendors/jquery/dist/jquery.min.js') !!}
   <!-- Bootstrap -->
    {!! HTML::script('assets/admin/vendors/bootstrap/dist/js/bootstrap.min.js') !!}
   <!-- FastClick -->
    {!! HTML::script('assets/admin/vendors/fastclick/lib/fastclick.js') !!}
   <!-- NProgress -->
    {!! HTML::script('assets/admin/vendors/nprogress/nprogress.js') !!}
    
    <!-- Datatables -->
    {!! HTML::script('assets/admin/vendors/datatables.net/js/jquery.dataTables.min.js') !!}
    {!! HTML::script('assets/admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}
    {!! HTML::script('assets/admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') !!}
    {!! HTML::script('assets/admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') !!}
    {!! HTML::script('assets/admin/vendors/datatables.net-buttons/js/buttons.flash.min.js') !!}
    {!! HTML::script('assets/admin/vendors/datatables.net-buttons/js/buttons.html5.min.js') !!}
    {!! HTML::script('assets/admin/vendors/datatables.net-b/datatables.netuttons/js/buttons.print.min.js') !!}
    {!! HTML::script('assets/admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') !!}
    {!! HTML::script('assets/admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') !!}
    {!! HTML::script('assets/admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') !!}
    {!! HTML::script('assets/admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') !!}
    {!! HTML::script('assets/admin/vendors/datatables.net-scroller/js/datatables.scroller.min.js') !!}
    {!! HTML::script('assets/admin/vendors/jszip/dist/jszip.min.js') !!}
    {!! HTML::script('assets/admin/vendors/pdfmake/build/pdfmake.min.js') !!}
    {!! HTML::script('assets/admin/vendors/pdfmake/build/vfs_fonts.js') !!}
    
   <!-- Custom Theme Scripts -->
    {!! HTML::script('assets/admin/build/js/custom.min.js') !!}
    
    <!-- custom scripts for specific pages-->
    {!! HTML::script('assets/admin/js/customscripts.js') !!}
  </body>
</html>

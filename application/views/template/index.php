<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" <img href="<?php echo $base; ?>/public/images/LicActive.png" alt="" />
    <title>App MUGEN</title>

    <!-- Bootstrap -->
    <link href="<?php echo $base; ?>public/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo $base; ?>public/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo $base; ?>public/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo $base; ?>public/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="<?php echo $base; ?>public/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo $base; ?>public/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo $base; ?>public/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo $base; ?>public/build/css/custom.min.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="<?php echo $base; ?>public/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $base; ?>public/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $base; ?>public/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $base; ?>public/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $base; ?>public/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">


</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i class="fa fa-laptop"></i> <span>MUGEN</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="<?php echo $base; ?>public/production/images/img.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Halo</span>
                            <h2>Admin</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>MENU</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-users"></i> Security<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a onclick="ToController('c_role', 'Data Role')">Role application</a></li>

                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-database"></i> Master <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">


                                        <li><a onclick="ToController('c_customer', 'Data Customer ')">Customer</a></li>
                                        <li><a onclick="ToController('c_size', 'Data Size ')">Size</a></li>
                                        <li><a onclick="ToController('c_warna', 'Data warna ')">Warna</a></li>
                                        <li><a onclick="ToController('c_kategory', 'Data kategory ')">Kategory</a></li>
                                        <li><a onclick="ToController('c_slider', 'Data Slider')">Slider</a></li>

                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-globe"></i> CMS<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a onclick="ToController('c_role', 'Data Role')">Kategory Berita</a></li>
                                        <li><a onclick="ToController('c_role', 'Data Role')">Semua Berita</a></li>
                                        <li><a onclick="ToController('c_role', 'Data Role')">Tambah Berita</a></li>
                                        <li><a onclick="ToController('c_role', 'Data Role')">Semua Halaman</a></li>
                                        <li><a onclick="ToController('c_role', 'Data Role')">Tambah Halaman</a></li>

                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-shopping-cart"></i>Data Transaksi<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a onclick="ToController('c_transaksi', 'Data Transaksi')">Data Transaksi</a></li>

                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-print"></i> Laporan <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <!--<li><a onclick="ToController('c_role', 'Data Role')">Role application</a></li>
-->
                                    </ul>
                                </li>
                            </ul>
                        </div>


                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div id="contentdata"></div>
                    </div>
                </div>

            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo $base; ?>public/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo $base; ?>public/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo $base; ?>public/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo $base; ?>public/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?php echo $base; ?>public/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="<?php echo $base; ?>public/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo $base; ?>public/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo $base; ?>public/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="<?php echo $base; ?>public/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?php echo $base; ?>public/vendors/Flot/jquery.flot.js"></script>
    <script src="<?php echo $base; ?>public/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo $base; ?>public/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?php echo $base; ?>public/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?php echo $base; ?>public/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?php echo $base; ?>public/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?php echo $base; ?>public/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?php echo $base; ?>public/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?php echo $base; ?>public/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo $base; ?>public/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="<?php echo $base; ?>public/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?php echo $base; ?>public/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo $base; ?>public/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo $base; ?>public/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo $base; ?>public/build/js/custom.min.js"></script>
    <!-- Datatables -->
    <script src="<?php echo $base; ?>public/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo $base; ?>public/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo $base; ?>public/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo $base; ?>public/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo $base; ?>public/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo $base; ?>public/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo $base; ?>public/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo $base; ?>public/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo $base; ?>public/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo $base; ?>public/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo $base; ?>public/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo $base; ?>public/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?php echo $base; ?>public/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?php echo $base; ?>public/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo $base; ?>public/vendors/pdfmake/build/vfs_fonts.js"></script>

</body>

</html>
<script type="text/javascript">
    var contentcontroller, urlmenu, Root;
    contentcontroller = $("#contentdata");

    ROOT = {
        'base_url': '<?php echo $base; ?>',
        'site_url': '<?php echo $site; ?>',
    }

    function ToController(controller, title) {
        urlmenu = ROOT.site_url + '/' + controller;
        contentcontroller.load(urlmenu);
        return false;
        urlmenu.empty();
    }

    function load_form(url, title) {
        contentcontroller.load(url);
    }
</script>
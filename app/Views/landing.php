<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kecamatan Buntu Pane</title>
    <!-- Bootstrap -->
    <link href="/landing/css/bootstrap.min.css" rel="stylesheet">
    <!-- Hover CSS -->
    <!-- <link rel="stylesheet" href="/landing/css/hover.css"> -->
    <!-- Reset CSS -->
    <link rel="stylesheet" href="/landing/css/reset.css">
    <!-- Slick CSS  -->
    <link rel="stylesheet" href="/landing/slick/slick.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="/landing/css/font-awesome.min.css">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="/landing/style.css">
    <!-- The Leader colors. We have chosen the color Orange for this default
          page. However, you can choose any other color by changing color css file.
    -->
    <link rel="stylesheet" type="text/css" href="/landing/css/colors/default-orange.css">
    <!-- <link rel="stylesheet" type="text/css" href="/landing/css/colors/green.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="/landing/css/colors/mustard.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="/landing/css/colors/pink.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="/landing/css/colors/turquoise.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="/landing/css/colors/purple.css"> -->

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="/landing/css/responsive.css">
    <!--[if lt IE 9]>
      <script src="/landing/https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="/landing/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="js">
    <!-- Page loader -->
    <div id="preloader"></div>
    <!-- MENU section START -->
    <div class="menu-area">
        <nav class="navbar menu-section">
            <div class="container menuborder">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/landing/#">
                        <img src="/logo.png" alt="team-leader" width="200px" />
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse search-relative navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav menu navbar-right navbar-nav">
                        <?php if(session()->get('name')): ?>
                        <li><a href="/dashboard"><?=session()->get('name')?></a></li>
                        <?php else: ?>
                        <li><a href="/login">Masuk</a></li>
                        <?php endif ?>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </div>
    <!-- END of MENU section -->
    <!-- HOME section START -->
    <section class="home-area" id="home">
        <div class="overlay" style="position: absolute;background:rgba(0,0,0,0.5);width:100%;height:100%;top:0;left:0;"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="welcome-text text-center">
                        <h1>Kecamatan Buntu Pane</h1>
                        <p style="margin-top: 20px;color:#FFF;font-size:18px">adalah suatu dinas yang memiliki tugas untuk mengatur dan mengelola bidang pekerjaan umum, khususnya dalam hal penataan ruang, bangunan gedung, perumahan, air bersih, dan penyehatan lingkungan pemukiman. Dinas ini juga berperan dalam pengelolaan infrastruktur, seperti air minum, air limbah, drainase, dan persampahan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END of HOME section -->
    
    <!-- COPYRIGHT section START -->
    <div class="copyright-section">
        <div class="container copyright">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <div class="copyright-text">
                        <p>&copy; Kecamatan Buntu Pane Kabupaten Asahan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END of COPYRIGHT section -->
    <!-- Go to TOP -->
    <a href="javascript:void(0)" id="return-to-top"><i class="fa fa-angle-up"></i></a>
    <!-- === Include Related JavaScripts === -->
    <!-- Google Map API -->
    <script src="/landing/https://maps.googleapis.com/maps/api/js?key=AIzaSyCn4uayw359fjMh4P9i2rKKZYHzXaqTRNs"></script>
    <!-- jQuery Main JS -->
    <script src="/landing/js/jquery.min.js"></script>
    <!-- jquery sticky js -->
    <script src="/landing/js/jquery.sticky.js"></script>
    <!-- Bootstrap JS -->
    <script src="/landing/js/bootstrap.min.js"></script>
    <!-- Slick JS -->
    <script src="/landing/slick/slick.min.js"></script>
    <!-- WayPoints JS -->
    <script src="/landing/js/waypoints.min.js"></script>
    <!-- Counter UP JS -->
    <script src="/landing/js/jquery.counterup.min.js"></script>
    <!-- NAV JS -->
    <script src="/landing/js/jquery.nav.js"></script>
    <!-- Google Map Active JS -->
    <script src="/landing/js/gmap.js"></script>
    <!-- Main Active JS -->
    <script src="/landing/js/active.js"></script>
</body>
</html>
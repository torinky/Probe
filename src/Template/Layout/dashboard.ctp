<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?= $this->fetch('title') ?></title>
    <!-- Favicon-->
    <link rel="icon" href="../node_modules/adminbsb-materialdesign/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
<!--    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">-->
<!--    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">-->
    <link rel="stylesheet" href="../iconfont/material-icons.css">

    <!-- Bootstrap Core Css -->
    <link href="../node_modules/adminbsb-materialdesign/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../node_modules/adminbsb-materialdesign/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../node_modules/adminbsb-materialdesign/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../node_modules/adminbsb-materialdesign/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../node_modules/adminbsb-materialdesign/css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->
<div class="search-bar">
    <div class="search-icon">
        <i class="material-icons">search</i>
    </div>
    <input type="text" placeholder="START TYPING...">
    <div class="close-search">
        <i class="material-icons">close</i>
    </div>
</div>
<!-- #END# Search Bar -->
<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
<!--            <a class="navbar-brand" href="../node_modules/adminbsb-materialdesign/index.html">ADMINBSB - MATERIAL DESIGN</a>-->
            <a class="navbar-brand" href="<?= $this->fetch('resetUrl') ?>"><?= $this->fetch('title') ?></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <?= $this->fetch('topBar') ?>
        </div>
    </div>
</nav>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <?= $this->fetch('leftSideBar') ?>
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
            </div>
            <div class="version">
                <b>Version: </b> 1.0.5
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <?= $this->fetch('rightSideBar') ?>
    </aside>
    <!-- #END# Right Sidebar -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <?= $this->fetch('content') ?>
        </div>
    </div>
</section>

<!-- Jquery Core Js -->
<script src="../node_modules/adminbsb-materialdesign/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="../node_modules/adminbsb-materialdesign/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="../node_modules/adminbsb-materialdesign/plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="../node_modules/adminbsb-materialdesign/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="../node_modules/adminbsb-materialdesign/plugins/node-waves/waves.js"></script>

<!-- Custom Js -->
<script src="../node_modules/adminbsb-materialdesign/js/admin.js"></script>

<!-- Demo Js -->
<script src="../node_modules/adminbsb-materialdesign/js/demo.js"></script>
</body>

</html>
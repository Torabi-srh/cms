<?php 
require '../assets/functions.php';
if (!login_check()) {
    safeRedirect("/admin/login.php");die();exit();
}
$mysqli = isset($mysqli) ? $mysqli : Connection();
require '../assets/db.php';
user_activitys();

$header_q_ = basename($_SERVER['PHP_SELF']);
$SERVER_REQ = urldecode($_SERVER['REQUEST_URI']);   
if (isUrlSafe($SERVER_REQ) > -1) {
    safeRedirect("$restsz");die();exit();
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">  
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
        <!-- Title -->
        <title>Admin Dashboard</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <!--<link href="/admin/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/admin/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
        <link href="/admin/assets/plugins/icomoon/style.css" rel="stylesheet">
        <link href="/admin/assets/plugins/uniform/css/default.css" rel="stylesheet"/>
        <link href="/admin/assets/plugins/switchery/switchery.min.css" rel="stylesheet"/>
        <link href="/admin/assets/plugins/nvd3/nv.d3.min.css" rel="stylesheet">  
        <link href="/admin/assets/plugins/gridgallery/css/component.css" rel="stylesheet">
        <script src="/admin/assets/plugins/gridgallery/js/modernizr.custom.js"></script> 
        <link href="assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet" type="text/css"/>	
        <!-- <link href="assets/plugins/summernote-master/summernote.css" rel="stylesheet" type="text/css"/>  -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.7/summernote.css" rel="stylesheet"> 
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" /> -->
        <!-- Theme Styles -->
        <link href="/admin/assets/css/space.min.css" rel="stylesheet">
        <link href="/admin/assets/css/themes/admin3.css" rel="stylesheet">
        <link href="/admin/assets/css/custom.css" rel="stylesheet">
        <link href="/admin/assets/css/summernote-ext-emoji-ajax.css" rel="stylesheet">
        <link href="../css/toastr.css" rel="stylesheet">
    </head>
    <body> 
        <!-- Page Container -->
        <div class="page-container">
            <!-- Page Sidebar -->
            <div class="page-sidebar">
                <a class="logo-box" href="/">
                    <span><?php echo site_title; ?></span> 
                    <i class="icon-close" id="sidebar-toggle-button-close"></i>
                </a>
                <div class="page-sidebar-inner">
                    <div class="page-sidebar-menu">
                        <ul class="accordion-menu">
                            <li class="active-page">
                                <a href="/admin/index.php">
                                    <i class="menu-icon icon-home4"></i><span>Site</span>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="/admin/messages.php">
                                    <i class="menu-icon icon-inbox"></i><span>Messages</span>
                                </a>
                            </li>  -->
                            <li>
                                <a href="/admin/languages.php">
                                    <i class="menu-icon icon-layers"></i><span>Language</span></i>
                                </a> 
                            </li>
                            <li>
                                <a href="/admin/pages.php">
                                    <i class="menu-icon icon-layers"></i><span>Pages</span></i>
                                </a> 
                            </li>
                            <li>
                                <a href="/admin/slider.php">
                                    <i class="menu-icon icon-layers"></i><span>Slider</span></i>
                                </a> 
                            </li>
                            <li>
                                <a href="/admin/upload.php">
                                    <i class="menu-icon icon-layers"></i><span>Files</span></i>
                                </a> 
                            </li>
                            <li>
                                <a href="/admin/gallery.php">
                                    <i class="menu-icon icon-layers"></i><span>Gallery</span></i>
                                </a> 
                            </li>
                            <li>
                                <a href="/admin/password.php">
                                    <i class="menu-icon icon-layers"></i><span>Password</span></i>
                                </a> 
                            </li>
                            <li class="menu-divider"></li>  
                        </ul>
                    </div>
                </div>
            </div><!-- /Page Sidebar -->
            <!-- Page Content -->
            <div class="page-content">
                <!-- Page Header -->
                <div class="page-header"> 
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <!-- Collect the nav links, forms, and other content for toggling --> 
                            <div class="collapse navbar-collapse pull-right dpcflo" id="bs-example-navbar-collapse-1"> 
                                <ul class="nav navbar-nav navbar-right"> 
                                    <li class="dropdown user user-menu">
                                        <!-- Menu Toggle Button -->
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <span class="hidden-xs">Admin</span>
                                        </a>
                    
                                        <ul class="dropdown-menu">
                                            <li><a href="/admin/index.php">Profile</a></li> 
                                            <li><a href="/admin/logout.php">Sign Out</a></li>
                                        </ul> 
                                    </li>
                                </ul>
                            </div><!-- /.navbar-collapse -->
                            <div class="seperator"></div>
                        </div><!-- /.container-fluid -->
                    </nav>
                </div>
                <!-- /Page Header -->
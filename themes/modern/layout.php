<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php echo ($page_direction == 'rtl' ? 'xml:lang="fa-ir" lang="fa-ir" dir="rtl"'  : 'xml:lang="en-gb" dir="ltr" slick-uniqueid="3" lang="en-gb"') ?>>
<head>
    <link href="/css/jcemediabox/jcemediabox.css?3ab6d4490e67378d035cce4c84ffa080" rel="stylesheet" type="text/css" />
    <link href="/css/jcemediabox/style.css?7361405241320e69bc1bfb093eb0a2f7" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=yekan:regular&amp;subset=latin" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=mj_tunisia:regular,italic&amp;subset=latin" rel="stylesheet" type="text/css" />
    <link href="/css/carousel.css" rel="stylesheet" type="text/css" />
    <link href="/css/fronts.css" rel="stylesheet" type="text/css" />
    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <?php echo ($page_direction == 'rtl' ? '<link href="/css/bootstrap-rtl.css" rel="stylesheet" type="text/css" />'  : '') ?>
    <?php echo ($page_direction == 'rtl' ? '<link href="/css/front-rtl.css" rel="stylesheet" type="text/css" />'  : '') ?>
    <link href="/css/djimageslider.css" rel="stylesheet" type="text/css" />
    <?php echo ($page_direction == 'rtl' ? '<link href="/css/djimageslider_rtl.css" rel="stylesheet" type="text/css" />'  : '') ?>
    <link href="/css/mosaic.css" rel="stylesheet" type="text/css" />
    <link href="/css/settings.css" rel="stylesheet" type="text/css" />
    <link href="/css/flag-icon.min.css" rel="stylesheet" type="text/css" />
    <link href="/css/static-captions.css" rel="stylesheet" type="text/css" />
            <link rel="stylesheet" href="/css/uikit<?php echo ($page_direction == 'rtl' ? '-rtl'  : '') ?>.min.css" />
        <script src="/js/uikit.min.js"></script>
        <script src="/js/uikit-icons.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous" />
    <style type="text/css">
        body {
            font-family: yekan, sans-serif;
            font-size: 18px;
            font-weight: normal;
        }

        h1 {
            font-family: yekan, sans-serif;
            font-size: 72px;
            font-weight: normal;
        }

        h2 {
            font-family: yekan, sans-serif;
            font-size: 42px;
            font-weight: normal;
        }

        h3 {
            font-family: yekan, sans-serif;
            font-size: 32px;
            font-weight: normal;
        }

        h4 {
            font-family: yekan, sans-serif;
            font-size: 24px;
            font-weight: normal;
        }

        h5 {
            font-family: yekan, sans-serif;
            font-size: 18px;
            font-weight: normal;
        }

        .sp-megamenu-parent {
            font-family: mj_tunisia, sans-serif;
            font-size: 14px;
            font-weight: normal;
        }

        #sp-header {
            background-image: url("/images/header-bg.png");
        }

        #sp-content-top {
            margin: 30px 0 25px;
        }

        #sp-main-body {
            margin: 0 0 10px 0;
        }

        #sp-clients-title {
            background-image: url("/images/orange-line.png");
            padding: 10px 0;
        }

        #sp-bottom {
            background-image: url("/images/ariab-bottom.jpg");
            padding: 19px 33px 10px;
        }

        #sp-footer {
            background-image: url("/images/ariab-footer.jpg");
        }

        #sp-content-bottom {
            background-color: #f3f4f4;
            padding: 30px 0px 20px;
            margin: -40px 0 0 0;
        }
        .topnav {
          overflow: hidden;
          background-color: #333;
          top: 0;
          z-index: 99999;
          overflow-y: auto;
          position: fixed;
          width: 100%;
        }

        /* Hide the links inside the navigation menu (except for logo/home) */
        .topnav #myLinks {
         // display: none;
        }

        /* Style navigation menu links */
        .topnav a {
          color: white;
          padding: 14px 16px;
          text-decoration: none;
          font-size: 17px;
          display: block;
        }

        /* Style the hamburger menu */
        .topnav a.icon {
          background: black;
          display: block;
          right: 0;
          top: 0;
        }

/* Add a grey background color on mouse-over */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Style the active link (or home/logo) */
.active {
  background-color: #4CAF50;
  color: white;
}
.topnav .closebtn { 
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}
.topnav a:hover {
  color: #f1f1f1;
}
/* Footer */
@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
#footer {
    padding: 60px 0;
}

section .section-title {
    text-align: center;
    color: #007b5e;
    margin-bottom: 50px;
    text-transform: uppercase;
}
#footer {
    background: #499457 !important;
}
#footer h5{
	padding-left: 10px;
    border-left: 3px solid #eeeeee;
    padding-bottom: 6px;
    margin-bottom: 20px;
    color:#ffffff;
}
#footer a {
    color: #ffffff;
    text-decoration: none !important;
    background-color: transparent;
    -webkit-text-decoration-skip: objects;
}
#footer ul.social li{
	padding: 3px 0;
}
#footer ul.social li a i {
    margin-right: 5px;
	font-size:25px;
	-webkit-transition: .5s all ease;
	-moz-transition: .5s all ease;
	transition: .5s all ease;
}
#footer ul.social li:hover a i {
	font-size:30px;
	margin-top:-10px;
}
#footer ul.social li a,
#footer ul.quick-links li a{
	color:#ffffff;
}
#footer ul.social li a:hover{
	color:#eeeeee;
}
#footer ul.quick-links li{
	padding: 3px 0;
	-webkit-transition: .5s all ease;
	-moz-transition: .5s all ease;
	transition: .5s all ease;
}
#footer ul.quick-links li:hover{
	padding: 3px 0;
	margin-left:5px;
	font-weight:700;
}
#footer ul.quick-links li a i{
	margin-right: 5px;
}
#footer ul.quick-links li:hover a i {
    font-weight: 700;
}

@media (max-width:767px){
	#footer h5 {
    padding-left: 0;
    border-left: transparent;
    padding-bottom: 0px;
    margin-bottom: 10px;
}
}
    </style>
    <script src="/js/plugins/jcemediabox/jcemediabox.js?2ee2100a9127451a41de5a4c2c62e127" type="text/javascript"></script>
    <script src="/js/jquery.min.js" type="text/javascript"></script>
    <script src="/js/script.js" type="text/javascript"></script>
    <script src="/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/js/jquery.easing.min.js" type="text/javascript" defer="defer"></script>
    <script src="/js/slider.js?v=" type="text/javascript" defer="defer"></script>
    <script src="/js/mootools-core.js?2e4099cbdd3ce8f46c4487db1d55443d" type="text/javascript"></script>
    <script src="/js/mootools-more.js?2e4099cbdd3ce8f46c4487db1d55443d" type="text/javascript"></script>
    <script src="/js/mootools-mobile.js" type="text/javascript"></script>
    <script src="/js/rokmediaqueries.js" type="text/javascript"></script>
    <script src="/js/moofx.js" type="text/javascript"></script>
    <script src="/js/mosaic.js" type="text/javascript"></script>
    <script src="/js/jquery.themepunch.tools.min.js" type="text/javascript"></script>
    <script src="/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        JCEMediaBox.init({ popup: { width: "", height: "", legacy: 0, lightbox: 0, shadowbox: 0, resize: 1, icons: 1, overlay: 1, overlayopacity: 0.8, overlaycolor: "#000000", fadespeed: 500, scalespeed: 500, hideobjects: 0, scrolling: "fixed", close: 2, labels: { 'close': 'Close', 'next': 'Next', 'previous': 'Previous', 'cancel': 'Cancel', 'numbers': '{$current} of {$total}' }, cookie_expiry: "", google_viewer: 0 }, tooltip: { className: "tooltip", opacity: 0.8, speed: 150, position: "br", offsets: { x: 16, y: 16 } }, base: "/", imgpath: "images", theme: "standard", themecustom: "", themepath: "plugins/system/jcemediabox/themes", mediafallback: 0, mediaselector: "audio,video" });
        jQuery(function () {
            jQuery('[data-toggle="tooltip"]').tooltip({ "html": true, "container": "body" });
        });

        window.addEvent('load', function () {
            var overridden = false;
            if (!overridden && window.G5 && window.G5.offcanvas) {
                var mod = document.getElement('[data-mosaic="208"]');
                mod.addEvents({
                    touchstart: function () { window.G5.offcanvas.detach(); },
                    touchend: function () { window.G5.offcanvas.attach(); }
                });
                overridden = true;
            };
        });

    </script>

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="<?php echo $page_keywords ?>" />
    <meta name="robots" content="index, follow" />
    <meta name="title" content="<?php echo $page_title ?>" />
    <meta name="author" content="<?php echo $page_author ?>" />
    <meta name="description" content="<?php echo $page_description ?>" />
    <meta name="generator" content="CMS Generator" />
    <title>
        soroush - <?php echo $page_author ?> - <?php echo $page_title ?>
    </title>
    <link href="<?php echo $page_favicon ?>" rel="shortcut icon" type="image/x-icon" />
    <?php /* Google Analytics */ ?>
</head>
<body class="site com-sppagebuilder view-page no-layout no-task itemid-614 <?php echo ($page_direction == 'rtl' ? 'fa-ir rtl'  : 'en-gb ltr') ?> layout-boxed">
    <div class="body-innerwrapper">
        <header id="sp-header">
            <div class="container">
                <div class="row">
                    <div id="sp-logo" class="col-xs-8 col-sm-4 col-md-4">
                        <div class="sp-column ">
                            <a class="logo" href="/">
                                <h1>
                                    <img class="sp-default-logo hidden-xs" src="<?php echo $site_avatar; ?>" alt="<?php echo " $site_title_name"; ?>" style="max-height: 80px;" />
                                    <img class="sp-retina-logo hidden-xs" src="<?php echo $site_avatar; ?>" alt="<?php echo " $site_title_name"; ?>" width="291" height="80" />
                                    <img class="sp-default-logo visible-xs" src="<?php echo $site_avatar; ?>" alt="<?php echo " $site_title_name"; ?>" style="max-height: 80px;" />
                                </h1>
                            </a>
                        </div>
                    </div>
                    <div id="sp-position8" class="col-sm-5 col-md-5">
                        <div class="sp-column ">
                            <div class="sp-module  respnone">
                                <div class="sp-module-content">
                                    <div class="custom respnone">
                                        <div style="margin: 10px;">&nbsp;</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="sp-header-right" class="col-xs-4 col-sm-3 col-md-3">
                        <div class="sp-column ">
                            <div class="sp-module ">
                                <div class="sp-module-content">
                                    <div class="custom">
                                        <div class="lang-ariab">
                                            <p>
                                                <?php foreach($languages as $lang): ?>
                                                <a href="/index.php?mclang=<?php echo $lang['id'] ?>">
                                                    <span class="<?php echo $lang['image'] ?>"></span>
                                                </a>
                                                <span> &nbsp;&nbsp;</span>
                                                <?php endforeach; ?>
                                                <!--<a href="/en/">
                                                    <span class="flag-icon flag-icon-gb"></span>
                                                </a>-->
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
      <a id="offcanvas-toggler" class="visible-sm visible-xs" href="#" class="icon" style="margin-right: 18px;">
                                    <i class="fa fa-bars"></i>
                                </a>
        <section id="sp-main-menu" class="visible-md visible-lg sp-menu-row">
            <div class="container">
                <div class="row">
                    <div id="sp-menu" class="col-sm-12 col-md-12">
                        <div class="sp-column ">
                            <div class='sp-megamenu-wrapper'>
                                
                                <ul class="sp-megamenu-parent menu-fade hidden-sm hidden-xs" <?php echo ($page_direction == 'rtl' ? ''  : 'style="direction: ltr !important;"') ?>>
                                    <?php if(!empty($page_menus["l$current_lid"])) foreach ($page_menus["l$current_lid"] as $page_menu): ?>
                                    <?php if($page_menu['visibility']==0) continue; ?>
                                    <li class="sp-menu-item <?php if(!empty($cid) && $cid == $page_menu['id']) echo "current-item active"; ?>">
                                        <a href="/index.php?cid=<?php echo $page_menu['id'] ?>">
                                            <i class="<?php echo $page_menu['ico'] ?>"></i>
                                            <?php echo $page_menu['text'] ?>
                                        </a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                                <!--<script>
                                    function myFunction() {
                                      var x = document.getElementById("myLinks");
                                      if (x.style.display === "block") {
                                        x.style.display = "none";
                                      } else {
                                        x.style.display = "block";
                                      }
                                    }
                                </script>-->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="sp-page-title">
            <div class="row">
                <div id="sp-title" class="col-sm-12 col-md-12">
                    <div class="sp-column "></div>
                </div>
            </div>
        </section>
        <?php if(!empty($page_showslider) && $page_showslider == 1): ?>
        <section id="sp-ariab-slide">
            <div class="row">
                <div id="sp-slide" class="col-sm-12 col-md-12">
                    <div class="sp-column ">
                        <div class="sp-module ">
                            <div class="sp-module-content">
                                <!-- START REVOLUTION SLIDER 5.0.16 fullwidth mode -->
                                <div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" style="margin:0px auto;background-color:#E9E9E9;padding:0px;margin-top:0px;margin-bottom:0px;max-height:500px;">
                                    <div id="rev_slider_1_1" class="rev_slider fullwidthabanner" style="display:none;max-height:500px;height:500px;">
                                        <ul>
                                            <?php $iodasd=0; foreach($sliders as $vc): ?>
                                            <li data-transition="cube-horizontal" data-slotamount="7" data-masterspeed="300" data-saveperformance="off">
                                                <!-- MAIN IMAGE -->
                                                <img src="<?php echo $vc['slide']; ?>"
                                                    alt="<?php echo $vc['alt']; ?>" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" />
                                                <!-- LAYERS -->
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <div class="tp-bannertimer"></div>
                                    </div>

                                    <script type="text/javascript">


                                        /******************************************
                                            -	PREPARE PLACEHOLDER FOR SLIDER	-
                                        ******************************************/


                                        var setREVStartSize = function () {
                                            var tpopt = new Object();
                                            tpopt.startwidth = 1170;
                                            tpopt.startheight = 500;
                                            tpopt.container = jQuery('#rev_slider_1_1');
                                            tpopt.fullScreen = "off";
                                            tpopt.forceFullWidth = "off";

                                            tpopt.container.closest(".rev_slider_wrapper").css({ height: tpopt.container.height() }); tpopt.width = parseInt(tpopt.container.width(), 0); tpopt.height = parseInt(tpopt.container.height(), 0); tpopt.bw = tpopt.width / tpopt.startwidth; tpopt.bh = tpopt.height / tpopt.startheight; if (tpopt.bh > tpopt.bw) tpopt.bh = tpopt.bw; if (tpopt.bh < tpopt.bw) tpopt.bw = tpopt.bh; if (tpopt.bw < tpopt.bh) tpopt.bh = tpopt.bw; if (tpopt.bh > 1) { tpopt.bw = 1; tpopt.bh = 1 } if (tpopt.bw > 1) { tpopt.bw = 1; tpopt.bh = 1 } tpopt.height = Math.round(tpopt.startheight * (tpopt.width / tpopt.startwidth)); if (tpopt.height > tpopt.startheight && tpopt.autoHeight != "on") tpopt.height = tpopt.startheight; if (tpopt.fullScreen == "on") { tpopt.height = tpopt.bw * tpopt.startheight; var cow = tpopt.container.parent().width(); var coh = jQuery(window).height(); if (tpopt.fullScreenOffsetContainer != undefined) { try { var offcontainers = tpopt.fullScreenOffsetContainer.split(","); jQuery.each(offcontainers, function (e, t) { coh = coh - jQuery(t).outerHeight(true); if (coh < tpopt.minFullScreenHeight) coh = tpopt.minFullScreenHeight }) } catch (e) { } } tpopt.container.parent().height(coh); tpopt.container.height(coh); tpopt.container.closest(".rev_slider_wrapper").height(coh); tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(coh); tpopt.container.css({ height: "100%" }); tpopt.height = coh; } else { tpopt.container.height(tpopt.height); tpopt.container.closest(".rev_slider_wrapper").height(tpopt.height); tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(tpopt.height); }
                                        };

                                        /* CALL PLACEHOLDER */
                                        setREVStartSize();


                                        var tpj = jQuery;
                                        tpj.noConflict();
                                        var revapi1;



                                        tpj(document).ready(function () {



                                            if (tpj('#rev_slider_1_1').revolution == undefined) {
                                                revslider_showDoubleJqueryError('#rev_slider_1_1');
                                            } else {
                                                revapi1 = tpj('#rev_slider_1_1').show().revolution(
                                                    {

                                                        dottedOverlay: "none",
                                                        delay: 9000,
                                                        startwidth: 1170,
                                                        startheight: 500,
                                                        hideThumbs: 200,

                                                        thumbWidth: 100,
                                                        thumbHeight: 50,
                                                        thumbAmount: 4,

                                                        simplifyAll: "off",
                                                        navigationType: "none",
                                                        navigationArrows: "none",
                                                        navigationStyle: "round",
                                                        touchenabled: "on",
                                                        onHoverStop: "on",
                                                        nextSlideOnWindowFocus: "off",

                                                        swipe_threshold: 75,
                                                        swipe_min_touches: 1,
                                                        drag_block_vertical: false,


                                                        keyboardNavigation: "on",

                                                        navigationHAlign: "center",
                                                        navigationVAlign: "bottom",
                                                        navigationHOffset: 0,
                                                        navigationVOffset: 20,

                                                        soloArrowLeftHalign: "left",
                                                        soloArrowLeftValign: "center",
                                                        soloArrowLeftHOffset: 20,
                                                        soloArrowLeftVOffset: 0,

                                                        soloArrowRightHalign: "right",
                                                        soloArrowRightValign: "center",
                                                        soloArrowRightHOffset: 20,
                                                        soloArrowRightVOffset: 0,

                                                        shadow: 0,
                                                        fullWidth: "on",
                                                        fullScreen: "off",

                                                        spinner: "spinner0",

                                                        stopLoop: "off",
                                                        stopAfterLoops: -1,
                                                        stopAtSlide: -1,

                                                        shuffle: "off",

                                                        autoHeight: "off",
                                                        forceFullWidth: "off",



                                                        hideThumbsOnMobile: "off",
                                                        hideNavDelayOnMobile: 1500,
                                                        hideBulletsOnMobile: "off",
                                                        hideArrowsOnMobile: "off",
                                                        hideThumbsUnderResolution: 0,

                                                        hideSliderAtLimit: 0,
                                                        hideCaptionAtLimit: 0,
                                                        hideAllCaptionAtLilmit: 0,
                                                        startWithSlide: 0,
                                                        isJoomla: true
                                                    });



                                            }
                                        });	/*ready*/

                                    </script>
                                </div>
                                <!-- END REVOLUTION SLIDER -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>
        <section id="sp-content-top"></section>
        <section id="sp-content-bottom">
            <div class="container">
                <div class="row">
                    <?php echo $content; ?>
                </div>
            </div>
        </section>
        <!--<section id="sp-clients-title"></section>-->
        <!--<section id="sp-bottom">
            <div class="container">
                <div class="row">
                    <div class="row">
                        <div id="sp-bottom1" class="col-xs-12 col-sm-6 col-md-4">
                            <div class="sp-column ">
                                <div class="sp-module ">
                                    <div class="sp-module-content">

                                        <div class="custom">
                                            <div class="hmsct hmgrp">
                                                <div class="hmcl hmspbttm_1_of_2">
                                                    <div class="ariab_address">
                                                        <p>
                                                            Tehran, Shariati avenue, lower than Sadr Bridge, 1643, 4th floor, Unit B4
                                                        </p>
                                                    </div>
                                                    <div class="ariab_phone">
                                                        <p>تلفـن: 22636037 <br> فکس: 22618231 <br>
                                                        </p>
                                                        <div>
                                                        <a href="https://www.instagram.com/arianborna/"><img src="/images/insta.jpg"/></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="sp-position8" class="col-sm-6 col-md-4 hidden-sm hidden-xs">
                            <div class="sp-column ">
                                <div class="sp-module  respnone">
                                    <div class="sp-module-content">
                                        <div class="custom respnone">
                                            <div class="ariab_address">
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1618.3796000559942!2d51.4361681!3d35.781291!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcdff568ed3b460a7!2sSafiran+Building!5e0!3m2!1sen!2s!4v1558176666198!5m2!1sen!2s" style="max-width: inherit;width:100%" frameborder="0" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="sp-bottom2" class="col-xs-12 col-sm-6 col-md-4">
                            <div class="sp-column ">
                                <div class="sp-module ">
                                    <div class="sp-module-content">
                                        <div class="rsform">
                                            <form method="post" id="userForm" action="/">
                                                    <label for="ct_email" style="font-size: inherit;font-weight: inherit;">Email</label>
    <input type="text" id="ct_email" name="ct_email" placeholder="Email..">
    <label for="subject" style="font-size: inherit;font-weight: inherit;">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.."></textarea>
    <input type="submit" value="Submit" style="float: left;margin-top: -30px;">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>-->
        <!--<footer id="sp-footer">
            <div class="container">
                <div class="row">
                    <div id="sp-footer1" class="col-xs-12 col-sm-6 col-md-6">
                        <div class="sp-column ">
                            <div class="sp-module ">
                                <div class="sp-module-content">

                                    <div class="custom">
                                        <div class="ariab_designer"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="sp-footer2" class="col-xs-12 col-sm-6 col-md-6">
                        <div class="sp-column ">
                            <div class="sp-module ">
                                <div class="sp-module-content">

                                    <div class="custom">
                                        <div class="ariab_copyright">
                                            <p>
                                                All Rights Reserved
                                                <strong>Arianborna</strong>. Copyright &copy; 2019
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>-->
      <section id="footer">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
					<ul class="list-unstyled list-inline social text-center">
						<li class="list-inline-item"><a href=""><i class="fab fa-facebook-f"></i></a></li>
						<li class="list-inline-item"><a href=""><i class="fab fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="https://www.instagram.com/arianborna/"><i class="fab fa-instagram"></i></a></li>
						<li class="list-inline-item"><a href="mailto:info@ariyanborna.com" target="_blank"><i class="fa fa-envelope"></i></a></li>
					</ul>
				</div>
				</hr>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
					<p>Architectural group <u><a href="/"> Arianborna </a></u> Design, comments, run</p>
					<p class="h6">&copy All right Reversed</p>
				</div>
				</hr>
			</div>	
		</div>
	</section>
    </div>
    
                                <div id="offcanvasoverlay" class="offcanvas-overlay visible-sm visible-xs"></div>
                            <!---->
                                <div class="topnav visible-sm visible-xs offcanvas-menu">
                                    <div id="myLinks">
                                    <div class="container">
  <div class="row">
                                        <div class="col-sm">
                                          <a id="x" href="#" style="float: left;margin: 0px;" class="closebtn" onclick="cmf()">&times;</a>
                                        </div>
                                        <div class="col-sm">
                                           <?php if(!empty($page_menus["l$current_lid"])) foreach ($page_menus["l$current_lid"] as $page_menu): ?>
                                    <?php if($page_menu['visibility']==0) continue; ?>
                                        <a class="av <?php if(!empty($cid) && $cid == $page_menu['id']) echo "current-item active"; ?>" href="/index.php?cid=<?php echo $page_menu['id'] ?>">
                                            <i class="<?php echo $page_menu['ico'] ?>"></i>
                                            <?php echo $page_menu['text'] ?>
                                        </a>
                                    <?php endforeach; ?>
                                        </div> 
                                    </div>
                                        </div> 
                                    </div>
                                </div>
                                <script>
                                function cmf() {
                                    document.getElementById("offcanvas-toggler").click();
                                }
                                </script>
                                <style>
                                .topnav .av {
                                width: 83%;
}
                                </style>

                                <!--document.getElementById("offcanvasoverlay").click();-->
                                
</body>
</html>
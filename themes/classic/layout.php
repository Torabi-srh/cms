<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="<?php echo $page_keywords ?>" />
    <meta name="title" content="<?php echo $page_title ?>" />
    <meta name="author" content="<?php echo $page_author ?>" />
    <meta name="description" content="<?php echo $page_description ?>" />
    <meta name="generator" content="Ferdows University of Mashhad Web Sites CMS Generator" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ferdows Institute of higher education - <?php echo $page_author ?> - <?php echo $page_title ?></title>
    <link href="<?php echo $page_favicon ?>" rel="shortcut icon" type="image/x-icon" />
    <link rel="stylesheet" href="/css/skitter.css" type="text/css" />
    <link rel="stylesheet" href="/css/fonts.css" type="text/css" />
    <script type="text/javascript" src="/js/mootools.js"></script>
    <script type="text/javascript" src="/themes/<?php echo $page_theme ?>/js/main.js"></script> 
    <link rel="stylesheet" href="/css/tabs_slides.css" type="text/css" />  
    <script type="text/javascript">
        var jwts_slideSpeed = 30;
        var jwts_timer = 10;
    </script>
    <script type="text/javascript" src="/js/tabs_slides_comp.js"></script>
    <script type="text/javascript" src="/js/tabs_slides_def_loader.js"></script>
    
    <link rel="stylesheet" href="/themes/<?php echo $page_theme ?>/css/main.css" type="text/css" /> 
    <link rel="stylesheet" href="/themes/<?php echo $page_theme ?>/css/<?php echo $page_direction ?>.css" type="text/css" /> 
    
    <?php /* Google Analytics */ ?>
</head>

<body>
    <div id="wrapper">
        <div id="right"></div>
        <div id="left">
            <ul class="menu">
                <li class="item33051"><a href="/"><span><?php echo ($page_direction == 'rtl' ? 'خانه'  : 'Home') ?></span></a></li>
                <li class="item33051"><a href="?gallery=1"><span><?php echo ($page_direction == 'rtl' ? 'گالری'  : 'Gallery') ?></span></a></li>
            </ul>
        </div>
        <div id="right_bot">
            <div id="pic">
                <div id="pic_in"><img src="<?php echo $site_avatar; ?>" alt="Profile Image"></div>
            </div> 
            <div id="text_pic">
               <h3 style="font-size: 17px;color: #E8E8E8;"><?php echo " $site_title_name"; ?></h3 style="font-size: 17px;">
            </div>
            <div id="right_menu">
                <ul class="menu">
                <?php if(!empty($page_menus["l$current_lid"])) foreach ($page_menus["l$current_lid"] as $page_menu): ?>
                <a href="/index.php?cid=<?php echo $page_menu['id'] ?>"><li onclick="" id="current" class="active"><span><?php echo $page_menu['text'] ?></span></li></a>
                <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div id="left_bot">
            <div id="slider">
                <?php /*<script src="/themes/<?php echo $page_theme ?>/js/jquery-1.5.2.min.js" type="text/javascript"></script> 
                <script src="/themes/<?php echo $page_theme ?>/js/jquery.easing.1.3.js" type="text/javascript"></script> 
                <script src="/themes/<?php echo $page_theme ?>/js/jquery.animate-colors-min.js" type="text/javascript"></script> 
                <script src="/themes/<?php echo $page_theme ?>/js/jquery.skitter.min.js" type="text/javascript"></script> 
                */?>                           
<script src="http://kahani.profcms.um.ac.ir/modules/mod_InowSlideShow/js/jquery-1.5.2.min.js" type="text/javascript"></script>
<script src="http://kahani.profcms.um.ac.ir/modules/mod_InowSlideShow/js/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="http://kahani.profcms.um.ac.ir/modules/mod_InowSlideShow/js/jquery.animate-colors-min.js" type="text/javascript"></script>
<script src="http://kahani.profcms.um.ac.ir/modules/mod_InowSlideShow/js/jquery.skitter.min.js" type="text/javascript"></script>
                
                <script src="/themes/<?php echo $page_theme ?>/js/skitter.js" type="text/javascript"></script>
                
                <div class="joomla_ass">
                    <div class="border_box">
                        <div class="box_skitter box_skitter_large26023">
                            <ul>
                            <?php $iodasd=0; foreach($sliders as $vc): ?>
                                <li><img src="<?php
                                echo $vc['slide']; ?>" alt="slide" class="random" /></li>
                            <?php endforeach; ?>
                            </ul>
                        </div> 
                    </div> 
                </div> 
            </div>
            <!-- <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script> -->
            <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
            <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script> -->
            <script src="https://stackpath.bootstrapcdn.com/twitter-bootstrap/2.0.4/js/bootstrap.min.js"></script>

            <div id="component">
                <?php echo $content; ?>
            <span class="article_separator">&nbsp;</span>
            
            <div class="">
            <div class="row" id="container">
            <?php $_attachment = explode(";", $_attachment); ?>
            <?php for ($i = 0;$i < count($_attachment);$i+=4): ?>
            <div class="column">
            <?php for ($j = $i;$j < $i+4;$j++): ?>
            <?php if(empty($_attachment[$j])) { break; } ?>
            <?php $src = '/attachment/'.site_id.'/' . $_attachment[$j]; ?>
            <div class="img-wrap">
            <span class="close" onclick="dlt('<?php echo $_attachment[$j]; ?>'')">&times;</span>
            <!-- <img src="<?php //echo $src; ?>"> -->
            <i class="fa fa-file-image-o fa-5"></i>
            </div>
            <?php endfor; ?>
            </div>
            <?php endfor; ?>
            </div>
            </div>
            
            <span class="article_separator">&nbsp;</span>
            </div>
        </div>
    </div>
    <div id="footer">
    <p>© Copyright 2018, All Rights Reserved, <a href="http://ferdowsmashhad.ac.ir/">Ferdows Institute of higher education</a></p>
        <div id="icon_div">
            <a href="/admin/"><img title="مدیریت سایت" src="/themes/<?php echo $page_theme ?>/images/male_user.png"></a>
        </div>
        <div id="lang_div">
            <script language="javascript">
               function select_lang(lang) { 
	document.location.href = "index.php?mclang=" + lang.value;
}
            </script>
            <div class="setlang">
                <select name="mclang" id="mclang" style="width:100px; font-family:tahoma, verdana;color: black;" class="inputbox"
                    onchange="select_lang(this);">
                    <?php foreach($languages as $lang): ?>
            <option value="<?php echo $lang['id'] ?>" <?php if($current_lid == $lang['id']): ?>selected="selected"<?php endif; ?>><?php echo $lang['name'] ?></option>
                    <?php endforeach; ?> 
                </select></div>
        </div>
    </div>
    <style type="text/css">
 .row {
            display: flex;
            flex-wrap: wrap;
            padding: 0 4px;
            }

            /* Create four equal columns that sits next to each other */
            .column {
            flex: 25%;
            max-width: 25%;
            padding: 0 4px;
            }

            .column img {
            margin-top: 8px;
            vertical-align: middle;
            }

            /* Responsive layout - makes a two column-layout instead of four columns */
            @media screen and (max-width: 800px) {
            .column {
                flex: 50%;
                max-width: 50%;
            }
            }

            /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
            @media screen and (max-width: 600px) {
            .column {
                flex: 100%;
                max-width: 100%;
            }
            }
        .column img:hover {
            box-shadow: 0 0 32px 4px rgba(0, 0, 0, 0.9);
            z-index: 1;
            cursor: pointer;
        }
        .column:hover img {
            opacity: 1;
        }
.img-wrap {
    position: relative;
    ...
}
.img-wrap .close {
    position: absolute;
    top: 2px;
    right: 2px;
    z-index: 100;
}
.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    border: 0;
  clip: rect(0, 0, 0, 0);
  height: 1px;
  overflow: hidden;
  padding: 0;
  position: absolute !important;
  white-space: nowrap;
  width: 1px;  
}
.buttonBox{
	padding: 20px;
	text-align: center;
}
.imagePreviewTable{
	border: 1px solid #000;
	display: none;
}
.overlay {
    position:absolute; top:0; left:0; right:0; bottom:0; background-color:rgba(0, 0, 0, 0.85); background: url(data:;base64,iVBORw0KGgoAAAANSUhEUgAAAAIAAAACCAYAAABytg0kAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAgY0hSTQAAeiYAAICEAAD6AAAAgOgAAHUwAADqYAAAOpgAABdwnLpRPAAAABl0RVh0U29mdHdhcmUAUGFpbnQuTkVUIHYzLjUuNUmK/OAAAAATSURBVBhXY2RgYNgHxGAAYuwDAA78AjwwRoQYAAAAAElFTkSuQmCC) repeat scroll transparent\9; /* ie fallback png background image */ z-index:9999; color:white; text-align:center; height:5000px; display:none;
}
.overlay_content{
    padding:300px;
}
</style> 
</body>

</html> 
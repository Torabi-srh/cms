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
    <title>Ferdows Institute of higher education -
        <?php echo $page_author ?> -
        <?php echo $page_title ?>
    </title>
    <link href="<?php echo $page_favicon ?>" rel="shortcut icon" type="image/x-icon" />
    <link rel="stylesheet" href="/css/skitter.css" type="text/css" />
    <link rel="stylesheet" href="/css/fonts.css" type="text/css" />

    <link rel="stylesheet" href="/themes/<?php echo $page_theme ?>/css/main.css" type="text/css" />
    <link rel="stylesheet" href="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/css/lightgallery.css"
        type="text/css" />
    <link rel="stylesheet" href="/themes/<?php echo $page_theme ?>/css/<?php echo $page_direction ?>.css" type="text/css" />
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script> -->

    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw=="
        crossorigin="anonymous">
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/twitter-bootstrap/2.0.4/js/bootstrap.min.js"></script>
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
    </style>
    <?php /* Google Analytics */ ?>
</head>

<body>
    <div id="wrapper">
        <div id="right"></div>
        <div id="left">
            <ul class="menu">
                <li class="item33051"><a href="/"><span>Home</span></a></li>
                <li class="item33051"><a href="?gallery=1"><span>Gallery</span></a></li>
            </ul>
        </div>
        <div id="right_bot">
            <div id="pic">
                <div id="pic_in"><img src="<?php echo $site_avatar; ?>" alt="Profile Image"></div>
            </div>
            <div id="text_pic">
                <h3 style="font-size: 17px;color: #E8E8E8;">
                    <?php echo " $site_title_name"; ?>
                </h3>
            </div>
            <div id="right_menu">
                <ul class="menu">
                    <?php if(!empty($page_menus["l$current_lid"])) foreach ($page_menus["l$current_lid"] as $page_menu): ?>
                    <a href="/index.php?cid=<?php echo $page_menu['id'] ?>">
                        <li onclick="" id="current" class="active"><span>
                                <?php echo $page_menu['text'] ?></span></li>
                    </a>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div id="left_bot" style="padding:20px">
        <?php if (empty($_GET['g'])): ?>
            <?php for ($r = 0;$r <= count($pics);$r++): ?>
            <div class="row">
            <?php for ($c = $r;$c < $r+2;$c++): ?>
                <?php if(empty($pics["l$c"])) { break; } ?>
                <div class="col-md-3">
                    <div id="glp">
                        <div class="gp1">
                            <div class="grow">
                                <?php for ($i = 0;$i < count($pics["l$c"]);$i+=2): ?>
                                <?php if(($pics["l$c"][$i]['pid'] == $r + 1)) { break; } ?>
                                <?php if($i >= 4) { break; } ?>
                                <div class="gcolumn">
                                <a href="?gallery=1&g=<?php echo $c; ?>">
                                        <?php for ($j = $i;$j < $i+2;$j++): ?>
                                    <?php if(empty($pics["l$c"][$j])) { break; } ?>
                                    <?php $src = '/pics/'.site_id.'/' . $pics["l$c"][$j]['name']; ?>
                                    <img src="<?php echo $src; ?>" />
                                    <?php endfor; ?>
                                    </a>
                                </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
            </div>
            <?php endfor; ?>
    <?php else: ?>
    <div id="lightgallery">
                <?php 
                    $c = $_GET['g'];
                    $picss = $pics["l$c"];
                    if (empty($picss)) {
                        safeRedirect("?gallery=1");die();exit();
                    }
                    shuffle($picss);
                ?>
                <div class="row" id="container">
                    <?php for ($i = 0;$i < count($picss);$i+=4): ?>
                    <div class="column" style="margin-left: 15px;">
                        <?php for ($j = $i;$j < $i+4;$j++): ?>
                        <?php if(empty($picss[$j])) { break; } ?>
                        <?php $src = '/pics/'.site_id.'/' . $picss[$j]['name']; ?>
                        <a class="item" href="<?php echo $src; ?>">
                            <img src="<?php echo $src; ?>" width="240" height="160" />
                        </a>
                        <?php endfor; ?>
                    </div>
                    <?php endfor; ?>
                </div>
                <span class="article_separator">&nbsp;</span>
            </div>
    <?php endif; ?>
            <span class="article_separator">&nbsp;</span>
        </div>
    </div>
    <style>
        .grow {
            display: flex;
            flex-wrap: wrap;
            padding: 0 4px;
            height: 100%;
            overflow: hidden;
        }

        .gp1 {
            height: 162px;
            width: 153px;
        }

        /* Create two equal columns that sits next to each other */
        .gcolumn {
            flex: 25%;
            height: 100%;
            overflow: hidden;
        }

        .gcolumn img {
            margin: -2px;
            vertical-align: middle;
            height: 50%;
            overflow: hidden;
            border: 2px solid #384152;
        }
    </style>
    <!-- <script src="https://www.jsdelivr.com/projects/lightgallery"></script> -->
    <script src="https://cdn.jsdelivr.net/combine/npm/lightgallery,npm/lg-autoplay,npm/lg-fullscreen,npm/lg-hash,npm/lg-pager,npm/lg-share,npm/lg-thumbnail,npm/lg-video,npm/lg-zoom"></script>
    <script src="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/js/lightgallery.js"></script>
    <!-- <script src="https://cdn.rawgit.com/sachinchoolur/lg-pager.js/master/dist/lg-pager.js"></script>
<script src="https://cdn.rawgit.com/sachinchoolur/lg-autoplay.js/master/dist/lg-autoplay.js"></script>
<script src="https://cdn.rawgit.com/sachinchoolur/lg-share.js/master/dist/lg-share.js"></script>
<script src="https://cdn.rawgit.com/sachinchoolur/lg-fullscreen.js/master/dist/lg-fullscreen.js"></script>
<script src="https://cdn.rawgit.com/sachinchoolur/lg-zoom.js/master/dist/lg-zoom.js"></script>
<script src="https://cdn.rawgit.com/sachinchoolur/lg-hash.js/master/dist/lg-hash.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script> -->
    <script>
        $(document).ready(function () {
            // $("#lightgallery").lightGallery(); 
            $('#lightgallery').lightGallery({
                selector: '.item'
            });
        });
    </script>
    <div id="footer">
        <p>© Copyright 2018, All Rights Reserved, <a href="http://ferdowsmashhad.ac.ir/">Ferdows Institute of higher
                education</a></p>
        <div id="icon_div">
            <a href="/admin/fa"><img title="مدیریت سایت" src="/themes/<?php echo $page_theme ?>/images/male_user.png"></a>
        </div>
        <div id="lang_div">
            <script language="javascript">
                function select_lang(lang) {
                    document.location.href = "index.php?mclang=" + lang.value;
                }
            </script>
            <div class="setlang">
                <select name="mclang" id="mclang" style="width:100px; font-family:tahoma, verdana;color:black" class="inputbox"
                    onchange="select_lang(this);">
                    <?php foreach($languages as $lang): ?>
                    <option value="<?php echo $lang['id'] ?>" <?php if($current_lid==$lang['id']): ?>selected="selected"
                        <?php endif; ?>>
                        <?php echo $lang['name'] ?>
                    </option>
                    <?php endforeach; ?>
                </select></div>
        </div>
    </div>
</body>
</html>
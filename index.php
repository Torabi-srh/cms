<?php
clearstatcache() ;
require 'assets/functions.php';
if (!is_session_started()) sessionStart("ferdws_");
if (!empty($_GET['cid'])) {
    $cid = intval($_GET['cid']);
} else {
    $cid = 1;
}
$mysqli = isset($mysqli) ? $mysqli : Connection();

$current_lid = 1;
require 'assets/db.php';
user_activitys();

$site_title_name = "$site_title. $site_name";
$page_keywords = "$site_name, Ferdows Institute of higher education, ferdowsmashhad";
$page_title = $site_title_name;
$page_author = $site_name;
$page_description = "$site_title_name Home page";
$page_favicon = '/images/header/favicon.png';
$page_theme = 'modern'; //classic
$page_direction = 'ltr';
if (!empty($_GET['mclang'])) {
    foreach ($languages as $lang) {
        if ($_GET['mclang'] == $lang['id']) {
            $_SESSION['dir'] = $lang['dir'];
            $_SESSION['lang'] = $lang['id'];
            break;
        }
    }
}

if (empty($_SESSION['dir'])) {
    $page_direction = $page_direction;
} else {
    $page_direction = $_SESSION['dir'];
}
if (empty($_SESSION['lang'])) {
    $current_lid = $language_lid;
} else {
    $current_lid = $_SESSION['lang'];
}
$content = $post_content;
$_attachment = (!empty($page_attachment) ? $page_attachment : '');
$header_q_ = basename($_SERVER['PHP_SELF']);
$SERVER_REQ = urldecode($_SERVER['REQUEST_URI']);


if (isUrlSafe($SERVER_REQ) > -1) {
    safeRedirect("$restsz");die();exit();
}
if (isset($_GET['gallery'])) {
    $pics = getgalary(site_id,$gallery_images);
    require "themes/$page_theme/galary.php";
} else {
    require "themes/$page_theme/layout.php";
}
var_dump( $_SESSION['dir'] ,  $_SESSION['lang']);
?>
<?php

//  setup
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Asia/Dhaka');

require 'jdf.php';
require 'bulletproof-3.0.2/bulletproof.php';
require 'utils.php';
//require 'Carbon.php';
//use Carbon\Carbon;

//  database
define('DB_HOST', 'localhost');
define('DB_USER', 'ariyanbo_cms');
define('DB_PASSWORD', '+tQGNURct?t;');
define('DB_NAME', 'ariyanbo_cms');
define('DB_PORT', '3306');
define('DEBUG_DB_HOST', 'localhost');
define('DEBUG_DB_USER', 'root');
define('DEBUG_DB_PASSWORD', '@E833xsbf');
define('DEBUG_DB_NAME', 'cms');
define('DEBUG_DB_PORT', '3306');

// site
define('site_title', 'ariyanborna');
define('site_url', 'http://ariyanborna.com/');
define('installed', '1');
define('version', '1.0');
define('site_id', '1');
//  upload path
define ('SITE_ROOT',  $_SERVER['DOCUMENT_ROOT']);
define('UPLOAD_POST', SITE_ROOT.'/images/posts/');
define('UPLOAD_PROFILE_PIC', SITE_ROOT.'/images/users/');
//  site
define('PAGE_NAME', basename($_SERVER['PHP_SELF']));
define('DOMAIN', ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false);
//site specific configuration declartion
define( 'BASE_PATH', '');

//Google App Details
define('GOOGLE_APP_NAME', '');
define('GOOGLE_OAUTH_CLIENT_ID', '');
define('GOOGLE_OAUTH_CLIENT_SECRET', '');
define('GOOGLE_OAUTH_REDIRECT_URI', '');
define('GOOGLE_OAUTH_REDIRECT_URI_LOGIN', '');
define("GOOGLE_SITE_NAME", '');

function isdebug() {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}
function islocal()
{
    $whitelist = array(
    '127.0.0.1',
    '::1'
  );
    if (!in_array($_SERVER['REMOTE_ADDR'], $whitelist)) {
        return false;
    } else {
        return true;
    }
}

function serverRoot()
{
    if (islocal()) {
        return "";
    } else {
        return $_SERVER['DOCUMENT_ROOT'].'/main/html';
    }
}
function serverRoot2()
{
    if (islocal()) {
        return "";
    } else {
        return '/main/html';
      }
  }
  function usersuploadpath()
  {
      return "images/users/";
  }
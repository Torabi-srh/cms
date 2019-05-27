<?php
ob_start();
    require '../assets/functions.php';
    function echoHeaders($originalImage) {
        header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        // header("Pragma: no-cache");
        // header("Cache-Control: private, max-age=10800, pre-check=10800");
        header("Pragma: private");
        // header("Expires: " . date(DATE_RFC822, strtotime("2 day")));
        header('Content-type: image/jpeg');
        header ("Content-length: " . filesize($originalImage));
    }
    function displayimage($originalImage) {
        echoHeaders($originalImage);
        $image = imagecreatefromjpeg( $path );
        if (!$image ) {
            header('HTTP/1.1 404 Not Found');
            exit;
        }
        @imagejpeg( $image );
        if ( $image ) {
            imagedestroy( $image );
        }
        exit;
    }
    function resizeImage($originalImage, $toWidth, $toHeight) {
        $toWidth = intval($toWidth);
        $toHeight = intval($toHeight);

        list($width, $height) = getimagesize($originalImage); 
        if ((!$toWidth && !$toHeight) || ($toWidth >= $width && $toHeight >= $height)) {
            displayimage($originalImage);
        }
        $xscale = $toWidth ? $width / $toWidth : 0;
        $yscale = $toHeight ? $height / $toHeight : 0;
        if ($yscale > $xscale) { 
            $new_width = round($width / $yscale); 
            $new_height = round($toHeight); 
        } 
        else { 
            $new_width = round($toWidth); 
            $new_height = round($height / $xscale); 
        }
        
        $imageResized = imagecreatetruecolor($new_width, $new_height); 
        $imageTmp = imagecreatefromjpeg($originalImage); 
        imagecopyresampled($imageResized, $imageTmp, 0, 0, 0, 0, $new_width, $new_height, $width, $height); 
        echoHeaders($originalImage);
        imagejpeg($imageResized, NULL, 90);
        if ( $imageResized ) {
            imagedestroy( $imageResized );
        }
    }
    if (isset($_GET['q'])) {
        $q = explode('/', $_GET['q'], 3);
        $src = '../pics/'.site_id.'/' . $q[1];
        list($w, $h) = explode('x', $q[0]);
        if (!file_exists($src)) {
            header('HTTP/1.1 404 Not Found');
            exit;
        }
        
ob_end_clean();
        resizeImage($src, $w, $h);
        exit;
    }
?>
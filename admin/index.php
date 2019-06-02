<?php include "header.php";
      
$error="";
if (!empty($_POST['v'])) {
    if ((!empty($_SESSION['dvs']) && $_SESSION['dvs'] == $_POST['v'])) {
        if (!empty($_FILES['file']['name'])) {
            $target_dir = "/images/avatar/";
            $allowed_ext= array('png','jpg');
            $file_name =$_FILES['file']['name']; 
            $tmp = explode('.', $file_name);
            $file_extension = end($tmp);
            $file_ext = strtolower($file_extension);
            $target_file = $target_dir .site_id.'.'.$file_extension;
            while (file_exists($target_file)) {
                $target_file = $target_dir . SaltMD5(basename($_FILES["file"]["name"]).site_id.random_string()).'.'.$file_extension;
            }
            $file_size=$_FILES['file']['size'];
            $file_tmp= $_FILES['file']['tmp_name'];
            $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
            $data = file_get_contents($file_tmp);
            $hash = sha1($_FILES["file"]["name"]);
                    
            if(in_array($file_ext,$allowed_ext) === false) {
                $error =  'toastr["error"]("Extension not allowed", "upload error");'; 
            } elseif($file_size > 2097152) {
                $error =  'toastr["error"]("File size must be under 2mb", "upload error");'; 
            } else {
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . $target_file)) { 
                    $sql = "update `blog` set `avatar`='$target_file' where `id` = '". site_id ."'";
                    if ($stmt = $mysqli->prepare($sql)) {
                        if ($stmt->execute()) {
                            $stmt->store_result();
                            $error =  'toastr["success"]("avatar updated", "success");';
                        }
                    } else {
                        $error =  'toastr["error"]("error", "error");';
                    }  
                } else {
                        $error =  'toastr["error"]("error", "error");';
                }  
            } 
        } 
        if (!empty($_FILES['filez']['name'])) {
            $target_dir = "/images/avatar/";
            $allowed_ext= array('png','jpg');
            $file_name =$_FILES['filez']['name']; 
            $tmp = explode('.', $file_name);
            $file_extension = end($tmp);
            $file_ext = strtolower($file_extension);
            $target_file = $target_dir .site_id.'h.'.$file_extension;
            while (file_exists($target_file)) {
                $target_file = $target_dir . SaltMD5(basename($_FILES["filez"]["name"]).site_id.random_string()).'.'.$file_extension;
            }
            $file_size=$_FILES['filez']['size'];
            $file_tmp= $_FILES['filez']['tmp_name'];
            $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
            $data = file_get_contents($file_tmp);
            $hash = sha1($_FILES["filez"]["name"]);
                    
            if(in_array($file_ext,$allowed_ext) === false) {
                $error =  'toastr["error"]("Extension not allowed", "upload error");'; 
            } elseif($file_size > 2097152) {
                $error =  'toastr["error"]("File size must be under 2mb", "upload error");'; 
            } else {
                if (move_uploaded_file($_FILES["filez"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . $target_file)) { 
                    $sql = "update `blog` set `homepic`='$target_file' where `id` = '". site_id ."'";
                    if ($stmt = $mysqli->prepare($sql)) {
                        if ($stmt->execute()) {
                            $stmt->store_result();
                            $error =  'toastr["success"]("home picture updated", "success");';
                        }
                    } else {
                        $error =  'toastr["error"]("error", "error");';
                    }  
                } else {
                        $error =  'toastr["error"]("error", "error");';
                }  
            } 
        } 
        if (!empty($_POST['site_name']) && !empty($_POST['site_email']) && !empty($_POST['site_affiliation']) &&
            !empty($_POST['site_homepage']) && !empty($_POST['site_weblog'])&& !empty($_POST['site_title'])) {
                $_profile = $site_profile;
                if (!empty($_POST['site_profile'])) {
                    $_profile = TextToDB($_POST['site_profile']);
                }
                $_name = TextToDB($_POST['site_name']);
                $_email = TextToDB($_POST['site_email']);
                $_affiliation = TextToDB($_POST['site_affiliation']);
                $_homepage = TextToDB($_POST['site_homepage']);
                $_weblog = TextToDB($_POST['site_weblog']); 
                $_title = TextToDB($_POST['site_title']); 
        
                $sql = "update `blog` set `name` = '$_name', `email`='$_email', `affiliation`='$_affiliation',
                `homepage`='$_homepage', `weblog`='$_weblog', `Title`='$_title', `profile`='$_profile' where `id` = '". site_id ."'";
                if ($stmt = $mysqli->prepare($sql)) {
                    if ($stmt->execute()) {
                        $stmt->store_result();
                        $error =  'toastr["success"]("information updated", "success");';
                    }
                } else {
                    $error =  'toastr["error"]("error", "error");';
                }  
        }
    } else {
        $error =  'toastr["warning"]("please reload the page and try again", "Page warning");';
    }
}
$_SESSION['dvs'] = SaltMD5(rand(1, 100+intval(date('h.i', time()))));

require '../assets/db.php';
?>
              
                <!-- Page Inner -->
                <div class="page-inner">
                    <div class="page-title">
                        <h3 class="breadcrumb-header">Dashboard</h3>
                    </div>
                    <div id="main-wrapper">
                        
                        <div class="row"> 
                            <div class="col-lg-12 col-md-6">
                                <div class="panel panel-white">
                                    <div class="panel-heading clearfix">
                                        <h4 class="panel-title">Profile</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="browser-stats">
                                            <ul class="list-unstyled">
                                                <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="v" value="<?php echo $_SESSION['dvs']; ?>" />
                                                    <li>Logo<div class="pull-right"><input name="file" class="" type="file" /></div></li> 
                                                    <li>Fav icon<div class="pull-right"><input name="filez" class="" type="file" /></div></li> 
                                                    <li>Site name<div class="text pull-right"><input name="site_name" class="form-control" type="text" value="<?php echo $site_name; ?>" /></div></li> 
                                                    <li>Title<div class="text pull-right"><input name="site_title" class="form-control" type="text" value="<?php echo $site_title; ?>" /></div></li> 
                                                    <li>Email<div class="text pull-right"><input name="site_email" class="form-control" type="text" value="<?php echo $site_email; ?>" /></div></li> 
                                                    <li>Affiliation<div class="text pull-right"><input name="site_affiliation" class="form-control" type="text" value="<?php echo $site_affiliation; ?>" /></div></li> 
                                                    <li>Homepage<div class="text pull-right"><input name="site_homepage" class="form-control" type="text" value="<?php echo $site_homepage; ?>" /></div></li> 
                                                    <li>Weblog<div class="text pull-right"><input name="site_weblog" class="form-control" type="text" value="<?php echo $site_weblog; ?>" /></div></li>  
                                                    <li>About me<div class="text"><textarea name="site_profile" class="form-control" value="<?php echo $site_profile ?>"><?php echo $site_profile ?></textarea></div></li>  
                                                    
                                                    <li><div class="text pull-right"><input name="site_submit" class="btn btn-success" type="submit" value="Save" /></div></li>  
                                                </form> 
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div> 
                    </div><!-- Main Wrapper --> 
                </div><!-- /Page Inner --> 
            </div><!-- /Page Content -->
        </div><!-- /Page Container -->
        
 
        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-3.1.0.min.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/plugins/uniform/js/jquery.uniform.standalone.js"></script>
        <script src="assets/plugins/switchery/switchery.min.js"></script>
        <script src="assets/plugins/d3/d3.min.js"></script>
        <script src="assets/plugins/nvd3/nv.d3.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.time.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.symbol.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.resize.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.pie.min.js"></script> 
        <script src="assets/js/space.min.js"></script> 
        <script src="../js/toastr.js"></script>  
        <script>
        function editor(v,c) { 
            $('input[type="hidden"]').val(v);
            $('#a-input').val(c);
            $('#myModal').modal('show');
        }
        toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
                <?php echo $error; ?>
        </script> 
    </body>
</html>
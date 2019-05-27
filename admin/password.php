<?php include "header.php";

$error="";
if (!empty($_POST['v'])) {
    if ((!empty($_SESSION['dvs']) && $_SESSION['dvs'] == $_POST['v'])) {
        if (!empty($_POST['p']) && !empty($_POST['np']) && !empty($_POST['cnp'])) {
                $email = $_SESSION['username'];
                $_p = TextToDB($_POST['p']);
                $password = SaltMD5($_p, $email);
                $_np = TextToDB($_POST['np']);
                $_cnp = TextToDB($_POST['cnp']);
                if ($_np != $_cnp) {
                    $error =  'toastr["error"]("please check your password", "error");';
                } else {
                    $_p = SaltMD5($_np, $email);
                    if ($_p == $password) {
                        $error =  'toastr["error"]("new password and old password cannot be same", "error");';
                    } else {
                        $sql = "update `admin` set `password` = '$_p' where `password`='$password' and `id` ='".$_SESSION['user_id']."' and `bid` = '". site_id ."'";
                        if ($stmt = $mysqli->prepare($sql)) {
                            if ($stmt->execute()) {
                                $stmt->store_result();
                                $error =  'toastr["success"]("information updated", "success");';
                            }
                        } else {
                            $error =  'toastr["error"]("error", "error");';
                        }  
                    }
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
                                        <h4 class="panel-title">Password</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="browser-stats">
                                            <ul class="list-unstyled">
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="v" value="<?php echo $_SESSION['dvs']; ?>" />
                                                    <li>Old Password<div class="text pull-right"><input name="p" class="form-control" type="password" value="********" /></div></li> 
                                                    <li>New Password<div class="text pull-right"><input name="np" class="form-control" type="password" value="" /></div></li> 
                                                    <li>Confirm New Password<div class="text pull-right"><input name="cnp" class="form-control" type="password" value="" /></div></li> 
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
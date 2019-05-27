<?php include "header.php"; 
$error ="";  
if (!empty($_POST['nlh']) || (!empty($_GET['v']))) {
    if (!empty($_POST['nlh']) || (!empty($_GET['v']) && (!empty($_SESSION['dvs']) && $_SESSION['dvs'] == $_GET['v']))) {
        if (!empty($_GET['v']) && !empty($_GET['d'])) {
            $delete = TextToDB($_GET['d']);
            $sql = "delete from `slider` where `id`='".$delete."' and `bid`='".$_SESSION['bid'] ."'";
            if ($stmt = $mysqli->prepare($sql)) {
                $stmt->execute();
                if($stmt->affected_rows == 1) {
                        $error =  'toastr["success"]("successfuly deleted", "Slider delete");';
                } else {
                    $error =  'toastr["error"]("fatal error", "fatal error");';
                }
            } else {
                $error =  'toastr["error"]("fatal error", "fatal error");';
            }
        } elseif (!empty($_FILES['file'])) {  
            $allowed_ext= array('jpg','jpeg','png','gif');
            $file_name =$_FILES['file']['name']; 
            $tmp = explode('.', $file_name);
            $file_extension = end($tmp);
            $file_ext = strtolower($file_extension);
            $file_size=$_FILES['file']['size'];
            $file_tmp= $_FILES['file']['tmp_name']; 
            $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
            $data = file_get_contents($file_tmp);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                
            if(in_array($file_ext,$allowed_ext) === false) {
                $error =  'toastr["error"]("Extension not allowed", "Upload error");'; 
            } elseif($file_size > 2097152) {
                $error =  'toastr["error"]("File size must be under 2mb", "Upload error");'; 
            } else {
                $sql = "insert into `slider`(`bid`, `name`, `slide`) VALUES (".$_SESSION['bid'] .", '".$file_name."', '".$base64."')";
                if ($stmt = $mysqli->prepare($sql)) {
                    $stmt->execute();
                    if($stmt->affected_rows == 1) { 
                        $error =  'toastr["success"]("File uploaded", "File uploaded");'; 
                    } else { 
                        $error =  'toastr["error"]("fatal error", "fatal error");';
                    }
                } else {
                    $error =  'toastr["error"]("fatal error", "fatal error");';
                } 
            }
        }
    } else {
        $error =  'toastr["warning"]("please reload the page and try again", "Slider warning");';
    } 
}

$_SESSION['dvs'] = SaltMD5(rand(1, 100+intval(date('h.i', time()))));
 
require '../assets/db.php';
?> 
  
    <!-- Page Inner -->
    <div class="page-inner">
        <div class="page-title">
            <h3 class="breadcrumb-header">
                Sliders
            </h3>
        </div>
        <div id="main-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h4 class="panel-title">Add slider</h4>
                        </div>
                        <div class="panel-body">  
                        <button type="button" class="btn btn-success m-b-sm" data-toggle="modal" data-target="#myModal">Add
                                new slider</button>
                            <!-- Modal -->
                             
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form id="fmf" action="" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="nlh" value ="<?php echo $_SESSION['dvs']; ?>" />
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                            aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Add
                                new Image</h4>
                                                </div>
                                                <div class="modal-body"> 
                                                    <script>
                                                    function fc() {       
    var fullPath = document.getElementById('file').value;
    if (fullPath) {
        var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
        var filename = fullPath.substring(startIndex);
        if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
            filename = filename.substring(1);
        }
        $('#fcn').text(filename);
    }
}
                                                    </script>
                                                    <div class="form-group" style="text-align: center;">
                                                        <input type="file" id="file" name="file" onchange="fc()" class="inputfile" accept="image/x-png,image/gif,image/jpeg" data-multiple-caption="{count} files selected" required>  
                                                        <label for="file"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg></figure>
                                                            <span id="fcn"></span></label>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" />
                                                    <input type="submit" id="add-row" class="btn btn-success" value="Done" />
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> 
                            <!-- Modal -->
                             <div class="table-responsive">
                                <table id="example3" class="display table" style="width: 100%; cellspacing: 0;">
                                    <thead>
                                        <tr> 
                                            <th class="sorting" tabindex="0" colspan="1">
                                                id
                                            </th> 
                                            <th class="sorting" tabindex="0" colspan="1" >
                                                name
                                            </th>  
                                            <th class="sorting" tabindex="0" colspan="1" >
                                                slide
                                            </th>  
                                            <th class="sorting" tabindex="0" colspan="1" style="width: 165px;"> 
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; foreach($sliders as $vc):  
                                               $i++;?>
                                        <tr role="row" <?php if($i%2): ?>class="odd"
                                            <?php endif;?>> 
                                            <td>
                                                <?php echo $i; ?>
                                            </td> 
                                            <td>
                                                <?php echo $vc['name']; ?>
                                            </td>
                                            <td>
                                                <img style="width: 75px;height: 75px;" src="<?php echo $vc['slide']; ?>" />
                                            </td>
                                            <td>
                                                <div class="input-group-btn">
                                                    <a href="slider.php?d=<?php echo $vc['id']. "&v=".$_SESSION['dvs']; ?>" class="btn btn-default">Delete </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Row -->
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
<script src="assets/plugins/datatables/js/jquery.datatables.min.js"></script>
<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="assets/js/space.min.js"></script>
<script src="assets/js/pages/table-data.js"></script>      
<script src="../js/toastr.js"></script>  
        <script>
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
<?php include "header.php"; 
//$access = array('book','theses','teaching','students','presentations','syllabus');
//$table = $_GET['t']; 
//if (!in_array($table, $access)) {
    //safeRedirect("404.php");
//}
//$data = ${$table};

$error = '';
if (!empty($_POST['nlg'])) {
    $nlg = TextToDB($_POST['nlg']);
    if (!empty($_POST['nlh'])) {
        $nlh = TextToDB($_POST['nlh']);
        $sql = "update `language` set `name`='$nlg' where `id`='$nlh'";

    } else {
        $sql = "insert into `language`(`name`,`image`,`short`, `bid`) values('$nlg','','', '".site_id ."')";
    }
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->execute(); 
    } 
    $error =  'toastr["success"]("successfuly changed", "Language changed");';
}
if (!empty($_GET['d'])) {
    if (!empty($_SESSION['dvs']) && $_SESSION['dvs'] == $_GET['v']) {
        $delete = TextToDB($_GET['d']); 
        $sql = "delete from `language` where `id`='".$delete."' and `bid`='".site_id ."'";
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->execute(); 
        } 
        $error =  'toastr["success"]("successfuly deleted", "Language delete");';
    } else { 
        $error =  'toastr["warning"]("please reload the page and try again", "Language warning");';
    }
}

if (!empty($_GET['e'])) {
    if (!empty($_SESSION['dvs']) && $_SESSION['dvs'] == $_GET['v']) { 
        $show_modal = true;
    } else { 
        $error =  'toastr["warning"]("please reload the page and try again", "Language warning");';
    }
}

$_SESSION['dvs'] = SaltMD5(rand(1, 100+intval(date('h.i', time()))));
 

require '../assets/db.php';
?>  
    <!-- Page Inner -->
    <div class="page-inner">
        <div class="page-title">
            <h3 class="breadcrumb-header">
                Languages
            </h3>
        </div>
        <div id="main-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h4 class="panel-title">Add rows</h4>
                        </div>
                        <div class="panel-body">
                            <button type="button" class="btn btn-success m-b-sm" data-toggle="modal" data-target="#myModal">Add
                                new row</button>
                            <!-- Modal -->
                             
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form id="fmf" action="" method="post">
                                            <input type="hidden" name="nlh" value ="" />
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                            aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Add
                                new Language</h4>
                                                </div>
                                                <div class="modal-body"> 
                                                    <div class="form-group">
                                                        <input type="text" id="a-input" name="nlg"
                                                            class="form-control"
                                                            placeholder="language" required>  
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
                            <div class="table-responsive">
                                <table id="example3" class="display table" style="width: 100%; cellspacing: 0;">
                                    <thead>
                                        <tr> 
                                            <th class="sorting" tabindex="0" colspan="1" >
                                                id
                                            </th> 
                                            <th class="sorting" tabindex="0" colspan="1" >
                                                language
                                            </th>  
                                            <th class="sorting" tabindex="0" colspan="1" style="width: 165px;"> 
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; foreach($languages as $vc):  
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
                                                <div class="input-group-btn">
                                                            <button type="button" class="btn btn-default" data-toggle="dropdown" aria-expanded="true">Action <span class="caret"></span></button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li><a href="languages.php?d=<?php echo $vc['id']. "&v=".$_SESSION['dvs']; ?>">Delete</a></li>
                                                                <li><a onclick="editor(<?php echo $vc['id'] . ',\''.$vc['name'].'\'' ?>)">Edit</a></li> 
                                                            </ul>
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
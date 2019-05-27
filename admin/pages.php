<?php include "header.php"; 

if (!empty($_GET['v'])) {
    if ((!empty($_SESSION['dvs']) && $_SESSION['dvs'] == $_GET['v'])) {
        if (!empty($_GET['d'])) {
                $delete = TextToDB($_GET['d']);  
                $sql = "delete from `menu` where `id`='".$delete."' and `bid`='".$_SESSION['bid'] ."'";
                if ($stmt = $mysqli->prepare($sql)) {
                    $stmt->execute();
                    if($stmt->affected_rows == 1) {
                        $sql = "delete from `post` where `mid`='".$delete."'";
                        if ($stmt = $mysqli->prepare($sql)) {
                            $stmt->execute();
                            $error =  'toastr["success"]("successfuly deleted", "Page delete");';
                        }
                    } else {
                        $error =  'toastr["error"]("fatal error", "fatal error");';
                    }
                } else {
                    $error =  'toastr["error"]("fatal error", "fatal error");';
                }
        } elseif (!empty($_GET['e'])) {
            safeRedirect("page.php?e=".$_GET['e']."&v=".$_GET['v']);
        }
    } else {
        $error =  'toastr["warning"]("please reload the page and try again", "Page warning");';
    }
}
$ln = $language_lid;
if (!empty($_GET['mclang'])) {
    foreach ($languages as $lang) {
        if ($_GET['mclang'] == $lang['id']) {
            $ln = $lang['id'];
            break;
        }
    }
}


$_SESSION['dvs'] = SaltMD5(rand(1, 100+intval(date('h.i', time()))));
 
require '../assets/db.php';
?> 
 
    <!-- Page Inner -->
    <div class="page-inner">
        <div class="page-title">
            <h3 class="breadcrumb-header">
                Pages
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
                        
                        <script language="javascript">
               function select_lang(lang) { 
	document.location.href = "pages.php?mclang=" + lang.value;
}
            </script> 
            <div class="panel panel-white">
                <select name="mclang" id="mclang" class="btn btn-default dropdown-toggle"
                    onchange="select_lang(this);">
                 <?php foreach($languages as $lang): ?>
                    <option value="<?php echo $lang['id'] ?>" <?php if($ln == $lang['id']): ?>selected="selected"<?php endif; ?>><?php echo $lang['name'] ?></option>
                 <?php endforeach; ?> 
                </select> 
                        <a href="page.php?l=<?php echo $ln; ?>" class="btn btn-success" <?php if ($ln == ""): ?> disabled <?php endif; ?>>Add
                                new page</a>
                                </div> 
                             <div class="table-responsive">
                                <table id="example3" class="display table" style="width: 100%; cellspacing: 0;">
                                    <thead>
                                        <tr> 
                                            <th class="sorting" tabindex="0" colspan="1">
                                                id
                                            </th> 
                                            <th class="sorting" tabindex="0" colspan="1" >
                                                menu
                                            </th>  
                                            <th class="sorting" tabindex="0" colspan="1" style="width: 165px;"> 
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; if ($ln !== "" && !empty($page_menus['l'.$ln]))foreach($page_menus['l'.$ln] as $vc):  
                                               $i++;?>
                                        <tr role="row" <?php if($i%2): ?>class="odd"
                                            <?php endif;?>> 
                                            <td>
                                                <?php echo $i; ?>
                                            </td> 
                                            <td>
                                                <?php echo $vc['text']; ?>
                                            </td> 
                                            <td>
                                                <div class="input-group-btn">
                                                            <button type="button" class="btn btn-default" data-toggle="dropdown" aria-expanded="true">Action <span class="caret"></span></button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li><a href="pages.php?d=<?php echo $vc['id']. "&v=".$_SESSION['dvs']; ?>">Delete</a></li>
                                                                <li><a href="pages.php?e=<?php echo $vc['id']. "&v=".$_SESSION['dvs']; ?>">Edit</a></li> 
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
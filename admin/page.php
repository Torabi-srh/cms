<?php include "header.php";
function _page_update($mysqli,$_attachment = NULL) {
    if(!empty($_POST['snt']) && !empty($_POST['mnm'])) {
        if ((!empty($_SESSION['dvs']) && $_SESSION['dvs'] == $_POST['v'])) {
            //$content = TextToDB($_POST['snt']);
            $content = $mysqli->real_escape_string(htmlentities(htmlspecialchars($_POST['snt'])));
            $menu = TextToDB($_POST['mnm']);
            $vib = (!empty($_POST['vib'])?'1':'0');
            $ico = TextToDB($_POST['ico']);
            $sql = "update `menu` set `ico`='$ico',`visibility`='$vib', `name` ='".$menu."' where id='". $_SESSION['edit'] ."' and bid='".site_id ."'";
            if ($stmt = $mysqli->prepare($sql)) {
                if ($stmt->execute()) {
                    $stmt->store_result();
                    $mid = $_SESSION['edit'];
                    $sql = "update `post` set `content`='".$content."' where `mid`='".$mid."'";
                    $_SESSION['edit'] = null;
                    if ($stmt = $mysqli->prepare($sql)) {
                        if ($stmt->execute()) {
                            $stmt->store_result();
                            safeRedirect("pages.php");die();exit();
                        }
                    }
                }
            }
            return 'toastr["warning"]("لطفا صفحه را مجددا بارگذاری کنید و دوباره تلاش کنید", "هشدار صفحه");';
        } else {
           return 'toastr["warning"]("لطفا صفحه را مجددا بارگذاری کنید و دوباره تلاش کنید", "هشدار صفحه");';
        }
    } else {
        return 'toastr["warning"]("لطفا صفحه را مجددا بارگذاری کنید و دوباره تلاش کنید", "هشدار صفحه");';
    }
}
if (!empty($_GET['e'])) {
    if (!empty($_POST['snt']) && !empty($_POST['mnm'])) {
        $error='';
        $_SESSION['edit'] = intval($_GET['e']);
        $error=_page_update($mysqli);
    }
    $e = TextToDB($_GET['e']);
    if (!empty($_SESSION['dvs']) && ($_SESSION['dvs'] == $_GET['v'] || $_SESSION['dvs'] == $_POST['v'])) {
        $sql = "SELECT `lid`, `name`, `link`, `bid`,`ico`,`visibility` FROM `menu` where `id` = '$e'";
        $_lid;
        $_name;
        $_link;
        $_bid;
        $_vib;
        $_ico;
        $page_menus = array();
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($_lid, $_name, $_link, $_bid,$_ico,$_vib);
            $stmt->fetch();
            if (site_id != $_bid) {
                safeRedirect("pages.php");die();exit();
            }

            $sql = "SELECT `content` FROM `post` where `mid` = '$e'";
            $_content;
            $page_menus = array();
            if ($stmt = $mysqli->prepare($sql)) {
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result($_content);
                $stmt->fetch();
                $_content = html_entity_decode(htmlspecialchars_decode($_content));
                $SESSION['edit'] = $e;
            }
        }
    } else {
        safeRedirect("pages.php");die();exit();
    }
} else {
    if (empty($SESSION['edit'])) {
        $ln = intval($_GET['l']);
        if (empty($ln)) {
            safeRedirect("pages.php");die();exit();
        } 
        $error="";
    if (!empty($_POST['snt']) && !empty($_POST['mnm'])) {
        if (!empty($_SESSION['dvs']) && $_SESSION['dvs'] == $_POST['v']) {
            //$content = TextToDB($_POST['snt']);
            $content = $mysqli->real_escape_string(htmlentities(htmlspecialchars($_POST['snt'])));
            $menu = TextToDB($_POST['mnm']);
            $vib = (!empty($_POST['vib'])?'1':'0');
            $ico = TextToDB($_POST['ico']);
            $sql = "insert into `menu`(`lid`, `name`, `link`, `bid`, `ico`, `visibility`) values ('".$ln."', '".$menu."', '', '".site_id ."', '".$ico."', '".$vib."')";
            if ($stmt = $mysqli->prepare($sql)) {
                if ($stmt->execute()) {
                    $stmt->store_result();
                    $mid = $stmt->insert_id;
                    $sql = "insert into `post`(`mid`, `content`, `parent`) values ('".$mid."', '".$content."', 0)";
                    if ($stmt = $mysqli->prepare($sql)) {
                        if ($stmt->execute()) {
                            $stmt->store_result();
                            safeRedirect("pages.php");die();exit();
                        }
                    }
                }
            }
        } else {
            $error =  'toastr["warning"]("لطفا صفحه را مجددا بارگذاری کنید و دوباره تلاش کنید", "هشدار صفحه");';
        }
    }
    } else {
        $error="";
        $error=_page_update($mysqli);
    }
}

$_SESSION['dvs'] = SaltMD5(rand(1, 100+intval(date('h.i', time()))));
echo $vib;die();
?>
<link href="assets/css/fontawesome-iconpicker.min.css" rel="stylesheet">
    <div class="page-inner">
        <div class="page-title">
            <h3 class="breadcrumb-header">new page</h3>
        </div>
        <form action="" method="post">
        <input type="hidden" name="v" value="<?php echo $_SESSION['dvs']; ?>" />
            <div id="main-wrapper">
                <div class="panel panel-white"> 
                    <div class="panel-body"> 
                        <div class="form-inline">
                            <div class="form-group">
                                <label for="mnm">Menu name </label> 
                                <input type="text" name="mnm" class="form-control" id="mnm" placeholder="Page" value="<?php echo (!empty($SESSION['edit']) ? $_name : ''); ?>">
                            </div>
                            <button type="submit" class="btn btn-danger pull-right">Save</button> 
                        </div>
                    </div>
                </div>
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">Options</h4>
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-4 checkbox">
                          <label <?php echo ((!empty($vib)&&$vib=="1")?'class="active"':""); ?>><input type="checkbox" name="vib" id="vib" <?php echo ((!empty($vib)&&$vib=="1")?'checked="checked" class="active"':""); ?>>Invisibale</label>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Icon</span>
                              </div>
                              <input style="width: 50%;" type="text" value="<?php echo ((!empty($_ico))?"$_ico":""); ?>" class="icon-picker form-control" aria-label="Icon" name="ico" placeholder="fa fa-home" aria-describedby="basic-addon1" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-white"> 
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <textarea name="snt" class="summernote" id="editor"><?php echo (!empty($SESSION['edit']) ? $_content : ''); ?></textarea >
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Main Wrapper -->
        </form>
    </div><!-- /Page Inner -->
</div><!-- /Page Content -->
</div><!-- /Page Container -->
 
<!-- Javascripts -->
<!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">-->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!--<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>
<script src="fa/assets/plugins/jquery/jquery-3.1.0.min.js"></script>
<script src="fa/assets/plugins/bootstrap/js/bootstrap.min.js"></script>-->
<script src="fa/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="fa/assets/plugins/uniform/js/jquery.uniform.standalone.js"></script>
<script src="fa/assets/plugins/switchery/switchery.min.js"></script>
<script src="fa/assets/plugins/d3/d3.min.js"></script> 
<script src="fa/assets/plugins/nvd3/nv.d3.min.js"></script>
<script src="fa/assets/plugins/flot/jquery.flot.min.js"></script>
<script src="fa/assets/plugins/flot/jquery.flot.time.min.js"></script>
<script src="fa/assets/plugins/flot/jquery.flot.symbol.min.js"></script>
<script src="fa/assets/plugins/flot/jquery.flot.resize.min.js"></script>
<script src="fa/assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="fa/assets/plugins/flot/jquery.flot.pie.min.js"></script>
<script src="fa/assets/js/space.min.js"></script>
<script src="assets/js/fontawesome-iconpicker.min.js"></script>
<script src="/js/plugins/ckeditor/ckeditor.js"></script>
<script>
 $(function() {   
   $('.icon-picker').iconpicker();
 });

    CKEDITOR.replace( 'editor', {
extraPlugins: 'bootstrapTabs',
  contentsCss: [ 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' ],
  on: {
    instanceReady: loadBootstrap,
    mode: loadBootstrap
  }
} );
function loadBootstrap(event) {
    if (event.name == 'mode' && event.editor.mode == 'source')
        return; // Skip loading jQuery and Bootstrap when switching to source mode.

    var jQueryScriptTag = document.createElement('script');
    var bootstrapScriptTag = document.createElement('script');

    jQueryScriptTag.src = 'https://code.jquery.com/jquery-1.11.3.min.js';
    bootstrapScriptTag.src = 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js';

    var editorHead = event.editor.document.$.head;

    editorHead.appendChild(jQueryScriptTag);
    jQueryScriptTag.onload = function() {
      editorHead.appendChild(bootstrapScriptTag);
    };
}
</script>
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
                <?php if (!empty($error)) echo $error; ?>
        </script>  
</body>

</html>
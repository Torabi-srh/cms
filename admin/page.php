<?php include "header.php"; 
$_attachment;
function _page_update($mysqli,$_attachment) {
    if(!empty($_POST['snt']) && !empty($_POST['mnm'])) {
        if (!empty($_SESSION['dvs']) && $_SESSION['dvs'] == $_POST['v']) {
            //$content = TextToDB($_POST['snt']);
            $content = $mysqli->real_escape_string(htmlentities(htmlspecialchars($_POST['snt'])));
            $menu = TextToDB($_POST['mnm']);
            
            $sql = "update `menu` set `name` ='".$menu."' where id='". $_SESSION['edit'] ."' and bid='".site_id ."'";
            if ($stmt = $mysqli->prepare($sql)) {
                if ($stmt->execute()) {
                    $stmt->store_result();
                    $mid = $_SESSION['edit'];
                    $_attachment = _page_file_upload($_attachment);
                    $sql = "update `post` set `content`='".$content."',`attachment`='".$_attachment."' where `mid`='".$mid."'";
                    $_SESSION['edit'] = null;
                    if ($stmt = $mysqli->prepare($sql)) {
                        if ($stmt->execute()) {
                            $stmt->store_result();
                            safeRedirect("pages.php");die();exit();
                        }
                    }
                }
            }
        } else {
           return 'toastr["warning"]("لطفا صفحه را مجددا بارگذاری کنید و دوباره تلاش کنید", "هشدار صفحه");';
        }
    }
}
function _page_file_upload($_attachment) {
    if(isset($_FILES['image_uploader_multiple']['name']))
    {
        $file_name_all="";
        for($i=0; $i<count($_FILES['image_uploader_multiple']['name']); $i++) 
        {
               $tmpFilePath = $_FILES['image_uploader_multiple']['tmp_name'][$i];    
               if ($tmpFilePath != "")
               {    
                   $path = '/attachment/'. site_id.'/'; // create folder 
                   
                   $name = $_FILES['image_uploader_multiple']['name'][$i];
                   $iiex = 1;
                   $path_info = pathinfo($name);
                   while (file_exists($path.$name)) {
                       $name = basename($_FILES['image_uploader_multiple']['name'][$i]).'_'.$iiex++.$path_info['extension'];
                   }
                   $size = $_FILES['image_uploader_multiple']['size'][$i];

                   list($txt, $ext) = explode(".", $name);
                   $file= time().substr(str_replace(" ", "_", $txt), 0);
                   $info = pathinfo($file);
                   $filename = $file.".".$ext;
                   if(move_uploaded_file($_FILES['image_uploader_multiple']['tmp_name'][$i], $path.$filename)) 
                   { 
                      $file_name_all.=$filename.";";
                   }
             }
        }
        $filepath = rtrim($file_name_all, ';'); 
        return $_attachment.';'.$filepath;
        }
        else
    {
        $filepath=""; 
        return $_attachment.';'.$filepath;
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
        $sql = "SELECT `lid`, `name`, `link`, `bid` FROM `menu` where `id` = '$e'";
        $_lid;
        $_name;
        $_link;
        $_bid;
        $page_menus = array();
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($_lid, $_name, $_link, $_bid);
            $stmt->fetch();
            if (site_id !== $_bid) {
                safeRedirect("pages.php");die();exit();
            }

            $sql = "SELECT `content`,`attachment` FROM `post` where `mid` = '$e'";
            $_content; 
            $_attachment; 
            $page_menus = array();
            if ($stmt = $mysqli->prepare($sql)) {
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result($_content,$_attachment);
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
            
            $sql = "insert into `menu`(`lid`, `name`, `link`, `bid`) values ('".$ln."', '".$menu."', '', '".site_id ."')";
            if ($stmt = $mysqli->prepare($sql)) {
                if ($stmt->execute()) {
                    $stmt->store_result();
                    $mid = $stmt->insert_id;
                    $attachment = _page_file_upload('');
                    $sql = "insert into `post`(`mid`, `content`, `parent`, `attachment`) values ('".$mid."', '".$content."', 0,'".$attachment."')";
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

?>

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
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <textarea name="snt" class="summernote" id="editor"><?php echo (!empty($SESSION['edit']) ? $_content : ''); ?></textarea >
                            </div>
                        </div>
                    </div>
                </div>
 <!-- attachie -->
 <div class="panel panel-white"> 
                <p>
<label for="image_uploader_multiple">attachment:</label>
</p> 
<table width="100%" id="multi_file_uploader" class="table">
	<tbody>
		<tr class="imageSelectorContainer d-flex">
			<td valign="top">
                <!-- <span class="btn btn-primary btn-file" style="width:25%"> -->
                    <input type="file" name="image_uploader_multiple[]" value="" class="multipleImageFileInput btn btn-primary btn-file" onchange="show_image_preview(this);" multiple="">
                <!-- </span> -->
				<table class="imagePreviewTable"></table>
			</td>
			<td valign="top" align="right" class="col-1" style="width:40px;">
				<input type="button" value="X" title="Remove" class="removeButton btn btn-warning" style="display:none;" onclick="remove_file_uploader(this)">
			</td>
			<td valign="top" class="col-1" style="width:40px;"><input class="btn btn-default" type="button" value="+" title="Add" class="addButton" style="" onclick="add_new_file_uploader(this)"> </td>
		</tr>
	</tbody>
	<tbody> 
		<tr>
			<td colspan="3" class="buttonBox"> 
			</td>
		</tr>
	</tbody>
</table>
</div>
<?php if (!empty($SESSION['edit']) && !empty($_attachment)): ?>
<?php $_attachment = explode(";", $_attachment); ?>
<div class="panel panel-white">
    <div class="row" id="container">
                <?php for ($i = 0;$i < count($_attachment);$i+=4): ?>
        <div class="column">
                    <?php for ($j = $i;$j < $i+4;$j++): ?>
                    <?php if(empty($_attachment[$j])) { break; } ?>
                        <?php $src = '/attachment/'.site_id.'/' . $_attachment[$j]; ?>
            <div class="img-wrap">
                <span class="close" onclick="dlt(this,'<?php echo $_attachment[$j]; ?>')">&times;</span>
                <!-- <img src="<?php //echo $src; ?>"> -->
                <i class="fa fa-file-image-o fa-5"></i>
            </div>
                    <?php endfor; ?>
        </div>
                <?php endfor; ?>
    </div>
</div>
<?PHP endif; ?>
<script> 
function dlt(a,t) {
    $(a).parent.remove();
    $.ajax({
  type: "POST",
  url: '',
  data: { da: t },
  success: function(result){
    $(a).parent.remove();
  }
});
}
</script>
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
.img-wrap {
    position: relative;
    ...
}
.img-wrap .close {
    position: absolute;
    top: 2px;
    right: 2px;
    z-index: 100;
}
.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    border: 0;
  clip: rect(0, 0, 0, 0);
  height: 1px;
  overflow: hidden;
  padding: 0;
  position: absolute !important;
  white-space: nowrap;
  width: 1px;  
}
.buttonBox{
	padding: 20px;
	text-align: center;
}
.imagePreviewTable{
	border: 1px solid #000;
	display: none;
}
.overlay {
    position:absolute; top:0; left:0; right:0; bottom:0; background-color:rgba(0, 0, 0, 0.85); background: url(data:;base64,iVBORw0KGgoAAAANSUhEUgAAAAIAAAACCAYAAABytg0kAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAgY0hSTQAAeiYAAICEAAD6AAAAgOgAAHUwAADqYAAAOpgAABdwnLpRPAAAABl0RVh0U29mdHdhcmUAUGFpbnQuTkVUIHYzLjUuNUmK/OAAAAATSURBVBhXY2RgYNgHxGAAYuwDAA78AjwwRoQYAAAAAElFTkSuQmCC) repeat scroll transparent\9; /* ie fallback png background image */ z-index:9999; color:white; text-align:center; height:5000px; display:none;
}
.overlay_content{
    padding:300px;
}
</style>  
                <!-- attachie -->
            </div><!-- Main Wrapper -->
        </form>
    </div><!-- /Page Inner -->
</div><!-- /Page Content -->
</div><!-- /Page Container -->
 
<!-- Javascripts -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>
<script src="fa/assets/plugins/jquery/jquery-3.1.0.min.js"></script>
<script src="fa/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
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
<script src="/js/plugins/ckeditor/ckeditor.js"></script>
<script>
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
<!-- attachie -->
<script type="text/javascript">
$(document).ready(function(){
	// $('form').submit(function(ev){
	// 	$('.overlay').show();
	// 	$(window).scrollTop(0);
	// 	return upload_images_selected(ev, ev.target);
	// })
})
function add_new_file_uploader(addBtn) {
	var currentRow = $(addBtn).parent().parent();
	var newRow = $(currentRow).clone();
	$(newRow).find('.previewImage, .imagePreviewTable').hide();
	$(newRow).find('.removeButton').show();
	$(newRow).find('table.imagePreviewTable').find('tr').remove();
	$(newRow).find('input.multipleImageFileInput').val('');
	$(addBtn).parent().parent().parent().append(newRow);
}
function remove_file_uploader(removeBtn) {
	$(removeBtn).parent().parent().remove();
}
function show_image_preview(file_selector) {
	//files selected using current file selector
	var files = file_selector.files;
	//Container of image previews
	var imageContainer = $(file_selector).next('table.imagePreviewTable');
	//Number of images selected
	var number_of_images = files.length;
	//Build image preview row
	var imagePreviewRow = $('<tr class="imagePreviewRow_0"><td valign=top style="width: 510px;"></td>' +
		'<td valign=top><input type="button" value="X" title="Remove Image" class="removeImageButton" imageIndex="0" onclick="remove_selected_image(this)" /></td>' +
		'</tr> ');
	//Add image preview row
	$(imageContainer).html(imagePreviewRow);
	if (number_of_images > 1) {
		for (var i =1; i<number_of_images; i++) {
			/**
			 *Generate class name of the respective image container appending index of selected images, 
			 *sothat we can match images selected and the one which is previewed
			 */
			var newImagePreviewRow = $(imagePreviewRow).clone().removeClass('imagePreviewRow_0').addClass('imagePreviewRow_'+i);
			$(newImagePreviewRow).find('input[type="button"]').attr('imageIndex', i);
			$(imageContainer).append(newImagePreviewRow);
		}
	}
	for (var i = 0; i < files.length; i++) {
		var file = files[i];
		
		/**
		 * Create an image dom object dynamically
		 */
		var img = document.createElement("img");
		
		/**
		 * Get preview area of the image
		 */
		var preview = $(imageContainer).find('tr.imagePreviewRow_'+i).find('td:first');
		/**
		 * Append preview of selected image to the corresponding container
		 */
		preview.append(img); 
		
		/**
		 * Set style of appended preview(Can be done via css also)
		 */
		preview.find('img').addClass('previewImage').css({'max-width': '500px', 'max-height': '500px'});
		
		/**
		 * Initialize file reader
		 */
		var reader = new FileReader();
		/**
		 * Onload event of file reader assign target image to the preview
		 */
		reader.onload = (function(aImg) { return function(e) { aImg.src = e.target.result; }; })(img);
		/**
		 * Initiate read
		 */
		reader.readAsDataURL(file);
	}
	/**
	 * Show preview
	 */
	$(imageContainer).show();
}
function remove_selected_image(close_button)
{
	/**
	 * Remove this image from preview
	 */
	var imageIndex = $(close_button).attr('imageindex');
	$(close_button).parents('.imagePreviewRow_' + imageIndex).remove();
}
function upload_images_selected(event, formObj)
{
	event.preventDefault();
	//Get number of images
	var imageCount = $('.previewImage').length;
	//Get all multi select inputs
	var fileInputs = document.querySelectorAll('.multipleImageFileInput');
	//Url where the image is to be uploaded
	var url= "/admin/content/upload";
	//Get number of inputs
	var number_of_inputs = $(fileInputs).length; 
	var inputCount = 0;
	//Iterate through each file selector input
	$(fileInputs).each(function(index, input){
		
		fileList = input.files;
		// Create a new FormData object.
		var formData = new FormData();
		//Extra parameters can be added to the form data object
		formData.append('bulk_upload', '1');
		formData.append('username', $('input[name="username"]').val());
		//Iterate throug each images selected by each file selector and find if the image is present in the preview
		for (var i = 0; i < fileList.length; i++) {
			if ($(input).next('.imagePreviewTable').find('.imagePreviewRow_'+i).length != 0) {
				var file = fileList[i];
				// Check the file type.
				if (!file.type.match('image.*')) {
					continue;
				}
				// Add the file to the request.
				formData.append('image_uploader_multiple[' +(inputCount++)+ ']', file, file.name);
			}
		}
		// Set up the request.
		var xhr = new XMLHttpRequest();
		xhr.open('POST', url, true);
		xhr.onload = function () {
			if (xhr.status === 200) {
				var jsonResponse = JSON.parse(xhr.responseText);
				if (jsonResponse.status == 1) {
					$(jsonResponse.file_info).each(function(){
						//Iterate through response and find data corresponding to each file uploaded
						var uploaded_file_name = this.original;
						var saved_file_name = this.target;
						var file_name_input = '<input type="hidden" class="image_name" name="image_names[]" value="' +saved_file_name+ '" />';
						file_info_container.append(file_name_input);
						
						imageCount--;
					})
					//Decrement count of inputs to find all images selected by all multi select are uploaded
					number_of_inputs--;
					if(number_of_inputs == 0) {
						//All images selected by each file selector is uploaded
						//Do necessary acteion post upload
						$('.overlay').hide();
					}
				} else {
					if (typeof jsonResponse.error_field_name != 'undefined') {
						//Do appropriate error action
					} else {
						alert(jsonResponse.message);
					}
					$('.overlay').hide();
					event.preventDefault();
					return false;
				}
			} else {
				alert('Something went wrong!');
				$('.overlay').hide();
				event.preventDefault();
			}
		};
		xhr.send(formData);
	})
	
	return false;
}
</script>
<!-- attachie -->
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
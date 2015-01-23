<?php
include 'dbcon.php';
$action = $_GET['action'];
?>
<script type="text/javascript" src="tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste",
        "pagebreak",
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    pagebreak_separator: "<!-- pagebreak -->"
});
</script>
<?php
	if($action == 'news' ||$action == 'act' ){
   
?>
	<form action="create.php" method="post" autocomplete="off" novalidate >
		<input type="hidden" name="action" value="<?php echo $action;?>" >
		<input style="" name="judul" id="judul" type="text" class="form-control" required>
		<!--input style="" name="tgl" id="tgl" type="date" class="form-control" required-->
		<textarea name="content" required></textarea>
		<button type="submit">Submit</button>
	</form>
<?
	}
	else if($action=='gal'){
?>

	<form action="create.php" method="post" autocomplete="off" enctype="multipart/form-data">
		<input type="hidden" name="action" value="<?php echo $action;?>" >
		<input style="" name="judul" id="judul" type="text" class="form-control" required>
		<!--input style="" name="tgl" id="tgl" type="date" class="form-control" required-->
		Select image to upload:
    	<input type="file" name="fileToUpload" id="fileToUpload">
		<button type="submit">Submit</button>
	</form>

<?php
	}
?>
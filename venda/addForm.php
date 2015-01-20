<?php
include 'dbcon.php';
$action = $_GET['action'];
?>

<?php
	if($action == 'news' ||$action == 'act' ){
   
?>
	<form action="create.php" method="post" autocomplete="off" >
		<input type="hidden" name="action" value="<?php echo $action;?>" >
		<input style="" name="judul" id="judul" type="text" class="form-control" required>
		<!--input style="" name="tgl" id="tgl" type="date" class="form-control" required-->
		<textarea name="cont" required></textarea>
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
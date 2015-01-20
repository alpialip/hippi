<?php
	include 'dbcon.php';
	$action = $_POST['action'];
	$ids = $_POST['ids'];
?>

<?php
	if($action == 'news'){
		
    	$qrDelete = "
    		DELETE FROM news where news_id =".$ids;
    	$result = mysql_query($qrDelete);

	}
	else if($action == 'act'){
		
    	$qrDelete = "
    		DELETE FROM activity where activity_id =".$ids;
    	$result = mysql_query($qrDelete);

	}
	else if($action == 'gal'){
		
    	$qrDelete = "
    		DELETE FROM galeri where galeri_id =".$ids;
    	$result = mysql_query($qrDelete);

	}
?>
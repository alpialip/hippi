<?php
	include 'dbcon.php';
	$action = $_POST['action'];
?>

<?php
	if($action == 'news'){
		
		$jdl = $_POST['judul'];
		$cont = $_POST['cont'];
    	$qrCreate = "
    		INSERT INTO  news (
				
				news_judul,
				news_tanggal ,
				news_content
				)
				VALUES ('".$jdl."',  NOW(),  '".$cont ."')
    	";
    	$result = mysql_query($qrCreate);
    	header("Location: newscrud.php");
	}
	else if($action == 'act'){
		
		$jdl = $_POST['judul'];
		$cont = $_POST['cont'];
    	$qrCreate = "
    		INSERT INTO  activity (
				
				activity_judul,
				activity_tanggal ,
				activity_content
				)
				VALUES ('".$jdl."',  NOW(),  '".$cont ."')
    	";
    	$result = mysql_query($qrCreate);
    	header("Location: activitycrud.php");
	}
	else if($action == 'gal'){
		
		$jdl = $_POST['judul'];
		$cont = $_FILES["fileToUpload"]["name"];

		/*upload*/
		$target_dir = "images/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		$uploadOk = 1;
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		    if($check !== false) {
		       // echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        //echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}

		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}

		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		        /*save database*/
		    	$qrCreate = "
		    		INSERT INTO  galeri (
						
						galeri_judul,foto
						)
						VALUES ('".$jdl."', '".$cont."')
		    	";
		    	$result = mysql_query($qrCreate);
		    	header("Location: galerycrud.php");
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		        header("Location: galerycrud.php");
		    }
		}
	}
?>
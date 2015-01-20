<?php
include 'dbcon.php';
$action = $_GET['action'];
$ids = $_GET['ids'];

?>

<?php
	if($action == 'news'){
    $qrNews = "SELECT 
             news_judul, 
             news_tanggal, 
             news_content
            FROM news
            WHERE news_id = ".$ids;
          //  echo $qrNews; exit();
    $getNews = mysql_query($qrNews);
    $resultNews = mysql_fetch_array($getNews);
    $date = date("d",strtotime($resultNews['news_tanggal']));
	$month = date("M",strtotime($resultNews['news_tanggal']));
	$year = date("Y",strtotime($resultNews['news_tanggal']));
	$judul=$resultNews['news_judul'];
	$content=$resultNews['news_content'];

	}
	else if($action == 'act'){
    $qrNews = "SELECT 
             activity_judul, 
             activity_tanggal, 
             activity_content
            FROM activity
            WHERE activity_id = ".$ids;
          //  echo $qrNews; exit();
    $getNews = mysql_query($qrNews);
    $resultNews = mysql_fetch_array($getNews);
    $date = date("d",strtotime($resultNews['activity_tanggal']));
	$month = date("M",strtotime($resultNews['activity_tanggal']));
	$year = date("Y",strtotime($resultNews['activity_tanggal']));
	$judul=$resultNews['activity_judul'];
	$content=$resultNews['activity_content'];

	}
	else if($action == 'gal'){
    $qrNews = "SELECT 
             galeri_judul,foto
            FROM  galeri
            WHERE  galeri_id = ".$ids;
          //  echo $qrNews; exit();
    $getNews = mysql_query($qrNews);
    $resultNews = mysql_fetch_array($getNews);
	$judul=$resultNews['galeri_judul'];
	$content=$resultNews['foto'];

	}
?>
	<?php echo  $judul ;?>
	<br>
	<?php 
		if ($action == 'news' || $action == 'act') {
			echo    $date." - ".$month." - ".$year ;
		}
		
	?>
	<br>
	
		<?php
			if ($action != "gal") {
				echo  $content ;
			}
			else
			{
				?>
					<img src="images/<?php echo  $content ;?>">
				<?php
			}
		?>
	<br>
	<?php
		switch ($action) {
			case 'news':
				?>
					<a href="newscrud.php">back</a>
				<?php
				break;
			case 'act':
				?>
					<a href="activitycrud.php">back</a>
				<?php
				break;
			case 'gal':
				?>
					<a href="galerycrud.php">back</a>
				<?php
				break;
			default:
				# code...
				break;
		}
	?>
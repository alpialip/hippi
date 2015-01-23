<script type="text/javascript" src="tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>
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
	$judul =$resultNews['news_judul'];
	$tanggal= $resultNews['news_tanggal'];
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
	$judul =$resultNews['activity_judul'];
	$tanggal= $resultNews['activity_tanggal'];
	$content=$resultNews['activity_content'];
	}
	else if($action == 'gal'){
    $qrNews = "SELECT 
             galeri_judul, 
             foto
            FROM galeri
            WHERE galeri_id = ".$ids;
          //  echo $qrNews; exit();
    $getNews = mysql_query($qrNews);
    $resultNews = mysql_fetch_array($getNews);
	$judul =$resultNews['galeri_judul'];
	$content=$resultNews['foto'];
	}
?>
<form action="update.php" method="post" autocomplete="off"  enctype="multipart/form-data">
		<input type="hidden" name="ids" value="<?php echo $ids;?>">
		<input type="hidden" name="action" value="<?php echo $action;?>">
		<label for="judul">Judul</label>
		<input style="" name="judul" id="judul" type="text" class="form-control" value="<?php echo $judul;?>" ><br/>
		<?php
			if ($action != 'gal') {
				?>	
					<label for="tgl">Tanggal</label>
					<input style="" name="tgl" id="tgl" type="date" class="form-control" value="<?php echo $tanggal;?>"><br/>
					<label for="content">Isi</label>	
					<textarea name="content"><?php echo $content ;?></textarea>
				<?php
			}
			else
			{
				?>
					Select image to upload:
    				<input type="file" name="fileToUpload" id="fileToUpload">
				<?php
			}
		?>
		
		
		
		<button type="submit">Submit</button>
	</form>
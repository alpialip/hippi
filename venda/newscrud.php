 <script src="jquery.min.js"></script>
<?php
include "dbcon.php";
$qrNews = "SELECT news_id,news_judul,news_tanggal, news_content
            FROM news
            ORDER BY news_tanggal DESC
            /*LIMIT 0,3*/
            "; 
$getNews = mysql_query($qrNews);
?>
	<table   border="1">
		<thead>
			<tr>
				<label><h2>Daftar Berita</h2></label>
			</tr>
			<tr>
				<a href="addForm.php?action=news">Add</a>
			</tr>
			<tr>
				<th style='font-size:90%' valign='middle'>
					Judul Berita
				</th>
				<th style='font-size:90%' valign='middle'>
					Tanggal Berita
				</th>
				<th style='font-size:90%' valign='middle'>
					Konten Berita
				</th>
				<th style='font-size:90%' valign='middle'>
					Control
				</th>
			</tr>
		</thead>
		<tbody>
			<?php
					while($resultNews=mysql_fetch_assoc($getNews)) {
					    $date = date("d",strtotime($resultNews['news_tanggal']));
					    $month = date("M",strtotime($resultNews['news_tanggal']));
					    $year = date("Y",strtotime($resultNews['news_tanggal']));
			?>
			<tr>
				<td width='10%'  valign='middle' ><?php echo $resultNews['news_judul']; ?></td>
				<td width='10%'  valign='middle' ><?php echo $date." - ".$month." - ".$year; ?></td>
				<td width='10%'  valign='middle' ><?php echo $resultNews['news_content']; ?></td>
				<td width='10%'  valign='middle' ><a href="detail.php?action=news&ids=<?php echo $resultNews['news_id']; ?>">View</a>&nbsp;<a href="updateForm.php?action=news&ids=<?php echo $resultNews['news_id']; ?>">Update</a>&nbsp;<a href="#" onclick="del(<?php echo $resultNews['news_id'];?>)" >Delete</a></td>

			</tr>
			<?php
}
?>
		</tbody>
	</table>
<script type="text/javascript">
function del(idDel)
{
	var action = 'news';
	var ids = idDel;
	$.ajax({
		url:'delete.php',
		type:'POST',
		cache:false,
		data: {'action':action,'ids':ids},
		success: function(resp){
			location.reload(true);
		}
	});
}
	
</script>
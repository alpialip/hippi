 <script src="jquery.min.js"></script>
<?php
include "dbcon.php";
$qrNews = "SELECT galeri_id,galeri_judul,foto
            FROM galeri
            ORDER BY galeri_id DESC
            /*LIMIT 0,3*/
            "; 
$getNews = mysql_query($qrNews);
?>
	<table   border="1">
		<thead>
			<tr>
				<label><h2>Daftar Galery</h2></label>
			</tr>
			<tr>
				<a href="addForm.php?action=gal">Add</a>
			</tr>
			<tr>
				<th style='font-size:90%' valign='middle'>
					Judul Galery
				</th>
				<th style='font-size:90%' valign='middle'>
					Foto
				</th>
				<th style='font-size:90%' valign='middle'>
					Control
				</th>
			</tr>
		</thead>
		<tbody>
			<?php
					while($resultNews=mysql_fetch_assoc($getNews)) {
			?>
			<tr>
				<td width='10%'  valign='middle' ><?php echo $resultNews['galeri_judul']; ?></td>
				<td width='10%'  valign='middle' align="center"><img src="images/<?php echo $resultNews['foto']; ?>" width="350px" height="200px"> </td>
				<td width='10%'  valign='middle' ><a href="detail.php?action=gal&ids=<?php echo $resultNews['galeri_id']; ?>">View</a>&nbsp;<a href="updateForm.php?action=gal&ids=<?php echo $resultNews['galeri_id']; ?>">Update</a>&nbsp;<a href="#" onclick="del(<?php echo $resultNews['galeri_id'];?>)" >Delete</a></td>

			</tr>
			<?php
}
?>
		</tbody>
	</table>
<script type="text/javascript">
function del(idDel)
{
	var action = 'gal';
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
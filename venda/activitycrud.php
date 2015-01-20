 <script src="jquery.min.js"></script>
<?php
include "dbcon.php";
$qrActivity = "SELECT activity_id, activity_judul, activity_tanggal,  activity_content
            FROM  activity
            ORDER BY  activity_tanggal DESC
            /*LIMIT 0,3*/
            "; 
$getActivity = mysql_query($qrActivity);
?>
	<table   border="1">
		<thead>
			<tr>
				<label><h2>Daftar Aktifitas</h2></label>
			</tr>
			<tr>
				<a href="addForm.php?action=act">Add</a>
			</tr>
			<tr>
				<th style='font-size:90%' valign='middle'>
					Judul Aktifitas
				</th>
				<th style='font-size:90%' valign='middle'>
					Tanggal Aktifitas
				</th>
				<th style='font-size:90%' valign='middle'>
					Konten Aktifitas
				</th>
				<th style='font-size:90%' valign='middle'>
					Control
				</th>
			</tr>
		</thead>
		<tbody>
			<?php
					while($resultAct=mysql_fetch_assoc($getActivity)) {
					    $date = date("d",strtotime($resultAct['activity_tanggal']));
					    $month = date("M",strtotime($resultAct['activity_tanggal']));
					    $year = date("Y",strtotime($resultAct['activity_tanggal']));
			?>
			<tr>
				<td width='10%'  valign='middle' ><?php echo $resultAct['activity_judul']; ?></td>
				<td width='10%'  valign='middle' ><?php echo $date." - ".$month." - ".$year; ?></td>
				<td width='10%'  valign='middle' ><?php echo $resultAct['activity_content']; ?></td>
				<td width='10%'  valign='middle' >
					<a href="detail.php?action=act&ids=<?php echo $resultAct['activity_id']; ?>">View</a>&nbsp;
					<a href="updateForm.php?action=act&ids=<?php echo $resultAct['activity_id']; ?>">Update</a>&nbsp;
					<a href="#" onclick="del(<?php echo $resultAct['activity_id'];?>)" >Delete</a>
				</td>

			</tr>
			<?php
}
?>
		</tbody>
	</table>
<script type="text/javascript">
function del(idDel)
{
	var action = 'act';
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
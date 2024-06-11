<?php
	require 'conn.php';
	if(ISSET($_POST['search'])){
		$date1 = date("Y-m-d", strtotime($_POST['tanggalawal']));
		$date2 = date("Y-m-d", strtotime($_POST['tanggalakhir']));
		$query=mysqli_query($conn, "SELECT * FROM `tb_dt_report` WHERE date(`dt_report_datetime`) BETWEEN '$date1' AND '$date2'") or die(mysqli_error());
		$row=mysqli_num_rows($query);
		if($row>0){
			while($fetch=mysqli_fetch_array($query)){
?>
<tr>
    <td><?php echo $fetch['dt_report_datetime']?></td>
    <td><?php echo $fetch['dt_report_countusing']?></td>
    <td><?php echo $fetch['dt_report_countnotusing']?></td>
    <td><?php echo $fetch['dt_report_counttotal']?></td>
    <td class="text-center">
        <?php if ($fetch['dt_report_status'] == 0) { ?>
        <i class="fas fa-check-circle" style="color: green;"></i><b style="color: green;">
                Safe
        <?php } else if ($fetch['dt_report_status'] == 1) { ?>
        <i class="fas fa-exclamation-circle" style="color: yellow;"></i><b style="color: yellow;">
                Warning
        <?php } else if ($fetch['dt_report_status'] == 2) { ?>
       <i class="fas fa-times-circle" style="color: red;"></i><b style="color: red;"> Not
                Safe
        <?php } ?>
    </td>
</tr>
<?php
			}
		}else{
			echo'
			<tr>
				<td colspan = "4"><center>Record Not Found</center></td>
			</tr>';
		}
	}else{
		$query=mysqli_query($conn, "SELECT * FROM `tb_dt_report`") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query)){
?>
<tr>
    <td><?php echo $fetch['dt_report_datetime']?></td>
    <td><?php echo $fetch['dt_report_countusing']?></td>
    <td><?php echo $fetch['dt_report_countnotusing']?></td>
    <td><?php echo $fetch['dt_report_counttotal']?></td>
    <td class="text-center">
        <?php if ($fetch['dt_report_status'] == 0) { ?>
        <i class="fas fa-check-circle" style="color: green;"></i><b style="color: green;">
                Safe
        <?php } else if ($fetch['dt_report_status'] == 1) { ?>
        <i class="fas fa-exclamation-circle" style="color: yellow;"></i><b style="color: yellow;">
                Warning
        <?php } else if ($fetch['dt_report_status'] == 2) { ?>
       <i class="fas fa-times-circle" style="color: red;"></i><b style="color: red;"> Not
                Safe
        <?php } ?>
    </td>
</tr>
<?php
		}
	}
?>
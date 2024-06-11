<?php
require 'connsqlserver.php';

if (isset($_POST['search'])) {
        $date1 = date("Y-m-d", strtotime($_POST['tanggalawal']));
        $date2 = date("Y-m-d", strtotime($_POST['tanggalakhir']));
        $sql = "SELECT * FROM  tb_dt_report WHERE tb_dt_report.dt_report_datetime between '$date1' and '$date2' ORDER BY tb_dt_report.dt_report_datetime ASC";
        $query = sqlsrv_query($conn, $sql);
        //$row=sqlsrv_num_rows($query);
        $row = 1;
        if ($row > 0) {
                while ($fetch = sqlsrv_fetch_array($query)) {
?>
                        <tr>
                                <td><?php echo $fetch['dt_report_datetime']->format("Y-m-d") ?></td>
                                <td><?php echo $fetch['dt_report_countusing'] ?></td>
                                <td><?php echo $fetch['dt_report_countnotusing'] ?></td>
                                <td><?php echo $fetch['dt_report_counttotal'] ?></td>
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
        } else {
                echo '
			<tr>
				<td colspan = "4"><center>Record Not Found</center></td>
			</tr>';
        }
} else {
        $query = sqlsrv_query($conn, "SELECT * FROM tb_dt_report");
        while ($fetch = sqlsrv_fetch_array($query)) {
                ?>
                <tr>
                        <td><?php echo $fetch['dt_report_datetime']->format("Y-m-d") ?></td>
                        <td><?php echo $fetch['dt_report_countusing'] ?></td>
                        <td><?php echo $fetch['dt_report_countnotusing'] ?></td>
                        <td><?php echo $fetch['dt_report_counttotal'] ?></td>
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
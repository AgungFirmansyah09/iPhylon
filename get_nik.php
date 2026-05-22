<?php
	include 'function.php';

	echo "<option value=''>Enter Your Nik</option>";

	$query = "SELECT * FROM tbl_master_employee ORDER BY nik_employee ASC";
	$nik_empl = $db1->prepare($query);
	$nik_empl->execute();
	$res1 = $nik_empl->get_result();
	while ($row = $res1->fetch_assoc()) {
		echo "<option value='" . $row['nik_employee'] . "'>" . $row['nik_employee'] . "</option>";
	}
?>
<?php
	include 'function.php';
	$nik = $_POST['nik_employee'];

	echo "<option value=''>Pilih Kabupaten</option>";

	$query = "SELECT * FROM tbl_master_employee WHERE nik_employee=? ORDER BY name_employee ASC";
	$name_empl = $db1->prepare($query);
	$name_empl->bind_param("i", $nik);
	$name_empl->execute();
	$res1 = $name_empl->get_result();
	while ($row = $res1->fetch_assoc()) {
		echo "<option value='" . $row['nik_employee'] . "'>" . $row['name_employee'] . "</option>";
	}
?>
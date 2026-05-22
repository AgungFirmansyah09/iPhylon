<?php

require 'function.php';

$id = $_GET['id'];

$delete = mysqli_query($conn,"
    DELETE FROM tbl_user
    WHERE id_user='$id'
");

if($delete){

    header("Location: master_user.php?delete=1");
    exit;

} else {

    echo "Delete gagal";

}
?>
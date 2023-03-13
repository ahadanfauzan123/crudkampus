<?php 
require "connection.php";
$id = $_GET['id'];
$data = mysqli_query($conn,"SELECT biodata_foto FROM tb_biodata WHERE biodata_id='$id'");
$a = mysqli_fetch_array($data);
$foto = $a['biodata_foto'];
$query = mysqli_query($conn,"DELETE FROM tb_biodata WHERE biodata_id='$id'");
unlink("./src/img/biodata/$foto");
header('Location:index.php');
?>
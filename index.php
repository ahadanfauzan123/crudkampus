<?php 
// require "connection.php";
include("connection.php");
$viewBiodata = mysqli_query($conn, "SELECT * FROM tb_biodata ORDER BY biodata_nama ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/home.css">
    <title>Biodata</title>
</head>
<style>
    .navbar{
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 80px;
    color: black;
    background-color: rgb(232, 228, 235);
    box-shadow: 1px 0px 24px rgb(207, 137, 137);
}
</style>
<body>
    <?php 
    if (isset($_COOKIE['success'])) {
        # code...
        $a = $_COOKIE['success'];
        echo "<script>alert('$a');</script>";
    }
    ?>
    <div class="navbar">
        <div class="title">
            <h1>NAVBAR</h1>
        </div>
        <div class="left">
            Login
        </div>
    </div>
    <h1>biodata</h1>
    <a href="./insert.php" class="button btn-blue">tambah data...</a>
    <div class="table-wrapper">
        <table border="2">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>hp</th>
                <th>ttd</th>
                <th>gender</th>
                <th>prodi</th>
                <th>foto</th>
                <th>action</th>
            </tr>
            <?php 
            $no = 1;
            while($i = mysqli_fetch_array($viewBiodata)) {
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $i["biodata_nama"]; ?></td>
                <td><?= $i["biodata_alamat"]; ?></td>
                <td><?= $i["biodata_hp"]; ?></td>
                <td><?= $i["biodata_tgl_lahir"]; ?></td>
                <td><?= $i["biodata_gender"]; ?></td>
                <td><?= $i["biodata_prodi"]; ?></td>
                <td>
                    <img src="./src/img/biodata/<?= $i["biodata_foto"] ?>" alt="foto">
                </td>
                <td>
                    <a href="edit.php?id=<?= $i["biodata_id"]?>" class="button btn-yellow">edit</a>
                    <form action="./action.php" method="post" id="deleteform">
                        <button type="submit" name="delete" value="<?= $i["biodata_id"]?>" class="button btn-red"
                        onclick="confirmAction()">
                        delete                            
                    </button>
                    </form>
                </td>
            </tr>
                
                <?php
            } 
            ?>
        </table>
        <br>
    <a href="./connection.php">see connection...</a>
</body>
<script src="./script/index.js"></script>
</html>
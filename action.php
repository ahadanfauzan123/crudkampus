<?php 
require "connection.php";
if (isset($_POST['biodata_insert'])) {
    # code...
    var_dump($_POST);
    $idBiodata = $_POST['idBiodata'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $noHp = $_POST['hp'];
    $ttd = $_POST['ttd'];
    $gender = $_POST['gender'];
    $prodi = $_POST['prodi'];

    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $fileName = "$idBiodata.jpeg";
    $path = "src/img/biodata/$fileName";
    $fileOri = "src/img/biodata/".$foto;
    $fileType = strtolower(pathinfo($fileOri, PATHINFO_EXTENSION));

    $query = "SELECT biodata_id FROM tb_biodata WHERE biodata_id = '$idBiodata'";
    $getId = mysqli_query($conn, $query);
    if (mysqli_num_rows($getId)>0) {
        # code...
        $message = "id sudah terdaftar...";
        echo "<script>alert('$message');history.go(-1)</script>";
    }
    elseif ($fileType!='jpg' && $fileType!='jpeg') {
        $message = "foto bukan jpg";
        setcookie('alert-danger', $message, time() + (2), '/');
        header('location:insert.php');
    }
    elseif (move_uploaded_file($tmp, $path)) {
        $query = "INSERT INTO tb_biodata VALUES 
        ('$idBiodata','$nama','$alamat','$noHp','$ttd','$gender','$prodi','$fileName')";
        $insert = mysqli_query($conn,$query);
        if ($insert == true) {
            # code...
            $message = "berhasil tambah data";
            setcookie('success', 'berhasil tambah data', time() + (2), '/');
            header('Location:index.php');                   
        }
    }
}
if (isset($_POST['edit'])) {
    # code...
    
    $id = $_POST['idBiodata'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $noHp = $_POST['hp'];
    $ttd = $_POST['ttd'];
    $gender = $_POST['gender'];
    $prodi = $_POST['prodi'];
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $fileName = "$id.jpeg";
    $path = "src/img/biodata/$fileName";
    $fileOri = "src/img/biodata/".$foto;
    $fileType = strtolower(pathinfo($fileOri, PATHINFO_EXTENSION));

    $query = "SELECT biodata_id FROM tb_biodata WHERE biodata_id = '$idBiodata'";
    $getId = mysqli_query($conn, $query);
    if (mysqli_num_rows($getId)>0) {
        # code...
        echo "<script>history.go(-1)</script>";
    }
    elseif ($fileType!='jpg' && 'jpeg') {
        $message = "foto bukan jpg";
        setcookie('alert-danger', $message, time() + (2), '/');
        header('location:index.php');
    }
    elseif (move_uploaded_file($tmp, $path)) {
        $query = mysqli_query($conn, "UPDATE tb_biodata SET biodata_nama='$nama'
        ,biodata_alamat='$alamat',biodata_hp='$noHp',biodata_tgl_lahir='$ttd',biodata_gender='$gender'
        ,biodata_prodi='$prodi',biodata_foto='$fileName' WHERE biodata_id='$id'");
        setcookie('success', 'berhasil edit data', time() + (2), '/');
        header('Location:index.php');
    }
 
}

if (isset($_POST["delete"])) {
    # code...
    $id = $_POST["delete"];    
    $query1 = mysqli_query($conn, "SELECT * FROM tb_biodata WHERE biodata_id = '$id'");
    $data = mysqli_fetch_array($query1);
    $getFoto = $data["biodata_foto"];
    $delete = mysqli_query($conn, "DELETE FROM tb_biodata WHERE biodata_id = '$id'");
    unlink("./src/img/biodata/$getFoto");
    header("Location:index.php");
}

?>
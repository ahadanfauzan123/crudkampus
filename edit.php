<?php 
require "connection.php";
$id = $_GET['id'];
$viewBiodata = mysqli_query($conn, "SELECT * FROM tb_biodata WHERE biodata_id='$id'");
while ($a = mysqli_fetch_array($viewBiodata)) {
    # code...
    $idBiodata =$a['biodata_id'];
    $nama =$a['biodata_nama'];
    $alamat =$a['biodata_alamat'];
    $noHp =$a['biodata_hp'];
    $ttd =$a['biodata_tgl_lahir'];
    $gender =$a['biodata_gender'];
    $prodi =$a['biodata_prodi'];
    $foto = $a['biodata_foto'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit  </title>
    <link rel="stylesheet" href="./styles/insert.css">
</head>
<body class="bg-blue">
    <div class="wrapper">
    <form action="action.php" method="post" enctype="multipart/form-data">
        <div class="id-name">
            <label for="idBiodata">id biodata</label>
            <input type="text" name="idBiodata" id="idBiodata" value="<?= $idBiodata?>" readonly class="box-blue">            
            <label for="nama">nama</label>
            <input type="text" name="nama" id="nama" value="<?= $nama?>" class="box-blue">
        </div>
        
        <div class="alamat">
            <label for="alamat">alamat</label>
            <textarea type="text" name="alamat" id="alamat" class="box-blue">
                <?= $alamat?>
            </textarea>
        </div>
        
        <div class="nohp">
            <label for="hp">no hp</label>
            <input type="text" name="hp" id="hp" value="<?= $noHp?>" class="box-blue">
        </div>
        
        <div class="ttd-gender">
            <div class="date">
                <label for="ttd">ttd</label>
                <input type="date" name="ttd" id="ttd" value="<?= $ttd?>" class="box-blue">
            </div>
            <div class="gender">
                <div class="box-blue">
                    <input type="radio" name="gender" id="lakiLaki" value="laki-laki" <?= $gender=='laki-laki' ? 'checked' : ''?> >
                    <label for="lakiLaki">lakiLaki</label>
                </div>
                <div class="box-blue">
                    <input type="radio" name="gender" id="perempuan" value="perempuan" <?= $gender=='perempuan' ? 'checked' : ''?> >
                    <label for="perempuan">perempuan</label>
                </div>
            </div>
        </div>
        

        <div class="prodi">
            <label for="prodi">prodi</label>
            <select name="prodi" id="" class="box-blue">
                <option value="informatika">informatika</option>
                <option value="sistemInformasi">si</option>
                <option value="mesin">mesin</option>
            </select>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
        </div>
        
        <div class="foto">
            <label for="foto">foto</label>
            <div>
                <input type="file" name="foto" id="foto" class="box-blue">
            </div>
        </div>
        
        <div class="submit">
            <button type="button">
                <a href="./" class="back">kembali</a>         
            </button>
            <button id="submit" type="submit" name="edit">edit</button>
        </div>
    </form>
    </div>
</body>
</html>
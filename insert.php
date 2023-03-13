<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah data</title>
    <link rel="stylesheet" href="./styles/insert.css">
</head>
<body>
    <div class="wrapper">
        <form action="action.php" method="post" enctype="multipart/form-data">
            <div class="id-name">
                <label for="idBiodata">id biodata</label>
                <input type="text" name="idBiodata" id="idBiodata" >
    
                <label for="nama">nama</label>
                <input type="text" name="nama" id="nama" >
            </div>
        
            <div class="alamat">
                <label for="alamat">alamat</label>
                <textarea type="text" name="alamat" id="alamat">
                </textarea>
            </div>
        
            <div class="nohp">
                <label for="hp">no hp</label>
                <input type="text" name="hp" id="hp">
            </div>
        
            <div class="ttd-gender">
                <div class="date">
                    <label for="ttd">ttd</label>
                    <input type="date" name="ttd" id="ttd">
                </div>
                <div class="gender">
                    <div>
                        <input type="radio" name="gender" id="lakiLaki" value="laki-laki">
                        <label for="lakiLaki">lakiLaki</label>
                    </div>
                    <div>
                        <input type="radio" name="gender" id="perempuan" value="perempuan">
                        <label for="perempuan">perempuan</label>
                    </div>
                </div>
            </div>
        
    
        
            <div class="prodi">           
                <label for="prodi">prodi</label>
                <select name="prodi" id="">
                    <option value="informatika">informatika</option>
                    <option value="sistemInformasi">si</option>
                    <option value="mesin">mesin</option>
                </select>
            </div>
        
            <div class="foto">
                <label for="foto">foto</label>
                <div>
                    <input type="file" name="foto" id="foto">   
    
                </div>
            </div>
            <div class="submit">
                <button type="button">
                    <a href="./" class="back">kembali</a>         
                </button>
                <button id="submit" type="submit" name="biodata_insert">submit</button>
            </div>
        </form>
    </div>
</body>
</html>
<!DOCTYPE html>
<html>

<head>
  <h2 align="center">Masukan Data Almarhum</h2><br>
  <title>Ubah data</title>
</head>

<body>
  <?php
  $id = $_GET['id'];
  $data = mysqli_query($koneksi, "select * from tb_almarhum where id_almarhum='$id'");
  while ($row = mysqli_fetch_array($data)) {
  ?>
    <div class="container-fluid">
      <form method="post" enctype="multipart/form-data">

        <div class="form-group">
          <label>Id Almarhum</label>
          <input type="text" class="form-control" name="id_almarhum" value="<?php echo $row['id_almarhum']; ?>" readonly>
        </div>
        <label>Id Rumah Duka</label>
        <div class="form-group">
          <select class="form-control" name="id_rumah_duka" id="exampleFormControlSelect1">
            <?php

            $sql = "select * from tb_mrumah_duka";

            $hasil = mysqli_query($koneksi, $sql);
            $no = 0;
            while ($tampil = mysqli_fetch_assoc($hasil)) {
              $no++;
            ?>
              <option value="<?php echo $tampil['id_rumah_duka']; ?>"><?php echo $tampil['id_rumah_duka'], " - ", $tampil['nama_rumah_duka']; ?></option>
            <?php
            }
            ?>
          </select>
        </div>
        <label>Nama Almarhum</label>
        <div class="form-group">
          <input type="text" class="form-control" name="nama_almarhum" value="<?php echo $row['nama_almarhum']; ?>">
        </div>
        <label>Foto Awal</label>
        <div class="form-group">
          <td> <?php echo '<img src = "data:image/jpg;base64,' . base64_encode($row['foto']) . '" alt="Image" style="width: 100px; height:100px;" >'; ?> </td>
          <input type="file" name="foto">
        </div>
        <label>Tanggal Lahir</label>
        <div class="form-group">
          <input type="date" class="form-control" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir']; ?>">
        </div>
        <label>Tanggal Kematian</label>
        <div class="form-group">
          <input type="date" class="form-control" name="tanggal_kematian" value="<?php echo $row['tanggal_kematian']; ?>">
        </div>
        <label>alamat</label>
        <div class="form-group">
          <input type="text" class="form-control" name="alamat" value="<?php echo $row['alamat']; ?>">
        </div>
        <label>kontak keluarga</label>
        <div class="form-group">
          <input type="text" class="form-control" name="kontak_keluarga" value="<?php echo $row['kontak_keluarga']; ?>">
        </div>
    <label>Upacara Kematian</label>
    <div class="form-group">
      <input type="date" class="form-control" name="upacara_kematian" value="<?php echo $row['upacara_kematian']; ?>">
    </div>
        <div class="float-right">
          <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
        </div>
      </form>
    <?php
  }
    ?>
    </div>
</body>

</html>
<?php

if (isset($_POST["submit"])) {
  $status = 'error';
  if (!empty($_FILES["foto"]["name"])) {
    // Get file info 
    $fileName = basename($_FILES["foto"]["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);


    $allowTypes = array('jpg', 'png', 'jpeg');
    if (in_array($fileType, $allowTypes)) {
      $idalmarhum = $_POST['id_almarhum'];
      $idrumahduka = $_POST['id_rumah_duka'];
      $nama = $_POST['nama_almarhum'];
      $image = $_FILES['foto']['tmp_name'];
      $imgContent = addslashes(file_get_contents($image));
      $lahir = $_POST['tanggal_lahir'];
      $kematian = $_POST['tanggal_kematian'];
      $alamat = $_POST['alamat'];
      $kontak = $_POST['kontak_keluarga'];
      $upacara = $_POST['upacara_kematian'];

      // Insert image content into database 
      mysqli_query($koneksi, "update tb_almarhum set id_almarhum='$idalmarhum', id_rumah_duka='$idrumahduka', nama_almarhum='$nama', foto='$imgContent', tanggal_lahir='$lahir', tanggal_kematian='$kematian',alamat='$alamat', kontak_keluarga ='$kontak', upacara_kematian ='$upacara' where id_almarhum='$idalmarhum'");

?>
      <script type="text/javascript">
        alert("Data Berhasil Disimpan");
        window.location.href = "?page=almarhum";
      </script>
    <?php


    }
  } else {
    $idalmarhum = $_POST['id_almarhum'];
    $idrumahduka = $_POST['id_rumah_duka'];
    $nama = $_POST['nama_almarhum'];
    $image = $_FILES['foto']['tmp_name'];
    $imgContent = addslashes(file_get_contents($image));
    $lahir = $_POST['tanggal_lahir'];
    $kematian = $_POST['tanggal_kematian'];
    $alamat = $_POST['alamat'];
    $kontak = $_POST['kontak_keluarga'];
    $upacara = $_POST['upacara_kematian'];

    // Insert image content into database 
    mysqli_query($koneksi, "update tb_almarhum set id_almarhum='$idalmarhum', id_rumah_duka='$idrumahduka', nama_almarhum='$nama', tanggal_lahir='$lahir', tanggal_kematian='$kematian',alamat='$alamat', kontak_keluarga ='$kontak', upacara_kematian ='$upacara' where id_almarhum='$idalmarhum'");
    ?>
    <script type="text/javascript">
      alert("Data Berhasil Disimpan");
      window.location.href = "?page=almarhum";
    </script>
<?php
  }
}

?>
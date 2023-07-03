<?php 
  include 'koneksi.php';

  $npm = '';
  $nama = '';
  $jurusan = '';
  $keterangan = '';

  if (isset($_GET['ubah'])) {
    $npm = $_GET['ubah'];

    $query = "SELECT * FROM mahasiswa WHERE npm = '$npm';";
    $sql = mysqli_query($koneksi, $query);

    $result = mysqli_fetch_assoc($sql);

    $nama = $result['nama'];
    $jurusan = $result['jurusan'];
    $keterangan = $result['keterangan'];

  }
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="manifest" href="/site.webmanifest">


  <title>Absensi Mahasiswa</title>
  <!-- CDN LINK CSS BOOTSTRAP  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <!-- LINK CSS BOOTSTRAP -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- BOOTSTRAP ICON -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>

  <!-- NAVBAR -->
  <nav class="navbar bg-body-tertiary mb-5 shadow fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php" style="font-size : 1.1em;">
          <strong>Absensi Online Mahasiswa</strong>
        </a>
    </div>
  </nav>

  <!-- CONTAINER BODY CONTENT -->
  <div class="container mt-5 pt-4">
    <!-- Figure JUDUL TABEL -->
    <figure class="text-light">
      <blockquote class="blockquote">
        <h1>Absensi Mahasiswa</h1>
        <p>Silahkan isi data diri anda.</p>
      </blockquote>
    </figure>
    <!-- AKHIR FIGURE JUDUL TABEL -->

    <!-- CONTAINER FORM -->
    <div class="container text-light mt-5">
        <form method="POST" action="proses-absensi.php" >

          <div class="mb-3 row">
            <label for="inputNpm" class="col-sm-2 col-form-label">NPM</label>
              <div class="col-sm-10">
                <input required type="text" class="form-control" id="inputNpm" name="inputNpm" placeholder="Masukkan NPM" value="<?php echo $npm ?>">
              </div>
          </div>
    
          <div class="mb-3 row">
            <label for="inputNamaMhs" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input required type="text" class="form-control" id="inputNamaMhs" name="inputNamaMhs" placeholder="Masukkan Nama" value="<?php echo $nama ?>">
              </div>
          </div>

          <div class="mb-3 row">
            <label for="inputJurusan" class="col-sm-2 col-form-label">Jurusan</label>
              <div class="col-sm-10">
                <input required type="text" class="form-control" id="inputJurusan" name="inputJurusan" placeholder="Masukkan Jurusan" value="<?php echo $jurusan ?>">
              </div>
          </div>
          
          <div class="mb-3 row">
            <label for="inputKeterangan" class="col-sm-2 col-form-label">Keterangan</label>
              <div class="col-sm-10">
                <select required class="form-select" id="inputKeterangan" name="inputKeterangan">
                  <option>Keterangan</option>
                  <option <?php if ($keterangan == 'Hadir'){echo "selected";}?>  value="Hadir">Hadir</option>
                  <option <?php if ($keterangan == 'Sakit'){echo "selected";}?>  value="Sakit">Sakit</option>
                  <option <?php if ($keterangan == 'Izin'){echo "selected";}?>  value="Izin">Izin</option>
                </select>
              </div>
          </div>

          <div class="mb-3 row mt-5">
            <!-- BUTTON TAMBAH DATA MAHASISWA -->
            <div class="col">
              <?php
                if (isset($_GET['ubah'])) {
              ?>
              <button type="submit" name="aksi" value="edit" class="btn btn-success active">
                <i class="bi bi-save2"></i>
                Simpan Perubahan
              </button>
              <?php
              } else {
                ?>
                <button type="submit" name="aksi" value="add" class="btn btn-primary active">
                  <i class="bi bi-plus-square"></i>
                  Submit
                </button>
              <?php
              }
              ?>
              
              <a type="button" href="index.php" class="btn btn-danger active">
                <i class="bi bi-backspace"></i>
                Back
              </a>
              <!-- AKHIR BUTTON TAMBAH DATA MAHASISWA -->
            </div>

          </div>
        </form>
      

      
    </div>
    <!-- AKHIR CONTAINER FORM -->
  </div>
  <!-- AKHIR CONTAINER BODY CONTENT -->


  <!-- CDN LINK JS BOOTSTRAP -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
  <!-- LINK JS BOOTSTRAP -->
  <script src="js/bootstrap.bundle.min.js"></script>
  <!-- CDN LINK POPPER JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
    integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS"
    crossorigin="anonymous"></script>
</body>

</html>
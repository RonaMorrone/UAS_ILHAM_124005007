<?php
require_once "config/koneksi.php";

$error = "";

// ============ PROSES SIMPAN DATA BARU ============
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama_anggota']);
    $jk = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
    $hp = mysqli_real_escape_string($koneksi, $_POST['no_hp']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $paket = mysqli_real_escape_string($koneksi, $_POST['paket_membership']);
    $harga = (int) $_POST['harga'];
    $tanggal = mysqli_real_escape_string($koneksi, $_POST['tanggal_daftar']);
    $status = mysqli_real_escape_string($koneksi, $_POST['status']);

    if ($nama == "" || $jk == "" || $hp == "" || $alamat == "" || $paket == "" || $tanggal == "") {
        $error = "Semua field wajib diisi!";
    } else {
        $query = "INSERT INTO anggota (nama_anggota, jenis_kelamin, no_hp, alamat, paket_membership, harga, tanggal_daftar, status)
                  VALUES ('$nama', '$jk', '$hp', '$alamat', '$paket', '$harga', '$tanggal', '$status')";

        if (mysqli_query($koneksi, $query)) {
            header("Location: index.php?status=tambah_sukses");
            exit();
        } else {
            $error = "Gagal menyimpan data: " . mysqli_error($koneksi);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>FitLife - Input Data Anggota</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

  <nav class="navbar">
    <div class="brand">Fit<span>Life</span> Gym</div>
    <div class="nav-links">
      <a href="index.php">Halaman Index</a>
      <a href="tambah.php">Input Data</a>
    </div>
  </nav>

  <div class="container">
    <div class="page-title">Input Data Anggota Baru</div>
    <div class="page-subtitle">Isi form berikut untuk mendaftarkan anggota gym baru</div>

    <?php if ($error != ""): ?>
      <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>

    <div class="card">
      <form action="tambah.php" method="POST">
        <div class="form-group">
          <label>Nama Lengkap</label>
          <input type="text" name="nama_anggota" placeholder="Contoh: Budi Santoso"
                 value="<?php echo isset($_POST['nama_anggota']) ? htmlspecialchars($_POST['nama_anggota']) : ''; ?>" required>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" required>
              <option value="">-- Pilih --</option>
              <option value="Laki-laki">Laki-laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label>No. HP</label>
            <input type="text" name="no_hp" placeholder="08xxxxxxxxxx"
                   value="<?php echo isset($_POST['no_hp']) ? htmlspecialchars($_POST['no_hp']) : ''; ?>" required>
          </div>
        </div>

        <div class="form-group">
          <label>Alamat</label>
          <textarea name="alamat" placeholder="Alamat lengkap" required><?php echo isset($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : ''; ?></textarea>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label>Paket Membership</label>
            <select name="paket_membership" id="paket_membership" required>
              <option value="">-- Pilih Paket --</option>
              <option value="Bulanan">Bulanan - Rp 250.000</option>
              <option value="3 Bulan">3 Bulan - Rp 650.000</option>
              <option value="6 Bulan">6 Bulan - Rp 1.200.000</option>
              <option value="Tahunan">Tahunan - Rp 2.200.000</option>
            </select>
          </div>
          <div class="form-group">
            <label>Harga (Rp)</label>
            <input type="number" name="harga" id="harga" placeholder="Otomatis terisi" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label>Tanggal Daftar</label>
            <input type="date" name="tanggal_daftar" value="<?php echo date('Y-m-d'); ?>" required>
          </div>
          <div class="form-group">
            <label>Status Keanggotaan</label>
            <select name="status" required>
              <option value="Aktif">Aktif</option>
              <option value="Nonaktif">Nonaktif</option>
            </select>
          </div>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Data</button>
        <a href="index.php" class="btn btn-secondary">Batal, Kembali ke Index</a>
      </form>
    </div>
  </div>

  <div class="footer">FitLife Gym &copy; 2026 - UAS Pemrograman Web</div>

  <script src="assets/js/script.js"></script>
</body>
</html>
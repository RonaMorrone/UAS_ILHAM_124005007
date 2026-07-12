<?php
require_once "config/koneksi.php";

// ============ PROSES HAPUS DATA (dari tombol Hapus) ============
if (isset($_GET['hapus'])) {
    $id = (int) $_GET['hapus'];
    $query_hapus = "DELETE FROM anggota WHERE id_anggota = '$id'";
    if (mysqli_query($koneksi, $query_hapus)) {
        header("Location: index.php?status=hapus_sukses");
        exit();
    } else {
        die("Gagal menghapus data: " . mysqli_error($koneksi));
    }
}

// ============ AMBIL DATA UNTUK DITAMPILKAN ============
$query = "SELECT * FROM anggota ORDER BY id_anggota DESC";
$result = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>FitLife - Data Anggota Gym</title>
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
    <div class="page-title">Data Anggota Gym</div>
    <div class="page-subtitle">Sistem Pendaftaran Anggota Pusat Kebugaran FitLife</div>

    <?php if (isset($_GET['status'])): ?>
      <?php if ($_GET['status'] == 'tambah_sukses'): ?>
        <div class="alert alert-success">Data anggota baru berhasil ditambahkan!</div>
      <?php elseif ($_GET['status'] == 'edit_sukses'): ?>
        <div class="alert alert-success">Data anggota berhasil diperbarui!</div>
      <?php elseif ($_GET['status'] == 'hapus_sukses'): ?>
        <div class="alert alert-success">Data anggota berhasil dihapus!</div>
      <?php endif; ?>
    <?php endif; ?>

    <div class="card">
      <div class="top-actions">
        <div><?php echo mysqli_num_rows($result); ?> anggota terdaftar</div>
        <a href="tambah.php" class="btn btn-primary">+ Tambah Anggota</a>
      </div>

      <?php if (mysqli_num_rows($result) > 0): ?>
      <table>
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>No. HP</th>
            <th>Paket</th>
            <th>Harga</th>
            <th>Tgl Daftar</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; while ($row = mysqli_fetch_assoc($result)): ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo htmlspecialchars($row['nama_anggota']); ?></td>
            <td><?php echo htmlspecialchars($row['jenis_kelamin']); ?></td>
            <td><?php echo htmlspecialchars($row['no_hp']); ?></td>
            <td><?php echo htmlspecialchars($row['paket_membership']); ?></td>
            <td>Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></td>
            <td><?php echo date('d-m-Y', strtotime($row['tanggal_daftar'])); ?></td>
            <td>
              <span class="badge <?php echo $row['status'] == 'Aktif' ? 'badge-aktif' : 'badge-nonaktif'; ?>">
                <?php echo $row['status']; ?>
              </span>
            </td>
            <td>
              <a href="edit.php?id=<?php echo $row['id_anggota']; ?>" class="btn btn-edit">Edit</a>
              <a href="#" onclick="return konfirmasiHapus(<?php echo $row['id_anggota']; ?>, '<?php echo htmlspecialchars($row['nama_anggota'], ENT_QUOTES); ?>')" class="btn btn-hapus">Hapus</a>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
      <?php else: ?>
        <div class="empty-state">Belum ada data anggota. Silakan tambah anggota baru.</div>
      <?php endif; ?>
    </div>
  </div>

  <div class="footer">FitLife Gym &copy; 2026 - UAS Pemrograman Web</div>

  <script src="assets/js/script.js"></script>
</body>
</html>
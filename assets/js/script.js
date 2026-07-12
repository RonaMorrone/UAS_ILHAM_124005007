// =========================================================
// FitLife - script.js
// Konfirmasi hapus data & update harga otomatis sesuai paket
// =========================================================

function konfirmasiHapus(id, nama) {
  const yakin = confirm("Yakin ingin menghapus data anggota \"" + nama + "\"? Data yang dihapus tidak dapat dikembalikan.");
  if (yakin) {
    // Hapus diproses langsung oleh index.php (parameter ?hapus=id)
    window.location.href = "index.php?hapus=" + id;
  }
  return false;
}

// Auto isi harga berdasarkan paket membership yang dipilih
document.addEventListener("DOMContentLoaded", function () {
  const paketSelect = document.getElementById("paket_membership");
  const hargaInput = document.getElementById("harga");

  const daftarHarga = {
    "Bulanan": 250000,
    "3 Bulan": 650000,
    "6 Bulan": 1200000,
    "Tahunan": 2200000
  };

  if (paketSelect && hargaInput) {
    paketSelect.addEventListener("change", function () {
      const paket = this.value;
      if (daftarHarga[paket]) {
        hargaInput.value = daftarHarga[paket];
      }
    });
  }
});
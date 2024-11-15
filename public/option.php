<?php
include '../config/db.php';

// Mengambil parameter 'id' dari URL dengan validasi
$idop = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Memastikan 'id' tidak kosong atau nol
if ($idop > 0) {
    // Query untuk mengambil data berdasarkan 'id'
    $query = "SELECT * FROM tb_absen WHERE id = $idop";
    $data = mysqli_query($conn, $query);

    // Mengecek apakah query berhasil dijalankan
    if ($data && mysqli_num_rows($data) > 0) {
        // Mengambil data dari hasil query
        $row = mysqli_fetch_assoc($data);
    } else {
        echo "Data tidak ditemukan.";
        exit;
    }
} else {
    echo "ID tidak valid.";
    exit;
}

// Menghapus data ketika tombol 'Delete' diklik
if (isset($_POST['delete'])) {
    $deleteQuery = "DELETE FROM tb_absen WHERE id = $idop";
    if (mysqli_query($conn, $deleteQuery)) {
        echo "<script>alert('Data berhasil dihapus.'); window.location.href = 'admin.php';</script>";
        exit;
    } else {
        echo "<script>alert('Gagal menghapus data.');</script>";
    }
}

// Mengupdate data ketika tombol 'Update' diklik
if (isset($_POST['update'])) {
    $namaSiswa = mysqli_real_escape_string($conn, $_POST['namaSiswa']);
    $nis = mysqli_real_escape_string($conn, $_POST['nis']);
    $kelas = mysqli_real_escape_string($conn, $_POST['kelas']);
    $statusAbsen = mysqli_real_escape_string($conn, $_POST['statusAbsen']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);

    $updateQuery = "UPDATE tb_absen SET namaSiswa = '$namaSiswa', nis = '$nis', kelas = '$kelas', statusAbsen = '$statusAbsen', time = '$time' WHERE id = $idop";
    if (mysqli_query($conn, $updateQuery)) {
        echo "<script>alert('Data berhasil diperbarui.'); window.location.href = 'admin.php';</script>";
        exit;
    } else {
        echo "<script>alert('Gagal memperbarui data.');</script>";
    }
}

// Menutup koneksi database
mysqli_close($conn);
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="px-[200px] py-2">
<div>
  <h3 class="font-semibold text-gray-900">Detail Absen Data</h3>
  <div class="mt-6 border-t">
    <dl>
      <div class="py-4">
        <dt>ID:</dt>
        <dd><?= htmlspecialchars($row['id']) ?></dd>
      </div>
      <div class="py-4">
        <dt>Nama:</dt>
        <dd><?= htmlspecialchars($row['namaSiswa']) ?></dd>
      </div>
      <div class="py-4">
        <dt>NIS:</dt>
        <dd><?= htmlspecialchars($row['nis']) ?></dd>
      </div>
      <div class="py-4">
        <dt>Kelas:</dt>
        <dd><?= htmlspecialchars($row['kelas']) ?></dd>
      </div>
      <div class="py-4">
        <dt>Status Absen:</dt>
        <dd><?= htmlspecialchars($row['statusAbsen']) ?></dd>
      </div>
      <div class="py-4">
        <dt>Waktu Absen:</dt>
        <dd><?= htmlspecialchars($row['time']) ?></dd>
      </div>
    </dl>
  </div>

  <!-- Tombol Delete -->
  <form method="post" class="inline-block">
    <button type="submit" name="delete" class="px-4 py-2 mt-4 text-white bg-red-600 rounded">Hapus Data</button>
  </form>

  <!-- Tombol Update (Memunculkan Modal) -->
  <button onclick="toggleModal()" class="px-4 py-2 mt-4 text-white bg-blue-600 rounded">Edit Data</button>
</div>

<!-- Modal Update -->
<div id="updateModal" class="fixed inset-0 flex items-center justify-center hidden bg-gray-800 bg-opacity-75">
  <div class="p-6 bg-white rounded-lg">
    <h2 class="text-xl font-bold">Update Data</h2>
    <form method="post">
      <div class="mt-4">
        <label>Nama Siswa:</label>
        <input type="text" name="namaSiswa" value="<?= htmlspecialchars($row['namaSiswa']) ?>" class="w-full p-2 border rounded">
      </div>
      <div class="mt-4">
        <label>NIS:</label>
        <input type="text" name="nis" value="<?= htmlspecialchars($row['nis']) ?>" class="w-full p-2 border rounded">
      </div>
      <div class="mt-4">
        <label>Kelas:</label>
        <input type="text" name="kelas" value="<?= htmlspecialchars($row['kelas']) ?>" class="w-full p-2 border rounded">
      </div>
      <div class="mt-4">
        <label>Status Absen:</label>
        <input type="text" name="statusAbsen" value="<?= htmlspecialchars($row['statusAbsen']) ?>" class="w-full p-2 border rounded">
      </div>
      <div class="mt-4">
        <label>Waktu Absen:</label>
        <input type="text" name="time" value="<?= htmlspecialchars($row['time']) ?>" class="w-full p-2 border rounded">
      </div>
      <div class="flex justify-end mt-4">
        <button type="button" onclick="toggleModal()" class="px-4 py-2 mr-2 text-white bg-gray-600 rounded">Batal</button>
        <button type="submit" name="update" class="px-4 py-2 text-white bg-green-600 rounded">Simpan</button>
      </div>
    </form>
  </div>
</div>

<script>
  // Fungsi untuk menampilkan atau menyembunyikan modal
  function toggleModal() {
    const modal = document.getElementById('updateModal');
    modal.classList.toggle('hidden');
  }
</script>
</body>
</html>

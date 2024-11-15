<?php
require '../config/db.php';  // Memanggil koneksi database

// Proses penyimpanan data jika form di-submit
if (isset($_POST['daftar'])) {
    $namaSiswa = $_POST['namaSiswa'];
    $nis = $_POST['nis'];
    $password = md5($_POST['password']);  // Enkripsi password dengan md5

    // Query untuk menyimpan data ke database
    $query = "INSERT INTO tb_siswa (namaSiswa, nis, password) VALUES ('$namaSiswa', '$nis', '$password')";
    if (mysqli_query($conn, $query)) {
        $success_message = "Pendaftaran berhasil!";
    } else {
        $error_message = "Pendaftaran gagal: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Daftar Siswa</title>
</head>
<body class="flex items-center justify-center min-h-screen bg-sy-250">
    <div class="p-8 rounded-lg shadow-lg bg-sky-950 w-96">
        <h2 class="mb-4 text-2xl font-bold text-center text-white">Daftar Siswa</h2>
        <a href="admin.php" class="m-3 text-white transition-all hover:underline">Back&laquo</a>
        <hr class="mb-4 border-white">
        
        <!-- Form Pendaftaran -->
        <form action="" method="POST">
            <div class="mb-4">
                <label class="block mb-2 text-white" for="namaSiswa">Nama Siswa</label>
                <input class="w-full p-2 rounded text-violet-950 bg-sky-200" type="text" id="namaSiswa" name="namaSiswa" required>
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-white" for="nis">NIS</label>
                <input class="w-full p-2 rounded text-violet-950 bg-sky-200" type="text" id="nis" name="nis" required>
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-white" for="password">Password</label>
                <input class="w-full p-2 rounded text-violet-950 bg-sky-200" type="password" id="password" name="password" required>
            </div>
            <div class="flex justify-end">
                <button class="px-4 py-2 text-black bg-gray-200 rounded" type="submit" name="daftar">Daftar</button>
            </div>
        </form>
        
        <!-- Menampilkan Pesan -->
        <?php if (isset($success_message)) : ?>
            <p class="mt-4 text-green-500"><?php echo $success_message; ?></p>
        <?php elseif (isset($error_message)) : ?>
            <p class="mt-4 text-red-500"><?php echo $error_message; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
require '../config/db.php';  // Memanggil koneksi database

// Proses penyimpanan data jika form di-submit
if (isset($_POST['daftar'])) {
    $namaPegawai = $_POST['namaPegawai'];
    $noPegawai = $_POST['noPegawai'];
    $password = md5($_POST['password']);  // Enkripsi password dengan md5

    // Query untuk menyimpan data ke database
    $query = "INSERT INTO tb_pegawai (namaPegawai, noPegawai, password) VALUES ('$namaPegawai', '$noPegawai', '$password')";
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
    <title>Daftar Pegawai</title>
</head>
<body class="bg-[#3b0a0a] flex items-center justify-center min-h-screen">
    <a href="admin.php">
        <button class="bg-gray-300 m-4 text-black py-1 px-2 rounded" type="submit" name="daftar">Kembali</button>
    </a>
    <div class="bg-[#b30000] p-8 rounded-lg shadow-lg w-96">
        <h2 class="text-white text-2xl font-bold mb-4 text-center">Daftar Staff admin</h2>
        <hr class="border-white mb-4">
        
        <!-- Form Pendaftaran -->
        <form action="" method="POST">
            <div class="mb-4">
                <label class="block text-white mb-2" for="namaPegawai">Nama Pegawai</label>
                <input class="w-full p-2 rounded bg-[#ff6666] text-white" type="text" id="namaPegawai" name="namaPegawai" required>
            </div>
            <div class="mb-4">
                <label class="block text-white mb-2" for="noPegawai">No  Pegawai</label>

                <input class="w-full p-2 rounded bg-[#ff6666] text-white" type="text" id="noPegawai" name="noPegawai" required>
            </div>
            <div class="mb-4">
                <label class="block text-white mb-2" for="password">Password</label>
                <input class="w-full p-2 rounded bg-[#ff6666] text-white" type="password" id="password" name="password" required>
            </div>
            <div class="flex justify-around">
                
                <button class="bg-gray-200 text-black py-2 px-4 rounded" type="submit" name="daftar">Daftar</button>
            </div>
        </form>
        
        <!-- Menampilkan Pesan -->
        <?php if (isset($success_message)) : ?>
            <p class="text-green-500 mt-4"><?php echo $success_message; ?></p>
        <?php elseif (isset($error_message)) : ?>
            <p class="text-red-500 mt-4"><?php echo $error_message; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>

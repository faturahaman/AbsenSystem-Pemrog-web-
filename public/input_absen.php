<?php
session_start();
require '../config/db.php';

// Redirect to login page if not logged in
// Cek apakah session 'login' atau 'loginadmin' ada
if (!isset($_SESSION["login"])) {
    header("location: login_siswa.php");
    exit;
}


if (isset($_POST['absenbtn'])) {
    $nama = $_POST['namaSiswa'];
    $kelas = $_POST['kelas'];
    $statusAbsen = $_POST['statusAbsen'];
    $nis = $_POST['nis'];   

    $query = "INSERT INTO tb_absen (namaSiswa, kelas, statusAbsen, nis) 
              VALUES ('$nama', '$kelas', '$statusAbsen', '$nis')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Absen berhasil disimpan! silahkan close website ini');</script>";
    } 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Input Absen Siswa</title>
    
</head>
<body class="bg-[#4b1b1b] flex items-center justify-center min-h-screen">
    <div class="flex flex-col w-full max-w-4xl p-8 rounded-lg shadow-lg bg-gradient-to-r from-red-500 to-red-700 md:flex-row">
        <div class="w-full mb-8 md:w-1/2 md:mb-0">
            <h2 class="mb-4 text-3xl font-bold text-center text-white">Input Absen Siswa</h2>
            <form action="" method="POST">
                <div class="mb-4">
                    <label class="block mb-2 text-white">Nama</label>
                    <input class="w-full p-2 bg-red-300 border-none rounded" type="text" name="namaSiswa" required />
                </div>
                <div class="flex flex-col mb-4 md:flex-row md:space-x-4">
                    <div class="w-full mb-4 md:w-1/2 md:mb-0">
                        <label class="block mb-2 text-white">Kelas</label>
                        <input class="w-full p-2 bg-red-300 border-none rounded" type="text" name="kelas" required placeholder="Nama kelas dan jurusan" />
                    </div>
                    <div class="w-full md:w-1/2">
                        <label class="block mb-2 text-white">Status Absen</label>
                         <select name="statusAbsen" id="absen" class="w-full p-2 bg-red-300 border-none rounded">
                            <option value="Belum">Pilih absen</option>
                            <option value="Hadir">Hadir</option>
                            <option value="Sakit">Izin sakit</option>
                            <option value="Izin">Izin Dengan Keterangan</option>
                         </select>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block mb-2 text-white">NIS</label>
                    <input class="w-full p-2 bg-red-300 border-none rounded" type="text" name="nis" required />
                </div>
                <button class="px-4 py-2 text-black bg-gray-300 rounded" type="submit" name="absenbtn">Kirim</button>
            </form>
            
        </div>
        <div class="flex items-center justify-center w-full md:w-1/2">
            <img alt="Logo of AK NUSA BANGSA SMK" class="w-48 h-48" 
            src="img/WhatsApp_Image_2024-09-20_at_09.08.49_4a0e336d-removebg-preview (1).png" />
        </div>
        <div class="mb-4">
<a href="logout.php" class="px-4 py-2 text-black bg-gray-300 rounded">Logout</a>
</div>
    </div>
</body>
</html>

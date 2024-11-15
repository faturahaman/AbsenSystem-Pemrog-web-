<?php
session_start();
require '../config/db.php';  // Include the database connection

// Login process
if (isset($_POST['login'])) {
    $namaSiswa = $_POST['namaSiswa'];
    $nis = $_POST['nis'];
    $password = md5($_POST['password']);  // Encrypt password with md5

    // Query to check if user exists
    $query = "SELECT * FROM tb_siswa WHERE namaSiswa='$namaSiswa' AND nis='$nis' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Successful login, store username in session and redirect
        $_SESSION['login'] = true;
        $_SESSION['nama_siswa'] = $namaSiswa;
        $_SESSION['nis'] = $nis ;// Optional: Store name for personalization
        header("Location: input_absen.php");
        exit();
    } else {
        $error_message = "Invalid name, NIS, or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login Siswa</title>
</head>
<body class="flex items-center justify-center min-h-screen bg-sky-250">
    <div class="p-8 rounded-lg shadow-lg bg-violet-950 w-96">
    <a href="index.php" class="m-3 text-white transition-all hover:underline">Back&laquo</a>

        <h2 class="mb-4 text-2xl font-bold text-center text-white">Login Siswa</h2>
        <hr class="mb-4 border-white">

        <!-- Login Form -->
        <form action="" method="POST">
            <div class="mb-4">
                <label class="block mb-2 text-white" for="namaSiswa">Nama Siswa</label>
                <input class="w-full p-2 text-white rounded bg-sky-200" type="text" id="namaSiswa" name="namaSiswa" required>
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-white" for="nis">NIS</label>
                <input class="w-full p-2 text-white rounded bg-sky-200" type="text" id="nis" name="nis" required>
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-white" for="password">Password</label>
                <input class="w-full p-2 text-white rounded bg-sky-200" type="password" id="password" name="password" required>
            </div>
            <div class="flex justify-end">
                <button class="px-4 py-2 text-black bg-gray-200 rounded" type="submit" name="login">Login</button>
            </div>
        </form>

        <!-- Error Message -->
        <?php if (isset($error_message)) : ?>
            <p class="mt-4 text-white"><?php echo $error_message; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>

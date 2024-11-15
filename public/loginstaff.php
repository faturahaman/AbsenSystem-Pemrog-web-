g

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login Siswa</title>
</head>
<body class="flex items-center justify-center min-h-screen m-3 ">
    <div class="p-8 rounded shadow-lg g bg-violet-900 w-96">
    <a href="index.php" class="m-3 text-white transition-all hover:underline">Back&laquo</a>
        <h2 class="mb-4 text-2xl font-bold text-center text-white">Login Staff admin</h2>
        <hr class="mb-4 border-white">

        <!-- Login Form -->
        <form action="" method="POST">
            <div class="mb-4">
                <label class="block mb-2 text-sky-200" for="namaSiswa">Nama Pegawai</label>
                <input class="w-full p-2 rounded text-blue-950 bg-sky-200" type="text" id="namaPegawai" name="namaPegawai" required>
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-white" for="nopegawai">Nomor Pegawai</label>
                <input class="w-full p-2 rounded text-blue-950 bg-sky-200" type="text" id="nopegawai" name="noPegawai" required>
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-white" for="password">Password</label>
                <input class="w-full p-2 rounded text-blue-950 bg-sky-200" type="password" id="password" name="password" required>
            </div>
            <div class="flex justify-end">
                <button class="flex w-full justify-center rounded-md bg-blue-950 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-colors" type="submit" name="login">Login</button>
            </div>
            <div class="p-3 text-white underline">
                
            </div>
        </form>
        <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="bottom-0 -mb-8 -mx-7">
        <path fill="#f3f4f5" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
</svg> -->

        <!-- Error Message -->
        <?php if (isset($error_message)) : ?>
            <p class="mt-4 text-red"><?php echo $error_message; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>


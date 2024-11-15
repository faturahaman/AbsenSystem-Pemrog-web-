  <?php
  session_start();
  require '../config/db.php';
  require '../config/functions.php';

  // Check if the user is logged in
  if (!isset($_SESSION['loginadmin'])) {
    header("Location: loginstaff.php");
    exit;
  }
  // Inisialisasi variabel $students sebagai array kosong
  $students = [];
    $kelas = $_POST["category"] ?? "";
    $filterTgl = $_POST["filterTgl"] ?? "";
  
    $students = cari($kelas,$filterTgl);
    
  // modal absen input
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
  <html lang="id">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Siswa SMK Analis Kimia Nusa </title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Font Awesome -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  </head>

  <body class="h-screen font-sans text-white bg-indigo-900 ">

    <div class="flex h-full">
      <!-- Sidebar -->
      <div class="flex flex-col w-1/4 p-4 bg-indigo-950" data-aos="fade-right">
        <!-- Logo dan Judul -->
        <div class="flex items-center mb-8">
          <img src="img/WhatsApp_Image_2024-09-20_at_09.08.49_4a0e336d-removebg-preview (1).png"
            alt="School Logo" width="50" height="50" class="mr-2" />
          <span class="p-3 text-xl font-bold text-white transition-all hover:border-l-4">Navigation Admin</span>
        </div>

        <!-- Navigasi Sidebar -->
        <nav class="flex-grow">
          <ul>
            <li class="mb-4" data-aos="fade-right"  data-aos-duration="1000">
              <a href="admin.php" class="block px-4 py-2 text-indigo-800 transition-all border-white rounded bg-sky-500 hover:border-l-4 hover:text-white hover:shadow-[0px_0px_42424px_2px_#46879464]">
                Data Absen
              </a>
            </li>
            <li class="mb-4" data-aos="fade-right"  data-aos-duration="1200">
              <a href="register_siswa.php" class="block px-4 py-2 text-indigo-800 transition-all border-white rounded bg-sky-500 hover:border-l-4 hover:text-white hover:shadow-[0px_0px_42424px_2px_#46879464]">daftarkan siswa</a>
            </li>
            <li class="mb-4" data-aos="fade-right"  data-aos-duration="1300">
              <a href="register_admin.php" class="block px-4 py-2 text-indigo-800 transition-all border-white rounded bg-sky-500 hover:border-l-4 hover:text-white hover:shadow-[0px_0px_42424px_2px_#46879464]">daftarkan admin</a>
            </li>
            <li class="mb-4" data-aos="fade-right"  data-aos-duration="1400">
              <a href="logout.php" class="block px-4 py-2 text-indigo-800 transition-all border-white rounded bg-sky-500 hover:border-l-4 hover:text-white hover:shadow-[0px_0px_42424px_2px_#46879464]">Log Out</a>
            </li>
            <button id="openModal" class="block px-4 py-2 text-indigo-800 transition-all border-white rounded bg-sky-500 hover:border-l-4 hover:text-white hover:shadow-[0px_0px_42424px_2px_#46879464]">
      Input Absen
    </button>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 flex items-center justify-center hidden bg-black bg-opacity-50 z-100">
      <div class="p-6 rounded-lg shadow-lg bg-violet-950 w-96">
        <h2 class="mb-4 text-xl font-bold">Input absen</h2>
        <form action="" method="POST">
                  <div class="mb-4">
                      <label class="block mb-2 text-white">Nama</label>
                      <input class="w-full p-2 border-none rounded bg-violet-600" type="text" name="namaSiswa" required />
                  </div>
                  <div class="flex flex-col mb-4 md:flex-row md:space-x-4">
                      <div class="w-full mb-4 md:w-1/2 md:mb-0">
                          <label class="block mb-2 text-white">Kelas</label>
                          <!-- <input class="w-full p-2 border-none rounded bg-violet-600" type="text" name="kelas" required placeholder="Nama kelas dan jurusan" /> -->
                          <select name="kelas" id="category" class="w-full p-2 text-white transition-colors border-2 border-none rounded-lg border-sky-700 bg-violet-600">
              <option value="" selected>Pilih kelas</option>
              <option value="10 PPLG">10 PPLG</option>
              <option value="10 AK">10 AK</option>
              <option value="10 FARMASI">10 Farmasi</option>
              <option value="11 PPLG">11 PPLG</option>
              <option value="11 AK">11 AK</option>
              <option value="11 FARMASI">11 FARMASI</option>
              <option value="12 PPLG">12 PPLG</option>
              <option value="12 AK">12 AK</option>
              <option value="12 FARMASI">12 FARMASI</option>  
            </select>
                      </div>
                      <div class="w-full md:w-1/2">
                          <label class="block mb-2 text-white">Status Absen</label>
                          <select name="statusAbsen" id="absen" class="w-full p-2 border-none rounded bg-violet-600">
                              <option value="Belum">Pilih absen</option>
                              <option value="Hadir">Hadir</option>
                              <option value="Sakit">Izin sakit</option>
                              <option value="Izin">Izin Dengan Keterangan</option>
                          </select>
                      </div>
                  </div>
                  <div class="mb-4">
                      <label class="block mb-2 text-white">NIS</label>
                      <input class="w-full p-2 border-none rounded bg-violet-600" type="text" name="nis" required />
                  </div>
                  <button class="px-4 py-2 text-black bg-gray-300 rounded" type="submit" name="absenbtn">Absen</button>
                  <button id="closeModal" class="px-4 py-2 text-white bg-red-500 rounded hover:bg-red-600">
                    Tutup
                  </button>
              </form>
      </div>
    </div>
          </ul>
        </nav>
      </div>

      <!-- Konten Utama -->
      <div class="flex flex-col w-3/4 p-8">
        <h1 class="mb-4 text-2xl font-bold text-blue-200">Absensi Siswa SMK Analis Kimia Nusa Bangsa</h1>

        <div class="flex-grow p-4 rounded bg-indigo-950 shadow-[100px_11px_42434px_100px_#46879464]">
          <h2 class="mb-4 text-xl font-bold">History Absensi</h2>
          <form action="" method="post" class="m-4 font-mono text-blue-800 ">
            <select name="category" id="category" class="p-2 border-2 rounded-lg border-sky-700 ">
              <option value="" selected>Semua kelas</option>
              <option value="10 PPLG">10 Pemrograman Perangkat Lunak dan Gim</option>
              <option value="10 AK">10 Analis Kimia</option>
              <option value="10 FARMASI">10 Farmasi</option>
              <option value="11 PPLG">11 Pemrograman Perangkat Lunak dan Gim</option>
              <option value="11 AK">11 AK</option>
              <option value="11 FARMASI">11 FARMASI</option>
              <option value="12 PPLG">12 PPLG</option>
              <option value="12 AK">12 AK</option>
              <option value="12 FARMASI">12 FARMASI</option>
            </select>
            <input type="date" name="filterTgl" id="" class="p-1 border-2 rounded-lg border-sky-700 ">
            <button type="submit" name="btn-kategori" class="p-1 text-xs bg-white border-2 rounded-lg bord er-sky-200 ">cari kelas</button>
          </form>
          <!-- Tabel Absensi -->
          <table class="w-full text-left bg-blue-900 rounded bg-white/30 ">
            <thead>
              <tr>
                <th class="px-4 py-2">No </th>
                <th class="px-4 py-2">Nama</th>
                <th class="px-4 py-2">Kelas</th>
                <th class="px-4 py-2">Date</th>
                <th class="px-4 py-2">Status</th>
              </tr>
            </thead>
            <tbody>
            <tbody class="overflow-auto">
      <?php
      $no = 1;
      // Cek apakah $students berisi array dan ada datanya
      if (is_array($students) && count($students) > 0) :
          foreach ($students as $student) : ?>
              <tr class="">
                  <td class="px-4 py-2"><?= $no ?></td>
                  <td class="px-4 py-2">
                      <a href="option.php?id=<?= $student['id']?>">
                      <?= htmlspecialchars($student['namaSiswa']) ?>
                    </a>
                    </td>
                  <td class="px-4 py-2"><?= htmlspecialchars($student['kelas']) ?></td>
                  <td class="px-4 py-2"><?= htmlspecialchars($student['time']) ?></td>
                  <td class="px-4 py-2"><?= htmlspecialchars($student['statusAbsen']) ?></td>
              </tr>
          <?php
              $no++;
          endforeach;
      else: ?>
          <tr>
              <td colspan="5" class="px-4 py-2 text-center">Data tidak ditemukan.</td>
          </tr>
      <?php endif; ?>
  </tbody>


            <!-- end show data -->
          </table>
        </div>
      </div>
    </div>




    <script>
      const openModal = document.getElementById('openModal');
      const closeModal = document.getElementById('closeModal');
      const modal = document.getElementById('modal');

      openModal.addEventListener('click', () => {
        modal.classList.remove('hidden');
        
      });

      closeModal.addEventListener('click', () => {
        modal.classList.add('hidden');
      });

      // Menutup modal ketika pengguna mengklik area di luar modal
      modal.addEventListener('click', (event) => {
        if (event.target === modal) {
          modal.classList.add('hidden');
        }
      });
    </script>
    <script>
  AOS.init();
</script>
  </html>
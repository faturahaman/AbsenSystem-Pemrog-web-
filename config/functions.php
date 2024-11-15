<?php
function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row =  mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function cari($keyword, $filterTgl) {
    global $conn;

    // Mengamankan input dengan menggunakan mysqli_real_escape_string
    $keyword = mysqli_real_escape_string($conn, $keyword);
    $filterTgl = mysqli_real_escape_string($conn, $filterTgl);
    
    // Membuat query pencarian dengan LIKE dan wildcard
    $query = "SELECT * FROM tb_absen 
              WHERE kelas LIKE '%$keyword%' 
              AND time LIKE '%$filterTgl%'";

    // Eksekusi query
    $result = mysqli_query($conn, $query);
    
    // Menyimpan hasil pencarian ke dalam array
    $students = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $students[] = $row;
        }
    }

    return $students;
}

// generate qr code 

function generateDailyToken($secret_key) {
    // Menggunakan tanggal hari ini sebagai basis token
    $date = date('Y-m-d');
    // Menghasilkan token menggunakan HMAC SHA-256
    $token = hash_hmac('sha256', $date, $secret_key);
    return $token;
}



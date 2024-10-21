<?php
// Memasukkan file koneksi
include 'db.php';

// Memeriksa apakah data telah dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $nama = $_POST['nama'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Pastikan untuk mengenkripsi password sebelum menyimpannya
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $provinsi = $_POST['provinsi'];
    $kodepos = $_POST['kodepos'];

    // Query SQL untuk menyimpan data
    $sql = "INSERT INTO users (nama, telepon, email, password, alamat, kota, provinsi, kodepos) 
            VALUES ('$nama', '$telepon', '$email', '$password', '$alamat', '$kota', '$provinsi', '$kodepos')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.html?status=success");
        exit();
        // echo "Data berhasil disimpan!";
    } else {
        echo " " . $sql . "<br>" . $conn->error;
    }

    // Menutup koneksi
    $conn->close();
} else {
    echo "Metode permintaan tidak valid.";
}
?>

<?php
include 'koneksi.php';
header('Content-Type: application/json');

$nama_kegiatan = mysqli_real_escape_string($koneksi, $_POST['nama_kegiatan']);
$waktu_kegiatan = mysqli_real_escape_string($koneksi, $_POST['waktu_kegiatan']);

$query = "INSERT INTO tb_portofolio (nama_kegiatan, waktu_kegiatan) VALUES ('$nama_kegiatan', '$waktu_kegiatan')";
$result = mysqli_query($koneksi, $query);

if ($result) {
    echo json_encode(['success' => true, 'message' => 'Kegiatan berhasil ditambahkan']);
} else {
    echo json_encode(['success' => false, 'message' => 'Gagal menambahkan kegiatan']);
}
?>
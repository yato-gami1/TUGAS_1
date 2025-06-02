<?php
include 'koneksi.php';
header('Content-Type: application/json');

$kegiatan_lama = mysqli_real_escape_string($koneksi, $_POST['kegiatan_lama']);
$nama_kegiatan = mysqli_real_escape_string($koneksi, $_POST['nama_kegiatan']);
$waktu_kegiatan = mysqli_real_escape_string($koneksi, $_POST['waktu_kegiatan']);

$query = "UPDATE tb_portofolio SET nama_kegiatan = '$nama_kegiatan', waktu_kegiatan = '$waktu_kegiatan' WHERE nama_kegiatan = '$kegiatan_lama'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    echo json_encode(['success' => true, 'message' => 'Kegiatan berhasil diperbarui']);
} else {
    echo json_encode(['success' => false, 'message' => 'Gagal memperbarui kegiatan: ' . mysqli_error($koneksi)]);
}
?>
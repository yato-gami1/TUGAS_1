<?php
include 'koneksi.php';
header('Content-Type: application/json');

$nama_kegiatan = mysqli_real_escape_string($koneksi, $_GET['nama_kegiatan']);

$query = "DELETE FROM tb_portofolio WHERE nama_kegiatan = '$nama_kegiatan'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    echo json_encode(['success' => true, 'message' => 'Kegiatan berhasil dihapus']);
} else {
    echo json_encode(['success' => false, 'message' => 'Gagal menghapus kegiatan: ' . mysqli_error($koneksi)]);
}
?>
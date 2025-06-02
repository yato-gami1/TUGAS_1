<?php
include 'koneksi.php';

$query = "SELECT * FROM tb_portofolio ORDER BY waktu_kegiatan DESC";
$result = mysqli_query($koneksi, $query);

// Cek apakah data ditemukan
if (mysqli_num_rows($result) > 0) {
    echo '<div style="font-family: \'Poppins\', sans-serif; max-width: 1200px; margin: 0 auto; padding: 20px;">';
    echo '<h1 style="color: #4363d8; text-align: center; margin-bottom: 30px;">Daftar Kegiatan Portofolio</h1>';
    
    echo '<table style="width: 100%; border-collapse: collapse; box-shadow: 0 0 20px rgba(0,0,0,0.1);">';
    echo '<thead>';
    echo '<tr style="background-color: #4363d8; color: white;">';
    echo '<th style="padding: 12px 15px; text-align: left;">No</th>';
    echo '<th style="padding: 12px 15px; text-align: left;">Nama Kegiatan</th>';
    echo '<th style="padding: 12px 15px; text-align: left;">Waktu Kegiatan</th>';
    echo '<th style="padding: 12px 15px; text-align: left;">Status</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        // Tentukan status berdasarkan tanggal
        $currentDate = date('Y-m-d');
        $kegiatanDate = $row['waktu_kegiatan'];
        
        if ($kegiatanDate < $currentDate) {
            $status = 'Selesai';
            $statusStyle = 'background-color: #e6f7ee; color: #28a745;';
        } elseif ($kegiatanDate == $currentDate) {
            $status = 'Berlangsung';
            $statusStyle = 'background-color: #fff8e6; color: #ffc107;';
        } else {
            $status = 'Rencana';
            $statusStyle = 'background-color: #f0f0f0; color: #777;';
        }
        
        echo '<tr style="border-bottom: 1px solid #ddd;">';
        echo '<td style="padding: 12px 15px;">' . $no++ . '</td>';
        echo '<td style="padding: 12px 15px;">' . htmlspecialchars($row['nama_kegiatan']) . '</td>';
        echo '<td style="padding: 12px 15px;">' . date('d M Y', strtotime($row['waktu_kegiatan'])) . '</td>';
        echo '<td style="padding: 12px 15px;">';
        echo '<span style="padding: 5px 10px; border-radius: 20px; font-size: 12px; ' . $statusStyle . '">' . $status . '</span>';
        echo '</td>';
        echo '</tr>';
    }
    
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
} else {
    echo '<div style="font-family: \'Poppins\', sans-serif; text-align: center; padding: 50px;">';
    echo '<h2 style="color: #4363d8;">Tidak ada data kegiatan</h2>';
    echo '</div>';
}
?>
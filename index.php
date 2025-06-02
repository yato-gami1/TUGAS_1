<?php
include 'koneksi.php';

// Ambil data dari database
$query = "SELECT * FROM tb_portofolio ORDER BY waktu_kegiatan DESC";
$result = mysqli_query($koneksi, $query);

$no = 1;
?>

<!DOCTYPE html>
<html>
<head>
    <title>PORTOFOLIO - Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
            margin: 20px; 
            background-color: #f5f7fa;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        h1 {
            color: #4363d8;
            text-align: center;
            margin-bottom: 30px;
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 20px;
        }
        th, td { 
            padding: 12px 15px; 
            text-align: left; 
            border-bottom: 1px solid #ddd; 
        }
        th { 
            background-color: #4363d8; 
            color: white; 
            font-weight: 500;
        }
        tr:nth-child(even) { 
            background-color: #f9f9f9; 
        }
        tr:hover { 
            background-color: rgba(67, 99, 216, 0.05); 
        }
        .btn { 
            padding: 8px 12px; 
            border-radius: 4px; 
            font-size: 14px; 
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            color: white;
            text-decoration: none;
            display: inline-block;
        }
        .btn-primary { 
            background-color: #4CAF50; 
        }
        .btn-primary:hover { 
            background-color: #3d8b40; 
        }
        .btn-warning {
            background-color: #ff9800;
        }
        .btn-warning:hover { 
            background-color: #e68a00; 
        }
        .btn-danger { 
            background-color: #f44336; 
        }
        .btn-danger:hover { 
            background-color: #d32f2f; 
        }
        .form-group { 
            margin-bottom: 20px; 
        }
        .form-control { 
            width: 100%; 
            padding: 10px; 
            border: 1px solid #ddd; 
            border-radius: 4px; 
            font-family: 'Poppins', sans-serif;
        }
        .action-cell { 
            white-space: nowrap; 
        }
        .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }
        .status-selesai {
            background-color: #e6f7ee;
            color: #28a745;
        }
        .status-berlangsung {
            background-color: #fff8e6;
            color: #ffc107;
        }
        .status-rencana {
            background-color: #f0f0f0;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Kegiatan Portofolio</h1>
        
        <form action="tambah.php" method="POST">
            <div class="form-group">
                <label>NAMA KEGIATAN:</label>
                <input type="text" name="nama_kegiatan" class="form-control" required>
            </div>
            <div class="form-group">
                <label>WAKTU KEGIATAN:</label>
                <input type="date" name="waktu_kegiatan" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan
            </button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kegiatan</th>
                    <th>Waktu Kegiatan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): 
                    // Tentukan status berdasarkan tanggal
                    $currentDate = date('Y-m-d');
                    $kegiatanDate = $row['waktu_kegiatan'];
                    
                    if ($kegiatanDate < $currentDate) {
                        $status = 'Selesai';
                        $statusClass = 'status-selesai';
                    } elseif ($kegiatanDate == $currentDate) {
                        $status = 'Berlangsung';
                        $statusClass = 'status-berlangsung';
                    } else {
                        $status = 'Rencana';
                        $statusClass = 'status-rencana';
                    }
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($row['nama_kegiatan']); ?></td>
                    <td><?php echo date('d M Y', strtotime($row['waktu_kegiatan'])); ?></td>
                    <td>
                        <span class="status-badge <?php echo $statusClass; ?>">
                            <?php echo $status; ?>
                        </span>
                    </td>
                    <td class="action-cell">
                        <a href="edit.php?nama_kegiatan=<?php echo urlencode($row['nama_kegiatan']); ?>" 
                           class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="hapus.php?nama_kegiatan=<?php echo urlencode($row['nama_kegiatan']); ?>" 
                           class="btn btn-danger" 
                           onclick="return confirm('Yakin ingin menghapus data ini?')">
                            <i class="fas fa-trash"></i> Hapus
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
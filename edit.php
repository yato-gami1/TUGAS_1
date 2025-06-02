<?php
include 'koneksi.php';

// Validasi parameter GET
if (!isset($_GET['nama_kegiatan']) || empty(trim($_GET['nama_kegiatan']))) {
    header("Location: index.php");
    exit();
}

// Escape input untuk mencegah SQL injection
$namakegiatan = mysqli_real_escape_string($koneksi, trim($_GET['nama_kegiatan']));
$query = "SELECT * FROM tb_portofolio WHERE nama_kegiatan = '$namakegiatan'";
$result = mysqli_query($koneksi, $query);

// Cek apakah data ditemukan
if (!$result || mysqli_num_rows($result) == 0) {
    header("Location: index.php");
    exit();
}

$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Kegiatan</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin: 20px; 
        }
        .btn { 
            padding: 5px 10px; 
            cursor: pointer; 
            text-decoration: none; 
            display: inline-block; 
            margin-right: 5px; 
        }
        .btn-primary { 
            background-color: #4CAF50; 
            color: white; 
            border: none; 
            border-radius: 3px; 
        }
        .btn-primary:hover { 
            background-color: #45a049; 
        }
        .form-group { 
            margin-bottom: 15px; 
        }
        .form-control { 
            width: 100%; 
            padding: 8px; 
            box-sizing: border-box; 
        }
    </style>
</head>
<body>
    <h2>Edit Data Kegiatan</h2>
    
    <form action="proses_edit.php" method="POST">
        <!-- Menyimpan nama kegiatan lama sebagai referensi -->
        <input type="hidden" name="kegiatan_lama" value="<?php echo htmlspecialchars($data['nama_kegiatan']); ?>">
        
        <div class="form-group">
            <label>NAMA KEGIATAN:</label>
            <input type="text" name="nama_kegiatan" class="form-control" 
                   value="<?php echo htmlspecialchars($data['nama_kegiatan']); ?>" required>
        </div>
        
        <div class="form-group">
            <label>WAKTU KEGIATAN:</label>
            <input type="date" name="waktu_kegiatan" class="form-control" 
                   value="<?php echo htmlspecialchars($data['waktu_kegiatan']); ?>" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="index.php" class="btn btn-danger">Batal</a>
    </form>
</body>
</html>
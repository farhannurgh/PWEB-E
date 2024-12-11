<?php
$conn = new mysqli('localhost', 'root', '', 'kursus_mobil');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $kursus = $_POST['kursus'];
    $status = $_POST['status']; // Menambahkan pilihan status

    $sql = "INSERT INTO pendaftaran (nama, alamat, no_hp, kursus, status) VALUES ('$nama', '$alamat', '$no_hp', '$kursus', '$status')";
    if ($conn->query($sql)) {
        header('Location: list.php');
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Kursus Mobil</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f7f7f7; padding: 20px; }
        form { background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        input, select { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px; }
        button { background: #007BFF; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background: #0056b3; }
    </style>
</head>
<body>
    <h2>Form Pendaftaran Kursus Mobil</h2>
    <form method="POST">
        <label>Nama:</label>
        <input type="text" name="nama" required>
        <label>Alamat:</label>
        <input type="text" name="alamat" required>
        <label>No HP:</label>
        <input type="text" name="no_hp" required>
        <label>Paket Kursus:</label>
        <select name="kursus">
            <option value="Basic">Basic</option>
            <option value="Intermediate">Intermediate</option>
            <option value="Advanced">Advanced</option>
        </select>
        <label>Status:</label>
        <select name="status" required>
            <option value="Pegawai">Pegawai</option>
            <option value="Pelajar">Pelajar</option>
        </select>
        <button type="submit">Daftar</button>
    </form>
</body>
</html>

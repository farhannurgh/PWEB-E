<?php
$conn = new mysqli('localhost', 'root', '', 'kursus_mobil');

$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $kursus = $_POST['kursus'];

    $sql = "UPDATE pendaftaran SET nama='$nama', alamat='$alamat', no_hp='$no_hp', kursus='$kursus' WHERE id=$id";
    if ($conn->query($sql)) {
        header('Location: list.php');
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    $result = $conn->query("SELECT * FROM pendaftaran WHERE id=$id");
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pendaftar</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; background: #f7f7f7; }
        form { background: white; padding: 20px; border-radius: 10px; }
        input, select { width: 100%; padding: 10px; margin: 10px 0; }
        button { background: #007BFF; color: white; padding: 10px; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h2>Edit Data Pendaftar</h2>
    <form method="POST">
        <label>Nama:</label>
        <input type="text" name="nama" value="<?= $row['nama'] ?>" required>
        <label>Alamat:</label>
        <input type="text" name="alamat" value="<?= $row['alamat'] ?>" required>
        <label>No HP:</label>
        <input type="text" name="no_hp" value="<?= $row['no_hp'] ?>" required>
        <label>Paket Kursus:</label>
        <select name="kursus">
            <option value="Basic" <?= $row['kursus'] === 'Basic' ? 'selected' : '' ?>>Basic</option>
            <option value="Intermediate" <?= $row['kursus'] === 'Intermediate' ? 'selected' : '' ?>>Intermediate</option>
            <option value="Advanced" <?= $row['kursus'] === 'Advanced' ? 'selected' : '' ?>>Advanced</option>
        </select>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
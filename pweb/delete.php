<?php
$conn = new mysqli('localhost', 'root', '', 'kursus_mobil');

$id = $_GET['id'];
$sql = "DELETE FROM pendaftaran WHERE id=$id";
if ($conn->query($sql)) {
    header('Location: list.php');
} else {
    echo "Error: " . $conn->error;
}
?>

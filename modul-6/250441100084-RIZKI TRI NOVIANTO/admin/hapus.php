<?php
require '../config/auth.php';
require '../config/koneksi.php';

$id = intval($_GET['id']);

$stmt = $conn->prepare("DELETE FROM buku WHERE id=?");
$stmt->bind_param("i", $id);

$stmt->execute();

header("Location: dashboard.php");
exit;
?>
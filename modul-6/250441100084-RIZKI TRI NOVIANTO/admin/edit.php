<?php
require '../config/auth.php';
require '../config/koneksi.php';

$id = intval($_GET['id']);

$stmt = $conn->prepare("SELECT * FROM buku WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();

$data = $stmt->get_result()->fetch_assoc();

if(isset($_POST['submit'])){

    $judul = htmlspecialchars($_POST['judul']);
    $penulis = htmlspecialchars($_POST['penulis']);
    $kategori = htmlspecialchars($_POST['kategori']);
    $harga = $_POST['harga'];
    $tanggal = $_POST['tanggal'];

    $update = $conn->prepare("UPDATE buku SET judul=?, penulis=?, kategori=?, harga=?, tanggal_terbit=? WHERE id=?");

    $update->bind_param("sssisi", $judul, $penulis, $kategori, $harga, $tanggal, $id);

    if($update->execute()){
        header("Location: dashboard.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-cover bg-center p-8"
style="background-image: url('/assets/gambar perpus.jpeg');">
<div class="w-[420px] p-8 rounded-2xl
    bg-white/10 backdrop-blur-md border border-white/20 shadow-2xl">

    <form method="POST" class="space-y-4">
        
        <h1 class="text-2xl text-white font-bold text-center">Edit Buku</h1>
        
        <input type="text" name="judul"
        value="<?= htmlspecialchars($data['judul']) ?>"
        required class="w-full mt-1 p-3 rounded-lg
        bg-white/20 border border-white/30
        text-white placeholder-white/70
        outline-none focus:ring-2 focus:ring-yellow-400">
        
        <input type="text" name="penulis"
        value="<?= htmlspecialchars($data['penulis']) ?>"
        required class="w-full mt-1 p-3 rounded-lg
        bg-white/20 border border-white/30
        text-white placeholder-white/70
        outline-none focus:ring-2 focus:ring-yellow-400">
        <input type="text" name="kategori"
        value="<?= htmlspecialchars($data['kategori']) ?>"
        required class="w-full mt-1 p-3 rounded-lg
        bg-white/20 border border-white/30
        text-white placeholder-white/70
        outline-none focus:ring-2 focus:ring-yellow-400">
        
        <input type="number" name="harga"
        value="<?= $data['harga'] ?>"
        required class="w-full mt-1 p-3 rounded-lg
        bg-white/20 border border-white/30
        text-white placeholder-white/70
        outline-none focus:ring-2 focus:ring-yellow-400">
        <input type="date" name="tanggal"
        value="<?= $data['tanggal_terbit'] ?>"
        required class="w-full mt-1 p-3 rounded-lg
        bg-white/20 border border-white/30
        text-white placeholder-white/70
        outline-none focus:ring-2 focus:ring-yellow-400">
        
        <button name="submit"
        class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded w-full">
        Update
    </button>
    
</form>
</div>

</body>
</html>
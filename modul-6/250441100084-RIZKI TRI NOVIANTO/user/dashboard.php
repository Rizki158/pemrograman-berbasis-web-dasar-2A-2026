<?php
require '../config/auth.php';
require '../config/koneksi.php';

$data = $conn->query("SELECT * FROM buku");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-cover bg-center p-8"
style="background-image: url('/assets/gambar perpus2.jpg');">

<div class="max-w-6xl mx-auto bg-white p-6 rounded shadow">

    <div class="flex justify-between mb-6">
        <h1 class="text-2xl font-bold">
            Halo, <?= htmlspecialchars($_SESSION['nama']) ?>
        </h1>

        <a href="../logout.php"
            class="bg-red-500 text-white px-4 py-2 rounded">
            Logout
        </a>
    </div>

    <table class="w-full border-collapse border">
        <tr class="bg-gray-200">
            <th class="border p-2">Judul</th>
            <th class="border p-2">Penulis</th>
            <th class="border p-2">Kategori</th>
            <th class="border p-2">Harga</th>
        </tr>

        <?php while($row = $data->fetch_assoc()) : ?>

        <tr>
            <td class="border p-2"><?= htmlspecialchars($row['judul']) ?></td>
            <td class="border p-2"><?= htmlspecialchars($row['penulis']) ?></td>
            <td class="border p-2"><?= htmlspecialchars($row['kategori']) ?></td>
            <td class="border p-2">Rp <?= number_format($row['harga']) ?></td>
        </tr>

        <?php endwhile; ?>

    </table>
</div>

</body>
</html>
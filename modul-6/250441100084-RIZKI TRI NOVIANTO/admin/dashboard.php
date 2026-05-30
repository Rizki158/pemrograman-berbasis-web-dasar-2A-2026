<?php
require '../config/auth.php';
require '../config/koneksi.php';

if($_SESSION['role'] != 'admin'){
    header("Location: ../login.php");
    exit;
}

$data = $conn->query("SELECT * FROM buku");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-cover bg-center p-8"
style="background-image: url('/assets/gambar perpus.jpeg');">

<div class="max-w-6xl mx-auto bg-white p-6 rounded shadow">

    <div class="flex justify-between mb-6">
        <h1 class="text-2xl font-bold">Dashboard Admin</h1>

        <div class="space-x-2">
            <a href="tambah.php"
                class="bg-blue-500 text-white px-4 py-2 rounded">
                Tambah Buku
            </a>

            <a href="../logout.php"
                class="bg-red-500 text-white px-4 py-2 rounded">
                Logout
            </a>
        </div>
    </div>

    <table class="w-full border-collapse border">
        <tr class="bg-gray-200">
            <th class="border p-2">No</th>
            <th class="border p-2">Judul</th>
            <th class="border p-2">Penulis</th>
            <th class="border p-2">Kategori</th>
            <th class="border p-2">Harga</th>
            <th class="border p-2">Tanggal</th>
            <th class="border p-2">Aksi</th>
        </tr>

        <?php $no=1; while($row = $data->fetch_assoc()) : ?>

        <tr>
            <td class="border p-2"><?= $no++ ?></td>
            <td class="border p-2"><?= htmlspecialchars($row['judul']) ?></td>
            <td class="border p-2"><?= htmlspecialchars($row['penulis']) ?></td>
            <td class="border p-2"><?= htmlspecialchars($row['kategori']) ?></td>
            <td class="border p-2">Rp <?= number_format($row['harga']) ?></td>
            <td class="border p-2"><?= htmlspecialchars($row['tanggal_terbit']) ?></td>
            <td class="border p-2 space-x-2">
                <a href="edit.php?id=<?= $row['id'] ?>"
                    class="bg-yellow-400 px-3 py-1 rounded text-white">
                    Edit
                </a>

                <a href="hapus.php?id=<?= $row['id'] ?>"
                    onclick="return confirm('Yakin hapus?')"
                    class="bg-red-500 px-3 py-1 rounded text-white">
                    Hapus
                </a>
            </td>
        </tr>

        <?php endwhile; ?>

    </table>
</div>

</body>
</html>
<?php
$timeline = [
    ["tahun" => 2019, "kegiatan" => "Mengenal pemrograman menggunakan bahasa C++"],
    ["tahun" => 2022, "kegiatan" => "Membuat sebuah perulangan untuk menerima anggota ekstrakulikuler yang baru"],
    ["tahun" => 2023, "kegiatan" => "Mempelajari pemrograman website (HTML dan CSS)"],
    ["tahun" => 2025, "kegiatan" => "Tahun Masuk Kuliah"],
    ["tahun" => 2025, "kegiatan" => "Mempelajari bahasa python"],
    ["tahun" => 2026, "kegiatan" => "Mempelajari bahasa JavaScript dan PHP"]
];

function Tahun($tahun) {
    if ($tahun == 2025 || $tahun == 2023) {
        return "<span style='color: #35a9ec; font-weight: bold; border-bottom: 2px solid;'>$tahun</span>";
    }
    return "<strong>$tahun</strong>";
}
?>

<!doctype html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Timeline Belajarku</title>

<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-b from-blue-100 via-white to-blue-200 min-h-screen p-6">

<h2 class="text-center text-2xl font-bold mt-8 mb-10">
    Timeline Perjalanan Belajarku
</h2>

<div class="relative max-w-4xl mx-auto">

    <div class="absolute left-1/2 top-0 w-1 bg-blue-600 h-full transform translate-x-1/2"></div>

<?php foreach ($timeline as $index => $item): ?>

<div class="mb-12 flex justify-between  items-center w-full">

    <?php 
    $kiri = $index % 2 == 0;
    ?>

    <!-- KIRI -->
    <div class="w-1/2 <?= $kiri ? 'pr-8 text-right' : '' ?>">
        <?php if ($kiri): ?>
            <div class="bg-white p-4 rounded shadow-lg hover:shadow-2xl transition-shadow duration-300">
                <h3 class="font-bold text-lg">
                    <?= Tahun($item['tahun']); ?>
                </h3>
                <p><?= $item['kegiatan']; ?></p>
            </div>
        <?php endif; ?>
    </div>

    <div class="w-6 h-6 bg-blue-600 rounded-full border-4 border-white z-10 "></div>

    <div class="w-1/2 <?= !$kiri ? 'pl-8 text-left' : '' ?>">
        <?php if (!$kiri): ?>
            <div class="bg-white p-4 rounded shadow-lg hover:shadow-2xl transition-shadow duration-300">
                <h3 class="font-bold text-lg">
                    <?= Tahun($item['tahun']); ?>
                </h3>
                <p><?= $item['kegiatan']; ?></p>
            </div>
        <?php endif; ?>
    </div>

</div>

<?php endforeach; ?>
</div>

<div class="flex justify-center gap-4 mt-10 mb-10">
    <a href="index.php" class="bg-blue-500 text-white px-4 py-2 rounded">
        Kembali ke Profil
    </a>
    <a href="blog.php" class="bg-green-500 text-white px-4 py-2 rounded">
        Menuju Blog Developer
    </a>
</div>

</body>
</html>
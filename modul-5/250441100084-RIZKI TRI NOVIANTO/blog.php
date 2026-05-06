<?php
$artikel = [
    ["art"=>"html","judul"=>"Belajar HTML Pertama Kali","tanggal"=>"10 Jan 2025",
     "isi"=>"Belajar HTML pertama kali terasa membingungkan tapi menyenangkan tetapi tetap membingungkan.",
     "gambar"=>"WhatsApp Image 2026-05-05 at 19.40.59.jpeg","ref"=>"https://www.w3schools.com/"],

    ["art"=>"error","judul"=>"Error Pertama","tanggal"=>"15 Jan 2025",
     "isi"=>"Error pertama bikin frustrasi, tapi jadi paham debugging.",
     "gambar"=>"photo-1600695268275-1a6468700bd5.avif","ref"=>"https://stackoverflow.com/"],

    ["art"=>"project","judul"=>"Project Pertama","tanggal"=>"20 Jan 2025",
     "isi"=>"Berhasil membuat website pertama memberi rasa wah.",
     "gambar"=>"Cuplikan layar 2026-04-26 075145.png","ref"=>"https://www.freecodecamp.org/"]
];

$quotes = [
    "Error adalah teman para programmer bukan kita.",
    "Coding itu logika yang diluar nalar, jadi jangan dihafal.",
    "Terus mencoba dan jangan semangat.",
    "Semua programmer pernah pemula kayaknya."
];

$slug = $_GET['artikel'] ?? null;

$selected = null;
$index = null;

foreach ($artikel as $i => $a) {
    if ($a['art'] == $slug) {
        $selected = $a;
        $index = $i;
        break;
    }
}

$balik = null;
$next = null;

if (isset($artikel[$index-1])) {
    $balik = $artikel[$index-1];
}

if (isset($artikel[$index+1])) {
    $next = $artikel[$index+1];
}

$quote = $quotes[array_rand($quotes)];
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Blog Developer</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-blue-100 to-white min-h-screen p-6">
    
<div class="grid grid-cols-4 min-h-screen">

    <div class="bg-gradient-to-b from-blue-100 to-white p-4 shadow-2xl rounded col-span-1">
        <h2 class="font-bold mb-3">Daftar Artikel</h2>

        <?php foreach ($artikel as $a): ?>
            <a href="?artikel=<?= $a['art'] ?>"
               class="block p-2 hover:bg-blue-500 hover:text-white rounded">
               <?= $a['judul'] ?>
            </a>

            <?php if ($a['art']=="project"): ?>
                <a href="timeline.php"
                   class="text-xs text-white bg-purple-600 ml-2 p-2 hover:bg-purple-400 rounded">
                   → Timeline
                </a>
            <?php endif; ?>

        <?php endforeach; ?>
    </div>

    <div class="col-span-3 p-6 hover:shadow-lg transition-shadow duration-300">

        <div class="bg-gradient-to-b from-blue-100 to-white p-6 rounded shadow h-full">

        <?php if ($selected): ?>

            <h1 class="text-2xl font-bold mb-1"><?= $selected['judul'] ?></h1>
            <p class="text-sm text-gray-500 mb-3"><?= $selected['tanggal'] ?></p>

            <img src="img/<?= $selected['gambar'] ?>"
                 class="w-full h-72 object-cover mb-4 rounded">

            <p class="mb-4"><?= $selected['isi'] ?></p>

            <div class="bg-yellow-100 p-3 italic mb-4 rounded">
                "<?= $quote ?>"
            </div>

            <a href="<?= $selected['ref'] ?>"
               class="text-blue-500 underline">
               Baca referensi
            </a>

            <div class="flex justify-between mt-6">
                <?php if ($balik): ?>
                    <a href="?artikel=<?= $balik['art'] ?>" class="text-white bg-blue-600 px-3 py-1 rounded">
                        ← Sebelumnya
                    </a>
                <?php endif; ?>

                <?php if ($next): ?>
                    <a href="?artikel=<?= $next['art'] ?>" class="text-white bg-blue-600 px-3 py-1 rounded">
                        Berikutnya →
                    </a>
                <?php endif; ?>
            </div>

        <?php else: ?>
            <p class="text-gray-500">
                Silakan klik judul artikel di kiri
            </p>
        <?php endif; ?>

        </div>

    </div>

</div>

</body>
</html>
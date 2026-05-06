<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Profil Developer</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-b from-blue-100 via-white to-blue-200 min-h-screen p-6">

<div class="max-w-3xl mx-auto">

<?php
function tampilData($label, $value) {
    return "<tr>
                <td class='font-semibold p-2'>$label</td>
                <td class='p-2'>$value</td>
            </tr>";
}
?>

<div class="bg-white p-5 rounded shadow mb-5">
    <h2 class="text-xl font-bold text-center mb-3 text-blue-600">
        Profil Developer
    </h2>

    <table class="w-full border-2">
        <tr>
            <td class="p-2">Nama</td>
            <td class="p-2">: Rizki Tri Novianto</td>
        </tr>
        <tr>
            <td class="p-2">ID</td>
            <td class="p-2">: DEV07</td>
        </tr>
        <tr>
            <td class="p-2">TTL</td>
            <td class="p-2">: Nganjuk, 15 November 2006</td>
        </tr>
        <tr>
            <td class="p-2">Email</td>
            <td class="p-2">: rizkitrinovianto@email.com</td>
        </tr>
    </table>
</div>

<div class="bg-white p-5 rounded shadow mb-5">
    <h3 class="font-semibold mb-3">Input Data</h3>

    <form method="POST" class="space-y-3">

        <input type="text" name="framework"
        placeholder="HTML, CSS, JS"
        class="w-full border p-2 rounded">

        <textarea name="pengalaman"
        placeholder="Ceritakan pengalaman..."
        class="w-full border p-2 rounded"></textarea>

        <div>
            <label><input type="checkbox" name="tools[]" value="VS Code"> VS Code</label>
            <label class="ml-2"><input type="checkbox" name="tools[]" value="GitHub"> GitHub</label>
            <label class="ml-2"><input type="checkbox" name="tools[]" value="Figma"> Figma</label>
            <label class="ml-2"><input type="checkbox" name="tools[]" value="Postman"> Postman</label>
        </div>

        <div>
            <label><input type="radio" name="minat" value="Frontend"> Frontend</label>
            <label class="ml-2"><input type="radio" name="minat" value="Backend"> Backend</label>
            <label class="ml-2"><input type="radio" name="minat" value="Fullstack"> Fullstack</label>
        </div>

        <select name="skill" class="w-full border p-2 rounded">
            <option value="">--Pilih Skill--</option>
            <option>Dasar</option>
            <option>Cukup Ahli</option>
            <option>Profesional</option>
        </select>

        <button name="submit"
        class="bg-blue-500 text-white px-4 py-2 rounded w-full">
        Kirim
        </button>

    </form>
</div>

<?php
if (isset($_POST['submit'])) {

    $framework = $_POST['framework'];
    $pengalaman = $_POST['pengalaman'];
    $tools = $_POST['tools'] ?? [];
    $minat = $_POST['minat'] ?? "";
    $skill = $_POST['skill'];

    if ($framework == "" || $pengalaman == "" || empty($tools) || $minat == "" || $skill == "") {
        echo "<p class='text-red-500 text-center'>Semua harus diisi!</p>";
    } else {

        $fw = array_filter(array_map('trim', explode(",", $framework)));

        echo "<div class='bg-white p-5 rounded shadow'>";

        echo "<h3 class='text-green-600 font-bold mb-3'>Hasil</h3>";

        echo "<table class='w-full border mb-3'>";
        echo tampilData("Framework :", implode(", ", $fw));
        echo tampilData("Tools :", implode(", ", $tools));
        echo tampilData("Minat :", $minat);
        echo tampilData("Skill :", $skill);
        echo "</table>";

        echo "<p><b>Pengalaman:</b><br>$pengalaman</p>";

        if (count($fw) > 2) {
            echo "<p class='text-green-600 font-bold mt-2'>
            Pengetahuan Skill Anda cukup luas!
            </p>";
        }

        echo "<a href='timeline.php'
        class='inline-block mt-4 bg-blue-500 text-white px-4 py-2 rounded'>
        Ke Timeline →
        </a>";

        echo "</div>";
    }
}
?>

</div>
</body>
</html>
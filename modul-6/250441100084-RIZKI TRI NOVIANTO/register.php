<?php
require 'config/koneksi.php';

if(isset($_POST['register'])){
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = 'user';

    $stmt = $conn->prepare("INSERT INTO users(nama,email,password,role) VALUES(?,?,?,?)");
    $stmt->bind_param("ssss", $nama, $email, $password, $role);

    if($stmt->execute()){
        header("Location: login.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-cover bg-center p-8"
style="background-image: url('/assets/gambar perpus2.jpg');">
<div class="w-[420px] p-8 rounded-2xl
    bg-white/10 backdrop-blur-md border border-white/20 shadow-2xl">
    <form method="POST" class="space-y-4">
        <h1 class="text-2xl font-bold text-center text-white">Register</h1>

        <input type="text" name="nama" placeholder="Nama"
        required class="w-full mt-1 p-3 rounded-lg
                    bg-white/20 border border-white/30
                    text-white placeholder-white/70
                    outline-none focus:ring-2 focus:ring-yellow-400">

        <input type="email" name="email" placeholder="Email"
        required class="w-full mt-1 p-3 rounded-lg
                    bg-white/20 border border-white/30
                    text-white placeholder-white/70
                    outline-none focus:ring-2 focus:ring-yellow-400">

        <input type="password" name="password" placeholder="Password"
        required minlength="6" class="w-full mt-1 p-3 rounded-lg
                    bg-white/20 border border-white/30
                    text-white placeholder-white/70
                    outline-none focus:ring-2 focus:ring-yellow-400">

        <button name="register"
        class="w-full bg-blue-500 hover:bg-blue-600
            transition duration-300 text-white
            py-3 rounded-lg font-semibold shadow-lg">
        Register
        </button>

        <p class="text-center text-sm text-white">
        Sudah punya akun?
           <a href="login.php" class="text-blue-300 hover:underline">
                Login
            </a>
        </p>
    </form>
</div>
</body>
</html>
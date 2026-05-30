<?php
session_start();
require 'config/koneksi.php';

if(isset($_POST['login'])){
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if($user && password_verify($password, $user['password'])){

        $_SESSION['login'] = true;
        $_SESSION['id'] = $user['id'];
        $_SESSION['nama'] = $user['nama'];
        $_SESSION['role'] = $user['role'];

        if($user['role'] == 'admin'){
            header("Location: admin/dashboard.php");
        } else {
            header("Location: user/dashboard.php");
        }
        exit;
    } else {
        $error = "Email atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-cover bg-center"
style="background-image: url('assets/gambar perpus.jpeg');">

<div class="w-[420px] p-8 rounded-2xl
    bg-white/10 backdrop-blur-md border border-white/20 shadow-2xl">

    <h1 class="text-3xl font-bold text-center text-white mb-8">
        Login
    </h1>

    <?php if(isset($error)) : ?>
        <div class="bg-red-500 text-white p-3 rounded-lg mb-4 text-sm">
            <?= $error; ?>
        </div>
    <?php endif; ?>

    <form method="POST" class="space-y-5">

        <div>
            <label class="text-white text-sm">
                Email
            </label>

            <input type="email"
                name="email"
                placeholder="Masukkan Email"
                required

                class="w-full mt-1 p-3 rounded-lg
                bg-white/20 border border-white/30
                text-white placeholder-white/70
                outline-none focus:ring-2 focus:ring-yellow-400">
        </div>

        
        <div>
            <label class="text-white text-sm">
                Password
            </label>

            <div class="relative">

                <input type="password"
                    name="password"
                    id="password"
                    placeholder="Masukkan Password"
                    required

                    class="w-full mt-1 p-3 rounded-lg
                    bg-white/20 border border-white/30
                    text-white placeholder-white/70
                    outline-none focus:ring-2 focus:ring-yellow-400">

                <button type="button"
                    onclick="togglePassword()"
                    class="absolute right-4 top-5 text-white">
                    <img src="assets/mata.png" class="w-6 h-6 justify-center" alt="">
                </button>

            </div>
        </div>


        <button name="login"

            class="w-full bg-blue-500 hover:bg-blue-600
            transition duration-300 text-white
            py-3 rounded-lg font-semibold shadow-lg">

            Log In
        </button>

        <p class="text-center text-sm text-white">
            Belum punya akun?

            <a href="register.php"
                class="text-blue-300 hover:underline">
                Register
            </a>
        </p>

    </form>
</div>

<script>
function togglePassword() {

    const password = document.getElementById('password');

    if(password.type === "password"){
        password.type = "text";
    } else {
        password.type = "password";
    }
}
</script>

</body>
</html>
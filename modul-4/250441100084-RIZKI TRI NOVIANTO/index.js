const button = document.getElementById("btnhal2");

console.log("JS jalan");
console.log(button);

button.addEventListener("click", () => {

  console.log("Tombol diklik");

  const email = document.querySelector("input[type=text]");
  const password = document.querySelector("input[type=password]");

  console.log(email, password);

  if (!email || !password) {
    alert("Input tidak ditemukan!");
    return;
  }

  const emailValue = email.value;
  const passwordValue = password.value;

  if (emailValue === "" || passwordValue === "") {
    alert("Email dan Password wajib diisi!");
  } 
  else if (emailValue !== "halodek" || passwordValue !== "admin123") {
    alert("Masukkan Email atau Password dengan benar!");
  }
  else {
    alert("Login berhasil (simulasi)");
    window.location.href = "index2.html";
  }
});
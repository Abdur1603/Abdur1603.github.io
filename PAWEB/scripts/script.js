let tombol = document.getElementById('tombol');
tombol.addEventListener('click', function() {
    alert('Data berhasil disimpan');
});

function passVisibility() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  };

let scrollAtasSebelumnya = 0; 
const navbar = document.getElementById('navbar');
const signIN = document.querySelector('.sign-in');
const order = document.querySelector('.order');

signIN.addEventListener('click', (e) => {
    e.preventDefault();
    alert('Fitur ini belum tersedia');
});

function toggleMenu() {
  const navLinks = document.querySelector('.nav-links');
  navLinks.classList.toggle('active');
}
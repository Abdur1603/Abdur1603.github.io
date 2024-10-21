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
const mode = document.querySelector('.sun .fa-solid');
const signIN = document.querySelector('.sign-in');
const order = document.querySelector('.order');

mode.addEventListener('click', (e) => {
    e.preventDefault();
    document.body.classList.toggle('blackmode');
    mode.classList.toggle('fa-sun');
    mode.classList.toggle('fa-moon');
});

signIN.addEventListener('click', (e) => {
    e.preventDefault();
    alert('Fitur ini belum tersedia');
});
const burger = document.querySelector('.burger');
const navMenu = document.querySelector('.nav-menu');

burger.addEventListener('click', (e) => {
    e.preventDefault();
    navMenu.classList.toggle('active');
});

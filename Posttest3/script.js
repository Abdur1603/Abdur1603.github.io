let scrollAtasSebelumnya = 0; 
const navbar = document.getElementById('navbar');
const mode = document.querySelector('.sun .fa-solid');
const signIN = document.querySelector('.sign-in');
const order = document.querySelector('.order');

window.addEventListener('scroll', function() {
    let scrollatas = window.pageYOffset || document.documentElement.scrollatas;

    if (scrollatas > scrollAtasSebelumnya) {
        navbar.classList.add('hidden');
    } else {
        navbar.classList.remove('hidden');
    }
    scrollAtasSebelumnya = scrollatas;
});

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

order.addEventListener('click', (e) => {
    e.preventDefault();
    alert('Fitur ini belum tersedia');
});
// Toggle the navigation menu on small screens when hamburger is clicked
const burger = document.querySelector('.burger');
const navMenu = document.querySelector('.nav-menu');

burger.addEventListener('click', (e) => {
    e.preventDefault();
    navMenu.classList.toggle('active'); // Toggle the "active" class to show/hide the menu
});

alert('Selamat datang di website kami!');
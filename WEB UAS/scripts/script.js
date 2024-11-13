document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    const burger = document.querySelector('.burger');
    const navLinks = document.querySelector('.nav-links');
    const navRight = document.querySelector('.login-register');

    if (burger && navLinks && navRight) {
        burger.addEventListener('click', function () {
            this.classList.toggle('change');
            navLinks.classList.toggle('active');
            navRight.classList.toggle('active');
        });

        navLinks.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                burger.classList.remove('change');
                navLinks.classList.toggle('active');
                navRight.classList.toggle('active');
            });
        });
    }

    const animatedElements = document.querySelectorAll('.animate-on-scroll');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
            } else {
                entry.target.classList.remove('is-visible');
            }
        });
    }, {
        threshold: 0.1
    });

    animatedElements.forEach(element => {
        observer.observe(element);
    });
});

function showAlert(type, headText, bodyText) {
    const toastWrapper = document.querySelector(".toast-wrapper");
    const toast = toastWrapper.querySelector(".toast");
    const header = toast.querySelector(".text-1");
    const message = toast.querySelector(".text-2");
    const progress = toast.querySelector(".progress");

    toastWrapper.style.display = "block";

    if (type === "sukses") {
        toast.classList.add("active");
        header.innerText = headText;
        message.innerText = bodyText;
        progress.classList.add("active");
        toast.style.backgroundColor = "#d4edda";
        header.style.color = "#155724";
    } else if (type === "danger") {
        toast.classList.add("active");
        header.innerText = headText;
        message.innerText = bodyText;
        progress.classList.add("active");
        toast.style.backgroundColor = "#f8d7da";
        header.style.color = "#721c24";
    }

    setTimeout(() => {
        toast.classList.remove("active");
        progress.classList.remove("active");
        toastWrapper.style.display = "none";
    }, 3000);
}
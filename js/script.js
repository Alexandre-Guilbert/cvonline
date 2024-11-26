const burger = document.querySelector('.burger');
const navLinks = document.querySelector('.nav-links');

burger.addEventListener('click', () => {
    navLinks.classList.toggle('active');
});
let currentIndex = 0;

function updateCarousel() {
  const carousel = document.querySelector('.carousel');
  const items = document.querySelectorAll('.carousel-item');
  const totalItems = items.length;

  // Adjust the transform property to show the correct slide
  carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
}

function prevSlide() {
  const items = document.querySelectorAll('.carousel-item');
  currentIndex = (currentIndex - 1 + items.length) % items.length;
  updateCarousel();
}

function nextSlide() {
  const items = document.querySelectorAll('.carousel-item');
  currentIndex = (currentIndex + 1) % items.length;
  updateCarousel();
}

// Initialize the carousel
updateCarousel();

document.addEventListener("DOMContentLoaded", function() {
    var sections = document.querySelectorAll(".content-container");
    sections.forEach(function(section) {
        if (section.id !== "home") {
            section.style.display = "none";
        }
    });

    var navLinks = document.querySelectorAll("nav a");

    navLinks.forEach(function(navLink) {
        navLink.addEventListener("click", function(event) {
            if (this.getAttribute("href") !== "" && !this.getAttribute("href").startsWith("#")) {
                return;
            }

            event.preventDefault();
            var targetId = this.getAttribute("href").substring(1);
            var targetSection = document.getElementById(targetId);
            if (targetSection) {
                sections.forEach(function(section) {
                    if (section !== targetSection) {
                        section.style.display = "none";
                    }
                });

                targetSection.style.display = "block";

                setTimeout(function() {
                    targetSection.scrollIntoView({
                        behavior: "smooth",
                        block: "start"
                    });
                }, 100);
            }
        });
    });
});

//For Carousel//
const carousel = document.querySelector('.carousel-content');
const carouselItems = document.querySelectorAll('.carousel-item');
const totalItems = carouselItems.length;
let currentIndex = 0;

function nextSlide() {
    currentIndex = (currentIndex + 1) % totalItems;
    updateCarousel();
}

function updateCarousel() {
    const offset = -currentIndex * 100;
    carousel.style.transform = `translateX(${offset}%)`;
}

setInterval(nextSlide, 3000);

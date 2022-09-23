const slides = document.querySelectorAll(".slide");
const next = document.querySelector("#next");
const prev = document.querySelector("#prev");
const auto = false;
const intervalTime = 5000;
let slideInterval;

const styleToggler = (currentElement) => {
    currentElement.querySelector("h1").classList.toggle("scaleDownAnimation");
    currentElement
        .querySelector("button")
        .classList.toggle("scaleDownAnimationBtn");
    for (const p of currentElement.querySelectorAll("p")) {
        p.classList.toggle("scaleUpAnimation");
    }
};

const nextSlide = () => {
    const current = document.querySelector(".current");
    current.classList.remove("current");

    styleToggler(current);
    let nextElement = current.nextElementSibling;
    if (nextElement) {
        nextElement.classList.add("current");
    } else {
        nextElement = slides[0];
        slides[0].classList.add("current");
    }

    styleToggler(nextElement);
    setTimeout(() => current.classList.remove("current"));
};

const prevSlide = () => {
    const current = document.querySelector(".current");
    current.classList.remove("current");

    styleToggler(current);
    let prevElement = current.previousElementSibling;
    if (prevElement) {
        prevElement.classList.add("current");
    } else {
        prevElement = slides[slides.length - 1];
        prevElement.classList.add("current");
    }

    styleToggler(prevElement);
    setTimeout(() => current.classList.remove("current"));
};
next.addEventListener("click", () => {
    nextSlide();
    clearInterval(slideInterval);
    if (auto) {
        slideInterval = setInterval(nextSlide, intervalTime);
    }
});
prev.addEventListener("click", () => {
    prevSlide();
    clearInterval(slideInterval);
    if (auto) {
        slideInterval = setInterval(nextSlide, intervalTime);
    }
});

if (auto) {
    slideInterval = setInterval(nextSlide, intervalTime);
}

// Mobile nav

const menu = document.querySelector(".menu");
const moboDropdown = document.querySelector(".nav-mobo-dropdown");

menu.addEventListener("click", () => {
    moboDropdown.classList.toggle("nav-mobo-dropdown-active");
});

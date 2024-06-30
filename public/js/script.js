const imageUploader = document.getElementById("profile-picture");
const imagePreview = document.getElementById("pfp");

function showImage() {
    const file = imageUploader.files[0];
    imagePreview.classList.add("block");
    imagePreview.src = URL.createObjectURL(file);
}

const imgInput = document.getElementById("product-image");
const imgThumb = document.getElementById("product-img");

function showImagePrev() {
    const file = imgInput.files[0];
    imgThumb.classList.replace("hidden", "block");
    imgThumb.src = URL.createObjectURL(file);
}

// >> Landing Page Script
// Countdown Flash Sale
function startCountdown(duration, display) {
    let timer = duration,
        hours,
        minutes,
        seconds;
    setInterval(function () {
        hours = parseInt(timer / 3600, 10);
        minutes = parseInt((timer % 3600) / 60, 10);
        seconds = parseInt(timer % 60, 10);

        hours = hours < 10 ? "0" + hours : hours;
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display[0].textContent = hours;
        display[1].textContent = minutes;
        display[2].textContent = seconds;

        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
}

window.onload = function () {
    const countdownElements = document.querySelectorAll("#countdown div");
    const duration = 24 * 60 * 60; // 24 hours in seconds
    startCountdown(duration, countdownElements);
};

// Dropdown Login/Reg
function toggleDropdown(id) {
    const dropdownMenu = document.getElementById(id);
    dropdownMenu.classList.toggle("hidden");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function (event) {
    if (
        !event.target.closest(".flex") &&
        !event.target.closest(".dropdown-content")
    ) {
        const dropdowns = document.getElementsByClassName("absolute");
        for (let i = 0; i < dropdowns.length; i++) {
            const openDropdown = dropdowns[i];
            if (!openDropdown.classList.contains("hidden")) {
                openDropdown.classList.add("hidden");
            }
        }
    }
};

// Slider
let currentSlideId = 1;
const sliderElement = document.getElementById("slider");
const slides = sliderElement.getElementsByTagName("li");
const totalSlides = slides.length;

// Select all page control buttons
const pageControlButtons = document.querySelectorAll(
    '[data-testid^="spnPageControl"]'
);

// Add event listener to each page control button
pageControlButtons.forEach((button, index) => {
    button.addEventListener("click", () => {
        currentSlideId = index + 1; // Update current slide based on button index
        showSlide();
    });
});

function prev() {
    if (currentSlideId > 1) {
        currentSlideId--;
    } else {
        currentSlideId = totalSlides;
    }
    showSlide();
}

function next() {
    if (currentSlideId < totalSlides) {
        currentSlideId++;
    } else {
        currentSlideId = 1;
    }
    showSlide();
}

function showSlide() {
    // Calculate the new translateX value
    const newTransformValue = -((currentSlideId - 1) * 100) + "%";
    sliderElement.style.transform = `translateX(${newTransformValue})`;

    // Update aria-current attribute for page control buttons
    pageControlButtons.forEach((button, index) => {
        if (index === currentSlideId - 1) {
            button.setAttribute("aria-current", "true");
            button.classList.remove("bg-gray-200", "text-gray-800");
            button.classList.add("bg-blue-500", "text-white");
        } else {
            button.setAttribute("aria-current", "false");
            button.classList.remove("bg-blue-500", "text-white");
            button.classList.add("bg-gray-200", "text-gray-800");
        }
    });
}

// Automatically switch to the next slide every 5 seconds
setInterval(next, 5000);

// Initialize the slider by showing the first slide
showSlide();

// Fetch items from the API and initialize the page
// fetch("https://fakestoreapi.com/products")
//     .then((res) => res.json())
//     .then((json) => {
//         items = json.map((item) => ({
//             title: item.title,
//             price: `Rp ${item.price.toLocaleString()}0`,
//             location: "Jakarta Pusat",
//             img: item.image,
//         }));
//         renderItems();
//         updatePaginationButtons();
//     });

// pagination
let items = [];
let currentPage = 1;
let itemsPerPage = 10;

const cardsContainer = document.getElementById("cards-container");
const prevPageButton = document.getElementById("prevPage");
const nextPageButton = document.getElementById("nextPage");
const itemsLinks = document.querySelectorAll("[data-items]");

itemsLinks.forEach((link) => {
    link.addEventListener("click", (e) => {
        e.preventDefault();
        itemsPerPage = parseInt(link.getAttribute("data-items"));
        currentPage = 1;
        renderItems();
        updatePaginationButtons();
    });
});

prevPageButton.addEventListener("click", (e) => {
    e.preventDefault();
    if (currentPage > 1) {
        currentPage--;
        renderItems();
        updatePaginationButtons();
    }
});

nextPageButton.addEventListener("click", (e) => {
    e.preventDefault();
    if (currentPage < Math.ceil(items.length / itemsPerPage)) {
        currentPage++;
        renderItems();
        updatePaginationButtons();
    }
});

function renderItems() {
    cardsContainer.innerHTML = "";
    const start = (currentPage - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    const paginatedItems = items.slice(start, end);

    paginatedItems.forEach((item) => {
        const card = document.createElement("div");
        card.className = "bg-white p-4 rounded-lg shadow-sm";
        card.innerHTML = `
          <img src="${item.img}" alt="${item.title}" class="w-full h-32 md:h-52 object-cover rounded-md mb-4">
          <h2 class="text-sm md:text-lg font-semibold mb-2 line-clamp-2 leading-[1.3em] text-ellipsis h-[39px] md:h-[52px] overflow-hidden ">${item.title}</h2>
          <p class="text-gray-600 mb-2 text-sm">${item.price}</p>
          <p class="text-gray-500 mb-2 text-xs md:text-sm">${item.location}</p>
      `;
        cardsContainer.appendChild(card);
    });
}

function updatePaginationButtons() {
    if (currentPage === 1) {
        prevPageButton.classList.add("cursor-not-allowed", "opacity-50");
    } else {
        prevPageButton.classList.remove("cursor-not-allowed", "opacity-50");
    }

    if (currentPage === Math.ceil(items.length / itemsPerPage)) {
        nextPageButton.classList.add("cursor-not-allowed", "opacity-50");
    } else {
        nextPageButton.classList.remove("cursor-not-allowed", "opacity-50");
    }
}

// user profile
// Fungsi untuk membuka modal berdasarkan ID
function openModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.remove("hidden");
}

// Fungsi untuk menutup modal berdasarkan ID
function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.add("hidden");
}

// Detail Product - Description
function showDescription() {
    document.getElementById("description").classList.remove("hidden");
    document.getElementById("reviews").classList.add("hidden");
}

function showReviews() {
    document.getElementById("description").classList.add("hidden");
    document.getElementById("reviews").classList.remove("hidden");
}

// User Profile - Profile
function BioM() {
    document.getElementById("Biodata").classList.remove("hidden");
    document.getElementById("Alamat").classList.add("hidden");
}

function DafM() {
    document.getElementById("Biodata").classList.add("hidden");
    document.getElementById("Alamat").classList.remove("hidden");
}

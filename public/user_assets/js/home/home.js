$(document).ready(function () {
    //  animation on scroll down
    AOS.init();

    // here for owl carousel
    $(".owl-carousel").owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        autoplay: true,
        autoplayTimeout: 1500,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 3,
            },
            1000: {
                items: 4,
            },
        },
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const galleryImgs = document.querySelectorAll(".gallery-img");
    const fullscreen = document.querySelector(".fullscreen");
    const fullscreenImg = document.querySelector(".fullscreen-img");
    const closeBtn = document.querySelector(".close-btn");
    const prevBtn = document.querySelector(".prev");
    const nextBtn = document.querySelector(".next");
    let currentImgIndex;

    galleryImgs.forEach((img, index) => {
        img.addEventListener("click", function () {
            currentImgIndex = index;
            fullscreen.style.display = "flex";
            fullscreenImg.src = img.src;
        });
    });

    closeBtn.addEventListener("click", function () {
        fullscreen.style.display = "none";
    });

    prevBtn.addEventListener("click", function (event) {
        event.preventDefault();
        currentImgIndex =
            (currentImgIndex - 1 + galleryImgs.length) % galleryImgs.length;
        fullscreenImg.src = galleryImgs[currentImgIndex].src;
    });

    nextBtn.addEventListener("click", function (event) {
        event.preventDefault();
        currentImgIndex = (currentImgIndex + 1) % galleryImgs.length;
        fullscreenImg.src = galleryImgs[currentImgIndex].src;
    });
});

// JavaScript to enable Bootstrap form validation
// function enableFormValidation(formId) {
//     document
//         .getElementById(formId)
//         .addEventListener("submit", function (event) {
//             var form = event.target;
//             if (!form.checkValidity()) {
//                 event.preventDefault();
//                 event.stopPropagation();
//             }
//             form.classList.add("was-validated");
//         });
// }

// enableFormValidation("myForm");
// enableFormValidation("myForm-2");

// custom dropdown
function toggleOptionList() {
    var optionList = document.getElementById("optionList");
    if (
        optionList.style.display === "" ||
        optionList.style.display === "none"
    ) {
        optionList.style.display = "block";
    } else {
        optionList.style.display = "none";
    }
}

function selectOption(option) {
    var inputValue = option.innerText;
    document.getElementById("text").value = inputValue;
    document.getElementById("optionList").style.display = "none"; // Hide option list after selection
}



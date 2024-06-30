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
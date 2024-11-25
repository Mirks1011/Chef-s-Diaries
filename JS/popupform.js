document.addEventListener("DOMContentLoaded", function () {
    const showFormButton = document.querySelector("#show-form");
    const closeButton = document.querySelector(".close-btn");
    const popup = document.querySelector(".popup");
    const content = document.querySelector(".content");

    // Show the popup and blur background
    showFormButton.addEventListener("click", function () {
        popup.classList.add("active");
        content.classList.add("blurred");
    });

    // Close the popup and remove blur
    closeButton.addEventListener("click", function () {
        popup.classList.remove("active");
        content.classList.remove("blurred");
    });
});
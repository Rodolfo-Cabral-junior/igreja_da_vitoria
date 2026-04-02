document.addEventListener("DOMContentLoaded", () => {
    const socialButtons = document.querySelectorAll(".social-btn, .floating-social a");

    socialButtons.forEach((button) => {
        button.addEventListener("click", () => {
            const label = button.getAttribute("aria-label") || "social-button";
            console.log("Botão clicado:", label);
        });
    });
});

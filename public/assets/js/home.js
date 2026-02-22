const button = document.getElementById("action-btn");
const message = document.getElementById("message");

if (button && message) {
    button.addEventListener("click", () => {
        message.textContent = "JavaScript est bien connecte a la vue.";
    });
}

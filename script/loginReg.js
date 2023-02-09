let tabs = document.querySelectorAll(".tab-link:not(.desactive)");

tabs.forEach((tab) => {
    tab.addEventListener("click", () => {
        unSelectAll();
        tab.classList.add("active");
        let ref = tab.getAttribute("data-ref");
        document
            .querySelector(`.tab-body[data-id="${ref}"]`)
            .classList.add("active");
    });
});

function unSelectAll() {
    tabs.forEach((tab) => {
        tab.classList.remove("active");
    });
    let tabbodies = document.querySelectorAll(".tab-body");
    tabbodies.forEach((tab) => {
        tab.classList.remove("active");
    });
}

document.querySelector(".tab-link.active").click();

// Register form
let registerForm = document.querySelector("#register-form");
registerForm.addEventListener("submit", (e) => {
    e.preventDefault();
    let dataForm = new FormData(registerForm);
        fetch('connexion.php', {
            method: 'POST',
            body: dataForm
        })
            .then((response) => {
                console.log(response);
            });

});

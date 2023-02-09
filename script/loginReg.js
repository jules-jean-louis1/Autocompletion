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

registerForm.emailR.addEventListener("change" , function () {
    validEmail(this);
});
registerForm.passwordR.addEventListener("change" , function () {
    validPassword(this);
});
registerForm.c_passwordR.addEventListener("change" , function () {
    validPassword2(this);
});

const validEmail = (emailR) => {
    let small = emailR.nextElementSibling;
    let reg = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
    if (reg.test(emailR.value) == false) {
        small.innerHTML = "Email invalide";
        small.classList.add("is-invalid");
        small.classList.remove("is-valid");
        return false;
    } else {
        small.innerHTML = "Email valide";
        small.classList.add("is-valid");
        small.classList.remove("is-invalid");
        return true;
    }
}
const validPassword = (passwordR) => {
    let small = passwordR.nextElementSibling;
    let reg = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
    if (reg.test(passwordR.value) == false) {
        small.innerHTML = "Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule et un chiffre";
        small.classList.add("is-invalid");
        small.classList.remove("is-valid");
        return false;
    } else {
        small.innerHTML = "Mot de passe valide";
        small.classList.add("is-valid");
        small.classList.remove("is-invalid");
        return true;
    }
}
const  validPassword2 = (c_passwordR) => {
    let small = c_passwordR.nextElementSibling;
    let password = document.querySelector("#passwordR");
    if (c_passwordR.value !== password.value) {
        small.innerHTML = "Les mots de passe ne correspondent pas";
        small.classList.add("is-invalid");
        small.classList.remove("is-valid");
        return false;
    } else {
        small.innerHTML = "Mot de passe valide";
        small.classList.add("is-valid");
        small.classList.remove("is-invalid");
        return true;
    }
}
registerForm.addEventListener("submit", (e) => {
    e.preventDefault();
    let dataForm = new FormData(registerForm);
        fetch('connexion.php', {
            method: 'POST',
            body: dataForm
        })
            .then((response) => {
                if (response.status === 201) {
                    alert(response.statusText);
                }
            });

});

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
    if (validEmail(registerForm.emailR) && validPassword(registerForm.passwordR) && validPassword2(registerForm.c_passwordR)) {
        let dataForm = new FormData(registerForm);
        fetch('connexion.php', {
            method: 'POST',
            body: dataForm
        })
            .then((response) => {
                if (response.status === 201) {
                    let msg = document.querySelector("#msgCount");
                    msg.innerHTML = "Votre compte a bien été créé";
                    msg.classList.add("alert-success");
                    msg.classList.remove("alert-danger");
                }
            });
    } else {
        let msg = document.querySelector("#msgCount");
        msg.innerHTML = "Veuillez remplir correctement le formulaire";
        msg.classList.add("alert-danger");
        msg.classList.remove("alert-success");
    }
});

// Login form ###########################################################
const loginForm = document.querySelector('#LoginForm');
const emailInput = document.querySelector('#emailL');
const passwordInput = document.querySelector('#passwordL');
const messageContainer = document.querySelector('.flex.flex-col small');

// Ajouter un gestionnaire d'événement pour la soumission du formulaire
loginForm.addEventListener('submit', (event) => {
    event.preventDefault(); // Empêcher la soumission du formulaire par défaut

    // Récupérer les valeurs des champs d'entrée
    const email = emailInput.value;
    const password = passwordInput.value;
    // Effectuer une validation côté client (ex. vérification de la longueur, format de l'e-mail, etc.)
    // ...

    // Envoyer les données du formulaire au serveur via une requête AJAX avec fetch
    fetch('connexion.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `email=${email}&password=${password}`
    })
        .then(response => response.text())
        .then(result => {
            // Gérer la réponse du serveur (ex. afficher un message d'erreur ou de réussite)
            if (result === 'success') {
                messageContainer.textContent = 'Connecté avec succès.';
            } else {
                messageContainer.textContent = 'E-mail ou mot de passe incorrect.';
            }
        })
        .catch(error => {
            console.error('Une erreur s\'est produite lors de la requête.', error);
        });
});





//Lorsqu'un événement "input" est déclenché sur l'élément HTML avec l'ID "searchInput", la fonction getElement est appelée.
const search = document.querySelector("#searchInput");

search.addEventListener("input", getElement);
//La fonction getElement commence par récupérer la valeur actuelle de l'input en utilisant search.value.
async function getElement(event) {
    let query = search.value;
    console.log(query);
    let request = await fetch('process.php?query='+query)
        .then((response) => {
            console.log(response);
            return response.json();
        })
        .then((data) => {
            let results = document.querySelector("#results");
            results.innerHTML = "";
            for (const element of data) {
                let result = document.createElement("div");
                result.setAttribute("class", "result");
                result.innerHTML = element.book;
                result.addEventListener("click", (event) => {
                    search.value = element.book;
                    results.innerHTML = "";
                });
                results.appendChild(result);
            }
            if (query == "") {
                results.innerHTML = "";
            }
        });
}
/*
Ensuite, la fonction utilise fetch pour envoyer une requête GET à "process.php" avec le paramètre query défini par la valeur actuelle de l'input.

Lorsque la réponse est reçue, elle est parsée en JSON en utilisant response.json() et la boucle for...of itère sur les éléments de la réponse pour créer des éléments "div" avec la classe "result".

    Pour chaque élément "div", son contenu est défini en utilisant element.book et un événement "click" est ajouté pour définir la valeur de l'input sur le contenu lorsqu'il est cliqué.

    Finalement, les éléments "div" sont ajoutés au div avec l'ID "results". Si la valeur de l'input est vide, le contenu de "results" est effacé.*/

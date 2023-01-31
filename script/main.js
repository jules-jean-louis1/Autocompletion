const search = document.querySelector("#searchInput");

search.addEventListener("input", inputSearchBar);
async function inputSearchBar() {
    let query = search.value;
    console.log(query);
    let request = await fetch('recherche.php?search='+query)
        .then((response) => {
        return response.json();
    })
    .then((data) => {
        let result = document.querySelector("#result");
        result.innerHTML = "";
        for (const element of data) {
            let result = document.createElement("div");
            result.setAttribute("class", "result");
            result.innerHTML = element.title;
            result.addEventListener("click", (event) => {
                search.value = element.title;
                result.innerHTML = "";
            });
            result.append(result);
        }
        if (query == "") {
            result.innerHTML = "";
        }
    });

}



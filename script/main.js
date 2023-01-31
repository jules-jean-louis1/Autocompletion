const search = document.querySelector("#searchInput");

search.addEventListener("input", getElement);
async function getElement(event) {
    let query = search.value;
    console.log(query);
    await fetch('process.php?query='+query)
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
            result.innerHTML = element.title;
            result.addEventListener("click", (event) => {
                search.value = element.title;
                results.innerHTML = "";
            });
            result.append(result);
        }
        if (query == "") {
            results.innerHTML = "";
        }
    });

}



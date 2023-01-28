"use strict";
window.addEventListener("DOMContentLoaded", (event)=>
{
    let main = document.querySelector('body > main');
    let params = new URLSearchParams(document.location.search);
    let getParam = params.get("recherche");

    function generateInfoAtom(data)
    {
        let vowels = ['A','E','I','O','U','Y','H'];
        
        let connectName = vowels.includes(data.nom[0]) ? "d'"+data.nom : "de"+data.nom;

        let nameScientist = data.decouverte_noms==='' ? '' : " part "+data.decouverte_noms;


        if(data.decouverte_pays[data.decouverte_pays.length-1] === 'e')
        {
            countries = " en "+data.decouverte_pays;
        }
        else if(data.decouverte_pays[data.decouverte_pays.length-1] === 's')
        {
            countries = " aux "+data.decouverte_pays;
        }
        else if(data.decouverte_pays[data.decouverte_pays.length-1] != undefined)
        {
            countries = " au "+data.decouverte_pays;
        }
        else
        {
            countries = ''
        }

        if(data.decouverte_annee[0]==='~')
        {
           date = " vers "+data.decouverte_annee
        }
        else
        {
             date = data.decouverte_annee!='Antiquité' ? " dans les années "+data.decouverte_annee : " pendant l'"+data.decouverte_annee;
        }

        let info = `L'Atome ${connectName} a été découvert${date}${countries}${nameScientist}.`
        return info;
    }

    function generateResult(response)
    {
        let printSearch = document.getElementById('mainResult')
        let PrintAllResult = document.createElement('section');
        response.forEach(element => {

            //Creation du conteneur
            let articleResult = document.createElement('article');
            articleResult.className = 'vignette';

            //creation de la vignette
            let Vignette = document.createElement('div');
            


            let atomicNameVignette = document.createElement('SPAN');
            atomicNameVignette.innerHTML = element.nom;

            let atomicnumberVignette = document.createElement('SPAN');
            atomicnumberVignette.innerHTML = element.numero;

            let atomicSymbolVignette = document.createElement('SPAN');
            atomicSymbolVignette.innerHTML = element.symbole;

            Vignette.append(atomicNameVignette);
            Vignette.append(atomicSymbolVignette);
            Vignette.append(atomicnumberVignette)

            // ajout des information
            let Information = document.createElement('div')
            let nameAtome = document.createElement('h3');
            nameAtome.innerHTML = `<a href="element.php?id=${element.id}">${element.nom}</a>`;
            let infoAtome = document.createElement('p');
            infoAtome.innerHTML = generateInfoAtom(element)
            
            Information.append(nameAtome);
            Information.append(infoAtome);

            //insertion dans le conteneur parent
            articleResult.append(Vignette);
            articleResult.append(Information);
            PrintAllResult.append(articleResult);
        });
        printSearch.append(PrintAllResult);       
    }

    let value = JSON.stringify({"value":getParam})
    fetch('../controllers/searchpage.php',
            {
                header: {
                    'Charset': 'UTF-8'
                },
                method: 'POST',
                body: value
            })
            .then(function(response) {
                response.json().then(function(response){
                    
                    
                    if(response.begin.length != 0 || response.under.length != 0)
                    {
                        let numberResults = response.begin.length + response.under.length;

                        let printSearch = document.createElement('artcile')
                        printSearch.id = "mainResult"
                        let title = document.createElement('h1');
                        title.innerHTML = `Résultat de recherche pour : <b>${getParam}</b>`
                        let nbResult = document.createElement('p')
                        nbResult.innerHTML = `Nombre de resultat <i>${numberResults}</i>`
                        printSearch.append(title);
                        printSearch.append(nbResult);
                        main.append(printSearch)
                        
                        generateResult(response.begin)

                        let moreResultButton = document.createElement('button');
                        moreResultButton.innerHTML = '<i class="fa-solid fa-caret-down"></i> accèder à plus de résultat';
                        moreResultButton.id = 'buttonMoreResult'
                        main.append(moreResultButton)

                        moreResultButton.addEventListener('click', (event) =>{
                            generateResult(response.under)
                            main.removeChild(moreResultButton)
                    })
                    }
                    else{

                        let erreur = document.createElement('h3');
                        main.className = 'center'
                        erreur.innerHTML = 'Oups ! Aucun élément correspond à votre recherche'
                        main.append(erreur)
                    }
                })
            });
});
window.addEventListener("DOMContentLoaded", (event)=>
{
    let main = document.querySelector('body > main');
    let params = new URLSearchParams(document.location.search);
    let getParam = params.get("id");

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
        element = response[0]

            //Creation du conteneur
            let articleResult = document.createElement('section');
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
            nameAtome.innerHTML = element.nom;
            let infoAtome = document.createElement('p');
            infoAtome.innerHTML = generateInfoAtom(element)
            
            Information.append(nameAtome);
            Information.append(infoAtome);

            //insertion dans le conteneur parent
            articleResult.append(Vignette);
            articleResult.append(Information);
        
        return articleResult
        
    }

    function générateUl(response)
    {   
        let ulDesribe = document.createElement('ul')
        let tabValue = Object.values(response)
        let tabIndex = Object.keys(response);
        
        for (let index = 3; index < tabIndex.length; index++) {
            
            if(tabIndex[index].includes('decouverte') === false)
            {
                if(tabIndex[index].includes('_'))tabIndex[index] = tabIndex[index].replace('_', ' ');
                if(tabIndex[index].includes('_'))tabIndex[index] = tabIndex[index].replace('_', ' ');
                if(tabValue[index] === null) tabValue[index] = 'Inconnu(e)';
    
                liCase = document.createElement('li')
                liCase.innerHTML = `<span>${tabIndex[index]}</span> : ${tabValue[index]}`
                ulDesribe.append(liCase);
            }
            
        }

        return ulDesribe;
    }
    let value = JSON.stringify({"value":getParam})
    fetch('../controllers/elementpage.php',
            {
                header: {
                    'Charset': 'UTF-8'
                },
                method: 'POST',
                body: value
            })
            .then(function(response) {
                response.json().then(function(response){
                    
                    if(response[0] !== '404')
                    {
                        let printSearch = document.createElement('artcile')
                        printSearch.className = "mainElement"
                        let introduction = generateResult(response)
                        printSearch.append(introduction)


                        let infoElement = document.createElement('section')
                        let tabInfo = générateUl(response[0])
                        let titleDescribe = document.createElement('h3');
                        titleDescribe.innerHTML = 'Informations'


                        infoElement.append(titleDescribe)
                        infoElement.append(tabInfo)
                        printSearch.append(infoElement)
                        
                        main.append(printSearch)
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
window.addEventListener("DOMContentLoaded", (event)=>
{
    /**
     * Définition du concepte d'application de l'autocompletion sur la search bar
     * 1/ Le formulaire doit avoir une role définit comme "search"
     *      - Le formulaire ne comporte pas de submit ou de boutton
     *      - Le formulaire comporte un input type search
     * 2/ il doit comprendre un input search portant le nom "recherche"
     * 3/ Une div vide doit être placer directement en dessous de la bar de recherche
     * 
     *  /!\ Aucune Classe ni ID n'est à définir cependant pour l'accessibilité il peut être défini sur le container adjacent /!\
     */
    let inputSearch = document.querySelector('input[name = recherche]')
    let containeResultSearch = document.querySelector('#searchResult');
    let indexSelect =  -1;
    let interuptSearch = false
    
    /**
     * Change la casse en capitale du premier caractère sur une chène donnée
     * @param {*} a chaine de caractère
     * @returns la chaine de cractère donnée avec un capitale
     */
    function strUcFirst(a)
    {
        return (a+'').charAt(0).toUpperCase()+a.substr(1);
    }

    /**
     * Fonction spécifique
     * Créer une liste ordonnée des nom des atomes selon des data définies est l'insert dans un conteneur parent choisi
     * @param {*} data data sous forme json / Doit comporté le `nom` & `id` de l'élément
     * @param {string} position Défini le comportement le comportement de la casse selon sa position dans la recherche :
     *  - 'under'= 'le champ de recherche s'applique à l'interieur du nom'
     *  - 'begin'= 'le champ de recherche s'applique au début du nom'
     * @param {*} Kinship Défini le parent qui contiendra la liste des éléments
     */
     function creatNewListName(data, position, kinship)
     {
        ulResultSearch = document.createElement('ul')
        let icrementTab = 0;
        data.forEach(atome => {
            let li = document.createElement('li');


            li.innerHTML = atome.nom

            if(position === 'begin')
            {
                ulResultSearch.role="listbox"
                li.innerHTML = `<a href="element.php?id=${atome.id}">${li.innerHTML.replace(strUcFirst(inputSearch.value),'<span class="strBolder">'+strUcFirst(inputSearch.value)+'</span>')}</a>`
                let aChild = li.firstChild
                
            }
            else if(position === 'under')
            {
                li.innerHTML = `<a href="element.php?id=${atome.id}">${li.innerHTML.replace(inputSearch.value, '<span class="strBolder">'+inputSearch.value+'</span>')}</a>`
                
            }

            ulResultSearch.appendChild(li)
            icrementTab++;
            });

            kinship.appendChild(ulResultSearch);
     }

     /** Si la personne reprend la sourie on annule le comportement du clavier */
     inputSearch.addEventListener('click', (event)=>{
        indexSelect =  -1
        containeResultSearch.classList.remove('hidden')
        containeResultSearch.scrollTop = 0
    });

    /**
     * Si la personne utilise les flèches du clavier nous navigon dans l'autocompletion déjà charger
     */
     inputSearch.addEventListener('keydown', (event)=>{
        if(inputSearch.value.length >= 1)
        {
            
            let liNode = containeResultSearch.querySelectorAll('li');
            let indexwitness = indexSelect;

            function followingPositionLiSelected()
            {
                let posLi = liNode[indexSelect].offsetTop
                let sizeLi = liNode[indexSelect].clientHeight
                let sizeBox =containeResultSearch.clientHeight

                if(event.key === 'ArrowDown' && posLi+sizeLi >sizeBox)
                {
                    containeResultSearch.scrollTop = (posLi+sizeLi)-(sizeBox-5)
                }

                if(event.key === 'ArrowUp' && containeResultSearch.scrollTop > posLi)
                {
                    containeResultSearch.scrollTop = posLi
                }
            }
            
            if(event.key === 'ArrowDown')
            {
                if(indexwitness > -1)
                {
                    liNode[indexwitness].classList.remove('liOnFocus'); 
                }
                ++indexSelect;
                if(indexSelect >= liNode.length)
                {
                    indexSelect = 0;
                }
                liNode[indexSelect].classList.add('liOnFocus');

                followingPositionLiSelected()

                interuptSearch = true
                
            }
            else if(event.key === 'ArrowUp')
            {
                if(indexwitness > -1)
                {
                    liNode[indexwitness].classList.remove('liOnFocus'); 
                }
                --indexSelect;
                if(indexSelect >= 0)
                {
                liNode[indexSelect].classList.add('liOnFocus');

                followingPositionLiSelected()

                interuptSearch = true
                }
                else{
                    indexSelect = -1
                }
            }
            else if(event.key === 'Enter')
            {
                if(indexSelect > -1)
                {
                let newloc = liNode[indexSelect].firstChild.href
                window.location = newloc
                }
                else(
                    window.location.href = `/autocompletion/views/recherche.php?recherche=${inputSearch.value}`
                )
            }
            else{
                interuptSearch = false
                indexSelect =  -1;
            }     
        }
    })


    /**
     * Script de la barre de recherche
     * Donnée récupérer format JSON /valeur d'entrée Keypress caractère superieur à 1
     * JSON = 2 Objets retournées => Comprennant chacun deux attributs : nom, id
     *  - 'under'= 'le champ de recherche s'applique à l'interieur du nom'
     *  - 'begin'= 'le champ de recherche s'applique au début du nom'
     */
        inputSearch.addEventListener('keyup', (event) => {
            if(interuptSearch === false)
            {
                //Nettoyage des recherche précédente
                if(containeResultSearch.childNodes != null)
                {
                    let allHoldLi = containeResultSearch.querySelectorAll('ul');

                    allHoldLi.forEach(oldLi => {
                        oldLi.remove()
                    }); 
                }

                if(inputSearch.value.length >= 1)
                {
                    let value = JSON.stringify({"value":inputSearch.value})
                    
                    fetch('../controllers/searchBarre.php',
                    {
                        header: {
                            'Charset': 'UTF-8'
                        },
                        method: 'POST',
                        body: value
                    })
                    .then(function(response) {
                        response.json().then(function(response){
                            
                            creatNewListName(response.begin, 'begin', containeResultSearch)
                            creatNewListName(response.under, 'under', containeResultSearch)
                        })
                    });

                }
            }
        });

    
    inputSearch.addEventListener('focusout', (event)=>{
        setTimeout(() => {
            if(inputSearch.value.length > 0)
        {
        containeResultSearch.classList.add('hidden')
        }
        }, 100);
        
    })

    containeResultSearch.addEventListener("mouseover", function( event ) {
        let changefocus = containeResultSearch.querySelector('.liOnFocus')
        if(changefocus != null)
        {
            changefocus.classList.remove('liOnFocus')
        }
    });

});

// Créer le sélecteur personnalisé
var x, i, j, l, ll, selElmnt, a, b, c;
x = document.getElementsByClassName("custom-select");
l = x.length;

for (i = 0; i < l; i++) {
    selElmnt = x[i].getElementsByTagName("select")[0];
    ll = selElmnt.length;

    // Créer le DIV pour l'élément sélectionné
    a = document.createElement("DIV");
    a.setAttribute("class", "select-selected");
    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
    x[i].appendChild(a);

    // Créer le DIV pour la liste d'options
    b = document.createElement("DIV");
    b.setAttribute("class", "select-items select-hide");

    for (j = 1; j < ll; j++) {
        c = document.createElement("DIV");
        c.innerHTML = selElmnt.options[j].innerHTML;

        // Gestionnaire d'événements pour chaque option
        c.addEventListener("click", function(e) {
            var y, i, k, s, h, sl, yl;
            s = this.parentNode.parentNode.getElementsByTagName("select")[0];
            sl = s.length;
            h = this.parentNode.previousSibling;

            for (i = 0; i < sl; i++) {
                if (s.options[i].innerHTML == this.innerHTML) {
                    s.selectedIndex = i;
                    h.innerHTML = this.innerHTML;

                    // Déclencher l'événement 'change'
                    var event = new Event('change', {
                        bubbles: true,
                        cancelable: true
                    });
                    s.dispatchEvent(event);

                    // Mettre à jour les classes
                    y = this.parentNode.getElementsByClassName("same-as-selected");
                    yl = y.length;
                    for (k = 0; k < yl; k++) {
                        y[k].removeAttribute("class");
                    }
                    this.setAttribute("class", "same-as-selected");
                    break;
                }
            }
            h.click();
            // Click détecté sur un élément de menu
            
        });

        b.appendChild(c);
    }
    x[i].appendChild(b);

    // Gestionnaire d'événements pour l'élément sélectionné
    a.addEventListener("click", function(e) {
        e.stopPropagation();
        closeAllSelect(this);
        this.nextSibling.classList.toggle("select-hide");
        this.classList.toggle("select-arrow-active");
    });
}

// Fonction pour fermer tous les sélecteurs
function closeAllSelect(elmnt) {
    var x, y, i, xl, yl, arrNo = [];
    x = document.getElementsByClassName("select-items");
    y = document.getElementsByClassName("select-selected");
    xl = x.length;
    yl = y.length;

    for (i = 0; i < yl; i++) {
        if (elmnt == y[i]) {
            arrNo.push(i);
        } else {
            y[i].classList.remove("select-arrow-active");
        }
    }
    for (i = 0; i < xl; i++) {
        if (arrNo.indexOf(i)) {
            x[i].classList.add("select-hide");
        }
    }
}

// Écouter l'événement 'change' sur l'élément <select>
selElmnt.addEventListener('change', function() {
    var selectedValue = this.value; // Récupérer la valeur sélectionnée
    console.log("Valeur sélectionnée : ", selectedValue);

    /* // Effectuer votre requête AJAX ici
    fetch('votre-url-api', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ value: selectedValue }),
    })
    .then(response => response.json())
    .then(data => {
        console.log('Succès :', data);
    })
    .catch((error) => {
        console.error('Erreur :', error);
    }); */
});

// Si l'utilisateur clique en dehors du sélecteur, fermer tous les sélecteurs
document.addEventListener("click", closeAllSelect); 
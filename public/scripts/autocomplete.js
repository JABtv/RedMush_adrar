// Autocomplete ville avec API Geo Gouv (CORS OK)
(function() {
    const villeInput = document.getElementById('ville');
    const villeList = document.getElementById('ville-list');
    let timeout;


    // Récupération du champ code postal
    const cpInput = document.getElementById('code_postal');

    villeInput.addEventListener('input', function() {
        clearTimeout(timeout);
        const query = villeInput.value.trim();
        if (query.length < 2) {
            villeList.innerHTML = '';
            villeList.style.display = 'none';
            return;
        }
        timeout = setTimeout(() => {
            fetch('https://geo.api.gouv.fr/communes?nom=' + encodeURIComponent(query) + '&fields=nom,codesPostaux&boost=population&limit=5')
                .then(res => res.json())
                .then(data => {
                    villeList.innerHTML = '';
                    if (Array.isArray(data) && data.length > 0) {
                        data.forEach(ville => {
                            const li = document.createElement('li');
                            li.textContent = ville.nom + (ville.codesPostaux && ville.codesPostaux.length ? ' ('+ville.codesPostaux[0]+')' : '');
                            li.className = 'cursor-pointer p-2 hover:bg-gray-100';
                            li.onclick = () => {
                                villeInput.value = ville.nom;
                                if (ville.codesPostaux && ville.codesPostaux.length) {
                                    cpInput.value = ville.codesPostaux[0];
                                }
                                villeList.innerHTML = '';
                                villeList.style.display = 'none';
                            };
                            villeList.appendChild(li);
                        });
                        villeList.style.display = 'block';
                    } else {
                        villeList.style.display = 'none';
                    }
                })
                .catch(() => {
                    villeList.innerHTML = '';
                    villeList.style.display = 'none';
                });
        }, 300);
    });

    // Autocomplete code postal -> ville
    cpInput.addEventListener('input', function() {
        const cp = cpInput.value.trim();
        if (cp.length < 4) return;
        fetch('https://geo.api.gouv.fr/communes?codePostal=' + encodeURIComponent(cp) + '&fields=nom,codesPostaux&limit=1')
            .then(res => res.json())
            .then(data => {
                if (Array.isArray(data) && data.length > 0) {
                    villeInput.value = data[0].nom;
                }
            });
    });

    // Masquer la liste si clic ailleurs
    document.addEventListener('click', function(e) {
        if (!villeInput.contains(e.target) && !villeList.contains(e.target)) {
            villeList.innerHTML = '';
            villeList.style.display = 'none';
        }
    });
})();

// Autocomplete adresse avec API Adresse Data Gouv
(function() {
    const adresseInput = document.getElementById('adresse');
    const adresseList = document.getElementById('adresse-list');
    // Inputs pour la répartition
    const villeInput = document.getElementById('ville');
    const cpInput = document.getElementById('code_postal');
    let timeoutAdresse;
    if (!adresseInput || !adresseList) return;

    adresseInput.addEventListener('input', function() {
        clearTimeout(timeoutAdresse);
        const query = adresseInput.value.trim();
        if (query.length < 4) {
            adresseList.innerHTML = '';
            adresseList.style.display = 'none';
            return;
        }
        timeoutAdresse = setTimeout(() => {
            fetch('https://api-adresse.data.gouv.fr/search/?q=' + encodeURIComponent(query) + '&limit=5')
                .then(res => res.json())
                .then(data => {
                    adresseList.innerHTML = '';
                    if (data && data.features && data.features.length > 0) {
                        data.features.forEach(feature => {
                            const li = document.createElement('li');
                            li.textContent = feature.properties.label;
                            li.className = 'cursor-pointer p-2 hover:bg-gray-100';
                            li.onclick = () => {
                                // Remplir l'input adresse avec numéro + rue
                                adresseInput.value = (feature.properties.housenumber ? feature.properties.housenumber + ' ' : '') + (feature.properties.street || '');
                                // Remplir la ville et le code postal
                                if (villeInput && feature.properties.city) villeInput.value = feature.properties.city;
                                if (cpInput && feature.properties.postcode) cpInput.value = feature.properties.postcode;
                                adresseList.innerHTML = '';
                                adresseList.style.display = 'none';
                            };
                            adresseList.appendChild(li);
                        });
                        adresseList.style.display = 'block';
                    } else {
                        adresseList.style.display = 'none';
                    }
                })
                .catch(() => {
                    adresseList.innerHTML = '';
                    adresseList.style.display = 'none';
                });
        }, 300);
    });

    // Masquer la liste si clic ailleurs
    document.addEventListener('click', function(e) {
        if (!adresseInput.contains(e.target) && !adresseList.contains(e.target)) {
            adresseList.innerHTML = '';
            adresseList.style.display = 'none';
        }
    });
})();

// Préfixe automatique du téléphone selon le pays
document.addEventListener('DOMContentLoaded', function() {
    const paysSelect = document.getElementById('pays');
    const telInput = document.getElementById('telephone');
    if (!paysSelect || !telInput) return;
    const indicatifs = {
        FR: '+33',
        BE: '+32',
        CH: '+41',
        DZ: '+213',
        MA: '+212',
        TN: '+216'
    };
    paysSelect.addEventListener('change', function() {
        const val = paysSelect.value;
        telInput.value = indicatifs[val] ? indicatifs[val] + ' ' : '';
        telInput.focus();
    });
    // Si l'utilisateur change le pays après avoir saisi un numéro, on ne remplace que si le champ est vide ou commence par un indicatif
    telInput.addEventListener('focus', function() {
        const val = paysSelect.value;
        if (telInput.value === '' || telInput.value.startsWith('+')) {
            telInput.value = indicatifs[val] ? indicatifs[val] + ' ' : '';
        }
    });
});
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
document.addEventListener('DOMContentLoaded', function () {
    // Gestion des popovers
    const popovers = [
        { btn: 'btnUser', pop: 'btnUserPop' },
        { btn: 'btnPanier', pop: 'btnPanierPop', close: 'btnClosePanier' },
        { btn: 'btnSearch', pop: 'btnSearchPop' },
        { btn: 'btnMenu', pop: 'btnMenuPop', close: 'btnCloseMenu' }
    ];

    popovers.forEach(({ btn, pop, close }) => {
        const btnEl = document.getElementById(btn);
        const popEl = document.getElementById(pop);
        const closeEl = close ? document.getElementById(close) : null;
        if (btnEl && popEl) {
            btnEl.addEventListener('click', function (e) {
                e.stopPropagation();
                // Fermer tous les autres popovers
                popovers.forEach(({ pop: otherPop }) => {
                    if (otherPop !== pop) {
                        const otherEl = document.getElementById(otherPop);
                        if (otherEl) otherEl.classList.add('hidden');
                    }
                });
                // Ouvrir/fermer celui-ci
                popEl.classList.toggle('hidden');
            });
            // Masquer le popover si on clique ailleurs
            document.addEventListener('click', function (e) {
                if (!popEl.contains(e.target) && e.target !== btnEl) {
                    popEl.classList.add('hidden');
                }
            });
            if (closeEl) {
                closeEl.addEventListener('click', function (e) {
                    e.stopPropagation();
                    popEl.classList.add('hidden');
                });
            }
        }
    });
});


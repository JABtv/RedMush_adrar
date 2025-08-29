document.addEventListener('DOMContentLoaded', function () {
    // Popover USER
    const btnUser = document.getElementById('btnUser');
    const popoverUser = document.getElementById('btnUserPop');
    if (btnUser && popoverUser) {
        btnUser.addEventListener('click', function (e) {
            e.stopPropagation();
            popoverUser.classList.toggle('hidden');
        });
        // Masquer le popover si on clique ailleurs
        document.addEventListener('click', function (e) {
            if (!popoverUser.contains(e.target) && e.target !== btnUser) {
                popoverUser.classList.add('hidden');
            }
        });
    }
    // Tu peux dupliquer ce bloc pour PANIER, SEARCH, MENU
});
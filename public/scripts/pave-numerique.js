 // Pavé numérique virtuel pour code postal
    const cpInput = document.getElementById('code_postal');
    const pave = document.getElementById('pave-numerique');
    let paveTimeout;

    cpInput.addEventListener('focus', function() {
        clearTimeout(paveTimeout);
        const rect = cpInput.getBoundingClientRect();
        pave.style.top = (rect.bottom + window.scrollY + 5) + 'px';
        pave.style.left = (rect.left + window.scrollX) + 'px';
        pave.style.display = 'flex';
    });

    cpInput.addEventListener('blur', function() {
        paveTimeout = setTimeout(() => {
            pave.style.display = 'none';
        }, 200);
    });

    pave.addEventListener('mousedown', function(e) {
        e.preventDefault();
    });

    pave.addEventListener('click', function(e) {
        // Chiffres
        if (e.target.dataset && e.target.dataset.num !== undefined) {
            cpInput.value += e.target.dataset.num;
            cpInput.dispatchEvent(new Event('input'));
        }
        // Effacer (SVG ou bouton)
        if (e.target.closest('#pave-effacer')) {
            cpInput.value = cpInput.value.slice(0, -1);
            cpInput.dispatchEvent(new Event('input'));
        }
        // Fermer (SVG ou bouton)
        if (e.target.closest('#pave-fermer')) {
            pave.style.display = 'none';
            cpInput.blur();
        }
    });
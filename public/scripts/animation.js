// Animation du check toujours visible, boucle sur hover
document.addEventListener('DOMContentLoaded', function() {
    const fermerBtn = document.getElementById('pave-fermer');
    const checkGreen = document.getElementById('check-anim-green');
    const checkGray = document.getElementById('check-anim-gray');
    let interval;
    if (fermerBtn && checkGreen && checkGray) {
        // Toujours visible
        checkGreen.style.strokeDashoffset = 10;
        checkGray.style.strokeDashoffset = 24;

        fermerBtn.addEventListener('mouseenter', function() {
            // Animation une seule fois
            checkGreen.style.strokeDashoffset = 24;
            checkGray.style.strokeDashoffset = 10;
            setTimeout(() => {
                checkGreen.style.strokeDashoffset = 10;
                checkGray.style.strokeDashoffset = 24;
            }, 500);
        });
        fermerBtn.addEventListener('mouseleave', function() {
            checkGreen.style.strokeDashoffset = 10;
            checkGray.style.strokeDashoffset = 24;
        });
    }
});

// Animation du check toujours visible, boucle sur hover
document.addEventListener('DOMContentLoaded', function() {
    const fermerBtn = document.getElementById('pave-fermer');
    const checkGreen = document.getElementById('check-anim-green');
    const checkBlue = document.getElementById('check-anim-blue');
    let interval;
    if (fermerBtn && checkGreen && checkBlue) {
        // Toujours visible
        checkGreen.style.strokeDashoffset = 10;
        checkBlue.style.strokeDashoffset = 24;

        fermerBtn.addEventListener('mouseenter', function() {
            // Animation une seule fois
            checkGreen.style.strokeDashoffset = 24;
            checkBlue.style.strokeDashoffset = 10;
            setTimeout(() => {
                checkGreen.style.strokeDashoffset = 10;
                checkBlue.style.strokeDashoffset = 24;
            }, 500);
        });
        fermerBtn.addEventListener('mouseleave', function() {
            checkGreen.style.strokeDashoffset = 10;
            checkBlue.style.strokeDashoffset = 24;
        });
    }
});
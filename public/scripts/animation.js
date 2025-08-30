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
            // Démarre l'animation immédiatement
            checkGreen.style.strokeDashoffset = 24;
            checkGray.style.strokeDashoffset = 10;
            setTimeout(() => {
                checkGreen.style.strokeDashoffset = 10;
                checkGray.style.strokeDashoffset = 24;
            }, 500);
            interval = setInterval(() => {
                checkGreen.style.strokeDashoffset = 24;
                checkGray.style.strokeDashoffset = 10;
                setTimeout(() => {
                    checkGreen.style.strokeDashoffset = 10;
                    checkGray.style.strokeDashoffset = 24;
                }, 500);
            }, 1000);
        });
        fermerBtn.addEventListener('mouseleave', function() {
            clearInterval(interval);
            checkGreen.style.strokeDashoffset = 10;
            checkGray.style.strokeDashoffset = 24;
        });
    }
});

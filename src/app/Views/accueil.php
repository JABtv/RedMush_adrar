<main class="flex flex-col items-center justify-center min-h-[60vh] bg-[#f0f0f0] py-12">
    <h1 class="text-3xl font-bold mb-4">Bienvenue sur RedMush !</h1>
    <?php if (isset($_SESSION['user'])): ?>
        <p class="text-lg">Bonjour, <span class="font-semibold text-[#D71C10]"><?php echo htmlspecialchars($_SESSION['user']['first_name'] ?? $_SESSION['user']['name'] ?? ''); ?></span> !</p>
        <form action="/redmush/deconnexion" method="post" class="mt-6">
            <button type="submit" class="btn oswald bg-[#D71C10] text-white px-4 py-2 rounded">Se déconnecter</button>
        </form>
    <?php else: ?>
        <p class="text-lg">Connectez-vous ou inscrivez-vous pour profiter de toutes les fonctionnalités.</p>
    <?php endif; ?>
</main>

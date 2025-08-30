<main class="flex items-center justify-center bg-[#f0f0f0] min-h-screen">
    <form action="#" method="post" class="flex flex-col justify-center w-full lg:w-1/2 gap-4 p-6 bg-white shadow">
        <!-- Inputs E-mail -->
        <div class="flex flex-col">
            <label for="nom">E-mail</label>
            <input class="border-2 border-black p-0.5" type="text" name="E-mail" id="E-mail" placeholder="Votre E-mail" required>
        </div>

        <!-- Inputs Mot de Passe -->
        <div class="flex flex-col">
            <label for="mdp2">Mot De Passe</label>
            <input class="border-2 border-black p-0.5" type="password" name="mdp2" id="mdp2" placeholder="Votre Mot De Passe" required>
        </div>

        <div class="flex items-center gap-2">
            <input type="checkbox" name="remberme" id="remeberme">
            <label for="remeberme">Se souvenir de moi</label>
        </div>

        <button class="btn oswald" type="submit">CONNEXION</button>
    </form>
</main>
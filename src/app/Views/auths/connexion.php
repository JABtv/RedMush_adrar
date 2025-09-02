<main class="flex items-center justify-center my-6 bg-[#f0f0f0] py-33 noto-sans">
    <?php $errors = $_SESSION['errors'] ?? []; ?>
    <form action="#" method="post" class="flex flex-col justify-center w-full lg:w-1/2 gap-4 p-6 bg-white shadow">
        <!-- Inputs E-mail -->
        <div class="flex flex-col">
            <label for="user_login">E-mail</label>
            <input class="border-2 border-black p-0.5 focus:border-[#D71C10] focus:outline-none" type="text" name="user_login" id="user_login" placeholder="Votre E-mail" required value="<?php echo htmlspecialchars($_POST['user_login'] ?? '', ENT_QUOTES); ?>">
            <?php if (!empty($errors['login_user'])): ?>
                <div class="flex items-center gap-2 mt-1">
                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke="#D71C10"/><line x1="12" y1="8" x2="12" y2="12" stroke="#D71C10"/><circle cx="12" cy="16" r="1" fill="#D71C10"/></svg>
                    <span class="text-red-600 text-xs font-semibold">Veuillez renseigner votre email.</span>
                </div>
            <?php endif; ?>
            <?php if (!empty($errors['login_user_invalid'])): ?>
                <div class="flex items-center gap-2 mt-1">
                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke="#D71C10"/><line x1="12" y1="8" x2="12" y2="12" stroke="#D71C10"/><circle cx="12" cy="16" r="1" fill="#D71C10"/></svg>
                    <span class="text-red-600 text-xs font-semibold">Adresse email non valide.</span>
                </div>
            <?php endif; ?>
        </div>

        <!-- Inputs Mot de Passe -->
        <div class="flex flex-col">
            <label for="password">Mot De Passe</label>
            <input class="border-2 border-black p-0.5 focus:border-[#D71C10] focus:outline-none" type="password" name="password" id="password" placeholder="Votre Mot De Passe" required>
            <?php if (!empty($errors['password_user'])): ?>
                <div class="flex items-center gap-2 mt-1">
                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke="#D71C10"/><line x1="12" y1="8" x2="12" y2="12" stroke="#D71C10"/><circle cx="12" cy="16" r="1" fill="#D71C10"/></svg>
                    <span class="text-red-600 text-xs font-semibold">Veuillez renseigner votre mot de passe.</span>
                </div>
            <?php endif; ?>
        </div>

        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2">
                <input type="checkbox" name="remberme" id="remberme">
                <label for="remberme">Se souvenir de moi</label>
            </div>

            <div>
                <a href="./inscription" class=""> Pas de compte ? <span class="text-blue-700 underline">S'inscrire</span> </a>
            </div>
        </div>

        <?php if (!empty($errors['global'])): ?>
            <div class="text-red-600 text-sm mb-2 flex items-center gap-2 justify-center">
                <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke="#D71C10"/><line x1="12" y1="8" x2="12" y2="12" stroke="#D71C10"/><circle cx="12" cy="16" r="1" fill="#D71C10"/></svg>
                <span class="font-semibold">Identifiants incorrects.</span>
            </div>
        <?php endif; ?>

        <button class="btn oswald" type="submit">CONNEXION</button>
    </form>
</main>
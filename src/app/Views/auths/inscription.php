
<main class="flex items-center justify-center my-6 bg-[#f0f0f0] noto-sans">
    <form action="/redmush/inscription" method="post" class="flex flex-col justify-center w-full lg:w-1/2 gap-4 p-6 bg-white shadow">
        <?php $errors = $_SESSION['errors'] ?? []; ?>
    <!-- Inputs Nom -->
        <div class="flex flex-col">
            <label for="name_user">Nom</label>
            <input class="border-2 border-black p-0.5 focus:border-[#D71C10] focus:outline-none" type="text" name="name_user" id="name_user" placeholder="Votre Nom" value="<?php echo htmlspecialchars($_POST['name_user'] ?? '', ENT_QUOTES); ?>" >
            <?php if (!empty($errors['name_user'])): ?>
                <div class="flex items-center gap-2 mt-1 -mb-4">
                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke="#D71C10"/><line x1="12" y1="8" x2="12" y2="12" stroke="#D71C10"/><circle cx="12" cy="16" r="1" fill="#D71C10"/></svg>
                    <span class="text-red-600 text-xs font-semibold">Veuillez renseigner votre nom.</span>
                </div>
            <?php endif; ?>
        </div>
        <!-- Inputs Prenom -->
        <div class="flex flex-col">
            <label for="first_name_user">Prenom</label>
            <input class="border-2 border-black p-0.5 focus:border-[#D71C10] focus:outline-none" type="text" name="first_name_user" id="first_name_user" placeholder="Votre Prenom" value="<?php echo htmlspecialchars($_POST['first_name_user'] ?? '', ENT_QUOTES); ?>" >
            <?php if (!empty($errors['first_name_user'])): ?>
                <div class="flex items-center gap-2 mt-1 -mb-4">
                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke="#D71C10"/><line x1="12" y1="8" x2="12" y2="12" stroke="#D71C10"/><circle cx="12" cy="16" r="1" fill="#D71C10"/></svg>
                    <span class="text-red-600 text-xs font-semibold">Veuillez renseigner votre prénom.</span>
                </div>
            <?php endif; ?>
        </div>
        <!-- Inputs E-mail -->
        <div class="flex flex-col">
            <label for="login_user">E-mail</label>
            <input class="border-2 border-black p-0.5 focus:border-[#D71C10] focus:outline-none" type="text" name="login_user" id="login_user" placeholder="Votre E-mail" value="<?php echo htmlspecialchars($_POST['login_user'] ?? '', ENT_QUOTES); ?>" >
            <?php if (!empty($errors['login_user'])): ?>
                <div class="flex items-center gap-2 mt-1 -mb-4 -mb-4">
                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke="#D71C10"/><line x1="12" y1="8" x2="12" y2="12" stroke="#D71C10"/><circle cx="12" cy="16" r="1" fill="#D71C10"/></svg>
                    <span class="text-red-600 text-xs font-semibold"><?php echo ($errors['login_user'] === 'Cet email est déjà utilisé') ? 'Cet email est déjà utilisé.' : 'Veuillez renseigner une adresse email valide.'; ?></span>
                </div>
            <?php endif; ?>
        </div>
        <!-- Inputs Mot de Passe -->
        <div class="flex flex-col">
            <label for="password_user">Mot De Passe</label>
            <input class="border-2 border-black p-0.5 focus:border-[#D71C10] focus:outline-none" type="password" name="password_user" id="password_user" placeholder="Votre Mot De Passe" >
            <?php if (!empty($errors['password_user'])): ?>
                <div class="flex items-center gap-2 mt-1 -mb-4">
                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke="#D71C10"/><line x1="12" y1="8" x2="12" y2="12" stroke="#D71C10"/><circle cx="12" cy="16" r="1" fill="#D71C10"/></svg>
                    <span class="text-red-600 text-xs font-semibold">Mot de passe trop court (min. 8 caractères).</span>
                </div>
            <?php endif; ?>
        </div>
        <!-- Inputs Confirmer Mot de Passe -->
        <div class="flex flex-col">
            <label for="password_user2">Confirmer le Mot De Passe</label>
            <input class="border-2 border-black p-0.5 focus:border-[#D71C10] focus:outline-none" type="password" name="password_user2" id="password_user2" placeholder="Confirmation du Mot De Passe" >
            <?php if (!empty($errors['password_user2'])): ?>
                <div class="flex items-center gap-2 mt-1 -mb-4">
                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke="#D71C10"/><line x1="12" y1="8" x2="12" y2="12" stroke="#D71C10"/><circle cx="12" cy="16" r="1" fill="#D71C10"/></svg>
                    <span class="text-red-600 text-xs font-semibold">Les mots de passe ne sont pas identiques.</span>
                </div>
            <?php endif; ?>
        </div>

        <div class="flex flex-col">
            <label for="adresse">Adresse</label>
            <input class="border-2 border-black p-0.5 focus:border-[#D71C10] focus:outline-none" type="text" name="adresse" id="adresse" placeholder="Votre Adresse" autocomplete="off" value="<?php echo htmlspecialchars($_POST['adresse'] ?? '', ENT_QUOTES); ?>">
            <ul id="adresse-list" class="bg-white border border-gray-300 shadow absolute z-10 hidden"></ul>
            <?php if (!empty($errors['adresse'])): ?>
                <div class="flex items-center gap-2 mt-1 -mb-4">
                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke="#D71C10"/><line x1="12" y1="8" x2="12" y2="12" stroke="#D71C10"/><circle cx="12" cy="16" r="1" fill="#D71C10"/></svg>
                    <span class="text-red-600 text-xs font-semibold">Veuillez renseigner votre adresse.</span>
                </div>
            <?php endif; ?>
        </div>

        <div class="flex flex-col">
            <label for="ville">Ville</label>
            <input class="border-2 border-black p-0.5 focus:border-[#D71C10] focus:outline-none" type="text" name="ville" id="ville" placeholder="Votre Ville"  autocomplete="off" value="<?php echo htmlspecialchars($_POST['ville'] ?? '', ENT_QUOTES); ?>">
            <?php if (!empty($errors['ville'])): ?>
                <div class="flex items-center gap-2 mt-1 -mb-4">
                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke="#D71C10"/><line x1="12" y1="8" x2="12" y2="12" stroke="#D71C10"/><circle cx="12" cy="16" r="1" fill="#D71C10"/></svg>
                    <span class="text-red-600 text-xs font-semibold">Veuillez renseigner votre ville.</span>
                </div>
            <?php endif; ?>
            <ul id="ville-list" class="bg-white border border-gray-300 shadow absolute z-10 hidden"></ul>
        </div>
 
        <div class="lg:flex justify-between gap-2">
            <div class="flex flex-col">
                <label for="code_postal">Code Postal</label>
                <input class="border-2 border-black p-0.5 focus:border-[#D71C10] focus:outline-none no-spinners" type="number" name="code_postal" id="code_postal" placeholder="Votre Code Postal"  autocomplete="off" value="<?php echo htmlspecialchars($_POST['code_postal'] ?? '', ENT_QUOTES); ?>">
                <?php if (!empty($errors['code_postal'])): ?>
                    <div class="flex items-center gap-2 mt-1 -mb-4">
                        <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke="#D71C10"/><line x1="12" y1="8" x2="12" y2="12" stroke="#D71C10"/><circle cx="12" cy="16" r="1" fill="#D71C10"/></svg>
                        <span class="text-red-600 text-xs font-semibold">Veuillez renseigner votre code postal.</span>
                    </div>
                <?php endif; ?>
                <div id="pave-numerique" class="absolute bg-white border-2 border-black shadow p-2 flex flex-col gap-2 z-20 hidden" style="width:180px;">
                    <div class="grid grid-cols-3 gap-2 mb-2">
                        <button type="button" class="p-2 border-2 border-black hover:border-[#D71C10] focus:border-[#D71C10] focus:outline-none" data-num="1">1</button>
                        <button type="button" class="p-2 border-2 border-black hover:border-[#D71C10] focus:border-[#D71C10] focus:outline-none" data-num="2">2</button>
                        <button type="button" class="p-2 border-2 border-black hover:border-[#D71C10] focus:border-[#D71C10] focus:outline-none" data-num="3">3</button>
                        <button type="button" class="p-2 border-2 border-black hover:border-[#D71C10] focus:border-[#D71C10] focus:outline-none" data-num="4">4</button>
                        <button type="button" class="p-2 border-2 border-black hover:border-[#D71C10] focus:border-[#D71C10] focus:outline-none" data-num="5">5</button>
                        <button type="button" class="p-2 border-2 border-black hover:border-[#D71C10] focus:border-[#D71C10] focus:outline-none" data-num="6">6</button>
                        <button type="button" class="p-2 border-2 border-black hover:border-[#D71C10] focus:border-[#D71C10] focus:outline-none" data-num="7">7</button>
                        <button type="button" class="p-2 border-2 border-black hover:border-[#D71C10] focus:border-[#D71C10] focus:outline-none" data-num="8">8</button>
                        <button type="button" class="p-2 border-2 border-black hover:border-[#D71C10] focus:border-[#D71C10] focus:outline-none" data-num="9">9</button>
                    </div>
                    <div class="flex flex-row gap-2">
                        <button type="button" class="p-2 flex-1 border-2 border-black hover:border-[#D71C10]" data-num="0">0</button>
                        <button type="button" class="p-2 flex-1 border-2 border-black hover:border-[#D71C10] flex items-center justify-center group" id="pave-effacer" aria-label="Effacer">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <line x1="18" y1="12" x2="6" y2="12" stroke="#D71C10" stroke-width="2" stroke-linecap="round"/>
                                    <polygon points="8,8 8,16 4,12" fill="#D71C10" />
                                </g>
                            </svg>
                        </button>
                        <button type="button" class="p-2 flex-1 border-2 border-black hover:border-[#D71C10] flex items-center justify-center group" id="pave-fermer" aria-label="Valider">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path id="check-anim-green" d="M6 12L10 16L18 8" stroke="#22c55e" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" style="stroke-dasharray:24;stroke-dashoffset:10;transition:stroke-dashoffset 0.4s;"/>
                                <path id="check-anim-blue" d="M6 12L10 16L18 8" stroke="#2563eb" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" style="stroke-dasharray:24;stroke-dashoffset:24;transition:stroke-dashoffset 0.4s;"/>
                            </svg>
                        </button>
                        <script>
                        
                        </script>
                    </div>
                </div>
            </div>

            <div class="flex">
                <div class="flex flex-col">
                    <label for="pays">Pays</label>
                    <select class="border-2 border-black p-0.5 lg:h-full focus:border-[#D71C10] focus:outline-none" name="pays" id="pays" >
                        <option value="FR" <?php echo (($_POST['pays'] ?? '') === 'FR') ? 'selected' : ''; ?>>🇫🇷</option>
                        <option value="BE" <?php echo (($_POST['pays'] ?? '') === 'BE') ? 'selected' : ''; ?>>🇧🇪</option>
                        <option value="CH" <?php echo (($_POST['pays'] ?? '') === 'CH') ? 'selected' : ''; ?>>🇨🇭</option>
                        <option value="MA" <?php echo (($_POST['pays'] ?? '') === 'MA') ? 'selected' : ''; ?>>🇲🇦</option>
                        <option value="DZ" <?php echo (($_POST['pays'] ?? '') === 'DZ') ? 'selected' : ''; ?>>🇩🇿</option>
                        <option value="TN" <?php echo (($_POST['pays'] ?? '') === 'TN') ? 'selected' : ''; ?>>🇹🇳</option>
                        <!-- Ajoutez d'autres pays si besoin -->
                    </select>
                </div>
            </div>
                <div class="flex flex-col flex-1">
                    <label for="telephone">Téléphone</label>
                    <input class="border-2 border-black p-0.5 w-full focus:border-[#D71C10] focus:outline-none" type="tel" name="telephone" id="telephone" placeholder="Votre Téléphone" autocomplete="off" value="<?php echo htmlspecialchars($_POST['telephone'] ?? '', ENT_QUOTES); ?>">
                </div>
            </div>
        </div>

        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2">
                <input type="checkbox" name="condition" id="condition">
                <label for="condition">J'accepte le <a href="./condition" class="text-blue-700 underline">condition d'utilisation</a></label>
            </div>

            <div>
                <a href="./connexion" "> Déjà un compte ? <span class="text-blue-700 underline">Se connecter</span></span> </a>
            </div>
        </div>

        <?php if (!empty($errors['global'])): ?>
            <div class="text-red-600 text-sm mb-2"><?php echo $errors['global']; ?></div>
        <?php endif; ?>
        <button class="btn oswald" type="submit">S'inscrire</button>
    </form>
    <script src="/redmush/public/scripts/autocomplete.js" defer></script>
    <script src="/redmush/public/scripts/animation.js" defer></script>
    <script src="/redmush/public/scripts/pave-numerique.js" defer></script>
    
</main>

<?php unset($_SESSION['errors']); ?>
<main class="flex items-center justify-center my-6 bg-[#f0f0f0]">
    <?php if (!empty($errors)) { echo '<pre style="color:red;">'; print_r($errors); echo '</pre>'; } ?>
    <form action="/redmush/src/app/Models/auths/model_inscription.php" method="post" class="flex flex-col justify-center w-full lg:w-1/2 gap-4 p-6 bg-white shadow">
        <?php $errors = $_SESSION['errors'] ?? []; ?>
    <!-- Inputs Nom -->
        <div class="flex flex-col">
            <label for="name_user">Nom</label>
            <input class="border-2 border-black p-0.5" type="text" name="name_user" id="name_user" placeholder="Votre Nom" >
            <?php if (!empty($errors['name_user'])): ?>
                <span class="text-red-600 text-sm mt-1"><?php echo $errors['name_user']; ?></span>
            <?php endif; ?>
        </div>
        <!-- Inputs Prenom -->
        <div class="flex flex-col">
            <label for="first_name_user">Prenom</label>
            <input class="border-2 border-black p-0.5" type="text" name="first_name_user" id="first_name_user" placeholder="Votre Prenom" >
            <?php if (!empty($errors['first_name_user'])): ?>
                <span class="text-red-600 text-sm mt-1"><?php echo $errors['first_name_user']; ?></span>
            <?php endif; ?>
        </div>
        <!-- Inputs E-mail -->
        <div class="flex flex-col">
            <label for="login_user">E-mail</label>
            <input class="border-2 border-black p-0.5" type="text" name="login_user" id="login_user" placeholder="Votre E-mail" >
            <?php if (!empty($errors['login_user'])): ?>
                <span class="text-red-600 text-sm mt-1"><?php echo $errors['login_user']; ?></span>
            <?php endif; ?>
        </div>
        <!-- Inputs Mot de Passe -->
        <div class="flex flex-col">
            <label for="password_user">Mot De Passe</label>
            <input class="border-2 border-black p-0.5" type="password" name="password_user" id="password_user" placeholder="Votre Mot De Passe" >
            <?php if (!empty($errors['password_user'])): ?>
                <span class="text-red-600 text-sm mt-1"><?php echo $errors['password_user']; ?></span>
            <?php endif; ?>
        </div>
        <!-- Inputs Confirmer Mot de Passe -->
        <div class="flex flex-col">
            <label for="password_user2">Confirmer le Mot De Passe</label>
            <input class="border-2 border-black p-0.5" type="password" name="password_user2" id="password_user2" placeholder="Confirmation du Mot De Passe" >
            <?php if (!empty($errors['password_user2'])): ?>
                <span class="text-red-600 text-sm mt-1"><?php echo $errors['password_user2']; ?></span>
            <?php endif; ?>
        </div>

        <div class="flex flex-col">
            <label for="adresse">Adresse</label>
            <input class="border-2 border-black p-0.5" type="text" name="adresse" id="adresse" placeholder="Votre Adresse" >
            <?php if (!empty($errors['adresse'])): ?>
                <span class="text-red-600 text-sm mt-1"><?php echo $errors['adresse']; ?></span>
            <?php endif; ?>
        </div>

        <div class="flex flex-col">
            <label for="ville">Ville</label>
            <input class="border-2 border-black p-0.5" type="text" name="ville" id="ville" placeholder="Votre Ville"  autocomplete="off">
            <?php if (!empty($errors['ville'])): ?>
                <span class="text-red-600 text-sm mt-1"><?php echo $errors['ville']; ?></span>
            <?php endif; ?>
            <ul id="ville-list" class="bg-white border border-gray-300 shadow absolute z-10 hidden"></ul>
        </div>
 
        <div class="flex justify-between gap-2">
            <div class="flex flex-col">
                <label for="code_postal">Code Postal</label>
                <input class="border-2 border-black p-0.5" type="number" name="code_postal" id="code_postal" placeholder="Votre Code Postal"  autocomplete="off">
                <?php if (!empty($errors['code_postal'])): ?>
                    <span class="text-red-600 text-sm mt-1"><?php echo $errors['code_postal']; ?></span>
                <?php endif; ?>
                <div id="pave-numerique" class="absolute bg-white border-2 border-black shadow p-2 flex flex-col gap-2 z-20 hidden" style="width:180px;">
                    <div class="grid grid-cols-3 gap-2 mb-2">
                        <button type="button" class="p-2 border-2 border-black" data-num="1">1</button>
                        <button type="button" class="p-2 border-2 border-black" data-num="2">2</button>
                        <button type="button" class="p-2 border-2 border-black" data-num="3">3</button>
                        <button type="button" class="p-2 border-2 border-black" data-num="4">4</button>
                        <button type="button" class="p-2 border-2 border-black" data-num="5">5</button>
                        <button type="button" class="p-2 border-2 border-black" data-num="6">6</button>
                        <button type="button" class="p-2 border-2 border-black" data-num="7">7</button>
                        <button type="button" class="p-2 border-2 border-black" data-num="8">8</button>
                        <button type="button" class="p-2 border-2 border-black" data-num="9">9</button>
                    </div>
                    <div class="flex flex-row gap-2">
                        <button type="button" class="p-2 flex-1 border-2 border-black" data-num="0">0</button>
                        <button type="button" class="p-2 flex-1 border-2 border-black flex items-center justify-center group" id="pave-effacer" aria-label="Effacer">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <line x1="18" y1="12" x2="6" y2="12" stroke="#D71C10" stroke-width="2" stroke-linecap="round"/>
                                    <polygon points="8,8 8,16 4,12" fill="#D71C10" />
                                </g>
                            </svg>
                        </button>
                        <button type="button" class="p-2 flex-1 border-2 border-black flex items-center justify-center group" id="pave-fermer" aria-label="Valider">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path id="check-anim-green" d="M6 12L10 16L18 8" stroke="#22c55e" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" style="stroke-dasharray:24;stroke-dashoffset:10;transition:stroke-dashoffset 0.4s;"/>
                                <path id="check-anim-gray" d="M6 12L10 16L18 8" stroke="#2563eb" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" style="stroke-dasharray:24;stroke-dashoffset:24;transition:stroke-dashoffset 0.4s;"/>
                            </svg>
                        </button>
                        <script>
                        
                        </script>
                    </div>
                </div>
            </div>

            <div class="flex w-full">
                <div class="flex flex-col">
                <label for="pays">Pays</label>
                <select class="border-2 border-black p-0.5 h-full" name="pays" id="pays" >
                    <option value="FR">🇫🇷</option>
                    <option value="BE">🇧🇪</option>
                    <option value="CH">🇨🇭</option>
                    <option value="DZ">🇩🇿</option>
                    <option value="MA">🇲🇦</option>
                    <option value="TN">🇹🇳</option>
                    <!-- Ajoutez d'autres pays si besoin -->
                </select>
            </div>
                <div class="flex flex-col flex-1">
                    <label for="telephone">Téléphone</label>
                    <input class="border-2 border-black p-0.5 w-full" type="tel" name="telephone" id="telephone" placeholder="Votre Téléphone" >
                </div>
            </div>
        </div>

        <div>
            <label for=""></label>
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
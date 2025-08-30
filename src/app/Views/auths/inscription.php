<main class="flex items-center justify-center my-6 bg-[#f0f0f0]">
    <form action="#" method="post" class="flex flex-col justify-center w-full lg:w-1/2 gap-4 p-6 bg-white rounded shadow">
        <!-- Inputs Nom -->
        <div class="flex flex-col">
            <label for="nom">Nom</label>
            <input class="border-2 border-black p-0.5" type="text" name="nom" id="nom" placeholder="Votre Nom" required>
        </div>
        <!-- Inputs Prenom -->
        <div class="flex flex-col">
            <label for="nom">Prenom</label>
            <input class="border-2 border-black p-0.5" type="text" name="prenom" id="prenom" placeholder="Votre Prenom" required>
        </div>

        <div class="flex flex-col">
            <label for="nom">E-mail</label>
            <input class="border-2 border-black p-0.5" type="text" name="E-mail" id="E-mail" placeholder="Votre E-mail" required>
        </div>
        <!-- Inputs Mot de Passe -->
        <div class="flex flex-col">
            <label for="mdp2">Mot De Passe</label>
            <input class="border-2 border-black p-0.5" type="password" name="mdp2" id="mdp2" placeholder="Votre Mot De Passe" required>
        </div>
        <!-- Inputs Confirmer Mot de Passe -->
        <div class="flex flex-col">
            <label for="mdp2">Confirmer le Mot De Passe</label>
            <input class="border-2 border-black p-0.5" type="password" name="mdp2" id="mdp2" placeholder="Confirmation du Mot De Passe" required>
        </div>

        <div class="flex flex-col">
            <label for="adresse">Adresse</label>
            <input class="border-2 border-black p-0.5" type="text" name="adresse" id="adresse" placeholder="Votre Adresse" required>
        </div>

        <div class="flex flex-col">
            <label for="ville">Ville</label>
            <input class="border-2 border-black p-0.5" type="text" name="ville" id="ville" placeholder="Votre Ville" required autocomplete="off">
            <ul id="ville-list" class="bg-white border border-gray-300 shadow absolute z-10 hidden"></ul>
        </div>

        <div class="flex justify-between gap-2">
            <div class="flex flex-col">
                <label for="code_postal">Code Postal</label>
                <input class="border-2 border-black p-0.5" type="number" name="code_postal" id="code_postal" placeholder="Votre Code Postal" required autocomplete="off">
                <div id="pave-numerique" class="absolute bg-white border border-gray-300 shadow p-2 flex flex-col gap-2 z-20 hidden" style="width:180px;">
                    <div class="grid grid-cols-3 gap-2 mb-2">
                        <button type="button" class="p-2 border border-gray-300" data-num="1">1</button>
                        <button type="button" class="p-2 border border-gray-300" data-num="2">2</button>
                        <button type="button" class="p-2 border border-gray-300" data-num="3">3</button>
                        <button type="button" class="p-2 border border-gray-300" data-num="4">4</button>
                        <button type="button" class="p-2 border border-gray-300" data-num="5">5</button>
                        <button type="button" class="p-2 border border-gray-300" data-num="6">6</button>
                        <button type="button" class="p-2 border border-gray-300" data-num="7">7</button>
                        <button type="button" class="p-2 border border-gray-300" data-num="8">8</button>
                        <button type="button" class="p-2 border border-gray-300" data-num="9">9</button>
                    </div>
                    <div class="flex flex-row gap-2">
                        <button type="button" class="p-2 flex-1 border border-gray-300" data-num="0">0</button>
                        <button type="button" class="p-2 flex-1 border border-gray-300 flex items-center justify-center group" id="pave-effacer" aria-label="Effacer">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <line x1="18" y1="12" x2="6" y2="12" stroke="#ef4444" stroke-width="2" stroke-linecap="round"/>
                                    <polygon points="8,8 8,16 4,12" fill="#ef4444" />
                                </g>
                            </svg>
                        </button>
                        <button type="button" class="p-2 flex-1 border border-gray-300 flex items-center justify-center group" id="pave-fermer" aria-label="Valider">
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
                <select class="border-2 border-black p-0.5 h-full" name="pays" id="pays" required>
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
                    <input class="border-2 border-black p-0.5 w-full" type="tel" name="telephone" id="telephone" placeholder="Votre Téléphone" required>
                </div>
            </div>
        </div>

        <button class="btn oswald" type="submit">S'inscrire</button>
    </form>
    <script src="/redmush/public/scripts/autocomplete.js" defer></script>
    <script src="/redmush/public/scripts/animation.js" defer></script>
    <script src="/redmush/public/scripts/pave-numerique.js" defer></script>
    
</main>
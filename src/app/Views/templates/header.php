<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?></title>
        <!-- Link Favicon -->
        <link rel="apple-touch-icon" sizes="57x57" href="public/assets/images/favicons/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="public/assets/images/favicons/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="public/assets/images/favicons/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="public/assets/images/favicons/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="public/assets/images/favicons/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="public/assets/images/favicons/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="public/assets/images/favicons/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="public/assets/images/favicons/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="public/assets/images/favicons/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="public/assets/images/favicons/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="public/assets/images/favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="public/assets/images/favicons/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="public/assets/images/favicons/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <!-- Link Tailwind -->
        <link rel="stylesheet" href="/redmush/public/styles/app.css">

        <!-- Link font Google -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Oswald:wght@200..700&display=swap" rel="stylesheet">

        <!-- Link Scrips Perso. -->
        <script src="public\scripts\popover.js" defer></script>
    </head>
    <body>
    <header class="flex flex-col w-full  sticky top-0 z-50 bg-white">
        <p class="flex items-center justify-center oswald bg-amber-400">/!\ SITE FACTIF /!\</p>
        <p class="flex items-center justify-center oswald bg-black text-white">FRAIS DE PORT OFFERT DES 80€</p>
        <nav class="flex flex-row justify-between items-center px-4">

            
            <section class="flex gap-4">
                <!-- Btn USER -->
                <button id="btnUser" popovertarget="btnUser">
                    <svg xmlns="http://www.w3.org/2000/svg" height="32px" viewBox="0 -960 960 960" width="32px" fill="#000000"><path d="M234-276q51-39 114-61.5T480-360q69 0 132 22.5T726-276q35-41 54.5-93T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 59 19.5 111t54.5 93Zm246-164q-59 0-99.5-40.5T340-580q0-59 40.5-99.5T480-720q59 0 99.5 40.5T620-580q0 59-40.5 99.5T480-440Zm0 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q53 0 100-15.5t86-44.5q-39-29-86-44.5T480-280q-53 0-100 15.5T294-220q39 29 86 44.5T480-160Zm0-360q26 0 43-17t17-43q0-26-17-43t-43-17q-26 0-43 17t-17 43q0 26 17 43t43 17Zm0-60Zm0 360Z"/></svg>
                </button>

                <div class="border border-black flex fixed hidden justify-center items-center w-1/5 h-1/3 top-26 gap-4" id="btnUserPop" popover>
                    <button class="btn oswald">Connexion</button>
                    <button class="btn oswald">Inscription</button>
                </div>

                <button id="btnPanier" popovertarget="btnPanier">
                    <svg xmlns="http://www.w3.org/2000/svg" height="32px" viewBox="0 -960 960 960" width="32px" fill="#000000"><path d="M240-80q-33 0-56.5-23.5T160-160v-480q0-33 23.5-56.5T240-720h80q0-66 47-113t113-47q66 0 113 47t47 113h80q33 0 56.5 23.5T800-640v480q0 33-23.5 56.5T720-80H240Zm0-80h480v-480h-80v80q0 17-11.5 28.5T600-520q-17 0-28.5-11.5T560-560v-80H400v80q0 17-11.5 28.5T360-520q-17 0-28.5-11.5T320-560v-80h-80v480Zm160-560h160q0-33-23.5-56.5T480-800q-33 0-56.5 23.5T400-720ZM240-160v-480 480Z"/></svg>
                </button>

                <!-- Btn PANIER -->
                <section class="border border-black flex hidden flex-col fixed h-full p-4 w-full lg:w-1/3" id="btnPanierPop" popover>
                    <nav class="flex justify-between  items-center">
                        <h2 class="oswald-bold">PANIER</h2>
                        <div class="flex">
                            <button id="btnClosePanier">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                            </button>
                        </div>
                    </nav>
                    <section>
                        <p class="oswald-bold"><?= $nA ?> articles</p>
                        <p>Sac à dos "Explorer" x1 .......... 59,99€</p>
                        <p>Lampe torche "NightLight" x1 .... 19,99€</p>
                        
                    </section>
                    <hr class="my-2">
                    <p class="oswald-bold">Total : 79,98€</p>
                    <button class="btn">COMMANDER</button>
                </section>
            </section>
            
                <a href="#" class="flex items-center gap-2">
                    <img src="public\assets\images\logoL.png" alt="Logo du site">
                    <h1 class="oswald-bold text-2xl">RedMush</h1>
                </a>
            
            <section  class="flex gap-4">
                <!-- Btn SEARCH -->
                <button id="btnSearch" popovertarget="btnSearch">
                    <svg xmlns="http://www.w3.org/2000/svg" height="32px" viewBox="0 -960 960 960" width="32px" fill="#000000"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/></svg>
                </button>

                <section class="border border-black flex flex-row hidden justify-center items-center fixed left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2" id="btnSearchPop" popover>
                    <form action="#">
                        <input type="text" placeholder="Rechercher un produit" class="h-full active:outline-none">
                        <button class="btn oswald">RECHERCHER</button>
                    </form>
                </section>

                <!-- Btn MENU -->
                <button id="btnMenu" popovertarget="btnMenu">
                    <svg xmlns="http://www.w3.org/2000/svg" height="32px" viewBox="0 -960 960 960" width="32px" fill="#000000"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg>
                </button>

                <section class="border border-black flex flex-col hidden fixed top-0 right-0 p-4 h-full w-full  sm:w-1/3 lg:w-1/3" id="btnMenuPop" popover>
                    <section class="flex justify-between items-center">
                        <h2 class="oswald-bold">MENU</h2>
                        <div class="flex">
                            <button id="btnCloseMenu">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                            </button>
                        </div>
                    </section>
                    <hr class="my-2">
                    <nav class="flex justify-end items-center text-2xl">
                        <ul class="flex flex-col gap-2 text-right">
                            <li>
                                <a href="/redmush" class="oswald-bold">ACCUEIL</a>
                            </li>
                            <hr class="my-2 text-gray-300">
                            <li>
                                <a href="/redmush/homme" class="oswald-bold">HOMME</a>
                            </li>
                            <hr class="my-2 text-gray-300">
                            <li>
                                <a href="/redmush/femme" class="oswald-bold">FEMME</a>
                            </li>
                            <hr class="my-2 text-gray-300">
                            <li>
                                <a href="/redmush/enfant" class="oswald-bold">ENFANT</a>
                            </li>
                            <hr class="my-2 text-gray-300">
                            <li>
                                <a href="/redmush/accessoires" class="oswald-bold">ACCESSOIRES</a>
                            </li>
                            <hr class="my-2 text-gray-300">
                            <li>
                                <a href="/redmush/nouveautes" class="oswald-bold">NOUVEAUTÉS</a>
                            </li>
                            <hr class="my-2 text-gray-300">
                            <li>
                                <a href="/redmush/promotion" class="oswald-bold">PROMO</a>
                            </li>
                            <hr class="my-2 text-gray-300">
                            <li>
                                <a href="/redmush/capsule" class="oswald-bold">CAPSULE</a>
                            </li>
                        </ul>
                    </nav>
                    <hr class="my-2">
                    <section class="flex justify-center h-full items-center gap-4">
                        <a href="#">
                            <img src="public\assets\images\logoInstagram.png" alt="Lien vers Instagram">
                        </a>
                        <a href="#">
                            <img src="public\assets\images\logoTiktok.png" alt="Lien vers Tiktok">
                        </a>
                        <a href="#">
                            <img src="public\assets\images\logoYoutube.png" alt="Lien vers Youtube">
                        </a>
                    </section>
                </section>
            </section>
        </nav>
    </header>
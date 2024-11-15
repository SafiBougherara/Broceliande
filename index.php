<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Brocéliande immo - votre agence de confiance</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Custom Google font-->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column h-100 ">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <?php include_once('header.php');?>
            <br><br><br>
            <!-- Header-->
            <header class="py-5 background-video gris">
            <video autoplay loop muted class="bg-video">
                <source src="assets/immo_cinematic.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="container px-5 pb-5 contenu">
                    <div class="row gx-5 align-items-center">
                        <div class="col-xxl-5">
                            <!-- Header text content-->
                            <div class="text-center text-xxl-start">
                                <?php // var_dump($_SESSION); ?>
                                <br>
                                <h1 class="display-3 fw-bolder mb-5"><span class="gold"> <br>Vos agences depuis 1984<br> sur Rennes, Quimper et Vannes   </span></h1>
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3">
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-7">
                            <!-- Header profile picture-->
                                <div class="d-flex justify-content-center mt-5 mt-xxl-0">
                                    <div class="">
                                        <h3 class="display-3 fw-bolder mb-5"><span class="gold">Nos agences</span></h3>
                                        <form method="post">
                                            <button class="btn btn-primary" type="submit" name="city" value="rennes">Rennes</button>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <button class="btn btn-primary" type="submit" name="city" value="quimper">Quimper</button>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <button class="btn btn-primary" type="submit" name="city" value="vannes">Vannes</button>
                                        </form>
                                        <br>
                                        <?php
                                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                            if ($_POST["city"] == "rennes") {
                                                ?><div style="width: 100%"><iframe width="800" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=21%20Rue%20de%20Bray,%2035510+(Broc%C3%A9liande%20Immo)&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/">gps vehicle tracker</a></iframe></div><?php
                                            } elseif ($_POST["city"] == "quimper") {
                                                ?><div style="width: 100%"><iframe width="800" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=32%20Bis%20Rue%20de%20Stang%20Bihan,%2029000%20Quimper+(My%20Business%20Name)&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/">gps systems</a></iframe></div></div><?php
                                            } elseif ($_POST["city"] == "vannes") {
                                                ?><div style="width: 100%"><iframe width="800" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=1%20Rue%20L%C3%A9on%20Griffon+(Broc%C3%A9liande%20Immo)&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/">gps systems</a></iframe></div><?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>

            </header>
            <!-- About Section-->
            
            <section class="black_green">
                <div class="container ">
                    <div class="row gx-5 justify-content-center">
                        <div class="">
                            <div class="text-center my-5">
                                <?php $article = get_all_articles();
                                if (!empty($article)) {
                                ?>
                                <h2 class="fw-bolder"><span class="text-gradient d-inline"> Découvrez nos proprietés </span></h2>
                                <br>
                            <div class="">
                                <?php 
                                //echo var_dump($article);
                                foreach ($article as $article) :?>
                                    <div class="card">
                                        <div class="card-header gold black_green">
                                            <h3><img src="assets/bouton_simple.png" whidth="50" height="50" alt=""> <?= $article['title'] ?> <br> <?= $article['price'] ?> €  <br> <?= $article['adress'] ?></h3>
                                        </div>
                                        <div class="card-body gold black_green">
                                        <?php
                                        $id = $article['id']; // ID spécifique à rechercher dans les noms de fichiers
                                        $directory = 'img_properties'; // Spécifiez le chemin de votre répertoire ici
                                            
                                        // Obtenez la liste des fichiers dans le répertoire
                                        $files = scandir($directory);
                                            
                                        // Initialisez un tableau pour stocker les noms des fichiers correspondant à l'ID spécifique
                                        $filesWithID = [];
                                            
                                        // Parcourez la liste des fichiers
                                        foreach ($files as $file) {
                                            // Vérifiez si le fichier est une image (vous pouvez ajuster cette condition selon les extensions que vous utilisez)
                                            if (preg_match('/\.(jpg|jpeg|png|gif)$/i', $file)) {
                                                // Vérifiez si le nom du fichier contient l'ID spécifique
                                                if (strpos($file, "id$id") !== false) {
                                                    $filesWithID[] = $file; // Ajoutez le nom du fichier au tableau
                                                }
                                            }
                                        }
                                    
                                        /*
                                        echo "Fichiers comportant l'ID $id dans leur nom :<br>";
                                        foreach ($filesWithID as $fileName) {
                                            echo $fileName . "<br>";
                                        }
                                        */

                                        ?>
                                        <div class='text-center my-5'>
                                        <?php

                                        foreach ($filesWithID as $fileName) {
                                            echo "<img src='$directory/$fileName' whidth='600' height='350' alt=''>&nbsp;";
                                        }
                                        ?>
                                                    </div>
                                                    </div>
                                                    <div class="card-footer gold black_green">
                                                        <a href="article.php?id=<?= $article['id'] ?>" class="btn btn-primary">Voir plus</a>
                                                    </div>
                                            </div>
                                            <br><br><br><br>
                                            <?php endforeach; ?>
                                        </div>                                
                                            <?php } ?>
                            </div><br>

                        </div>
                    </div>
                </div>
                <br><br>
            </section>
            </header>
            <!-- About Section-->

            <section class="py-5 background-video">
                <video autoplay loop muted class="bg-video">
                    <source src="assets/green_background.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="container px-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-xxl-8">
                            <div class="text-center my-5">
                                <img src="assets/bouton_simple.png" alt="..."><br>
                                <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline"> Découvrez Brocéliande Immo, votre partenaire immobilier de confiance</span></h2><p class="white">Fondée il y a 40 ans par Arthur et sa demi-sœur Anna, notre agence compte des implantations à Rennes, Quimper et Vannes.
                                Notre équipe compétente, menée par les experts Ivain pour l'achat/vente et Gauvain pour la location, est là pour réaliser vos projets immobiliers avec professionnalisme et dévouement. Bienvenue chez Brocéliande Immo, où votre satisfaction est notre priorité depuis quatre décennies </p>
                                <br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
        </main>
        <?php include_once('footer.php'); ?>
    </body>
</html>

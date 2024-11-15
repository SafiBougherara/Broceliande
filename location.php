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
            
            <section class="black_green">
                <div class="container ">
                    <div class="row gx-5 justify-content-center">
                        <div class="">
                            <div class="text-center my-5">
                                <?php 
                                $articles = get_all_articles();
                                if (!empty($articles)) {
                                ?>
                                <h2 class="fw-bolder"><span class="text-gradient d-inline"> Découvrez nos propriétés en location </span></h2>
                                <br>
                                <div class="">
                                    <?php 
                                    foreach ($articles as $article) :
                                        if ($article['category'] == "location") :
                                    ?>
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
                                    <?php 
                                        endif;
                                    endforeach; 
                                    ?>
                                </div>                                
                                <?php } ?>
                            </div><br>

                        </div>
                    </div>
                </div>
                <br><br>
            </section>
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

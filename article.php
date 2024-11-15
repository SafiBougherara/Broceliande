<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
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
    <body class="d-flex flex-column">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <?php include_once('header.php'); 
            include_once('functions.php');
            $article = get_one_article($_GET['id']);
//            if ($_SESSION['connected'] == false) {
//                header('location: treatment_deconnection.php');
//            }?>
            <!-- Page content-->
            <section class="py-5 ">
                <br><br><br>
                <div class="container px-5">
                    <div class="row">
                        <div class="col-12 gold">
                            <div class= "black_green rounded-4 py-5 px-4 px-md-5">
                            <h2 class = "display-3 fw-bolder mb-5"><span class="gold"><?= $article['title'] ?> <br> <?= $article['price'] ?> €</span></h2>
                            <h2> <span class="text-gradient d-inline">Ce bien est disponible à la </span><span class = "gold"><?= $article['category'] ?></span></h2><br>

                            <h2><span class="text-gradient d-inline">Adresse : </span><span class = "gold"><?= $article['adress'] ?></span></h2>
                            <h2> <span class="text-gradient d-inline">Surface :</span><span class = "gold"><?= $article['surface'] ?></span></h2>
                            <h2> <span class="text-gradient d-inline">Nombre de pièces :</span><span class = "gold"><?= $article['pieces'] ?></span></h2><br>
                            </div>


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
                            <div class='text-center my-5'><br>
                            <?php

                            foreach ($filesWithID as $fileName) {
                                echo "<img src='$directory/$fileName' whidth='700' height='400' alt=''>&nbsp;";
                            }
                            ?>
                            </div>
                            <br><br><br><br>
                            <h2><span class="text-gradient d-inline">Description du bien :</span> <br><br> </h2><span class = "white"><?= $article['content'] ?></span>
                        </div>
                    </div>
                </div><br>

                <?php
                if ( isset ($_SESSION['id'])) {
                $article_owned_by_user = article_owned_by_user($_SESSION['id'], $_GET['id']);
                }
                else {
                    $article_owned_by_user = false;
                }
                /*
                echo var_dump($_SESSION);
                echo "<br><br>";
                echo var_dump($article);
                echo "<br><br>";
                echo var_dump($article_owned_by_user);
                */
                if (isset($_SESSION['connected']) && $_SESSION['connected'] == true && $article_owned_by_user == true ||  isset($_SESSION['role']) && $_SESSION['role'] != "user") {
                ?>
                <div class ="container px-5">
                    <form action="<?php echo "updatepost.php?id=" . $article['id'] ?>" method="POST" enctype="multipart/form-data">
                        <div class ="">
                            <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">
                            <div>
                                <input type="hidden" name="article_id" value="<?=$article['id']?>">
                            </div>
                        </div>
                        <br><br>
                        <button type ="submit" class = "btn btn-primary"> modifier votre annonce </button>
                    </form>
                </div><br><br>
                
            <div class="card shadow border-0 rounded-4 mb-5">
                    <div class="card-body black_green p-5">
                        <div class="row align-items-center gx-5">
                            <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                <div class="text-center my-5">
                                    <form action="upload_annonce.php" method="POST" enctype="multipart/form-data">
                                        <div class ="">
                                            <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">
                                            <label for ="upload file" class =""> ajouter une nouvelle photo pour votre annonce </label>
                                            <br><br>
                                            </span></h2>
                                            <input type="file" class="btn btn-primary" id ="upload_file" name ="upload_file"/>
                                            <div>
                                                <input type="hidden" name="article_id" value="<?=$article['id']?>">
                                            </div>
                                        </div>
                                        <br><br>
                                        <button type ="submit" class = "shadow__btn"> Envoyer </button>
                                    </form>
                        </div>
                    </div>
                </div>

                <?php
            }
            ?>

            </section>
            <?php
            include_once('treatment_contact_us.php');
            ?>
            <br><br>

        </main>

        <?php include_once('footer.php'); ?>

    </body>
</html>

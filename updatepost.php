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
    <body class="d-flex flex-column">
        <main class="flex-shrink-0">
            <?php include_once('header.php');
            $article = get_one_article($_GET['id']);
            ?>

            <?php
            if ($_SESSION['connected'] == false || $_SESSION['role'] == 'user') {
                header('location: sign_up.php');
                exit(); // Ajout d'une sortie immédiate après la redirection
            }
            ?>
            <!-- Page content-->
            <section class="py-5">
            <div class="container px-5">
                    <!-- Contact form-->
            <div class=" rounded-4 py-5 px-4 px-md-5">
                    <div class="row">
                        <div class="offset-3 col-6">
                        <br>
                        <div class=text-center my-5>
                        <img class ="rounded-4" src="assets/maison_img.png" width="130" height="130" alt="...">
                        </div>    
                        <form class ="" action="treatment_update.php" method="post">

                            <div class="form-floating mb-3">
                                <input value = "<?php echo $article['id'] ?>" type ="hidden" class="form-control" id="title" placeholder="name@example.com" data-sb-validations="required,title" name ="id"/>
                            </div>

                            <div class="form-floating mb-3">
                                <input value = "<?php echo $article['title'] ?>" type ="text" class="form-control" id="title" placeholder="name@example.com" data-sb-validations="required,title" name ="title"/>
                                <label for="title">title</label>
                            </div>
                            

                            <div class="form-floating mb-3">
                                        <input value = "<?php echo $article['adress'] ?>" type ="text" class="form-control" id="adress" placeholder="name@example.com" data-sb-validations="required,adress" name ="adress"/>
                                        <label for="adress">Adresse complete</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="hidden" value = "<?php echo $article['category'] ?>" class="form-control" id="category" name="category">
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input value = "<?php echo $article['price'] ?>" type ="text" class="form-control" id="price" data-sb-validations="required,price" name ="price"/>
                                        <label for="price">Prix (€)</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input value = "<?php echo $article['surface'] ?>" type ="text" class="form-control" id="surface" placeholder="name@example.com" data-sb-validations="required,surface" name ="surface"/>
                                        <label for="surface">Surface en m²</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input value = "<?php echo $article['pieces'] ?>" type ="text" class="form-control" id="pieces" placeholder="name@example.com" data-sb-validations="required,pieces" name ="pieces"/>
                                        <label for="pieces">Nombre de pièces</label>
                                    </div>

                            <div class="form-floating mb-3">
                                <textarea type="text" class="form-control" id="content" placeholder="name@example.com" data-sb-validations="required,content" name ="content" style ="height: 200px"> <?php echo $article['content'] ?></textarea>
                                <label for="content">Contenu</label>
                            </div>

                            <div class="text-center my-5">
                            <input type ="submit" name="submit_update" value="Modifier l'annonce" class="btn btn-primary">
                            </div>
                        </form>

                        <?php
                        $id = $article['id']; // ID spécifique à rechercher dans les noms de fichiers
                        $directory = 'img_properties'; // Spécifiez le chemin de votre répertoire ici
                        
                        // Vérifiez si le bouton "Effacer" a été soumis
                        if (isset($_POST['deleteFileBtn'])) {
                            $fileToDelete = $_POST['fileToDelete'];
                            // Vérifiez si le fichier existe avant de le supprimer
                            if (file_exists($fileToDelete)) {
                                // Supprimer le fichier
                                unlink($fileToDelete);
                                // Rafraîchir la page pour refléter les changements après la suppression
                                echo "<meta http-equiv='refresh' content='0'>"; // Cela rafraîchit la page après 0 seconde (immédiatement)
                                exit();
                            } else {
                                echo "<script>alert('Le fichier n'existe pas');</script>"; // Affichez une alerte si le fichier n'existe pas
                            }
                        }
                        
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
                        

                        foreach ($filesWithID as $fileName) {
                            $filePath = "$directory/$fileName"; // Chemin complet du fichier
                            ?>
                            <div class='text-center my-5'>
                            <br><img src='<?php echo $filePath ?>' width='500' height='300' alt=''><br>
                            <form method='POST'>
                            <input type='hidden' name='fileToDelete' value='<?php echo $filePath ?>'>
                            <br><button type='submit'class='btn btn-primary' name='deleteFileBtn'>Effacer</button>
                            </form>
                            </div>
                            <?php
                        }

                        ?>

                    <a href="article.php?id=<?= $_GET['id']?>"><button class="btn btn-primary col-md-6 offset-md-3 text-center">Retour</button></a><br><br> 
                    </div>
                </div>
            </div>
            </section>
        </main>
        <?php include_once('footer.php'); ?>
    </body>
</html>

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
            <?php include_once('header.php'); ?>
            <?php 
                if (isset($_SESSION['connected'])) {
                    
                    $filename =  "uploads/" . $_SESSION['mail'] . ".png";
                    if (file_exists($filename)) {
                        //on efface le fichier s'il existe
                        unlink($filename);
                    }
                }
            ?>

                <div class="card shadow border-0 rounded-4 mb-5">
                    <div class="card-body black_green p-5">
                        <div class="row align-items-center gx-5">
                            <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                <div class="text-center my-5">
                                    <form action="upload.php" method="POST" enctype="multipart/form-data">
                                        <div class ="">
                                        <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">
                                        <label for ="upload file" class =""> Veuillez déposer votre image de profil </label>
                                        <br><br>
                                        </h2></span>
                                        </h3>
                                        <input type="file" class="btn btn-primary" id ="upload_file" name ="upload_file"/>
                                        </div>
                                        <br><br>
                                        <button type ="submit" class = "btn btn-primary"> Envoyer </button>
                                    </form>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <?php include_once('footer.php'); ?>
    </body>
</html>

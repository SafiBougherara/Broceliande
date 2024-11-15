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
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <?php include_once('header.php'); ?>
            <section class="py-5">
                <div class="container px-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-xxl-8"><br><br><br>
                            <div class="text-center my-5">
                                <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">Vous etes déconnecté</span>🤐</h2>
                                <h1>
                                <?php 

                                    if (isset($_SESSION['connected'])) {
                                        ?><br><?php
                                        //vide la session
                                        session_unset();
                                        session_destroy();
                                        if (isset($_SESSION['connected'])) {
                                            echo "erreur : la session n'est pas vide";
                                        }
                                    }
                                    ?><br><a href="sign_up.php"><button name="sign_up" class="btn btn-primary" type="submit">Sign up</button></a> <span class="text-gradient d-inline">ou</span>  <a href="sign_in.php"><button name="sign_in" class="btn btn-primary" type="submit">Sign in</button></a><?php
                                ?>
                                </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <?php include_once('footer.php'); ?>
    </body>
</html>

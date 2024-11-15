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
        <?php include_once('header.php'); ?>
            <section class=" py-5">
                <div class="container px-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-xxl-8">
                            <div class="text-center my-5">
                            <br><br><br>
                                <h2>
                                <?php 

                                    if (isset($_SESSION['connected'])) {
                                        ?><h2 class=""><span class="text-gradient d-inline"><?php
                                        echo "Bonjour ";
                                        echo $_SESSION['firstname'];
                                        ?>&nbsp;<?php
                                        echo $_SESSION['lastname'];
                                        ?></span><?php

                                        ?>&nbsp;👋&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php

                                        $filename =  "uploads/" . $_SESSION['mail'] . ".png";
                                        if (file_exists($filename)) {
                                            ?><img src="uploads/<?php echo $_SESSION['mail']; ?>.png" class="img_brr" width="300" height="300" alt="fakebook"><br><br>
                                                <a href="img_profile.php"><button class="btn btn-primary" type="submit">Tu veux modifier ta photo ? clique ici</button></a>
                                            <?php
                                        } else {
                                            ?><a href="img_profile.php"><img src="assets/profile.png" class="rounded-circle" width="300" height="240" alt="..."></a>   
                                            <br><br><a href="img_profile.php">
                                                <button class="btn btn-primary" type="submit">Hey! Tu peux ajouter une photo si tu veux</button>
                                            </a><?php
                                        }
                                        ?>
                                        <div>
                                            <a href="addpost.php"><button name="addpost" class="btn btn-primary" type="submit">Créer une annonce</button></a>
                                            <a href="treatment_deconnection.php"><button name="deconnection" class="btn btn-primary" type="submit">Se deconnecter</button></a>
                                        </div>
                                        </h2>
                                        <?php
                                        //var_dump($_SESSION);

                                        if ($_SESSION['role'] != 'user') {
                                        ?>&nbsp;<h1 class="black_green rounded-4"><span class="text-gradient d-inline"> statut : employé | poste :&nbsp;<?php
                                        echo $_SESSION['role'];
                                        ?>
                                        </span></h1>
                                        <?php
                                        }

                                    }
                                    else {
                                        ?>
                                        <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">Vous etes déconnecté</span>🤐</h2>
                                        <br><br><a href="sign_up.php"><button name="sign_up" class="btn btn-primary" type="submit">Sign up</button></a><span class="text-gradient d-inline"> ou </span><a href="sign_in.php"><button name="sign_in" class="btn btn-primary" type="submit">Sign in</button></a>
                                        <?php

                                    }
                                    
                                ?></h2>
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

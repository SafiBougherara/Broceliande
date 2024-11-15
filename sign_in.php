<?php
include_once('header.php');
if (isset($_SESSION['connected'])) {
    header('location: account.php');
}
?>
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
            <section class="py-5">
                <div class="container px-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-xxl-8">
                            <div class="text-center my-5">
                            <img src="assets/Profile.png" width="130" height="100" alt="...">
                                <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">Connectez-vous à votre compte </span></h2>
                                <br><br>
                                <form method="POST" action="treatment_sign_in.php">
                                    <!-- mail address input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="mail" type="mail" placeholder="name@example.com" data-sb-validations="required,mail" name ="mail"/>
                                        <label for="mail">mail address</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input  class="form-control" id="password" type="password" placeholder="name@example.com" data-sb-validations="required,password" name ="password"/>
                                        <label for="password">password address</label>
                                    </div>
                                    <!-- Submit Button-->
                                    <div class="d-grid"><button name="sign_in" class="btn btn-primary" type="submit">Envoyer</button></div>
                                </form>
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

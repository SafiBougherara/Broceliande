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
            <?php include_once('header.php'); ?>

            <?php
            if ($_SESSION['connected'] == false || $_SESSION['role'] == 'user') {
                header('location: index.php');
            }
            ?>
            <!-- Page content-->
            <section class="py-5">
            <div class="container px-5">
                    <!-- Contact form-->
            <div class=" rounded-4 py-5 px-4 px-md-5">
            <br><br><br>
                    <div class="row">
                        <div class="offset-3 col-6">
                        <div class=text-center my-5>
                        <img class ="t rounded-4" src="assets/lettre.png" width="100" height="100" alt="...">
                        </div><br>    
                        <?php


                        if (isset($_POST['submit'])
                        && !empty($_POST['firstname'])
                        && !empty($_POST['lastname'])
                        && !empty($_POST['mail'])
                        && !empty($_POST['comment'])) {

                            $firstname = $_POST['firstname'];
                            $lastname = $_POST['lastname'];
                            $mail = $_POST['mail'];
                            $comment = $_POST['comment'];

                            echo "<h1><span class='text-gradient d-inline'>";
                            echo ($firstname);
                            echo "&nbsp;";
                            echo ($lastname);
                            echo "&nbsp; [";
                            echo ($mail);
                            echo "]<br><br> Message : ";
                            echo "</span></h1><br>";
                            echo "<span class = white>";
                            echo ($comment);
                            echo "</span>";

                        }
                        else {
                            header("location:blog_admin_view.php");
                        }


                        ?>
                        <br><br>
                        <a href="blog_admin_view.php"><button class="btn btn-primary col-md-6 offset-md-3 text-center">Retour</button></a><br><br>
                    </div>
                </div>
            </div>
            <br><br>
            </section>
        </main>
        <?php include_once('footer.php'); ?>

    </body>
</html>

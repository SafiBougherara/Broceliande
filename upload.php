<?php include_once('functions.php');?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>La Croix Rouge - Partout, pour tous</title>
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

            <!-- Header-->
            <header class="black_green py-5">
<body>

<?php

if (isset($_FILES["upload_file"]) && $_FILES["upload_file"]["error"] === 0) 
{
    //var_dump($_FILES["upload_file"]);

    if ($_FILES["upload_file"]["size"] > 1000000) 
    {
        ?> <br> <h1 class="display-3 fw-bolder mb-5"><span class="text-gradient d-inline"><?= "Fichier trop volumineux";
        ?> </span>😵</h1> <?php
        return;
    }
    ?>

    <?php
    $fileInfo = pathinfo($_FILES["upload_file"]["name"]);
    $filename = $fileInfo["filename"];
    ?>
    
    <?php
    $extension = $fileInfo["extension"];

    $allowedExtensions = ["jpg", "jpeg", "png", "webp"];

    if (!in_array($fileInfo["extension"], $allowedExtensions)) 
    {
        ?> <br> <?= "Extension {$extension} non autorisée";
        return;
    }
    
    ?>
    
    <?php

    $path = __DIR__ . "/uploads/";
    if (!is_dir($path)) 
    {
        echo "Le dossier n'existe pas";
    }
    else 
    {
        $filename = $_SESSION["mail"];
        move_uploaded_file($_FILES["upload_file"]["tmp_name"], $path . $filename . ".". "png");        
    }
}
?>


<div class="card shadow border-0 rounded-4 mb-5">
    <div class="black_green card-body p-5">
    <div class="container px-5 pb-5">
                    <div class="row gx-5 align-items-center">
                        <div class="col-xxl-5">
                            <!-- Header text content-->
                            <div class="text-center text-xxl-start">
                                <h1 class="display-3 fw-bolder mb-5"><span class="text-gradient d-inline">Photo de profile
                                </span></h1>

                                <?php
                                $filename =  "uploads/" . $_SESSION['mail'] . ".png";
                                if (file_exists($filename) == false) {
                                    ?><a href="img_profile.php"><button class="btn btn-primary btn-lg" type="button">Réssayer</button></a><br><?php
                                }?>

                                <br><a href="account.php"><button class="btn btn-primary btn-lg" type="button">retourner sur votre profile</button></a>

                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3">
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-7">
                            <!-- Header profile picture-->
                            <div class="d-flex justify-content-center mt-5 mt-xxl-0">
                                <div class="">
                                    <!-- TIP: For best results, use a photo with a transparent background like the demo example below-->
                                    <!-- Watch a tutorial on how to do this on YouTube (link)-->
                                    <?php
                                    //var_dump($_SESSION["mail"]);
                                    $filename =  "uploads/" . $_SESSION['mail'] . ".png";
                                    if (file_exists($filename)) {
                                        ?><img class="img_brr" src="uploads/<?= $_SESSION["mail"] ?>.png" width="300" height="300" alt="..." /><?php
                                    } else {
                                        ?><img class="img_brr" src="assets/Profile.png" class="rounded-circle" width="450" height="340" alt="..." />
                                        <?php
                                    }
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    <br>
    <div class="row gx-5 align-items-center">
    
        </div>
        </div>
        </div>
        <?php include_once('footer.php'); ?>
</body>
</html>
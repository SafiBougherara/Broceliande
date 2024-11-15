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
    </head><body class="d-flex flex-column h-100">
<main class="flex-shrink-0">
    <!-- Header-->
    <header class="py-5">
    </header>

    <?php
    include_once('header.php');
    $article_id = $_POST['article_id'];

    // Vérifier si des fichiers ont été téléchargés
    if (empty($_FILES["upload_file"]["name"])) {
        // Aucun fichier n'a été téléchargé
        ?>
        <h1 class="text-center my-5"><span class="gold">Aucun fichier n'a été déchargé</span></h1>
        <?php
    } 

    if (isset($_FILES["upload_file"]) && $_FILES["upload_file"]["error"] === 0) {
        // Répertoire de destination
        $upload_dir = __DIR__ . "/img_properties/";
    
        // Vérifier si le répertoire existe, sinon le créer
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }
    
        // Obtenir l'extension du fichier
        $file_ext = strtolower(pathinfo($_FILES["upload_file"]["name"], PATHINFO_EXTENSION));
    
        // Liste des extensions d'images autorisées
        $allowed_extensions = array('jpg', 'jpeg', 'png', 'webp');

        // Vérifier si l'extension du fichier est dans la liste des extensions autorisées
        if (in_array($file_ext, $allowed_extensions)) {
            // Générer un nom de fichier unique
            $filename = "id" . $article_id . "_" . uniqid() . "." . "jpg";
    
            // Déplacer le fichier téléchargé vers le répertoire de destination
            move_uploaded_file($_FILES["upload_file"]["tmp_name"], $upload_dir . $filename);
        } else {
            // Format de fichier non autorisé, afficher un message d'erreur
            echo "<br><br><h1 class='text-center'><div class='col-md-6 offset-md-3'><span class='text-gradient d-inline'>" . "Mauvais format de fichier. <br><br> Les formats autorisés sont : <br>" . implode(', ', $allowed_extensions) . "</span> </div></h1><br><br>";
        }
    }
        ?>
<span class="text-gradient d-inline"></span>
    <?php
    if (isset($filename)) {
        echo '<div class="container mt-5">';
        echo '<div class="row">';
        echo '<div class="col-md-6 offset-md-3 text-center">';
        echo '<h2><span class="text-gradient d-inline">Image téléchargée avec succès</span></h2>';
        echo '<img src="img_properties/' . $filename . '" class="img-fluid mt-3" alt="Image téléchargée">';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<br><br>';
    }
    ?>
    <a href="article.php?id=<?= $_POST['article_id']?>"><button class="btn btn-primary col-md-6 offset-md-3 text-center">Retour</button></a><br><br>
    <!-- Footer -->
    <?php include_once('footer.php'); ?>
</main>
</body>
</html>

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
            <?php if ($_SESSION['connected'] == false || $_SESSION['role'] == 'user') {
                header('location: index.php');
            }
            ?>

            <!-- Page content-->
            <section class="py-5">
            <div class="container px-5">
                    <br><br><br>
                    <div class=" rounded-4 py-5 px-4 px-md-5">
                        <h1 class="display-3 fw-bolder mb-5"><span class="text-gradient d-inline">Tous les articles</span></h1>
                        <br><br>
                    <?php $article = get_all_articles_admin(); ?>
                    <?php if (empty($article)){
                        
                        ?>
                        <h4 class=""><span class="text-gradient d-inline">pas d'annonces pour le moment</span>😞</h4>
                        <?php
                    
                        }
                        else {

                        ?>
                        <div class= "row">
                            <div class="col-12 gold">
                                <table>
                                    <tr>
                                        <th>ID</th>
                                        <th>Titre</th>
                                        <th>Modifier</th>
                                        <th>Effacer</th>
                                    </tr>
                                    <?php foreach ($article as $article): ?>
                                        <tr>
                                            <td><h4 class="">[<span class="text-gradient d-inline"><?= $article['id'] ?></span>]</h4></td>
                                            <td>[<span class="text-gradient d-inline"><?= $article['title'] ?></span>]</td>
                                            <td><a class = "btn btn-warning" href="updatepost.php?id=<?= $article['id']?>">Modifier</a></td>
                                            <td><?php include("template_delete.php"); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                        <?php
                        }
                        ?> 
                        </h2>
                    </div>
                </div>
            </section>

            <section class="py-5">
            <div class="container px-5">
                    <br><br><br>
                    <div class=" rounded-4 py-5 px-4 px-md-5">
                        <h1 class="display-3 fw-bolder mb-5"><span class="text-gradient d-inline">Tous les messages utilisateur</span></h1>
                        <br><br>
                    <?php $all_comments = get_all_comments(); ?>
                    <?php if (empty($all_comments)){
                        
                        ?>
                        <h4 class=""><span class="text-gradient d-inline">pas de messages pour le moment</span>😞</h4>
                        <?php
                    
                        }
                        else {

                        ?>
                        <div class= "row">
                            <div class="col-12 gold">
                            <style>
                                th, td {
                                    padding: 10px; /* Ajoutez la quantité d'espace souhaitée */
                                }
                            </style>

                            <table>
                                <tr>
                                    <th>Annonce</th>
                                    <th>Prénom</th>
                                    <th>Nom</th>
                                    <th>Mail</th>
                                    <th>Message complet</th>
                                </tr>
                                <?php foreach ($all_comments as $all_comments): ?>
                                    <tr>
                                        <td>[<span class="text-gradient d-inline"><?= $all_comments['article_id'] ?></span>]</td>
                                        <td>[<span class="text-gradient d-inline"><?= $all_comments['firstname'] ?></span>]</td>
                                        <td>[<span class="text-gradient d-inline"><?= $all_comments['lastname'] ?></span>]</td>
                                        <td>[<span class="text-gradient d-inline"><?= $all_comments['mail'] ?></span>]</td>
                                        <td>
                                        <form action="comment.php" method="POST">
                                            <input type="hidden" name="id" value="<?= $article['id'] ?>">
                                            <input type="hidden" name="firstname" value="<?= $all_comments['firstname'] ?>">
                                            <input type="hidden" name="lastname" value="<?= $all_comments['lastname'] ?>">
                                            <input type="hidden" name="mail" value="<?= $all_comments['mail'] ?>">
                                            <input type="hidden" name="comment" value="<?= $all_comments['comment'] ?>">
                                            <button type="submit" name = "submit" class="btn btn-warning">Voir message complet</button>
                                        </form>
                                        </td>
                                        <td><?php include("comment_delete.php"); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                            </div>
                        </div>
                        <?php
                        }
                        ?> 
                        </h2>
                    </div>
                </div>
            </section>
        </main>
        <?php include_once('footer.php'); ?>
    </body>
</html>

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
                header('location: sign_up.php');
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
                        <img class ="rounded-4" src="assets/maison_img.png" width="130" height="130" alt="...">
                        </div><br>    
                        <form class ="" action="treatment_add.php" method="post">

                        <div class="form-floating mb-3">
                                        <input type ="text" class="form-control" id="title" data-sb-validations="required,title" name ="title"/>
                                        <label for="title">titre</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type ="text" class="form-control" id="adress" placeholder="name@example.com" data-sb-validations="required,adress" name ="adress"/>
                                        <label for="adress">Adresse complete</label>
                                    </div>

                                    <?php
                                    if ($_SESSION['role'] == 'vendeur'){
                                        ?>
                                        
                                        <span class="white"> Vous êtes :
                                        <?php echo $_SESSION['role'] ?>
                                        <br>(Connectez-vous en avec un compte 'Loueur' pour poster une location)
                                        <br></span>
                                    
                                        <div class="form-floating mb-3">
                                            <select class="form-control" id="category" name="category">
                                                <option value="vente">vente</option>
                                            </select>
                                        <label for="category">Categorie</label>
                                    </div>
                                    <?php
                                    }?>
                                    
                                    <?php
                                    if ($_SESSION['role'] == 'loueur'){
                                        ?>
                                                                                
                                        <span class="white"> Vous êtes :
                                        <?php echo $_SESSION['role'] ?>
                                        <br>(Connectez-vous en avec un compte 'Vendeur' pour poster une vente)
                                        <br></span>
                                    
                                        <div class="form-floating mb-3">
                                            <select class="form-control" id="category" name="category">
                                                <option value="location">location</option>
                                            </select>
                                        <label for="category">Categorie</label>
                                    </div>
                                    <?php
                                    }?>

                                    <div class="form-floating mb-3">
                                        <input type ="text" class="form-control" id="price" data-sb-validations="required,price" name ="price"/>
                                        <label for="price">Prix (€)</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type ="text" class="form-control" id="surface" data-sb-validations="required,surface" name ="surface"/>
                                        <label for="surface">Surface en m²</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type ="text" class="form-control" id="pieces" data-sb-validations="required,pieces" name ="pieces"/>
                                        <label for="pieces">Nombre de pièces</label>
                                    </div>
                            
                                    <div class="form-floating mb-3">
                                        <textarea type="text" class="form-control" id="content" data-sb-validations="required,content" name ="content" style ="height: 200px"></textarea>
                                        <label for="content">Description détaillé</label>
                                    </div>

                            <div class="text-center my-5">
                            <input type ="submit" name="submit_add" value="Ajouter l'annonce" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <br><br>
            </section>
        </main>
        <?php include_once('footer.php'); ?>

    </body>
</html>

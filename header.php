<nav class="navbar navbar-expand-lg navbar-light black_green navbar_fixed py-3 ">
                <?php include_once('functions.php');
                ?>
                <div class="container px-5">
                <a class="navbar-brand" href="index.php"><span class ="text-gradient d-inline"><img src="assets/bouton_simple.png" width="50" height="50" alt="Brocéliande Immo">&nbsp; Brocéliande Immo</span></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                        <li class="nav-item"><a class="nav-link gold" href="index.php">Page d'accueil</a></li>
                        <li class="nav-item"><a class="nav-link gold" href="location.php">Nos biens à la location</a></li>
                        <li class="nav-item"><a class="nav-link gold" href="vente.php">Nos bien à la vente</a></li>
                            <?php
                            if ($_SESSION == null || $_SESSION['connected'] == false) {
                                ?>

                            <li class="nav-item"><a class="nav-link gold" href="sign_up.php">Sign up</a></li>
                            <li class="nav-item"><a class="nav-link gold" href="sign_in.php">Sign in</a></li>

                            <?php
                            }
                            ?>
                            <?php
                            if (isset($_SESSION['connected']) && $_SESSION['connected'] == true) {
                                ?>

                            <li class="nav-item"><a class="nav-link gold" href="account.php">Votre profil</a></li>

                            <?php
                            }
                            ?>
                            <?php
                            if (isset($_SESSION['connected']) && $_SESSION['connected'] == true && isset($_SESSION['role']) && $_SESSION['role'] != 'user') {
                            ?>
                            <li class="nav-item"><a class="nav-link gold" href="blog_admin_view.php">Gestion administrateur</a></li>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <li class="nav-item"><a class="btn btn-primary" href="addpost.php">Ajouter un annonce</a></li>                            
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </nav>
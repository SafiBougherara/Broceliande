<section>
                <div class="container px-5">
                    <div class="row">
                        <div class="col-12">
                            <h2 class = ""><span class="text-gradient d-inline">Un bien vous interesse ? <br> Faite-le nous savoir en nous contactant: <br></span></h2>
                            <br> <br>
                            <?php
                            if ($_SESSION != null && $_SESSION['connected'] == true) {
                                ?>
                                <form action="treatment_add_comment.php" method="post">
                                <div class="form-floating mb-3">
                                            <input value = "<?= $_SESSION['firstname'] ?>" class="form-control" id="firstname" type="firstname" placeholder="name@example.com" data-sb-validations="required,firstname" name ="firstname"/>
                                            <label for="firstname">Votre prénom</label>
                                        </div>
    
                                        <div class="form-floating mb-3">
                                            <input value = "<?= $_SESSION['lastname'] ?>" class="form-control" id="lastname" type="lastname" placeholder="name@example.com" data-sb-validations="required,lastname" name ="lastname"/>
                                            <label for="lastname">Votre nom</label>
                                        </div>
    
                                        <div class="form-floating mb-3">
                                            <input value = "<?= $_SESSION['mail'] ?>" class="form-control" id="mail" type="mail" placeholder="name@example.com" data-sb-validations="required,mail" name ="mail"/>
                                            <label for="mail">adresse mail </label>
                                        </div>
                                    <div class="form-floating mb-3">
                                        <label for="comment" class="form-label">Votre message</label>
                                        <textarea class="form-control" class="form-control" id="comment" name="comment" rows="3"style ="height: 150px"></textarea>
                                    </div>
                                    <div>
                                        <input type="hidden" name="user_id" value="<?= $_SESSION['id'] ?>">
                                    </div>
                                    <div>
                                        <input type="hidden" name="article_id" value="<?=$article['id']?>">
                                    </div>
                                    <button type="submit" class="btn btn-primary" name ="add_comment">Envoyer</button>
                                </form>
                                <?php
                            }
                            else {                                
                                ?>
                                <form action="treatment_add_comment.php" method="post">
                                <div class="form-floating mb-3">
                                            <input class="form-control" id="firstname" type="firstname" placeholder="name@example.com" data-sb-validations="required,firstname" name ="firstname"/>
                                            <label for="firstname">Votre prénom</label>
                                        </div>
    
                                        <div class="form-floating mb-3">
                                            <input  class="form-control" id="lastname" type="lastname" placeholder="name@example.com" data-sb-validations="required,lastname" name ="lastname"/>
                                            <label for="lastname">Votre nom</label>
                                        </div>
    
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="mail" type="mail" placeholder="name@example.com" data-sb-validations="required,mail" name ="mail"/>
                                            <label for="mail">adresse mail </label>
                                        </div>
                                    <div class="form-floating mb-3">
                                        <label for="comment" class="form-label">Votre message</label>
                                        <textarea class="form-control" class="form-control" id="comment" name="comment" rows="3"style ="height: 150px"></textarea>
                                    </div>
                                    <div>
                                        <input type="hidden" name="user_id" value="guest">
                                    </div>
                                    <div>
                                        <input type="hidden" name="article_id" value="<?=$article['id']?>">
                                    </div>
                                    <button type="submit" class="btn btn-primary" name ="add_comment">Envoyer</button>
                                </form>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
            </section>

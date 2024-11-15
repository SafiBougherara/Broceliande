<?php 
session_start();

// Fonction pour obtenir une instance PDO et se connecter à la base de données
function get_PDO(): PDO {
    // Informations de connexion à la base de données
    $host = '127.0.0.1';
    $db   = 'broceliande';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    // Chaîne de connexion PDO
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    // Options PDO
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    try {
        // Créer une instance PDO (connexion à la base de données)
        return new PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
        // Gérer les erreurs de connexion si nécessaire
        // throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
}

// Fonction pour enregistrer un nouvel utilisateur
function sign_up($mail, $password, $firstname, $lastname, $role) {
    if (check_user_not_exist($mail)) {
        $pdo = get_PDO();
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Exécutez la requête d'insertion
        $query = "INSERT INTO users (mail, pass, firstname, lastname, role) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($query);
        if ($stmt->execute([$mail, $password, $firstname, $lastname, $role])) {
            // Récupérer l'ID de l'utilisateur nouvellement inséré
            $user_id = $pdo->lastInsertId();

            // Enregistrer l'ID de l'utilisateur dans la session
            $_SESSION['id'] = $user_id;
            // Enregistrer d'autres détails de l'utilisateur dans la session si nécessaire
            $_SESSION['connected'] = true;
            $_SESSION['firstname'] = $firstname;
            $_SESSION['lastname'] = $lastname;
            $_SESSION['role'] = $role;
            $_SESSION['mail'] = $mail;

            // Rediriger vers la page du compte
            header("location: account.php");
            exit; // Terminer le script après la redirection
        } else {
            // Gérer l'erreur d'insertion dans la base de données si nécessaire
        }
    } else {
        // Rediriger vers une page d'erreur si l'utilisateur existe déjà
        header("location: mail_error.php");
        exit; // Terminer le script après la redirection
    }
}

// Fonction pour connecter un utilisateur
function sign_in($mail, $password){
    $pdo = get_PDO();
    $query = "SELECT * FROM users WHERE mail = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$mail]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['pass'])) {
        // Enregistrer les détails de l'utilisateur dans la session
        $_SESSION['connected'] = true;
        $_SESSION['firstname'] = $user['firstname'];
        $_SESSION['lastname'] = $user['lastname'];
        $_SESSION['id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['mail'] = $user['mail'];

        header("location:account.php");
    } else {
        // Rediriger vers une page d'erreur de connexion
        header("location:sign_in_error.php");
    }
}

// Fonction pour obtenir l'ID d'un utilisateur par son adresse e-mail
function get_id_by_username($mail){
    $pdo = get_PDO();
    $query = "SELECT id FROM users WHERE mail = ?";
    $stmt = $pdo -> prepare($query);
    $stmt -> execute([$mail]);
    $id = $stmt -> fetchColumn();
    return $id;
}

// Fonction pour ajouter un article
function add_article($title, $adress, $content, $category, $price, $surface, $pieces, $user_id){
    $pdo = get_PDO();
    $query = "INSERT INTO articles (title, adress, content, category, price, surface, pieces, user_id) VALUES (?,?,?,?,?,?,?,?)";
    $stmt = $pdo -> prepare($query);
    $result = $stmt -> execute([$title, $adress, $content,$category, $price, $surface, $pieces, $user_id]);
    if ($result) {
        $article_id = $pdo->lastInsertId();
        header("location:article.php?id=$article_id");
    }
    else {
        header("location:add_error.php");
    }
}

function article_owned_by_user($user_id, $article_id){
    $pdo = get_PDO();
    $query = "SELECT * FROM articles WHERE user_id = ? AND id = ?";
    $stmt = $pdo -> prepare($query);
    $stmt -> execute([$user_id, $article_id]);
    $result = $stmt -> fetch();
    if ($result != null) {
        return true;
    }else{
        return false;
    }
}
// Fonction pour ajouter un commentaire à un article
function add_comment($firstname, $lastname, $mail, $comment, $user_id, $article_id){
    $pdo = get_PDO();
    $query = "INSERT INTO comments (firstname, lastname, mail, comment, user_id, article_id) VALUES (?,?,?,?,?,?)";
    $stmt = $pdo -> prepare($query);
    $stmt -> execute([$firstname, $lastname, $mail, $comment, $user_id, $article_id]);
    header("location:article.php?id=$article_id");
}

function get_all_comments(){
    $pdo = get_PDO();
    $stmt = $pdo -> query("SELECT * FROM comments");
    $comments = $stmt -> fetchAll();
    return $comments;
}

function delete_comment($id){
    $pdo = get_PDO();
    $query = "DELETE FROM comments WHERE id = ?";
    $stmt = $pdo -> prepare($query);
    $stmt -> execute([$id]);
    header("location:blog_admin_view.php");
}

// Fonction pour mettre à jour un article
function update_article($id, $title, $adress, $category, $price, $surface, $pieces, $content, $user_id){
    $pdo = get_PDO();
    $query = "UPDATE articles SET title = ?, adress = ?, category = ?, price = ?, surface = ?, pieces = ?, content = ?, user_id = ? WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $result = $stmt->execute([$title, $adress, $category, $price, $surface, $pieces, $content, $user_id, $id]);
    if ($result) {
        header("location:article.php?id=$id");
    }
    else {
        header("location:update_error.php");
    }
}

// Fonction pour obtenir tous les articles
function get_all_articles(){
    $pdo = get_PDO();
    $stmt = $pdo -> query("SELECT * FROM articles");
    $articles = $stmt -> fetchAll();
    return $articles;
}

// Fonction pour obtenir tous les articles (administration)
function get_all_articles_admin(){
    $pdo = get_PDO();
    $stmt = $pdo -> query("SELECT id, title FROM articles");
    $articles = $stmt -> fetchAll();
    return $articles;
}

// Fonction pour obtenir un article par son ID
function get_one_article($id){
    $pdo = get_PDO();
    $query = ("SELECT * FROM articles WHERE id = ?");
    $stmt = $pdo -> prepare($query);
    $stmt -> execute([$id]);
    $articles = $stmt -> fetch();
    return $articles;
}

// Fonction pour obtenir un article avec ses commentaires par son ID
function get_one_article_with_comments($id){
    $pdo = get_PDO();
    $query = ("SELECT a.id, a.title, a.content, c.username, c.comment_text FROM articles as a INNER JOIN comments as c WHERE a.id = ?");
    $stmt = $pdo -> prepare($query);
    $stmt -> execute([$id]);
    $articles = $stmt -> fetch();
    return $articles;
}

// Fonction pour supprimer un article
function delete_article($id){
    $pdo = get_PDO();
    $query = "DELETE FROM articles WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);

    // Supprimer les images associées à l'article s'il y en a
    $directory = 'img_properties'; // Chemin du répertoire des images

    // Vérifier si le répertoire existe
    if (is_dir($directory)) {
        // Obtient la liste des fichiers dans le répertoire
        $files = scandir($directory);

        // Parcours les fichiers pour trouver ceux associés à l'ID de l'article et les supprimer
        foreach ($files as $file) {
            if (strpos($file, "id$id") === 0) { // Vérifie si le nom du fichier commence par "id[ID de l'article]_"
                $filePath = "$directory/$file";
                unlink($filePath); // Supprime le fichier
            }
        }
    }

    // Redirige vers la page d'administration des articles
    header("location: blog_admin_view.php");
}


// Fonction pour vérifier si un utilisateur n'existe pas déjà dans la base de données
function check_user_not_exist($mail){
    $pdo = get_PDO();
    $query = "SELECT mail FROM users WHERE mail = ?";
    $stmt = $pdo -> prepare($query);
    $stmt -> execute([$mail]);
    $nombreUtilisateur = $stmt -> fetchColumn();
    if ($nombreUtilisateur > 0) {
        return false;
    } else {
        return true;
    }
}

// Fonction pour obtenir un extrait de contenu
function get_exerpt($content){
    if(strlen($content) > 200){
        $exerpt = substr($content, 0, 200)."...";
    } else {
        $exerpt = $content;
    }
    return $exerpt;
}

// Fonction pour afficher tous les contenus de la base de données
function afficherContenus() {
    // Connexion à la base de données
    $pdo = get_PDO();

    $sql = "SELECT * FROM users";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($resultats) {
        echo "<h2>Contenu de la base de données :</h2>";
        foreach ($resultats as $row) {
            echo "ID : " . $row['id'] . "<br>";
            echo "Nom : " . $row['lastname'] . "<br>";
            echo "Prénom : " . $row['firstname'] . "<br>";
            // Afficher d'autres colonnes si nécessaire
            echo "<hr>";
        }
    } else {
        echo "Aucun contenu trouvé dans la base de données.";
    }

    // Fermeture de la connexion
    $pdo = null;
}
?>

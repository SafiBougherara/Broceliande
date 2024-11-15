# Fonctions PHP pour un site immobilier

Ce fichier `functions.php` contient un ensemble de fonctions PHP destinées à la gestion d'un site immobilier. Ces fonctions couvrent plusieurs fonctionnalités essentielles, y compris la gestion des annonces, des ventes et des locations, ainsi que la gestion des rôles pour les utilisateurs, les vendeurs et les loueurs.

## Fonctions principales

### `get_PDO()`

Retourne une instance PDO pour se connecter à la base de données.

### `sign_up($mail, $password, $firstname, $lastname, $role)`

Permet l'enregistrement d'un nouvel utilisateur avec un rôle spécifique (utilisateur, vendeur ou loueur).

### `sign_in($mail, $password)`

Connecte un utilisateur en vérifiant ses identifiants.

### `add_article($title, $address, $content, $category, $price, $surface, $pieces, $user_id)`

Ajoute une nouvelle annonce à la base de données, avec des détails spécifiques tels que le titre, l'adresse, le contenu, etc.

### `add_comment($firstname, $lastname, $mail, $comment, $user_id, $article_id)`

Permet aux utilisateurs de laisser des commentaires sur les annonces existantes.

### `delete_article($id)`

Supprime une annonce de la base de données, ainsi que tous les commentaires associés.

## Fonctions spécifiques au site immobilier

- `article_owned_by_user($user_id, $article_id)`: Vérifie si une annonce appartient à un utilisateur donné.
- `get_all_comments()`: Obtient tous les commentaires de la base de données pour affichage ou gestion.
- `update_article($id, $title, $address, $category, $price, $surface, $pieces, $content, $user_id)`: Met à jour les détails d'une annonce existante.
- `get_all_articles()`: Obtient toutes les annonces pour affichage sur le site.
- `get_all_articles_admin()`: Obtient toutes les annonces à des fins d'administration.
- `get_one_article($id)`: Obtient les détails d'une annonce spécifique par son identifiant.
- `get_one_article_with_comments($id)`: Obtient une annonce avec ses commentaires associés.
- `delete_comment($id)`: Supprime un commentaire spécifique de la base de données.

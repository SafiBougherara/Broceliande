<?php

include_once ('functions.php');

if (isset($_POST['add_comment']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['mail']) && !empty($_POST['comment']) && !empty($_POST['user_id']) && !empty($_POST['article_id'])) {

    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $mail = htmlspecialchars($_POST['mail']);
    $comment = htmlspecialchars($_POST['comment']);
    $user_id = htmlspecialchars($_POST['user_id']);
    $article_id = htmlspecialchars($_POST['article_id']);
    add_comment($firstname, $lastname, $mail, $comment, $user_id, $article_id);
}
else {
    header("location:article.php");
}
?>
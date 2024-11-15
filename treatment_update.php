<?php

include_once ('functions.php');

if (isset($_POST['submit_update']) && !empty($_POST['title'])&& !empty($_POST['adress']) && !empty($_POST['category']) && !empty($_POST['price']) && !empty($_POST['surface'])&& !empty($_POST['pieces']) && !empty($_POST['content'])&& $_SESSION['connected'] == true) {
    $title = htmlspecialchars($_POST['title']);
    $adress = htmlspecialchars($_POST['adress']);
    $category = htmlspecialchars($_POST['category']);
    $price = htmlspecialchars($_POST['price']);
    $surface = htmlspecialchars($_POST['surface']);
    $pieces = htmlspecialchars($_POST['pieces']);
    $content = htmlspecialchars($_POST['content']);
    $user_id = get_id_by_username($_SESSION['mail']);
    $id = htmlspecialchars($_POST['id']);
    update_article($id, $title, $adress, $category, $price, $surface, $pieces, $content, $user_id);
}
else {
    header("location:updatepost.php");
}
?>
<?php
include_once ('functions.php');

if (isset($_POST['submit_add']) 
&& !empty($_POST['title'])
&& !empty($_POST['adress']) 
&& !empty($_POST['content'])
&& !empty($_POST['category'])
&& !empty($_POST['price']) 
&& !empty($_POST['surface']) 
&& !empty($_POST['pieces'])
&& $_SESSION['connected'] == true) {
    $title = htmlspecialchars($_POST['title']);
    $adress = htmlspecialchars($_POST['adress']);
    $content = htmlspecialchars($_POST['content']);
    $category = htmlspecialchars($_POST['category']);
    $price = htmlspecialchars($_POST['price']);
    $surface = htmlspecialchars($_POST['surface']);
    $pieces = htmlspecialchars($_POST['pieces']);
    $user_id = get_id_by_username($_SESSION['mail']);
    add_article($title,$adress, $content,$category, $price, $surface, $pieces, $user_id);
}
else {
    header("location:addpost.php");
}
?>
<?php

include_once('functions.php');

if (isset($_POST['delete'])&& !empty($_POST['id'])) {
    $id = htmlspecialchars($_POST['id']);
    delete_comment($id);
}
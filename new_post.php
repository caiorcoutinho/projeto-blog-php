<?php

use Caiorcoutinho\Peagape\Post;
require "vendor\autoload.php";


if (isset($_POST['title'], $_POST['content'], $_POST['tags'])){
    $title = $_POST['title'];
    if ($_FILES['img']['error'] != 4){
        $img_path = __DIR__.'\uploads'.'\\'.uniqid().$_FILES['img']['name'];
    }else{
       $img_path = '';
    }
    move_uploaded_file($_FILES['img']['tmp_name'], $img_path);
    $content = $_POST['content'];
    $tags = explode(',', $_POST['tags']);
    $post = new Post($title, $img_path, $content, $tags);
    header('location: index.php?success=true');
}


include __DIR__.'/includes/header.html';
include __DIR__.'/includes/form_new_post.php';
include __DIR__.'/includes/footer.html';

?>
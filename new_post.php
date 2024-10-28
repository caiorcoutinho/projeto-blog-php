<?php

require "vendor\autoload.php";

use Caiorcoutinho\Peagape\Post;

if (isset($_POST['title'], $_POST['content'])){
    $title = $_POST['title'];
    if ($_FILES['img']['error'] != 4){
        $img_path = __DIR__.'\uploads'.'\\'.uniqid().$_FILES['img']['name'];
    }else{
       $img_path = null;
    }
    move_uploaded_file($_FILES['img']['tmp_name'], $img_path);
    $content = $_POST['content'];
    $post = new Post();
    $post->setPost($title, $img_path, $content);
    $post->publish();
    header('location: index.php?success=true');
}


include __DIR__.'/includes/header.html';
include __DIR__.'/includes/form_new_post.php';
include __DIR__.'/includes/footer.html';

?>
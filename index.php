<?php 
require "vendor\autoload.php";
use Caiorcoutinho\Peagape\Post;
$posts = Post::getPosts();

include __DIR__.'/includes/header.html';
echo "<main>"; include __DIR__.'/includes/home.php'; "<\main>";
include __DIR__.'/includes/footer.html';

?>
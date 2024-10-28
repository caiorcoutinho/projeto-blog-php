<?php 

echo "<h3> Blog em PHP </h3>";

$blog_posts = '';
foreach ($posts as $post){
    $img = is_null($post->getImgPath()) ? '' : '<img src='.$post->getImgPath().'> <br>';
    $blog_posts.='<h3>'.$post->getTitle().'</h3><br>'
                 .$img.
                 '<p>'.$post->getContent().'</p><br>
                 <br>';
}

echo $blog_posts;

?>
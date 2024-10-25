<?php 

declare (strict_types=1);
namespace Caiorcoutinho\Peagape;

class Post {
    public function __construct(
        private string $title, 
        private string $img_path, 
        private string $content, 
        private array $tags
        ){}
}

?>
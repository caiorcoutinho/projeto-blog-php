<?php 

declare (strict_types=1);
namespace Caiorcoutinho\Peagape;

use PDO;

class Post {

    private string $title;
    private string|null $img_path;
    private string $content; 
    private string $date;

    public function publish() {
        $this->date = date('Y-m-d H:i:s');
        $database = new Database('posts');
        $database->create([
            'title' => $this->title,
            'img' => $this->img_path,
            'content' => $this->content,
            'date' => $this->date
        ]);
    }
    
    public function setPost(string $title, string|null $img_path = null, string $content): void {
        $this->title = $title;
        $this->img_path = $img_path;
        $this->content = $content;
    }

    public static function getPosts(
        string|null $where = null, 
        string|null $order = null,
        string|null $limit = null
        ): array {
            return (new Database('posts'))->read($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }
    
    public function getTitle(): string {
        return $this->title;
    }
    public function getImgPath(): string|null {
        $this->img_path = isset($this->img_path) ? $this->img_path : null;
        return $this->img_path;
    }
    public function getContent(): string {
        $this->content = nl2br($this->content);
        return $this->content;
    }
    public function getDate(): string {
        return $this->date;
    }
}

?>
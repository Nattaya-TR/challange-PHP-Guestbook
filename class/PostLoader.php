<?php
declare(strict_types=1);

class PostLoader {
    private array $guestbookFile = [];



    public function readFromFile() {
        $serialize = file_get_contents("guestbook.txt");
        $posts = unserialize($serialize);
        $this->guestbookFile = $posts;

        return $this->guestbookFile;
    }

    public function writeToFile(Post $post)  {
        array_push($this->guestbookFile,$post);
        $serialize = serialize($this->guestbookFile);
        file_put_contents("guestbook.txt", $serialize);
        //header('Location:http://becode.local/challange-PHP-Guestbook');
    }





}
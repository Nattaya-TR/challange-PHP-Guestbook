<?php
declare(strict_types=1);

class Post {
    private string $title;
    private string $date;
    private string $content;
    private string $authorName;

    public function __construct(string $title, string $content, string $authorName) {
        $this->title = $title;
        $this->date = date('l js\of F Y h:i A');
        $this->content = $content;
        $this->authorName = $authorName;
    }

    public function toArray() : array {
        return [
            "name" => $this->name,
            "date" => $this->date,
            "content" => $this->content,
            "authorName" => $this->authorName,
        ];
    }

    public function getTitel() : string
    {
        $this->title;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getAuthorName(): string
    {
        return $this->authorName;
    }


}

<?php
class Book {
    private $title;
    private $isbn;
    private $author;
    private $publishYear;

    function __construct($title, $isbn, $author, $publishYear) {
        $this->title = $title;
        $this->isbn = $isbn;
        $this->author = $author;
        $this->publishYear = $publishYear;
    }

    function getTitle() {
        return $this->title;
    }
    
    function getIsbn() {
        return $this->isbn;
    }

    function getAuthor() {
        return $this->author;
    }

    function getPublishYear() {
        return $this->publishYear;
    }
}
?>
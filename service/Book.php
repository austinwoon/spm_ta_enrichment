<?php
class Book {
    public $title;
    public $isbn;
    public $author;
    public $publishYear;

    function __construct($title, $isbn, $author, $publishYear) {
        $this->title = $title;
        $this->isbn = $isbn;
        $this->author = $author;
        $this->publishYear = $publishYear;
    }
}
?>
<?php

require_once 'common.php';

$content = file_get_contents("php://input");    // to read POST data from request body
$request = json_decode($content);      // $request is an object with title, isbn, author, publishYear attributes      

$dao = new BookDAO();
$title = $request->title;
$isbn = $request->isbn;
$author = $request->author;
$publishYear = $request->publishYear;

$list = $dao->updateBook($title, $isbn, $author, $publishYear);    // returns Book objects

if ($list == True) {
    $response = [
        "status"=>"success"
    ];
} else { 
    $response = [
        "status"=>"failed"
    ];
}
        
header('Content-Type: application/json');
echo json_encode($response, JSON_PRETTY_PRINT);

?>
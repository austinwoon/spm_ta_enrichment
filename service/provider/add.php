<?php

require_once 'common.php';

$content = file_get_contents("php://input");    // to read POST data from request body
$request = json_decode($content);      // $request is an object with title, isbn, author, publishYear attributes      

$dao = new BookDAO();
$title = $request->title;
$isbn = $request->isbn;
$author = $request->author;
$publishYear = $request->publishYear;

$list = $dao->createBook($title, $isbn, $author, $publishYear);    // returns Book objects

// test if crud is working
// foreach($list as $book) {
//     echo "<table border='1'>
//         <tr>
//             <td>$book->title</td>
//             <td>$book->isbn</td>
//             <td>$book->author</td>
//             <td>$book->publishYear</td>
//         </tr>
//     </table>";
// }

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
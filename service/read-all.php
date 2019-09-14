<?php

require_once 'common.php';

$dao = new BookDAO();
$list = $dao->getAllBooks();    // returns Book objects

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

$result = [
            "status"=>"success",
            "result"=>array_values($list)
        ];
        
header('Content-Type: application/json');
echo json_encode($result, JSON_PRETTY_PRINT);

?>
<html>
    <body>
        <?php 
        echo "<h2><a href='add-view.php'>Add Book</a></h2>";
        ?>
        
        <h1>Book Listing</h1>
        <?php

        $json_url = "http://localhost/service/provider/retrieve.php/";
        $json_response = file_get_contents($json_url);
        $php_response = json_decode($json_response);        
        $book_objects = $php_response->result;         

        echo "<table border='1'>
            <th> Title </th>
            <th> ISBN </th>
            <th> Author </th>
            <th> Publish Year </th>";
            
        foreach($book_objects as $book) {
            echo "<tr>
                <td>$book->title</td>
                <td>$book->isbn</td>
                <td>$book->author</td>
                <td>$book->publishYear</td>
            </tr>";
        }
        echo "</table>";

        ?>
    </body>
</html>
<?php

require_once 'common.php';

?>

<html>
    <body>        
        <h1>Add Book</h1>

        <?php
        if(!isset($_REQUEST['submit'])) {
            echo "<form action='add-view.php' method='post'>";
                echo "<table>
                        <tr>
                            <td> Title </td>
                            <td> <input type='text' name='title'/> </td>
                        <tr> 
                        <tr>
                            <td> ISBN </td>
                            <td> <input type='text' name='isbn'/> </td>
                        </tr>
                        <tr>
                            <td> Author </td>
                            <td> <input type='text' name='author'/> </td>
                        </tr>
                        <tr>
                            <td> Publish Year </td>
                            <td> <input type='text' name='publishYear'/> </td>
                        </tr>
                    </table>

                    <input name='submit' type='submit'/>
                </form>";

        } else {
            // 1) send the request 
            $title = $_POST['title'];
            $isbn = $_POST['isbn'];
            $author = $_POST['author'];
            $publishYear = $_POST['publishYear'];

            $json_curl = curl_init("http://localhost/service/add.php/");
            $php_data = array(
                'title' => $title, 
                'isbn' => $isbn, 
                'author' => $author,
                'publishYear' => $publishYear);
            $json_data = json_encode($php_data);
            curl_setopt($json_curl, CURLOPT_POST, 1);   // tell curl we want to do a POST request
            curl_setopt($json_curl, CURLOPT_POSTFIELDS, $json_data);    // attach json data to the curl
            curl_setopt($json_curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));  // standard
            $result = curl_exec($json_curl);   // execute the request
        }
        ?>
    </body>
</html>
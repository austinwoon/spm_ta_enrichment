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
            $title = $_POST['title'];
            $isbn = $_POST['isbn'];
            $author = $_POST['author'];
            $publishYear = $_POST['publishYear'];

            $json_url = "http://localhost/service/provider/add.php/";
            $ch = curl_init();      // open connection 
            $php_data = array(
                'title' => $title, 
                'isbn' => $isbn, 
                'author' => $author,
                'publishYear' => $publishYear);
            $json_data = json_encode($php_data);
            curl_setopt($ch, CURLOPT_URL, $json_url);
            curl_setopt($ch, CURLOPT_POST, 1);   // tell curl we want to do a POST request
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);    // attach json data to the curl
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));  // standard
            $result = curl_exec($ch);   // execute the request
            curl_close($ch); 
        }
        ?>
    </body>
</html>
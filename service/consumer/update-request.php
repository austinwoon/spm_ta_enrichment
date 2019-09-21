<html>
<body>        
    <h1>Update Book</h1>

    <?php
        $title = $_POST['title'];
        $isbn = $_POST['isbn'];
        $author = $_POST['author'];
        $publishYear = $_POST['publishYear'];

        $json_url = curl_init("http://localhost/spm_ta_enrichment/service/provider/update.php/");   // initiate curl 
        $php_data = array(
            'title' => $title, 
            'isbn' => $isbn, 
            'author' => $author,
            'publishYear' => $publishYear);
        $json_data = json_encode($php_data);
        curl_setopt($json_url, CURLOPT_POST, 1);   // tell curl we want to do a POST request
        curl_setopt($json_url, CURLOPT_POSTFIELDS, $json_data);    // attach json data to the curl
        curl_setopt($json_url, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));  // standard
        curl_setopt($json_url, CURLOPT_RETURNTRANSFER, true); // return the string of curl_exec()
        $result = curl_exec($json_url);   // execute the request
        $result = json_decode($result, TRUE);  // decode from json to php 

        if ($result["status"] == "success") {
            header("Location:retrieve-view.php");
        } else {
            echo "Unsuccessful";
        }
    ?>
</body>
</html>
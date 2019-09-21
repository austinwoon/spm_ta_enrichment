<html>
    <body>        
        <h1>Update Book</h1>

        <?php
            echo "<form action='update-request.php' method='post'>";
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
        ?>
    </body>
</html>
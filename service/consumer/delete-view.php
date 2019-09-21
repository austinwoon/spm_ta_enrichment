<html>
    <body>        
        <h1>Delete Book</h1>

        <?php
            echo "<form action='delete-request.php' method='post'>";
                echo "<table>
                        <tr>
                            <td> ISBN </td>
                            <td> <input type='text' name='isbn'/> </td>
                        </tr>
                    </table>

                    <input name='submit' type='submit'/>
                </form>";
        ?>
    </body>
</html>
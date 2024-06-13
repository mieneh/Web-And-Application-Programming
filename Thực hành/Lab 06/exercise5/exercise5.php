<?php
session_start(); 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Exrercise 5</title>
        <style>
            h1 {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <h1>UPLOAD A FILE</h1>
        <form method="POST" action="upload.php" enctype="multipart/form-data">
            <input type="file" name="uploadedFile"/>
            <br></br>
            <input type="submit" name="uploadBtn" value="Upload" />
        </form>

        <br></br>
        <?php
            if (isset($_SESSION['message']) && $_SESSION['message']){
                printf('<b>%s</b>', $_SESSION['message']);
                unset($_SESSION['message']);
            }
        ?>
    </body>
</html>
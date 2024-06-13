<!doctype html>
<html lang="en">
    <head>
        <title>Exercise 1</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body>
        <style>
            body {
                height: 600px;
                position: absolute;
                left: 30%;
                top: 30%;
                transform: translate(-30%, -30%);
            }
        </style>
        <table border="1">
            <tr>
                <?php
                    for($i = 1; $i <= 10; $i++) {
                        echo " <td> ";
                        for($j = 1; $j <= 10; $j++) {
                            echo " $i x $j = ".($i*$j)." <br>";
                        }
                        echo " </td> ";
                    }
                ?>
            </tr>
        </table>
    </body>
</html>
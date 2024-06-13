<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        body {
            width: 100%;
            height: 100%;

        }
        table{
            margin: 0 auto;
            margin-top: 100px;
        }
        td{
            padding: 10px 15px;
            font-size: 15px;
            font-weight: bold;
        }
        label{
            margin: 0 auto;
        }

        .A{
            background-color: #0000FF;
            color: black;
        }
        .A:hover{
            background: pink;
            color: white;
        }
        .B{
            background-color: #00FF00;
            color: black;
        }
        .B:hover{
            background: pink;
            color: white;
        }
        .C{
            background-color: #FFFF00;
            color: black;
        }
        .C:hover{
            background: pink;
            color: white;
        }

    </style>
</head>
<body>
    <script>
        // $(document).ready(function() {
        //     const rows = document.querySelectorAll(".row")

        //     var row_cur = function(manual)
        //     {
        //         rows.forEach((row) => {
        //             row.classList.remove("active");
        //         });
        //         rows[manual].classList.add("active");
        //     };
        //     rows.forEach((row , i) => {
        //         row.addEventListener("mouseover", ()=> {
        //             row_cur(i);
        //         });
        //     });
        // });
    </script>
    <!-- <form action="" method="post">
        <label for="">Enter number rows:<input type="number" name="row"></label>

        <button type="button" name="submit">Submit</button>
    </form> -->

    <table border="1" style="display: normal;">

        <?php
            // require_once("exercise1.php");
            // $num = $_POST['row'];
            // echo $num;
            // if(!empty($_POST['number_row']) & isset($_POST['submit']))
            // {
            //     echo "A";
            // }
            // $arr = array('#0000FF','#00FF00','#FFFF00');
            // for ($i = 0 ; $i < count($arr); $i++){
            //     echo $i;
            // }
            $i = 1;
            while($i <= 10){
                
                    echo "<tr class ='A'>
                            <td>$i</td>
                            <td>Sinh Viên $i</td>
                            </tr>";
                    $i++;
                    if($i > 10){break;}
                    echo "<tr class ='B'>
                            <td>$i</td>
                            <td>Sinh Viên $i</td>
                            </tr>";
                    $i++;
                    if($i > 10){break;}
                    echo "<tr class ='C'>
                            <td>$i</td>
                            <td>Sinh Viên $i</td>
                            </tr>";
                    $i++;
                    if($i > 10){break;}
            }
            
        ?>
    </table>
</body>
</html>
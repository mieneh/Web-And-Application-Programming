<!doctype html>
<html lang="en">
    <head>
        <title>Exercise 2</title>
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
            color {
                color: red;
            }
        </style>

        <div class="container">
            <form action="" method = "get">
                <h4>Tính toán</h4>
                <p>Số hạng 1 <input type="nummber" name="num1"><br></p>
                <p>Số hạng 2 <input type="nummber" name="num2"><br></p>
                <div class="form-group">
                    <label><input type="radio" name = "pheptinh" value ="+"> Cộng </label>
                    <label><input type="radio" name = "pheptinh" value="-"> Trừ </label>
                    <label><input type="radio" name = "pheptinh" value="*"> Nhân </label>
                    <label><input type="radio" name = "pheptinh" value="/"> Chia </label>
                </div>

                <?php 
                    if (!empty($_GET['num1']) and !empty($_GET['num2']) and !empty($_GET['pheptinh'])) {
                        echo "Kết quả: ";
                        $num1 = (int)$_GET['num1'];
                        $num2 = (int)$_GET['num2'];
                        if ($_GET['pheptinh'] == '+') {
                            echo $num1 . " + " . $num2 . " = "  . ($num1 + $num2);
                        } else if ($_GET['pheptinh'] == '-') {
                            echo $num1." - ".$num2." = " . ($num1 - $num2);
                        } else if ($_GET['pheptinh'] == '*') {
                            echo $num1." x ".$num2." = " . ($num1 * $num2);
                        } else if ($_GET['pheptinh'] == '/') {
                            echo $num1." / ".$num2." = " . ($num1 / $num2);
                        }
                    } else {
                        echo " ";
                    }
                ?>
                <br></br>
                <button type="submit" name = "ketqua">Xem kết quả</button>
                <br></br>
                
                <?php 
                    if(empty($_GET['num1']) && empty($_GET['num2']) && empty($_GET['pheptinh'])) {
                        echo "<color>Dữ liệu không hợp lệ.</color>";
                        return;
                    } else if(!is_numeric($_GET['num1']) && !is_numeric($_GET['num2'])) {
                        echo "<color>Dữ liệu không phải là số.</color>";
                        return;
                    } else {
                        if(empty($_GET['num1'])) {
                            echo "<color>Bạn chưa nhập dữ liệu số hạng 1.</color>";
                        } else if(empty($_GET['num2'])) {
                            echo "<color>Bạn chưa nhập dữ liệu số hạng 2.</color>";
                        } else if(empty($_GET['pheptinh'])) {
                            echo "<color>Bạn chưa chọn dữ liệu phép tính.</color>";    
                        }
                        else {
                            echo "";
                        }  
                    }
                ?>
            </form>
        </div>
    </body>
</html>
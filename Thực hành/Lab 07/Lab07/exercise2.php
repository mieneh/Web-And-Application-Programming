<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Files</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<style>
    tr.header{
        font-weight: bold;
        color: white;
        background-color: deepskyblue;
    }

    td{
        padding: 10px;
    }

</style>

<script>

    $(document).ready(function () {
        
        $('.delete').on("click", function(e) {
            const tmp = e.target.parentElement.parentElement;
            tmp.remove();
            const del = tmp.querySelector(".choose").innerHTML;



        // Gửi giá trị tmp lên server
        $.ajax({
            url: 'upload.php', // Đường dẫn đến file PHP khác
            type: 'POST', // Phương thức gửi yêu cầu
            data: {delete: del}, // Dữ liệu gửi đi
            success: function(response) { // Xử lý kết quả trả về
                console.log(response);
            },
            error: function(xhr, status, error) { // Xử lý lỗi (nếu có)
                console.error(error);
            }
            });        
        });

        $(".rename").click(function (e) {
            const tmp1 = e.target.parentElement.parentElement;

            const now = tmp1.querySelector(".choose").innerHTML;

            $(".present").focus().select().val(now);

            $('#myModal').modal({
                backdrop: 'static',
                keyboard: false
            });

            $('#save').click(function(e){
                if($('.present') !="")
                {
                    new_name = $('.present').val();
                }
                // console.log(tmp1);
                // console.log(new_name);

                $.ajax({
                    url: 'upload.php', // Đường dẫn đến file PHP khác
                    type: 'POST', // Phương thức gửi yêu cầu
                    data: {rename: now ,newname: new_name}, // Dữ liệu gửi đi
                    success: function(response) { // Xử lý kết quả trả về
                        console.log(response);
                    },
                    error: function(xhr, status, error) { // Xử lý lỗi (nếu có)
                        console.error(error);
                    }
                });   
            });
     
      

        });

        $('.choose').on('click', function(e) {
            // console.log(e.target);
            const tmp2 = e.target.parentElement.parentElement;

            const x = tmp2.querySelector(".choose").innerHTML;
            var y  = tmp2.querySelector(".choose");

            $.ajax({
                url: 'upload.php', // Đường dẫn đến file PHP khác
                type: 'POST', // Phương thức gửi yêu cầu
                data: {inf: x}, // Dữ liệu gửi đi
                success: function(response) { // Xử lý kết quả trả về
                    y.innerHTML = response;
                },
                error: function(xhr, status, error) { // Xử lý lỗi (nếu có)
                    console.error(error);
                }
            });      




        });


    });


</script>


<br>
<div style="width: 300px; margin: auto; margin-bottom: 50px">

    <form action="upload.php" method="post">
        <input type="text">
        <input type="submit" value="New folder" name="submit_create">
    </form>

    <br>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="fileUpload" id="fileUpload">
        <input type="submit" value="Upload File" name="submit1" >
    </form>

</div>



<table border="1" cellpadding="15" cellspacing="10" style="text-align: center; margin: auto; border-collapse: collapse">
    <tr>
        <td colspan="6">
            <button>Back</button>
        </td>
    </tr>
    <tr class="header">
        <td>Icon</td>
        <td>File name</td>
        <td>Type</td>
        <td>Last modified</td>
        <td>File size</td>
        <td>Action</td>
    </tr>
    <!-- <tr>
        <td><img src="images/Folder-icon.png"></td>
        <td><a href="#">Music</a></td>
        <td>Folder</td>
        <td>14/10/2017</td>
        <td>-</td>
        <td><a href="#" class="rename">Rename</a> | <a href="#">Delete</a></td>
    </tr>
    <tr>
        <td><img src="images/mp4-icon.png"></td>
        <td><a href="#">Thor 3 HD 720p.mp4</a></td>
        <td>Video</td>
        <td>14/10/2018</td>
        <td>1.2 GB</td>
        <td><a href="#" class="rename">Rename</a> | <a href="#">Delete</a></td>
    </tr> -->
    <?php
        $dir = 'drive/';

        $files = scandir($dir);

        echo "<tr>";
        foreach($files as $file){
            // echo $file;
            if ($file != '.' && $file != '..'){
                $fileUpload_type = strtolower(pathinfo($file,PATHINFO_EXTENSION));
                // echo $fileUpload_type;
                if($fileUpload_type == '')
                {
                    $fileUpload_type = "folder";
                }
                $src = "./images/Folder-icon.png";
                if($fileUpload_type == "mp3"){
                    $src= "./images/audio-x-generic-icon.png";
                }
                if($fileUpload_type == "mp4"){
                    $src = "./images/mp4-icon.png";
                }
                if($fileUpload_type == "txt"){
                    $src = "./images/text-x-tex-icon.png";
                }
                if($fileUpload_type == "folder"){
                    $src = "./images/Folder-icon.png";
                }
                if($fileUpload_type == "zip"){
                    $src= "./images/document-compress-icon.png";
                }
                if($fileUpload_type == "docx"){
                    $src= "./images/docx.jpg";
                }
                if($fileUpload_type == "jpg" || $fileUpload_type == "png" || $fileUpload_type == "jpeg" || $fileUpload_type == "gif"){
                    $src= "./images/Photo_icon.png";
                }
                $type = 'pytes';
                $path = 'drive/'.$file;
                $size = filesize($path);
                if((int)$size >  1024){
                    $size = (int)($size/1024);
                    $type = "KB";
                    if($size > 1024){
                        $size = (int)($size/1024);
                        $type = "MB";
                        if($size > 1024){
                            $size = (int)($size /1024);
                            $type = "GB";
                        }
                    }
                    
                }

                $last_modified = date("d/m/Y", filemtime($path));

                
        
                echo 
                '<tr>
                    <td><img src="',$src,'"style="height:64px;weight:64px"></td>
                    <td ><a class="choose" href="#">',$file,'</a></td>
                    <td>',$fileUpload_type,'</td>
                    <td>',$last_modified,'</td>
                    <td>',$size,' ',$type,'</td>
                    <td><a href="#" class="rename">Rename</a> | <a href="#" class="delete">Delete</a></td>
                </tr>';
            }

        }



    ?>
</table>


<!-- Rename dialog -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Đổi tên thư mục</h4>
            </div>
            <div class="modal-body">
                <p>Nhập tên mới.</p>
                <input type="text" class = "present">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <button type="button" id ="save" name ="save" class="btn btn-success" data-dismiss="modal">Lưu</button>
            </div>
        </div>
    </div>
</div>
<!-- Rename dialog -->



</body>
</html>
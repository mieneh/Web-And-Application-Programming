<?php

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $path = "./drive/";
    if(isset($_POST['delete']))
    {
      $tmp= $_POST['delete'] ;
      // echo $tmp;
      $path_del = $path.$tmp;
  
      if(is_dir($path_del))
      {
        // rmdir($path_del);
        foreach(scandir($path_del) as $item){
          if(!is_dir($item))
            unlink($path_del."/".$item);
        }
        rmdir($path_del); 
        echo "Xóa thư mục".$path_del ."Thành công";
        echo "folder";
      }
      else{
        if(file_exists($path_del))
        {
          unlink($path_del);
          echo "Xóa file".$path_del ."Thành công";
          echo "file";
        }
      }
    }
    else if(isset($_POST['rename']))
    {
      $tmp= $_POST['rename'] ;
      $new_name = $_POST['newname'];
      // $new_name = $_POST['save'];
      // echo $tmp;
      $path_rename = $path.$tmp;
      $path_newname = $path.$new_name;


      if(file_exists($path_rename)){
        if(rename($path_rename, $path_newname))
        {
          echo "Đổi tên tệp thành công.";
        }else {
            echo "Không thể đổi tên tệp.";
        }
      }
    }
    else if(isset($_POST['inf']))
    {
      $tmp = $_POST['inf'];

      $path_view = $path.$tmp;

      // echo is_dir($path_view);
      // echo $path_view;
      if(is_dir($path_view))
      {
        foreach(scandir($path_view) as $item){
          if(!is_dir($item))
          {
            echo $item."\n";
          }

        }
        echo $tmp;

      }

      else{
        echo $tmp;
      }


    }

  }



 
  if(isset($_POST['submit_create'])){
    $path = $path."New folder";
    if (!is_dir($path)){
      mkdir($path , 0777 , true);
      echo "Tạo thư mục thành công";
    }
    else{
      echo "Thư mục đã tồn tại";
    }
  }

  // Check if image file is a actual image or fake image
  if (isset($_POST["submit1"])){
    $target_dir = $path;
    $target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
    $uploadOk = 1;
    //check file exists
    if(file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }

    //check file size  
    if ($_FILES["fileUpload"]["size"] > 5000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    // Allow certain file formats
    if(
      $imageFileType != "jpg" && 
      $imageFileType != "png" && 
      $imageFileType != "jpeg" &&
      $imageFileType != "gif" &&
      $imageFileType != "docx" &&
      $imageFileType != "txt" &&
      $imageFileType != "zip" &&
      $imageFileType != "mp4" &&
      $imageFileType != "mp3" 
      ) {
      echo "Sorry, type of file is incorrect.";
      $uploadOk = 0;
    }

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
          echo "The file ". htmlspecialchars( basename( $_FILES["fileUpload"]["name"])). " has been uploaded.";
        } else {
          echo "Sorry, there was an error uploading your file.";
        }
      }
  }


?>



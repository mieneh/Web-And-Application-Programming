<?php
session_start();
$message = ''; 
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload') {
  if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {
    // get details of the uploaded file
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    // sanitize file-name
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
    // check if file has one of the following extensions
    $allowedfileExtensions = array('png', 'mp3', 'mp4');
    if (in_array($fileExtension, $allowedfileExtensions)) {
      // directory in which the uploaded file will be moved
      $uploadFileDir = './upload_files/';
      $dest_path = $uploadFileDir . $newFileName;
      if(move_uploaded_file($fileTmpPath, $dest_path)) {
        $message ='File tải lên thành công.';
      } else {
        $message = 'Đã xảy ra lỗi khi tải file lên. Vui lòng đảm bảo rằng thư mục tải lên có thể ghi được bởi máy chủ web.';
      }
    } else {
      $message = 'Tải file lên không thành công.<br> Loại file được phép tải lên: ' . implode(',', $allowedfileExtensions);
    }
  } else {
    $message = 'Có một số lỗi trong quá trình tải file lên. Vui lòng kiểm tra lỗi sau...<br>';
    $message .= 'Error:' . $_FILES['uploadedFile']['error'];
  }
}
$_SESSION['message'] = $message;
header("Location: exercise5.php");
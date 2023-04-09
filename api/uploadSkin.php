<?php
require 'database.php';
if(isset ($_SESSION['logged_user'])){ ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    if ($fileActualExt === 'png') {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileNameNew = $_SESSION['logged_user'] . '.png';
                $fileDestination = '/var/www/skins/skins/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                echo 'File uploaded successfully!';
                $fileUploaded = 1;
                
            } else {
                echo 'Your file is too big!';
            }
        } else {
            echo 'There was an error uploading your file!';
        }
    } else {
        echo 'You cannot upload files of this type!';
    }
}
?>

<?php }else{
    echo 'Error: Auth needed!';
} 

if($fileUploaded === 1){
    ?>
    <script type="text/javascript">
        window.location = "<?php include 'domain.php';?>/account";
    </script> 
    <?php
}




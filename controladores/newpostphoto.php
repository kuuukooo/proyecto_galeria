<?php
session_start();
require "../basededatos/basededatos.php";

$image = "";
$description = $_POST['description'];
date_default_timezone_set('Etc/GMT-4');
$date = date('Y-m-d H:i:s');

//para contar las imagenes que se publican

$countfiles = count($_FILES['files'] ['name']);

//arreglo para guardar los nombres de las imaganes en la base de datos

$images = array();

// para contar la cantidad de archivos que se van a mostrar
if($countfiles > 0) {
//fileTmpPath es el nombre temporal del archivo que se cargará 
    for($i = 0; $i < $countfiles; $i++) {
        $fileTmpPath = $_FILES['files']['tmp_name'][$i];
        $fileName  = $_FILES['files']['name'][$i];
        $fileType = $_FILES['files']['type'][$i];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $newFileName = md5(time() . $fileName) . "." . $fileExtension;
        $image = $newFileName;

        $allowedFileExtensions = array('png','jpg','jpeg');
        if(in_array($fileExtension, $allowedFileExtensions)){
            $uploadFileDir = '../assets/images/posts';
            $dest_path  = $uploadFileDir . $newFileName;
            //comprimir la imagen subida
            $calidad = 40;
            $originalImage = "";
            if($fileExtension == "png"){
                $originalImage = imagecreatefrompng($fileTmpPath);
            } else {
                $originalImage = imagecreatefromjpeg($fileTmpPath);

            }

            if(imagejpeg($originalImage, $dest_path, $calidad)){
                array_push($images, $image);

            }
        }
    } 

    $imagelist = implode(",", $images);

    $sql = 'INSERT INTO posts (image, description, date) VALUES (:images, :description, :date)';
    $stmt = $conn -> prepare($sql);
    
    $stmt ->bindParam(':images', $imagelist);
    $stmt ->bindParam(':description', $description);
    $stmt ->bindParam(':date', $date);


    if($stmt->execute()){
        $respuesta = "Post publicado correctamente";
        $_SESSION['success'] = $respuesta;
        header('location: ../index.php');
    }else {
        $respuesta = "No se pudo publicar el post";
        $_SESSION['error'] = $respuesta;
        header('location: ../index.php');  
    }
}
?>

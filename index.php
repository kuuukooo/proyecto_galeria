<?php
session_start();
require "./controladores/posts.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <title>Galeria de Imagenes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>

     <div class="class container justify-content-center">
        <!--formulario -->    
        <div class="mt-5 mx-auto">
            <div>
                <?php
                if(isset($_SESSION['error'])){
                ?>
                <div class="alert alert-danger alert-dissmisable fade show " role="alert">    
                <?= $_SESSION['error'] ?>
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"> </button>
                </div>
                <?php unset($_SESSION['error']);
                
                } ?>

                <?php
                if(isset($_SESSION['success'])){
                ?>
                <div class="alert alert-success alert-dissmisable fade show " role="alert">
                    <?= $_SESSION['success'] ?>
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"> </button>
                </div>
                <?php unset($_SESSION['success']);
                }?>

                <form action="controladores/newpostphoto.php" method="post" enctype="multipart/form-data">
                <h5 class="mb-3"> Elige la foto que se desea subir y añade una descripcion </h5>
                <div class="d-flex justify-content-between">
                <input type="file" class="form-control mb-3" name="files[]" multiple id="file" accept=".png, .jpg, .jpeg" style="width: 40%" required>
                <textarea name="description" id="description" rows="1" class="form-control mb-3 mx-3" style="resize: null" placeholder="Añade una descripcion" required></textarea>
<button class="btn btn-primary" type="submit" style="width: 20%;" name="btn-new-post-photo"> Publicar </button>
                </div>
                </form>
            </div>
        </div>
     </div>
</body>
</html>

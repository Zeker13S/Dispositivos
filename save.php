<?php

include('db.php');

if (isset($_POST['save'])){

    $name_img = $_FILES["archivo"]["name"];
    $temporal=$_FILES["archivo"]["tmp_name"];
    $carpeta='img';

    $ruta= $carpeta.$id.'/'.$name_img;
    @move_uploaded_file($temporal,$carpeta.$id.'/'.$name_img);

    $dispositivo = $_POST['dispositivo'];
    $modelo = $_POST['modelo'];
    $serie = $_POST['serie'];

    $query = "INSERT INTO objetos(image, dispositivo, modelo, serie) VALUES ('$ruta','$dispositivo', '$modelo', '$serie')";
    $result = mysqli_query($conn, $query);
    if (!$result){
        die("Query Failed");
    }

    $_SESSION['message'] = 'Dispositivo Save Succefully';
    $_SESSION['message_type'] = 'success';
    
    header("location: index.php");

}
<?php
include 'config.php';

        //registro
if (isset($_POST['add'])){
    $name=$_POST['name'];
    $address=$_POST['address'];
    $document=$_POST['document'];
    $email=$_POST['email'];

    //Statement insertar persona
    $query="INSERT INTO personas(NOMBRE,DIRECCION,DOCUMENTO,EMAIL)VALUES(?,?,?,?)";
    $stmt=$conexion ->prepare($query);
    $stmt->bind_param("ssss",$name,$address,$document,$email);
    $stmt->execute();
    $stmt->close();

    $_SESSION['response']="Persona añadida correctamente";
    $_SESSION['resp_type']="success "; //nombre alerta bootstrap
    header('Location:index.php');
    die;
}

        //bajas
if (isset($_GET['delete'])){
    $id = $_GET['delete'];

    //Statement eliminar persona
    $query="DELETE FROM personas WHERE ID_PERSONA=?";
    $stmt=$conexion ->prepare($query);
    $stmt->bind_param("i",$id);
    $stmt->execute();

    $_SESSION['response']="Persona eliminada correctamente";
    $_SESSION['resp_type']="danger ";
    header('Location:index.php');
}

        //MODIFICACION
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    //Statement editar persona
    $query = "SELECT * FROM personas WHERE ID_PERSONA=?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $row = $resultado->fetch_assoc();

    $id = $row['ID_PERSONA'];
    $nombre = $row['NOMBRE'];
    $address = $row['DIRECCION'];
    $document = $row['DOCUMENTO'];
    $email = $row['EMAIL'];


}

    if (isset($_POST['update'])){
        $id=$_POST['id'];
        $name=$_POST['name'];
        $address=$_POST['address'];
        $document=$_POST['document'];
        $email=$_POST['email'];

        //Statement actualizar persona
        $query="UPDATE personas SET NOMBRE=?,DIRECCION=?,DOCUMENTO=?,EMAIL=? WHERE ID_PERSONA=?";
        $stmt=$conexion ->prepare($query);
        $stmt->bind_param("ssssi",$name,$address,$document,$email,$id);
        $stmt->execute();


        $_SESSION['response']="Persona actualizada correctamente";
        $_SESSION['resp_type']="primary "; //nombre alerta bootstrap
        header('Location:index.php');


    }





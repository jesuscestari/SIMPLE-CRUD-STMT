<?php
include 'acciones.php';

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Editar</title>
    <!--JQUERY-->
    <script
        src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!--BOOTSTRAP-->
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script
        src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script
        src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <!-- Los iconos tipo Fontawesome-->
    <link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- css-->
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css"

    <!-- DATA TABLE -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

</head>
<body>

<div class="container d-flex justify-content-center">
                <div class="card card-editar w-50">
                    <div class="card-header">
                        <h4 >Editar Persona</h4>

                    </div>
                    <div class="card-body body-editar">

                        <form action="acciones.php" method="post" class="form" role="form" >
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">ID:</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" name="id" value="<?= $id;  ?>" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Nombre:</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" name="name" value="<?= $nombre;  ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Dirección:</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" name="address" value="<?= $address;  ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Documento:</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" name="document" value="<?= $document;  ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">E-mail:</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="email" name="email"  value="<?= $email;  ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12 text-center">
                                    <input type="submit" name="update" class="btn btn-primary" value="Actualizar">
                                    <a href="index.php" class="btn btn-danger" role="button">Volver</a>
                                </div>
                            </div>
                        </form>
</body>
</html>

<?php

include 'acciones.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>ABM Personas</title>
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
<div class="container">
    <div class="mx-auto col-sm-8 main-section" id="myTab" role="tablist">
        <ul class="nav nav-tabs justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" id="list-tab" data-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="false">Lista</a>
            </li>
            <li class="nav-item" >
                <a class="nav-link" id="form-tab" data-toggle="tab" href="#form" role="tab" aria-controls="form" aria-selected="true">Registro</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="list-tab">
                <div class="card">
                    <div class="card-header">
                        <?php
                        //stmt para listar personas
                        $query = "SELECT * FROM personas";
                        $stmt = $conexion->prepare($query);
                        $stmt->execute();
                        $resultado=$stmt->get_result();
                        ?>
                        <h4>Personas</h4>
                        <?php if (isset($_SESSION['response'])):  ?>
                            <div class="alert alert-<?= $_SESSION['resp_type']; ?>
                        alert-dismissible text-center">
                                <button type="button" class="close" data-dismiss="alert">&times;
                                </button>
                                <?=  $_SESSION['response']; ?>
                            </div>
                        <?php endif; unset($_SESSION['response']); ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="userList" class="table table-bordered table-hover table-striped">
                                <thead class="thead-light">
                                <tr>

                                    <th scope="col">Nombre</th>
                                    <th scope="col">Dirección</th>
                                    <th scope="col">Documento</th>
                                    <th scope="col">E-mail</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php  while ($row = $resultado->fetch_assoc()): ?>
                                <tr>


                                    <td><?= $row['NOMBRE']; ?></td>
                                    <td><?= $row['DIRECCION']; ?></td>
                                    <td><?= $row['DOCUMENTO']; ?></td>
                                    <td><?= $row['EMAIL']; ?></td>
                                    <td>
                                        <a href="editar.php?edit=<?=$row['ID_PERSONA'];?>"><i class="fas fa-edit"></i></a>  |
                                        <a href="acciones.php?delete=<?=$row['ID_PERSONA'];?>" onclick="return confirm('Desea eliminar esta persona?')"><i class=" fas fa-user-times"></i></a>
                                    </td>
                                </tr>
                                <?php  endwhile; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="form" role="tabpanel" aria-labelledby="form-tab">
                <div class="card">
                    <div class="card-header">
                        <h4>Registro de persona</h4>

                    </div>
                    <div class="card-body">
                        <form action="acciones.php" method="post" class="form" role="form" >
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Nombre:</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" name="name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Dirección:</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" name="address" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Documento:</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" name="document" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">E-mail:</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="email" name="email" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12 text-center">
                                    <input type="reset" class="btn btn-secondary" value="Cancelar">
                                    <input type="submit" name="add"  class="btn btn-primary" value="Guardar cambios">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

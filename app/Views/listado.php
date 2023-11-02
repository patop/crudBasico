<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Scrips Js personalizados -->
    
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <title>CRUD Básico CodeIgniter</title>
  </head>
  <body>
    <div class="container">
        <h1>CRUD báscio con CodeIgniter 4</h1>
        <div class="row">
            <div class="col-sm-12">
                <form method="POST" action="<?php echo base_url().'/crear' ?>">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" />
                    <label for="paterno">Apellido Paterno</label>
                    <input type="text" name="paterno" id="paterno" class="form-control" />
                    <label for="materno">Apellido Materno</label>
                    <input type="text" name="materno" id="materno" class="form-control" />
                    <br>
                    <button class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
        <hr>
        <h2>Listado de Personas</h2>
        <div class="row">
                <div class="col-sm-12">
                    <div class="table table-responsive">
                        <table class="table table-hover table-bordered">
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                            <tr>
                            <?php foreach ($datos as $key): ?>
                                <tr>
                                    <td><?php echo $key->nombre ?></td>
                                    <td><?php echo $key->paterno ?></td>
                                    <td><?php echo $key->materno ?></td>
                                    <td><a href="<?php echo base_url()."/obtenerNombre/".$key->id_nombre ?>" class="btn btn-warning btn-sm">Editar</a></td>
                                    <td><a href="<?php echo base_url()."/eliminar/".$key->id_nombre ?>" class="btn btn-danger btn-sm">Eliminar</a></td>
                                </tr>
                            <?php endforeach; ?>
                            </tr>
                        </table>
                    </div>
                </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/JavaScript">
        let mensaje = '<?php echo $mensaje ?>';
        if (mensaje == 1) {
            swal(':D', 'Agregado con exito', 'success');
            
        } else if(mensaje == '0') {
            swal(':(', 'Fallo al Agregar', 'error');
        } else if(mensaje == '2') {
            swal(':D', 'Actualizado con exito', 'success');
        } else if(mensaje == '3') {
            swal(':(', 'Fallo al Actualizar', 'error');
        }else if(mensaje == '4') {
            swal(':D', 'Eliminado con exito', 'success');
        } else if(mensaje == '5') {
            swal(':(', 'Fallo al Eliminar', 'error');
        }
    </script>
  </body>
</html>
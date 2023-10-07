<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap-grid.min.css">

  <title>Arquitectura de software</title>
</head>
<body>

<?php include '../../template/menu.php' ?>

<div class="container-fluid">
  <form action="/miembro" method="post">
    
    <input name="id" value="<?= $cargo['id'] ?? 0 ?>" type="hidden">

    <div class="row">
      <div class="col-12 col-md-4">
        <label for="nombres">Nombres</label>
        <input name="nombres" type="text" id="nombres">
      </div>

      <div class="col-12 col-md-4">
        <label for="apellidos">Apellidos</label>
        <input name="apellidos" type="text" id="apellidos">
      </div>

      <div class="col-12 col-md-4">
        <label for="carnet">Carnet</label>
        <input name="carnet" type="text" id="carnet">
      </div>

      <div class="col-12 col-md-4">
        <label for="celular">Celular</label>
        <input name="celular" type="text" id="celular">
      </div>

      <div class="col-12 col-md-4">
        <label for="fecha_ingreso">Fecha_Ingreso</label>
        <input name="fecha_ingreso" type="text" id="fecha_ingreso">
      </div>

      <div class="col-12 col-md-4">
        <label for="estado">Estado</label>
        <input name="estado" type="text" id="estado">
      </div>

    </div>

    <div class="row mt-3">
      <div class="col-12 d-flex justify-content-end">
        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
      </div>
    </div>
  </form>

  
</div>
  <h1> <?= $title ?> </h1>

  <table>
    <thead>
      <tr>
        <th>Id</th>
        <th>nombres</th>
        <th>apellidos</th>
        <th>Carnet</th>
        <th>FechaIngreso</th>
        <th>Estado</th>
      </tr>
    </thead>

    <?= $tbody ?>

  </table>

</body>

</html>

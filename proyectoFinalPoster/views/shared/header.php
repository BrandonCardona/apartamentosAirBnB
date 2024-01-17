<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/Iaptos.css">
        <title>
        <?= $data['titulo'] ?>
    </title>
</head>

<body>




<nav class="navbar navbar-expand-lg bg-body-tertiary shadow">
  <div class="logo">
    <a class="navbar-brand" href="../index.php"> <img src="imagenes/Captura.png" alt="imagen" style="width: 70px;";></a>

    

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Apartamentos
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php?controlador=apartamento&accion=index">Listar</a></li>
            <li><a class="dropdown-item" href="index.php?controlador=apartamento&accion=insert">Crear uno nuevo</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Clientes
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php?controlador=cliente&accion=index">Listar</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Acciones
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php?controlador=cliente&accion=insert">Registrar arriendo</a></li>
            <li><a class="dropdown-item" href="index.php?controlador=apartamento&accion=calcularTotalAptos">Calcular arriendo de todos los apartamento</a></li>
          </ul>
        </li>
    </div>
  </div>
</nav>
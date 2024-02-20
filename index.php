<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

    <main class="form-signin">
  <form method="post" action="">
    <img class="mb-4" src="./img/logo.jpg" alt="" width="200" height="70">
    <h1 class="h3 mb-3 fw-normal">Iniciar Sesión</h1>
      <?php
      include "./config/connection.php";
      include "./controllers/login_register.php";
      ?>
    <div class="form-floating">
      <input type="test" class="form-control" id="floatingInput" placeholder="name@example.com" name="usuario">
      <label for="floatingInput">Correo</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
      <label for="floatingPassword">Contraseña</label>
    </div>
    <br>
    <input name="btnregistro" class="btn13" type="submit" value="Iniciar Sesión">
    <p class="mt-5 mb-3 text-muted">&copy; Furanshisuko, Inc 2021-2024</p>
  </form>
</main>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
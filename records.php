<?php
  session_start();
  if (empty($_SESSION['id'])) {
    header('location: index.php');
  }

  include "./config/connection.php";
  include "./controllers/RegisterFile.php";

  $dominio = $_SERVER["HTTP_HOST"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<main>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="./records.php">UPQROO</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
<div class="navbar-nav">
    <div class="nav-item text-nowrap">
    <h5 class="nameadmin"><?php echo $_SESSION['docente']; ?>  | <?php echo $_SESSION['directorio']; ?></h5>
    </div>
  </div>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="./controllers/closet_session.php"></a>
    </div>
  </div>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="./controllers/closet_session.php">Cerrar Sesión</a>
    </div>
  </div>
</header>

  
<div class="divgeneral">
<div class="content1">
<?php
  $cpt = $bd -> query("select * from usuarios where usuario = '$usuario'");
  $ubicaci0n = $cpt->fetchAll(PDO::FETCH_OBJ);
  foreach($ubicaci0n as $carpeta){ 
  ?>
  <img class="imgneed" src="./img/<?php echo $carpeta->imagenes; ?>"><?php } ?></div>
<div class="content2">
            <div class="tile">
            <h3 class="tile-title text-center">REGISTRO DE ARCHIVOS</h3>
            <div class="tile-body">
              
              <form class="form-horizontal" method="POST"  enctype="multipart/form-data" >
                <div class="form-group row">
                  <label class="control-label col-md-3">Nombre del archivo:</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="NameFile" placeholder="Introduzca el nombre del archivo" required>
                  </div>
                </div>
                <div class="form-group row"><!--Se va a cambiar-->
                  <label class="control-label col-md-3">Ubicación:</label>
                  <div class="col-md-8">
                    <?php
                     $cpt = $bd -> query("select * from usuarios where usuario = '$usuario'");
                     $ubicaci0n = $cpt->fetchAll(PDO::FETCH_OBJ);
                     foreach($ubicaci0n as $carpeta){ 
                      ?>
                      <input type="hidden" name="directorio" value="<?php echo $carpeta->directorio."/".$carpeta->carpeta; ?>">
                    <input type="button" class="btnR" data-bs-toggle="modal" data-bs-target="#MimodalU" value="<?php echo $carpeta->directorio."/".$carpeta->carpeta; ?>">
                  <?php } ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Archivo:</label>
                  <div class="col-md-8">
                    <input class="form-control" type="file" name="Document" required>
                  </div>
                </div>
                <div class="row">
                <div class="col-md-12 col-md-offset-6">
                  <button name="boton" type="submit" class="btn14" value="Registrar">Obtener URL</button>
                </div>
              </div>
              </form>
            </div>
          </div>
          
</div>
<div class="content3">
  
        </div>
</div>

        <table class="table" id="mitabla">
      <thead class="table-dark">
      <tr>
          
          <th>Fecha</th>
          <th>Nombre del archivo</th>
          <th>URL</th>
        </tr>
      </thead>
      <tbody>
      <?php
        foreach($Document as $dato){
        ?>
        <tr>
   
        <td><?php echo $dato->fecha;?></td>
        <td><?php echo $dato->nombre_archivo;?></td>
        <td><h6><a class="linkrecord" href="<?php echo $dato->ubicacion;?>" target="_blank"><?php echo $host.$dato->ubicacion;?></a></h6></td>
        </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
        

        <!--modal ubicacion-->
                <div  class="modal fade" id="MimodalU" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle2" data-bs-backdrop="static">
                <div  class="modal-dialog modal-m">
                  <div style="background-color: #fff;" class="modal-content">
                    <div class="modal-header">
                      <h3 class="tile-title text-center">UBICACIÓN DEL ARCHIVO</h3>
                      <button style="color:#fff;" type="button" class="btn-close" data-bs-dismiss="modal" arial-label="close"></button>
                    </div>
                    <div class="modal-body">
                    
            
            
              
              <form class="form-horizontal" method="POST"  enctype="multipart/form-data" >
                <div class="form-group">
                    <label for="exampleSelect1">Año</label>
                    <select class="form-control" name="ano" id="exampleSelect1">
                      <?php
                        $anop = $bd -> query("select * from year5 order by ano asc");
                        $anou = $anop->fetchAll(PDO::FETCH_OBJ);
                        foreach($anou as $yea){
                      ?>
                      <option  value="<?php echo $yea->ano;?>"><?php echo $yea->ano; ?></option>
                       <?php 
                      }
                     ?>
                    </select>
                  </div>
                
                <div class="form-group">
                    <label for="exampleSelect1">Trimestre</label>
                    <select class="form-control" name="mes" id="exampleSelect1">
                      <?php
                        $tri = $bd -> query("select * from trimestre order by trimestre asc");
                        $trim = $tri->fetchAll(PDO::FETCH_OBJ);
                        foreach($trim as $mes){
                      ?>
                      <option  value="<?php echo $mes->trimestre;?>"><?php echo $mes->trimestre; ?></option>
                       <?php 
                      }
                     ?>
                    </select>
                  </div>
                  
                <div class="row">
                <div class="col-md-12 col-md-offset-6">
                  <button name="boton" type="submit" class="btn14" value="actualizar">Actualizar</button>
                </div>
              </div>
              </form>
            
          
                    </div>
                  </div>
                </div>
               </div>

    </main>
    <script>
       $(document).ready(function() {
         $('#mitabla').DataTable( {
          language: {
              url: 'http://cdn.datatables.net/plug-ins/1.13.1/i18n/es-MX.json'
          }
      } );
  } );
    </script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
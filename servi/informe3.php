<?php
include_once("encabezadoservi.php");
?>
  <!-- Aqui empieza como tal el reporte -->
  <div class="d-flex w-100" style="height:120vh;">
      <div class="position-absolute text-center divp">
      <center><img class="w-100" src="../img/PNEH.png"><br></center>

        <!--MODIFICAR DESDE ACA!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
        <table width=100% cellspacing=0 cellpadding=0 border=1> 
        <h1>Informe Actividad Usuarios</h1> 
        <thead>
        <tr>
        <th> Identificación del <br> Candidato </th>
        <th> Estado del <br> Candidato</th>
        <th> Ultimo Acceso</th></tr>
        </thead>
          <?php 
          //mandar a llamar el  archivo php con la funcion de conexion
           include_once("conexion.php");
          //crear un objeto conexion usando la funcion conexion 
           $con = conexion();
           //hacer la conexion a la base de datos por medio del objeto conexion
          //redactar la consulta sql

          try {
            $sql = "select pos.NumeroIdentidad,pos.Estadop,pos.UltimoAcceso \n"

            . "               from postulante pos\n";
            //ejecutar la consulta sql, el resultado viene viene en un objeto de tipo statement
            $stm = $con->query($sql); 
            //recorrer todos los registros que vienen en el statement
            //crear un objto para depositar cada fila, pero debemos arrancar desde la primer fila 
            $fila = $stm->fetch();
            //ahora movernos fila por fila hasta llegar al final del statement
            while($fila)
            {
                echo  "<tbody>";
                
                echo  "</tr>";
                echo  "<td>".$fila["NumeroIdentidad"]."</td>";
                echo  "<td>".$fila["Estadop"]."</td>";
                echo  "<td>".$fila["UltimoAcceso"]."</td>";
                
                echo  "</tr>";
              /* MODIFICAR HASTA ACA!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */   

              //pasar a la siguiente fila
              $fila = $stm->fetch();

            }
          } catch (Exception $ex) {
            echo $ex.message;
          }      
          
          ?> <!--FIN DE PHP-->
         </tbody>
        </table>   
    </div>
    </div>
 <!-- Aqui acaba el reporte  -->   
 <?php
include_once("pieservi.php");
?>
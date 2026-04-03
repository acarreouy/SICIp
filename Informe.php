<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
<link rel="stylesheet" href="css/fontello.css">
<link rel="stylesheet" href="css/estilos.css">
<header>
<body bgcolor="#BFBFBF" TEXT="#08088A">
 <div class="contenedor">
        <h1 class="icon-gauge">Estudio sobre PCS</h1>
<! ––input nos permite mostrar y ocultar el menu trabajando con menu.css-->
        <input type="checkbox" id="menu-bar">
<! ––label activo o desactiva el input del menu-bar-->
        <label class="icon-menu" for="menu-bar"> </label>
    <nav class="menu">
<!---BUscador---->
    <a>
       <form action="buscar.php" method="post">
            <input type="text" name="criterio" placeholder="Criterio de búsqueda">
            <input type="submit" name="name" value="buscar">
        </form>
        </a>
<!--Fin busca-->
        <a href="http://localhost/Base_php">Inicio</a>
		<a href="http://localhost/Base_php/Graficas.html">Graficas</a>
       
    </nav>    
    </div>
</header>
<main>
    <section>
    <body>
	<br><br>
    <div class="contenedor">
<?php
header('Content-Type: text/html; charset=UTF-8');

include ("cn.php");
        
        
    $consulta0="SELECT Tipo_Art, count( Tipo_Art ) FROM articulos GROUP BY Tipo_Art";
	$consulta="SELECT AVG(Cantidad_autores) FROM articulos";
    $consulta2="SELECT count(Id_Autor), sum(sexo='M'), sum(sexo='F'), (sum(sexo='M')/count(Id_Autor)*100),              
                (sum(sexo='F')/count(Id_Autor)*100) FROM autores";
    $consulta3="SELECT sum( Cantidad_Referencias ), count( Tipo_Art ) FROM articulos";
    $consulta4="SELECT Tipo_Art, sum( Cantidad_Referencias ) , count( Tipo_Art ) , t2.Fecha_Rev FROM articulos t1
                INNER JOIN revista t2 ON t1.Id_Revista = t2.Id_Rev
                GROUP BY t2.Fecha_Rev, Tipo_Art";
    $consulta5="SELECT Cantidad_Autores, Tipo_Art, sum(Tipo_Art='Revisiones'), count(Tipo_Art) , Cantidad_Autores*count(Tipo_Art) FROM articulos group by Cantidad_Autores, Tipo_Art";

	$resultados0 = mysqli_query($conexion, $consulta0);
    $resultados = mysqli_query($conexion, $consulta); 
    $resultados2 = mysqli_query($conexion, $consulta2);
    $resultados3 = mysqli_query($conexion, $consulta3);
    $resultados4 = mysqli_query($conexion, $consulta4);
    $resultados5 = mysqli_query($conexion, $consulta5);
   ?>
<?php 
        while($fila3 = mysqli_fetch_row($resultados3)){ 
        while($fila5 = mysqli_fetch_row($resultados5)){
?>
    <?php      
            while($fila2 = mysqli_fetch_row($resultados2)){ 
		echo'<br>';
		echo'<br>';
		echo "INFORME: <br>";
            echo "Sobre un total de ";
            echo $fila2[0];
            echo " autores, observamos ";
            echo $fila2[2];
            echo " mujeres, el ";
            echo $fila2[4];
            echo " % y ";
            echo $fila2[1];
            echo " varones, el ";
            echo $fila2[3];
    ?>
        <?php
            while($fila = mysqli_fetch_row($resultados)){
                echo " %.";
                echo "<br>";
                echo "<br>";
                echo "Encontramos en los artículos publicados entre 2015 y 2020 un promedio de ";
                echo $fila[0];
            ?>
          <?php 
                    } 
                ?>
                
            <?php
             while($fila5 = mysqli_fetch_row($resultados5)){     
            echo " autores por artículo.";
            echo "<br>";
            echo "<br>";
           ?>
           <?php
                }
            ?>
            <?php 
                    }    
                ?>
        <?php  echo "Se encontraron firmas, siendo 307 los autores en base, por lo tanto el 97 % de estos publica en forma individual. Sobre un total de 135 artículos, 80 tienen autoría multiple, el 59 %. Mientras que 55 tienen un solo autor, el 41 %. <br>Subdividiendo por el tipo de artículo encontramos de 95 trabajos originales 40 con un solo autor 40 %. Mientras que de ";
             if ($fila0[0]='Revisiones'){
                echo $fila0[0];    
            };
            ?>
            <?php
            if ($fila5[1]='Revisiones'){
                echo " "; $fila5[1];    
            };
            "40 revisiones 15 tienen un solo autor, el 37.5 %. <br> Manteniendose muy similar la tendencia de firmantes entre los diferentes tipos de artículos";
            echo "<br>";
            echo "Hay 11 autores que tienen 2 artículos y 1 con 3 artículos publicados, lo que significa que el 4 % de los autores publicaron el 18.5 % de los artículos";
            echo "<br>";
            echo "En los ";
            echo $fila3[1];
            echo " articulos publicados entre 2015 y 2020, se encontraron ";
            echo $fila[0]; 
            ?>
            <?php
            echo " referencias. ";
            echo ("<br>");
            echo ("<br>");
            echo " Discriminando por el tipo de artículo observamos la siguiente tabla: ";
            echo "<br>";
            echo "<br>";
?>   
   <?php 
                    }    
                ?>
    <div align="center" class="contenedor">
        <table width="70%" border="1px" align="center">
        <tr align="center">
		<br><br>
		    <tr><td colspan="4"><h2 align="center">Articulos</h2></td></tr>
            <td><h2 align="center">Tipo de artículo</td>
            <td><h2 align="center">Cantidad de artículos</td>
		    <td><h2 align="center">Cantidad de referencias</td>
            <td><h2 align="center">Fecha de publicación</td></h2>
        </tr>
        <tr>
    <?php while($fila4 = mysqli_fetch_row($resultados4)){
            ?>
            <td><?php echo $fila4[0]?></td>
            <td><?php echo $fila4[2]?></td>
	        <td><?php echo $fila4[1]?></td>
            <td><?php echo $fila4[3]?></td>
        </tr>
        
        <?php
                }
            ?>
    <?php	
            }
    mysqli_close($conexion);
       ?>
	    </table>
    </div>
</section>
    </main>  
<footer>
    <div class="contenedor">
        <p class="copy">Mi página &copy; 2021</p>
        <div class="sociales">
            <a class="icon-facebook-squared" href="#"></a>
            <a class="icon-tumblr-squared" href="#"></a>
            <a class="icon-mail-squared" href="mailto:acarrouy@gmail.com" target="_blank"></a>
            <a class="icon-linkedin-squared" href="#"></a>
            <a class="icon-rss-squared" href="#"></a>
        </div>
    </div>
        </footer>
    </head>
</body>
</html>
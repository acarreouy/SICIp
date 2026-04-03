<!DOCTYPE html>
<html>
<html>
<head>
<meta charset="utf-8">
<title>Estudios bibliométricos</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
<link rel="stylesheet" href="css/fontello.css">
<link rel="stylesheet" href="css/estilos.css">
<b><hr></hr></b>
<body bgcolor="#BFBFBF" TEXT="#08088A">
<header>
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
    <?php
include ("cn.php");

$consulta="SELECT t1.Fecha_ed, count( t1.Fecha_ed )
FROM referencias t1
INNER JOIN articulos t2 ON t1.Id_Art = t2.Id_Art
INNER JOIN revista t3 ON t2.Id_Revista = t3.Id_Rev
WHERE Fecha_Rev = '2015'
GROUP BY Fecha_ed
ORDER BY `t1`.`Fecha_ed`  DESC";
$resultados=mysqli_query($conexion, $consulta);
    
    ?>
<!--html de la tabla-->
    <main>
    <section>
    <body>
	<br><br>
   <div align="center" class="contenedor">
   <table width="70%" border="1px" align="center">
        <tr align="center">
		<br><br>
		<tr><td colspan="2"><h2 align="center">Referencias</h2></td></tr>
        <td><h2 align="center">Fecha de edición</td>
        <td><h2 align="center">Cantidad de referencias</td>
    </tr>
<!--para ver los resultados usamos mysql_fetch_row  que ve fila a fila lo que hay en $resultados y lo almacena en un array ($fila)-->
<?php while($fila = mysqli_fetch_row($resultados)){
?>
    <tr>
    <td><?php echo $fila[0]?></td>
    <td><?php echo $fila[1]?></td>
        <tr>
     
    <?php	
   }
    mysqli_close($conexion);    
        
?>
     </table>
     <table width="70%" border="1px" align="center">
        <tr align="center">
		<br><br>
		<tr><td colspan="2"><h2 align="center">Price</h2></td></tr>
        <td><h2 align="center">2015</h2></td>
        
<?php while($Price = mysqli_fetch_array($resultados))
{
?>   
   <td><h2 align="center"><?php echo . array_sum($Price) . "\n": ?></h2></td>
    </tr>
 <?php	
   }        
?>  
    <?php	
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
</footer>
    </head>
</body>
</html>
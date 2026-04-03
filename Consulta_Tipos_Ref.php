<?php
include ("cn.php");
   $consulta="SELECT *, count(Tipo) FROM referencias GROUP BY Tipo";

$resultados = mysqli_query($conexion, $consulta);
    
   ?>

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

   <table width="70%" border="1px" align="center">
        <tr align="center">
		<br><br>
		<tr><td colspan="2"><h2 align="center">LISTADO TIPOS DE REFERENCIAS</h2></td></tr>
        <td><h2 align="center">Tipo</td></h2>
        <td><h2 align="center">Cantidad</td></h2>
       
    </tr>
    
    <?php 
        while($fila = mysqli_fetch_row($resultados)){
        ?>
           
                <tr>
                <td><?php echo $fila[3]?></td>
                    <td><center><?php echo $fila[17]?></center></td>
								
            </tr>
        
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
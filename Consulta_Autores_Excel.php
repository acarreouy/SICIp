<?php
header('Content-Type: text/html; charset=UTF-8');
include ("cn.php");

   $consulta="SELECT * FROM autores";

$resultados = mysqli_query($conexion, $consulta);
    
   $libros=array();

while($rows=mysqli_fetch_assoc($resultados)){
$libros[]=$rows;
}
mysqli_close($conexion);
    
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
    
<div class="container">
<div class="well-sm col-sm-12">
<div class="btn-group pull-right">
<meta charset="utf-8">
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
<button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-info">Exportar a Excel</button></form></div></div>
  
   <table width="90%" border="1px" align="center">
        <tr align="center">
		<br><br>
		<tr><td colspan="4"><h2 align="center">LISTADO DE AUTORES</h2></td></tr>
        <td><h2 align="center">Nombre</td>
		<td><h2 align="center">Afiliación</td>
        <td><h2 align="center">Género</td>
        <td><h2 align="center">País</td></h2>
    </tr>

<?php foreach($libros as $libro){?>
           
                <tr>
<td><?php echo $libro['NombreCompleto'];?></td>
<td><?php echo $libro['Afiliacion'];?></td>
<td><?php echo $libro['Sexo'];?></td>
<td><?php echo $libro['Pais'];?></td>
</tr>
    <?php   
        }
     ?>
    </table>
    </div>
<?php  
header('Content-Type: text/html; charset=UTF-8');
if (isset ($_POST["export_data"])){
if(!empty ($libros)){
    $filename="libros.xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=".$filename);
    $mostrar_columnas=false;
    foreach($libros as $libro){
        if(!$mostrar_columnas){ 
implode("\t",array_keys($libro))."\n";
            $mostrar_columnas=true;
        }
implode("\t",array_values($libro))."\n";
        
    }}else{
    echo'No hay datos a exportar';
}
}exit
?>
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
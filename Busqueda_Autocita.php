 <?php
include ("cn.php");

$consulta="SELECT Id_Autor, Apellido, Siglas, Fecha_Rev FROM articulos_autores
INNER JOIN autores ON Id_autores=Id_Autor
INNER JOIN articulos ON Id_articulos=Id_Art
INNER JOIN revista ON Id_Revista=Id_Rev
GROUP BY Apellido";
$resultados=mysqli_query($conexion, $consulta);
    ?>
<!--para ver los resultados usamos mysql_fetch_row  que ve fila a fila lo que hay en $resultados y lo almacena en un array ($fila)-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
            
       <table width="70%" border="1px" align="center">
        <tr align="center">
		<br><br>
		<tr><td colspan="6"><h2 align="center">Auto_citas</h2></td></tr>
       <td><h2 align="center">Id_Autor</td>
        <td><h2 align="center">Autor</td>
        <td><h2 align="center">Id de artículo</td>
        <td><h2 align="center">Año</td>
        <td><h2 align="center">Autor_Ref</td>
        <td><h2 align="center">Id de referencia</td>
</tr>
   <?php while($fila = mysqli_fetch_row($resultados))
{
    
?>
    
    <?php
    $autor = $fila[1];
                
$consulta2="SELECT Id_Art, Id_Ref, Autor_Ref FROM referencias
WHERE Autor_Ref LIKE '%$autor%'";
    $resultados2=mysqli_query($conexion, $consulta2);
        
    ?>
 <?php while($fila2 = mysqli_fetch_row($resultados2))
{
    ?>    
 <tr>
    <td><?php echo $fila[0]?></td>
	<td><?php echo $fila[1],", ", $fila[2]; ?></td>
	<td><?php echo $fila2[0]?></td>
	<td><?php echo $fila[3]?></td>
	<td><?php echo $fila2[2]?></td>
	<td><?php echo $fila2[1]?></td>
<tr>
              
<?php	
}
    ?>
<?php	
}
    mysqli_close($conexion);    
        
?>
</table>
</head>
</html>
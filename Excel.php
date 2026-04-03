<?php
include ("cn.php");
   $consulta="SELECT * FROM autores";

$resultados = mysqli_query($conexion, $consulta);

$libros=array();
while($rows=mysqli_fetch_assoc($resultados)){
$libros[]=$rows;
}
mysqli_close($conexion);
    
   ?>
   
<div class="container">
    <h2>Exportar datos a Excel con PHP y MySQL</h2>
<div class="well-sm col-sm-12">
<div class="btn-group pull-right">
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
<button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-info">Exportar a Excel</button></form></div></div>
<meta charset="utf-8">
 <div class="contenedor">

   <table width="70%" border="1px" align="center">
        <tr align="center">
		<br><br>
		<tr><td colspan="4"><h2 align="center">LISTADO DE AUTORES</h2></td></tr>
        <td><h2 align="center">Nombre</td>
		<td><h2 align="center">Afiliación</td>
        <td><h2 align="center">Género</td>
        <td><h2 align="center">País</td></h2>
        
    </tr>
    
<tbody>
<?php foreach($libros as $libro){?>

<tr>
<td><?php echo $libro['NombreCompleto'];?></td>
<td><?php echo $libro['Afiliacion'];?></td>
<td><?php echo $libro['Sexo'];?></td>
<td><?php echo $libro['Pais'];?></td>
</tr>
<?php } ?>
</tbody>
 </table>
   </div>
<?php  
if (isset ($_POST["export_data"])){
if(!empty($libros)){
    $filename="libros.xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=".$filename);
    $mostrar_columnas=false;
    foreach($libros as $libro){
        if(!$mostrar_columnas){ 
echo implode("\t",array_keys($libro))."\n";
            $mostrar_columnas=true;
        }
        echo implode("\t",array_values($libro))."\n";
    }}else{
    echo'No hay datos a exportar';
}
}exit
?>
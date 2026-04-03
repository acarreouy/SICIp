<!DOCTYPE html>
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
                <input type="checkbox" id="menu-bar">
                    <label class="icon-menu" for="menu-bar"> </label>
                <nav class="menu">
            <a>
        <form action="buscar.php" method="post">
            <input type="text" name="criterio" placeholder="Criterio de búsqueda">
                <input type="submit" name="name" value="buscar">
                    </form>
                        </a>
                    <a href="http://localhost/Base_php">Inicio</a>
                <a href="http://localhost/Base_php/Graficas.html">Graficas</a>                            
            </nav>    
        </div>
    </header>
        <main>
<section>
    <body><br><br>
       <div align="left" class="contenedor">
           <?php
                include ("cn.php");
                    $codigo = $_POST['criterio'];
                        $registros = mysqli_query($conexion, "SELECT t3.NombreCompleto, t3.Pais, t2.Titulo_Articulo, t2.Direccion_Web, t3.Afiliacion, t2.Id_Art, t3.Id_Autor, t3.Apellido, t2.Tema
                            FROM articulos_autores t1
                                inner JOIN articulos t2 ON t1.Id_articulos =  t2.Id_Art
                                    inner JOIN autores t3 ON t1.Id_autores = t3.Id_Autor 
                            WHERE Apellido LIKE '%$codigo%' or NombreCompleto LIKE '%$codigo%' or Tema LIKE '%$codigo%' or      Titulo_Articulo LIKE '%$codigo%' or Pais LIKE '%$codigo%' or Afiliacion LIKE '%$codigo%'");

                        while ($registro = mysqli_fetch_assoc($registros)){

//$registro = call_user_func_array ('array_merge',$array);
//$registro = array_count_values ($registro);
//$registro = array_diff($registro,array(1));
//$registro = array_keys($registro);
    
    echo "* ", $registro["NombreCompleto"], " ", $registro["Apellido"], "<br/>Integrante de: ", $registro["Afiliacion"]," -- ", $registro["Pais"], ".","<br/>", $registro["Titulo_Articulo"], ".","<br/>", $registro["Direccion_Web"], "<br/>Palabras clave: ", $registro["Tema"], ".", "<br/>";
    
        }
       
           mysqli_close($conexion);
                ?>
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
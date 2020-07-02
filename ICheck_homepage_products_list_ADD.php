<html>
<head>
<title>iCheck | products</title>
<link rel="stylesheet" type="text/css" href="estilo.css">
</head>

<body>
  <?php
      include 'db-schema.php';
      $database = new Database();
      $username = $_GET['username'];
   ?>



<center>
<Img SRC ="images/ICheck.jpeg" alt = "iCheck Logo" width = "100px" height = "100px"/>
<h1>Hello</h1>
</center>
<center> <h3> Choose a product</h3> </center>

<FORM action="insertarfavoritos.php"
method ="get">

  <ul class="products">
    <!--Para imprimir vamos a usar un ciclo for, que se va a meter por una sesion de php-->
    <?php
        $GetProductsNoFavs = $database->getProductsNoFavs($username);

        for ($i=0; $i<count($GetProductsNoFavs);$i++){
          echo '<li> <input type="checkbox" name="'.$GetProductsNoFavs[$i]->id_product.'">Name: '.$GetProductsNoFavs[$i]->description.' Category: '.$GetProductsNoFavs[$i]->name_category.'</input></li>';
        }
     ?>
  </ul>
  <br><INPUT STYLE="visibility:hidden;" TYPE="text" NAME="username" VALUE="<?php echo rtrim(ltrim($username)); ?>"></input></br>

  <br> <INPUT TYPE="submit" VALUE="SUMBIT"></br>
</FORM>


</body>
</html>

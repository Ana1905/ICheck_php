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

<FORM action="removerfavoritos.php"
method ="get">

  <ul>
    <!--Para imprimir vamos a usar un ciclo for, que se va a meter por una sesion de php-->
    <?php
        $GetFavourites = $database->getFavourites($username);

        for ($i=0; $i<count($GetFavourites);$i++){
          echo '<li> <input type="checkbox" name="'.$GetFavourites[$i]->id_product.'">Name: '.$GetFavourites[$i]->description.' Category: '.$GetFavourites[$i]->name_category.'</input></li>';
        }
     ?>
  </ul>
  <br><INPUT STYLE="visibility:hidden;" TYPE="text" NAME="username" VALUE="<?php echo $username; ?>"></input></br>

  <br> <INPUT TYPE="submit" VALUE="SUMBIT"></br>
</FORM>


</body>
</html>

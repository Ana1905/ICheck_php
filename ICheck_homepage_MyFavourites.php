<html>
<head>
<title>iCheck | Favourites</title>
<link rel="stylesheet" type="text/css" href="estilo.css">
</head>

<body>
  <?php
      include 'db-schema.php';
      $database = new Database();
      $username = $_GET['username'];
   ?>

   <div id="menu_homepage">
     <nav>
       <ul>
         <li> <a href="ICheck_homepage_MyPurchases.php?username=<?php echo $username;?>">My puchases</a> </li>
        <li> <a href="ICheck_homepage_cupboard.php?username=<?php echo $username;?>">My cupboard</a></li>
        <li> <a href="ICheck_homepage_MyFavourites.php?username=<?php echo $username;?>">My favourites</a></li>
        <li> <a href="ICheck_homepage_MyFavouriteLists.php?username=<?php echo $username;?>">My favourite lists</a> </li>
        <li> <a href="ICheck_homepage_AboutUs.php?username=<?php echo $username;?>">About Us</a></li>
        <li> <a href="ICheck_homepage_settings.php?username=<?php echo $username;?>">settings</a></li>

       </ul>
     </nav>
   </div>

<center>
<Img SRC ="images/ICheck.jpeg" alt = "iCheck Logo" width = "100px" height = "100px"/>
<h1>Hello</h1>
</center>


<center> <h3>Welcome to favourites</h3> </center>

<FORM>
<section>
  <ul>
    <!--Para imprimir vamos a usar un ciclo for, que se va a meter por una sesion de php-->

    <?php
        $GetFavourites = $database->getFavourites($username);

        for ($i=0; $i<count($GetFavourites);$i++){

          echo "<li>Nombre: ".$GetFavourites[$i]->description."</li>";
        }
     ?>

  </ul>
</section>
</FORM>

<a href="ICheck_homepage_products_list_ADD.php?username=<?php echo $username;?>">ADD</a>
<a href="ICheck_homepage_products_list_REMOVE.php?username=<?php echo $username;?>">REMOVE</a>

</body>
</html>

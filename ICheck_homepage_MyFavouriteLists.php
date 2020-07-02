<html>
<head>
<title>iCheck | My favourite lists</title>
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



<center> <h3>Welcome to your favourite lists</h3> </center>

<FORM action="removelist.php"
method ="get">

  <ul class="listas">
    <!--Para imprimir vamos a usar un ciclo for, que se va a meter por una sesion de php-->
    <?php
        $lists = $database->getFavouriteLists($username);

        for ($i=0; $i<count($lists);$i++){
          echo '<li> <input type="checkbox" name="'.$lists[$i]->id_selection.'">List name: '.$lists[$i]->list_name.'</input></li>';
        }
     ?>
  </ul>
  <br><INPUT STYLE="visibility:hidden;" TYPE="text" NAME="username" VALUE="<?php echo rtrim(ltrim($username)); ?>"></input></br>
<br> <INPUT TYPE="submit" VALUE="REMOVE"></br>
</FORM>


</body>
</html>

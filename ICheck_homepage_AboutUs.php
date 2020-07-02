<html>
<head>
<title>iCheck | Home page</title>
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


<center> <h3>About US </h3>
ICheck is a proyect to help people become smarter buyers. ICheck is an amazing tool that is going to help a lot of families with their economy
<h3> What do we do?</h3>
We give people the oportunity to compare in which supermarket they have the best price to go and buy their products.
<p/>

</center>

</body>
</html>

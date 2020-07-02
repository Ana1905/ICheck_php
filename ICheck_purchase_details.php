<html>
<head>
<title>iCheck | purchase | details</title>
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

<section>
  <ul>
    <!--Para imprimir vamos a usar un ciclo for, que se va a meter por una sesion de php-->
    <?php
        $purchaseID=1;
        $GetProductsForPurchase = $database->getProductsForPurchase($username,$purchaseID);
        for ($i=0; $i<count($GetProductsForPurchase);$i++){
          echo "<li>Producto: ".$GetProductsForPurchase[$i]->description."</li>";
        }
     ?>
  </ul>
</section>

<button style="width:100px;" onclick="location.href='http://localhost/ICheck/ICheck_homepage_MyPurchases.php?username=Ana'">
  DONE
</button>

</body>
</html>

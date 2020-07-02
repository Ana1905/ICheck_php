<?php

include 'db-schema.php';
    $database=new Database();
    $username = $_GET['username'];


    /*$SetFavourites = $database->getProductsNoFavs($username);
    for ($i=0;$i<count($SetFavourites);$i++){
			$id_prod=$SetFavourites[$i]->id_product;

       if(isset($_GET['{$i}'])){
				echo $SetFavourites[$i]->description;
        $database->NewFavouriteProduct($username,$id_prod);
      }
    }
*/
    $favourites = $database->getProductsNoFavs($username);

    for ($i=0; $i<count($favourites); $i++){
        $id_product = $favourites[$i]->id_product;
        $name_product= $favourites[$i]->description;
        if (isset($_GET[$id_product])){

          $result = $database->NewFavouriteProduct($username,$id_product);
          if($result){
            echo "¡Asombroso! ya tienes"." ".$name_product." "."en tus favoritos"." ";
          }
        }
    }
?>

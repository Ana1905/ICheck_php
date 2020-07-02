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
    $favourites = $database->getFavourites($username);
    for ($i=0; $i<count($favourites); $i++){
        $id_product = $favourites[$i]->id_product;
        $name = $favourites[$i]->description;
        if (isset($_GET[$id_product])){

          $result = $database->RemoveFavourites($username,$id_product);
          if($result){
            echo "Se eliminó"." ".$name." "."de tus favoritos"." ";
          }
        }
    }
?>

<?php

include 'db-schema.php';
    $database=new Database();
    $username = $_GET['username'];

    $lists = $database->getFavouriteLists($username);

    for ($i=0; $i<count($lists); $i++){

        $id_selection = $lists[$i]->id_selection;
        $list_name=$lists[$i]->list_name;

        if (isset($_GET[$id_selection])){

          $result = $database->UpdateFavouriteLists($id_selection);

          if($result){

            echo "Se elimino correctamente la lista "." ".$list_name;
          }
        }
    }
?>

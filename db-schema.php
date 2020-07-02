<?php

include 'models.php';

class Database{
	private $connection;

	public function __construct(){
	 	$hostname="localhost";

	 	$database="icheck";
	 	$username="root";
	 	$password="";
		$this->connection = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);
	}

	public function getUser($username, $password){
		$sql = $this->connection->prepare("SELECT * FROM user WHERE user.username = '{$username}' AND user.password = '{$password}' ");
		$sql->execute();
		$table = $sql->fetchAll();
		if (count($table)>0){
			foreach ($table as $row) {
				$usuario = new user();
				$usuario->username = $row['username'];
				$usuario->password = $row['password'];
				return $usuario;
			}
		}
	}

	public function getUserFull($username){
		$query=("SELECT * FROM user WHERE user.username = '{$username}'");

		$sql = $this->connection->prepare($query);
		$sql->execute();
		$table=$sql->fetchAll();

		if (count($table)>0){
			foreach ($table as $row) {
				$usuario = new user();
				$usuario->username = $row['username'];
				$usuario->password = $row['password'];
			  $usuario->email = $row['email'];
				$usuario->name = $row['name'];
			 return $usuario;
			}
		}
	}

	public function getCupboardProducts($username){
			$query = ("SELECT product.description, cupboard.quantity FROM cupboard
			JOIN product ON product.ID_product= cupboard.ID_product
			JOIN user ON user.username= cupboard.username
			WHERE cupboard.username= '{$username}'");

			$sql = $this->connection->prepare($query);
			$sql->execute();
			$table=$sql->fetchAll();
			$array = array();

			if(count($table)>0){
				foreach ($table as $row) {
					$ProductsOnCupboard = new GetProducts_on_cupboard();
					$ProductsOnCupboard->description= $row['description'];
					$ProductsOnCupboard->quantity= $row['quantity'];
					array_push($array, $ProductsOnCupboard);
				}
			}
			return $array;
		}



 public function getPurchases($username){
		 	$query = ("SELECT store.name_store,purchase.ID_purchase, purchase.Date_purchase,purchase.Total FROM purchase JOIN store ON store.ID_store = purchase.ID_store WHERE purchase.username ='{$username}'");

			$sql = $this->connection->prepare($query);
			$sql->execute();
			$table=$sql->fetchAll();
			$array = array();

		 	if (count($table)>0){
		 		foreach ($table as $row) {

		 			$GetPurchases= new GetPurchases();
		 			$GetPurchases->name_store = $row['name_store'];
		 			$GetPurchases->Date_purchase = $row['Date_purchase'];
					$GetPurchases->total=$row['Total'];
					$GetPurchases->ID_purchase=$row['ID_purchase'];
		 			array_push($array,$GetPurchases);

 					}
 	 			}

				return $array;
  		}

//El nombre de la tienda y fecha es lo que quieres mostrar, no? Okey, ahora vamosa imprimir ese

public function getProductsForPurchase($username,$purchaseID){
			$query = ("SELECT product.description FROM purchase	JOIN product ON product.ID_product = purchase.ID_product	WHERE purchase.username ='{$username}' AND purchase.ID_purchase='{$purchaseID}'");

			$sql = $this->connection->prepare($query);
			$sql->execute();
			$table=$sql->fetchAll();
			$array = array();

			if (count($table)>0){
				foreach ($table as $row) {
					$GetProductsForPurchase= new product();
					$GetProductsForPurchase->description = $row['description'];
					array_push($array,$GetProductsForPurchase);
					}
				}
				return $array;
			}


public function getFavourites($username){
			$query = ("SELECT product.description, category.name_category ,favourite.ID_product FROM favourite JOIN product ON product.ID_product = favourite.ID_product JOIN category ON category.ID_category=product.ID_category  WHERE favourite.username ='{$username}'");

			$sql = $this->connection->prepare($query);
			$sql->execute();
			$table=$sql->fetchAll();
			$array = array();

			if (count($table)>0){
				foreach ($table as $row) {
					$GetFavourites= new product();
					$GetFavourites->description = $row['description'];
					$GetFavourites->name_category = $row['name_category'];
					$GetFavourites->id_product = $row['ID_product'];

					array_push($array,$GetFavourites);
					}
				}
				return $array;
		}





public function getFavouriteLists($username){
				$query = ("SELECT selection.list_name,selection.ID_selection FROM selection WHERE selection.username ='Ana' AND selection.feautured=1");

			$sql = $this->connection->prepare($query);
			$sql->execute();
			$table=$sql->fetchAll();
			$array = array();

			if (count($table)>0){
				foreach ($table as $row) {
					$GetFavouriteLists= new selection();
					$GetFavouriteLists->list_name = $row['list_name'];
					$GetFavouriteLists->id_selection = $row['ID_selection'];
					array_push($array,$GetFavouriteLists);
					}
				}
				return $array;
			}

public function getFavouriteListProducts($username, $selection){
			$query = ("SELECT product.description  FROM product JOIN Products_on_list ON Products_on_list.ID_product = product.ID_product JOIN selection ON selection.ID_selection = Products_on_list.ID_selection	WHERE Products_on_list.ID_selection = '{$selection}' AND selection.username ='{$username}'");

			$sql = $this->connection->prepare($query);
			$sql->execute();
			$table=$sql->fetchAll();
			$array = array();

			if (count($table)>0){
				foreach ($table as $row) {
					$GetFavouriteListProducts= new product();
					$GetFavouriteListProducts->description = $row['description'];
					array_push($array,$GetFavouriteListProducts);
					}
				}
				return $array;
       }


public function getProducts(){
			$query = (" SELECT product.description,product.ID_product,category.name_category FROM product JOIN category ON category.ID_category= product.ID_category");

			$sql = $this->connection->prepare($query);
			$sql->execute();
			$table=$sql->fetchAll();
			$array = array();

			if (count($table)>0){
				foreach ($table as $row) {
					$GetProducts= new product();
					$GetProducts->description = $row['description'];
					$GetProducts->name_category = $row['name_category'];
					$GetProducts->id_product = $row['ID_product'];
					array_push($array,$GetProducts);
					}
				}
				return $array;
 			}

			public function getProductsNoFavs($username){
						$query = (" SELECT product.description,product.ID_product,category.name_category FROM product JOIN category ON category.ID_category= product.ID_category WHERE ID_product NOT IN (SELECT favourite.ID_product FROM favourite)");

						$sql = $this->connection->prepare($query);
						$sql->execute();
						$table=$sql->fetchAll();
						$array = array(); //<-- Quejeso

						if (count($table)>0){
							foreach ($table as $row) {
								$GetProductsNoFavs= new product();
								$GetProductsNoFavs->description = $row['description'];
								$GetProductsNoFavs->name_category = $row['name_category'];
								$GetProductsNoFavs->id_product = $row['ID_product'];
								array_push($array,$GetProductsNoFavs);
								}
							}
							return $array;
			 			}



public function getProductsForCategory($ID_category){
			$query = ("  SELECT description FROM product WHERE product.ID_category='{$ID_category}'");

			$sql = $this->connection->prepare($query);
			$sql->execute();
			$table=$sql->fetchAll();
			$array = array();

			if (count($table)>0){
				foreach ($table as $row) {
					$GetProductsForCategory= new product();
					$GetProductsForCategory->description = $row['description'];
					array_push($array,$GetProductsForCategory);
					}
			}
				return $array;
	}


public function NewUser($username, $password,$email,$name){
			$query = ("INSERT INTO user VALUES ('{$username}','{$password}','{$email}','{$name}')");

			$sql = $this->connection->prepare($query);
			$sql->execute();
		}

public function NewFavouriteProduct($username, $productID){
			$query = ("CALL insertar_favoritos('{$username}','{$productID}',curdate())");
			
			$sql = $this->connection->prepare($query);

			if($sql->execute())
				return 'Ok';
		
		}



public function UpdateUserInfo($username,$password,$email,$name){
			$query=("UPDATE user SET  password ='{$password}', email= '{$email}', name='{$name}' WHERE user.username = '{$username}'");
			$sql = $this->connection->prepare($query);
			if($sql->execute())
				return 'Ok';
		}



public function RemoveFavourites($username,$productID){
			$query=("DELETE FROM favourite WHERE favourite.ID_product='{$productID}'");
			$sql = $this->connection->prepare($query);
			if($sql->execute())
			return 'Ok';
		}


	public function UpdateFavouriteLists($id_selection){
					$query=("UPDATE selection SET  feautured =false  WHERE selection.ID_selection = '{$id_selection}'");
					$sql = $this->connection->prepare($query);
					if($sql->execute())
					return 'Ok';
				}

}

 ?>

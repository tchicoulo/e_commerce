<?php

require_once "./models/model.php";

class ProductsModel extends Model {

	private $id;
	private $libelle;
	private $marque;
	private $id_Categorie;

	// CONSTRUCTEUR //
	public function __construct (array $donnees){
		$this->hydrate($donnees);
	}

	public function hydrate(array $donnees){
		foreach($donnees as $key => $value){
			$method = 'set'.ucfirst($key);
			if(method_exists($this, $method)){
				$this->$method($value);
			}
		}
	}

	//INSERT INTO
	public function create(ProductsModel $product){

		$db=parent::connect();

		// On teste d'abord si un produit est ajouté ou non.
		if($this->exists($product->libelle())){
			return '<p class="red">Le produit '.$product->libelle().' à déjà été ajouté.</p>';
		}
		elseif($product->libelle() == ''){
			return '<p class="red">Veuillez ajouter un produit.</p>';
		}

		$sql= "INSERT INTO produit SET libelle = :libelle, marque = :marque, id_Categorie = :id_Categorie";
		$query= $db -> prepare ($sql);
		$query->bindValue(':libelle', $product->libelle());
		$query->bindValue(':marque', $product->marque());
		$query->bindValue(':id_Categorie', $product->id_Categorie());

		$result = $query -> execute();

		if($result){	// Si $result est vrai alors la requête c'est bien déroulé
			return '<p class="green">Le produit '.$product->libelle().' à bien été ajouté.</p>';
		}
		else{
			return '<p class="red">Echec lors de l\'ajout du produit '.$product->libelle().'.</p>';
		}
	}

	//UPDATE
	public function update(ProductsModel $product){

		$db=parent::connect();

		$sql= "UPDATE produit SET libelle = :libelle, marque = :marque, id_Categorie = :id_Categorie WHERE id=".$product->id();
		$query= $db -> prepare ($sql);
		$query->bindValue(':libelle', $product->libelle());
		$query->bindValue(':marque', $product->marque());
		$query->bindValue(':id_Categorie', $product->id_Categorie());

		$result = $query -> execute ();

		if($result){	// Si $result est vrai alors la requête s'est bien déroulée
			return '<p class="green">Le produit '.$product->libelle().' à bien été modifié.</p>';
		}
		else{
			return '<p class="red">Echec de la modification du produit '.$product->libelle().'</p>';
		}
	}

	// DELETE
	public function delete($data){

		$db=parent::connect();

		if(is_int($data)){
			$sql= "DELETE FROM produit WHERE id = ".$data;
			$query= $db -> prepare ($sql);
			$query -> execute ();

			return '<p class="green">Le produit à bien été supprimé.</p>';
		}

		return '<p class="red">Echec de la suppression du produit.</p>';
	}

	// SELECT *
	public function getAll(){
		$db=parent::connect();
		$sql= "SELECT produit.id, produit.libelle, produit.marque, categorie.nom_categorie FROM produit INNER JOIN categorie ON categorie.id = produit.id_Categorie";
		$query= $db -> prepare ($sql);
		$query -> execute ();
		$productslist= $query -> fetchAll();
		return $productslist;
	}

	//Enregistre les données par rapport a un Id ou un nom de produit
	public function get($data){

		$db=parent::connect();
		// Si in entier est en paramètre on récupère par rapport à l'Id
		if(is_int($data)){
			$sql= "SELECT * FROM produit WHERE id = :id";
			$query= $db -> prepare ($sql);
			$query->bindValue(':id', $data);
		}

		// Si une chaine de charactères est en paramètre on récupère par rapport au nom du produit
		else if (is_string($data)){
			$sql= "SELECT * FROM produit WHERE libelle = :libelle";
			$query= $db -> prepare ($sql);
			$query->bindValue(':libelle', $data);
		}
		else{
			// Si le paramètre est incorrect on retourne false
			return false;
		}

		$query -> execute ();
		$result = $query->fetch();
		if($result && $result['libelle'] != ''){
			// On enregistre les valeurs dans l'instance actuelle
			$this->setId($result['id']);
			$this->setLibelle($result['libelle']);
			$this->setMarque($result['marque']);

			return $this;
		}
		else{
			return false; // Si il n'y a pas de resultat on retourne false
		}
	}

	public function exists($data){
		$db=parent::connect();

		if(is_string($data)){
			$sql = "SELECT * FROM produit WHERE libelle ='".$data."'";
			$query = $db->prepare($sql);
			$query ->execute();
			$listProduct = $query->fetchAll();

			return !empty($listProduct); // Retourn Vrai si un Produit avec le nom $data existe
		}

		return false;
	}

	// GETTERS //
	public function id() { return $this->id; }
	public function libelle() { return $this->libelle; }
	public function marque() { return $this->marque; }
	public function id_Categorie() { return $this->id_Categorie; }

	// SETTERS //
	public function setId( $id ){
		$id = (int) $id;
		if($id > 0){
			$this->id = $id;
		}
	}
	public function setLibelle( $libelle ){
		if(is_string($libelle)){
			$this->libelle = $libelle;
		}
	}
	public function setMarque( $marque ){
		if(is_string($marque)){
			$this->marque = $marque;
		}
	}

	public function setId_Categorie( $id_Categorie ){
		$id_Categorie = (int) $id_Categorie;
		if($id_Categorie > 0){
			$this->id_Categorie = $id_Categorie;
		}
	}
}
?>

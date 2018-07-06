<?php

require_once "./models/model.php";

class ProductsModel extends Model {

	private $id;
	private $libelle;
	private $marque;
	private $description;
	private $id_Categorie;
	private $stock;
	private $prix;
	private $img1;
	private $img2;
	private $img3;

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

		$sql= "INSERT INTO produit SET libelle = :libelle, marque = :marque, description = :description, id_Categorie = :id_Categorie, stock = :stock, prix = :prix, img1 = :img1, img2 = :img2, img3 = :img3";
		$query= $db -> prepare ($sql);
		$query->bindValue(':libelle', $product->libelle());
		$query->bindValue(':marque', $product->marque());
		$query->bindValue(':description', $product->description());
		$query->bindValue(':id_Categorie', $product->id_Categorie());
		$query->bindValue(':stock', $product->stock());
		$query->bindValue(':prix', $product->prix());
		$query->bindValue(':img1', $product->img1());
		$query->bindValue(':img2', $product->img2());
		$query->bindValue(':img3', $product->img3());

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

		$sql= "UPDATE produit SET libelle = :libelle, marque = :marque, description = :description, id_Categorie = :id_Categorie, stock = :stock, prix = :prix, img1 = :img1, img2 = :img2, img3 = :img3 WHERE id=".$product->id();
		$query= $db -> prepare ($sql);
		$query->bindValue(':libelle', $product->libelle());
		$query->bindValue(':marque', $product->marque());
		$query->bindValue(':description', $product->description());
		$query->bindValue(':id_Categorie', $product->id_Categorie());
		$query->bindValue(':stock', $product->stock());
		$query->bindValue(':prix', $product->prix());
		$query->bindValue(':img1', $product->img1());
		$query->bindValue(':img2', $product->img2());
		$query->bindValue(':img3', $product->img3());

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
		$sql= "SELECT produit.*, categorie.nom_categorie FROM produit INNER JOIN categorie ON categorie.id = produit.id_Categorie";
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
			$this->setDescription($result['description']);
			$this->setId_Categorie($result['id_Categorie']);
			$this->setStock($result['stock']);
			$this->setPrix($result['prix']);
			$this->setImg1($result['img1']);
			$this->setImg2($result['img2']);
			$this->setImg3($result['img3']);

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

	public function imgExists($i){
		$db=parent::connect();

		if(is_int($i)){
			$sql = "SELECT * FROM produit WHERE libelle ='".$this->libelle()."'";
			$query = $db->prepare($sql);
			$query ->execute();
			$product = $query->fetch();

			if($product['img'.$i] != 'img/logo.png'){
				return $product['img'.$i];
			}
			else {
				return false;
			}
		}
	}

	// Retourne le nombre de produits
	public function count($data){
		$db=parent::connect();

		if(is_string($data)){
			if($data == 'all'){
				$sql= "SELECT COUNT(*) FROM produit";
			}
			else{
				$sql= "SELECT COUNT(*) FROM produit INNER JOIN categorie ON produit.id_Categorie = categorie.id WHERE categorie.nom_categorie = ".$data;
			}

			$query= $db -> prepare ($sql);
			$query -> execute ();
			return $query -> fetch()[0];
		}
		else{
			return false;
		}
	}
	// GETTERS //
	public function id() { return $this->id; }
	public function libelle() { return $this->libelle; }
	public function marque() { return $this->marque; }
	public function description() { return $this->description; }
	public function id_Categorie() { return $this->id_Categorie; }
	public function stock() { return $this->stock; }
	public function prix() { return $this->prix; }
	public function img1() { return $this->img1; }
	public function img2() { return $this->img2; }
	public function img3() { return $this->img3; }

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

	public function setDescription( $description ){
		if(is_string($description)){
			$this->description = $description;
		}
	}

	public function setId_Categorie( $id_Categorie ){
		$id_Categorie = (int) $id_Categorie;
		if($id_Categorie > 0){
			$this->id_Categorie = $id_Categorie;
		}
	}

	public function setStock( $stock ){
		$stock = (int) $stock;
		if($stock >= 0){
			$this->stock = $stock;
		}
		else{
			$this->stock = 0;
		}
	}

	public function setPrix( $prix ){
		$prix = (float) $prix;
		if($prix >= 0){
			$this->prix = $prix;
		}
		else{
			$this->prix = 0;
		}
	}

	public function setImg1( $img1 ){
		if(is_string($img1)){
			$this->img1 = $img1;
		}
	}

	public function setImg2( $img2 ){
		if(is_string($img2)){
			$this->img2 = $img2;
		}
	}

	public function setImg3( $img3 ){
		if(is_string($img3)){
			$this->img3 = $img3;
		}
	}

}
?>

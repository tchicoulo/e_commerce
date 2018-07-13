<?php

require_once "./models/model.php";

class CartsModel extends Model {

	private $id;
	private $id_commande;
	private $id_produit;
	private $quantite;

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
	public function create(CartsModel $cart){

		$db=parent::connect();

		$sql= "INSERT INTO panier SET id_commande = :id_commande, id_produit = :id_produit, quantite = :quantite";
		$query= $db -> prepare ($sql);
		$query->bindValue(':id_commande', $cart->id_commande());
		$query->bindValue(':id_produit', $cart->id_produit());
		$query->bindValue(':quantite', $cart->quantite());

		$result = $query -> execute();

		if($result){	// Si $result est vrai alors la requête c'est bien déroulé
		return '<p class="green">Le panier '.$cart->id().' - '.$cart->id_commande().' a bien été ajoutée.</p>';
	}
	else{
		return '<p class="red">Echec lors de l\'ajout du panier '.$cart->nom_categorie().'.</p>';
	}
}

	//UPDATE
public function update(CartsModel $cart){

	$db=parent::connect();

	$sql= "UPDATE panier SET id_commande = :id_commande, id_produit = :id_produit, quantite = :quantite WHERE id=".$cart->id();
	$query= $db -> prepare ($sql);
	$query->bindValue(':id_commande', $cart->id_commande());
	$query->bindValue(':id_produit', $cart->id_produit());
	$query->bindValue(':quantite', $cart->quantite());

	$result = $query -> execute ();

    if($result){	// Si $result est vrai alors la requête c'est bien déroulé
    return '<p class="green">Le panier '.$cart->id().' - '.$cart->id_commande().' a bien été modifiée.</p>';
}
else{
	return '<p class="red">Echec lors de la modification du panier '.$cart->id().' - '.$cart->id_commande().'.</p>';
}
}

	// DELETE
public function delete($data){

	$db=parent::connect();

	if(is_int($data)){
		$sql= "DELETE FROM panier WHERE id = ".$data;
		$query= $db -> prepare ($sql);
		$query -> execute ();

		return '<p class="green">Le panier a bien été supprimée.</p>';
	}

	return '<p class="red">Echec de la suppression du panier.</p>';
}

	// SELECT *
public function getAll(){
	$db=parent::connect();
	$sql= "SELECT * FROM panier";
	$query= $db -> prepare ($sql);
	$query -> execute ();
	$cartslist= $query -> fetchAll();
	return $cartslist;
}

	//Enregistre les données par rapport a un Id ou un nom de produit
public function get($data){

	$db=parent::connect();
		// Si in entier est en paramètre on récupère par rapport à l'Id
	if(is_int($data)){
		$sql= "SELECT * FROM panier WHERE id = :id";
		$query= $db -> prepare ($sql);
		$query->bindValue(':id', $data);
	}

		// Si une chaine de charactères est en paramètre on récupère par rapport au nom  de la catégorie
	else if (is_string($data)){
		$sql= "SELECT * FROM panier WHERE date_commande = :date_commande";
		$query= $db -> prepare ($sql);
		$query->bindValue(':date_commande', $data);
	}
	else{
			// Si le paramètre est incorrect on retourne false
		return false;
	}

	$query -> execute ();
	$result = $query->fetch();
	if($result){
			// On enregistre les valeurs dans l'instance actuelle
		$this->setId($result['id']);
		$this->setId_commande($result['id_commande']);
		$this->setId_produit($result['id_produit']);
		$this->setQuantite($result['quantite']);

		return $this;
	}
	else{
			return false; // Si il n'y a pas de resultat on retourne false
		}
	}

	public function exists($data){
		$db=parent::connect();

		if(is_string($data)){
			$sql = "SELECT * FROM panier WHERE date_commande ='".$data."'";
			$query = $db->prepare($sql);
			$query ->execute();
			$listCarts = $query->fetchAll();

			return !empty($listCarts); // Retourn Vrai si un Produit avec le nom $data existe
		}

		return false;
	}

	// GETTERS //
	public function id() { return $this->id; }
	public function id_commande() { return $this->id_commande; }
	public function id_produit() { return $this->id_produit; }
	public function quantite() { return $this->quantite; }

	// SETTERS //
	public function setId( $id ){
		$id = (int) $id;
		if($id > 0){
			$this->id = $id;
		}
	}
	public function setId_commande( $id_commande ){
		if(is_int($id_commande)){
			$this->id_commande = $id_commande;
		}
	}

	public function setId_produit( $id_produit ){
		if(is_int($id_produit)){
			$this->id_produit = $id_produit;
		}
	}

	public function setQuantite( $quantite ){
		if(is_string($quantite)){
			$this->quantite = $quantite;
		}
	}
}
?>

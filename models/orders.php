<?php

require_once "./models/model.php";

class OrdersModel extends Model {

	private $id;
	private $date_commande;
	private $id_client;

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
	public function create(OrdersModel $order){

		$db=parent::connect();

		$sql= "INSERT INTO commande SET date_commande = :date_commande, id_client = :id_client";
		$query= $db -> prepare ($sql);
		$query->bindValue(':date_commande', $order->date_commande());
		$query->bindValue(':id_client', $order->id_client());

		$result = $query -> execute ();

		if($result){	// Si $result est vrai alors la requête c'est bien déroulé
			return '<p class="green">La commande '.$order->date_commande().' à bien été ajouté.</p>';
		}
		else{
			return '<p class="red">Echec lors de l\'ajout de la commande '.$order->date_commande().'.</p>';
		}
	}

	//UPDATE
	public function update(OrdersModel $order){

		$db=parent::connect();

		$sql= "UPDATE commande SET date_commande = :date_commande, id_client = :id_client WHERE id=".$order->id();
		$query= $db -> prepare ($sql);
		$query->bindValue(':date_commande', $order->date_commande());
		$query->bindValue(':id_client', $order->id_client());

		$result = $query -> execute ();

		if($result){	// Si $result est vrai alors la requête s'est bien déroulée
			return '<p class="green">La commande '.$order->date_commande().' à bien été modifiée.</p>';
		}
		else{
			return '<p class="red">Echec de la modification de la commande '.$order->date_commande().'</p>';
		}
	}

	// DELETE
	public function delete($data){

		$db=parent::connect();

		if(is_int($data)){
			$sql= "DELETE FROM commande WHERE id = ".$data;
			$query= $db -> prepare ($sql);
			$query -> execute ();

			return '<p class="green">La commande à bien été supprimée.</p>';
		}

		return '<p class="red">Echec de la suppression de la commande.</p>';
	}

	// SELECT *
	public function getAll(){
		$db=parent::connect();
		$sql= "SELECT commande.*, client.nom_client  FROM commande INNER JOIN client ON commande.id_client = client.id ORDER BY commande.date_commande DESC";
		$query= $db -> prepare ($sql);
		$query -> execute ();
		$orderslist= $query -> fetchAll();
		return $orderslist;
	}

	//Enregistre les données par rapport a un Id ou une commande
	public function get($date_commande, $id_client){

		$db=parent::connect();
		// Si in entier est en paramètre on récupère par rapport à l'Id
		if(is_int($id_client)){
			$sql= "SELECT * FROM commande WHERE date_commande = :date_commande AND id_client = :id_client";
			$query= $db -> prepare ($sql);
			$query->bindValue(':id_client', $id_client);
			$query->bindValue(':date_commande', $date_commande);
		}
		else{
			// Si le paramètre est incorrect on retourne false
			return false;
		}

		$query -> execute ();
		$result = $query->fetch();
		if($result){
			$this->setId($result['id']);
			$this->setDate_commande($result['date_commande']);
			$this->setId_client($result['id_client']);

			return $this;
		}
		else{
			return false;
		}
	}
	public function nbArticles($id_commande){
		$db=parent::connect();
		$nbArtciles = 0;

		if($id_commande > 0){
			$sql = "SELECT * FROM panier WHERE id_commande ='".$id_commande."'";
			$query = $db->prepare($sql);
			$query ->execute();
			$articlesList = $query->fetchAll();


			foreach($articlesList as $article){
				$nbArtciles += $article['quantite'];
			}
		}
		return $nbArtciles;
	}

	public function totalPrice($id_commande){
		$db=parent::connect();
		$totalPrice = 0;

		if($id_commande > 0){
			$sql = "SELECT * FROM panier INNER JOIN produit ON panier.id_produit = produit.id WHERE id_commande ='".$id_commande."'";
			$query = $db->prepare($sql);
			$query ->execute();
			$articlesList = $query->fetchAll();

			foreach($articlesList as $article){
				$totalPrice += ($article['prix']*$article['quantite']);
			}
		}
		return $totalPrice;
	}

	public function exists($data){
		$db=parent::connect();

		if(is_string($data)){
			$sql = "SELECT * FROM order WHERE date_commande ='".$data."'";
			$query = $db->prepare($sql);
			$query ->execute();
			$listOrder = $query->fetchAll();

			return !empty($listOrder); // Retourne Vrai si une commande avec le nom $data existe
		}

		return false;
	}

	// GETTERS //
	public function id() { return $this->id; }
	public function date_commande() { return $this->date_commande; }
	public function id_client() { return $this->id_client; }


	// SETTERS //
	public function setId( $id ){
		$id = (int) $id;
		if($id > 0){
			$this->id = $id;
		}
	}
	public function setDate_commande( $date_commande ){
		if(is_string($date_commande)){
			$this->date_commande = $date_commande;
		}
	}
	public function setId_client( $id_client ){
		if(is_string($id_client)){
			$this->id_client = $id_client;
		}
	}

}
?>

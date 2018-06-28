<?php

require_once "./models/model.php";

class ClientsModel extends Model {

	private $id;
	private $nom_client;
	private $mot_de_passe;
	private $civilite;
	private $prenom;
	private $nom;
	private $adresse;
	private $telephone;
	private $email;

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
	public function create(ClientsModel $client){

		$db=parent::connect();

		// On teste d'abord si l'utilisateur existe déjà ou si il est vide
		if($this->exists($client->nom_client())){
			return '<p class="red">Le nom d\'utilisateur '.$client->nom_client().' est déjà utilisé.</p>';
		}
		elseif($client->nom_client() == ''){
			return '<p class="red">Le nom d\'utilisateur est vide.</p>';
		}

		$sql= "INSERT INTO client SET nom_client = :nom_client, mot_de_passe = :mot_de_passe, civilite = :civilite, prenom = :prenom, nom = :nom, adresse = :adresse, telephone = :telephone, email = :email";
		$query= $db -> prepare ($sql);
		$query->bindValue(':nom_client', $client->nom_client());
		$query->bindValue(':mot_de_passe', $client->mot_de_passe());
		$query->bindValue(':civilite', $client->civilite());
		$query->bindValue(':prenom', $client->prenom());
		$query->bindValue(':nom', $client->nom());
		$query->bindValue(':adresse', $client->adresse());
		$query->bindValue(':telephone', $client->telephone());
		$query->bindValue(':email', $client->email());

		$result = $query -> execute ();

		if($result){	// Si $result est vrai alors la requête c'est bien déroulé
			return '<p class="green">L\'utilisateur '.$client->nom_client().' à bien été ajouté.</p>';
		}
		else{
			return '<p class="red">Echec lors de l\'ajout de l\'utilisateur '.$client->nom_client().'.</p>';
		}
	}

	//UPDATE
	public function update(ClientsModel $client){

		$db=parent::connect();

		// On teste d'abord si l'utilisateur existe déjà ou si il est vide
		if($this->exists($client->nom_client())){
			return '<p class="red">Le nom d\'utilisateur '.$client->nom_client().' est déjà utilisé.</p>';
		}
		elseif($client->nom_client() == ''){
			return '<p class="red">Le nom d\'utilisateur est vide.</p>';
		}

		$sql= "UPDATE client SET nom_client = :nom_client, mot_de_passe = :mot_de_passe, civilite = :civilite, prenom = :prenom, nom = :nom, adresse = :adresse, telephone = :telephone, email = :email WHERE id=".$client->id();
		$query= $db -> prepare ($sql);
		$query->bindValue(':nom_client', $client->nom_client());
		$query->bindValue(':mot_de_passe', $client->mot_de_passe());
		$query->bindValue(':civilite', $client->civilite());
		$query->bindValue(':prenom', $client->prenom());
		$query->bindValue(':nom', $client->nom());
		$query->bindValue(':adresse', $client->adresse());
		$query->bindValue(':telephone', $client->telephone());
		$query->bindValue(':email', $client->email());

		$result = $query -> execute ();

		if($result){	// Si $result est vrai alors la requête c'est bien déroulé
			return '<p class="green">L\'utilisateur '.$client->nom_client().' à bien été modifié.</p>';
		}
		else{
			return '<p class="red">Echec de la modification de l\'utilisateur '.$client->nom_client().'</p>';
		}
	}

	// DELETE
	public function delete($data){

		$db=parent::connect();

		if(is_int($data)){
			$sql= "DELETE FROM client WHERE id = ".$data;
			$query= $db -> prepare ($sql);
			$query -> execute ();

			return '<p class="green">L\'utilisateur à bien été supprimé.</p>';
		}

		return '<p class="red">Echec de la suppression de l\'utilisateur.</p>';
	}

	// SELECT *
	public function getAll(){
		$db=parent::connect();
		$sql= "SELECT * FROM client";
		$query= $db -> prepare ($sql);
		$query -> execute ();
		$clientslist= $query -> fetchAll();
		return $clientslist;
	}

	//Enregistre les données par rapport a un Id ou un nom d'utilisateur
	public function get($data){

		$db=parent::connect();
		// Si in entier est en paramètre on récupère par rapport à l'Id
		if(is_int($data)){
			$sql= "SELECT * FROM client WHERE id = :id";
			$query= $db -> prepare ($sql);
			$query->bindValue(':id', $data);
		}

		// Si une chaine de charactères est en paramètre on récupère par rapport au nom d'utilisateur
		else if (is_string($data)){
			$sql= "SELECT * FROM client WHERE nom_client = :nom_client";
			$query= $db -> prepare ($sql);
			$query->bindValue(':nom_client', $data);
		}
		else{
			// Si le paramètre est incorrect on retourne false
			return false;
		}

		$query -> execute ();
		$result = $query->fetch();
		if($result && $result['nom_client'] != ''){
			// On enregistre les valeurs dans l'instance actuelle
			$this->setId($result['id']);
			$this->setNom_client($result['nom_client']);
			$this->setMot_de_passe($result['mot_de_passe']);
			$this->setCivilite($result['civilite']);
			$this->setPrenom($result['prenom']);
			$this->setNom($result['nom']);
			$this->setAdresse($result['adresse']);
			$this->setTelephone($result['telephone']);
			$this->setEmail($result['email']);
			return $this;
		}
		else{
			return false; // Si il n'y a pas de resultat on retourne false
		}
	}

	public function exists($data){
		$db=parent::connect();

		if(is_string($data)){
			$sql = "SELECT * FROM client WHERE nom_client ='".$data."'";
			$query = $db->prepare($sql);
			$query ->execute();
			$listClient = $query->fetchAll();

			return !empty($listClient); // Retourn Vrai si un Client avec le nom $data existe
		}

		return false;
	}

	// GETTERS //
	public function id() { return $this->id; }
	public function nom_client() { return $this->nom_client; }
	public function mot_de_passe() { return $this->mot_de_passe; }
	public function civilite() { return $this->civilite;}
	public function prenom() { return $this->prenom; }
	public function nom() { return $this->nom; }
	public function adresse() { return $this->adresse; }
	public function telephone() { return $this->telephone; }
	public function email() { return $this->email; }

	// SETTERS //
	public function setId( $id ){
		$id = (int) $id;
		if($id > 0){
			$this->id = $id;
		}
	}
	public function setNom_client( $nom_client ){
		if(is_string($nom_client)){
			$this->nom_client = $nom_client;
		}
	}
	public function setMot_de_passe( $mot_de_passe ){
		if(is_string($mot_de_passe)){
			$this->mot_de_passe = $mot_de_passe;
		}
	}
	public function setCivilite( $civilite ){
		if(is_string($civilite)){
			$this->civilite = $civilite;
		}
	}
	public function setPrenom( $prenom ){
		if(is_string($prenom)){
			$this->prenom = $prenom;
		}
	}
	public function setNom( $nom ){
		if(is_string($nom)){
			$this->nom = $nom;
		}
	}
	public function setAdresse( $adresse ){
		if(is_string($adresse))
		$this->adresse = $adresse;
	}
	public function setTelephone( $telephone ){
		if(is_string($telephone))
		$this->telephone = $telephone;
	}
	public function setEmail( $email ){
		if(is_string($email)){
			$this->email = $email;
		}
	}
}
?>
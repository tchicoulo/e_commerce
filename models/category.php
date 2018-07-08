<?php

require_once "./models/model.php";

class CategoriesModel extends Model {

	private $id;
	private $nom_categorie;

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
	public function create(CategoriesModel $category){

		$db=parent::connect();

		// On teste d'abord si un produit est ajouté ou non.
		if($this->exists($category->nom_categorie())){
			return '<p class="red">La categorie '.$category->nom_categorie().' a déjà été ajoutée.</p>';
		}
		elseif($category->nom_categorie() == ''){
			return '<p class="red">Veuillez ajouter une categorie nom vide.</p>';
		}

		$sql= "INSERT INTO categorie SET nom_categorie = :nom_categorie";
		$query= $db -> prepare ($sql);
    $query->bindValue(':nom_categorie', $category->nom_categorie());
		$result = $query -> execute();

		if($result){	// Si $result est vrai alors la requête c'est bien déroulé
			return '<p class="green">La catégorie '.$category->nom_categorie().' a bien été ajoutée.</p>';
		}
		else{
			return '<p class="red">Echec lors de l\'ajout de la catégorie '.$category->nom_categorie().'.</p>';
		}
	}

	//UPDATE
  public function update(CategoriesModel $category){

    $db=parent::connect();

    // On teste d'abord si une catégorie est ajouté ou non.
    if($this->exists($category->nom_categorie())){
      return '<p class="red">La categorie '.$category->nom_categorie().' a déjà été ajoutée.</p>';
    }
    elseif($category->nom_categorie() == ''){
      return '<p class="red">Veuillez ajouter une categorie nom vide.</p>';
    }

    $sql= "UPDATE categorie SET nom_categorie = :nom_categorie WHERE id=".$category->id();
    $query= $db -> prepare ($sql);
    $query->bindValue(':nom_categorie', $category->nom_categorie());

    $result = $query -> execute ();

    if($result){	// Si $result est vrai alors la requête c'est bien déroulé
      return '<p class="green">La catégorie '.$category->nom_categorie().' a bien été modifiée.</p>';
    }
    else{
      return '<p class="red">Echec lors de la modification de la catégorie '.$category->nom_categorie().'.</p>';
    }
  }

	// DELETE
	public function delete($data){

		$db=parent::connect();

		if(is_int($data)){
			$sql= "DELETE FROM categorie WHERE id = ".$data;
			$query= $db -> prepare ($sql);
			$query -> execute ();

			return '<p class="green">La catégorie a bien été supprimée.</p>';
		}

		return '<p class="red">Echec de la suppression de la catégorie.</p>';
	}

	// SELECT *
	public function getAll(){
		$db=parent::connect();
		$sql= "SELECT * FROM categorie";
		$query= $db -> prepare ($sql);
		$query -> execute ();
		$categorieslist= $query -> fetchAll();
		return $categorieslist;
	}

	//Enregistre les données par rapport a un Id ou un nom de produit
	public function get($data){

		$db=parent::connect();
		// Si in entier est en paramètre on récupère par rapport à l'Id
		if(is_int($data)){
			$sql= "SELECT * FROM categorie WHERE id = :id";
			$query= $db -> prepare ($sql);
			$query->bindValue(':id', $data);
		}

		// Si une chaine de charactères est en paramètre on récupère par rapport au nom  de la catégorie
		else if (is_string($data)){
			$sql= "SELECT * FROM categorie WHERE nom_categorie = :nom_categorie";
			$query= $db -> prepare ($sql);
			$query->bindValue(':nom_categorie', $data);
		}
		else{
			// Si le paramètre est incorrect on retourne false
			return false;
		}

		$query -> execute ();
		$result = $query->fetch();
		if($result && $result['nom_categorie'] != ''){
			// On enregistre les valeurs dans l'instance actuelle
			$this->setId($result['id']);
			$this->setNom_categorie($result['nom_categorie']);

			return $this;
		}
		else{
			return false; // Si il n'y a pas de resultat on retourne false
		}
	}

	public function exists($data){
		$db=parent::connect();

		if(is_string($data)){
			$sql = "SELECT * FROM categorie WHERE nom_categorie ='".$data."'";
			$query = $db->prepare($sql);
			$query ->execute();
			$listCategories = $query->fetchAll();

			return !empty($listCategories); // Retourn Vrai si un Produit avec le nom $data existe
		}

		return false;
	}

	// GETTERS //
	public function id() { return $this->id; }
	public function nom_categorie() { return $this->nom_categorie; }

	// SETTERS //
	public function setId( $id ){
		$id = (int) $id;
		if($id > 0){
			$this->id = $id;
		}
	}
	public function setNom_categorie( $nom_categorie ){
		if(is_string($nom_categorie)){
			$this->nom_categorie = $nom_categorie;
		}
	}
}
?>

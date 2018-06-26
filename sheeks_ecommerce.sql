#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Client
#------------------------------------------------------------

CREATE TABLE Client(
        id           Int  Auto_increment  NOT NULL ,
        nom_client   Varchar (50) NOT NULL ,
        mot_de_passe Varchar (250) NOT NULL ,
        civilite     Varchar (10) NOT NULL ,
        prenom       Varchar (50) NOT NULL ,
        nom          Varchar (50) NOT NULL ,
        adresse      Varchar (250) NOT NULL ,
        telephone    Varchar (20) NOT NULL ,
        email        Varchar (250) NOT NULL
	,CONSTRAINT Client_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Commande
#------------------------------------------------------------

CREATE TABLE Commande(
        id              Int  Auto_increment  NOT NULL ,
        date_commande   Date NOT NULL ,
        id_client       Int ,
        id_Client_passe Int NOT NULL
	,CONSTRAINT Commande_AK UNIQUE (id_client)
	,CONSTRAINT Commande_PK PRIMARY KEY (id)

	,CONSTRAINT Commande_Client_FK FOREIGN KEY (id_Client_passe) REFERENCES Client(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Panier
#------------------------------------------------------------

CREATE TABLE Panier(
        id          Int  Auto_increment  NOT NULL ,
        id_commande Int NOT NULL ,
        id_produit  Int NOT NULL
	,CONSTRAINT Panier_AK UNIQUE (id_produit)
	,CONSTRAINT Panier_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Categorie
#------------------------------------------------------------

CREATE TABLE Categorie(
        id            Int  Auto_increment  NOT NULL ,
        nom_categorie Varchar (250) NOT NULL
	,CONSTRAINT Categorie_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Produit
#------------------------------------------------------------

CREATE TABLE Produit(
        id           Int  Auto_increment  NOT NULL ,
        libelle      Varchar (250) NOT NULL ,
        marque       Varchar (250) NOT NULL ,
        id_Categorie Int NOT NULL
	,CONSTRAINT Produit_PK PRIMARY KEY (id)

	,CONSTRAINT Produit_Categorie_FK FOREIGN KEY (id_Categorie) REFERENCES Categorie(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: contient
#------------------------------------------------------------

CREATE TABLE contient(
        id        Int NOT NULL ,
        id_Panier Int NOT NULL
	,CONSTRAINT contient_PK PRIMARY KEY (id,id_Panier)

	,CONSTRAINT contient_Produit_FK FOREIGN KEY (id) REFERENCES Produit(id)
	,CONSTRAINT contient_Panier0_FK FOREIGN KEY (id_Panier) REFERENCES Panier(id)
)ENGINE=InnoDB;


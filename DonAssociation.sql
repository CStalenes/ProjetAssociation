drop database if exists DonAssociation3 ;
create database DonAssociation3;
use DonAssociation3;

create table Association(
    idAssocia int(3) not null auto_increment,
    nomAssocia varchar(50) not null,
    adresseAssocia varchar(50) not null,
    emailAssocia varchar(50) not null,
    telAssocia varchar(50) not null,
    descriptionAssocia text(500),
    dateInscription date not null,
    primary key (idAssocia)
);


create table Enseigne(
    idEns int(4) not null auto_increment,
    nomEns varchar(50) not null,
    adresseEns varchar(50) not null,
    emailEns varchar(50) not null,
    telephoneEns varchar(50) not null,
    descriptionEns text(500),
    dateInscription date not null,
    primary key (idEns)

);

create table Demande(
    idDemande int(5) not null auto_increment,
    idAssocia int(3) not null,
    idEns int(4) not null,
    motifDemande text,
    dateDemande date,
    primary key (idDemande),
    foreign key (idAssocia) references Association(idAssocia),
    foreign key (idEns) references Enseigne(idEns)

);

create table RDV(
    idRDV int(3) not null auto_increment,
    idAssocia int(3) not null,
    idEns int(4) not null,
    dateRDV date,
    heureRDV time,
    adresseRDV varchar(50),
    primary key (idRDV),
    foreign key (idAssocia) references Association(idAssocia),
    foreign key (idEns) references Enseigne(idEns)
);



create table Produit(
    idProd int(5) not null auto_increment,
    nomProd varchar(50) not null,
    categorie varchar(50) not null,
    datePeremption date,
    quantiteProd int(6),
    marqueProd varchar(50) not null,
    origineProd varchar(50),/* pour dire si c'est une enseigne ou particulier*/
    primary key (idProd)
);

create table Offre(
    idOffre int(5) not null auto_increment,
    typeOffre text,
    dateOffre date not null,
    idProd int(5) not null,
    idEns int(4) not null,
    primary key (idOffre),
    foreign key (idProd) references Produit(idProd),
    foreign key (idEns) references Enseigne(idEns)

);

create table Lister(
    idAssocia int(3) not null,
    idEns int(4) not null,
    primary key (idAssocia, idEns),
	foreign key (idAssocia) references Association(idAssociation),
	foreign key (idEns) references Enseigne(idEns)
);


create table Accepter(
    idDemande int(5) not null,
    idEns int(4) not null,
    primary key (idDemande, idEns),
    foreign key (idDemande) references Demande(idAssocia),
    foreign key (idEns) references Enseigne(idEns)

);

create table Concerner(
    idProd int(5) not null,
    primary key (idProd),
    foreign key (idProd) references Produit(idProd)
);

create table Selectionner(
    idAssocia int(3) not null,
    idProd int(5) not null,
    primary key (idAssocia, idProd),
    foreign key (idProd) references Produit(idProd),
	foreign key (idAssocia) references Association(idAssocia)
);


create table Utilisateur(
    idUtilisateur int(3) not null auto_increment,
    nomUtilisateur varchar(50) not null,
    email varchar(50) not null,
    mdpUtilisateur varchar(50) not null,
    remdp varchar(50) not null, 
    primary key (idUtilisateur)
);

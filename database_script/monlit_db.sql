--dropping database
select pg_terminate_backend (pg_stat_activity.pid)
from pg_stat_activity
where pg_stat_activity.datname = 'monlit_db';

drop database monlit_db
--

create database monlit_db

create sequence MARQUE_seq
start 500;
create table MARQUE
(
    id_marque int default nextval('MARQUE_seq') primary key,
    nom_marque varchar(50),
    sloggan_marque varchar(100),
    logo_marque varchar(200),
    description_marque varchar(250)
);

create sequence TYPE_seq
start 1;
create table TYPE_PRODUIT
(
    id_type int default nextval ('TYPE_seq') primary key,
    libelle_type varchar(20),
    marque_ int,
    foreign key(marque_) references MARQUE(id_marque)
);

create sequence COULEUR_seq
start 1;
create table COULEUR
(
    id_couleur int default nextval('COULEUR_seq') primary key,
    valeur_couleur varchar(20)
);

create sequence PRODUIT_seq
start 1;
create table PRODUIT
(
    id_produit int default nextval('PRODUIT_seq') primary key,
    nom_produit varchar(50),
    qtt_stock int,
    min_qtt_stock int,
    max_qtt_stock int,
    type_ int,
    foreign key(type_) references TYPE_PRODUIT(id_type)
);

create table POSSESSION_COULEUR
(
    produit_ int,
    foreign key(produit_) references PRODUIT(id_produit),
    couleur_ int,
    foreign key(couleur_) references COULEUR(id_couleur),
    primary key(produit_,couleur_)
);

create sequence PHOTO_seq
start 1;
create table PHOTO
(
    id_photo int default nextval('PHOTO_seq') primary key,
    chemin_photo varchar(50),
    produit_ int,
    foreign key(produit_) references PRODUIT(id_produit)
);

create sequence CARATERISTIQUE_seq
start 1;
create table CARATERISTIQUE
(
    id_caractere int default nextval('CARATERISTIQUE_seq') primary key,
    libelle_caractere varchar(50),
    libelle_option_produit varchar(100),
    prix double precision,
    produit_ int,
    foreign key(produit_) references PRODUIT(id_produit)
);

create sequence DESCRIPTION_PRODUIT_seq
start 1;
create table DESCRIPTION_PRODUIT
(
    id_description int default nextval('DESCRIPTION_PRODUIT_seq') primary key,
    caracteristique_ int,
    foreign key(caracteristique_) references CARATERISTIQUE(id_caractere),
    libelle_description varchar(100)
);

create sequence CONTACT_seq
start 1;
create table CONTACT
(
    id_message int default nextval('CONTACT_seq') primary key,
    nom_personne varchar(30),
    email_persone varchar(50),
    sujet_message varchar(50),
    contenu_message varchar(250)
);

create table ROLE_PERSONNE
(
    id_role int primary key,
    libelle_role varchar(10),
    description_role varchar(50)
);

create table SEXE
(
    id_sexe int primary key,
    libele_sexe varchar(10)
);

create sequence PERSONNE_seq
start 1;
create table PERSONNE
(
    id_personne int default nextval('PERSONNE_seq') primary key,
    nom varchar(20),
    prenom varchar(20),
    -- date_naissance date,
    date_inscription date default CURRENT_DATE,
    sexe_ int,
    foreign key(sexe_) references SEXE(id_sexe),
    codepostal varchar(10),
    adresse varchar(100),
    ville varchar(20),
    telephone varchar(20),
    email varchar(20),
    username varchar(20),
    mot_de_passe varchar(50),
    role_personne_ int,
    foreign key(role_personne_) references ROLE_PERSONNE(id_role)
);

create sequence COMMANDE_seq
start 1;
create table COMMANDE
(
    id_commande int default nextval('COMMANDE_seq') primary key,
    personne_ int,
    foreign key(personne_) references PERSONNE(id_personne),
    produit_ int,
    foreign key(produit_) references CARATERISTIQUE(id_caractere),
    date_ajout date default CURRENT_DATE,
    statut_commande varchar(25),
    check(statut_commande in('Payé','En attente')),
    est_delivre bit default '0'
);

create sequence COMMENTAIRE_seq
start 1;
create table COMMENTAIRE
(
    id_commentaire int default nextval('COMMENTAIRE_seq') primary key,
    description_commentaire varchar(250),
    date_insertion date default CURRENT_DATE,
    nom_complet_user varchar(50),
    email_personne varchar(100),
    telephone varchar(20),
    produit_ int,
    foreign key(produit_) references PRODUIT(id_produit)
);

create sequence DEMONTRATION_seq
start 1;
create table DEMONTRATION
(
    id_demontration int default nextval('DEMONTRATION_seq') primary key,
    description_demontration varchar(250),
    date_insertion date default CURRENT_DATE,
    nom_complet_user varchar(50),
    email_personne varchar(100),
    telephone varchar(20),
    produit_ int,
    note_etoile int,
    foreign key(produit_) references PRODUIT(id_produit)
);

-- INSERTT MARQUES

INSERT INTO public.marque
    (nom_marque, sloggan_marque, logo_marque, description_marque)
VALUES
    ('MORA', NULL, '/images/MORA.jpg', NULL);
INSERT INTO public.marque
    (nom_marque, sloggan_marque, logo_marque, description_marque)
VALUES
    ('Irina home', 'Trés bonne marque.', '/images/Irina home.jpg', NULL);
INSERT INTO public.marque
    (nom_marque, sloggan_marque, logo_marque, description_marque)
VALUES
    ('Bait & Gan', NULL, '/images/Bait & Gan.jpg', NULL);
INSERT INTO public.marque
    (nom_marque, sloggan_marque, logo_marque, description_marque)
VALUES
    ('Naturel', 'Marque Turk.', '/images/Naturel.jpg', NULL);

-- INSERTT TYPES

INSERT INTO public.type_produit
    (libelle_type, marque_)
VALUES
    ('Couverture', 500);
INSERT INTO public.type_produit
    (libelle_type, marque_)
VALUES
    ('Couvre lit', 500);
INSERT INTO public.type_produit
    (libelle_type, marque_)
VALUES
    ('Drap', 500);
INSERT INTO public.type_produit
    (libelle_type, marque_)
VALUES
    ('Lit', 501);
INSERT INTO public.type_produit
    (libelle_type, marque_)
VALUES
    ('Placard', 501);
INSERT INTO public.type_produit
    (libelle_type, marque_)
VALUES
    ('Couvre lit de luxe', 501);
INSERT INTO public.type_produit
    (libelle_type, marque_)
VALUES
    ('Tapis', 502);
INSERT INTO public.type_produit
    (libelle_type, marque_)
VALUES
    ('Serviettes', 502);
INSERT INTO public.type_produit
    (libelle_type, marque_)
VALUES
    ('Couvre lit de luxe', 503);
INSERT INTO public.type_produit
    (libelle_type, marque_)
VALUES
    ('Couvre lit royale', 503);

-- INSERTT COULEURS

INSERT INTO public.couleur
    (valeur_couleur)
VALUES
    ('#FEF4E8');
INSERT INTO public.couleur
    (valeur_couleur)
VALUES
    ('#AD9A8B');
INSERT INTO public.couleur
    (valeur_couleur)
VALUES
    ('#DFC4BB');
INSERT INTO public.couleur
    (valeur_couleur)
VALUES
    ('#B0ADA9');
INSERT INTO public.couleur
    (valeur_couleur)
VALUES
    ('#AD9A8B');
INSERT INTO public.couleur
    (valeur_couleur)
VALUES
    ('#FEF4E8');
INSERT INTO public.couleur
    (valeur_couleur)
VALUES
    ('#AD9A8B');
INSERT INTO public.couleur
    (valeur_couleur)
VALUES
    ('#FEF4E8');
INSERT INTO public.couleur
    (valeur_couleur)
VALUES
    ('#DDD3CD');
INSERT INTO public.couleur
    (valeur_couleur)
VALUES
    ('#BD6B82');
INSERT INTO public.couleur
    (valeur_couleur)
VALUES
    ('#B1967B');

-- INSERTT PRODUIT

INSERT INTO public.produit
    (nom_produit, qtt_stock, min_qtt_stock, max_qtt_stock, type_)
VALUES
    ('Couvre lit de luxe, ensemble 6 pcs', 20, 5, 20, 9);
INSERT INTO public.produit
    (nom_produit, qtt_stock, min_qtt_stock, max_qtt_stock, type_)
VALUES
    ('NORA , Couvre Lit De Luxe, Ensemble 7 Pcs', 40, 5, 30, 9);
INSERT INTO public.produit
    (nom_produit, qtt_stock, min_qtt_stock, max_qtt_stock, type_)
VALUES
    ('KÜBRA , Couvre Lit De Luxe, Ensemble 8 Pcs', 45, 5, 50, 9);
INSERT INTO public.produit
    (nom_produit, qtt_stock, min_qtt_stock, max_qtt_stock, type_)
VALUES
    ('ELVIN , Couvre Lit De Luxe, Ensemble 7 Pcs', 10, 5, 40, 9);
INSERT INTO public.produit
    (nom_produit, qtt_stock, min_qtt_stock, max_qtt_stock, type_)
VALUES
    ('ALMILA - Couvre Lit De Luxe, Ensemble 7pcs', 40, 5, 50, 9);
INSERT INTO public.produit
    (nom_produit, qtt_stock, min_qtt_stock, max_qtt_stock, type_)
VALUES
    ('Bianca - Couvre Lit De Luxe, Ensemble 9pcs', 2, 20, 70, 9);
INSERT INTO public.produit
    (nom_produit, qtt_stock, min_qtt_stock, max_qtt_stock, type_)
VALUES
    ('Imren - Couvre Lit De Luxe, Ensemble 7pcs', 17, 5, 20, 6);
INSERT INTO public.produit
    (nom_produit, qtt_stock, min_qtt_stock, max_qtt_stock, type_)
VALUES
    ('Dani - Couvre Lit De Luxe, Ensemble 9pcs', 20, 1, 20, 9);
INSERT INTO public.produit
    (nom_produit, qtt_stock, min_qtt_stock, max_qtt_stock, type_)
VALUES
    ('IRINA HOME - Ensemble de serviette de bain 6pcs', 2, 10, 50, 8);

-- INSERTT POSSESSION_COULEUR

INSERT INTO public.possession_couleur
    (produit_, couleur_)
VALUES
    (1, 1);
INSERT INTO public.possession_couleur
    (produit_, couleur_)
VALUES
    (1, 2);
INSERT INTO public.possession_couleur
    (produit_, couleur_)
VALUES
    (1, 3);
INSERT INTO public.possession_couleur
    (produit_, couleur_)
VALUES
    (2, 4);
INSERT INTO public.possession_couleur
    (produit_, couleur_)
VALUES
    (2, 2);
INSERT INTO public.possession_couleur
    (produit_, couleur_)
VALUES
    (3, 1);
INSERT INTO public.possession_couleur
    (produit_, couleur_)
VALUES
    (3, 2);
INSERT INTO public.possession_couleur
    (produit_, couleur_)
VALUES
    (4, 1);
INSERT INTO public.possession_couleur
    (produit_, couleur_)
VALUES
    (7, 9);
INSERT INTO public.possession_couleur
    (produit_, couleur_)
VALUES
    (7, 10);
INSERT INTO public.possession_couleur
    (produit_, couleur_)
VALUES
    (7, 11);

--INSERTT PHOTO
INSERT INTO public.photo
    (chemin_photo, produit_)
VALUES
    ('produit_1_img1.jpg', 1);
INSERT INTO public.photo
    (chemin_photo, produit_)
VALUES
    ('produit_2_img1.jpg', 2);
INSERT INTO public.photo
    (chemin_photo, produit_)
VALUES
    ('produit_3_img1.jpg', 3);
INSERT INTO public.photo
    (chemin_photo, produit_)
VALUES
    ('produit_4_img1.jpg', 4);
INSERT INTO public.photo
    (chemin_photo, produit_)
VALUES
    ('produit_5_img1.jpg', 5);
INSERT INTO public.photo
    (chemin_photo, produit_)
VALUES
    ('produit_6_img1.jpg', 6);
INSERT INTO public.photo
    (chemin_photo, produit_)
VALUES
    ('produit_7_img1.jpg', 7);
INSERT INTO public.photo
    (chemin_photo, produit_)
VALUES
    ('produit_8_img1.jpg', 8);
INSERT INTO public.photo
    (chemin_photo, produit_)
VALUES
    ('produit_9_img1.jpg', 9);
INSERT INTO public.photo
    (chemin_photo, produit_)
VALUES
    ('produit_9_img2.jpg', 9);
INSERT INTO public.photo
    (chemin_photo, produit_)
VALUES
    ('produit_9_img3.jpg', 9);

-- INSERTT carateristique

INSERT INTO public.carateristique
    (libelle_caractere, libelle_option_produit, prix, produit_)
VALUES
    ('Azra', 'Couvre lit de luxe, ensemble 6 pcs', 1000, 1);
INSERT INTO public.carateristique
    (libelle_caractere, libelle_option_produit, prix, produit_)
VALUES
    ('NORA', 'Couvre lit de luxe, ensemble 7 pcs', 1600, 2);
INSERT INTO public.carateristique
    (libelle_caractere, libelle_option_produit, prix, produit_)
VALUES
    ('KÜBRA', 'Couvre lit de luxe, ensemble 8 pcs', 1100, 3);
INSERT INTO public.carateristique
    (libelle_caractere, libelle_option_produit, prix, produit_)
VALUES
    ('ELVIN', 'Couvre lit de luxe, ensemble 7 pcs', 1300, 4);
INSERT INTO public.carateristique
    (libelle_caractere, libelle_option_produit, prix, produit_)
VALUES
    ('ALMILA', 'Couvre lit de luxe, ensemble 7 pcs', 1500, 5);
INSERT INTO public.carateristique
    (libelle_caractere, libelle_option_produit, prix, produit_)
VALUES
    ('Bianca', 'Couvre Lit De Luxe, Ensemble 9pcs', 1400, 6);
INSERT INTO public.carateristique
    (libelle_caractere, libelle_option_produit, prix, produit_)
VALUES
    ('Imren', 'Couvre lit de luxe, ensemble 7 pcs', 1400, 7);
INSERT INTO public.carateristique
    (libelle_caractere, libelle_option_produit, prix, produit_)
VALUES
    ('Dani', 'Couvre Lit De Luxe, Ensemble 9pcs', 1400, 8);
INSERT INTO public.carateristique
    (libelle_caractere, libelle_option_produit, prix, produit_)
VALUES
    ('IRINA HOME', '50x90 cms', 200, 9);
INSERT INTO public.carateristique
    (libelle_caractere, libelle_option_produit, prix, produit_)
VALUES
    ('IRINA HOME', '70x140 cms', 400, 9);

--INSERTT DESCRIPTION_PRODUIT

INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (1, '- 1 pc Couvre lit : 230X240 cm');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (1, '- 1 pc Drap : 240X260 cm');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (1, '- 2 pcs Oreiller Brodé : 50×70 cm');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (1, '- 2 pcs Oreiller normal : 50×70 cm');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (2, '- 1 pc Couvre lit : 270X270 cm');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (2, '- 1 pc Couvreture : 230X240 cm  ');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (2, '- 1 pc Drap : 230X240 cm');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (2, '- 2 pcs Dantal Oreiller : 60×80 cm');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (2, '- 2 pcs Setif Oreiller : 50×70 cm');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (3, '- 1 pc Couvre lit : 240X260 cm');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (3, '- 1 pc Drap : 240X260 cm');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (3, '- 2 pcs Oreiller normal : 50×70 cm');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (3, '- 2 pcs Oreiller Brodé : 50×70 cm');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (3, '- 2 pcs Serviette brodé : 50x90 cm');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (4, '- 1 pc Couvre lit : 260X260 cm');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (4, '- 1 pc Drap : 240X260 cm');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (4, '- 2 pcs Oreiller Jacquard : 50×70 cm');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (4, '- 2 pcs Oreiller Normal : 50×70 cm');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (4, '- 1 pc Coussin Carré : 40x40 cm');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (5, '- 1 pc Tricote Couverture : 220X240 cm');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (5, '- 1 pc Drap : 240X260 cm');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (5, '- 2 pcs Tricote Oreiller  : 50×70 cm');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (5, '- 2 pcs Oreiller : 50×70 cm');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (5, '- 1 pcs Tricote coussin : 40×40 cm');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (6, '- 1 pc Couvre lit piké : 240×255 cms');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (6, '- 1 pc Couvre lit satin : 200×220 cms');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (6, '- 1 pc Drap de lit : 240×250 cms ');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (6, '- 2 pcs Jacquard  Oreiller : 60x80 cms');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (7, '- 1 pc Couvre lit Piké : 240X250 cm');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (7, '- 1 pc Drap de lit : 240X250 cm');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (7, '- 2 pcs Dantelle Oreiller : 60×80 cm');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (7, '- 2 pcs Oreiller normal : 50×70 cm');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (7, '- 1 pc Décorative Oreiller : 40x40 cm');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (8, '- 1 pc Couvre lit piké : 250×260 cms');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (8, '- 1 pc Couvre lit satin : 200×220 cms');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (8, '- 1 pc Drap de lit : 230×240 cms ');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (8, '- 2 pcs Jacquard  Oreiller : 60x80 cms');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (8, '- 2 pcs Satin Oreiller  : 50x70 cms');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (8, '- 2 pcs Dantelle Oreiller : 50x70 cms');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (9, '- Ensemble de serviette de bain , 6pcs');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (9, '- 6 pc 50x90 cms');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (10, '- Ensemble de serviette de bain , 6pcs');
INSERT INTO public.description_produit
    (caracteristique_, libelle_description)
VALUES
    (10, '- 6 pc 70x140 cms');

-- INSERT CONTACT
INSERT INTO public.contact
    (nom_personne, email_persone, sujet_message, contenu_message)
VALUES
    ('aze', 'aze@gmail.com', 'aze', 'aze');
INSERT INTO public.contact
    (nom_personne, email_persone, sujet_message, contenu_message)
VALUES
    ('aze', 'aze@gmail.com', 'aze', 'aze');
INSERT INTO public.contact
    (nom_personne, email_persone, sujet_message, contenu_message)
VALUES
    ('Abonnement client', NULL, '', '');
INSERT INTO public.contact
    (nom_personne, email_persone, sujet_message, contenu_message)
VALUES
    ('Abonnement client', NULL, '', '');
INSERT INTO public.contact
    (nom_personne, email_persone, sujet_message, contenu_message)
VALUES
    ('Abonnement client', 'email_persone@gmail.com', '', '');
INSERT INTO public.contact
    (nom_personne, email_persone, sujet_message, contenu_message)
VALUES
    ('Abonnement client', 'StoreMessage@test.com', '', '');
INSERT INTO public.contact
    (nom_personne, email_persone, sujet_message, contenu_message)
VALUES
    ('Abonnement client', 'email_persone@gmil.com', '', '');

-- INSERTT PERSONNE
INSERT INTO public.sexe
    (id_sexe, libele_sexe)
VALUES
    (1, 'Homme');
INSERT INTO public.sexe
    (id_sexe, libele_sexe)
VALUES
    (2, 'Femme');

-- INSERTT ROLE_PERSONNE
INSERT INTO public.role_personne
    (id_role, libelle_role, description_role)
VALUES
    (1, 'Admin', 'Admin');
INSERT INTO public.role_personne
    (id_role, libelle_role, description_role)
VALUES
    (2, 'Client', 'Client');
INSERT INTO public.role_personne
    (id_role, libelle_role, description_role)
VALUES
    (3, 'Invité', 'Invité');

-- INSERTT PERSONNE

INSERT INTO public.personne
    (id_personne, nom, prenom, date_inscription, sexe_, codepostal, adresse, ville, telephone, email, username, mot_de_passe, role_personne_)
VALUES
    (2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.personne
    (id_personne, nom, prenom, date_inscription, sexe_, codepostal, adresse, ville, telephone, email, username, mot_de_passe, role_personne_)
VALUES
    (1, 'Saffih', 'Hicham', NULL, 1, '60000', 'hay andalous, rue laymoune 2', 'Oujda', '+212 0666201740', 'tony@gmail.com', 'hicham', 'hicham123', 1);
INSERT INTO public.personne
    (id_personne, nom, prenom, date_inscription, sexe_, codepostal, adresse, ville, telephone, email, username, mot_de_passe, role_personne_)
VALUES
    (3, 'Saffih', 'Hicham Oussama', '2020-06-30', 1, '60000', 'Lorem ipsum lambda', 'Nador', '0666201740', NULL, 'invit', 'invit', 3);
INSERT INTO public.personne
    (id_personne, nom, prenom, date_inscription, sexe_, codepostal, adresse, ville, telephone, email, username, mot_de_passe, role_personne_)
VALUES
    (4, 'Saffih', 'Hicham Oussamaa', '2020-06-30', 1, '60000', 'Lorem ipsum lambda', 'Oujda', '0666201740', 'adr@mail.com', 'invit', 'invit', 3);


-----------------------Informations---------------------------------------------------------------------
--Pour faire backup : aller dans  => C:\Program Files\PostgreSQL\9.5\bin
-- commande : pg_dump -U postgres --column-inserts -p 5433 -d pgluxedatabase > C:\Users\pc\Desktop\monlitInserts.sql
-- -U : postgres : Username 
-- -d : pgluxedatabse : database name 
-- -a : generer que le script INSERT (Copy .. \.)
-- -p : port : 5433
-- > chemin du Ficier Backup (extension .sql/.backup obligatoire).
-----------------------------------------------------------------------------------------------------------

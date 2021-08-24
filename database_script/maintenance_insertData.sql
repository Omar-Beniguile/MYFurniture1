
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

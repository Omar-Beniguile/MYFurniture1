<?php

namespace App\Http\Controllers;

// use App\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB as FacadesDB;

class ClientPagesController extends Controller
{
    public function Accueil()
    {
        $produits = DB::select("select * from produit limit 8");
        return view("welcome", compact("produits"));
    }

    public function ProduitOverview($product)
    {
        $info_produit = collect(DB::select("select * from produit inner join type_produit on type_produit.id_type = produit.type_ inner join marque ON marque.id_marque = type_produit.marque_ where produit.id_produit = $product "))->first();
        $produits = DB::select("select * from produit limit 5");
        $commentaires = DB::select("select * from commentaire where commentaire.produit_ = $product");
        $demontrations = DB::select("select * from demontration where demontration.produit_ = $product");
        $notes = DB::select("select note_etoile , count(id_demontration) as nbr from demontration where demontration.produit_ = $product group by note_etoile");

        return view("single-product")
            ->with('info_produit', $info_produit)
            ->with('produits', $produits)
            ->with('commentaires', $commentaires)
            ->with('demontrations', $demontrations)
            ->with('notes', $notes);
    }

    public function RechercherProduit(Request $request)
    {
        $critere = $request->search_input;
        return redirect("Catalogue");
    }

    public function importDescriptions(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->id_caracteristique;
            $prix = collect(DB::select("select prix from carateristique where id_caractere = $id"))->first()->prix;
            $id_caractere = collect(DB::select("select id_caractere from carateristique where id_caractere = $id"))->first()->id_caractere;
            $libelle_caractere = collect(DB::select("select libelle_caractere from carateristique where id_caractere = $id"))->first()->libelle_caractere;
            $descriptions = DB::select("
            select libelle_description from carateristique inner join description_produit on description_produit.caracteristique_ = carateristique.id_caractere
            where carateristique.id_caractere = $id");

            $success = array(
                'prix' => $prix,
                'id_caractere' => $id_caractere,
                'libelle_caractere' => $libelle_caractere,
                'descriptions' => $descriptions
            );
            echo json_encode($success);
        }
    }

    public function AjoutPanier(Request $request)
    {
        if ($request->ajax()) {

            $produit = $request->get("produit");
            $nbr = $request->get("nbr");

            if (AuthController::IsAuthentificated()) {
                $userConnected = session()->get('userObject')->id_personne;
                for ($i = 0; $i < $nbr; $i++) {
                    DB::statement(
                        "insert into commande(personne_, produit_, statut_commande, est_delivre) 
                        values(:personne_, :produit_, :statut_commande, :est_delivre)",
                        array(
                            'personne_' => $userConnected,
                            'produit_' => $produit,
                            'statut_commande' => 'En attente',
                            'est_delivre' => 0
                        )
                    );
                }
            } else {
                if (!session()->has("produits"))
                    $panier = collect([]);
                else
                    $panier = session()->get("produits");


                $panier->put("$produit", $panier->get("$produit") + $nbr);
                session()->put("produits", $panier);
            }

            echo json_encode($this->nbrPanier());
        }
    }

    public function viderPanier()
    {
        if (AuthController::IsAuthentificated())
            DB::statement(
                "delete from commande where commande.personne_ = :personne_ and statut_commande = :statut_commande and est_delivre = :est_delivre",
                array(
                    'personne_' => session()->get('userObject')->id_personne,
                    'statut_commande' => 'En attente',
                    'est_delivre' => 0
                )
            );
        else
            \Session::forget("produits");

        return redirect(url()->previous());
    }

    public function backToHome()
    {
        $this->viderPanier();
        return redirect("/");
    }

    public function StoreMessage(Request $request)
    {

        $nom_personne = isset($request->nom_personne) ? $request->nom_personne : 'Abonnement client';
        $email_persone = $request->email_persone;
        $sujet_message = isset($request->sujet_message) ? $request->sujet_message : '';
        $contenu_message = isset($request->contenu_message) ? $request->contenu_message : '';

        DB::statement(
            "insert into contact(nom_personne, email_persone, sujet_message, contenu_message)
                       values(:nom_personne, :email_persone, :sujet_message, :contenu_message)",
            array(
                'nom_personne' => $nom_personne,
                'email_persone' => $email_persone,
                'sujet_message' => $sujet_message,
                'contenu_message' => $contenu_message
            )
        );
        return redirect(url()->previous());
    }

    public function Category()
    {
        $marques = DB::select('select COUNT(produit.nom_produit) as nbrproduct , marque.nom_marque , marque.id_marque
                                from marque inner join type_produit on type_produit.marque_ = marque.id_marque
                                    inner join produit on produit.type_ = type_produit.id_type
                                group by marque.nom_marque ,marque.id_marque;');

        $types = DB::select('select distinct on (libelle_type) libelle_type , id_type from type_produit');

        $couleurs = DB::select('select distinct valeur_couleur from couleur;');

        $produits = DB::select("select * from produit limit 5");

        $produits_filtres = DB::select("select * from produit");

        return view('category')
            ->with("marques", $marques)
            ->with("types", $types)
            ->with("couleurs", $couleurs)
            ->with("produits", $produits);
    }

    public function InfoPaiement()
    {
        $produitsEnregistres = null;
        if (AuthController::IsAuthentificated())
            $produitsEnregistres = DB::select("select personne_, produit_, date_ajout, statut_commande, est_delivre, count(produit_) as nbr from commande where commande.statut_commande = 'En attente' and commande.personne_ = " . session()->get('userObject')->id_personne . " group by personne_, produit_, date_ajout, statut_commande, est_delivre");

        return view('checkout', compact("produitsEnregistres"));
    }

    public function PrepareConfirmation(Request $request)
    {
        session()->put('MontantHidden', $request->MontantHidden);
        session()->put('FacturationHidden', $request->FacturationHidden);

        if (!AuthController::IsAuthentificated() && $request->compte == 'on') {
            $nom = $request->nom;
            $prenom = $request->prenom;
            $sexe = $request->radioHomme == 'on' ? 1 : 2;
            $adresse = $request->adresse;
            $ville = isset($request->ville) ? $request->ville : $request->addr;
            $telephone = $request->telephone;
            $email = $request->email;
            $codePostal = $request->codePostal;
            // if (isset($request->message))
            //     echo "msg";
            $role =   2;
            $username = str_replace('', ' ', $nom) . date("d") . '-' . date("is");
            $mot_de_passe = "Pass-" . date("d") . '-' . date("is");
            $id_personne = collect(DB::select("select * from personne order by id_personne desc limit 1"))->first()->id_personne + 1;

            DB::statement(
                "insert into personne(id_personne, nom, prenom, sexe_, codepostal, adresse, ville, telephone, email, username, mot_de_passe, role_personne_) 
                        values(:id_personne, :nom, :prenom, :sexe_, :codepostal, :adresse, :ville, :telephone, :email, :username, :mot_de_passe, :role_personne_)",
                array(
                    'id_personne' => $id_personne,
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'sexe_' => $sexe,
                    'adresse' => $adresse,
                    'ville' => $ville,
                    'telephone' => $telephone,
                    'email' => $email,
                    'codepostal' => $codePostal,
                    'role_personne_' => $role,
                    'username' => $username,
                    'mot_de_passe' => $mot_de_passe
                )
            );
            \App\Http\Controllers\AuthController::ManualVerifyCredentials($username, $mot_de_passe);
        } else {
            session()->put('nom', $request->nom);
            session()->put('prenom', $request->prenom);
            session()->put('adresse', $request->adresse);
            session()->put('ville', isset($request->ville) ? $request->ville : $request->addr);
            session()->put('telephone', $request->telephone);
            session()->put('email', $request->email);
            session()->put('codePostal', $request->codePostal);
            session()->put('telephone', $request->telephone);
        }
        return redirect("ConfirmationFinal");
    }

    public function ConfirmationFinal(Request $request)
    {
        $last_person = null;
        $produitsEnregistres = null;
        if (AuthController::IsAuthentificated()) {
            $last_person =  collect(DB::select("select * from personne where personne.id_personne = " . session()->get('userObject')->id_personne))->first();
            $produitsEnregistres = DB::select("select personne_, produit_, date_ajout, statut_commande, est_delivre, count(produit_) as nbr from commande where commande.statut_commande = 'En attente' and commande.personne_ = " . session()->get('userObject')->id_personne . " group by personne_, produit_, date_ajout, statut_commande, est_delivre");
        }

        return view('confirmation', compact("produitsEnregistres"))
            ->with("MontantHidden", session()->get('MontantHidden'))
            ->with("FacturationHidden", session()->get('FacturationHidden'))
            ->with("last_person", $last_person);
    }

    public static function nbrPanier()
    {
        $nbr = 0;
        if (AuthController::IsAuthentificated())
            $nbr = collect(DB::select("select count(*) as nbr from commande where commande.statut_commande = 'En attente' and commande.personne_ = " . session()->get('userObject')->id_personne))
                ->first()
                ->nbr;
        elseif (session()->has("produits"))
            foreach (session()->get("produits")->keys() as $prod) {
                $nbr += session()->get('produits')['' . $prod];
            }
        return $nbr;
    }

    public function Panier()
    {
        $produitsEnregistres = null;
        if (AuthController::IsAuthentificated())
            $produitsEnregistres = DB::select("select personne_, produit_, date_ajout, statut_commande, est_delivre, count(produit_) as nbr from commande where commande.statut_commande = 'En attente' and commande.personne_ = " . session()->get('userObject')->id_personne . " group by personne_, produit_, date_ajout, statut_commande, est_delivre");

        return view('cart', compact("produitsEnregistres"));
    }

    public function StoreCommentaire(Request $request)
    {
        $nom_complet = $request->nom_complet;
        $email = $request->email;
        $telephone = $request->telephone;
        $avis = $request->avis;
        $produit = $request->produit;

        DB::statement(
            "insert into commentaire (description_commentaire, nom_complet_user, email_personne, telephone, produit_) 
                     values(:description_commentaire, :nom_complet_user, :email_personne, :telephone, :produit_)",
            array(
                "description_commentaire" => $avis,
                "nom_complet_user" => $nom_complet,
                "email_personne" => $email,
                "telephone" => $telephone,
                "produit_" => $produit,
            )
        );

        return redirect(url()->previous());
    }

    public function StoreDemo(Request $request)
    {
        $nom_complet = $request->nom_complet;
        $email = $request->email;
        $telephone = $request->telephone;
        $avis = $request->avis;
        $produit = $request->produit;
        $note_etoile = $request->note_etoile;

        DB::statement(
            "insert into demontration (description_demontration, nom_complet_user, email_personne, telephone, note_etoile, produit_) 
                     values(:description_demontration, :nom_complet_user, :email_personne, :telephone, :note_etoile, :produit_)",
            array(
                "description_demontration" => $avis,
                "nom_complet_user" => $nom_complet,
                "email_personne" => $email,
                "telephone" => $telephone,
                "produit_" => $produit,
                "note_etoile" => $note_etoile,
            )
        );

        return redirect(url()->previous());
    }
}

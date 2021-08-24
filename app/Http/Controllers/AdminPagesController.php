<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB as FacadesDB;

class AdminPagesController extends Controller
{
    public function Accueil()
    {
        return view("BackOfficeAdmin.Accueil");
    }

    public function ListeProduits()
    {
        $produits = DB::select("select * from produit order by id_produit desc");
        return view("BackOfficeAdmin.listeProduits", compact("produits"));
    }

    public function NouveauProduit()
    {
        $marques = DB::select('select id_marque, nom_marque from marque');
        return view("BackOfficeAdmin.nouveauProduit", compact("marques"));
    }

    public function AjoutNouveauProduit(Request $request)
    {
        if ($request->ajax()) {
            $nom_produit = $request->nom_produit;
            $qtt_stock = $request->qtt_stock;
            $min_qtt_stock = $request->min_qtt_stock;
            $max_qtt_stock = $request->max_qtt_stock;
            $typeProduit = $request->typeProduit;

            //insertion et affectation dy type & marque
            DB::statement(
                "insert into produit(nom_produit, qtt_stock, min_qtt_stock, max_qtt_stock, type_)
                            values(:nom_produit, :qtt_stock, :min_qtt_stock, :max_qtt_stock, :typeProduit)",
                array(
                    'nom_produit' => $nom_produit,
                    'qtt_stock' => $qtt_stock,
                    'min_qtt_stock' => $min_qtt_stock,
                    'max_qtt_stock' => $max_qtt_stock,
                    'typeProduit' => $typeProduit
                )
            );
            $id_produit = collect(DB::select("select currval('produit_seq') as currval;"))->first()->currval;

            // affectation des couleurs
            if (isset($request->color0)) {
                DB::select(DB::raw("insert into couleur(valeur_couleur) values('$request->color0');"));
                DB::select(DB::raw("insert into possession_couleur(produit_,couleur_)
                     values(
                       ($id_produit),
                       (select id_couleur from couleur where valeur_couleur = '$request->color0' limit 1)
                            )"));
            }
            if (isset($request->color1)) {
                DB::select(DB::raw("insert into couleur(valeur_couleur) values('$request->color1');"));
                DB::select(DB::raw("insert into possession_couleur(produit_,couleur_)
                     values(
                        ($id_produit),
                       (select id_couleur from couleur where valeur_couleur = '$request->color1' limit 1)
                            )"));
            }
            if (isset($request->color2)) {
                DB::select(DB::raw("insert into couleur(valeur_couleur) values('$request->color2');"));
                DB::select(DB::raw("insert into possession_couleur(produit_,couleur_)
                     values(
                        ($id_produit),
                       (select id_couleur from couleur where valeur_couleur = '$request->color2' limit 1)
                            )"));
            }
            if (isset($request->color3)) {
                DB::select(DB::raw("insert into couleur(valeur_couleur) values('$request->color3');"));
                DB::select(DB::raw("insert into possession_couleur(produit_,couleur_)
                     values(
                        ($id_produit),
                        (select id_couleur from couleur where valeur_couleur = '$request->color3' limit 1)
                            )"));
            }
            //affectation des images
            if (isset($request->inpFile1)) {
                $request->inpFile1->store('images', 'public');
                $file = $request->inpFile1;
                $path = 'produit_' . $id_produit . '_img1.jpg';
                $file->move(public_path() . '/images/', $path);
                DB::statement(
                    "insert into photo(chemin_photo, produit_) values(:cheminTof, :produit) ",
                    array(
                        'cheminTof' => $path,
                        'produit' => $id_produit,
                    )
                );
            }
            if (isset($request->inpFile2)) {
                $request->inpFile2->store('images', 'public');
                $file = $request->inpFile2;
                $path = 'produit_' . $id_produit . '_img2.jpg';
                $file->move(public_path() . '/images/', $path);
                DB::statement(
                    "insert into photo(chemin_photo, produit_) values(:cheminTof, :produit) ",
                    array(
                        'cheminTof' => $path,
                        'produit' => $id_produit,
                    )
                );
            }
            if (isset($request->inpFile3)) {
                $request->inpFile3->store('images', 'public');
                $file = $request->inpFile3;
                $path = 'produit_' . $id_produit . '_img3.jpg';
                $file->move(public_path() . '/images/', $path);
                DB::statement(
                    "insert into photo(chemin_photo, produit_) values(:cheminTof, :produit) ",
                    array(
                        'cheminTof' => $path,
                        'produit' => $id_produit,
                    )
                );
            }
            if (isset($request->inpFile4)) {
                $request->inpFile4->store('images', 'public');
                $file = $request->inpFile4;
                $path = 'produit_' . $id_produit . '_img4.jpg';
                $file->move(public_path() . '/images/', $path);
                DB::statement(
                    "insert into photo(chemin_photo, produit_) values(:cheminTof, :produit) ",
                    array(
                        'cheminTof' => $path,
                        'produit' => $id_produit,
                    )
                );
            }
            if (isset($request->inpFile5)) {
                $request->inpFile5->store('images', 'public');
                $file = $request->inpFile5;
                $path = 'produit_' . $id_produit . '_img5.jpg';
                $file->move(public_path() . '/images/', $path);
                DB::statement(
                    "insert into photo(chemin_photo, produit_) values(:cheminTof, :produit) ",
                    array(
                        'cheminTof' => $path,
                        'produit' => $id_produit,
                    )
                );
            }
            $success = array(
                'reponse' => "produit ajouté avc succée !!",
                'id_produit' => $id_produit
            );
            echo json_encode($success);
        }
    }

    public function AjoutDecriptionAuProduit(Request $request)
    {
        if ($request->ajax()) {
            DB::statement(
                "insert into carateristique (libelle_caractere, libelle_option_produit, prix, produit_) 
                values(:libelle_caracteree , :libelle_option_produit, :prix, :produit_);",
                array(
                    'libelle_caracteree' => $request->get('libelle_caractere'),
                    'libelle_option_produit' => $request->get('libelle_option_produit'),
                    'prix' => $request->get('prix'),
                    'produit_' => $request->get('produit_')
                ),
            );
            $id = collect(DB::select("select currval('carateristique_seq') as currval;"))->first()->currval;
            $option = explode('&', $_POST["options"]);
            for ($i = 0; $i < $request->get('nbrOptions'); $i++) {
                DB::statement(
                    "insert into description_produit (caracteristique_, libelle_description) 
                              values( :caracteristique_, :libelle_description)",
                    array(
                        'caracteristique_' => $id,
                        'libelle_description' => urldecode(explode('=', $option[$i + 1])[1])
                    ),
                );
            }
            echo json_encode('ajout de caractere et description : succées ');
        }
    }

    public function Statistiques()
    {
        return view("BackOfficeAdmin.Statistiques");
    }

    //*********************** */
    public function NosMarques()
    {
        $marques = DB::select('select * from marque');
        return view("BackOfficeAdmin.NosMarques", compact("marques"));
    }

    public function AjoutNouvelleMarque(Request $request)
    {
        $request->inpFile1->store('images', 'public');
        $file = $request->inpFile1;
        $path = $request->nomMarque . '.jpg';
        $file->move(public_path() . '/images/', $path);

        $nomMarque = $request->nomMarque;
        $slogganMarque = $request->slogganMarque;
        $descriptionMarque = $request->descriptionMarque;

        DB::statement(
            "insert into marque(nom_marque,sloggan_marque,description_marque,logo_marque) 
                            values (:nomMarque, :slogganMarque, :descriptionMarque,'/images/$path');",
            array(
                'nomMarque' => $nomMarque,
                'slogganMarque' => $slogganMarque,
                'descriptionMarque' => $descriptionMarque,
            )
        );

        $idmarque = collect(DB::select("select currval('marque_seq') as currval;"))->first()->currval;

        //affectation des types
        for ($i = 0; $i < $request->nbrTotalOptions; $i++) {
            $libelle_type = $request->get("labelOption$i");
            DB::statement(
                "insert into type_produit(libelle_type,marque_) values(:libelle_type, :idmarque)",
                array(
                    'libelle_type' => $libelle_type,
                    'idmarque' => $idmarque
                )
            );
        }
        return Redirect("/Admin/NosMarques");
    }

    public function SupprimerMarque($id_marque)
    {
        // todo : requis la supression des produit aussi !
        // todo : supression de la photo
        DB::select(DB::raw("delete from type_produit where type_produit.marque_ = $id_marque;"));
        DB::select(DB::raw("delete from marque where marque.id_marque = $id_marque;"));
        return Redirect("/Admin/NosMarques");
    }

    //****************** types */
    public function ImportTypes(Request $request)
    {
        $types_de_marque = DB::select("select id_type, libelle_type from type_produit where type_produit.marque_ = " . $request->get('id_marque'));
        echo json_encode($types_de_marque);
    }
}

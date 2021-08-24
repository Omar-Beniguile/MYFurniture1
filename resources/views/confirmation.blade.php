@extends('layout.app')

@section('linkcss')
<!-- nice select CSS -->
<link rel="stylesheet" href="css/nice-select.css">
<link rel="stylesheet" href="css/price_rangs.css">
@endsection

@section('body')
<!--================Home Banner Area =================-->
<!-- breadcrumb start-->
<!-- <section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>Order Confirmation</h2>
              <p>Home <span>-</span> Order Confirmation</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->
<!-- breadcrumb start-->

<!--================ confirmation part start =================-->
<section class="confirmation_part padding_top">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="confirmation_tittle">
          <span>Merci bien. Votre demande d'achat a bien été effectué !!</span>
        </div>
      </div>
      <div class="col-lg-6 col-lx-4">
        <div class="single_confirmation_details">
          <h4>&Aacute; propos de la Commande</h4>
          <ul>

            <li>
              <p>Référence </p><span>: Ref{{ rand (99,999) }} </span>
            </li>
            <li>
              <p>Date</p><span>: {{ (Carbon\Carbon::now())->toDateTimeString() }} </span>
            </li>
            <li>
              <p>Par Mr/Mme </p><span>: {{ App\Http\Controllers\AuthController::IsAuthentificated() ? $last_person->nom .' ' . $last_person->prenom : session()->get('nom') . ' ' . session()->get('prenom') }} </span>
            </li>
            <li>
              <p>Facturation</p><span>: {{ $FacturationHidden }} (TTC)</span>
            </li>
            <li>
              <p>Méthode de Paiement</p><span>: Par chéque</span>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-lg-6 col-lx-4">
        <div class="single_confirmation_details">
          <h4>&Aacute; propos de la Livraison</h4>
          <ul>
            <li>
              <p>Ville </p><span>: {{ App\Http\Controllers\AuthController::IsAuthentificated() ? $last_person->ville : session()->get('ville') }} </span>
            </li>
            <li>
              <p>Adresse </p><span>: {{ App\Http\Controllers\AuthController::IsAuthentificated() ? $last_person->adresse : session()->get('adresse') }} </span>
            </li>
            <!-- <li>
              <p>country</p><span>: United States</span>
            </li> -->
            <li>
              <p>Code Postal</p>
              <span>: {{ App\Http\Controllers\AuthController::IsAuthentificated() ? $last_person->codepostal : session()->get('codePostal') }} </span>
            </li>
            <li>
              <p>N&deg; Téléphone</p><span>: {{ App\Http\Controllers\AuthController::IsAuthentificated() ? $last_person->telephone : session()->get('telephone') }} </span>
            </li>
          </ul>
        </div>
      </div>
      <!-- <div class="col-lg-6 col-lx-4">
        <div class="single_confirmation_details">
          <h4>shipping Address</h4>
          <ul>
            <li>
              <p>Street</p><span>: 56/8</span>
            </li>
            <li>
              <p>city</p><span>: Los Angeles</span>
            </li>
            <li>
              <p>country</p><span>: United States</span>
            </li>
            <li>
              <p>postcode</p><span>: 36952</span>
            </li>
          </ul>
        </div>
      </div> -->
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="order_details_iner">
          <h3>Détails de la commande.</h3>
          <table class="table table-borderless">
            <thead>
              <tr>
                <th scope="col" colspan="2">Produits</th>
                <th scope="col">Quantité</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
              @if(App\Http\Controllers\AuthController::IsAuthentificated())
              @foreach($produitsEnregistres as $prod)
              <tr>
                <th colspan="2">
                  <span>
                    {{ collect(DB::select("select produit.nom_produit from carateristique inner join produit on produit.id_produit = carateristique.produit_ where carateristique.id_caractere = $prod->produit_"))->first()->nom_produit }}
                  </span>
                </th>
                <th>x {{ $prod->nbr }} Pcs</th>
                <th>
                  <span>
                    {{ collect(DB::select("select carateristique.prix from carateristique inner join produit on produit.id_produit = carateristique.produit_ where carateristique.id_caractere = $prod->produit_"))->first()->prix
                        *
                        $prod->nbr
                      }} Dhs
                  </span>
                </th>
              </tr>
              @endforeach

              @elseif(session()->has("produits"))
              @foreach(session()->get("produits")->keys() as $prod)
              <tr>
                <th colspan="2">
                  <span>
                    {{ collect(DB::select("select produit.nom_produit from carateristique inner join produit on produit.id_produit = carateristique.produit_ where carateristique.id_caractere = $prod"))->first()->nom_produit }}
                  </span>
                </th>
                <th>x {{ session()->get('produits')['' . $prod] }} Pcs</th>
                <th>
                  <span>
                    {{ collect(DB::select("select carateristique.prix from carateristique inner join produit on produit.id_produit = carateristique.produit_ where carateristique.id_caractere = $prod"))->first()->prix
                        *
                        session()->get('produits')['' . $prod]
                      }} Dhs
                  </span>
                </th>
              </tr>
              @endforeach
              @endif

              <tr>
                <th colspan="3">Montant</th>
                <th>
                  <span>
                    {{ $MontantHidden }}
                  </span>
                </th>
              </tr>
              <tr>
                <th colspan="3">Livraison</th>
                <th><span>Livraison Option 4: &nbsp; 270 Dhs</span></th>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <th scope="col" colspan="3">Facturation totale (TTC)</th>
                <th scope="col">{{ $FacturationHidden }}</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <br>
        <br>
        <br>
        <div style="text-align: center;">
          <button class="btn_3" onclick="window.print();return false;" />>
          <i class="fas fa-print"></i>
          Imprimer
          </button>
          <br>
          <br>
          <button class="btn_3" onclick="window.location.href='{{ route('backToHome') }}'" />
          <i class="fas fa-home"></i>
          Retour à l'accueil
          </button>
        </div>
      </div>
    </div>
  </div>
</section>
<!--================ confirmation part end =================-->
@endsection

@section('scripts')
<script src="js/stellar.js"></script>
<script src="js/price_rangs.js"></script>
@endsection
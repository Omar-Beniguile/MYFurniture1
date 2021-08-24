@extends('layout.app')

@section('linkcss')
<!-- nice select CSS -->
<link rel="stylesheet" href="css/nice-select.css">
<link rel="stylesheet" href="css/price_rangs.css">

@endsection
@section('body')
<!--================Home Banner Area =================-->
<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="breadcrumb_iner">
          <div class="breadcrumb_iner_item">
            <h2>Mon Panier</h2>
            <p>-Intervention & Paiement sécurisés-</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- breadcrumb start-->

<!--================Cart Area =================-->
<section class="cart_area padding_top">
  <div class="container">
    <div class="cart_inner">
      <a href="{{ url('/viderPanier') }}" class="btn_1">
        <i class="far fa-trash-alt"></i>
        Vider mon panier
      </a>
      <div class="table-responsive" style="overflow-x: unset;">
        <table class="table">
          <thead>
            <tr>
              <th scope="col" style="text-align: center;">Produit</th>
              <th scope="col">Prix</th>
              <th scope="col" style="text-align: center;">Quantité</th>
              <th scope="col" style="text-align: center;">Total</th>
            </tr>
          </thead>
          <tbody>
            @if(App\Http\Controllers\AuthController::IsAuthentificated())
            @if(count($produitsEnregistres) !=0 )
            @foreach($produitsEnregistres as $prod)
            <tr>
              <td>
                <div class="media">
                  <div class="d-flex" style="width: 33%;">
                    <img style="border-radius: 22px;" src='images/{{ collect(DB::select("select photo.chemin_photo from carateristique inner join produit on produit.id_produit = carateristique.produit_ inner join photo ON photo.produit_ = produit.id_produit where carateristique.id_caractere = $prod->produit_"))->first()->chemin_photo }}' alt="" />
                  </div>
                  <div class="media-body">
                    <p>
                      {{ collect(DB::select("select produit.nom_produit from carateristique inner join produit on produit.id_produit = carateristique.produit_ where carateristique.id_caractere = $prod->produit_"))->first()->nom_produit }}
                      <br>
                      <span style="font-weight: 500;text-decoration: underline;">
                        {{ collect(DB::select("select carateristique.libelle_option_produit from carateristique inner join produit on produit.id_produit = carateristique.produit_ where carateristique.id_caractere = $prod->produit_"))->first()->libelle_option_produit }}
                      </span>
                    </p>
                  </div>
                </div>
              </td>
              <td style="width: 10%;padding: 0px;">
                <h5>
                  <span id="prix{{ $prod->produit_ }}">
                    {{ collect(DB::select("select carateristique.prix from carateristique inner join produit on produit.id_produit = carateristique.produit_ where carateristique.id_caractere = $prod->produit_"))->first()->prix }}
                  </span>
                  Dhs
                </h5>
              </td>
              <td>
                <div class="product_count">
                  <span class="input-number-decrement"> <i id="{{ $prod->produit_ }}" class="ti-angle-down" style="cursor: pointer;"></i></span>
                  <input id="quantite{{ $prod->produit_ }}" class="input-number" type="text" min="0" value="{{ $prod->nbr }}">
                  <span class="input-number-increment"> <i id="{{ $prod->produit_ }}" class="ti-angle-up" style="cursor: pointer;"></i></span>
                </div>
              </td>
              <td style="padding: 0px;">
                <h5>
                  <span id="total{{ $prod->produit_ }}" class="spanTotal">
                    {{ collect(DB::select("select carateristique.prix from carateristique inner join produit on produit.id_produit = carateristique.produit_ where carateristique.id_caractere = $prod->produit_"))->first()->prix
                    *
                    $prod->nbr
                  }}
                  </span>
                  Dhs</h5>
              </td>
            </tr>
            @endforeach
            @else
            <tr>
              <td>
                Votre panier est vide !
              </td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            @endif

            @elseif(session()->has("produits"))
            @foreach(session()->get("produits")->keys() as $prod)
            <tr>
              <td>
                <div class="media">
                  <div class="d-flex" style="width: 33%;">
                    <img style="border-radius: 22px;" src='images/{{ collect(DB::select("select photo.chemin_photo from carateristique inner join produit on produit.id_produit = carateristique.produit_ inner join photo ON photo.produit_ = produit.id_produit where carateristique.id_caractere = $prod"))->first()->chemin_photo }}' alt="" />
                  </div>
                  <div class="media-body">
                    <p>
                      {{ collect(DB::select("select produit.nom_produit from carateristique inner join produit on produit.id_produit = carateristique.produit_ where carateristique.id_caractere = $prod"))->first()->nom_produit }}
                      <br>
                      <span style="font-weight: 500;text-decoration: underline;">
                        {{ collect(DB::select("select carateristique.libelle_option_produit from carateristique inner join produit on produit.id_produit = carateristique.produit_ where carateristique.id_caractere = $prod"))->first()->libelle_option_produit }}
                      </span>
                    </p>
                  </div>
                </div>
              </td>
              <td style="width: 10%;padding: 0px;">
                <h5>
                  <span id="prix{{ $prod }}">
                    {{ collect(DB::select("select carateristique.prix from carateristique inner join produit on produit.id_produit = carateristique.produit_ where carateristique.id_caractere = $prod"))->first()->prix }}
                  </span>
                  Dhs
                </h5>
              </td>
              <td>
                <div class="product_count">
                  <span class="input-number-decrement"> <i id="{{ $prod }}" class="ti-angle-down" style="cursor: pointer;"></i></span>
                  <input id="quantite{{ $prod }}" class="input-number" type="text" min="0" value="{{ session()->get('produits')['' . $prod] }}">
                  <span class="input-number-increment"> <i id="{{ $prod }}" class="ti-angle-up" style="cursor: pointer;"></i></span>
                </div>
              </td>
              <td style="padding: 0px;">
                <h5>
                  <span id="total{{ $prod }}" class="spanTotal">
                    {{ collect(DB::select("select carateristique.prix from carateristique inner join produit on produit.id_produit = carateristique.produit_ where carateristique.id_caractere = $prod"))->first()->prix
                      *
                      session()->get('produits')['' . $prod]
                    }}
                  </span>
                  Dhs</h5>
              </td>
            </tr>
            @endforeach
            @else
            <tr>
              <td>
                Votre panier est vide !
              </td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            @endif

            <!-- <tr class="bottom_button">
              <td>
                <a class="btn_1" href="#">Update Cart</a>
              </td>
              <td></td>
              <td></td>
              <td>
                <div class="cupon_text float-right">
                  <a class="btn_1" href="#">Close Coupon</a>
                </div>
              </td>
            </tr> -->
            <tr>
              <td></td>
              <td></td>
              <td>
                <h5>Facturation :</h5>
              </td>
              <td>
                <h5>
                  <span id="spanFacturation">

                  </span>
                  Dhs
                </h5>
              </td>
            </tr>
            @if(session()->has("produits") || isset($produitsEnregistres) )
            <tr class="shipping_area">
              <td></td>
              <td></td>
              <td>
                <h5></h5>
              </td>
              <td>
                <div class="shipping_box">
                  <ul class="list">
                    <li>
                      <a style="cursor: pointer;">Livraison Option 1: &nbsp; 55.00 Dhs</a>
                    </li>
                    <li>
                      <a style="cursor: pointer;">Livraison Option 2</a>
                    </li>
                    <li>
                      <a style="cursor: pointer;">Livraison Option 3: &nbsp; 100 Dhs</a>
                    </li>
                    <li class="active">
                      <a style="cursor: pointer;">Livraison Option 4: &nbsp; 270 Dhs</a>
                    </li>
                  </ul>
                  <!-- <h6>
                    Calculate Shipping
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                  </h6> -->
                  <!-- <select class="shipping_select">
                    <option value="1">Nador</option>
                    <option value="2">Oujda</option>
                    <option value="4">Berkane</option>
                    <option value="5">Rabat</option>
                    <option value="6">Casa Blanca</option>
                  </select> -->
                  <!-- <select class="shipping_select section_bg" style="visibility: hidden;">
                    <option value="1">Select a State</option>
                    <option value="2">Select a State</option>
                    <option value="4">Select a State</option>
                  </select> -->
                  <!-- <input type="text" placeholder="Adresse Exact, N&ordm; Rue." /> -->
                  <!-- <a class="btn_1" href="#">Update Details</a> -->
                </div>
              </td>
            </tr>
            @endif
          </tbody>
        </table>
        <div class="checkout_btn_inner float-right">
          <a class="btn_1" href="/">
            <i class="fas fa-store-alt"></i>
            &nbsp;
            Retour à la boutique
          </a>
          @if(session()->has("produits") || App\Http\Controllers\AuthController::IsAuthentificated())
          <a class="btn_1 checkout_btn_1" href="{{ url('/Paiement') }}">
            Confirmation
            &nbsp;
            <i class="fas fa-chevron-circle-right"></i>
          </a>
          @endif
        </div>
      </div>
    </div>
</section>
<!--================End Cart Area =================-->
@endsection

@section('scripts')
<script src="js/mail-script.js"></script>
<script src="js/stellar.js"></script>
<script src="js/price_rangs.js"></script>
<script>
  $(document).ready(function() {
    $(".input-number-decrement").unbind("click");
    $(".input-number-increment").unbind("click");

    $(".ti-angle-up").click(function() {
      var nouvelleQtt = parseInt($("#quantite" + this.id).val()) + 1;
      var prix = parseFloat($("#prix" + this.id).html());
      $("#quantite" + this.id).val(nouvelleQtt);
      $("#total" + this.id).html(nouvelleQtt * prix);
      CalculeFacturation();
    })
    $(".ti-angle-down").click(function() {
      if (parseInt($("#quantite" + this.id).val()) > 0) {
        var nouvelleQtt = parseInt($("#quantite" + this.id).val()) - 1;
        var prix = parseFloat($("#prix" + this.id).html());
        $("#quantite" + this.id).val(nouvelleQtt);
        $("#total" + this.id).html(nouvelleQtt * prix);
      }
      CalculeFacturation();
    })

    function CalculeFacturation() {
      var somme = 0;
      Array.from(document.getElementsByClassName("spanTotal")).forEach(span => {
        somme += parseFloat(span.textContent);
      });
      $('#spanFacturation').html(somme);
    }
    CalculeFacturation();
  })
</script>
@endsection
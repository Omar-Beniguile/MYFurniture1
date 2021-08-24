@extends('layout.app')

@section('linkcss')
<link rel="stylesheet" href="{{ url('css/lightslider.min.css') }}">
<style>
  .disabled {
    pointer-events: none;
    cursor: pointer;
  }
</style>
@endsection

@section('body')
<!-- breadcrumb start-->
<!-- <section class="breadcrumb" style="background-image: url('/img/ImgIrina.png');">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="breadcrumb_iner">
          <div class="breadcrumb_iner_item">
            <h2> {{ $info_produit->nom_marque }} </h2>
            <p>{{ $info_produit->sloggan_marque }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->
<!-- breadcrumb start-->
<!--================End Home Banner Area =================-->

<!--================Single Product Area =================-->
<div class="product_image_area section_padding">
  <div class="container">
    <div class="row s_product_inner justify-content-between">
      <div class="col-lg-7 col-xl-7">
        <div class="product_slider_img">
          <div id="vertical">

            @foreach(
            DB::select("select * from photo where produit_ = $info_produit->id_produit ")
            as
            $photo
            )
            <div data-thumb="/images/{{$photo->chemin_photo}}">
              <img src="/images/{{$photo->chemin_photo}}" style="border-radius: 20px;" />
            </div>
            @endforeach
          </div>
        </div>
      </div>
      <div class="col-lg-5 col-xl-4">
        <div class="s_product_text">
          <h3>{{ $info_produit->nom_produit }}</h3>
          <h5>
            @foreach(
            DB::select("
            select id_caractere, libelle_option_produit from produit inner join carateristique on carateristique.produit_ = produit.id_produit
            where produit.id_produit = $info_produit->id_produit")
            as
            $info
            )
            <div class="row">
              <div class="primary-radio">
                <input type="radio" class="radioOptions" name="radioOptions" id="{{$info->id_caractere}}">
                <label style="border:1px solid black;" for="{{$info->id_caractere}}"></label>
              </div>
              <i> &nbsp; {{ $info->libelle_option_produit }}</i>
            </div>
            @endforeach
          </h5>
          <h2 id="prix"></h2>
          <ul class="list">
            <li>
              <a class="active" href="#">
                <span>Catégorie</span> : {{ $info_produit->libelle_type }}</a>
            </li>
            <li>
              <a href="#"> <span>disponibilité</span> : {{ $info_produit->qtt_stock }} en Stock</a>
            </li>
          </ul>
          <p id="containerDescriptions">

          </p>
          <div class="card_area d-flex justify-content-between align-items-center">
            <div class="product_count">
              <span class="inumber-decrement" style="cursor: pointer;"> <i class="ti-minus"></i></span>
              <input id="QttInput" class="input-number" type="text" value="1" min="0" max="10">
              <span class="number-increment" style="cursor: pointer;"> <i class="ti-plus"></i></span>
            </div>
            <a class="btn_3 add_cart" style="font-weight: 700;cursor: pointer;" id="">Au panier !</a>
            <a href="#" class="like_us"> <i class="ti-heart"></i> </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
  <div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Caractéristiques</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Commentaires</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Demonstration</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
        <p>
          Beryl Cook is one of Britain’s most talented and amusing artists
          .Beryl’s pictures feature women of all shapes and sizes enjoying
          themselves .Born between the two world wars, Beryl Cook eventually
          left Kendrick School in Reading at the age of 15, where she went
          to secretarial school and then into an insurance office. After
          moving to London and then Hampton, she eventually married her next
          door neighbour from Reading, John Cook. He was an officer in the
          Merchant Navy and after he left the sea in 1956, they bought a pub
          for a year before John took a job in Southern Rhodesia with a
          motor company. Beryl bought their young son a box of watercolours,
          and when showing him how to use it, she decided that she herself
          quite enjoyed painting. John subsequently bought her a child’s
          painting set for her birthday and it was with this that she
          produced her first significant work, a half-length portrait of a
          dark-skinned lady with a vacant expression and large drooping
          breasts. It was aptly named ‘Hangover’ by Beryl’s husband and
        </p>
        <p>
          It is often frustrating to attempt to plan meals that are designed
          for one. Despite this fact, we are seeing more and more recipe
          books and Internet websites that are dedicated to the act of
          cooking for one. Divorce and the death of spouses or grown
          children leaving for college are all reasons that someone
          accustomed to cooking for more than one would suddenly need to
          learn how to adjust all the cooking practices utilized before into
          a streamlined plan of cooking that is more efficient for one
          person creating less
        </p>
      </div>
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="table-responsive">
          <!-- <table class="table">
            <tbody>
              <tr>
                <td>
                  <h5>Width</h5>
                </td>
                <td>
                  <h5>128mm</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Height</h5>
                </td>
                <td>
                  <h5>508mm</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Depth</h5>
                </td>
                <td>
                  <h5>85mm</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Weight</h5>
                </td>
                <td>
                  <h5>52gm</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Quality checking</h5>
                </td>
                <td>
                  <h5>yes</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Freshness Duration</h5>
                </td>
                <td>
                  <h5>03days</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>When packeting</h5>
                </td>
                <td>
                  <h5>Without touch of hand</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Each Box contains</h5>
                </td>
                <td>
                  <h5>60pcs</h5>
                </td>
              </tr>
            </tbody>
          </table> -->
          <table class="table">
            <tbody>
              <tr>
                <td>
                  <h5>Longueur</h5>
                </td>
                <td>
                  <h5>info</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Largeur</h5>
                </td>
                <td>
                  <h5>info</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Profondeur</h5>
                </td>
                <td>
                  <h5>info</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Poid</h5>
                </td>
                <td>
                  <h5>info</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Livraison</h5>
                </td>
                <td>
                  <h5>info</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Garantie</h5>
                </td>
                <td>
                  <h5>info</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Marque d'origine</h5>
                </td>
                <td>
                  <h5>info</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Nbr d'article</h5>
                </td>
                <td>
                  <h5>info</h5>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <div class="row">
          <div class="col-lg-6">
            @if(count($commentaires) != 0)
            <br>
            <div class="comment_list">

              @foreach($commentaires as $avis)
              <div class="review_item">
                <div class="media">
                  <div class="d-flex">
                    <img src="{{ url('img/avatar.jpg') }}" style="width: 70px;border-radius: 50px;" />
                  </div>
                  <div class="media-body">
                    <h4>{{ $avis->nom_complet_user }}</h4>
                    <!-- <h5>12th Feb, 2017 at 05:56 pm</h5> -->
                    <h5>
                      @php
                      setlocale(LC_TIME, 'French');
                      echo Carbon\Carbon::parse($avis->date_insertion)->formatLocalized('%d %B %Y');
                      @endphp
                    </h5>
                  </div>
                </div>
                <p>
                  {{ $avis->description_commentaire }}
                </p>
              </div>
              @endforeach
            </div>

            @else
            <div class="review_list">
              <img src="{{ url('img/commenaire.jpg') }}">
            </div>
            @endif
          </div>
          <div class="col-lg-6">
            <div class="review_box">
              <h4>Ajouter un commentaire</h4>
              <form class="row contact_form" action="{{ route('StoreCommentaire') }}" method="post" autocomplete="off">
                @csrf
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" name="nom_complet" placeholder="Nom complet" required />
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Adresse email" />
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" name="telephone" placeholder="Numéroo de téléphone" required />
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <textarea class="form-control" name="avis" rows="1" style="height: 100px;" placeholder="Votre avis" maxlength="250" required></textarea>
                  </div>
                </div>
                <input type="hidden" name="produit" value="{{$info_produit->id_produit}}">
                <div class="col-md-12 text-right">
                  <button type="submit" value="submit" class="btn_3">
                    Envoyer
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
        <div class="row">
          <div class="col-lg-6">
            <div class="row total_rate">
              <div class="col-6">
                <div class="box_total">
                  <h5>En Moyenne</h5>
                  <h4>{{ number_format(collect($demontrations)->pluck('note_etoile')->avg(), 2) }}</h4>
                  <h6>({{ count($demontrations) }} démo)</h6>
                </div>
              </div>
              <div class="col-6">
                <div class="rating_list">
                  <h3>Basé sur {{ count($demontrations) }} démo</h3>
                  <ul class="list">

                    @if(collect($notes)->pluck('note_etoile')->contains('5'))
                    <li>
                      <a>5 étoile
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i> {{collect($notes)->where('note_etoile',5)->first()->nbr}}
                      </a>
                    </li>
                    @endif

                    @if(collect($notes)->pluck('note_etoile')->contains('4'))
                    <li>
                      <a>4 étoile
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="far fa-star"></i> {{collect($notes)->where('note_etoile',4)->first()->nbr}}
                      </a>
                    </li>
                    @endif

                    @if(collect($notes)->pluck('note_etoile')->contains(3))
                    <li>
                      <a>3 étoile
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i> {{collect($notes)->where('note_etoile',3)->first()->nbr}}
                      </a>
                    </li>
                    @endif

                    @if(collect($notes)->pluck('note_etoile')->contains(2))
                    <li>
                      <a>2 étoile
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i> {{collect($notes)->where('note_etoile',2)->first()->nbr}}
                      </a>
                    </li>
                    @endif

                    @if(collect($notes)->pluck('note_etoile')->contains(1))
                    <li>
                      <a>1 étoile&nbsp;
                        <i class="fa fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i> {{collect($notes)->where('note_etoile',1)->first()->nbr}}
                      </a>
                    </li>
                    @endif

                  </ul>
                </div>
              </div>
            </div>

            @if(count($demontrations) != 0)
            <br>
            <div class="review_list">

              @foreach($demontrations as $demo)
              <div class="review_item">
                <div class="media">
                  <div class="d-flex">
                    <img src="{{ url('img/avatar.jpg') }}" style="width: 70px;border-radius: 50px;" />
                  </div>
                  <div class="media-body">
                    <h4>{{ $demo->nom_complet_user }} </h4>
                    @for($i = 0; $i < $demo->note_etoile; $i++)
                      <i class="fa fa-star"></i>
                      @endfor
                  </div>
                </div>
                <p>
                  {{ $demo->description_demontration }}
                </p>
              </div>
              @endforeach

            </div>
            @else
            <div class="review_list">
              <img src="{{ url('img/commenaire.jpg') }}">
            </div>
            @endif
          </div>
          <div class="col-lg-6">
            <div class="review_box">
              <h4>Ajouter un commentaire</h4>
              <p>Votre note : </p>
              <ul class="list">
                <li>
                  <a class="Aetoile" href="javascript:void(0)">
                    <i class="far fa-star etoileNote" id="etoile-1"></i>
                  </a>
                </li>
                <li>
                  <a class="Aetoile" href="javascript:void(0)">
                    <i class="far fa-star etoileNote" id="etoile-2"></i>
                  </a>
                </li>
                <li>
                  <a class="Aetoile" href="javascript:void(0)">
                    <i class="far fa-star etoileNote" id="etoile-3"></i>
                  </a>
                </li>
                <li>
                  <a class="Aetoile" href="javascript:void(0)">
                    <i class="far fa-star etoileNote" id="etoile-4"></i>
                  </a>
                </li>
                <li>
                  <a class="Aetoile" href="javascript:void(0)">
                    <i class="far fa-star etoileNote" id="etoile-5"></i>
                  </a>
                </li>
              </ul>
              <!-- <p>Outstanding</p> -->
              <form class="row contact_form" action="{{ route('StoreDemo') }}" method="post" novalidate="novalidate" autocomplete="off">
                @csrf
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" name="nom_complet" placeholder="Nom complet" required />
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Adresse email" />
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" name="telephone" placeholder="Numéro de téléphone" required />
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <textarea class="form-control" name="avis" rows="1" style="height: 100px;" placeholder="Votre avis" required></textarea>
                  </div>
                </div>
                <input type="hidden" id="note_etoile" name="note_etoile" value="">
                <input type="hidden" name="produit" value="{{$info_produit->id_produit}}">
                <div class="col-md-12 text-right">
                  <button type="submit" value="submit" class="btn_3">
                    Envoyer
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--================End Product Description Area =================-->

<!-- product_list part start-->
<section class="product_list best_seller">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="section_tittle text-center">
          <h2>Top Des Achats</h2>
        </div>
      </div>
    </div>
    <div class="row align-items-center justify-content-between">
      <div class="col-lg-12">
        <div class="best_product_slider owl-carousel">

          @foreach($produits as $prod)
          <div class="single_product_item">
            <img src='../images/{{ collect(DB::select("select chemin_photo from photo where photo.produit_ = $prod->id_produit limit 1"))->first()->chemin_photo }}' alt="">
            <div class="single_product_text">
              <span onclick="window.location.href='/Produit/'+ {{$prod->id_produit}}" style="cursor: pointer;">
                <h4>
                  {{$prod->nom_produit}}
                </h4>
              </span>
              <h3>
                @if(isset(collect(DB::select("select carateristique.prix from produit inner join carateristique on carateristique.produit_ = produit.id_produit where carateristique.produit_ = $prod->id_produit order by carateristique.prix asc limit 1"))->first()->prix))
                {{ collect(DB::select("select carateristique.prix from produit inner join carateristique on carateristique.produit_ = produit.id_produit where carateristique.produit_ = $prod->id_produit order by carateristique.prix asc limit 1"))->first()->prix }}
                Dhs
                @endif
              </h3>
            </div>
          </div>
          @endforeach

        </div>
      </div>
    </div>
  </div>
</section>
<!-- product_list part end-->
@endsection

@section('scripts')
<script src="{{ url('js/lightslider.min.js') }}"></script>
<script src="{{ url('js/stellar.js') }}"></script>
<script src="{{ url('js/theme.js') }}"></script>
<script src="{{ url('js/notify.min.js') }}"></script>

<script>
  $(document).ready(function() {

    $("input:radio[name='radioOptions']").change(function() {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax({
        url: "{{ route('importDescriptions') }}",
        method: 'GET',
        data: {
          id_caracteristique: this.id,
        },
        dataType: 'json',
        success: function(reponse) {
          $('#prix').html(reponse.prix + " Dhs");
          $('.add_cart').attr("id", reponse.id_caractere);

          $("#containerDescriptions").empty();
          $("#containerDescriptions").append(`<b style='text-decoration: underline;font-size: 18px;'>${reponse.libelle_caractere}</b><br>`);
          reponse.descriptions.forEach(function(description) {
            $("#containerDescriptions").append(`<i>${description.libelle_description}</i><br>`);
          });
        }
      });

    });

    $(".add_cart").click(function() {

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax({
        url: "{{ route('AjoutPanier') }}",
        method: 'POST',
        data: {
          produit: this.id,
          nbr: $("#QttInput").val()
        },
        dataType: 'json',
        success: function(data) {
          $.notify("Ajouté au panier 🤩 !", {
            autoHideDelay: 5000,
            className: 'success',
            align: "center",
            verticalAlign: "top"
          });
        }
      });

    });

    Array.from($("input:radio[name='radioOptions']"))[0].click();

    $(".etoileNote").mouseenter(function() {
      var i = parseInt(this.id.split('-')[1]);
      while (i != 0) {
        $('#etoile-' + i).removeClass('far fa-star');
        $('#etoile-' + i).addClass('fa fa-star');
        i--;
      }
    });
    $(".etoileNote").mouseout(function() {
      var i = parseInt(this.id.split('-')[1]);
      while (i != 0) {
        $('#etoile-' + i).removeClass('fa fa-star');
        $('#etoile-' + i).addClass('far fa-star');
        i--;
      }
    });

    $(".etoileNote").click(function() {
      $(".etoileNote").unbind("mouseout");
      $(".etoileNote").unbind("mouseenter");
      $("#note_etoile").val(this.id.split('-')[1]);
      $(".etoileNote").unbind("click");
    });

  });
</script>
@endsection
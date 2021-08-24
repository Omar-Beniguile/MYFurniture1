@extends('layout.app')

@section('body')
<!-- banner part start-->
<section class="banner_part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="banner_slider owl-carousel">
                    <div class="single_banner_slider">
                        <div class="row">
                            <div class="col-lg-5 col-md-8">
                                <div class="banner_text">
                                    <div class="banner_text_iner">
                                        <h1>
                                            Lit parfait etc
                                            et bon prix
                                        </h1>
                                        <p>Un simple texte de description à propos du produit
                                            qui apparait dans l'image à droite
                                        </p>
                                        <a href="#" class="btn_2">Acheter !</a>
                                    </div>
                                </div>
                            </div>
                            <div class="banner_img d-none d-lg-block">
                                <img src="img/bedMoraTransparent.png" alt="" style="width: 67%;margin-left: 33%;margin-top: -10%;">
                            </div>
                        </div>
                    </div>
                    <div class="single_banner_slider">
                        <div class="row">
                            <div class="col-lg-5 col-md-8">
                                <div class="banner_text">
                                    <div class="banner_text_iner">
                                        <h1>Lit parfait etc
                                            et bon prix</h1>
                                        <p>Un simple texte de description à propos du produit
                                            qui apparait dans l'image à droite
                                        </p>
                                        <a href="#" class="btn_2">Acheter</a>
                                    </div>
                                </div>
                            </div>
                            <div class="banner_img d-none d-lg-block">
                                <img src="img/banner_img.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="single_banner_slider">
                        <div class="row">
                            <div class="col-lg-5 col-md-8">
                                <div class="banner_text">
                                    <div class="banner_text_iner">
                                        <h1>Lit parfait etc
                                            et bon prix</h1>
                                        <p>Un simple texte de description à propos du produit
                                            qui apparait dans l'image à droite
                                        </p>
                                        <a href="#" class="btn_2">Acheter</a>
                                    </div>
                                </div>
                            </div>
                            <div class="banner_img d-none d-lg-block">
                                <img src="img/banner_img.png" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- <div class="single_banner_slider">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                            <h1>Cloth $ Wood Sofa</h1>
                                            <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                                suspendisse ultrices gravida. Risus commodo viverra</p>
                                            <a href="#" class="btn_2">Acheter</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <img src="img/banner_img.png" alt="">
                                </div>
                            </div>
                        </div> -->
                </div>
                <div class="slider-counter"></div>
            </div>
        </div>
    </div>
</section>
<!-- banner part start-->

<!-- feature_part start-->
<section class="feature_part padding_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section_tittle text-center">
                    <h2>Dernieres nouveautés</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-7 col-sm-6">
                <div class="single_feature_post_text">
                    <p>Qualité premium</p>
                    <h3>Chez Mora</h3>
                    <a href="#" class="feature_btn">Explorer ! <i class="fas fa-play"></i></a>
                    <img src="img/feature/feature_1.png" alt="">
                </div>
            </div>
            <div class="col-lg-5 col-sm-6">
                <div class="single_feature_post_text">
                    <p>Qualité premium</p>
                    <h3>Chez Piell</h3>
                    <a href="#" class="feature_btn">Explorer ! <i class="fas fa-play"></i></a>
                    <img src="img/feature/feature_2.png" alt="">
                </div>
            </div>
            <div class="col-lg-5 col-sm-6">
                <div class="single_feature_post_text">
                    <p>Qualité premium</p>
                    <h3>Chez Viven</h3>
                    <a href="#" class="feature_btn">Explorer ! <i class="fas fa-play"></i></a>
                    <img src="img/feature/feature_3.png" alt="">
                </div>
            </div>
            <div class="col-lg-7 col-sm-6">
                <div class="single_feature_post_text">
                    <p>Qualité premium</p>
                    <h3>Chez Irina Home</h3>
                    <a href="#" class="feature_btn">Explorer ! <i class="fas fa-play"></i></a>
                    <img src="img/feature/feature_4.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- upcoming_event part start-->

<!-- product_list start-->
<section class="product_list section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>
                        Tendances du mois
                    </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="product_list_slider owl-carousel">
                    <div class="single_product_list_slider">
                        <div class="row align-items-center justify-content-between">

                            @foreach($produits as $prod)
                            <div class="col-lg-3 col-sm-6">
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
                                        <a style="cursor: pointer;z-index: 100;" id='{{collect(DB::select("select carateristique.id_caractere from produit inner join  carateristique on carateristique.produit_ = produit.id_produit where carateristique.produit_ = $prod->id_produit order by carateristique.prix asc limit 1"))->first()->id_caractere }}' class="add_cart">+ Au panier</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="single_product_list_slider">
                        <div class="row align-items-center justify-content-between">

                            @foreach($produits as $prod)
                            <div class="col-lg-3 col-sm-6">
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
                                        <a style="cursor: pointer;z-index: 100;" id='{{collect(DB::select("select carateristique.id_caractere from produit inner join  carateristique on carateristique.produit_ = produit.id_produit where carateristique.produit_ = $prod->id_produit order by carateristique.prix asc limit 1"))->first()->id_caractere }}' class="add_cart">+ Au panier</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product_list part start-->

<!-- awesome_shop start-->
<section class="our_offer section_padding">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-6 col-md-6">
                <div class="offer_img">
                    <img src="../img/promotion.jpg" alt="" style="border-radius: 20%;">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="offer_text">
                    <h2>
                        Promotion -60% !
                        Uniquement cette semaine.
                    </h2>
                    <div class="date_countdown">
                        <div id="timer">
                            <div id="days" class="date"></div>
                            <div id="hours" class="date"></div>
                            <div id="minutes" class="date"></div>
                            <div id="seconds" class="date"></div>
                        </div>
                    </div>
                    <form action="{{ route('StoreMessage') }}" method="post" autocomplete="off">
                        <div class="input-group">
                            @csrf
                            <input type="email" name="email_persone" class="form-control" placeholder="Votre adresse Email" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                            <div class="input-group-append">
                                <input type="submit" class="input-group-text btn_2" id="basic-addon2" value="Réserver">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- awesome_shop part start-->

<!-- product_list part start-->
<section class="product_list best_seller section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>
                        Top des achats
                    </h2>
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

<!-- subscribe_area part start-->
<section class="subscribe_area section_padding" style="background-image: url('img/test.png');    padding: 70px 0px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="subscribe_area_text text-center">
                    <h5>Rejoignez notre Newsletter</h5>
                    <h2>Abonnez-vous pour ne pas rater nos meilleurs offres !</h2>
                    <form action="{{ route('StoreMessage') }}" method="post" autocomplete="off">
                        <div class="input-group">
                            @csrf
                            <input type="email" name="email_persone" class="form-control" placeholder="Votre adresse Email" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                            <div class="input-group-append">
                                <input type="submit" class="input-group-text btn_2" id="basic-addon2" value="S'abonner">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--::subscribe_area part end::-->

<!-- subscribe_area part start-->
<section class="client_logo padding_top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="single_client_logo">
                    <img style="height: inherit;    filter: initial;" src="https://cdn.ycan.shop/stores/monlit/categories/PKR3zz5SSQY2adj1zzH1C1W464Fhiwy3Lrr4Emgg_md.jpeg" alt="">
                </div>
                <div class="single_client_logo">
                    <img style="height: inherit;    filter: initial;" src="https://cdn.ycan.shop/stores/monlit/categories/S622cdssaD2GjzsPX64WhxNu3d27zEclOVzRnV1V_md.jpeg" alt="">
                </div>
                <div class="single_client_logo">
                    <img style="height: inherit;    filter: initial;" src="https://cdn.ycan.shop/stores/monlit/categories/Z1cP5sZwd2DZGjpc7iuCPQ9JavHxfbLkR4H3VDMH_md.jpeg" alt="">
                </div>
                <div class="single_client_logo">
                    <img style="height: inherit;    filter: initial;" src="https://cdn.ycan.shop/stores/monlit/categories/DuKgdYi7ffcNNZyIc2krALNLMdimMrHGdaRFGXmn_md.jpeg" alt="">
                </div>
                <div class="single_client_logo">
                    <img style="height: inherit;    filter: initial;" src="https://cdn.ycan.shop/stores/monlit/categories/VQzVSth235V1plHuUC1I76Nwn3XO8vfY1Ikn2EwJ_md.jpeg" alt="">
                </div>
                <div class="row" style="padding-left: 40%;">
                    <div class="single_client_logo">
                        <img style="height: inherit;    filter: initial;" src="https://cdn.ycan.shop/stores/monlit/categories/KHSsgQyuoH5haT3SWIbkC1kkWYefRPjHNev7UKYA_md.jpeg" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img style="height: inherit;    filter: initial;" src="https://cdn.ycan.shop/stores/monlit/categories/qQ56erxKqoHBbkucQ7oHpxaMjnNd8N0y1xujHFH9_md.jpeg" alt="">
                    </div>
                </div>
                <!-- <div class="single_client_logo">
                    <img src="img/client_logo/client_logo_2.png" alt="">
                </div>
                <div class="single_client_logo">
                    <img src="img/client_logo/client_logo_3.png" alt="">
                </div>
                <div class="single_client_logo">
                    <img src="img/client_logo/client_logo_4.png" alt="">
                </div> -->
            </div>
        </div>
    </div>
</section>
<!--::subscribe_area part end::-->
@endsection

@section('scripts')

<script src="{{ url('js/notify.min.js') }}"></script>

<script>
    $(document).ready(function() {

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
                    nbr: 1
                },
                dataType: 'json',
                success: function(data) {
                    $.notify("Ajouté au panier 🤩 !", {
                        autoHideDelay: 5000,
                        className: 'success',
                        align: "center",
                        verticalAlign: "top"
                    });
                    document.getElementsByTagName("head")[0].insertAdjacentHTML(
                        "beforeend",
                        "<style> .main_menu .cart i:after {content : '" + data + "'}</style>");
                }
            });

        });

    });
</script>
@endsection
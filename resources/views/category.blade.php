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
                        <h2>Shop Category</h2>
                        <p>Home <span>-</span> Shop Category</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- breadcrumb start-->

<!--================Category Product Area =================-->
<section class="cat_product_area section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="left_sidebar_area">
                    <aside class="left_widgets p_filter_widgets">
                        <div class="l_w_title">
                            <h3>Marques</h3>
                        </div>
                        <div class="widgets_inner">
                            <ul class="list">
                                <!-- <li>
                                        <a href="#">Frozen Fish</a>
                                        <span>(250)</span>
                                    </li> -->
                                @foreach($marques as $marque)
                                <li>
                                    <a href="">{{$marque->nom_marque}}</a>
                                    <span>({{$marque->nbrproduct}})</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>

                    <aside class="left_widgets p_filter_widgets">
                        <div class="l_w_title">
                            <h3>Types</h3>
                        </div>
                        <div class="widgets_inner">
                            <ul class="list">

                                @foreach($types as $type)
                                <li>
                                    <a href="">{{$type->libelle_type}}</a>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                    </aside>

                    <aside class="left_widgets p_filter_widgets">
                        <div class="l_w_title">
                            <h3>Couleurs</h3>
                        </div>
                        <div class="widgets_inner">
                            <ul class="list" style="display: grid; grid-template-columns: 50px 50px;">
                                @foreach($couleurs as $couleur)
                                <li>
                                    <!-- <a href="#"></a> -->
                                    <div style="cursor: pointer ;border-radius: 17px 0px 17px 17px;height: 30px; width: 30px ;background-color: {{$couleur->valeur_couleur}};"></div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>

                    <aside class="left_widgets p_filter_widgets price_rangs_aside">
                        <div class="l_w_title">
                            <h3>Filtre du prix</h3>
                        </div>
                        <div class="widgets_inner">
                            <div class="range_item">
                                <!-- <div id="slider-range"></div> -->
                                <input type="text" class="js-range-slider" value="" />
                                <div class="d-flex">
                                    <!-- <div class="price_text">
                                        <p>Dirhames :</p>
                                    </div> -->
                                    <div class="price_value d-flex justify-content-center">
                                        <input type="text" class="js-input-from" id="amount" readonly />
                                        <span>à</span>
                                        <input type="text" class="js-input-to" id="amount" readonly />
                                    </div>
                                    &nbsp;
                                    &nbsp;
                                    <div class="price_text">
                                        <p>Dirhames</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product_top_bar d-flex justify-content-between align-items-center">
                            <div class="single_product_menu">
                                <p><span style="text-decoration: underline;">513</span> Produits trouvés !</p>
                            </div>
                            <div class="single_product_menu d-flex">
                                <h5>Trier par : </h5>
                                <select>
                                    <option data-display="-Choisir-">Aucun filtre</option>
                                    <option value="2">Quantité en stock (croissant)</option>
                                    <option value="1">Prix Décroissant</option>
                                    <option value="1">Prix croissant</option>
                                    <option value="2">Ordre A-Z</option>
                                    <option value="2">Ordre Z-A</option>
                                </select>
                            </div>
                            <div class="single_product_menu d-flex" style="visibility: hidden;">
                                <h5>show :</h5>
                                <div class="top_pageniation">
                                    <ul>
                                        <li>1</li>
                                        <li>2</li>
                                        <li>3</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="single_product_menu d-flex">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Rechercher" aria-describedby="inputGroupPrepend" style="padding-left: 3px;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend"><i class="ti-search"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center latest_product_inner">

                    @foreach($produits as $prod)
                    <div class="col-lg-4 col-sm-6">
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
                    <!-- <div class="col-lg-12">
                        <div class="pageination">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <i class="ti-angle-double-left"></i>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <i class="ti-angle-double-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Category Product Area =================-->

<!-- product_list part start-->
<section class="product_list best_seller">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Top des Achats</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-12">
                <!-- <div class="best_product_slider owl-carousel">
                    <div class="single_product_item">
                        <img src="img/product/product_1.png" alt="">
                        <div class="single_product_text">
                            <h4>Quartz Belt Watch</h4>
                            <h3>$150.00</h3>
                        </div>
                    </div>
                    <div class="single_product_item">
                        <img src="img/product/product_2.png" alt="">
                        <div class="single_product_text">
                            <h4>Quartz Belt Watch</h4>
                            <h3>$150.00</h3>
                        </div>
                    </div>
                    <div class="single_product_item">
                        <img src="img/product/product_3.png" alt="">
                        <div class="single_product_text">
                            <h4>Quartz Belt Watch</h4>
                            <h3>$150.00</h3>
                        </div>
                    </div>
                    <div class="single_product_item">
                        <img src="img/product/product_4.png" alt="">
                        <div class="single_product_text">
                            <h4>Quartz Belt Watch</h4>
                            <h3>$150.00</h3>
                        </div>
                    </div>
                    <div class="single_product_item">
                        <img src="img/product/product_5.png" alt="">
                        <div class="single_product_text">
                            <h4>Quartz Belt Watch</h4>
                            <h3>$150.00</h3>
                        </div>
                    </div>
                </div> -->
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
<script src="js/stellar.js"></script>
<script src="js/price_rangs.js"></script>
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
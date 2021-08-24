@extends('BackOfficeAdmin.layout.layoutAdmin')

@section('linkcss')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
<style>
    .grid-container {
        display: grid;
        grid-template-columns: auto auto auto;
        background-color: #2196F3;
        padding: 10px;
    }

    .grid-item {
        /* background-color: rgba(255, 255, 255, 0.8);
        border: 1px solid rgba(0, 0, 0, 0.8); */
        padding: 20px;
        /* font-size: 30px; */
        /* text-align: center; */
    }
</style>
@endsection


@section('body')

<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
    <br>
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="single_product_list_slider">
                    <div class="row align-items-center justify-content-between">

                        @foreach($produits as $prod)
                        <div class="col-lg-3 col-sm-6">
                            <div class="single_product_item">
                                <img src='../images/{{ collect(DB::select("select chemin_photo from photo where photo.produit_ = " . $prod->id_produit . " limit 1"))->first()->chemin_photo }}' style="height: 260px;width: 300px;">
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
                                    <a href="#" class="add_cart">
                                        <i style="float: none; color:dodgerblue;" class="fas fa-edit"></i>Modifier
                                        <i style="color: red;" class="fas fa-trash-alt"></i>
                                    </a>
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

@endsection

@section('scripts')

<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>


<script>
    $(document).ready(function() {
        $('#homeSubmenu').removeClass();
        $('#homeSubmenu').addClass('list-unstyled collapse show');
        $('#linkListProd').addClass('activeLink');
    });
</script>
@endsection
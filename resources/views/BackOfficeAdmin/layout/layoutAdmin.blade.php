<!doctype html>
<html lang="en">

<head>
    <title>Administration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />

    <link rel="stylesheet" href="{{ url('css/styleLayoutAdmin.css') }}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        ::-webkit-scrollbar {
            width: 20px;
        }

        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background-color: #5de6de;
            background-image: linear-gradient(315deg, #5de6de 0%, #b58ecc 74%);
            border-radius: 10px;
        }

        .activeLink {
            font-size: 17px;
            text-decoration: underline;
            font-weight: bold;
        }
    </style>
    @section('linkcss')
    @show
</head>

<body>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>
            <div class="p-4 pt-5">
                <h1><a href="{{ url('/Admin/Accueil') }}" class="logo">Admin</a></h1>
                <ul class="list-unstyled components mb-5">
                    <li class="">
                        <a href="{{ url('/') }}" id="linkAccueil">
                            <i class="fas fa-home"></i>
                            <strong>Accueil clients</strong>
                        </a>
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="fas fa-bed"></i>
                            <strong>Produits</strong>
                        </a>
                        <ul class="collapse list-unstyled" id="homeSubmenu" style="margin-left: 20px;">
                            <li>
                                <a href="{{ url('/Admin/ListeProduits') }}" id="linkListProd">
                                    <i class="fas fa-th"></i>
                                    Liste des produits
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/Admin/NouveauProduit') }}" id="linkNouveauProd">
                                    <i class="fas fa-plus-circle"></i>
                                    Nouveau Produit
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ url('/Admin/NosMarques') }}" id="linkNosMarques">
                            <strong>
                                <img src="{{ url('img/NosMarques.png') }}" style="height: 25px;">
                                Marques
                            </strong>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/Admin/Statistiques') }}" id="linkStats">
                            <strong>
                                <img src="{{ url('img/Stats.png') }}" style="height: 25px;">
                                Statistiques
                            </strong>
                        </a>
                    </li>
                    <li>
                        <a href="#" id="linkFacture">
                            <strong>
                                <img src="{{ url('img/Facture.png') }}" style="height: 25px;">
                                Factures
                            </strong>
                            <span class="badge badge-pill badge-danger" style="font-size: 9px;">à suivre ...</span>
                        </a>
                    </li>
                    <li>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <strong>
                                <img src="{{ url('img/users.png') }}" style="height: 25px;">
                                Personnels
                            </strong>
                            <span class="badge badge-pill badge-danger" style="font-size: 9px;">à suivre ...</span>
                        </a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li>
                                <a href="#">Page 1</a>
                            </li>
                            <li>
                                <a href="#">Page 2</a>
                            </li>
                            <li>
                                <a href="#">Page 3</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" id="linkMessagerie">
                            <strong>
                                <img src="{{ url('img/Courrier.png') }}" style="height: 25px;">
                                Courrier
                            </strong>
                            <span class="badge badge-pill badge-danger" style="font-size: 9px;">à suivre ...</span>
                        </a>
                    </li>
                </ul>

                <!-- <div class="mb-5">
                    <h3 class="h6">Subscribe for newsletter</h3>
                    <form action="#" class="colorlib-subscribe-form">
                        <div class="form-group d-flex">
                            <div class="icon"><span class="icon-paper-plane"></span></div>
                            <input type="text" class="form-control" placeholder="Enter Email Address">
                        </div>
                    </form>
                </div> -->

            </div>
        </nav>

        @section('body')
        @show
    </div>

    <script src="{{ url('js/jquery.js') }}"></script>
    <script src="{{ url('js/popper.js') }}"></script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
    <script src="{{ url('js/mainLayoutAdmin.js') }}"></script>
    <script>
        $(document).ready(function() {
            // $("#sidebar").addClass('active');
        });
    </script>
    @section('scripts')
    @show
</body>

</html>
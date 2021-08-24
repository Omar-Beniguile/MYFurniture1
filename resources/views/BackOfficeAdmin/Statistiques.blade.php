@extends('BackOfficeAdmin.layout.layoutAdmin')

@section('linkcss')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<style>
    #derniereFactures_wrapper {
        width: 100%;
    }

    input[type=search] {
        border-radius: 15px;
        padding: 5px 10px;
        border: 1px solid #3E95CD;
    }
</style>
@endsection


@section('body')

<div id="content" class="p-4 p-md-5 pt-5">
    <div class="row">
        <div class="col-8 shadow-lg p-3 mb-5 bg-white" style="right: 10px;border-radius: 15px;">
            <canvas width="800" height="450" id="line-chart"> </canvas>
        </div>
        <div class="col-4 shadow-lg p-3 mb-5 bg-white" style="border-radius: 15px;">
            <canvas width="330" height="400" id="myChart"></canvas>
        </div>
    </div>
    <div class="row">
        <div class="col-4 shadow-lg p-3 mb-5 bg-white" style="right: 10px;border-radius: 15px;">
            <canvas width="330" height="400" id="radar-chart"></canvas>
        </div>
        <div class="col-8 shadow-lg p-3 mb-5 bg-white" style="border-radius: 15px;">
            <canvas width="800" height="450" id="bar-chart"> </canvas>
        </div>
    </div>
    <div class="row shadow-lg p-3 mb-5 bg-white" style="border-radius: 15px;">
        <table class="table table-hover" id="derniereFactures">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Personne</th>
                    <th scope="col">Date</th>
                    <th scope="col">Produits</th>
                    <th scope="col">Montant (TTC)</th>
                    <th scope="col" style="text-align: center;vertical-align: middle;">Statut</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>
                        <i class="fas fa-user-check" title="inscrit"></i>
                        Hicham Sfh
                    </td>
                    <td>
                        <i class="far fa-calendar-alt"></i>
                        12 juin 2020 :
                        <i class="far fa-clock"></i>
                        12h30
                    </td>
                    <td>
                        <i class="fas fa-dolly-flatbed"></i>
                        3
                    </td>
                    <td>
                        <i class="fas fa-money-bill-wave"></i>
                        1840.66 Dhs
                    </td>
                    <td style="text-align: center;vertical-align: middle;">
                        <span class="badge badge-warning">Payés</span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>
                        <i class="fas fa-user" title="visiteur"></i>
                        Oumayma Sghir
                    </td>
                    <td>
                        <i class="far fa-calendar-alt"></i>
                        9 juin 2020 :
                        <i class="far fa-clock"></i>
                        15h04
                    </td>
                    <td>
                        <i class="fas fa-dolly-flatbed"></i>
                        4
                    </td>
                    <td>
                        <i class="fas fa-money-bill-wave"></i>
                        7000 Dhs
                    </td>
                    <td style="text-align: center;vertical-align: middle;">
                        <span class="badge badge-warning">Payés</span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>
                        <i class="fas fa-user" title="visiteur"></i>
                        Amina Sqat
                    </td>
                    <td>
                        <i class="far fa-calendar-alt"></i>
                        5 juin 2020 :
                        <i class="far fa-clock"></i>
                        19h
                    </td>
                    <td>
                        <i class="fas fa-dolly-flatbed"></i>
                        2
                    </td>
                    <td>
                        <i class="fas fa-money-bill-wave"></i>
                        2500.92 Dhs
                    </td>
                    <td style="text-align: center;vertical-align: middle;">
                        <span class="badge badge-primary">En attente</span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>
                        <i class="fas fa-user" title="visiteur"></i>
                        Noureddine Yagoubi
                    </td>
                    <td>
                        <i class="far fa-calendar-alt"></i>
                        1 juin 2020 :
                        <i class="far fa-clock"></i>
                        09h26
                    </td>
                    <td>
                        <i class="fas fa-dolly-flatbed"></i>
                        1
                    </td>
                    <td>
                        <i class="fas fa-money-bill-wave"></i>
                        3000.75 Dhs
                    </td>
                    <td style="text-align: center;vertical-align: middle;">
                        <span class="badge badge-success">Livré</span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">5</th>
                    <td>
                        <i class="fas fa-user-cog" title="admin"></i>
                        Adam Sfh
                    </td>
                    <td>
                        <i class="far fa-calendar-alt"></i>
                        30 mai 2020 :
                        <i class="far fa-clock"></i>
                        09h
                    </td>
                    <td>
                        <i class="fas fa-dolly-flatbed"></i>
                        4
                    </td>
                    <td>
                        <i class="fas fa-money-bill-wave"></i>
                        700 Dhs
                    </td>
                    <td style="text-align: center;vertical-align: middle;">
                        <span class="badge badge-success">Livré</span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">6</th>
                    <td>
                        <i class="fas fa-user" title="visiteur"></i>
                        Amina Sqat
                    </td>
                    <td>
                        <i class="far fa-calendar-alt"></i>
                        29 mai 2020 :
                        <i class="far fa-clock"></i>
                        19h20
                    </td>
                    <td>
                        <i class="fas fa-dolly-flatbed"></i>
                        2
                    </td>
                    <td>
                        <i class="fas fa-money-bill-wave"></i>
                        2500.92 Dhs
                    </td>
                    <td style="text-align: center;vertical-align: middle;">
                        <span class="badge badge-primary">En attente</span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">7</th>
                    <td>
                        <i class="fas fa-user" title="visiteur"></i>
                        Nisrine Lkhel
                    </td>
                    <td>
                        <i class="far fa-calendar-alt"></i>
                        20 mai 2020 :
                        <i class="far fa-clock"></i>
                        10h29
                    </td>
                    <td>
                        <i class="fas fa-dolly-flatbed"></i>
                        2
                    </td>
                    <td>
                        <i class="fas fa-money-bill-wave"></i>
                        2900.92 Dhs
                    </td>
                    <td style="text-align: center;vertical-align: middle;">
                        <span class="badge badge-primary">En attente</span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">8</th>
                    <td>
                        <i class="fas fa-user-check" title="inscrit"></i>
                        Hicham Sfh
                    </td>
                    <td>
                        <i class="far fa-calendar-alt"></i>
                        18 mai 2020 :
                        <i class="far fa-clock"></i>
                        17h03
                    </td>
                    <td>
                        <i class="fas fa-dolly-flatbed"></i>
                        3
                    </td>
                    <td>
                        <i class="fas fa-money-bill-wave"></i>
                        1840.66 Dhs
                    </td>
                    <td style="text-align: center;vertical-align: middle;">
                        <span class="badge badge-warning">Payés</span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">9</th>
                    <td>
                        <i class="fas fa-user-check" title="inscrit"></i>
                        Hicham Sfh
                    </td>
                    <td>
                        <i class="far fa-calendar-alt"></i>
                        12 juin 2020 :
                        <i class="far fa-clock"></i>
                        18h18
                    </td>
                    <td>
                        <i class="fas fa-dolly-flatbed"></i>
                        3
                    </td>
                    <td>
                        <i class="fas fa-money-bill-wave"></i>
                        1840.66 Dhs
                    </td>
                    <td style="text-align: center;vertical-align: middle;">
                        <span class="badge badge-warning">Payés</span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">10</th>
                    <td>
                        <i class="fas fa-user-cog" title="admin"></i>
                        Adam Sfh
                    </td>
                    <td>
                        <i class="far fa-calendar-alt"></i>
                        15 mai 2020 :
                        <i class="far fa-clock"></i>
                        09h
                    </td>
                    <td>
                        <i class="fas fa-dolly-flatbed"></i>
                        4
                    </td>
                    <td>
                        <i class="fas fa-money-bill-wave"></i>
                        800.68 Dhs
                    </td>
                    <td style="text-align: center;vertical-align: middle;">
                        <span class="badge badge-success">Livré</span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">11</th>
                    <td>
                        <i class="fas fa-user-cog" title="admin"></i>
                        Iliass Sfh
                    </td>
                    <td>
                        <i class="far fa-calendar-alt"></i>
                        9 mai 2020 :
                        <i class="far fa-clock"></i>
                        06h20
                    </td>
                    <td>
                        <i class="fas fa-dolly-flatbed"></i>
                        4
                    </td>
                    <td>
                        <i class="fas fa-money-bill-wave"></i>
                        700 Dhs
                    </td>
                    <td style="text-align: center;vertical-align: middle;">
                        <span class="badge badge-success">Livré</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#linkStats').addClass('activeLink');
    });
</script>
<script>
    new Chart(document.getElementById("line-chart"), {
        type: 'line',
        data: {
            labels: [0, "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Décembre"],
            datasets: [{
                data: [0, 1000, 800, 760, 870, 900, 950, 1000, 900, 532, 1100, 1250, 1400],
                label: "en Dirhams",
                borderColor: "#3e95cd",
                fill: false
            }]
        },
        options: {
            title: {
                display: true,
                text: "Gains d'argent (par mois)",
                fontSize: 15,
            }
        }
    });
</script>
<script>
    new Chart(document.getElementById("radar-chart"), {
        type: 'radar',
        data: {
            labels: ["Mora", "Irina Home", "Vienne", "Alpelle", "Manus"],
            datasets: [{
                    label: "2018",
                    borderColor: "#feca57",
                    backgroundColor: "#feca57",
                    borderWidth: 2,
                    data: [30, 80, 13, 20, 2],
                    fill: false
                },
                {
                    label: "2019",
                    borderColor: "#ee5253",
                    backgroundColor: "#ee5253",
                    borderWidth: 2,
                    data: [50, 10, 73, 85, 9],
                    fill: false
                }, {
                    label: "2020",
                    borderColor: "#54a0ff",
                    backgroundColor: "#54a0ff",
                    borderWidth: 2,
                    data: [10, 20, 33, 5, 15],
                    fill: false
                }
            ]
        },
        options: {
            title: {
                display: true,
                text: "Répartition des achats (par Marques)",
                fontSize: 15,
            }
        }
    });
</script>
<script>
    new Chart(document.getElementById("bar-chart"), {
        type: 'bar',
        data: {
            labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"],
            datasets: [{
                data: [100, 80, 76, 87, 90, 95, 140, 130, 102, 110, 125, 87, 100, 80, 76, 87, 90, 95, 140, 130, 102, 110, 125, 87, 100, 80, 76, 87, 90, 95, 110],
                label: '👨👩',
                borderColor: "#ff9f43",
                backgroundColor: "#ff9f43",
                fill: false
            }]
        },
        options: {
            title: {
                display: true,
                text: "Nouveaux clients (ce mois-ci)",
                fontSize: 15,
            }
        }
    });
</script>
<script>
    let ctx = document.getElementById("myChart").getContext("2d");

    Chart.defaults.global.defaultFontColor = "#888";
    Chart.defaults.global.maintainAspectRatio = true;

    let myChart = new Chart(ctx, {
        plugins: [{
            beforeInit: function(chart) {
                chart.legend.afterFit = function() {
                    this.height = this.height + 20;
                };
            }
        }],
        type: "pie",

        data: {
            labels: ["Paiement en attente", "Facturés & payés", "Livraison avec succés"],
            datasets: [{
                label: "Demandes",
                backgroundColor: [
                    "#007BFF",
                    "#FFC107",
                    "#28A745",
                ],
                borderColor: [
                    "#576574",
                    "#576574",
                    "#576574"
                ],
                borderWidth: 2.4,
                data: [20, 10, 50],
                barThickness: 30
            }]
        },
        options: {
            cutoutPercentage: 65,
            legend: {
                display: true,
                position: "bottom",
                align: "center",
                labels: {
                    boxWidth: 7,
                    padding: 14,
                    usePointStyle: true
                }
            },
            tooltips: {
                mode: "point",
                titleFontColor: "black",
                bodyFontColor: "black",
                backgroundColor: "#eee"
            }
        }
    });
</script>
<script>
    $(document).ready(function() {
        $('#derniereFactures').DataTable({
            "info": false,
            "oLanguage": {
                "sLengthMenu": "Afficher les _MENU_ derniéres commandes :",
                "sSearch": "<span>Rechercher </span> _INPUT_"
            },
            "language": {
                "paginate": {
                    "previous": "Précédent",
                    "next": "Suivant",
                    "first": "1ére",
                    "last": "derniére"

                }
            }
        });
    });
</script>
@endsection
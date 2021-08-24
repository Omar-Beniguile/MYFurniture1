@extends('BackOfficeAdmin.layout.layoutAdmin')

<!-- Bug de supression -->
@section('linkcss')
<link rel="stylesheet" href="{{ url('css/nouveauProduitStyle.css') }}">
<style>
    .btnSupr {
        background: red;
        color: white;
        border: 0px;
        border-radius: 50px;
        height: 24px;
    }

    #btnLine,
    #btnOption {
        background-color: #63a4ff;
        background-image: linear-gradient(315deg, #63a4ff 0%, #83eaf1 74%);
        border: 0px;
        border-radius: 10px;
        margin: 10px;
    }
</style>
@endsection

@section('body')
<script>
    function viderImage(id) {
        document.getElementById("inpFile" + id).value = "";
        document.getElementById('prvImage' + id).style.backgroundImage = "";
        document.getElementById('toolsImage' + id).style.visibility = "hidden";
        document.getElementById('toolInput' + id).style.visibility = "visible";
    }
    let nbrOptions = 0;

    function AjoutOptionItem() {
        document.getElementById('BigContainerOption').insertAdjacentHTML('beforeend',
            `<div class="input-group mb-2" id="ContainerOption${nbrOptions}">` +
            ' <div div class = "input-group-prepend"> ' +
            '   <div class="input-group-text ">' +
            `       <button id="btnSuppr${nbrOptions}" class="far fa-trash-alt btnSupr" style="color: white;" onclick="suprimerDescription(${nbrOptions})"></button>` +
            '   </div>' +
            '  </div>' +
            ` <input type="text" class="form-control" id="option${nbrOptions}" name="option${nbrOptions}" onfocusout="commitText('labelOption'+${nbrOptions},document.getElementById('option${nbrOptions}').value)" placeholder="type" style="border: 1px solid;" >` +
            '</div>');
        if (document.getElementById(`btnSuppr${nbrOptions - 1}`) != null) {
            document.getElementById(`btnSuppr${nbrOptions - 1}`).disabled = true;
            document.getElementById(`btnSuppr${nbrOptions - 1}`).style.cursor = 'not-allowed';
        }
        document.getElementById('BigContainerLabels').innerHTML +=
            `<span id="labelOption${nbrOptions}"  class="badge badge-pill badge-primary labelOption${nbrOptions}" style="margin: 5px;font-size: 15px;">type</span>`;
        nbrOptions++;
    }

    function suprimerDescription(option) {
        document.getElementById('ContainerOption' + option).remove();
        Array.from(document.getElementsByClassName('labelOption' + option)).forEach(function(item) {
            item.remove();
        });
        if (document.getElementById(`btnSuppr${option - 1}`) != null) {
            document.getElementById(`btnSuppr${option - 1}`).disabled = false;
            document.getElementById(`btnSuppr${option - 1}`).style.cursor = 'pointer';
        }
        nbrOptions--;
    }

    function commitText(id, text) {
        document.getElementById(id).innerHTML = text.replace('*', '&times;');
    }

    function Validation() {
        document.getElementById('btnOption').remove();
        document.getElementById('btnAjout').disabled = false;
        document.getElementById('nbrTotalOptions').value = nbrOptions;
        document.getElementById('widgetContainer').innerHTML = document.getElementById('BigContainerLabels').innerHTML;
        document.getElementById('BigContainerLabels').childNodes.forEach(function(item) {
            if (item.nodeName === "SPAN")
                document.getElementById('widgetContainer').innerHTML += `<input type="hidden" name="${item.id}" value="${item.textContent}">`;
        });
    }
</script>
<div id="content" class="p-4 p-md-5 pt-5">

    <div class="">
        <form action="{{ route('AjoutNouvelleMarque') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <h1>Nos Marques</h1>
            <br>
            <div class="row shadow-lg p-3 mb-5 bg-white" style="border-radius: 20px;">
                <div id="prvImage1" style="background-size: 100% 100%;margin: 0px 10px;height: 300px;width: 300px;background-color: lightgray;border-radius: 20px;">
                    <div id="toolsImage1" style="visibility: hidden;">
                        <div style="cursor: pointer;margin-left: 93%;margin-top: -3%;color: white;background: red;width: 24px;height: 24px;border-radius: 50px;text-align: center;" onclick='viderImage(1)'>
                            <i class="far fa-trash-alt" style="color: white;"></i>
                        </div>
                        <div style="cursor: pointer;margin-left: 93%;margin-top: 3%;color: white;background: dodgerblue ;width: 24px;height: 24px;border-radius: 50px;text-align: center;">
                            <Label for="inpFile1">
                                <i class="fas fa-pen" style="color: white;"></i>
                            </Label>
                        </div>
                    </div>
                    <div id="toolInput1">
                        <label for="inpFile1">
                            <img src="{{ url('img/imageProduit.png') }}" style="height: 120px;margin-top: 40%;margin-left: 70%;">
                        </label>
                        <input type="file" name="inpFile1" id="inpFile1" accept="image/*" required />
                    </div>
                </div>

                <div class="col">
                    <div class="form-group" style="padding-left: 0px;width: 50%;">
                        <input type="text" name="nomMarque" required />
                        <label for="input" class="control-label">Nom de la marque</label>
                        <i class="bar"></i>
                    </div>
                    <div class="form-group" style="padding-left: 0px;width: 50%;">
                        <input type="text" name="slogganMarque" />
                        <label for="input" class="control-label">Sloggan</label>
                        <i class="bar"></i>
                    </div>
                    <div class="form-group">
                        <textarea name="descriptionMarque"></textarea>
                        <label for="textarea" class="control-label">Description (facultatif ...)</label><i class="bar"></i>
                    </div>
                    <div class="row">
                        <span class="col">
                            <input type="button" id="btnOption" value="+ types de produits" data-toggle="modal" data-target="#exampleModal">
                            <div id="widgetContainer">

                            </div>
                        </span>
                        <span class="col">
                            <button type="submit" class="btn btn-success" style="margin-left: 69%;" id="btnAjout" disabled>
                                <i class="fas fa-plus-circle"></i>
                                Ajouter
                            </button>
                        </span>
                    </div>
                </div>
            </div>
            <input type="hidden" name="nbrTotalOptions" id="nbrTotalOptions">
        </form>
    </div>

    <div>
        <!-- <div class="row shadow-lg p-3 mb-5 bg-white" style="border-radius: 20px;">
            <div id="prvImage1" style="background-size: 100% 100%;
            margin: 0px 10px;
            height: 300px;
            width: 300px;
            background-color: lightgray;
            border-radius: 20px;
            border: 1px solid;
            background-image: url('https://cdn.ycan.shop/stores/monlit/categories/PKR3zz5SSQY2adj1zzH1C1W464Fhiwy3Lrr4Emgg_md.jpeg');">
            </div>

            <div class="col">
                <div class="form-group" style="padding-left: 0px;width: 50%;">
                    <input type="text" disabled />
                    <label for="input" class="control-label" style="color: black;">Mora</label>
                    <i class="bar"></i>
                </div>
                <div class="form-group" style="padding-left: 0px;width: 50%;">
                    <input type="text" disabled />
                    <label for="input" class="control-label" style="color: black;">Meilleure marque du monde.</label>
                    <i class="bar"></i>
                </div>
                <div class="form-group">
                    <textarea disabled></textarea>
                    <label for="textarea" class="control-label" style="color: black; font-size: 12px;">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quas fugiat harum quidem ex voluptas voluptates. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Delectus, omnis !
                    </label>
                    <i class="bar"></i>
                </div>
                <div class="row">
                    <div class="col">
                        <span class="badge badge-pill badge-primary" style="margin: 5px;font-size: 15px;">Lit</span>
                        <span class="badge badge-pill badge-primary" style="margin: 5px;font-size: 15px;">Couverture</span>
                        <span class="badge badge-pill badge-primary" style="margin: 5px;font-size: 15px;">Placard</span>
                    </div>
                    <span class="col">
                        <a href="#" class="btn btn-danger" style="margin-left: 66%;color: white;">
                            <i class="fas fa-minus-circle"></i>
                            Supprimer
                        </a>
                    </span>
                </div>
            </div>
        </div> -->
        @foreach($marques as $marque)
        <div class="row shadow-lg p-3 mb-5 bg-white" style="border-radius: 20px;">
            <div id="prvImage1" style="background-size: 100% 100%;
            margin: 0px 10px;
            height: 300px;
            width: 300px;
            background-color: lightgray;
            border-radius: 20px;
            border: 1px solid;
            background-image: url('{{$marque->logo_marque}}');">
            </div>

            <div class="col">
                <div class="form-group" style="padding-left: 0px;width: 50%;">
                    <input type="text" disabled />
                    <label for="input" class="control-label" style="color: black;">{{$marque->nom_marque}}</label>
                    <i class="bar"></i>
                </div>
                <div class="form-group" style="padding-left: 0px;width: 50%;">
                    <input type="text" disabled />
                    <label for="input" class="control-label" style="color: black;">{{$marque->sloggan_marque}}</label>
                    <i class="bar"></i>
                </div>
                <div class="form-group">
                    <textarea disabled></textarea>
                    <label for="textarea" class="control-label" style="color: black; font-size: 12px;">
                        {{$marque->description_marque}}
                    </label>
                    <i class="bar"></i>
                </div>
                <div class="row">
                    <div class="col">
                        @foreach(DB::select("select type_produit.libelle_type from marque inner join type_produit on type_produit.marque_ = marque.id_marque where marque.id_marque = $marque->id_marque") as $l)
                        <span class="badge badge-pill badge-primary" style="margin: 5px;font-size: 15px;">{{$l->libelle_type}}</span>
                        @endforeach
                    </div>
                    <span class="col">
                        <a href="/Admin/SupprimerMarque/{{ $marque->id_marque }}" class="btn btn-danger" style="margin-left: 66%;color: white;">
                            <i class="fas fa-minus-circle"></i>
                            Supprimer
                        </a>
                    </span>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 150%;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajout des options</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col">
                            <small>Types de produits disponible chez la marque :</small>
                            <br>
                            <div id="BigContainerLabels">

                            </div>
                        </div>
                        <hr style="border-left: 5px solid; height : 100px;">
                        <div class="col">
                            <br>
                            <button id="btnLine" onclick="AjoutOptionItem()"><i class="fas fa-plus-circle"></i>Ligne</button>
                            <div id="BigContainerOption">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="Validation()" data-dismiss="modal">Valider
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

<script src="{{ url('js/scriptInputFile.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#linkNosMarques').addClass('activeLink');

    });
</script>
@endsection
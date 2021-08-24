@extends('BackOfficeAdmin.layout.layoutAdmin')

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

    #btnLine {
        background-color: #63a4ff;
        background-image: linear-gradient(315deg, #63a4ff 0%, #83eaf1 74%);
        border: 0px;
        border-radius: 10px;
        margin: 10px;
    }

    #btnCLose {
        background-color: #4CB3F4;
        border: 0px;
        width: 20px;
    }

    .divColor {
        height: 35px;
        width: 35px;
        border: 2px solid black;
        border-radius: 10px;
        background-color: whitesmoke;
    }

    #col0,
    #col1,
    #col2,
    #col3 {
        width: 100px;
        border: 1px solid;
        border-radius: 10px;
        font-weight: bold;
    }

    .titreSection {
        color: dodgerblue;
        font-style: italic;
        text-decoration: underline;
        font-family: 'Montserrat';
    }

    .txtCaracteristique {
        margin: 5px;
        border-radius: 5px;
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
            ` <input type="text" class="form-control" name="option${nbrOptions}" style="font-weight: bold;border: 1px solid;" value="- " id="option${nbrOptions}" onfocusout="commitText('labelOption'+${nbrOptions},document.getElementById('option${nbrOptions}').value)" placeholder="- info : petite description." >` +
            '</div>');
        if (document.getElementById(`btnSuppr${nbrOptions - 1}`) != null) {
            document.getElementById(`btnSuppr${nbrOptions - 1}`).disabled = true;
            document.getElementById(`btnSuppr${nbrOptions - 1}`).style.cursor = 'not-allowed';
        }
        document.getElementById('BigContainerLabels').innerHTML +=
            `<label id="labelOption${nbrOptions}" style="cursor: default;font-weight: 900;">- info : petite description.</label><br id="br${nbrOptions}">`;
        nbrOptions++;
    }

    function suprimerDescription(option) {
        document.getElementById('ContainerOption' + option).remove();
        document.getElementById('labelOption' + option).remove();
        document.getElementById('br' + option).remove();
        if (document.getElementById(`btnSuppr${option - 1}`) != null) {
            document.getElementById(`btnSuppr${option - 1}`).disabled = false;
            document.getElementById(`btnSuppr${option - 1}`).style.cursor = 'pointer';
        }
        nbrOptions--;
    }

    function commitText(id, text) {
        document.getElementById(id).innerHTML = text.replace('*', '&times;');
    }

    function changeCouleur(id) {
        document.getElementById('colorInput' + id).style.backgroundColor = document.getElementById('col' + id).value;
        document.getElementById('color' + id).value = document.getElementById('col' + id).value;
    }
</script>
<div id="content" class="p-4 p-md-5 pt-5">

    <div class="">
        <form id="formAjoutProd" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <h1>Ajout d'un nouveau produit.</h1>
            <br>
            <h3 class="titreSection">Informations de base.</h3>
            <div class="row">
                <div class="form-group col" style="padding-left: 0px">
                    <input type="text" required="required" name="nom_produit" />
                    <label for="input" class="control-label">Libellé du produit</label><i class="bar"></i>
                </div>
                <div class="form-group col" style="padding-left: 0px">
                    <select id="Marques" required>
                        <option value="-1" disabled selected></option>
                        @foreach($marques as $marque)
                        <option value="{{$marque->id_marque}}">{{$marque->nom_marque}}</option>
                        @endforeach
                    </select>
                    <label for="select" class="control-label">Marque</label><i class="bar"></i>
                </div>
                <div class="form-group col" style="padding-left: 0px">
                    <select name="typeProduit" id="Types">

                    </select>
                    <label for="select" class="control-label">Type</label><i class="bar"></i>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm" style="padding-left: 0px">
                    <input name="qtt_stock" type="number" required="required" />
                    <label for="input" class="control-label">Quantité en stock</label><i class="bar"></i>
                </div>
                <div class="form-group col-sm" style="padding-left: 0px">
                    <input name="min_qtt_stock" type="number" required="required" />
                    <label for="min_qtt_stock" class="control-label">Seuil min </label><i class="bar"></i>
                </div>
                <div class="form-group col-sm" style="padding-left: 0px">
                    <input name="max_qtt_stock" type="number" required="required" />
                    <label for="max_qtt_stock" class="control-label">Seuil max </label><i class="bar"></i>
                </div>
                <div class=" row form-group col-sm">
                    <div class="col">
                        <div class="divColor" id="colorInput0"></div>
                        <input name="color0" id="color0" type="hidden" />
                    </div>
                    <div class="col">
                        <div class="divColor" id="colorInput1"></div>
                        <input name="color1" id="color1" type="hidden" />
                    </div>
                    <div class="col">
                        <div class="divColor" id="colorInput2"></div>
                        <input name="color2" id="color2" type="hidden" />
                    </div>
                    <div class="col">
                        <div class="divColor" id="colorInput3"></div>
                        <input name="color3" id="color3" type="hidden" />
                    </div>
                </div>
            </div>
            <hr>
            <h3 class="titreSection">Photos (Maximum 5).</h3>
            <br>
            <div class="row">
                <div class="col-sm" id="prvImage1" style="background-size: 100% 100%;margin: 0px 10px;height: 200px;width: 200px;background-color: lightgray;border-radius: 20px;">

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
                            <img src="{{ url('img/imageProduit.png') }}" style="height: 120px;margin-left: 30%;">
                        </label>
                        <input type="file" name="inpFile1" id="inpFile1" accept="image/*" required />
                    </div>

                </div>
                <div class="col-sm" id="prvImage2" style="background-size: 100% 100%;margin: 0px 10px;height: 200px;width: 200px;background-color: lightgray;border-radius: 20px;">

                    <div id="toolsImage2" style="visibility: hidden;">
                        <div style="cursor: pointer;margin-left: 93%;margin-top: -3%;color: white;background: red;width: 24px;height: 24px;border-radius: 50px;text-align: center;" onclick='viderImage(2)'>
                            <i class="far fa-trash-alt" style="color: white;"></i>
                        </div>
                        <div style="cursor: pointer;margin-left: 93%;margin-top: 3%;color: white;background: dodgerblue ;width: 24px;height: 24px;border-radius: 50px;text-align: center;">
                            <Label for="inpFile2">
                                <i class="fas fa-pen" style="color: white;"></i>
                            </Label>
                        </div>
                    </div>

                    <div id="toolInput2">
                        <label for="inpFile2">
                            <img src="{{ url('img/imageProduit.png') }}" style="height: 120px;margin-left: 30%;">
                        </label>
                        <input type="file" name="inpFile2" id="inpFile2" />
                    </div>

                </div>
                <div class="col-sm" id="prvImage3" style="background-size: 100% 100%;margin: 0px 10px;height: 200px;width: 200px;background-color: lightgray;border-radius: 20px;">

                    <div id="toolsImage3" style="visibility: hidden;">
                        <div style="cursor: pointer;margin-left: 93%;margin-top: -3%;color: white;background: red;width: 24px;height: 24px;border-radius: 50px;text-align: center;" onclick='viderImage(3)'>
                            <i class="far fa-trash-alt" style="color: white;"></i>
                        </div>
                        <div style="cursor: pointer;margin-left: 93%;margin-top: 3%;color: white;background: dodgerblue ;width: 24px;height: 24px;border-radius: 50px;text-align: center;">
                            <Label for="inpFile3">
                                <i class="fas fa-pen" style="color: white;"></i>
                            </Label>
                        </div>
                    </div>

                    <div id="toolInput3">
                        <label for="inpFile3">
                            <img src="{{ url('img/imageProduit.png') }}" style="height: 120px;margin-left: 30%;">
                        </label>
                        <input type="file" name="inpFile3" id="inpFile3" />
                    </div>

                </div>
                <div class="col-sm" id="prvImage4" style="background-size: 100% 100%;margin: 0px 10px;height: 200px;width: 200px;background-color: lightgray;border-radius: 20px;">

                    <div id="toolsImage4" style="visibility: hidden;">
                        <div style="cursor: pointer;margin-left: 93%;margin-top: -3%;color: white;background: red;width: 24px;height: 24px;border-radius: 50px;text-align: center;" onclick='viderImage(4)'>
                            <i class="far fa-trash-alt" style="color: white;"></i>
                        </div>
                        <div style="cursor: pointer;margin-left: 93%;margin-top: 3%;color: white;background: dodgerblue ;width: 24px;height: 24px;border-radius: 50px;text-align: center;">
                            <Label for="inpFile4">
                                <i class="fas fa-pen" style="color: white;"></i>
                            </Label>
                        </div>
                    </div>

                    <div id="toolInput4">
                        <label for="inpFile4">
                            <img src="{{ url('img/imageProduit.png') }}" style="height: 120px;margin-left: 30%;">
                        </label>
                        <input type="file" name="inpFile4" id="inpFile4" />
                    </div>

                </div>
                <div class="col-sm" id="prvImage5" style="background-size: 100% 100%;margin: 0px 10px;height: 200px;width: 200px;background-color: lightgray;border-radius: 20px;">

                    <div id="toolsImage5" style="visibility: hidden;">
                        <div style="cursor: pointer;margin-left: 93%;margin-top: -3%;color: white;background: red;width: 24px;height: 24px;border-radius: 50px;text-align: center;" onclick='viderImage(5)'>
                            <i class="far fa-trash-alt" style="color: white;"></i>
                        </div>
                        <div style="cursor: pointer;margin-left: 93%;margin-top: 3%;color: white;background: dodgerblue ;width: 24px;height: 24px;border-radius: 50px;text-align: center;">
                            <Label for="inpFile5">
                                <i class="fas fa-pen" style="color: white;"></i>
                            </Label>
                        </div>
                    </div>

                    <div id="toolInput5">
                        <label for="inpFile5">
                            <img src="{{ url('img/imageProduit.png') }}" style="height: 120px;margin-left: 30%;">
                        </label>
                        <input type="file" name="inpFile5" id="inpFile5" />
                    </div>

                </div>


                <!-- <div class="form-group">
                    <textarea required="required"></textarea>
                    <label for="textarea" class="control-label">Textarea</label><i class="bar"></i>
                </div>  -->
                <!-- <div class="checkbox">
                    <label>
                        <input type="checkbox" /><i class="helper"></i>I'm the label from a checkbox
                    </label>-->
            </div>
            <hr>

            <div id="containerDescriptions">

            </div>
            <div class="button-container">
                <button type="submit" class="button" onclick="document.getElementsByClassName('btnLineCl')[0].click();">
                    <span>Enregistrer</span>
                </button>
                <!-- <input type="submit" value="Enregistrer"> -->
            </div>
        </form>
    </div>

    <input type="button" id="btnLine" class="btnLineCl" value="+ caractéristiques" data-toggle="modal" data-target="#exampleModal" style="display: none;">
    <input type="hidden" name="nbrTotalOptions" id="nbrTotalOptions">

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
                            <small id="nomLbl">Libellé de l'option</small>
                            <br>
                            <input type="radio" name="radioExemple" id="radioExemple">
                            <label for="radioExemple" id="labelExemple">270 &times; 100 cms</label>
                            <br>
                            <div id="BigContainerLabels">

                            </div>
                        </div>
                        <hr style="border-left: 5px solid; height : 100px;">
                        <div class="col">
                            <input class="txtCaracteristique" type="text" id="texteNom" style="width: 310px;" placeholder="Exemple" oninput="document.getElementById('nomLbl').innerHTML= document.getElementById('texteNom').value">
                            <span class="row">
                                <input class="txtCaracteristique" type="text" placeholder="270 &times; 100 cms" id="texteOption" oninput="document.getElementById('labelExemple').innerHTML= document.getElementById('texteOption').value.replace('*', '&times;');">
                                <input class="txtCaracteristique" type="number" placeholder="1200.0 Dhs" id="textePrix" oninput="">
                            </span>
                            <br>
                            <button class="btnLine" id="btnLine" onclick="AjoutOptionItem()"><i class="fas fa-plus-circle"></i>Ligne</button>
                            <form id="formDescriptions">
                                @csrf
                                <div id="BigContainerOption">

                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary" value="Valider">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

<script src="{{ url('js/scriptInputFile.js') }}"></script>
<script src="{{ url('js/notify.min.js') }}"></script>
<script>
    $(document).ready(function() {

        let id_produit;

        $("#colorInput0").click(
            function() {
                $.notify.addStyle('foo', {
                    html: "<input type='text' value='#' onchange='changeCouleur(0)' id='col0' ><i type='button' id='btnCLose'>&times;</i>"
                });

                $(document).on('click', '#btnCLose', function() {
                    $(this).trigger('notify-hide');
                });

                $(document).on('focusout', '#col0', function() {
                    $(this).trigger('notify-hide');
                });

                $("#colorInput0").notify({}, {
                    style: 'foo',
                    autoHide: false,
                    clickToHide: false,
                });
            });

        $("#colorInput1").click(
            function() {
                $.notify.addStyle('foo', {
                    html: "<input type='text'   onchange='changeCouleur(1)' id='col1' ><i type='button' id='btnCLose'>&times;</i>"
                });

                $(document).on('click', '#btnCLose', function() {
                    $(this).trigger('notify-hide');
                });

                $(document).on('focusout', '#col1', function() {
                    $(this).trigger('notify-hide');
                });

                $("#colorInput1").notify({}, {
                    style: 'foo',
                    autoHide: false,
                    clickToHide: false,
                });
            });

        $("#colorInput2").click(
            function() {
                $.notify.addStyle('foo', {
                    html: "<input type='text'   onchange='changeCouleur(2)' id='col2' ><i type='button' id='btnCLose'>&times;</i>"
                });

                $(document).on('click', '#btnCLose', function() {
                    $(this).trigger('notify-hide');
                });

                $(document).on('focusout', '#col2', function() {
                    $(this).trigger('notify-hide');
                });

                $("#colorInput2").notify({}, {
                    style: 'foo',
                    autoHide: false,
                    clickToHide: false,
                });
            });

        $("#colorInput3").click(
            function() {
                $.notify.addStyle('foo', {
                    html: "<input type='text'   onchange='changeCouleur(3)' id='col3' ><i type='button' id='btnCLose'>&times;</i>"
                });

                $(document).on('click', '#btnCLose', function() {
                    $(this).trigger('notify-hide');
                });

                $(document).on('focusout', '#col3', function() {
                    $(this).trigger('notify-hide');
                });

                $("#colorInput3").notify({}, {
                    style: 'foo',
                    autoHide: false,
                    clickToHide: false,
                });
            });

        $('#homeSubmenu').removeClass();
        $('#homeSubmenu').addClass('list-unstyled collapse show');
        $('#linkNouveauProd').addClass('activeLink');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('change', '#Marques', function() {
            $.ajax({
                url: "{{ route('ImportTypes') }}",
                method: 'GET',
                data: {
                    id_marque: this.value
                },
                dataType: 'json',
                success: function(Types) {
                    $("#Types").empty();
                    $("#Types").append("<option value='-1' disabled selected>-Choisir un type-</option>")
                    Types.forEach(function(type) {
                        $("#Types").append(`<option value="${type.id_type}">${type.libelle_type}</option>`);
                    })
                }
            });
        });

        $("#formAjoutProd").on('submit', function(event) {
            event.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: "{{ route('AjoutNouveauProduit') }}",
                method: 'POST',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                dataType: 'json',
                success: function(data) {
                    id_produit = data.id_produit;
                    console.log(data.reponse + " " + data.id_produit);
                    $("#btnLine").disabled = false; //todo
                    $.notify(" Produit ajouté avec succées.\n Veuillez maintenant saisir ses caractéristiques.", {
                        autoHideDelay: 8000,
                        className: 'success',
                        align: "center",
                        verticalAlign: "top"
                    });
                }
            });
        });

        $("#formDescriptions").on('submit', function(event) {
            event.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('AjoutDecriptionAuProduit') }}",
                method: 'POST',
                data: {
                    nbrOptions: nbrOptions,
                    libelle_caractere: $('#texteNom').val(),
                    libelle_option_produit: $('#texteOption').val(),
                    prix: $('#textePrix').val(),
                    produit_: id_produit,
                    options: $("#formDescriptions").serialize()
                },
                dataType: 'json',
                success: function(reponse) {
                    console.log(reponse);
                    $('#texteNom').val("");
                    $('#texteOption').val("");
                    $('#textePrix').val("");
                    for (let i = nbrOptions; i > 0; i--) {
                        suprimerDescription(i - 1);
                    }
                    $('#exampleModal').modal('hide');
                    $.notify("Caractéristiques ajoutés avec succées !", {
                        autoHideDelay: 8000,
                        className: 'success',
                        align: "center",
                        verticalAlign: "top"
                    });
                }
            });
        });


    });
</script>
@endsection
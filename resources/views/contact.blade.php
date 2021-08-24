@extends('layout.app')

@section('body')
<!--================Home Banner Area =================-->
<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg" style="background-image: url('../img/imgContact.png');">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="breadcrumb_iner">
          <div class="breadcrumb_iner_item">
            <h2>Contactez-nous</h2>
            <p><span>-</span>Nous répondrons aussit&ocirc;t que possible <span>-</span></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- breadcrumb start-->

<!-- ================ contact section start ================= -->
<section class="contact-section padding_top">
  <div class="container">
    <div class="d-none d-sm-block mb-5 pb-4">
      <!-- <div id="map" style="height: 480px;"></div> -->
      <!-- <script>
        function initMap() {
          var uluru = {
            lat: -25.363,
            lng: 131.044
          };
          var grayStyles = [{
              featureType: "all",
              stylers: [{
                  saturation: -90
                },
                {
                  lightness: 50
                }
              ]
            },
            {
              elementType: 'labels.text.fill',
              stylers: [{
                color: '#ccdee9'
              }]
            }
          ];
          var map = new google.maps.Map(document.getElementById('map'), {
            center: {
              lat: -31.197,
              lng: 150.744
            },
            zoom: 9,
            styles: grayStyles,
            scrollwheel: false
          });
        }
      </script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap">
      </script> -->
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3281.9140865620357!2d-1.900859684918147!3d34.656872580445686!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd7864a5817de333%3A0x4365aa956bd4ff1e!2sSupMTI!5e0!3m2!1sfr!2sma!4v1591755466693!5m2!1sfr!2sma" width="1140" height="480" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

    </div>


    <div class="row">
      <div class="col-12">
        <h2 class="contact-title">Une demande ..?</h2>
      </div>
      <div class="col-lg-8">
        <form class="form-contact" id="form-contact" action="{{ route('StoreMessage') }}" method="post" autocomplete="off">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                @csrf

                <textarea class="form-control w-100" name="contenu_message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre message.'" placeholder='Votre message.' required></textarea>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <input class="form-control" name="nom_personne" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nom Complet'" placeholder='Votre nom'>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <input class="form-control" name="email_persone" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre adresse Email'" placeholder='Votre adresse Email' required>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <input class="form-control" name="sujet_message" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'à propos de'" placeholder='à propos de'>
              </div>
            </div>
          </div>
          <div class="form-group mt-3">
            <input type="button" id="BtnInput" class="btn_3 button-contactForm" value="Envoyer">
          </div>
        </form>
      </div>
      <div class="col-lg-4">
        <div class="media contact-info">
          <span class="contact-info__icon"><i class="ti-home"></i></span>
          <div class="media-body">
            <h3>Maroc, Oujda</h3>
            <p>Hay andalous, Po 60 000</p>
          </div>
        </div>
        <div class="media contact-info">
          <span class="contact-info__icon"><i class="ti-tablet"></i></span>
          <div class="media-body">
            <h3>(+212) 666 2017 40</h3>
            <p>Lundi au Vendredi (de 9h à 18h)</p>
          </div>
        </div>
        <div class="media contact-info">
          <span class="contact-info__icon"><i class="ti-email"></i></span>
          <div class="media-body">
            <h3>ServiceClient@MonLit.com</h3>
            <p>Contactez-nous n'importe quand !</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ================ contact section end ================= -->
@endsection

@section('scripts')
<script src="{{ url('js/notify.min.js') }}"></script>

<script>
  $(document).ready(function() {

    $("#BtnInput").click(function() {
      if ($('#email').valid() && $('#message').valid()) {
        $.notify("Nous vous répondront aussitot ! Vérifiez votre boite email ...", {
          autoHideDelay: 8000,
          className: 'success',
          position: "bottom center"
        });

        setTimeout(function() {

          $("#form-contact").submit()

        }, 3000);
      }
    });



  })
</script>
@endsection
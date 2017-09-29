@extends('layouts/main')

@push('meta')
<meta name="description"
      content="Vendredi propose des stages partagés entre entreprise et association. Faire un Vendredi, c'est travailler 4 jours par semaine en entreprise, 1 jour par semaine en association."/>
@endpush

@section('title')
    Chaque jour compte
@endsection

@section('hero')
    <div id="hero">
        <img id="hero-lundi" src="/images/hero-lundi.jpg" class="hero-bg in">
        <img id="hero-mardi" src="/images/hero-mardi.jpg" class="hero-bg hidden">
        <img id="hero-mercredi" src="/images/hero-mercredi.jpg" class="hero-bg hidden">
        <img id="hero-jeudi" src="/images/hero-jeudi.jpg" class="hero-bg hidden">
        <img id="hero-vendredi" src="/images/hero-vendredi.jpg" class="hero-bg hidden">
        <div class="container container-vendredi hero-text">
            <div class="row">
                <div class="col-sm-offset-1 col-sm-10">
                    <h1 class="hero-title">
                        Des stages uniques et engagés

                    </h1>
                    <p class="hero-subtitle">
                        Trouve le stage en entreprise de tes rêves.<br/>
                        Et consacre 1 jour par semaine à une mission en association.</p>
                    <p class="hero-buttons">
                        <a href="#offres-anchor" class="btn btn-sm btn-default voir-les-offres">Trouver son stage partagé</a>
                    </p>
                    <p class="hero-slider">
                        <span id="selector-lundi" class="full-circle"></span>
                        <span id="selector-mardi" class="empty-circle"></span>
                        <span id="selector-mercredi" class="empty-circle"></span>
                        <span id="selector-jeudi" class="empty-circle"></span>
                        <span id="selector-vendredi" class="empty-circle"></span>
                        <span id="slider-day">Lundi</span>
                    </p>
                    @push('scripts')
                    <script type="text/javascript">

                      var animating = false;
                      var daysToAnimate = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi'];
                      function capitalizeFirstLetter(string) {
                        return string.charAt(0).toUpperCase() + string.slice(1);
                      }

                      var slideIn = function (day) {

                        var slider = $(".hero-slider");
                        // Update the selector
                        slider.find('> .full-circle').attr('class', 'empty-circle');
                        $("#selector-" + day).attr('class', 'full-circle');
                        $("#slider-day").html(capitalizeFirstLetter(day));

                        // Hide all except the last one (with slide-in or .in if it the first load of the page)
                        $(".hero-bg:not(.slide-in, .in)").addClass('hidden');
                        // The last one because the "normal one"
                        $(".hero-bg.slide-in, .hero-bg.in").removeClass('slide-in in');
                        $("#hero-" + day).removeClass('hidden').addClass('slide-in');
                      };


                      var autoplay = setInterval(function () {
                        // find current day
                        var currentDay = $('.hero-bg.slide-in, .hero-bg.in').attr('id').slice(5);
                        var nextDay = daysToAnimate[(daysToAnimate.indexOf(currentDay) + 1  ) % daysToAnimate.length]
                        slideIn(nextDay);
                      }, 5000);
                      $(document).ready(function () {
                        daysToAnimate.forEach(function (day) {
                          $("#selector-" + day).click(function () {
                            clearInterval(autoplay);
                            slideIn(day);
                          });
                        });

                      });


                    </script>
                    @endpush
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script type="text/javascript">
      $(document).ready(function () {
        // Smooth scroll to the job panel
        $(".voir-les-offres").click(function (e) {
          e.preventDefault();
          var offset = $("#offres-anchor").offset();
          offset.top -= 20;
          $('html, body').animate({
            scrollTop: offset.top,
          }, 800);
        });
      });
    </script>
    @endpush

@endsection

@section('content')
    <div class="row">

        <div class="col-sm-12 col-md-5 block-vendredi">
            @include('pages/_concept-vendredi')
        </div>

        <div class="col-sm-12 col-md-7 block-vendredi">

            <div class="col-sm-12" id="home-semaine">
                <h1 id="home-semaine-title">Des offres en entreprise exclusives !</h1>
                <p class="home-semaine-subtitle">Plus de 30 entreprises pionnières te proposent des stages uniques et engagés. Quelque soit ta formation !</p>
                <button onclick="$('#semaineVecu').modal('show');" class="btn btn-sm btn-default home-semaine-button">
                    Découvrir
                </button>
            </div>
        </div>

    </div>

    <div class="row">
      <div class="col-sm-12 block-vendredi">

        <div class="col-sm-12 col-md-7" id="home-association">
          <h1 id="home-semaine-title">Accompagne l'association de ton choix !</h1>
          <p class="home-semaine-subtitle">Plus de 500 associations et start-up sociales ont des missions opérationnelles ou stratégiques à te proposer. Avec elles, tu développes tes talents et rends la société plus belle chaque semaine !</p>
          <button onclick="$('#semaineVecu').modal('show');" class="btn btn-sm btn-default home-semaine-button">
            Trouver son stage partagé
          </button>
        </div>

        <div class="col-sm-12 col-md-5" id="home-associaiton-image">
          
        </div>
        
      </div>

    </div>

    <div class="row">
      <div class="col-sm-12 block-vendredi">
      <h1 id="home-semaine-title">Comment ça marche ?</h1>

      <div class="col-md-4">
        <h1 id="home-semaine-title">Et un !</h1>
        <p class="home-semaine-subtitle">Tu nous indiques tes <strong>préférences</strong> de stage. Tu reçois <strong>par mail</strong> les offres qui te correspondent.</p>
      </div>

      <div class="col-md-4">
        <h1 id="home-semaine-title">Et deux !</h1>
        <p class="home-semaine-subtitle">Tu <strong>candidates</strong> alors à l'offre en <strong>entreprise</strong> qui te fait rêver !</p>
      </div>

      <div class="col-md-4">
        <h1 id="home-semaine-title">Et trois-zéro* !</h1>
        <p class="home-semaine-subtitle">Une fois <strong>recruté(e)</strong>, tu <strong>choisis</strong> la <strong>mission</strong> pour compléter ton stage !</p>
      </div>

      <p class="home-semaine-bravo">*Bravo champion(ne) ! C'est parti pour un stage engagé !</strong>

      </div>
    </div>

        <div class="col-sm-12 block-vendredi">
            <div id="home-newsletter" class="col-sm-12">
                <div class="row ">
                    <div class="col-md-5 col-sm-12">
                        <h2>Tu veux changer le monde ? <br> Ça commence par un Vendredi.</h2>
                    </div>

                    <button onclick="$('#semaineVecu').modal('show');" class="btn btn-sm btn-default home-semaine-button">
                    Démarrer l'aventure
                    </button>


                   

                </div>
            </div>
        </div>


    </div>
    @include('/pages/_modal-vecu-vendredi')
@endsection

@push('scripts')

<script type="text/javascript">
  $(document).ready(function () {

    $('#home-semaine, #home-concept').matchHeight({property: 'height'});

    $("#selectorEntreprise a").click(function () {
      $("#home-offres").removeClass('background-asso');
    });

    $("#selectorAsso a").click(function () {
      $("#home-offres").addClass('background-asso');
    });

    $("#seeAllAsso").on('mouseenter', function () {
      $("#seeAllAsso").text('Bientôt disponible !');
    });
    $("#seeAllAsso").on('mouseleave', function () {
      $("#seeAllAsso").text('Voir toutes les assos');
    });
    $("#seeAllAsso").on('click', function (e) {
      e.preventDefault();
    });
  });
</script>
@endpush
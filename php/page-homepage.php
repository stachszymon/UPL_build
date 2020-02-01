<?php 
/*
    Template Name: Home-Page-Template
*/
    get_header() 
?>

<!---Hero-->
    <div id="hero" class="container-fluid py-5" style="background-image: url(<?php echo get_template_directory_uri() . '/img/homepage/hero.jpg' ?>)">
        <div class="container py-3">
            <div class="row">
                <div class="col-lg-6 col-md-8 py-5">
                    <h2 class="text-primary mb-3"><strong>Dobrze trafiłeś!</strong></h2>
                    <p>Już dziś Fundacja Umowy Pod Lupą może Ci pomóc. Chcesz odzyskać pieniądze z polisolokaty? Kredyt walutowy to Twoja zmora? Wspieramy Was i stajemy po Waszej stronie – stronie prawa. Nasi specjaliści profesjonalnie pomogą odzyskać Wam niezgodnie z prawem odebrane pieniądze. Fundacja wraz z ekspertami wspomoże Cię w walce o Twoje prawa. To nic nie kosztuje, a spróbować warto. Nie czekaj – działaj.</p>
                    <a href="<?php get_permalink() ?>/o-nas" class="btn btn-primary mt-2">Sprawdź teraz</a>
                    <a href="<?php get_permalink() ?>/kontakt" class="btn btn-outline-primary mt-2">Napisz do nas</a>
                </div>
            </div>
        </div>
    </div>

    <!--Czym się zajmuje-->

    <div class="container py-5">
        <div class="row pt-4">
            <div class="col-lg-9 col-md-8 pr-5 mb-4">
                <h2 class="text-primary mb-3"><strong>Czym zajmuje się Fundacja Umowy pod Lupą?</strong></h2>
                <p>Głównym naszym celem jest świadczenie pomocy prawnej na rzecz osób poszkodowanych w wyniku zawartych przez nich produktów finansowych. </p>
                <ul>
                    <li><p><strong>pomoc w odzyskiwaniu środków finansowych przez konsumentów, ulokowanych w niekorzystnych dla konsumentów instrumentach finansowych (pomoc dla tzw. "frankowiczów" oraz posiadaczy tzw. "polisolokat");</strong></p></li>
                    <li><p>prowadzenie doradztwa dla osób fizycznych, zwłaszcza nieprowadzących działalności gospodarczej, a także osób starszych, których nie stać na korzystanie z pomocy profesjonalnych doradców oraz osób nie posiadających dostatecznej wiedzy w dziedzinie ekonomii i finansów - w zakresie inwestowania zgromadzonymi oszczędnościami, doboru odpowiednich produktów finansowych oraz zarządzania nimi; </p></li>
                    <li><p>prowadzenie szkoleń; </p></li>
                    <li><p>wspieranie, tworzenie i realizacja kampanii reklamowych i akcji promocyjnych; </p></li>
                    <li><p>wydawanie materiałów edukacyjnych.</p></li>
                </ul>
                <a href="<?php get_permalink() ?>/cel" class="btn btn-primary mt-2 mb-5">Zobacz do czego dążymy</a>
            </div>
            <div class="col-lg-3 col-md-4">
                <img class="img-fluid d-block mb-3" src="<?php echo get_template_directory_uri() . '/img/homepage/frankowicz.jpg' ?>" alt="Frankowicz">
                <h3><a href="#"  class="text-primary">Pomoc przy polisolokatach, polisach inwestycyjnych i Frankowiczom</a></h3>
                <p>Naszym zadaniem jest odzyskanie środków dla Naszych klientów z produktów ubezpieczeniowych, oraz inwestycyjno-ubezpieczeniowych. Wspieramy również działania na rzecz osób spłacających kredyty frankowe, poszkodowane przez zmiany kursu walutowego. </p>
                <button class="btn btn-primary mt-2">Sprawdź czy możemy Ci pomóc!</button>
            </div>
        </div>
    </div>

     <!--Kim jesteśmy-->
     <div class="container-fluid bg-primary">
         <div class="container about-height mt-5">
             <div class="row">
                 <div class="col-lg-6 position-relative d-none d-sm-block">
                     <img class="img-fluid img-bigger-than-contnent" src="<?php echo get_template_directory_uri() . '/img/homepage/kim_jestesmy.png' ?>" alt="Umowy pod lupą - kim jesteśmy?">
                 </div>
                 <div class="col-lg-6 pl-5 pt-5 mt-2 text-white pb-5">
                     <h2 class="mb-3"><strong>Kim jesteśmy?</strong></h2>
                     <p>Jesteśmy praktykami. Zadowolenie Klientów przekształca się bezpośrednio w nasz sukces. W Fundacji „Umowy pod lupą” zrzeszamy ludzi, którzy dzięki swojej pasji i oddaniu byli w stanie odnosić sukcesy w ponad 16 letnim okresie swojej działalności na rynkach finansowych. Nasi doradcy doskonalili swoje kompetencje, służąc klientom swoją wiedzą w najlepszych korporacjach oraz instytucjach finansowych. </p>
                     <a href="<?php get_permalink() ?>/o-nas" class="btn btn-outline-primary my-3">Dowiedz się więcej</a>
                </div>
             </div>
         </div>
     </div>

      <!--Jak możemy Ci pomóc?-->
      <div class="container pt-1 pt-lg-5 pb-5 mt-5">
          <div class="row py-5">
            <div class="col-lg-5 pr-3">
                <h2 class="text-primart mb-3"><strong>Jak możemy Ci pomóc?</strong></h2>
                <p>Dowiedz się jak odzyskać pieniądze z umów finansowych, na których straciłeś. Zapoznaj się z naszymi poradami i dowiedz się jak ustrzec się przed nieuczciwymi transakcjami finansowymi. </p>
            </div>
              <div class="col-lg-7 blog-slider">
                    <div id="posts-carousel" class="owl-carousel owl-theme" >
                        <?php $latest_posts = get_posts( array( 'numberposts' => 10 ) ); 
                            foreach($latest_posts as $post) :
                            setup_postdata( $post );
                        ?>
                        <a style='color:black;' href='<?php the_permalink() ?>' class="item">
                            <?php the_post_thumbnail( 'medium', ['class'=>'h-100'] ); ?>
                            <h4><strong>​<?php the_title() ?></strong></h4>
                        </a>
                        <?php endforeach; ?>
                    </div>
              </div>
          </div>
      </div>

      <!--Zobacz co klienci mówią o nas-->
      <div class="container-fluid opinions-container" style="background-image: url(<?php echo get_template_directory_uri() . '/img/homepage/bg.jpg' ?>)">
          <div class="container">
              <div class="row align-items-end">
                  <div class="col-lg-6 pb-3 text-white">
                    <h2 class="h2-color-change mb-3 mb-lg-70"><strong>Zobacz co klienci mówią o nas</strong></h2>
                    
                    <div id="opinion-carousel" class="owl-carousel owl-theme" >
                        <div class="item">
                            <p>"Grupa specjalistów dostępna niemalże 24h/dobę. Zawsze mogłem zapytać (a pytania mnożyły się same) o nurtujące mnie sprawy, zawsze uzyskując rzetelną informację zwrotną. Pomoc jaka została mi okazana spełniła moje oczekiwania w 100% !"</p>
                            <p class="mb-0"><strong>Pan Piotr z Rzeszowa</strong></p>
                            <small>stomatolog</small>
                        </div>
                        <div class="item">
                            <p>"Pomoc specjalistów Fundacji Pod Lupą okazała się bezcenna. Polecam każdemu, kto ma kłopoty z odzyskaniem pieniędzy z polisy."</p>
                            <p class="mb-0"><strong>Pani Agnieszka z Krakowa</strong></p>
                            <small>nauczycielka</small>
                        </div>
                        <div class="item">
                            <p>"Zaangażowanie w moją sprawę oraz szybka interwencja kancelarii przywróciły mi wiarę w ludzi. Odzyskane pieniądze to już tylko wisienka na torcie!"</p>                            
                            <p class="mb-0"><strong>Pan Mariusz z Gorlic</strong></p>
                            <small>inżynier</small>
                        </div>
                        <div class="item">
                            <p>"Energia i zapał pracowników Fundacji Pod Lupą do rozwiązania mojej sprawy były niewiarygodne. Tylko dzięki Fundacji odzyskałem stracone pieniądze."</p>
                            <p class="mb-0"><strong>Pan Paweł z Warszawy</strong></p>
                            <small>handlowiec</small>
                        </div>
                        <div class="item">
                            <p>"Przypadkowo trafiłam na stronę Fundacji Pod Lupą w internecie. Nie wiedziałam, że mogę odzyskać pieniądze ze starej poliso-lokaty. Fundacja dosłownie spadła mi z nieba. Zadzwoniłam, a to był początek lawiny spraw do załatwienia w celu pomocy mnie i mojej rodzinie. Pełna satysfakcja. Polecam."</p>
                            <p class="mb-0"><strong>Pani Joanna z Warszawy</strong></p>
                            <small>sekretarka</small>
                        </div> 
                    </div>
                  </div>
                  <div class="col-lg-6 position-relative">
                    <img class="img-fluid img-bigger-than-contnent-opinion" src="<?php echo get_template_directory_uri() . '/img/homepage/ludzie.png' ?>" alt="Umowy pod lupą to ludzie, którzy pomagają innym ludziom.">
                  </div>
              </div>
          </div>
      </div>

<?php get_footer() ?>
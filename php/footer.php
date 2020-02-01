    <!--Footer-->
    <footer class="">
        <div class='container-fluid bg-primary text-white py-3'>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <img src="<?php $ee = get_theme_mod('your_theme_footer_logo') ?: get_template_directory_uri().'/img/logo_white.png'; echo $ee; ?>" 
                        alt="<?php echo get_bloginfo('title') ?> Logo">
                </div>
                <div class="col-lg-3 ">
                    <p class="mb-0">Fundacja Umowy pod Lupą oferuje pełen zakres pomocy. Skontaktuj się z nami, a my Ci pomożemy. </p>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="d-flex align-items-center my-3">
                        <i class="fa fa-map-marker-alt d-inline-block mr-2"></i>
                        <div class="d-inline-block text-white">
                            <strong>ul. Grochowska 217/9</strong>
                            <p class="mb-0">04-077 Warszawa</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center my-3">
                        <i class="fa fa-map-marker-alt d-inline-block mr-2"></i>
                        <div class="d-inline-block text-white">
                            <strong>ul. Mogilska 65</strong>
                            <p class="mb-0">30-001 Kraków</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="d-flex align-items-center my-3">
                        <i class="fa fa-phone d-inline-block mr-2"></i>
                            <div class="d-inline-block text-white">
                                <a class="text-white"  href="tel:22 299 33 63">22 299 33 63</a>                                   
                            </div>
                        </div>
                        <div class="d-flex align-items-center my-3">
                            <i class="fa fa-envelope d-inline-block mr-2"></i>
                            <div class="d-inline-block text-white">
                                <a  class="text-white" href="mailto:biuro@umowypodlupa.pl">biuro@umowypodlupa.pl</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="container-fluid bg-dark py-2">
            <div class="container text-white text-center">
                <small>Copyright ©2020 Fundacja Umowy Pod Lupą All Rights Reserved. </small>
            </div>
        </div>
    </footer>
    
    <script
		src="https://code.jquery.com/jquery-3.4.1.min.js"
		integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
		crossorigin="anonymous"></script>
    <script type="text/javascript" src="./js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a9a66082dd.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/script.min.js"></script>
    <?php wp_footer() ?>
</body>
</html>
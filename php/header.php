<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Owlit - created by Patrycja Chochlińska & Szymon Stach">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo get_bloginfo('title') ?></title>
    <meta name="description" content="<?php echo get_bloginfo('description') ?>">
    
    <?php wp_head() ?>
</head>
<body>
    <header class="container-fluid p-0">
        <div id="upper-header" class="container py-3">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <img src="<?php header_image() ?>" alt="<?php echo get_bloginfo('title') ?> Logo">
                </div>
                <div class="col-lg-3 col-md-6 d-flex align-items-center">
                    <i class="fa fa-2x fa-comments d-inline-block mr-3 text-primary"></i>
                    <div class="d-inline-block">
                        <a class="text-primary d-block"  href="tel:22 299 33 63"><strong>22 299 33 63</strong></a>
                        <a  class="text-primary d-block" href="mailto:biuro@umowypodlupa.pl">biuro@umowypodlupa.pl</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex align-items-center">
                    <i class="fa fa-2x fa-map-marker-alt d-inline-block ml-1 ml-md-0 mr-4 mr-md-3 text-primary"></i>
                    <div class="d-inline-block text-primary">
                        <strong>ul. Grochowska 217/9</strong>
                        <p class="mb-0">04-077 Warszawa</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex align-items-center">
                    <i class="fa fa-2x fa-map-marker-alt d-inline-block ml-1 ml-md-0 mr-4 mr-md-3 text-primary"></i>
                    <div class="d-inline-block text-primary">
                        <strong>ul. Mogilska 65</strong>
                        <p class="mb-0">30-001 Kraków</p>
                    </div>
                </div>
            </div>
        </div>
        <nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-primary py-0">
           <div class="container">
            <button class="navbar-toggler ml-auto my-2" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            
              <div class="collapse navbar-collapse mr-auto" id="navbar-menu">
                <?php wp_nav_menu( array( 
                    'theme_location' => 'header-menu',
                    'container' => '',
                    'container_class' => '',
                    'menu_class' => 'navbar-nav h-100',
                    'add_li_class' => 'nav-item'
                )); ?>
                <form class="d-flex my-2 my-lg-0 ml-auto" method='get' action='<?php echo home_url() ?>'>
                  <input name='s' class="form-control mr-2 my-2 ml-3" type="search" placeholder="Szukaj" aria-label="Search">
                  <button class="btn btn-outline-light my-2 px-2 py-1 mr-3" type="submit"><i class="fa fa-search"></i></button>
                </form>
              </div>
           </div>
        </nav>
    </header>
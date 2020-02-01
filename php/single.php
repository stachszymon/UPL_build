<?php get_header() ?>
<div class="container-fluid bg-primary">
    <div class="container">
        <?php custom_breadcrumbs(); ?>
        <h2 class='h2 text-white pb-3'><?php the_title() ?></h2>
    </div>
</div>
<div class="container">
    <div class="row my-5">
        <div class="col-12">
            <?php 
            if ( have_posts() ) : 
                while ( have_posts() ) : the_post(); 
            ?>
                <h1 class='text-primary'><?php the_title()?></h1>
                <p class="border-top border-bottom py-2">
                    <span><?php the_category(', '); ?></span>
                    <span class='border-left ml-2 pl-2'><i class="far fa-calendar-alt">&nbsp;<?php the_date() ?></i></span>
                </p>
                <?php 
                    if(has_post_thumbnail( )) the_post_thumbnail( 'medium', ['class'=>'float-left pr-3 pb-3'] );
                ?>
                <p><?php the_content(); ?></p>
            <?php        
                endwhile; 
            endif; 
            ?>
        </div>
    </div>
</div>

<?php get_footer() ?>
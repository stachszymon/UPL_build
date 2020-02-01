<?php get_header() ?>
<div class="container-fluid bg-primary">
    <div class="container">
        <?php custom_breadcrumbs(); ?>
        <h2 class='h2 text-white pb-3'><?php echo single_cat_title() ?></h2>
    </div>
</div>
<div class="container">
    <div class="row my-5">
        <?php 
        if ( have_posts() ) : 
            while ( have_posts() ) : the_post(); 
        ?>    
                <div class="col-md-4 mt-4 mt-md-0">
                    <a class='text-dark' href='#'>
                        <h3 class='font-weight-bold'><?php echo get_the_title() ?></h3>
                    </a>
                    <p class="d-flex align-items-center justify-content-between border-top border-bottom py-1">
                        <span><?php the_category(', ');?></span>
                        <span><i class="far fa-calendar-alt">&nbsp;<?php the_date() ?></i></span>
                    </p>
                    <?php if(has_post_thumbnail( )) : ?>
                    <?php the_post_thumbnail( 'medium', ['class'=>'mb-3 w-100 img-responsive responsive--full'] ); ?>
                    <?php endif; ?>
                    <p>
                        <?php echo wp_trim_words( get_the_content(), 50, '...' ); ?>
                        <a href="<?php the_permalink() ?>">Czytaj więcej &rarr;</a>
                    </p>
                </div>
        <?php        
            endwhile; 
        endif; 
        ?>
    </div>
</div>

<?php get_footer() ?>
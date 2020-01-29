<?php get_header() ?>
<div class="container">
    <div class="row my-5">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <?php if ( is_active_sidebar( 'custom-side-bar' ) ) : ?>
                        <?php dynamic_sidebar( 'custom-side-bar' ); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-8">
            <?php 
            if ( have_posts() ) : 
                while ( have_posts() ) : the_post(); 
                    the_content();
                endwhile; 
            endif; 
            ?>
        </div>
    </div>
</div>

<?php get_footer() ?>
<?php get_header() ?>
<div class="container">
    <div class="row my-5">
        <div class="col-12">
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
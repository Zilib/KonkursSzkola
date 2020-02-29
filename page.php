<?php 
get_header();

//Zwykła strona

            if ( have_posts() ) :
               while ( have_posts() ) : the_post();
               ?>
          		<div class="OneTresc">
                  <h2 class="Zap"><?php the_title(); ?></h2>
               <?php the_post_thumbnail( 'thumbnail' );
               if(the_content() != '')
               the_content();
              edit_post_link('Edytuj stronę','<p style="margin-top:10px;text-align:center;">','</p>'); 
                ?>
            </div>
               <?php
                  endwhile;
endif;
Cofnij();

get_footer();?>
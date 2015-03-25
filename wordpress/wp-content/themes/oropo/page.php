<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div id="main" <?php post_class(); ?>>
	<div class="row clearfix" data-equalizer>
    	

    	<div id="left-col" class="medium-8 small-12 columns" data-equalizer-watch>
        
        	<?php if ( has_post_thumbnail() ) { the_post_thumbnail('full-size', array( 'class' => 'featured-image' )); } ?>   
           		
       		<h3 class="page-title"><?php the_title(); ?></h3>
    		<h1 class="page-title"><?php the_field('seo_heading'); ?></h1>
            <h2 class="page-intro"><?php the_field('intro'); ?></h2>
            
			<?php the_content(); ?>

           	<?php get_template_part('inc/cta'); ?>
            
             
        </div>
        
        <div id="right-col" class="medium-4 small-12 columns" data-equalizer-watch>

    	<?php if( is_page('news') ) :?>
			NEWSELTTER SUBSCRIPTION BOX?
		<?php endif; ?>
        
        
    <?php get_template_part('inc/page-xsells'); ?>
        

        </div>
        
 
	</div>
</div>	
            
<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>

<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div id="main" <?php post_class('wrapper post-wrapper'); ?>>
	<div class="row" data-equalizer>
    	

    	<div id="left-col" class="medium-8 small-12 columns" data-equalizer-watch>
        
        	<?php if ( has_post_thumbnail() ) : the_post_thumbnail('full-size', array( 'class' => 'featured-image' )); else : ?><IMG src="<?php the_field('news_image_placeholder', 'options'); ?>" /><?php endif; ?>   
           		
       		<?php the_date('j M Y', '<p class="post-date">', '</p>'); ?>
    		<h1><?php the_title(); ?></h1>
            
			<?php the_content(); ?>

           	
            
             
        </div>
        
        <div id="right-col" class="medium-4 small-12 columns" data-equalizer-watch>
			<?php dynamic_sidebar( 'news' ); ?> 
        </div>
        
 
	</div>
</div>	

<div id="post-nav-wrapper" class="wrapper">
	<div class="row post-navigation">
        <div class="medium-6 small-12 columns">
            <P><?php previous_post('&laquo; %', '', 'yes'); ?></P>
        </div>
         <div class="medium-6 small-12 columns text-right">
            <P><?php next_post('% &raquo;', '', 'yes'); ?></P>
        </div>
    </div> <!-- end navigation -->     
</div>
            
<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>


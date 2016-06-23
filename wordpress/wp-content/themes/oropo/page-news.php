<?php 
/*
Template Name: News Page
*/
get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div id="main" <?php post_class('post-wrapper'); ?>>
	<div class="row">
    	

    	<div id="left-col" class="small-12 columns">
   

    		<h1 class="page-title"><?php the_title(); ?></h1>
            
			<?php the_content(); ?>
        </div>
</div>

    <div class="row news block home-block">
        <div class="small-12 columns news-content content-block">
         
			<?php 
			query_posts(array( 
					'post_type' => 'post',
					'posts_per_page' => -1,
				) );
			?>
            <?php if (have_posts()) : ?>
            <ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-3 news-list">
            	<?php while (have_posts()) : the_post(); ?>    
					<li class="article">
                    	 <?php if ( has_post_thumbnail() ) : the_post_thumbnail('full-size'); endif; ?>
                         <div class="article-content">
							 <?php the_date('j M Y', '<p class="post-date">', '</p>'); ?>
                             <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                             <?php the_excerpt(); ?>
                         </div>
                    </li>
            	<?php endwhile;?>   
            </ul>
            <?php endif;?>
            <?php wp_reset_query(); ?>
        </div>
    </div>



            
<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>

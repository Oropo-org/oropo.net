<?php get_header(); ?>

<div id="main" class="post-wrapper">
	<div class="row">
    	

    	<div id="left-col" 	class="small-12 columns">
   				<h3 class="page-title">
									News
								</h3>
			<?php if (is_category()) { ?>
								<h1 class="page-title">
									<?php single_cat_title(); ?>
								</h1>

							<?php } elseif (is_tag()) { ?>
								<h1 class="page-title">
									<?php single_tag_title(); ?>
								</h1>

							<?php } elseif (is_author()) {
								global $post;
								$author_id = $post->post_author;
							?>
								<h1 class="page-title">

									<?php the_author_meta('display_name', $author_id); ?>

								</h1>
							<?php } elseif (is_day()) { ?>
								<h1 class="page-title">
									<?php the_time('l, F j, Y'); ?>
								</h1>

							<?php } elseif (is_month()) { ?>
									<h1 class="page-title">
										<?php the_time('F Y'); ?>
									</h1>

							<?php } elseif (is_year()) { ?>
									<h1 class="page-title">
										<?php the_time('Y'); ?>
									</h1>
							<?php } ?>
        </div>
</div>

    <div class="row news block home-block">
        <div class="medium-8 small-12 columns news-content content-block">
         
			
            <?php if (have_posts()) : ?>
            <ul class="small-block-grid-1 medium-block-grid-2 news-list">
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
        
         <div id="right-col" class="medium-4 small-12 columns" data-equalizer-watch>
			<?php dynamic_sidebar( 'news' ); ?> 
        </div>
    </div>

<?php get_footer(); ?>

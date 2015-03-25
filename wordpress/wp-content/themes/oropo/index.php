<?php get_header(); ?>
<div id="hero-wrapper" class="wrapper" style="background-image: url('<?php the_field('hero_image', 'options'); ?>');" data-magellan-destination="home">
    <div class="row hero block home-block">
        <div class="small-12 columns hero-content content-block">
        	<div class="hero-copy">
                <h2 class="hero-title"><?php the_field('hero_title', 'options'); ?></h2>
                <h1 class="hero-heading"><?php the_field('hero_heading', 'options'); ?></h1>    		
            </div>
        </div>
    </div>
</div>
<div id="responsive-hero-wrapper" class="wrapper" data-magellan-destination="home">
    
        	<IMG src="<?php the_field('hero_image', 'options'); ?>" />
            <div class="row hero block home-block">
        <div class="small-12 columns content-block">
        	<div class="hero-copy">
                <h2 class="hero-title"><?php the_field('hero_title', 'options'); ?></h2>
                <h1 class="hero-heading"><?php the_field('hero_heading', 'options'); ?></h1>    		
            </div>
        </div>
    </div>
</div>


<div id="mission-wrapper" class="wrapper">
    <div class="row mission block home-block">
        <div class="small-12 columns mission-content content-block">
            <h3><?php the_field('mission_title', 'options'); ?></h3>
            <h2><?php the_field('mission_heading', 'options'); ?></h2>    
            <p><?php the_field('mission_copy', 'options'); ?></p>
        </div>
    </div>
</div>

<!--
<a name="news"></a>
<div id="news-wrapper" class="wrapper" data-magellan-destination="news">
    <div class="row news block home-block">
        <div class="small-12 columns news-content  content-block">
            <h3><a href="<?php the_field('news_link', 'options'); ?>"><?php the_field('news_title', 'options'); ?></a></h3>
            <h2><?php the_field('news_heading', 'options'); ?></h2>    
			<?php 
			query_posts(array( 
					'post_type' => 'post',
					'posts_per_page' => 6,
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
</div>
-->

<a name="leadership"></a>
<div id="team-wrapper" class="wrapper" data-magellan-destination="leadership">
    <div class="row team block home-block">
        <div class="small-12 columns team-content  content-block">
            <h3><?php the_field('team_title', 'options'); ?></h3>
            <h2><?php the_field('team_heading', 'options'); ?></h2>
            <p><?php the_field('team_content', 'options'); ?></p>
            <?php 
			query_posts(array( 
					'post_type' => 'person',
					'posts_per_page' => -1,
					'orderby' => 'menu_order',
					'order' => 'ASC',
					'roles' => 'directors'
				) );
			?>
            <?php if (have_posts()) : ?>
            	<h4 class="role-title"><?php the_field('directors_title', 'options'); ?></h4>
            	<?php get_template_part('inc/person-list'); ?>
            <?php endif;?>
            <?php wp_reset_query(); ?>
            <?php 
			query_posts(array( 
					'post_type' => 'person',
					'posts_per_page' => -1,
					'orderby' => 'menu_order',
					'order' => 'ASC',
					'roles' => 'advisors'
				) );
			?>
            <?php if (have_posts()) : ?>
            	<h4 class="role-title"><?php the_field('advisors_title', 'options'); ?></h4>
            	<?php get_template_part('inc/person-list'); ?>
            <?php endif;?>
            <?php wp_reset_query(); ?>
        </div>
    </div>
</div>

<a name="policy"></a>
<div id="policy-wrapper" class="wrapper" data-magellan-destination="policy">
    <div class="row policy block home-block">
        <div class="small-12 columns policy-content content-block">
            <h3><?php the_field('policy_title', 'options'); ?></h3>
            <h2><A href="<?php the_field('policy_link', 'options'); ?>"><?php the_field('policy_heading', 'options'); ?></A></h2>    
			<div class="row" data-equalizer>
                <div id="policy-left" class="small-12 medium-8 columns" data-equalizer-watch>
                	<div class="vertical-align">
                    	<?php the_field('policy_copy', 'options'); ?>
                    </div>
                </div>
                <div id="policy-right" class="small-12 medium-4 columns" data-equalizer-watch>
                	<div class="vertical-align">
                    	<A href="<?php the_field('policy_doc', 'options'); ?>" class="btn"><?php the_field('policy_cta', 'options'); ?></A>  
                    </div>  
                </div>
    		</div>
        </div>
    </div>
</div>

<a name="contact"></a>
<div id="contact-image-wrapper" class="wrapper" style="background-image: url('<?php the_field('contact_image', 'options'); ?>');" data-magellan-destination="contact">
    <div class="row contact-image block home-block">
        <div class="small-12 columns contact-image-content content-block">
            <h3><?php the_field('contact_title', 'options'); ?></h3>
            <h2><?php the_field('contact_heading', 'options'); ?></h2>    
        </div>
    </div>
</div>
<div id="contact-details-wrapper" class="wrapper">
    <div class="row contact-details block home-block">
        <div class="small-12 columns contact-details-content content-block">
			<?php if( have_rows('contact_details', 'options') ): ?>
            <ul class="small-block-grid-1 medium-block-grid-3 contact-list">
            	<?php while( have_rows('contact_details', 'options') ): the_row(); 
				$icon = get_sub_field('icon');
				$title = get_sub_field('title');
				$content = get_sub_field('content');
				$link = get_sub_field('link');
				?>
            	<li class="contact-detail <?php echo $icon; ?>" data-equalizer>
                	<a href="<?php echo $link; ?>" target="_blank"><div class="left contact-icon" data-equalizer-watch>
                        
                         <span class="fa-stack fa-lg">
                          <i class="fa fa-circle fa-stack-2x"></i>
                          <i class="fa fa-<?php echo $icon; ?> fa-stack-1x fa-inverse"></i>
                        </span>
                        
                    </div>
                    <div class="left contact-copy" data-equalizer-watch>
                        <h4 class="contact-title"><?php echo $title; ?></h4>
                        <p><?php echo $content; ?></p>
                    </div>
                    </a>
                </li>
              	<?php endwhile; ?>
            </ul>
         	<?php endif; ?>   
        </div>
    </div>
</div>

<?php get_footer(); ?>

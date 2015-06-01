<ul class="small-block-grid-2 medium-block-grid-4 team-list">
	<?php while (have_posts()) : the_post(); ?>    
        <li class="person">
             <?php if ( has_post_thumbnail() ) : the_post_thumbnail('full-size'); endif; ?>
             <div class="person-content">
             	<h4 class="name"><?php the_title(); ?></h4>
                 <p class="job-title"><?php the_field('job_title'); ?></p>               
                 <?php the_content(); ?>
             </div>
        </li>
    <?php endwhile;?>   
</ul>

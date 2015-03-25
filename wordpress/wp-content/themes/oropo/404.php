<?php get_header(); ?>

<div id="main">
	<div class="row clearfix" data-equalizer>

    	<div id="left-col" class="medium-8 small-12 columns" data-equalizer-watch>
	
       		<h1><?php the_field('404_title', 'options') ?></h1>
            <P><?php the_field('404_copy', 'options') ?></P>
 
        </div>
        
        <div id="right-col" class="medium-4 small-12 columns" data-equalizer-watch>
		 </div> 
 
	</div>
</div>	
            

<?php get_footer(); ?>

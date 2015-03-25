<DIV id="post-<?php the_ID(); ?>" <?php post_class('row news-item'); ?>>
    <DIV class="small-4 columns post-image">
        <?php if ( has_post_thumbnail() ) : the_post_thumbnail('full-size'); else : ?><IMG src="<?php the_field('news_image_placeholder', 'options'); ?>" /><?php endif; ?> 
    </DIV>
    <DIV class="small-8 columns post-content">
        <?php the_date('jS M Y', '<P class="post-date">', '</P>'); ?>
        <h2 class="post-title"><A href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></A></h2>    
         <?php wpe_excerpt('wpe_excerptlength_teaser', 'wpe_excerptmore'); ?>   
    </DIV>
   
</DIV>
     







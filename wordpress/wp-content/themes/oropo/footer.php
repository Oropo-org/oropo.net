<div id="links-wrapper" class="wrapper">
    <div class="row links block home-block">
        <div class="small-12 columns links-content content-block">
            <?php if( have_rows('link_details', 'options') ): ?>
            <ul class="links-list">
            	<?php while( have_rows('link_details', 'options') ): the_row(); 
				$image = get_sub_field('image');
				$title = get_sub_field('title');
				$link = get_sub_field('link');
				?>
            	<li class="link-detail <?php echo $title; ?>">
                	<a href="<?php echo $link; ?>" target="_blank">                
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-<?php echo $title; ?> fa-stack-1x fa-inverse"></i>
                </span>
                     </a>           
                </li>
              	<?php endwhile; ?>
            </ul>
         	<?php endif; ?>   
        </div>
    </div>
</div>

<footer id="footer" role="contentinfo">
    <div class="row footer">
        <div class="small-12 columns  footer-content content-block">     	
            <p>&copy; <?php echo date("Y") ?> <?php bloginfo('blogname'); ?></p>
        	<P class="pandf">Website design and build by <a href="http://www.pynkandfluffy.com" title="Web site design and build by Pynk and Fluffy" target="_blank">Pynk and Fluffy</a></P>
        </div>
    </div>
    
</footer>

<?php wp_footer(); ?>

</body>

</html>
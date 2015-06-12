<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
    <meta charset="utf-8">

    <?php // Google Chrome Frame for IE ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title><?php wp_title(''); ?></title>

    <?php // mobile meta (hooray!) ?>
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <?php // icons & favicons ?>

	<link rel="apple-touch-icon" sizes="57x57" href="/wp-content/themes/heber-gaming/images/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/wp-content/themes/heber-gaming/images/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/wp-content/themes/heber-gaming/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/wp-content/themes/heber-gaming/images/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/wp-content/themes/heber-gaming/images/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/wp-content/themes/heber-gaming/images/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/wp-content/themes/heber-gaming/images/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/wp-content/themes/heber-gaming/images/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/wp-content/themes/heber-gaming/images/apple-touch-icon-180x180.png">
	<link rel="icon" type="image/png" href="/wp-content/themes/heber-gaming/images/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="/wp-content/themes/heber-gaming/images/android-chrome-192x192.png" sizes="192x192">
	<link rel="icon" type="image/png" href="/wp-content/themes/heber-gaming/images/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="/wp-content/themes/heber-gaming/images/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="/wp-content/themes/heber-gaming/images/android-chrome-manifest.json">
	<link rel="shortcut icon" href="/wp-content/themes/heber-gaming/images/favicon.ico">

	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="msapplication-TileImage" content="/wp-content/themes/heber-gaming/images/mstile-144x144.png">
	<meta name="msapplication-config" content="/wp-content/themes/heber-gaming/images/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    
    <?php the_field('font_link', 'options'); ?>
	
    <?php // wordpress head functions ?>
    <?php wp_head(); ?>
    <?php // end of wordpress head ?>

    <?php // drop Google Analytics Here ?>
    <?php // end analytics ?>
    
  	

</head>
<body <?php body_class(); ?>>
<a name="home"></a>
<header id="header" role="banner">	
    <div id="header-wrap" class="row" data-equalizer>
    	<div id="header-left" class="small-12 columns" data-equalizer-watch>
			<a href="/"><img src="<?php the_field('logo', 'options'); ?>" alt="<?php bloginfo('blogname'); ?>" class="left logo" /></a>
          	<h2 class="left strapline"><?php the_field('strapline', 'options'); ?></h2>
            <nav id="main-nav" role="navigation" class="right">
            	<?php if( have_rows('main_nav', 'options') ): ?>
            	<div data-magellan-expedition>
                  <dl>
                    
                      <!-- Temporary menu items for whitepaper/pressrelease -->
                      <!-- <dd><a href="/news">News</a></dd> -->
                      <!-- <dd><a href="/report">Report</a></dd> -->
                      <!-- End of temporary menu items for whitepaper/pressrelease -->

                      
                  <?php while( have_rows('main_nav', 'options') ): the_row(); 
				$label = get_sub_field('label');
				$destination = get_sub_field('destination');
				?>
                <?php if($destination == 'the-register' ) : ?>
                    <dd data-magellan-arrival="<?php echo $destination; ?>"><a href="/<?php echo $destination; ?>"><?php echo $label; ?></a></dd>
                    <?php else: ?>
                    <dd data-magellan-arrival="<?php echo $destination; ?>"><a href="/#<?php echo $destination; ?>"><?php echo $label; ?></a></dd>
                   <?php endif; ?>
                  <?php endwhile; ?>
                  </dl>
                </div>
         	<?php endif; ?>   
            </nav>
            <nav id="responsive-nav" role="navigation">
            	<?php if( have_rows('main_nav', 'options') ): ?>
                  <ul id="responsive-sub-nav" class="sub-nav">
                  <?php while( have_rows('main_nav', 'options') ): the_row(); 
				$label = get_sub_field('label');
				$destination = get_sub_field('destination');
				
				?>
    
                <?php if($destination == 'the-register' ) : ?>
        
                	<li><a href="/<?php echo $destination; ?>"><?php echo $label; ?></a></li>
                <?php else: ?>
           
                    <li><a href="#<?php echo $destination; ?>"><?php echo $label; ?></a></li>
                <?php endif; ?>
                  <?php endwhile; ?>         
                  </ul>
         	<?php endif; ?>   
            </nav>
            
        </div>
       
    </DIV>
</header>

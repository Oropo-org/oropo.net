<?php
/*
Template Name: Downloads
*/
include("phpFileTree/php_file_tree.php");
$DOWNLOADS_DIRNAME  = "downloads"; 
$BASE_PATH          = WP_CONTENT_DIR . "/" . $DOWNLOADS_DIRNAME; // i.e. /Users/benimmanuel/dev/src/oropo.net/wordpress/wp-content/uploads/downloads
$ARCHIVE_URI        = WP_CONTENT_URL . "/" . $DOWNLOADS_DIRNAME . "/" . "oropo-all-data.zip";
$BASE_URI           = get_site_url();
?>

<?php get_header(); ?>

<div id="main" class="wrapper">
    <div class="row">
        <div class="small-12 columns">
            <h1><?php the_title(); ?></h1>
            <p><a class="btn" href="<?php echo get_site_url(); ?>/guidelines-for-providing-data/">Instructions for providing your data to Oropo</a></p>
            <p>Downloads coming coon</p>
            
            <!-- <p><a class="btn" href="<?php echo $ARCHIVE_URI; ?>">Download full Oropo dataset</a></p> -->
            <!-- <p>To download individual company data, click on the folders below:</p> -->
            <!-- <?php echo php_file_tree($BASE_PATH, $BASE_URI, array('txt', 'csv')); ?> -->
        </div>
    </div>
</div>

<?php get_footer(); ?>

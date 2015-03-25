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

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<link href="<?php echo get_template_directory_uri(); ?>/phpFileTree/styles/default/default.css" rel="stylesheet" type="text/css" media="screen" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/phpFileTree/php_file_tree_jquery.js" type="text/javascript"></script>
    </head>

    <body>
        <p>To download full Oropo dataset, click <a href="<?php echo $ARCHIVE_URI; ?>">here</a></p>
        <p>To download individual company data, click on the folders below:</p>
        <?php echo php_file_tree($BASE_PATH, $BASE_URI, array('txt', 'csv')); ?>
    </body>
</html>

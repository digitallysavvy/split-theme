<?php
/*
 * Template Name: Penn State IST Innovation Challenges - Front Page
 * Description: A page template based on the Split Layout by codrops
 * http://tympanus.net/codrops/2013/10/25/split-layout/
 */

get_header(); 

//Set page IDs
$left_panel_page_id = get_ID_by_slug("left-panel");
$right_panel_page_id = get_ID_by_slug("right-panel");

//Get page contents
$left_panel_data = get_page($left_panel_page_id);
$right_panel_data = get_page($right_panel_page_id);

//Get the taglines
$tag_key = "tagline";
$left_panel_tagline = get_post_meta($left_panel_page_id, $tag_key, true);
$right_panel_tagline = get_post_meta($right_panel_page_id, $tag_key, true);

//Get the image
$image_key = "image_url";
$left_panel_image = get_post_meta($left_panel_page_id, $image_key, true);
$right_panel_image = get_post_meta($right_panel_page_id, $image_key, true);

//Make sure images aren't blank
if($left_panel_image == ""){
	$left_panel_image = get_template_directory_uri() + "/img/profile1.jpg";
}

if($right_panel_image == ""){
	$right_panel_image = get_template_directory_uri() + "/img/profile2.jpg";
}

?>
			<div id="splitlayout" class="splitlayout">
				<div class="intro">
					<div class="side side-left">
						<div class="intro-content">
						  <div class="profile"><img src="<?php echo $left_panel_image ?>" alt="<?php echo $left_panel_data->post_title ?>"></div>
							<h1><span><?php echo $left_panel_data->post_title ?></span><span><?php echo $left_panel_tagline ?></span></h1>
						</div>
						<div class="overlay"></div>
					</div>
					<div class="side side-right">
						<div class="intro-content">
							<div class="profile"><img src="<?php echo $right_panel_image ?>" alt="<?php echo $right_panel_data->post_title ?>"></div>
							<h1><span><?php echo $right_panel_data->post_title ?></span><span><?php echo $right_panel_tagline ?></span></h1>
						</div>
						<div class="overlay"></div>
					</div>
				</div><!-- /intro -->
				<div class="page page-right">
					<div class="page-inner">
						<?php echo apply_filters('the_content', $right_panel_data->post_content); ?>
					</div><!-- /page-inner -->
				</div><!-- /page-right -->
				<div class="page page-left">
					<div class="page-inner">
						<?php echo apply_filters('the_content', $left_panel_data->post_content); ?>
					</div><!-- /page-inner -->
				</div><!-- /page-left -->
				<a href="#" class="back back-right" title="back to intro">&rarr;</a>
				<a href="#" class="back back-left" title="back to intro">&larr;</a>
			</div><!-- /splitlayout -->
<?php get_footer(); ?>
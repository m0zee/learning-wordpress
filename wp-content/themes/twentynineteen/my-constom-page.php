<?php 
/*
Template Name: My custom page
*/

get_header();

$conditions = [
	'post_type' => 'post',
	'post_status' => 'publish',
	// 'author' => 2, // it will get only user id 2 record
	// 'author' => -2, // it will get except user id 2 record
	// 'author_name' => admin, // it will get only user nickname admin record
	// 'author__not_in' => [1], // it will get except user id array record
	// 'author__in' => [1], // it will get only user id array record
		
];
$query = new WP_Query($conditions);

if ($query->have_posts()) {
	while ($query->have_posts()) {
		$query->the_post();
		echo '<h3>'.get_the_title().'</h3>';
		echo get_the_content();
	}
	wp_reset_postdata();
}
else{
	echo 'no post available';
}

get_footer();
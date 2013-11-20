<?php


add_action('wp_head', 'add_googleanalytics');
function add_googleanalytics() { ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-21432914-19', 'rubygettinger.net');
  ga('send', 'pageview');

</script>

<?php }

// Add excerpts to Meteor Slides
add_post_type_support('slide', 'excerpt');
//----------------------------//

add_action( 'after_setup_theme', 'child_theme_setup' );

if ( !function_exists( 'child_theme_setup' ) ):
function child_theme_setup() {

	register_sidebar( array(
		'name' => __( 'Homepage Content Top', 'responsive' ),
		'id' => 'horizontal-1',
		'description' => __( 'Widget area under the homepage slider but before blog listing', 'responsive' ),
	) );

}
endif;

?>
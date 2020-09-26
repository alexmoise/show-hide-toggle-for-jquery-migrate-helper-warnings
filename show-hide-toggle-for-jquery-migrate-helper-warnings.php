/**
 * Plugin Name: Show/Hide toggle for Jquery Migrate Helper warnings
 * Plugin URI: https://github.com/alexmoise/show-hide-toggle-for-jquery-migrate-helper-warnings
 * GitHub Plugin URI: https://github.com/alexmoise/show-hide-toggle-for-jquery-migrate-helper-warnings
 * Description: Indeed these Jquery Migrate Helper plugin warnings have to stay in WP-Admin and work must be done to solve them; but having a two-screens-long list of warnings to scroll over at each screen is not helpful either, not to mention is not nice at all. So, let's use few lines of CSS and JS code injected in Admin to show and hide that list as needed.
 * Version: 1.0.0
 * Author: Alex Moise
 * Author URI: https://moise.pro
 */
 
// === Hide Jquery Migrate warnings but add a Show/Hide Warnings link to check them and work with them until all get resolved
// Add the jQuery function
add_action('in_admin_footer', 'moatbb_jquery_migrate_notices_js');
function moatbb_jquery_migrate_notices_js() {	
	echo '
	<script>
		jQuery(document).on("click", ".jquery-migrate-deprecation-notice > p", function(){ 
			jQuery(".jquery-migrate-deprecation-list").toggle("show");
		});
	</script>
	';
}
// Add the CSS styles 
add_action('admin_head', 'moatbb_jquery_migrate_notices_css');
function moatbb_jquery_migrate_notices_css() {
	echo '<style>
		.jquery-migrate-deprecation-notice > p:nth-child(2):after {
			content: " [Show/Hide warnings]";
			cursor: pointer;
			font-weight: bold;
			color: #0073aa;
			display: block;
		}
		.jquery-migrate-deprecation-notice ol.jquery-migrate-deprecation-list {
			display: none;
		}
	</style>';
}

?>

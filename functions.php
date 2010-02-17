<?php
function date_only() {
		global $id, $post, $authordata;
    $postmeta = '<div class="entry-meta">';
    $postmeta .= '<span class="entry-date"><abbr class="published" title="';
    $postmeta .= get_the_time(thematic_time_title()) . '">';
    $postmeta .= get_the_time(thematic_time_display());
    $postmeta .= '</abbr></span>';
    $postmeta .= "</div><!-- .entry-meta -->\n";
		return $postmeta;
	}

function childtheme_theme_link($themelink) {
	return $themelink . '. Designed by <a class="child-theme-link" href="http://www.mischivous.com/" title="Mischif" rel="designer">Mischif</a>';
	}

function remove_widgetized_area($content) {
	unset($content['1st Subsidiary Aside'],$content['2nd Subsidiary Aside'],$content['3rd Subsidiary Aside'],$content['Index Top'],$content['Index Insert'],$content['Index Bottom'],$content['Single Top'],$content['Single Insert'],$content['Single Bottom'],$content['Page Top'],$content['Page Bottom']);
	return $content;
	}

$preset_widgets = array (
	'primary-aside'  => array( 'search', 'links', 'archives', 'meta'),
	'secondary-aside'  => array( 'text' ));

add_filter('thematic_postheader_postmeta', 'date_only');
add_filter('thematic_theme_link', 'childtheme_theme_link');
add_filter('thematic_widgetized_areas', 'remove_widgetized_area');
if ( isset( $_GET['activated'] ) ) {
	update_option( 'sidebars_widgets', $preset_widgets );
	}
?>

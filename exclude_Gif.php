<?php
/**
 * Plugin Name: Exclude Gif
 * Description: A plugin that excludes Gif from being converted as Webp
 * Version: 1.0
 * Author: Ioanna Nikolakoudi
 */
 
 $file = file_get_contents($sourceImagePath); // Here is a filter to validate the image path 
 if ($file == 'image/gif'){ // If this is true make the optimization and return WP_Error
     $file = $process->get_optimization_data($optimization_level)->optimize();
	 $is_disabled = true;
	 return is_wp_error($is_disabled);
	 else { //else make the optimization and convert to webp 
		 $file = $process->get_optimization_data($optimization_level)->optimize();
		 $file = $webp->get_imagify_option( 'convert_to_webp' )
	 }
 }
 
function no_webp_for_gif( $response, $process, $file, $thumb_size, $optimization_level, $webp, $is_disabled ) { 

if ( ! $webp || $is_disabled || is_wp_error( $response ) ) { 

return $response; 

} 

if ( 'image/gif' !== $file->get_mime_type() ) { 

return $response; 

} 

return new \WP_Error( 'no_webp_for_gif', __( 'Webp version of gif is disabled by filter.' ) ); 

}
?>

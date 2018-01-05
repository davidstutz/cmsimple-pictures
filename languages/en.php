<?php
/**
 * @file en.php
 * @brief Language file en.
 * 
 * Pictures plugin languages/en.php
 * 
 * @author David Stutz
 * @version 1.0.0
 * @license GPLv3
 * @package pictures
 * @see http://sourceforge.net/projects/cmsimplepctrs/
 * 
 *  Copyright 2012 - 2018 David Stutz
 * 
 * 	This file is part of the pictures plugin for CMSimple.
 *
 *  The plugin is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The plugin is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 *  GNU General Public License for more details.
 *
 *  @see <http://www.gnu.org/licenses/>.
 */

	/* Plugin tab. */
	$plugin_tx["pictures"]['menu_main']="Manage galleries";
	
	/* Plugin titles. */
	$plugin_tx["pictures"]["title_plugin_text"]="Manage your galleries";
	$plugin_tx["pictures"]["title_new"]="New gallery";
	$plugin_tx["pictures"]["title_upload"]="Upload image";
	$plugin_tx["pictures"]["title_remove"]="Remove gallery";
	$plugin_tx["pictures"]["title_preview"]="Preview of image";
	$plugin_tx["pictures"]["title_delete"]="Delete image";
	$plugin_tx["pictures"]["title_edit"]="Edit gallery Configuration";
	
	/* Main plugin. */
	$plugin_tx["pictures"]["Gallery"]="Gallery";
	$plugin_tx["pictures"]["Successfully created new gallery."]="Successfully created new gallery.";
	$plugin_tx["pictures"]["Fill a valid name."]="Fill a valid name.";
	$plugin_tx["pictures"]["Save"]="Save";
	$plugin_tx["pictures"]["Name"]="Name";
	$plugin_tx["pictures"]["Successfully added image to gallery."]="Successfully added image to gallery.";
	$plugin_tx["pictures"]["No galleries found. Create a new one."]="No galleries found. Create a new one.";
	$plugin_tx["pictures"]["An error ocurred while uploading the file. Try again."]="An error ocurred while uploading the file. Try again.";
	$plugin_tx["pictures"]["The image does not match the requirements."]="The image does not match the requirements.";
	$plugin_tx["pictures"]["Select an image."]="Select an image.";
	$plugin_tx["pictures"]["Upload"]="Upload";
	$plugin_tx["pictures"]["Are you sure you want to delete the image?"]="Are you sure you want to delete the image?";
	$plugin_tx["pictures"]["Successfully deleted image."]="Successfully deleted image.";
	$plugin_tx["pictures"]["I'm sure."]="I'm sure.";
	$plugin_tx["pictures"]["Image"]="Image";
	$plugin_tx["pictures"]["Successfully saved changes."]="Successfully saved changes.";
	$plugin_tx["pictures"]["Description"]="Description";
	$plugin_tx["pictures"]["Are you sure you want to delete the gallery with all its images?"]="Are you sure you want to delete the gallery with all its images?";
	$plugin_tx["pictures"]["Successfully deleted gallery."]="Successfully deleted gallery.";
	$plugin_tx["pictures"]["of"]="of";
	$plugin_tx["pictures"]["Deleted thumbnail:"]="Deleted thumbnail:";
	$plugin_tx["pictures"]["Successfully regenerated thumbnails."]="Successfully regenerated thumbnails.";
	$plugin_tx["pictures"]["Successfully saved changes."]="Successfully saved changes.";
	$plugin_tx["pictures"]["Next"]="Next";
	$plugin_tx["pictures"]["Previous"]="Previous";
	$plugin_tx["pictures"]["See the help file for configuration options and examples."]="See the help file for configuration options and examples.";
	$plugin_tx["pictures"]["Supported image types:"]="Supported image types:";
	$plugin_tx["pictures"]["The galleryname should not contain any whitespace or special characters."]="The galleryname should not contain any whitespace or special characters.";
	$plugin_tx["pictures"]["Gallery not found."]="Gallery not found.";
	$plugin_tx["pictures"]["Upload image"]="Upload image";
	$plugin_tx["pictures"]["Lightbox driver is not supported."] = "Lightbox driver is not supported.";
	$plugin_tx["pictures"]["next"]="next";
	$plugin_tx["pictures"]["previous"]="previous";
	$plugin_tx["pictures"]["close"]="close";
	$plugin_tx["pictures"]["image {current} of {total}"]="image {current} of {total}";
	$plugin_tx["pictures"]["Delete the selected gallery."]="Delete the selected gallery.";
	$plugin_tx["pictures"]["Regenerate the thumbnails of the selected gallery."]="Regenerate the thumbnails of the selected gallery.";
	$plugin_tx["pictures"]["Edit the settings of the selected gallery."]="Edit the settings of the selected gallery.";
	$plugin_tx["pictures"]["Add a new gallery."]="Add a new gallery.";
	$plugin_tx["pictures"]["Upload a new image to this gallery."]="Upload a new image to this gallery.";
	$plugin_tx["pictures"]["Get a thumbnail preview of the image."]="Get a thumbnail preview of the image.";
	$plugin_tx["pictures"]["Delete the image."]="Delete the image.";
	$plugin_tx["pictures"]["Get a thumbnail preview of the image:"]="Get a thumbnail preview of the image:";
	$plugin_tx["pictures"]["Delete the image:"]="Delete the image:";
	$plugin_tx["pictures"]["Rename if filename already exists."]="Rename if filename already exists.";
    
	/* Configuration help. */
	$plugin_tx["pictures"]["cf_images_folder"]="The folder to store the galleries relative to CMSimple images folder. All subfolders will be handled as galleries. With '/' at the end. String.";
	$plugin_tx["pictures"]["cf_csv_filepath"]="The path where to store the CSV files for gallery configuration relative to CMSimple root. Without '/' at the end. String.";
	$plugin_tx["pictures"]["cf_images_extensions"]="All allowed extensions for image upload seperated by ','. Default: 'jpg,jpeg,png,gif'.";
	$plugin_tx["pictures"]["cf_csv_delimiter"]="Delimiter between cells in all CSV files. Single ASCII character.";
	$plugin_tx["pictures"]["cf_csv_enclosure"]="The enclosure used in the CSV files. Single ASCII character.";
	$plugin_tx["pictures"]["cf_images_thumbnail_width"]="Width of created thumbnails of a gallery. Unsigned integer.";
    $plugin_tx["pictures"]["cf_images_thumbnail_function"]="The function used to resize the original images to thumbnail size: 'imagecopyresampled' oder 'imagecopyresized'.";
    $plugin_tx["pictures"]["cf_images_thumbnail_compression"]="Define the compression rate for the thumbnails. For images_thumbnail_extension set to 'png' choose an integer betwwen 0 and 10 with 0 for no compression and 10 for highest compression. With <b>images_thumbnail_extension</b> set to 'jpeg' choose an integer between 0 and 100 with 0 for the lowest quality (highest compression) and 100 for the highest quality (no compression). Default for 'jpeg' would be 75.";
	$plugin_tx["pictures"]["cf_images_thumbnail_extension"]="The extension used for thumbnails. Currently only 'png' and 'jpeg' are supported. Note that depending on the chosen extension the compression rate need to be adjusted.";
    $plugin_tx["pictures"]["cf_images_sort_function"]="The function used for sorting the images. Currently supported: 'pictures_sort_asc', 'pictures_sort_desc'.";
    $plugin_tx["pictures"]["cf_galleries_sort_function"]="The function used for sorting the galleries. Currently supported: 'pictures_galleries_sort_asc', 'pictures_galleries_sort_desc'.";
	$plugin_tx["pictures"]["cf_table_columns"]="Number of columns for table dirver. Unsigned integer.";
	
	$plugin_tx["pictures"]["cf_coinslider_width"]="Width of the slider. Unsigned integer.";
	$plugin_tx["pictures"]["cf_coinslider_height"]="Height of the slider. Unsigned integer.";
	$plugin_tx["pictures"]["cf_coinslider_spw"]="Number of squares per width. Unsigned integer.";
	$plugin_tx["pictures"]["cf_coinslider_sph"]="Number of squares per height. Unsigned integer.";
	$plugin_tx["pictures"]["cf_coinslider_delay"]="The delay between images in ms. Unsigned integer.";
	$plugin_tx["pictures"]["cf_coinslider_s_delay"]="The delay between single squares in ms. Unsigned integer.";
	$plugin_tx["pictures"]["cf_coinslider_opacity"]="The opacity. A value between 0 and 1, e.g. 0.7.";
	$plugin_tx["pictures"]["cf_coinslider_title_speed"]="Speed of title appearance in ms. Unsigned integer. This option is not supported yet.";
	$plugin_tx["pictures"]["cf_coinslider_effect"]="The used effect. 'random', 'swirl', 'rain', 'straight' (or empty).";
	$plugin_tx["pictures"]["cf_coinslider_navigation"]="Show coinslider navigation (next, previous, navigation below the slider). 'true' or 'false'.";
	$plugin_tx["pictures"]["cf_coinslider_hover_pause"]="Pause on mouse over. 'true' or 'false'.";

    $plugin_tx["pictures"]["cf_bxslider_mode"] = "The mode of the slider. 'horizontal', 'vertical' or 'fade'.";
	$plugin_tx["pictures"]["cf_bxslider_speed"] = "The speed of the transitions in ms. Unsigned integer.";
	$plugin_tx["pictures"]["cf_bxslider_infinite_loop"] = "Use slider with an infinite loop (carousel). 'true' or 'false'.";
	$plugin_tx["pictures"]["cf_bxslider_controls"] = "Display controls (next and previous). 'true' or 'false'.";
	$plugin_tx["pictures"]["cf_bxslider_random"] = "Start slider with random image. 'true' or 'false'.";
	$plugin_tx["pictures"]["cf_bxslider_hide_controls_on_end"] = "Will hide next-button at the last image and previous button at the first one. 'true' or 'false'.";
	$plugin_tx["pictures"]["cf_bxslider_auto"] = "Enable/disable automatical slide. 'true' or 'false'.";
	$plugin_tx["pictures"]["cf_bxslider_auto_controls"] = "Enable/disable automatical slide controls (start, stop). 'true' or 'false'.";
	$plugin_tx["pictures"]["cf_bxslider_auto_delay"] = "Delay between images if auto-slide is enabled in ms. Unsigned integer.";
	$plugin_tx["pictures"]["cf_bxslider_auto_start_delay"] = "Delay for starting auto-slide in ms. Unsigned integer.";
	$plugin_tx["pictures"]["cf_bxslider_hover_pause"] = "Pause on mouse over. 'true' or 'false'.";
	$plugin_tx["pictures"]["cf_bxslider_auto_start"] = "Enable automatical start of auto-slide. If not the slider starts if the start button is pressed. 'true' or 'false'.";
	$plugin_tx["pictures"]["cf_bxslider_pager"] = "Enable/disable pager (navigation). 'true' or 'false'.";
	$plugin_tx["pictures"]["cf_bxslider_pager_location"] = "The location of the pager. 'top' or 'bottom'.";
	$plugin_tx["pictures"]["cf_bxslider_quantity"] = "The number of images shown at once. Unsigned integer.";
	$plugin_tx["pictures"]["cf_bxslider_quantity_move"] = "The number of slides to move at once. Unsigned integer.";
	$plugin_tx["pictures"]["cf_bxslider_original"] = "Whether to use the original images instead of the thumbnails in the slider. 'true' or 'false'.";
	$plugin_tx["pictures"]["cf_bxslider_lightbox"] = "Enable the usage of lightbox on the images in the slider. 'true' or 'false'.";
	
	$plugin_tx["pictures"]["cf_lightbox_driver"] = "The used lightbox driver. Available options: 'lightbox', 'colorbox'.";
	
	$plugin_tx["pictures"]["cf_innerfade_speed"] = "The speed of the transitions in ms. Unsigned integer.";
	$plugin_tx["pictures"]["cf_innerfade_timeout"] = "The delay before fading in the next image in ms. Unsigned integer.";
	$plugin_tx["pictures"]["cf_innerfade_type"] = "Type: 'sequence' or 'random'.";
	
    $plugin_tx["pictures"]["cf_bxslider4_slides_min"] = "The minimum number of slides in carousel. Unsigned integer.";
    $plugin_tx["pictures"]["cf_bxslider4_slides_max"] = "The maximum number of slides in carousel. Unsigned integer.";
	$plugin_tx["pictures"]["cf_bxslider4_slides_margin"] = "The margin between two slides when used as carousel. Unsigned integer.";
	$plugin_tx["pictures"]["cf_bxslider4_original"] = "Whether to use the original images instead of the thumbnails in the slider. 'true' or 'false'.";
    $plugin_tx["pictures"]["cf_bxslider4_lightbox"] = "Enable the usage of lightbox on the images in the slider. 'true' or 'false'.";
    $plugin_tx["pictures"]["cf_bxslider4_slides_move"] = "How many slides to move at once. Unsigned integer.";
    
    $plugin_tx["pictures"]["cf_lightbox_prettyphoto_theme"] = "The used theme when prettyphoto is selected as lightbox. 'pp_default', 'light_rounded', 'dark_rounded', 'light_square', 'dark_square', 'facebook'.";
?>

<?php
/**
 * @file config.php
 * @brief Plugin configuration.

 * Pictures plugin config/config.php
 * 
 * @author David Stutz
 * @license GPLv3
 * @package pictures
 * @see http://sourceforge.net/projects/cmsimplepctrs/
 * 
 *  Copyright 2012 - 2014 David Stutz
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

	/**
	 * Subfolder for galleries. Automatically created in the images folder defined by CMSimple config.
	 * @warning Without '/' at the end.
	 * @var	
	 */
	$plugin_cf["pictures"]["images_folder"] = "galleries";
	/**
	 * Filepath for storing gallery CSV.
	 * @var
	 */
	$plugin_cf["pictures"]["csv_filepath"] = "content/plugins/pictures";
	/**
	 * Acceptable image types. Seperated by ','.
	 * @var
	 */
	$plugin_cf["pictures"]["images_extensions"] = "jpg,jpeg,png,gif,PNG,JPEG,JPG,GIF";
	/**
	 * Width for thumbnails.
	 * @var
	 */
	$plugin_cf["pictures"]["images_thumbnail_width"] = "300";
	/**
	 * Extension type for created thumbnails.
	 * @var
	 */
	$plugin_cf["pictures"]["images_thumbnail_extension"] = "png";
	/**
	 * Comrpession(quality) rate for thumbnails.
	 * For png mode: between 0 and 10 with 0 no compression and 10 highest compression.
	 * For jpeg mode: between 0 and 100 with 0 lowest quality and 100 highest quality.
	 * @var
	 */
	$plugin_cf["pictures"]["images_thumbnail_compression"] = "9";
	/**
	 * Sort methods for sorting images.
	 * @var
	 */
	$plugin_cf["pictures"]["images_sort_function"] = "pictures_sort_asc";
    /**
     * Sort function for sorting galleries.
     * @var
     */
    $plugin_cf["pictures"]["galleries_sort_function"] = "pictures_galleries_sort_asc";
	/**
	 * Delimiter for CSV files.
	 * @var
	 */
	$plugin_cf["pictures"]["csv_delimiter"] = "#";
	/**
	 * Enclosure for CSV files.
	 * @var
	 */
	$plugin_cf["pictures"]["csv_enclosure"] = "\"";
	
	/**
	 * Table driver default values.
	 */
	/**
	 * Number of thumbnails in a row.
	 * @var
	 */
	$plugin_cf["pictures"]["table_columns"] = 3;

	/**
	 * Coinslider driver default values.
	 */
	/**
	 * Width of slider.
	 * @var
	 */
	$plugin_cf["pictures"]["coinslider_width"] = "300";
	/**
	 * Height of slider.
	 * @var
	 */
	$plugin_cf["pictures"]["coinslider_height"] = "225";
	/**
	 * Squares per width.
	 * @var
	 */
	$plugin_cf["pictures"]["coinslider_spw"] = "7";
	/**
	 * Squares per height.
	 * @var
	 */
	$plugin_cf["pictures"]["coinslider_sph"] = "5";
	/**
	 * Time between images.
	 * @var
	 */
	$plugin_cf["pictures"]["coinslider_delay"] = "3000";
	/**
	 * Time between squares in ms.
	 * @var
	 */
	$plugin_cf["pictures"]["coinslider_s_delay"] = "30";
	/**
	 * Opacity of title and navigation.
	 * @var
	 */
	$plugin_cf["pictures"]["coinslider_opacity"] = "0.7";
	/**
	 * Speed of title appearance.
	 * @var
	 */
	$plugin_cf["pictures"]["coinslider_title_speed"] = "500";
	/**
	 * Used effect: random, swirl, rain, straight (or empty).
	 * @var
	 */
	$plugin_cf["pictures"]["coinslider_effect"] = "";
	/**
	 * The navigation below the slider, next and previous buttons.
	 * @var
	 */
	$plugin_cf["pictures"]["coinslider_navigation"] = "true";
	/**
	 * Pause on hover.
	 * @var
	 */
	$plugin_cf["pictures"]["coinslider_hover_pause"] = "true";
	/**
	 * Text displayed for next button.
	 * @var
	 */
	$plugin_cf["pictures"]["coinslider_text_next"] = "vor";
	/**
	 * Text displayed for next button.
	 * @var
	 */
	$plugin_cf["pictures"]["coinslider_text_prev"] = "zurück";
	
	/**
	 * Bxslider driver default values.
	 */
	/**
	 * Used mode: 'horizontal', 'vertical', 'fade'.
	 * @var
	 */
	$plugin_cf["pictures"]["bxslider_mode"] = "horizontal";
	/**
	 * Speed in ms.
	 * @var
	 */
	$plugin_cf["pictures"]["bxslider_speed"] = "500";
	/**
	 * Defines infinite looping. 'true' or 'false'.
	 */
	$plugin_cf["pictures"]["bxslider_infinite_loop"] = "true";
	/**
	 * Display controls (previous and next).
	 * @var
	 */
	$plugin_cf["pictures"]["bxslider_controls"] = "false";
	/**
	 * Enable/disable random slide.
	 * @var
	 */
	$plugin_cf["pictures"]["bxslider_random"] = "false";
	/**
	 * Hide "next" image at the end and "previous" image at the start.
	 * @var
	 */
	$plugin_cf["pictures"]["bxslider_hide_controls_on_end"] = "false";
	/**
	 * Enable auto slide.
	 * @var
	 */
	$plugin_cf["pictures"]["bxslider_auto"] = "false";
	/**
	 * Show auto controls.
	 * @var
	 */
	$plugin_cf["pictures"]["bxslider_auto_controls"] = "false";
	/**
	 * Delay between images in ms.
	 * @var
	 */
	$plugin_cf["pictures"]["bxslider_auto_delay"] = "3000";
	/**
	 * Delay before starting the auto slider
	 * @var
	 */
	$plugin_cf["pictures"]["bxslider_auto_start_delay"] = "500";
	/**
	 * Pause on hover.
	 * @var
	 */
	$plugin_cf["pictures"]["bxslider_hover_pause"] = "true";
	/**
	 * Should slider start automatically or should be waited for start control to be pressed? 'true' or 'false'.
	 * @var
	 */
	$plugin_cf["pictures"]["bxslider_auto_start"] = "true";
	/**
	 * Enable page navigation.
	 * @var
	 */
	$plugin_cf["pictures"]["bxslider_pager"] = "true";
	/**
	 * Location of the pager. 'top' or 'bottom'.
	 * @var
	 */
	$plugin_cf["pictures"]["bxslider_pager_location"] = "bottom";
	/**
	 * Number of shown images at once.
	 * @var
	 */
	$plugin_cf["pictures"]["bxslider_quantity"] = 1;
	/**
	 * Number of slides to move at once.
	 * @var
	 */
	$plugin_cf["pictures"]["bxslider_quantity_move"] = 1;
	/**
	 * Show iamges on slider as link with lightbox.
	 * @var
	 */
	$plugin_cf["pictures"]["bxslider_lightbox"] = "true";
	/**
	 * Include bxslider in template. So bxslider sliders can be added in the template.
	 * @var
	 */
	$plugin_cf["pictures"]["bxslider_template"] = "true";
    /**
	 * Whether to use the original images instead of the thumbnails in the slider.
	 * @var
	 */
	$plugin_cf["pictures"]["bxslider_original"] = "false";
    
    /**
     * Bxslider 4 driver default values.
     */
    /**
     * Minimum number of slides in carousel.
     * @var
     */
    $plugin_cf["pictures"]["bxslider4_slides_min"] = 2;
    /**
     * Maximum number of slides in carousel.
     * @var
     */
    $plugin_cf["pictures"]["bxslider4_slides_max"] = 3;
    /**
     * Minimum number of slides in carousel.
     * @var
     */
    $plugin_cf["pictures"]["bxslider4_slides_margin"] = 10;
    /**
     * Whether to use the original images instead of the thumbnails in the slider.
     * @var
     */
    $plugin_cf["pictures"]["bxslider4_original"] = "false";
    /**
     * Show iamges on slider as link with lightbox.
     * @var
     */
    $plugin_cf["pictures"]["bxslider4_lightbox"] = "true";
    /**
     * How many slides to move at once.
     * @var
     */
    $plugin_cf["pictures"]["bxslider4_slides_move"] = 1;
    /**
     * Include bxslider4 in template. So bxslider4 sliders can be added in the template.
     * @var
     */
    $plugin_cf["pictures"]["bxslider4_template"] = "true";
   
	/**
	 * Lightboxes configuration and drivers.
	 */
	/**
	 * Used driver for lightbox. Avaiable: 'lightbox', 'shutter', 'prettyphoto'.
	 * @var
	 */
	$plugin_cf["pictures"]["lightbox_driver"] = "lightbox";
	/**
	 * Prettyphoto theme.
	 * Themes available: pp_default / light_rounded / dark_rounded / light_square / dark_square / facebook
	 * @var
	 */
	$plugin_cf["pictures"]["lightbox_prettyphoto_theme"] = "pp_default";
	
	/**
	 * Innerfade driver default values.
	 */
	/**
	 * Speed in ms.
	 * @var
	 */
	$plugin_cf["pictures"]["innerfade_speed"] = "2000";
	/**
	 * Timeout in ms.
	 * @var
	 */
	$plugin_cf["pictures"]["innerfade_timeout"] = "500";
	/**
	 * 'sequence' or 'random'.
	 * @var
	 */
	$plugin_cf["pictures"]["innerfade_type"] = "sequence";
	/**
	 * Include bxslider in template. So bxslider sldiers can be added in the template.
	 * @var
	 */
	$plugin_cf["pictures"]["innerfade_template"] = "true";
?>
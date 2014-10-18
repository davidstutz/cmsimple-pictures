<?php
/* utf8-marker = äöüß */
/**
 * @file index.php
 * @brief Containing Pictures main funcitonality.
 * 
 * Pictures plugin index.php
 * 
 * @author David Stutz
 * @license GPLv3
 * @package pictures
 * @see http://sourceforge.net/projects/cmsimplepctrs/
 * 
 *  Copyright 2012 - 2014 David Stutz
 * 
 *  This file is part of the pictures plugin for CMSimple.
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

if (!defined('CMSIMPLE_XH_VERSION')) {
    header('HTTP/1.0 403 Forbidden');
    exit;
}
 
/* Require classes. */
if (!class_exists('Pictures')) require_once dirname(__FILE__) . '/pictures.php';

if (Pictures::$cf['bxslider_template'] == 'true')
{
	Pictures::include_bxslider();
}

if (Pictures::$cf['bxslider4_template'] == 'true')
{
    Pictures::include_bxslider4();
}

if (Pictures::$cf['innerfade_template'] == 'true')
{
	Pictures::include_innerfade();
}

/**
 * Pictures plugin main function.
 * 
 * @param <string> gallery
 * @param <string> driver
 */
function pictures($gallery, $driver = 'table', $option = FALSE)
{
	/* CHeck directories. */
	Pictures::check_dir();
	
	if (!Pictures_Gallery::gallery_exists($gallery))
	{
		return Pictures::$tx["Gallery not found."];
	}
	
	$gallery = new Pictures_Gallery($gallery);
	
	/* Get driver. */
	$driver = 'pictures_driver_' . $driver;
	if (!function_exists($driver))
	{
		$driver = 'pictures_driver_table';
	}
	
	/* Ouput driver. */
	return '<div class="pictures-frontend">' . $driver($gallery, $option) . '</div>';
}

/**
 * Driver for simple table.
 * 
 * @uses Pictures::include_script
 * @uses include_JQuery
 * @uses include_JQueryPlugin
 * @global pth
 * @global hjs
 * @param <string> galelry
 * @return <string> output
 */
function pictures_driver_table($gallery, $option)
{
	global $hjs,$pth;
	
	$config = $gallery->merged_config();
	
	/**
	 * Init lightbox driver.
	 */
	$include = 'include_' . strtolower($config['lightbox_driver']);
	if (!method_exists('Pictures', $include))
	{
		return Pictures::$tx["Lightbox driver is not supported."];
	}
	
	Pictures::$include($gallery->name());
	
	/* Get images. */
	$imgs = $gallery->images($gallery);
	
	$o = '<table id="pictures-table-driver-' . $gallery->name() . '" class="pictures-table-driver pictures-' . $gallery->name() . '"><tr>';
	$row = (int)$config['table_columns'] != 0 ? (int)$config['table_columns'] : Pictures::$cf['table_columns'];
	$i = 1;
	foreach ($imgs as $img)
	{
		$o .= '<td><a class="lightbox-' . $gallery->name() . '" rel="prettyPhoto[' . $gallery->name() .']" href="' . $img->file() . '"><img src="' . $img->get_thumb() . '" /></a></td>';
		
		if ($i % $row == 0)
		{
			$o .= '</tr><tr>';
		}
		$i += 1;
	}
	$o .= '</tr></table>';
	
	return $o;
}

/**
 * List driver
 * 
 * @uses Pictures::include_script
 * @uses include_JQuery
 * @uses include_JQueryPlugin
 * @global pth
 * @global hjs
 * @param <string> gallery
 * @return <string> output
 */
function pictures_driver_list($gallery, $option)
{
	global $pth,$hjs;
	
	$config = $gallery->merged_config();
	
	/**
	 * Init lightbox driver.
	 */
	$include = 'include_' . strtolower($config['lightbox_driver']);
	if (!method_exists('Pictures', $include))
	{
		return Pictures::$tx["Lightbox driver is not supported."];
	}
	
	Pictures::$include($gallery->name());
	
	$imgs = $gallery->images();
	
	$o = '<ul id="pictures-list-driver-' . $gallery->name() . '" class="pictures-list-driver pictures-' . $gallery->name() . '">';
	foreach ($imgs as $img)
	{
		$o .= '<li><a class="lightbox-' . $gallery->name() . '" rel="prettyPhoto[' . $gallery->name() .']" href="' . $img->file() . '"><img src="' . $img->get_thumb() . '" /></a></li>';
	}
	$o .= '</ul>';
	
	return $o;
}

/**
 * Coinslider driver.
 * 
 * @uses Pictures::include_script
 * @uses include_JQuery
 * @uses include_JQueryPlugin
 * @global pth
 * @global hjs
 * @param <string> gallery
 */
function pictures_driver_coinslider($gallery, $option)
{
	global $hjs;
	
	$config = $gallery->merged_config();
	
	Pictures::include_coinslider();
	
	$hjs .= '<script type="text/javascript">
				$(document).ready(function(){
					$("#pictures-coinslider-driver-' . $gallery->name() . '").coinslider({
						width: ' . $config['coinslider_width'] . ',
						height: ' . $config["coinslider_height"] . ',
						spw: ' . $config["coinslider_spw"] . ',
						sph: ' . $config["coinslider_sph"] . ',
						delay: ' . $config["coinslider_delay"] . ',
						sDelay: ' . $config["coinslider_s_delay"] . ',
						opacity: ' . $config["coinslider_opacity"] . ',
						titleSpeed: ' . $config["coinslider_title_speed"] . ',
						effect: "' . $config["coinslider_effect"] . '",
						navigation: ' . $config["coinslider_navigation"] . ',
						hoverPause: ' . $config["coinslider_hover_pause"] . ',
						nextText: "' . $config["coinslider_text_next"] . '",
						prevText: "' . $config["coinslider_text_prev"] . '"
					});
				});
			</script>';
	
	$imgs = $gallery->images();
	
	$o = '<div class="pictures-coinslider-driver pictures-' . $gallery->name() . '" id="pictures-coinslider-driver-' . $gallery->name() . '">';
	foreach ($imgs as $img)
	{
		$o .= '<a href="' . $img->file() . '" target="_blank"><img src="' . $img->get_thumb() . '" /></a>';
	}
	$o .= '</div>';
	
	return $o;
}

/**
 * Bxslider driver.
 * 
 * @param <string> gallery
 */
function pictures_driver_bxslider($gallery, $option)
{
	global $hjs;
	
	$config = $gallery->merged_config();
	
	/**
	 * Init some lightbox if this option is enabled.
	 */
	if (isset($config['bxslider_lightbox'])
		AND $config['bxslider_lightbox'] == 'true')
	{
		$include = 'include_' . strtolower($config['lightbox_driver']);
		if (!method_exists('Pictures', $include))
		{
			return Pictures::$tx["Lightbox driver is not supported."];
		}
		
		Pictures::$include($gallery->name());
	}
	
	Pictures::include_bxslider();
	
	$imgs = $gallery->images($gallery);
	
	$width = (int)$config['images_thumbnail_width'];
	$num = (int)$config['bxslider_quantity_move'];
	
    $script = '<script type="text/javascript">
                $(document).ready(function(){
                    $("#pictures-bxslider-driver-' . $gallery->name() . '").bxSlider({
                        mode: "' . $config['bxslider_mode'] . '",
                        speed: ' . $config['bxslider_speed'] . ',
                        infiniteLoop: ' . strtolower($config['bxslider_infinite_loop']) . ',
                        controls: ' . strtolower($config['bxslider_controls']) . ',
                        prevImage: "' . Pictures::$plugin . 'images/bxslider/previous.png",
                        nextImage: "' . Pictures::$plugin . 'images/bxslider/next.png",
                        startImage: "' . Pictures::$plugin . 'images/bxslider/start.png",
                        stopImage: "' . Pictures::$plugin . 'images/bxslider/stop.png",
                        startingSlide: 0,
                        randomStart: ' . strtolower($config['bxslider_random']) . ',
                        hideControlOnEnd: ' . strtolower($config['bxslider_hide_controls_on_end']) . ',
                        auto: ' . strtolower($config['bxslider_auto']) . ',
                        autoControls: ' . strtolower($config['bxslider_auto_controls']) . ',
                        pause: ' . strtolower($config['bxslider_auto_delay']) . ',
                        autoDelay: ' . $config['bxslider_auto_start_delay'] . ',
                        autoHover: ' . strtolower($config['bxslider_hover_pause']) . ',
                        autoStart: ' . $config['bxslider_auto_start'] . ',
                        pager: ' . strtolower($config['bxslider_pager']) . ',
                        pagerLocation: "' . $config['bxslider_pager_location'] . '",
                        displaySlideQty: ' . $config['bxslider_quantity'] . ',
                        moveSlideQty: ' . $config['bxslider_quantity_move'] . ',
                        wrapperClass: "pictures-bxslider-driver"
                    });
                });
            </script>';
    
	$o = '<ul class="pictures-bxslider-driver pictures-' . $gallery->name() . '" id="pictures-bxslider-driver-' . $gallery->name() . '" style="padding:0;margin:0;">';
	foreach ($imgs as $img)
	{
        $o .= '<li>';
        
		$img_tag = '<img style="width:' . $width . 'px" src="' . ($config['bxslider_original'] == 'true' ? $img->file() : $img->get_thumb()) . '" />';
		
		/**
		 * Only add a link if lightbox is enabled on bxslider.
		 */
		if ($config['bxslider_lightbox'] == 'true')
		{
			$o .= '<a class="lightbox-' . $gallery->name() . '" rel="prettyPhoto[' . $gallery->name() .']" href="' .  $img->file() . '">' . $img_tag . '</a>';
		}
		else
		{
			$o .= $img_tag;
		}
        
        $o .= '</li>';
	}
	$o .= '</ul>';
	
	if ($option == TRUE)
	{
		$o .= $script;
	}
	else
	{
		$hjs .= $script;
	}
	
	return $o;
}

/**
 * Bxslider4 driver.
 * 
 * @param <string> gallery
 */
function pictures_driver_bxslider4($gallery, $option)
{
    global $hjs;
    
    $config = $gallery->merged_config();
    
    /**
     * Init some lightbox if this option is enabled.
     */
    if (isset($config['bxslider4_lightbox'])
        AND $config['bxslider4_lightbox'] == 'true')
    {
        $include = 'include_' . strtolower($config['lightbox_driver']);
        if (!method_exists('Pictures', $include))
        {
            return Pictures::$tx["Lightbox driver is not supported."];
        }
        
        Pictures::$include($gallery->name());
    }
    
    Pictures::include_bxslider4();
    
    $imgs = $gallery->images($gallery);
    
    $width = (int)$config['images_thumbnail_width'];
    $num = (int)$config['bxslider_quantity_move'];
    
    $script = '<script type="text/javascript">
                $(document).ready(function(){
                    $("#pictures-bxslider4-driver-' . $gallery->name() . '").bxSlider({
                        slideWidth: ' . $width . ',
                        minSlides: ' . $config['bxslider4_slides_min'] . ',
                        maxSlides: ' . $config['bxslider4_slides_max'] . ',
                        slideMargin: ' . $config['bxslider4_slides_margin'] . ',
                        moveSlides: ' . $config['bxslider4_slides_move'] . ',
                        pager: false,
                        nextText: "<img src=\"./plugins/pictures/images/bxslider/next.png\">",
                        prevText: "<img src=\"./plugins/pictures/images/bxslider/previous.png\">"
                    });
                });
            </script>';
    
    $o = '<div class="pictures-bxslider4-driver pictures-' . $gallery->name() . '" id="pictures-bxslider4-driver-' . $gallery->name() . '">';
    foreach ($imgs as $img)
    {
        $img_tag = '<img style="width:' . $width . 'px" src="' . ($config['bxslider4_original'] == 'true' ? $img->file() : $img->get_thumb()) . '" />';
        
        /**
         * Only add a link if lightbox is enabled on bxslider4.
         */
        if ($config['bxslider4_lightbox'] == 'true')
        {
            $o .= '<a class="lightbox-' . $gallery->name() . '" rel="prettyPhoto[' . $gallery->name() .']" href="' .  $img->file() . '">' . $img_tag . '</a>';
        }
        else
        {
            $o .= $img_tag;
        }
    }
    $o .= '</div><div class="pictures-bxslider4-driver-controls" id="pictures-bxslider4-driver-controls-' . $gallery->name() . '"></div>';
    
    if ($option == TRUE)
    {
        $o .= $script;
    }
    else
    {
        $hjs .= $script;
    }
    
    return $o;
}

/**
 * Innerfade driver.
 * 
 * @param <string> gallery
 */
function pictures_driver_innerfade($gallery, $option)
{
	global $hjs;
	
	$config = $gallery->merged_config();
	
	Pictures::include_innerfade();
		
	$script = '<script type="text/javascript">
				$(document).ready(function(){
					$("#pictures-innerfade-driver-' . $gallery->name() . '").innerfade({
						speed: ' . strtolower($config['innerfade_speed']) . ',
						timeout: ' . strtolower($config['innerfade_timeout']) . ',
						type: "' . strtolower($config['innerfade_type']) . '"
					});
				});
			</script>';
	
	$imgs = $gallery->images($gallery);
	
	$width = (int)$config['images_thumbnail_width'];
	
	$o = '<ul class="pictures-innerfade-driver pictures-' . $gallery->name() . '" id="pictures-innerfade-driver-' . $gallery->name() . '">';
	foreach ($imgs as $img)
	{
		$o .= '<img style="width:' . $width . 'px" src="' . $img->get_thumb() . '" />';
	}
	$o .= '</ul>';
	
	if ($option === TRUE)
	{
		$o .= $script;
	}
	else
	{
		$hjs .= $script;
	}
	
	return $o;
}
?>
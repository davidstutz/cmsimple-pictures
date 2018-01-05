<?php
/* utf8-marker = äöüß */
/**
 * @file pictures.php
 * @brief Containing Pictures class, including Pictures_Image, Pictures_Gallery, initializes Pictures plugin.
 *
 * Pictures plugin index.php
 * 
 * @author David Stutz
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
/*! \mainpage CMSimple Pictures Plugin
 *
 * This plugin is designed to simplify the management and frontend presentation of image galleries. The plugin allows uploaded images to different categories and displaying them using different so called "drivers". Currently supported Drivers are:<br />
 * 
 * <ul>
 * <li>table</li>
 * <li>list</li>
 * <li>coinslider</li>
 * <li>bxslider</li>
 * </ul>
 * 
 * This is  a generated documentation of the plugin.
 * 
 * \mainpage
 */

/* Require CSV. */
if (!class_exists('CSV', FALSE)) require_once dirname(__FILE__) . '/helper/csv.php';
  
/* Require gallery class. */
if (!class_exists('Pictures_Gallery', FALSE)) require_once dirname(__FILE__) . '/pictures/gallery.php';

/* Require image class. */
if (!class_exists('Pictures_Image', FALSE)) require_once dirname(__FILE__) . '/pictures/image.php';

/* Init. */
Pictures::init();

if (!function_exists('page_url'))
{
	/**
	 * Detect root.
	 * 
	 * @return <string> root
	 */
	function page_url()
	{
		$url = 'http';
		if (isset($_SERVER["HTTPS"])
			AND $_SERVER["HTTPS"] == "on")
		{
			$url .= "s";
		}
		$url .= "://";
		if ($_SERVER["SERVER_PORT"] != "80")
		{
			$url .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
		}
		else
		{
			$url .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
		}
		return $url;
	}
}

/**
 * @class Pictures
 *
 * Main pictures class for general functionality.
 * 
 * @author David Stutz
 * @package pictures
 */
class Pictures {
	
	/**
	 * @const
	 *
	 * Version.
	 */
	const VERSION = '1.0.3';
	
	/**
	 * @public
	 * @static
	 * Plugin config.
	 */
	public static $cf;
	
	/**
	 * @public
	 * @static
	 * Plugin translation.
	 */
	public static $tx;
	
	/** 
	 * @public
	 * @static
	 * Images path.
	 */
	public static $images;
	
	/** 
	 * @public
	 * @static
	 * Images used in admin.
	 */
	public static $images_admin;
	
	/**
	 * @public
	 * @static
	 * CSV path.
	 */
	public static $csv;
	
	/**
	 * @public
	 * @static
	 * Plugin path.
	 */
	public static $plugin;
	
	/**
	 * @public
	 * @static
	 * 
	 * Init plugin.
	 * 
	 * Sets plugin configuration, translation and used paths.
	 * 
	 * @global pth
	 * @global plugin
	 * @global plugin_cf
	 * @global plugin_tx
	 */
	public static function init()
	{
		/* Globals. */
		global $pth,$plugin,$plugin_cf,$plugin_tx;
		$plugin = basename(dirname(__FILE__),"/");
		
		Pictures::$cf = $plugin_cf[$plugin];
		Pictures::$tx = $plugin_tx[$plugin];
		Pictures::$images = $pth['folder']['images'] . Pictures::$cf['images_folder'] . '/';
		Pictures::$images_admin = $pth['folder']['plugins'] . $plugin . '/images/';
		Pictures::$csv = $pth['folder']['base'] . Pictures::$cf['csv_filepath'] . '/';
		Pictures::$plugin = $pth['folder']['plugins'] . $plugin . '/';
	}
	
	/**
	 * @public
	 * @static
	 * Get plugin's name.
	 * 
	 * @return <string> name
	 */
	public static function name()
	{
		return "Pictures Plugin";
	}
	
	/**
	 * @public
	 * @static
	 * Get plugin's release date.
	 * 
	 * @return <string> release date.
	 */
	public static function release_date() 
	{
	   return "January 6th 2018";
	}
	
	/**
	 * @public
	 * @static
	 * Get plugin's author.
	 * 
	 * @return <string> author.
	 */
	public static function author()
	{
		return "David Stutz";
	}
	
	/**
	 * @public
	 * @static
	 * Get plugin's website.
	 * 
	 * @return <string> website link
	 */
	public static function website()
	{
		return '<a target="_blank" href="http://davidstutz.de/cmsimple/?Pictures" target="_blank">Project Webpage</a>';
	}
	
        /**
         * @public
         * @static
         * Get plugin's GitHub repo.
         * 
         * @return <string> GitHub link
         */
        public static function github()
        {
		return '<a target="_blank" href="https://github.com/davidstutz/cmsimple-pictures" target="_blank">GitHub Project</a>';
        }
        
	/**
	 * @public
	 * @static
	 * Get plugin's description.
	 * 
	 * @return <string> description
	 */
	public static function description()
	{
		return 'This is a simple gallery plugin.';
	}
	
	/**
	 * @public
	 * @static
	 * Get plugin's legal.
	 * 
	 * @return <string> legal
	 */
	public static function legal()
	{
		return 'This plugin is published under the GNU Public License version 3. See <a target="_blank" href="http://www.gnu.org/licenses/">Licenses</a> for more information.';
	}
	
	/**
	 * @public
	 * @static
	 * Checks gallery dir.
	 * 
	 * @param <string> gallery
	 * @return <array> images
	 */
	public static function check_dir()
	{
		if (!is_dir(Pictures::$images))
		{
			/* Mkdir recursive. */
			mkdir(Pictures::$images, 0777, TRUE);
		}
		
		chmod(Pictures::$images, 0777);
		
		if (!is_dir(Pictures::$csv))
		{
			/* Mkdir recursive. */
			mkdir(Pictures::$csv, 0777, TRUE);
		}
		
		chmod(Pictures::$csv, 0777);
		
		$dir = dir(Pictures::$csv);
		if (is_object($dir))
		{
			while (FALSE !== ($file = $dir->read()))
			{
				chmod(Pictures::$csv . '/' . $file, 0777);
			}
		}
	}
	
	/**
	 * @public
	 * @static
	 * Checks for valid images.
	 * 
	 * @param <string> file
	 * @return <boolean> valid
	 */
	public static function valid_image($file)
	{
		return Pictures::type($file)? TRUE : FALSE;
	}
	
	/**
	 * @public
	 * @static
	 * Detects type of image.
	 * 
	 * @param <string>  image
	 * @return <string> image
	 */
	public static function type($image)
	{
		$types = explode(",", preg_replace('#[[:space:]]#','', Pictures::$cf['images_extensions']));
		
		foreach ($types as $type)
		{
			if (preg_match('#\.' . $type . '$#', $image))
			{
				return $type;
			}
		}
		
		return FALSE;
	}
	
	/**
	 * @public
	 * @static
	 * Will get the compression rate for thumbnails.
	 * 
	 * @return <int> comrepssion rate
	 */
	public static function thumbnail_compression()
	{
		return (String)Pictures::$cf['images_thumbnail_compression'];
	}
	
	/**
	 * @public
	 * @static
	 * Include a script once.
	 * 
	 * @param <string> name
	 * @param <string> path relative to this plugin
	 * @global hjs
	 */
	public static function include_script($name, $path)
	{
		global $hjs, $plugin_cf;
			
		static $scripts_included = array();
		if (FALSE === array_search($name, $scripts_included))
		{
			$hjs .= '<script src="' . Pictures::$plugin . $path . '" type="text/javascript"></script>';
			$scripts_included[] = $name;
		}
	}
	
	/**
	 * @public
	 * @static
	 * Include a style once.
	 * 
	 * @param <string> name
	 * @param <string> path relative to this plugin
	 * @global hjs
	 */
	public static function include_style($name, $path, $media = 'screen')
	{
		global $hjs, $plugin_cf;
			
		static $styles_included = array();
		if (FALSE === array_search($name, $styles_included))
		{
			$hjs .= '<link rel="stylesheet" href="' . Pictures::$plugin . $path . '" media="' . $media . '" type="text/css" />';
			$styles_included[] = $name;
		}
	}
	
	/**
	 * @public
	 * @static
	 * Includes lightbox.
	 * 
	 * @param <string> gallery name
	 * @global hjs
	 * @global pth
	 */
	public static function include_lightbox($name)
	{
		global $hjs, $pth, $plugin_cf;
		
		static $lightbox_included = array();
		
		if (file_exists($pth['folder']['plugins'] . 'jquery/jquery.inc.php'))
		{
			include_once($pth['folder']['plugins'] . 'jquery/jquery.inc.php'); 
		}
		
		/* Use JQuery plugin if possible. */
		if(!function_exists('include_jQuery'))
		{
			Pictures::include_script('jquery', 'jquery/js/jquery-1.7.1.min.js');
			Pictures::include_script('lightbox', 'lightbox/js/jquery.lightbox-0.5.pack.js');
		}
		else
		{
			include_jQuery();
			include_jQueryPlugin('lightbox', Pictures::$plugin . 'lightbox/js/jquery.lightbox-0.5.pack.js');
		}

		Pictures::include_style('lightbox', 'lightbox/css/jquery.lightbox-0.5.css');

		$img_path = Pictures::$plugin . 'lightbox/images/';
		
		
		if (FALSE === array_search($name, $lightbox_included))
		{
			$hjs .= '<script type="text/javascript">
						$(document).ready(function(){
							$(".pictures-' . $name . ' a.lightbox-' . $name . '").lightBox({
								imageLoading: "' . $img_path . 'lightbox-ico-loading.gif",
								imageBtnClose: "' . $img_path . 'lightbox-btn-close.gif",
								imageBtnPrev: "' . $img_path . 'lightbox-btn-prev.gif",
								imageBtnNext: "' . $img_path . 'lightbox-btn-next.gif",
								txtImage: "' . Pictures::$tx["Image"] . '",
								txtOf: "' . Pictures::$tx["of"] . '",
							});
						});
					</script>';
				
			$lightbox_included[] = $name;
		}
	}

	/**
	 * @public
	 * @static
	 * Includes colorbox.
	 * 
	 * @param <string> gallery name
	 * @global hjs
	 * @global pth
	 */
	public static function include_shutter($name)
	{
		global $hjs, $pth, $plugin_cf;
		
		/**
		 * Shutter must be initialized after including shutter.
		 * Then only a call to shutterReloaded.Init('lb', directory) is needed ot get all working.
		 */
		static $shutter_included = FALSE;
		
		if (file_exists($pth['folder']['plugins'] . 'jquery/jquery.inc.php'))
		{
			include_once($pth['folder']['plugins'] . 'jquery/jquery.inc.php'); 
		}
		
		/* Use JQuery plugin if possible. */
		if(!function_exists('include_jQuery'))
		{
			Pictures::include_script('jquery', 'jquery/js/jquery-1.7.1.min.js');
			Pictures::include_script('colorbox', 'shutter/js/shutter.js');
		}
		else
		{
			include_jQuery();
			include_jQueryPlugin('colorbox', Pictures::$plugin . 'shutter/js/shutter.js');
		}
		
		Pictures::include_style('colorbox', 'shutter/css/shutter.css');
		
		if (!$shutter_included)
		{
			$hjs .= '<script type="text/javascript">
						$(document).ready(function(){
							shutterReloaded.Init(\'lightbox-' . $name . '\', \'' . Pictures::$plugin . '/shutter/images/\');
						});
					</script>';
						
			$shutter_included = TRUE;
		}
	}
						
	/**
	 * @public
	 * @static
	 * Includes prettyphoto.
	 * 
	 * @param <string> gallery name
	 * @global hjs
	 * @global pth
	 */
	public static function include_prettyphoto($name)
	{
		global $hjs, $pth, $plugin_cf;
		
		static $prettyphoto_included = array();
		
		if (file_exists($pth['folder']['plugins'] . 'jquery/jquery.inc.php'))
		{
			include_once($pth['folder']['plugins'] . 'jquery/jquery.inc.php'); 
		}
		
		if(!function_exists('include_jQuery'))
		{
			Pictures::include_script('jquery', 'jquery/js/jquery-1.7.1.min.js');
			Pictures::include_script('prettyphoto', 'prettyphoto/js/jquery.prettyPhoto.js');
		}
		else
		{
			include_jQuery();
			include_jQueryPlugin('prettyphoto', Pictures::$plugin . 'prettyphoto/js/jquery.prettyPhoto.js');
		}
		
		Pictures::include_style('prettyphoto', 'prettyphoto/css/prettyPhoto.css');
		
		$gallery = new Pictures_Gallery($name);
		$config = $gallery->config();
		
		$img_path = Pictures::$plugin . 'lightbox/images/';
		
		if (FALSE === array_search($name, $prettyphoto_included))
		{
			$hjs .= '<script type="text/javascript">
						$(document).ready(function(){
							$(".pictures-' . $gallery->name() . ' a[rel^=\'prettyPhoto\']").prettyPhoto({
								social_tools: false,
								theme: "' . $config['lightbox_prettyphoto_theme'] . '",
							});
						});
					</script>';
					
			$prettyphoto_included[] = $name;
		}
	}
	
	/**
	 * @public
	 * @static
	 * Include coinslider.
	 * 
	 * @global hjs
	 * @global pth
	 */
	public static function include_coinslider()
	{
		global $pth, $plugin_cf;
		
		if (file_exists($pth['folder']['plugins'] . 'jquery/jquery.inc.php'))
		{
			include_once($pth['folder']['plugins'] . 'jquery/jquery.inc.php'); 
		}
		
		/* Use JQuery plugin if possible. */
		if(!function_exists('include_jQuery'))
		{
			Pictures::include_script('jquery', 'jquery/js/jquery-1.7.1.min.js');
			Pictures::include_script('coinslider', 'coinslider/js/jquery.coin-slider.js');
		}
		else
		{
			include_jQuery();
			include_jQueryPlugin('coinslider', Pictures::$plugin . 'coinslider/js/jquery.coin-slider.js');
		}
		
		Pictures::include_style('bxslider', 'coinslider/css/jquery.coin-slider.css');
	}
	
	/**
	 * @public
	 * @static
	 * Include bxslider.
	 * 
	 * @global hjs
	 * @global pth
	 */
	public static function include_bxslider()
	{
		global $pth, $plugin_cf;
		
		if (file_exists($pth['folder']['plugins'] . 'jquery/jquery.inc.php'))
		{
			include_once($pth['folder']['plugins'] . 'jquery/jquery.inc.php'); 
		}
		
		/* Use JQuery plugin if possible. */
		if(!function_exists('include_jQuery'))
		{
			/* Include JQuery and Bxslider. */
			Pictures::include_script('jquery', 'jquery/js/jquery-1.7.1.min.js');
			Pictures::include_script('easing', 'bxslider/js/jquery.easing.js');
			Pictures::include_script('bxslider', 'bxslider/js/jquery.bxSlider.min.js');
		}
		else
		{
			include_jQuery();
			include_jQueryPlugin('easing', Pictures::$plugin . 'bxslider/js/jquery.easing.js');
			include_jQueryPlugin('bxslider', Pictures::$plugin . 'bxslider/js/jquery.bxSlider.min.js');
		}
	}
	
    /**
     * @public
     * @static
     * Include bxslider.
     * 
     * @global hjs
     * @global pth
     */
    public static function include_bxslider4()
    {
        global $pth, $plugin_cf;
        
        if (file_exists($pth['folder']['plugins'] . 'jquery/jquery.inc.php'))
        {
            include_once($pth['folder']['plugins'] . 'jquery/jquery.inc.php'); 
        }
        
        /* Use JQuery plugin if possible. */
        if(!function_exists('include_jQuery'))
        {
            /* Include JQuery and Bxslider. */
            Pictures::include_script('jquery', 'jquery/js/jquery-1.7.1.min.js');
            Pictures::include_script('easing', 'bxslider/js/jquery.easing.js');
            Pictures::include_script('bxslider4', 'bxslider/js/jquery.bxSlider-4.0.min.js');
        }
        else
        {
            include_jQuery();
            include_jQueryPlugin('easing', Pictures::$plugin . 'bxslider/js/jquery.easing.js');
            include_jQueryPlugin('bxslider4', Pictures::$plugin . 'bxslider/js/jquery.bxSlider-4.0.min.js');
        }
    }
    
	/**
	 * @public
	 * @static
	 * Include innerfade.
	 * 
	 * @global hjs
	 * @global pth
	 */
	public static function include_innerfade()
	{
		global $pth, $plugin_cf;
		
		if (file_exists($pth['folder']['plugins'] . 'jquery/jquery.inc.php'))
		{
			include_once($pth['folder']['plugins'] . 'jquery/jquery.inc.php'); 
		}
		
		/* Use JQuery plugin if possible. */
		if(!function_exists('include_jQuery'))
		{
			/* Include JQuery and Bxslider. */
			Pictures::include_script('jquery', 'jquery/js/jquery-1.7.1.min.js');
			Pictures::include_script('innerfade', 'innerfade/js/jquery.innerfade.js');
		}
		else
		{
			include_jQuery();
			include_jQueryPlugin('innerfade', Pictures::$plugin . 'innerfade/js/jquery.innerfade.js');
		}
	}
}

if (!function_exists('pictures_sort_asc'))
{
	/**
	 * Function to order pictures asc by their names.
	 * 
	 * @param picture a
	 * @param picture b
	 * 
	 * @return <int> order
	 */
	function pictures_sort_asc($a, $b)
	{
	    if ($a->name() == $b->name())
		{
	        return 0;
	    }
	    return strcmp($a->name(), $b->name()) < 0 ? -1 : 1;
	}
}

if (!function_exists('pictures_sort_desc'))
{
	/**
	 * Function to order pictures desc by their names.
	 * 
	 * @param picture a
	 * @param picture b
	 * 
	 * @return <int> order
	 */
	function pictures_sort_desc($a, $b)
	{
	    if ($a->name() == $b->name())
		{
	        return 0;
	    }
	    return strcmp($a->name(), $b->name()) < 0 ? 1 : -1;
	}
}

if (!function_exists('pictures_galleries_sort_asc'))
{
    /**
     * Function to order galleries asc by their names.
     * 
     * @param gallery a
     * @param gallery b
     * 
     * @return <int> order
     */
    function pictures_galleries_sort_asc($a, $b)
    {
        if ($a->name() == $b->name())
        {
            return 0;
        }
        return strcmp($a->name(), $b->name()) < 0 ? -1 : 1;
    }
}

if (!function_exists('pictures_galleries_sort_desc'))
{
    /**
     * Function to order galleries desc by their names.
     * 
     * @param gallery a
     * @param gallery b
     * 
     * @return <int> order
     */
    function pictures_galleries_sort_desc($a, $b)
    {
        if ($a->name() == $b->name())
        {
            return 0;
        }
        return strcmp($a->name(), $b->name()) < 0 ? 1 : -1;
    }
}
?>
<?php
/* utf8-marker = äöüß */
/**
 * @file gallery.php
 * @brief Containing Pictures_Gallery class.
 *
 * Pictures plugin gallery.php
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
 * @class Pictures_Gallery
 * Gallery class.
 * 
 * @author David Stutz
 * @package reservations
 */
class Pictures_Gallery {
	
	/**
	 * @private
	 * Gallery name.
	 */
	private $_name;
	
	/**
	 * @private
	 * Images.
	 */
	private $_images = FALSE;
	
	/**
	 * @private
	 * Config values.
	 * 
	 * NOTE: Order of the keys is improtant for backward compatibility.
	 */
	private $_values = array(
		'images_thumbnail_width' => '',
		'table_columns' => '',
		'coinslider_width' => '',
		'coinslider_height' => '',
		'coinslider_spw' => '',
		'coinslider_sph' => '',
		'coinslider_delay' => '',
		'coinslider_s_delay' => '',
		'coinslider_opacity' => '',
		'coinslider_title_speed' => '',
		'coinslider_effect' => '',
		'coinslider_navigation' => '',
		'coinslider_hover_pause' => '',
		'bxslider_mode' => '',
		'bxslider_speed' => '',
		'bxslider_infinite_loop' => '',
		'bxslider_controls' => '',
		'bxslider_random' => '',
		'bxslider_hide_controls_on_end' => '',
		'bxslider_auto' => '',
		'bxslider_auto_controls' => '',
		'bxslider_auto_delay' => '',
		'bxslider_auto_start_delay' => '',
		'bxslider_hover_pause' => '',
		'bxslider_auto_start' => '',
		'bxslider_pager' => '',
		'bxslider_pager_location' => '',
		'bxslider_quantity' => '',
		'bxslider_quantity_move' => '',
		'lightbox_driver' => '',
		'bxslider_lightbox' => '',
		'lightbox_prettyphoto_theme' => '',
		'innerfade_speed' => '',
		'innerfade_timeout' => '',
		'innerfade_type' => '',
		'bxslider_original' => '',
		'bxslider4_slides_min' => '',
		'bxslider4_slides_max' => '',
		'bxslider4_slides_margin' => '',
		'bxslider4_original' => '',
		'bxslider4_lightbox' => '',
		'bxslider4_slides_move' => '',
	);
	
	/**
	 * @public
	 * Construct.
	 * 
	 * @param <string> name
	 */
	public function __construct($name)
	{
		$this->_name = preg_replace("#[\t\n\r]#", '', str_replace(' ', '-', trim($name)));
		
		if (!is_dir(Pictures::$images . $this->_name))
		{
			mkdir(Pictures::$images . $this->_name);
		}
	
		if (!is_dir(Pictures::$images . $this->_name . '/thumbs/'))
		{
			mkdir(Pictures::$images . $this->_name . '/thumbs/');
		}
		
		if (!file_exists(Pictures::$csv . $this->_name . '.cf'))
		{
			$this->edit(array());
			$this->edit($this->config());
		}
	}
	
	/**
	 * @public
	 * @static
	 * Gets all galleries.
	 * 
	 * @return <array> galleries
	 */
	public static function galleries()
	{
		$dir = dir(Pictures::$images);
		
		$galleries = array();
		while (FALSE !== ($file = $dir->read()))
		{
			if ($file == '.' OR $file == '..' OR empty($file))
			{
				continue;
			}
			
			if (is_dir(Pictures::$images . $file))
			{
				$galleries[] = new Pictures_Gallery($file);
			}
		}
		
        usort($galleries, Pictures::$cf['galleries_sort_function']);
        
		return $galleries;
	}
	
	/**
	 * @public
	 * @static
	 * Checks whether gallery with givne name exists.
	 * 
	 * @param <string> name
	 * @return <boolean> exists
	 */
	public static function gallery_exists($name)
	{
		return is_dir(Pictures::$images . $name) AND file_exists(Pictures::$csv . $name . '.cf');
	}
	
	/**
	 * @public
	 * Get name.
	 * 
	 * @return <string> name
	 */
	public function name()
	{
		return $this->_name;
	}
	
	/**
	 * @public
	 * Get all images of gallery.
	 * 
	 * @return <array> images
	 */
	public function images()
	{
		$dir = dir(Pictures::$images . $this->_name);
		
		if (FALSE !== $dir)
		{
			$images = array();
			while (FALSE !== ($file = $dir->read()))
			{
				if (is_dir(Pictures::$images . $this->_name . '/' . $file))
				{
					continue;
				}
				
				if(Pictures::valid_image(Pictures::$images.$this->_name.'/'.$file))
				{
					$images[] = new Pictures_Image($this, $file);
				}
			}
			
			usort($images, Pictures::$cf['images_sort_function']);
			
			return $images;
		}
	}
	
	/**
	 * @public
	 * Edit or add galleries.
	 * 
	 * @param <array> properties
	 */
	public function edit($array)	{
		CSV::write(array($array), Pictures::$csv . $this->_name . '.cf', Pictures::$cf['csv_delimiter'], Pictures::$cf['csv_enclosure']);
	}
	
	/**
	 * @public
	 * Get gallery config.
	 * 
	 * @return <array> properties
	 */
	public function config()
	{
		$array = CSV::parse(Pictures::$csv . $this->_name . '.cf', Pictures::$cf['csv_delimiter'], Pictures::$cf['csv_enclosure']);
		
		/* Take first row. */
		$array = array_shift($array);
		
		$i = 0;
		foreach ($this->_values as $key => &$content)
		{
			if (empty($array[$i]))
			{
				$content = Pictures::$cf[$key];
			}
			else
			{
				$content = $array[$i];
			}
			$i++;
		}
		
		return $this->_values;
	}
	
	/**
	 * @public
	 * Get config merged with global pictures config.
	 * 
	 * @return	array 	config
	 */
	public function merged_config()
	{
		$config = Pictures::$cf;
		$gallery_config = $this->config();
		
		foreach ($config as $key => $value)
		{
			if (isset($gallery_config[$key]) AND !empty($gallery_config[$key]))
			{
				$config[$key] = $gallery_config[$key];
			}
		}
		
		return $config;
	}
	
	/**
	 * @public
	 * Delete gallery.
	 */
	public function remove()
	{
		/* Remove gallery with all images and thumbnails. */
		if (is_dir(Pictures::$images . $this->_name))
		{
			/* Delete thumbnails. */
			if (is_dir(Pictures::$images . $this->_name . '/thumbs/'))
			{
				$dir = dir(Pictures::$images . $this->_name . '/thumbs/');
				if (FALSE !== $dir)
				{
					while(FALSE !== ($file = $dir->read()))
					{
						if (is_dir(Pictures::$images . $this->_name . '/thumbs/' . $file))
							continue;
						
						@unlink(Pictures::$images . $this->_name . '/thumbs/' . $file);
					}
				}
				
				/* Remove thumbs directory. */
				@rmdir(Pictures::$images . $this->_name . '/thumbs/');
			}
			
			/* Delete images. */
			$dir = dir(Pictures::$images . $this->_name);
			while(FALSE !== ($file = $dir->read()))
			{
				if (is_dir(Pictures::$images . $this->_name . '/' . $file))
					continue;
				
				@unlink(Pictures::$images . $this->_name . '/' . $file);
			}
			
			/* Remove directory. */
			rmdir(Pictures::$images . $this->_name);
		}
		
		/* Remove CSV. */
		chmod(Pictures::$csv . $this->_name . '.cf', 0777);
		@unlink(Pictures::$csv . $this->_name . '.cf');
	}
}
?>
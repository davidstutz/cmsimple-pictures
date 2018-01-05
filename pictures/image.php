<?php
/* utf8-marker = äöüß */
/**
 * @file image.php
 * @brief Containing Pictures_Image class.
 * 
 * Pictures plugin image.php
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

/**
 * @class Pictures_Image
 * Image class.
 * 
 * @author David Stutz
 * @package reservations
 */
class Pictures_Image {
	
	/**
	 * @private
	 * File.
	 */
	private $_file;
	
	/**
	 * @private
	 * Gallery.
	 */
	private $_gallery;
	
	/**
	 * @private
	 * Thumb.
	 */
	private $_thumb;
	
	/**
	 * @private
	 * Name.
	 */
	private $_name;
	
	/**
	 * @public
	 * Construct.
	 */
	public function __construct($gallery, $file)
	{
		$this->_name = $file;
		$this->_gallery = $gallery;
		$this->_file = Pictures::$images.$gallery->name().'/'.$file;
		
		$type = Pictures::type($file);
		
		$extension = strtolower(Pictures::$cf['images_thumbnail_extension']);
		if ($extension != 'jpg' AND $extension != 'jpeg')
		{
			$extension = 'png';
		}
		
		$thumb = 'thumb_' . preg_replace('#\.' . $type . '$#','', $file) . '.' . $extension;
		
		$this->_thumb = Pictures::$images.$gallery->name() . '/thumbs/' . $thumb;
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
	 * Get fiel.
	 * 
	 * @param <string> filepath
	 */
	public function file()
	{
		return $this->_file;
	}
	
	/**
	 * @public
	 * Delete image.
	 * 
	 * @param <string> gallery
	 * @param <string> file
	 * @return <boolean> success
	 */
	public function delete()
	{
		/* Delete image. */
		if (file_exists($this->_file))
		{
			unlink($this->_file);
		}
		
		/* Delete thumbnail. */
		$this->delete_thumb();
		
		return TRUE;
	}
	
	/**
	 * @public
	 * Get thumbnail.
	 */
	public function get_thumb()
	{
		if (!file_exists($this->_thumb))
		{
			$array = $this->_gallery->config();
			$this->_create_thumb((int)(empty($array['images_thumbnail_width'])? Pictures::$cf["images_thumbnail_width"] : $array['images_thumbnail_width']));
		}
		
		return $this->_thumb;
	}
	
	/**
	 * @private
	 * Create thumbnail of image.
	 * 
	 * @param <int> new width
	 */
	private function _create_thumb($new_width)
	{
		/* Get image dependant on type. */
		$image = FALSE;
		if (preg_match('/[.](jpe?g?|jfif|tiff)$/', strtolower($this->_file)))
		{
			$image = imagecreatefromjpeg($this->_file);
		}
		else if (preg_match('/[.](gif)$/', strtolower($this->_file)))
		{
			$image = imagecreatefromgif($this->_file);
		}
		else if (preg_match('/[.](png)$/', strtolower($this->_file)))
		{
			$image = imagecreatefrompng($this->_file);
		}
		
		if ($image !== FALSE)
		{
			/* Calculate new height. */
			$width = imagesx($image);
			$height = imagesy($image);
			$new_height = round(($height * ($new_width / $width)), 0);
			$thumbnail = imagecreatetruecolor($new_width, $new_height);
            
            if (strtolower(Pictures::$cf['images_thumbnail_function']) == 'imagecopyresampled') {
                imagecopyresampled($thumbnail, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            }
			else {
                imagecopyresized($thumbnail, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            }
            
			if (strtolower(Pictures::$cf['images_thumbnail_extension']) == 'jpeg' OR strtolower(Pictures::$cf['images_thumbnail_extension']) == 'jpg')
			{
				imagejpeg($thumbnail, $this->_thumb, Pictures::thumbnail_compression());
			}
			else
			{
				imagepng($thumbnail, $this->_thumb, Pictures::thumbnail_compression());
			}
		}
	}
	
	/**
	 * @public
	 * Deletes thumbnail of image.
	 */
	public function delete_thumb()
	{
		if (file_exists($this->_thumb))
		{
			chmod($this->_thumb, 0777);
			unlink($this->_thumb);
		}
	}
}
?>
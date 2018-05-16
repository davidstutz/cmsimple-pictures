<?php
/* utf8-marker = äöüß */
/**
 * @file admin.php
 * @brief Backend script.
 * 
 * Pictures plugin admin.php
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

/* Require classes. */
if (!class_exists('Pictures', FALSE)) require_once dirname(__FILE__) . '/pictures.php';

if (function_exists('XH_registerStandardPluginMenuItems'))
{
    XH_registerStandardPluginMenuItems(true);
}

if ((function_exists('XH_wantsPluginAdministration') AND XH_wantsPluginAdministration('pictures')) OR isset($pictures))
{
	/* Make CMSimple global saccessable. */
	global $sn;

	$f = "pictures";
	
	initvar('admin');

	$o .= print_plugin_admin('ON');
	
	/* Plugin info. */
	if ($admin === '') 
	{
		$o .= '<p class="pictures-head"><b>' . Pictures::name() . '</b></p>'
				. '<div class="pictures-notice">'
				. 'Version: <b>' . Pictures::VERSION . '</b><br />'
				. '</div>'
				. '<div class="pictures-help">'
				. 'Released: ' . Pictures::release_date() . '<br />'
				. 'Author: ' . Pictures::author() . '<br />'
				. 'Website: ' . Pictures::website() . '<br />'
				. 'GitHub Repository/Releases: ' . Pictures::github() . '<br />'
				. Pictures::donate() . '<br />'
				. Pictures::description() . '<br />'
				. Pictures::legal() . '<br />'
				. '</div>';
	}
	
	/* Show pictures menu. */
	if ($admin == 'plugin_main')
	{
		Pictures::check_dir();
		$galleries = Pictures_Gallery::galleries();
		$img_path = $pth['folder']['plugins'] . $plugin . "/images/";
		
		/**
		 * Get action and try whether help is enabled or not.
		 * Both in $_GET.
		 */
		$action = isset($_GET['action']) ? $_GET['action'] : 'plugin_text';
		$help = isset($_GET['help']) ? TRUE : FALSE;
		
		$o .= '<p class="pictures-head"><b>' . Pictures::$tx["title_" . $action] . '</b><span style="float: right;"><a href="' . page_url() . '&help"><img src="' . Pictures::$images_admin . '/help.png" /></a></span></p>'
			. '<p>';
		
		/* Set aciton to new gallery if no galleries were found. */
		if (empty($galleries))
		{
			$action = 'new';
			if (!isset($_POST['submit']))
			{
				$o .= '<div class="pictures-error">' . Pictures::$tx["No galleries found. Create a new one."] . '</div>';
			}
		}
		
		/* Get gallery. */
		$gallery = isset($_GET['gallery']) ? new Pictures_Gallery($_GET['gallery']) : (!empty($galleries)? $galleries[0] : FALSE);
		$img = isset($_GET['img']) ? new Pictures_Image($gallery, $_GET['img']) : FALSE;
		
		if (isset($_POST['delete']))
		{
			/* Delete picture. */
			$img->delete();
			$o .= '<div class="pictures-success">' . Pictures::$tx["Successfully deleted image."] . '</div>';
		}
		
		/* Show all galleries. */
		if ($action == 'plugin_text')
		{
			if ($help)
			{
				$o .= '<table class="pictures-help" width="100%">'
					. '<tr>'
					. '<td width="5%"><img src="' . Pictures::$plugin . 'images/gallery/delete.png" /></td>'
					. '<td>' . Pictures::$tx["Delete the selected gallery."] . '</td>'
					. '</tr>'
					. '<tr>'
					. '<td width="5%"><img src="' . Pictures::$plugin . 'images/gallery/regenerate.png" /></td>'
					. '<td>' . Pictures::$tx["Regenerate the thumbnails of the selected gallery."] . '</td>'
					. '</tr>'
					. '<tr>'
					. '<td width="5%"><img src="' . Pictures::$plugin . 'images/gallery/settings.png" /></td>'
					. '<td>' . Pictures::$tx["Edit the settings of the selected gallery."] . '</td>'
					. '</tr>'
					. '<tr>'
					. '<td width="10%"><img src="' . Pictures::$plugin . 'images/gallery/add.png" /></td>'
					. '<td width="90%">' . Pictures::$tx["Add a new gallery."] . '</td>'
					. '</tr>'
					. '<tr>'
					. '<td><img src="' . Pictures::$plugin . 'images/image/add.png" /></td>'
					. '<td>' . Pictures::$tx["Upload a new image to this gallery."] . '</td>'
					. '</tr>'
					. '<tr>'
					. '<td><img src="' . Pictures::$plugin . 'images/image/preview.png" /></td>'
					. '<td>' . Pictures::$tx["Get a thumbnail preview of the image."] . '</td>'
					. '</tr>'
					. '<tr>'
					. '<td><img src="' . Pictures::$plugin . 'images/image/delete.png" /></td>'
					. '<td>' . Pictures::$tx["Delete the image."] . '</td>'
					. '</tr>'
					. '</table>';
			}

			/* Get pictures. */
			$imgs = $gallery->images();
			
			/* Regenerate thumbnails. */
			if (isset($_GET['thumbnails']))
			{
				foreach ($imgs as $i)
				{
					$i->delete_thumb();
					
					$o .= '<div class="pictures-success">' . Pictures::$tx["Deleted thumbnail:"] . ' ' . $i->name() . '</div>';
				}
				
				$o .= '<div class="pictures-success">' . Pictures::$tx["Successfully regenerated thumbnails."] . '</div>';
			}
			
			/* Menu. */
			$o .= '<table class="edit pictures-table">'
				. '<tr>'
				. '<td><b>' . Pictures::$tx["Gallery"] . ': </b>'
				. '<select class="pictures-select" onChange="location.href=this.options[this.selectedIndex].value">'
				. '<option value="' . $sn . '?&pictures&admin=plugin_main&action=plugin_text&gallery=' . $gallery->name() . '">' . $gallery->name() . '</option>';
			foreach ($galleries as $g)
			{
				if ($g == $gallery)
					continue;
				
				$o .= '<option value="' . $sn . '?&pictures&admin=plugin_main&action=plugin_text&gallery=' . $g->name() . '">' . $g->name() . '</option>';
			}
			$o .= '</select></td>'
				. '<td width="5%"><a class="pl_tooltip" href="' . $sn . '?&pictures&admin=plugin_main&gallery=' . $gallery->name() . '&action=remove">'
					. '<img src="' . Pictures::$images_admin . 'gallery/delete.png" />'
					. '<span>' . Pictures::$tx["Delete the selected gallery."] . '</span>'
				. '</a></td>'
				. '<td width="5%"><a class="pl_tooltip" href="' . $sn . '?&pictures&admin=plugin_main&gallery=' . $gallery->name() . '&thumbnails&action=plugin_text">'
					. '<img src="' . Pictures::$images_admin . 'gallery/regenerate.png" />'
					. '<span>' . Pictures::$tx["Regenerate the thumbnails of the selected gallery."] . '</span></a></td>'
				. '<td width="5%"><a class="pl_tooltip" href="' . $sn . '?&pictures&admin=plugin_main&gallery=' . $gallery->name() . '&action=edit">'
					. '<img src="' . Pictures::$images_admin . 'gallery/settings.png" />'
					. '<span>' . Pictures::$tx["Edit the settings of the selected gallery."] . '</span>'
				. '</a></td>'
				. '<td width="5%"><a class="pl_tooltip" href="' . $sn . '?&pictures&admin=plugin_main&action=new">'
					. '<img src="' . Pictures::$images_admin . 'gallery/add.png" />'
					. '<span>' . Pictures::$tx["Add a new gallery."] . '</span>'
				. '</a></td>'
				. '</tr>'
				. '</table>';
								
			/* List pictures of gallery. */
			$o .= '<table class="edit pictures-table">'
				. '<thead>'
				. '<td width="5%"><a class="pl_tooltip" href="' . $sn . '?&pictures&admin=plugin_main&gallery=' . $gallery->name() . '&action=upload">'
					. '<img src="' . Pictures::$images_admin . 'image/add.png" />'
					. '<span>' . Pictures::$tx["Upload a new image to this gallery."] . '</span>'
				. '</a></td>'
				. '<td width="5%"></td>'
				. '<td>' . Pictures::$tx["Image"] . '</td>'
				. '</thead>';
			
			/* Print iamge information. */
			foreach ($imgs as $i)
			{
				$o .= '<tr>'
					. '<td><a class="pl_tooltip" href="' . $sn . '?&pictures&admin=plugin_main&gallery=' . $gallery->name() . '&action=preview&img=' . $i->name() . '">'
						. '<img src="' . Pictures::$images_admin . 'image/preview.png" />'
						. '<span>' . Pictures::$tx["Get a thumbnail preview of the image:"] . ' ' . $i->name() . '</span>'
					. '</a></td>'
					. '<td><a class="pl_tooltip" href="' . $sn . '?&pictures&admin=plugin_main&gallery=' . $gallery->name() . '&action=delete&img=' . $i->name() . '">'
						. '<img src="' . Pictures::$images_admin . 'image/delete.png" />'
						. '<span>' . Pictures::$tx["Delete the image:"] . ' ' . $i->name() . '</span>'
					. '</a></td>'
					. '<td>' . $i->name() . '</td>'
					. '</tr>';
			}

			$o .= '</table>';
		}
		
		/* Create new gallery */
		if ($action == 'new')
		{
			/* POST? */
			if (isset($_POST['submit']))
			{
				/* Add gallery. */
				if (!empty($_POST['name'])
					AND !preg_match('#[/\.<>?%*:"]#', $_POST['name']))
				{
					$gallery = new Pictures_Gallery($_POST['name']);
					$gallery->edit(array(
						'images_thumbnail_width' => Pictures::$cf['images_thumbnail_width'], // First column: thumbnail width.
						'table_columns' => Pictures::$cf['table_columns'], // Second columns table columns for table driver.
						'coinslider_width' => Pictures::$cf['coinslider_width'],
						'coinslider_height' => Pictures::$cf['coinslider_height'],
						'coinslider_spw' => Pictures::$cf['coinslider_spw'],
						'coinslider_sph' => Pictures::$cf['coinslider_sph'],
						'coinslider_delay' => Pictures::$cf['coinslider_delay'],
						'coinslider_s_delay' => Pictures::$cf['coinslider_s_delay'],
						'coinslider_opacity' => Pictures::$cf['coinslider_opacity'],
						'coinslider_title_speed' => Pictures::$cf['coinslider_title_speed'],
						'coinslider_effect' => Pictures::$cf['coinslider_effect'],
						'coinslider_navigation' => Pictures::$cf['coinslider_navigation'],
						'coinslider_hover_pause' => Pictures::$cf['coinslider_hover_pause'],
						'bxslider_mode' => Pictures::$cf['bxslider_mode'],
						'bxslider_speed' => Pictures::$cf['bxslider_speed'],
						'bxslider_infinite_loop' => Pictures::$cf['bxslider_infinite_loop'],
						'bxslider_controls' => Pictures::$cf['bxslider_controls'],
						'bxslider_random' => Pictures::$cf['bxslider_random'],
						'bxslider_hide_controls_on_end' => Pictures::$cf['bxslider_hide_controls_on_end'],
						'bxslider_auto' => Pictures::$cf['bxslider_auto'],
						'bxslider_auto_controls' => Pictures::$cf['bxslider_auto_controls'],
						'bxslider_auto_delay' => Pictures::$cf['bxslider_auto_delay'],
						'bxslider_auto_start_delay' => Pictures::$cf['bxslider_auto_start_delay'],
						'bxslider_hover_pause' => Pictures::$cf['bxslider_hover_pause'],
						'bxslider_auto_start' => Pictures::$cf['bxslider_auto_start'],
						'bxslider_pager' => Pictures::$cf['bxslider_pager'],
						'bxslider_pager_location' => Pictures::$cf['bxslider_pager_location'],
						'bxslider_quantity' => Pictures::$cf['bxslider_quantity'],
						'bxslider_quantity_move' => Pictures::$cf['bxslider_quantity_move'],
						'lightbox_driver' => Pictures::$cf['lightbox_driver'],
						'bxslider_lightbox' => Pictures::$cf['bxslider_lightbox'],
						'lightbox_prettyphoto_theme' => Pictures::$cf['lightbox_prettyphoto_theme'],
						'innerfade_speed' => Pictures::$cf['innerfade_speed'],
						'innerfade_timeout' => Pictures::$cf['innerfade_timeout'],
						'innerfade_type' => Pictures::$cf['innerfade_type'],
						'bxslider_original' => Pictures::$cf['bxslider_original'],
						'bxslider4_slides_min' => Pictures::$cf['bxslider4_slides_min'],
                        'bxslider4_slides_max' => Pictures::$cf['bxslider4_slides_max'],
                        'bxslider4_slides_margin' => Pictures::$cf['bxslider4_slides_margin'],
                        'bxslider4_original' => Pictures::$cf['bxslider4_original'],
                        'bxslider4_lightbox' => Pictures::$cf['bxslider4_lightbox'],
                        'bxslider4_slides_move' => Pictures::$cf['bxslider4_slides_move'],
					));
					$o .= '<div class="pictures-success">' . Pictures::$tx["Successfully created new gallery."] . '</div>';
				}
				else
				{
					$o .= '<div class="pictures-error">' . Pictures::$tx["Fill a valid name."] . '</div>';
				}
			}

			$o .= '<div class="pictures-help">' . Pictures::$tx["The galleryname should not contain any whitespace or special characters."] . '</div>';	

			$o .= '<form action="' . $sn . '?&pictures&admin=plugin_main&action=new" method="POST">'
				. '<table class="edit pictures-table">'
				. '<tr>'
				. '<td>' . Pictures::$tx["Name"] . '</td>'
				. '<td><input type="text" name="name" /></td>'
				. '</tr>'
				. '<tr>'
				. '<td colspan="2"><button type="submit" name="submit" class="pictures-submit submit">' . Pictures::$tx["Save"] . '</button></td>'
				. '</tr>'
				. '</table>'
				. '</form>';
		}
		
		/* Edit gallery configuration. */
		if ($action == 'edit'
			AND $gallery !== FALSE)
		{
			/* POST? */
			if (isset($_POST['submit']))
			{
				$gallery->edit(array(
					'images_thumbnail_width' => $_POST['images_thumbnail_width'], // First column: thumbnail width.
					'table_columns' => $_POST['table_columns'], // Second columns table columns for table driver.
					'coinslider_width' => $_POST['coinslider_width'],
					'coinslider_height' => $_POST['coinslider_height'],
					'coinslider_spw' => $_POST['coinslider_spw'],
					'coinslider_sph' => $_POST['coinslider_sph'],
					'coinslider_delay' => $_POST['coinslider_delay'],
					'coinslider_s_delay' => $_POST['coinslider_s_delay'],
					'coinslider_opacity' => $_POST['coinslider_opacity'],
					'coinslider_title_speed' => $_POST['coinslider_title_speed'],
					'coinslider_effect' => $_POST['coinslider_effect'],
					'coinslider_navigation' => $_POST['coinslider_navigation'],
					'coinslider_hover_pause' => $_POST['coinslider_hover_pause'],
					'bxslider_mode' => $_POST['bxslider_mode'],
					'bxslider_speed' => $_POST['bxslider_speed'],
					'bxslider_infinite_loop' => $_POST['bxslider_infinite_loop'],
					'bxslider_controls' => $_POST['bxslider_controls'],
					'bxslider_random' => $_POST['bxslider_random'],
					'bxslider_hide_controls_on_end' => $_POST['bxslider_hide_controls_on_end'],
					'bxslider_auto' => $_POST['bxslider_auto'],
					'bxslider_auto_controls' => $_POST['bxslider_auto_controls'],
					'bxslider_auto_delay' => $_POST['bxslider_auto_delay'],
					'bxslider_auto_start_delay' => $_POST['bxslider_auto_start_delay'],
					'bxslider_hover_pause' => $_POST['bxslider_hover_pause'],
					'bxslider_auto_start' => $_POST['bxslider_auto_start'],
					'bxslider_pager' => $_POST['bxslider_pager'],
					'bxslider_pager_location' => $_POST['bxslider_pager_location'],
					'bxslider_quantity' => $_POST['bxslider_quantity'],
					'bxslider_quantity_move' => $_POST['bxslider_quantity_move'],
					'lightbox_driver' => $_POST['lightbox_driver'],
					'bxslider_lightbox' => $_POST['bxslider_lightbox'],
					'lightbox_prettyphoto_theme' => $_POST['lightbox_prettyphoto_theme'],
					'innerfade_speed' => $_POST['innerfade_speed'],
					'innerfade_timeout' => $_POST['innerfade_timeout'],
					'innerfade_type' => $_POST['innerfade_type'],
					'innerfade_type' => $_POST['innerfade_type'],
					'bxslider_original' => $_POST['bxslider_original'],
					'bxslider4_slides_min' => $_POST['bxslider4_slides_min'],
					'bxslider4_slides_max' => $_POST['bxslider4_slides_max'],
					'bxslider4_slides_margin' => $_POST['bxslider4_slides_margin'],
					'bxslider4_original' => $_POST['bxslider4_original'],
                    'bxslider4_lightbox' => $_POST['bxslider4_lightbox'],
                    'bxslider4_slides_move' => $_POST['bxslider4_slides_move'],
				));
				
				$o .= '<div class="pictures-success">' . $plugin_tx[$plugin]["Successfully saved changes."] . '</div>';
			}
			
			$array = $gallery->config();
			
			$o .= '<form action="' . $sn . '?&pictures&admin=plugin_main&gallery=' . $gallery->name() . '&action=edit" method="POST">'
					. '<div class="pictures-help">' . Pictures::$tx["See the help file for configuration options and examples."] . '</div>'
					. '<table class="pictures-table edit">';
			
			foreach ($array as $key => $value)
			{
				$o .= '<tr>'
					. '<td width="5%" valign="top">'
					. '<a class="pl_tooltip" href="#">'
					. '<img class="pictures-help-icon" src="' . Pictures::$plugin . 'images/help.png" />'
					. '<span>' . Pictures::$tx['cf_' . $key] . '</span>'
					. '</td>'
					. '<td width="30%" valign="top">'
					. $key
					. '</td>'
					. '<td width="70%"><textarea class="pictures-textarea" rows="1" style="width: 80%;" name="' . $key . '">' . $value . '</textarea></td>'
					. '</tr>'; 
			}
					
			$o .= '<tr>'
				. '<td colspan=3"><button type="submit" name="submit" class="submit pictures-submit">' . Pictures::$tx['Save'] . '</button></td>'
				. '</tr>'
				. '</table>'
				. '</form>';
		}
		
		/* Remove gallery. */
		if ($action == 'remove'
			AND $gallery !== FALSE)
		{
			/* POST? */
			if (isset($_POST['submit']))
			{
				/* Remove gallery. */
				$gallery->remove();
				unset($gallery);
				$o .= '<div class="pictures-success">' . Pictures::$tx["Successfully deleted gallery."] . '</div>';
			}
			else
			{
				$o .= '<form action="' . $sn . '?&pictures&admin=plugin_main&gallery=' . $gallery->name() . '&action=remove" method="POST">'
					. '<div class="pictures-notice">' . Pictures::$tx["Are you sure you want to delete the gallery with all its images?"] . '</div><button name="submit" type="submit" class="pictures-submit submit">' . $plugin_tx[$plugin]["I'm sure."] . '</button>'
					. '</form>';
			}
		}
		
		/* Upload new image.. */
		if ($action == 'upload')
		{
			/* POST? */
			if (isset($_POST['submit']))
			{
				if (!empty($_FILES['upload']['name']))
				{
					if ($_FILES["upload"]["error"] > 0)
					{
					    $o .= '<div class="pictures-error">' . Pictures::$tx["An error ocurred while uploading the file. Try again."] . '</div>';
					}
					else
					{
					    $filename = $_FILES['upload']['name'];
					    
					    if (isset($_POST['rename']) AND file_exists(Pictures::$images . $gallery->name() . '/' . $filename))
                        {
                            $ext = explode('.', $filename);
                            $ext = array_pop($ext);
                            
                            $name = preg_replace('#.' . $ext . '$#', '', $filename);
                            
                            $number = 1;
                            
                            $filename = $name . '_' . $number . '.' . $ext;
                            
                            while (file_exists(Pictures::$images . $gallery->name() . '/' . $filename))
                            {
                                $number++;
                                $filename = $name . '_' . $number . '.' . $ext;
                                
                                // TODO: look for possible infinite loops.
                            }
                        }
                        
						if (Pictures::valid_image($_FILES['upload']['name']))
						{
							move_uploaded_file($_FILES['upload']['tmp_name'], Pictures::$images . $gallery->name() . '/' . $filename);
					    	$o .= '<div class="pictures-success">' . Pictures::$tx["Successfully added image to gallery."] . '</div>';
						}
						else
						{
					    	$o .= '<div class="pictures-error">' . Pictures::$tx["The image does not match the requirements."] . '</div>';
						}
					}
				}
				else
				{
					$o .= '<div class="pictures-error">' . Pictures::$tx["Select an image."] . '</div>';
				}
			}
			
			$o .= '<div class="pictures-help">' . Pictures::$tx["Supported image types:"] . ' ' . Pictures::$cf['images_extensions'] . '</div>';	
			
			$o .= '<form action="' . $sn . '?&pictures&admin=plugin_main&gallery=' . $gallery->name() . '&action=upload"  enctype="multipart/form-data" method="POST">'
				. '<table class="edit pictures-table">'
				. '<tr>'
				. '<td>' . Pictures::$tx["Upload image"] . '</td>'
				. '<td><input type="file" name="upload" /></td>'
				. '<td><input type="checkbox" name="rename" /> ' . Pictures::$tx["Rename if filename already exists."] . '</td>'
				. '<td><input type="submit" class="pictures-submit" name="submit" value="' . Pictures::$tx["Upload"] . '"/></td>'
				. '</tr>'
				. '</table>'
				. '</form>';
		}

		/* Get preview of thumbnail. */
		if ($action == 'preview'
			AND $img !== FALSE)
		{
			$thumb = $img->get_thumb();
			$o .= '<div class="pictures-preview">'
				. '<img src="' . $thumb . '" />'
				. '</div>';
		}

		/* Delete image. */
		if ($action == 'delete'
			AND $img !== FALSE)
		{
			$o .= '<form action="' . $sn . '?&pictures&admin=plugin_main&gallery=' . $gallery->name() . '&action=plugin_text&img=' . $img->name() . '" method="POST">'
				. '<div class="pictures-notice">' . Pictures::$tx["Are you sure you want to delete the image?"] . '</div><button name="delete" type="submit" class="pictures-submit submit">' . $plugin_tx[$plugin]["I'm sure."] . '</button>'
				. '</form>';
		}
		
		$o .= '</p>';
	}
	
	if ($admin != 'plugin_main')
	{
		$hint = array(
			'mode_donotshowvarnames' => FALSE,
		);

		$o .= plugin_admin_common($action, $admin, $plugin, $hint);
	}
	
}

?>
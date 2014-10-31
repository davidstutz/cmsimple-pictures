<?php
/**
 * @file de.php
 * @brief Language file de.
 *
 * Pictures plugin languages/de.php
 * 
 * @author David Stutz
 * @version 1.0.0
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

	/* Plugin bar. */
	$plugin_tx["pictures"]['menu_main']="Galerien verwalten";
	
	/* Plugin titles. */
	$plugin_tx["pictures"]["title_plugin_text"]="Verwalten Sie ihre Galerien";
	$plugin_tx["pictures"]["title_new"]="Neue Galerie";
	$plugin_tx["pictures"]["title_upload"]="Bild hochladen";
	$plugin_tx["pictures"]["title_remove"]="Galerie entfernen";
	$plugin_tx["pictures"]["title_preview"]="Bildvorschau";
	$plugin_tx["pictures"]["title_delete"]="Bild löschen";
	$plugin_tx["pictures"]["title_edit"]="Einstellungen der Galerie bearbeiten";
	
	/* Plugin main. */
	$plugin_tx["pictures"]["Gallery"]="Galerie";
	$plugin_tx["pictures"]["New gallery"]="Neue Galerie";
	$plugin_tx["pictures"]["Successfully created new gallery."]="Neue Galerie erfolgreich erstellt.";
	$plugin_tx["pictures"]["Fill a valid name."]="Geben Sie einen gültigen Namen ein.";
	$plugin_tx["pictures"]["Save"]="Speichern";
	$plugin_tx["pictures"]["Name"]="Name";
	$plugin_tx["pictures"]["No galleries found. Create a new one."]="Keine Galerien gefunden. Erstellen Sie eine neue.";
	$plugin_tx["pictures"]["An error ocurred while uploading the file. Try again."]="Beim hochladen des Bildes trat ein Fehler auf. Versuchen Sie es erneut.";
	$plugin_tx["pictures"]["Successfully added image to gallery."]="Bild erfolgreich zur Galerie hinzugefügt.";
	$plugin_tx["pictures"]["The image does not match the requirements."]="Das Bild entspricht nicht den Anforderungen.";
	$plugin_tx["pictures"]["Select an image."]="Wählen Sie ein Bild aus.";
	$plugin_tx["pictures"]["Upload"]="Hochladen";
	$plugin_tx["pictures"]["Are you sure you want to delete the image?"]="Sind Sie sicher, dass Sie das Bild entfernen möchten?";
	$plugin_tx["pictures"]["Successfully deleted image."]="Bild erfolgreich entfernt.";
	$plugin_tx["pictures"]["Delete video"]="Video entfernen";
	$plugin_tx["pictures"]["I'm sure."]="Ich bin sicher.";
	$plugin_tx["pictures"]["Image"]="Bild";
	$plugin_tx["pictures"]["Successfully saved changes."]="Änderungen erfolgreich übernommen.";
	$plugin_tx["pictures"]["Description"]="Beschreibung";
	$plugin_tx["pictures"]["Remove gallery"]="Galerie entfernen";
	$plugin_tx["pictures"]["Are you sure you want to delete the gallery with all its images?"]="Sind Sie sicher, dass Sie die Galerie mit allen Bildern entfernen möchten?";
	$plugin_tx["pictures"]["Successfully deleted gallery."]="Galerie erfolgreich entfernt.";
	$plugin_tx["pictures"]["of"]="von";
	$plugin_tx["pictures"]["Regenerate thumbnails"]="Thumbnails regenerieren";
	$plugin_tx["pictures"]["Deleted thumbnail:"]="Thumbail entfernt:";
	$plugin_tx["pictures"]["Successfully regenerated thumbnails."]="Thumbnails erfolgreich regeneriert.";
	$plugin_tx["pictures"]["Gallery not found."]="Galerie nicht gefunden.";
	$plugin_tx["pictures"]["Successfully saved changes."]="Änderungen erfolgreich übernommen";
	$plugin_tx["pictures"]["Next"]="Nächstes";
	$plugin_tx["pictures"]["Previous"]="Vorheriges";
	$plugin_tx["pictures"]["See the help file for configuration options and examples."]="Sehen Sie die Hilfe für Konfigurationsoptionen und -Beispiele.";
	$plugin_tx["pictures"]["Supported image types:"]="Unterstützte Dateitypen:";
	$plugin_tx["pictures"]["The galleryname should not contain any whitespace or special characters."]="Der Name der Galerie sollte nach Möglichkeit keine Leerzeichen oder Sonderzeichen enthalten.";
	$plugin_tx["pictures"]["Gallery not found."]="Galerie nicht gefunden.";
	$plugin_tx["pictures"]["Upload image"]="Bild hochladen";
	$plugin_tx["pictures"]["Lightbox driver is not supported."] = "Lightbox driver is not supported.";
	$plugin_tx["pictures"]["next"]="Nächstes";
	$plugin_tx["pictures"]["previous"]="Vorheriges";
	$plugin_tx["pictures"]["close"]="Schließen";
	$plugin_tx["pictures"]["image {current} of {total}"]="Bild {current} von {total}";
	$plugin_tx["pictures"]["Delete the selected gallery."]="Löschen Sie die ausgewählte Galerie.";
	$plugin_tx["pictures"]["Regenerate the thumbnails of the selected gallery."]="Die Thumbnails der ausgewählten Galerie regenerieren.";
	$plugin_tx["pictures"]["Edit the settings of the selected gallery."]="Die Einstellungen der ausgewählten Galerie bearbeiten.";
	$plugin_tx["pictures"]["Add a new gallery."]="Eine neue Galerie hinzufügen.";
	$plugin_tx["pictures"]["Upload a new image to this gallery."]="Ein neues Bild hochladen.";
	$plugin_tx["pictures"]["Get a thumbnail preview of the image."]="Eine Vorschau des Thumbnails ansehen.";
	$plugin_tx["pictures"]["Delete the image."]="Das Bild löschen.";
	$plugin_tx["pictures"]["Get a thumbnail preview of the image:"]="Eine Vorschau des Thumbnails ansehen:";
	$plugin_tx["pictures"]["Delete the image:"]="Das Bild löschen:";
	$plugin_tx["pictures"]["Rename if filename already exists."]="Umbenennen, falls Dateiname schon existiert.";
	
	/* Configuration help. */
	$plugin_tx["pictures"]["cf_images_folder"]="Ordner in dem alle Galerien gespeichert werden, relativ zum Images-Verzeichnis. Alle Unterordner werden als Galerien interpretiert. Mit '/' am Ende. Zeichenkette.";
	$plugin_tx["pictures"]["cf_csv_filepath"]="Ordner in dem alle CSV-Dateien gespeichert werden, relativ zum Root-Verzeichnis. Ohne '/' am Ende. Zeichenkette.";
	$plugin_tx["pictures"]["cf_images_thumbnail_width"]="Die Breite aller Thumbnails dieser Galerie. Ganzzahl.";
    $plugin_tx["pictures"]["cf_images_thumbnail_function"]="Die Funktion um die Original-Bilder auf Thumbnail Größe zu verkleinern: 'imagecopyresampled' oder 'imagecopyresized'.";
    $plugin_tx["pictures"]["cf_images_thumbnail_compression"]="Die Kompressionsrate für die Thumbnails. Für images_thumbnail_extension='png' eine Ganzzahl zwischen 0 und 10, wobei 0 keine Kompression udn 10 die höchste Kompressionsstufe beschreibt. Mit images_thumbnail_extension='jpeg' eine Ganzzahl zwischen 0 und 100, wobei 0 die geringste Qualität (höchste Kompression) und 100 die höchste Qualität beschreibt. Normale Kompressionsstufe bei 'jpeg' ist 75.";
    $plugin_tx["pictures"]["cf_images_thumbnail_extension"]="Der Dateityp der Thumbnails. Nur 'png' und 'jpeg' werden unterstützt. Bemerkung: der Dateityp entscheidet wie cf_images_compression interpretiert wird.";
    $plugin_tx["pictures"]["cf_images_sort_function"]="Die Funktion die verwendet wird um die Bilder zu sortieren. 'pictures_sort_asc' oder 'pictures_sort_desc'.";
    $plugin_tx["pictures"]["cf_galleries_sort_function"]="Die Funktion die verwendet wird um die Gallerien zu sortieren. 'pictures_galleries_sort_asc' oder 'pictures_galleries_sort_desc'.";
	$plugin_tx["pictures"]["cf_images_extensions"]="Alle erlaubten Bild-Typen. Standard: 'jpg,jpeg,png,gif'.";
	$plugin_tx["pictures"]["cf_csv_delimiter"]="Trennzeichen zwischen einzelnen Zellen in allen CSV-Dateien. Einzelnes ACSII-Zeichen.";
	$plugin_tx["pictures"]["cf_csv_enclosure"]="Die Umhüllung der einzelnen Zellen in den CSV Dateien. Einzelner ASCII code.";
	$plugin_tx["pictures"]["cf_table_columns"]="Anzahl der Spalten für den Tabellen-Treiber. Ganzzahl.";
	
	$plugin_tx["pictures"]["cf_coinslider_width"]="Breite des Sliders. Ganzzahl.";
	$plugin_tx["pictures"]["cf_coinslider_height"]="Höhe des Sliders. Ganzzahl.";
	$plugin_tx["pictures"]["cf_coinslider_spw"]="Anzahl der Quadrate pro Breite. Ganzzahl.";
	$plugin_tx["pictures"]["cf_coinslider_sph"]="Anzahl der Quadrate pro Höhe. Ganzzahl.";
	$plugin_tx["pictures"]["cf_coinslider_delay"]="Die Verzögerung zwischen Bildern. Ganzzahl.";
	$plugin_tx["pictures"]["cf_coinslider_s_delay"]="Die Verzögerung zwischen einzelnen Quadraten. Ganzzahl.";
	$plugin_tx["pictures"]["cf_coinslider_opacity"]="Die Undurchsichtigkeit. Ein Wert zwischen 0 und 1, z.B. 0.7.";
	$plugin_tx["pictures"]["cf_coinslider_title_speed"]="Geschwindigkeit in der der Titel gezeigt wird in ms. Ganzzahl. Diese Option wird noch nicht unterstützt.";
	$plugin_tx["pictures"]["cf_coinslider_effect"]="Der benutzte Effekt. 'random', 'swirl', 'rain', 'straight' (oder leer)";
	$plugin_tx["pictures"]["cf_coinslider_navigation"]="Navigation anzeigen (Nächstes, Vorheriges, Navigation unter dem Slider). 'true' oder 'false'.";
	$plugin_tx["pictures"]["cf_coinslider_hover_pause"]="Anhalten bei mouse over. 'true' oder 'false'.";
	
	$plugin_tx["pictures"]["cf_bxslider_mode"] = "Der Modus des Sliders. 'horizontal', 'vertical' or 'fade'.";
	$plugin_tx["pictures"]["cf_bxslider_speed"] = "Die Geschwindigkeit der Übergänge in ms. Ganzzahl.";
	$plugin_tx["pictures"]["cf_bxslider_infinite_loop"] = "Benutzen SIe den Slider in unendlicher Schleife (Carousel). 'true' or 'false'.";
	$plugin_tx["pictures"]["cf_bxslider_controls"] = "Bedienelemente anzeigen (Nächstes, Verheriges). 'true' oder 'false'.";
	$plugin_tx["pictures"]["cf_bxslider_random"] = "Den Slider mit einem zufälligen Bilöd beginnen. 'true' oder 'false'.";
	$plugin_tx["pictures"]["cf_bxslider_hide_controls_on_end"] = "Verstecke Nächstes-Button beim letzten und Vorheriges-Button beim ersten Bild. 'true' oder 'false'.";
	$plugin_tx["pictures"]["cf_bxslider_auto"] = "Aktivieren/deaktivieren Sie den automatischen Slider. 'true' ode 'false'.";
	$plugin_tx["pictures"]["cf_bxslider_auto_controls"] = "Bedienelemente zum automatischen Slider anzeigen (Start, Stop). 'true' oder 'false'.";
	$plugin_tx["pictures"]["cf_bxslider_auto_delay"] = "Verzögerung zwischen Bildern beim automatischen Slider in ms. Ganzzahl.";
	$plugin_tx["pictures"]["cf_bxslider_auto_start_delay"] = "Verzägerung für den Start des automatischen Sliders. Ganzzahl.";
	$plugin_tx["pictures"]["cf_bxslider_hover_pause"] = "Slider anhalten bei Mouse-over. 'true' oder 'false'.";
	$plugin_tx["pictures"]["cf_bxslider_auto_start"] = "Automatischen Slider nach Seitenaufbau sofort starten. Ansonsten startet der Slider sobald der Start-Button benutzt wird. 'true' oder 'false'.";
	$plugin_tx["pictures"]["cf_bxslider_pager"] = "Navigation aktivieren/deaktivieren. 'true' oder 'false'.";
	$plugin_tx["pictures"]["cf_bxslider_pager_location"] = "Position der Navigation. 'top' oder 'bottom'.";
	$plugin_tx["pictures"]["cf_bxslider_quantity"] = "Die Anzahl der Bilder die auf einmal angezeigt werden. Ganzzahl.";
	$plugin_tx["pictures"]["cf_bxslider_quantity_move"] = "Die Anzahl der Bilder die auf einmal bewegt werden. Ganzzahl.";
	$plugin_tx["pictures"]["cf_lightbox_driver"] = "Die benutzte Lightbox Variante: 'lightbox', 'colorbox'.";
	$plugin_tx["pictures"]["cf_bxslider_lightbox"] = "Die Benutzung der konfigurierten Lightbox im Slider aktivieren oder deaktivieren. 'true' oder 'false'.";
    $plugin_tx["pictures"]["cf_bxslider_original"] = "'true', falls die Originalbilder anstatt den Thumbnails für den Slider benutzt werden sollen, sonst 'false'.";
	
	$plugin_tx["pictures"]["cf_lightbox_prettyphoto_theme"] = "Das Theme welches fon prettyphoto benutzt werden soll. 'pp_default', 'light_rounded', 'dark_rounded', 'light_square', 'dark_square', 'facebook'.";
	
	$plugin_tx["pictures"]["cf_innerfade_speed"] = "Die Geschwindigkeit der Übergänge in ms. Ganzzahl.";
	$plugin_tx["pictures"]["cf_innerfade_timeout"] = "Die Dauer vor dem nächsten Bildwechsel in ms. Ganzzahl.";
	$plugin_tx["pictures"]["cf_innerfade_type"] = "Der Typ: 'sequence' oder 'random'.";
    
    $plugin_tx["pictures"]["cf_bxslider4_slides_min"] = "Die minimale Anzahl an Slides im Carousel. Ganzzahl.";
    $plugin_tx["pictures"]["cf_bxslider4_slides_max"] = "Die maximale Anzahl an Slides im Carousel. Ganzzahl.";
	$plugin_tx["pictures"]["cf_bxslider4_slides_margin"] = "Der Abstand (margin) zwischen zwei Slides wenn bxSlider als Carousel genutzt wird. Ganzzahl.";
    $plugin_tx["pictures"]["cf_bxslider4_original"] = "'true', falls die Originalbilder anstatt den Thumbnails für den Slider benutzt werden sollen, sonst 'false'.";
    $plugin_tx["pictures"]["cf_bxslider4_lightbox"] = "Die Benutzung der konfigurierten Lightbox im Slider aktivieren oder deaktivieren. 'true' oder 'false'.";
    $plugin_tx["pictures"]["cf_bxslider4_slides_move"] = "Die Anzahl der Slides, die gleichzeitig bewegt werden. Ganzzahl.";

    $plugin_tx["pictures"]["cf_lightbox_prettyphoto_theme"] = "Das Theme für die PrettyPhoto Lightbox - 'pp_default', 'light_rounded', 'dark_rounded', 'light_square', 'dark_square' oder 'facebook'.";
?>

# CMSimple Pictures

CMSimple Pictures is a CMSimple plugin for creating sliders and galleries.

**For using this Plugin with the latest CMSimple XH version, a minor update is necessary, see [here](https://cmsimpleforum.com/viewtopic.php?f=16&t=12904#p61121).**

Project page: [http://davidstutz.de/cmsimple/?Pictures](http://davidstutz.de/cmsimple/?Pictures).

Documentation: [http://davidstutz.github.io/cmsimple-pictures/help/help_en.htm](http://davidstutz.github.io/cmsimple-pictures/help/help_en.htm).

**Outdated** Sourceforge project: [https://sourceforge.net/projects/cmsimplepctrs](https://sourceforge.net/projects/cmsimplepctrs).

Other CMSimple plugins:

* [CMSimple News](https://github.com/davidstutz/cmsimple-news): allows to publish and manage news - can also be used to provide blog-like functionality.
* [CMSimple Youtube](https://github.com/davidstutz/cmsimple-youtube): allows to create and manage youtube video galleries.

## Requirements & Compatibility

Requires PHP 5 or higher.

**Recommended: [CMSimple XH](http://www.cmsimple-xh.org/) 1.5 or higher!**

**Recommended: CMSimple jQuery Plugin** (included in CMSimple XH download, see [here](http://www.cmsimple-xh.org/?CMSimple_XH:Plugins)).

Supports [Hi_updatecheck](http://cmsimple.holgerirmler.de/en/?Plugins:UpdateCheck).

Also tested on:

* CMSimple XH 1.4.2 and 1.1.4.
* CMSimple Realblog 1.5 or higher.

## Changelog

### 1.0.2

* Added configuration option `images_thumbnail_function` to increase thumbnail quality.

### 1.0.1

* Minor updates, additional tests for CMSimple XH 1.6.4.

### 1.0.0

**Beta 14.**

* Update to support CMSimple XH 1.6.x.

**Beta 13.**

* Fixed version.nfo.
* Added sorting of the galleries.

**Beta 12.**

* Added bxslider version 4 driver for basic carousels (for now only with minimal configuration options).
* Updated the documentation accordingly to the new driver.
* Fixed some issues concerning the thumbnail generation.
* Added version.nfo.

**Beta 11.**

* Added configuration options to change the text displayed as next and previous button using the coinslider driver. This change required some changes on the coinslider JS.
* Updated documentation.

**Beta 10.**

* Added support for upper case extensions like PNG, JPEG, JPG or GIF.
* Added configuration option images_thumbnail_extension defining the extension of the generated thumbnails. Currently supported options are 'jpeg' and 'png'.
* Added configuration option images_sort_function defining the function to be used for sorting the images. Natively supported are 'pictures_sort_asc' and 'pictures_sort_desc'. To write your own custom sort functions see here.

**Beta 9.**

* Updated documentation and added documentation for the innerfade driver.
* Fixed bug described here: http://cmsimpleforum.com/viewtopic.php?f=5&t=5953#p34683. Again, thanks to Christoph!

**Beta 8.**

* Fixed bug described here: http://cmsimpleforum.com/viewtopic.php?f=12&t=4517&start=20#p34489. Thanks to Christoph!

**Beta 7.**

* Removed some minor issues with the lightbox configuration for the bxslider driver.

**Up to beta 6.**

* Added bxslider_original configuration key determining whether to use the original images instead of the thumbnails in the slider.
* Added images_thumbnail_compression configuration key to define compression of thumbnails.

## License

Copyright 2012 - 2014 David Stutz

The plugin is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

The plugin is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

See [http://www.gnu.org/licenses/](http://www.gnu.org/licenses/).
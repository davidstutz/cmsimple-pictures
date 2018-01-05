<?php // utf8-marker = äöü
if(!defined('CMSIMPLE_VERSION') || preg_match('/content.php/i', $_SERVER['SCRIPT_NAME']))
{
	die('No direct access');
}
?>
<h1>Overview</h1>
<p>This installation of CMSimple demonstrates a couple of CMSimple plugins using the standard template:</p>
<ul>
<li><a href="http://davidstutz.de/projects/cmsimple-plugins/" target="_blank">CMSimple News</a>, <a href="https://github.com/davidstutz/cmsimple-news" target="_blank">GitHub</a>, <a href="http://davidstutz.de/cmsimpledemo/plugins/news/help/help_en.htm" target="_blank">Documentation</a></li>
<li><a href="http://davidstutz.de/projects/cmsimple-plugins/" target="_blank">CMSimple Pictures</a>, <a href="https://github.com/davidstutz/cmsimple-pictures" target="_blank">GitHub</a>, <a href="" target="_blank">Documentation</a></li>
<li><a href="http://davidstutz.de/projects/cmsimple-plugins/" target="_blank">CMSimple Youtube</a>, <a href="" target="_blank">GitHub</a>, <a href="https://github.com/davidstutz/cmsimple-youtube" target="_blank">Documentation</a></li>
</ul>
<p>See the following subpages:</p>
<h1>News</h1>
<p class="cmsimplecore_warning">All plugin calls are wrapped in three opening and closing braces!</p>
<p>The basic plugin call <code>{plugin:news('news', 5);}</code> (with three opening and closing braces, as detailed in the <a href="" target="_blank">documentation</a>) generates the following list of (up to five) news entries:</p>
{{{plugin:news('news', 5);}}}
<h2>Newscase</h2>
<p>A newscase can be called using <code>{plugin:newscase('News', 'news', '-5 years');}</code>. It only shows news entries from the last five years:</p>
{{{plugin:newscase('News', 'news', '-5 years');}}}
<h2>Newsticker</h2>
<p>The newsticker can be called using <code>{plugin:newsticker('news', 5);}</code>:</p>
{{{plugin:newsticker('news', 5);}}}
<h2>Newsscroller</h2>
<p>The newsscroller can be called using <code>{plugin:newsscroller('news', 5);}</code>:</p>
{{{plugin:newsscroller('news', 5);}}}
<h2>Newsslider</h2>
<p>The newsslider can be called using <code>{plugin:newsslider('news', 5, TRUE);}</code>:</p>
{{{plugin:newsslider('news', 5, TRUE);}}}
<h1>Pictures</h1>
<style type="text/css">
.bx-wrapper {
    position: relative;
    margin: 0 auto 60px;
    padding: 0;
    *zoom: 1;
}
 
.bx-wrapper img {
    max-width: 100%;
    display: block;
}
 
.bx-wrapper .bx-viewport {
    -moz-box-shadow: 0 0 5px #ccc;
    -webkit-box-shadow: 0 0 5px #ccc;
    box-shadow: 0 0 5px #ccc;
    border: solid #989D9D 3px;
    left: -5px;
    background: #989D9D;
}
 
.bx-wrapper .bx-pager,
.bx-wrapper .bx-controls-auto {
    position: absolute;
    bottom: -30px;
    width: 100%;
}
 
.bx-wrapper .bx-prev {
    left: -40px;
}
 
.bx-wrapper .bx-next {
    right: -40px;
}
 
.bx-wrapper .bx-controls-direction a {
    color: #989D9D;
    position: absolute;
    top: 50%;
    margin-top: -16px;
    outline: 0;
    width: 21px;
    height: 32px;
    text-indent: -9999px;
    z-index: 9;
    border: none;
    padding: 0;
}
 
.bx-wrapper .bx-controls-direction a img {
    color: #989D9D;
    border: none !important;
    border-color: transparent;
}
 
.bx-wrapper .bx-controls-direction a.disabled {
    display: none;
}
 
.bx-wrapper .bx-caption {
    position: absolute;
    bottom: 0;
    left: 0;
    background: #666\9;
    background: rgba(80, 80, 80, 0.75);
    width: 100%;
}
 
.bx-wrapper .bx-caption span {
    color: #fff;
    font-family: Arial;
    display: block;
    font-size: .85em;
    padding: 10px;
}
</style>
<p class="cmsimplecore_warning">All plugin calls are wrapped in three opening and closing braces!</p>
<p>The pictures plugin supports a range of different gallery options including displaying images as table using <code>{PLUGIN:pictures('gallery', 'table');}</code>:</p>
<div>{{{PLUGIN:pictures('gallery', 'table');}}}</div>
<p>Or using the coinslider plugin via <code>{PLUGIN:pictures('gallery', 'coinslider');}</code>:</p>
<div>{{{PLUGIN:pictures('gallery', 'coinslider');}}}</div>
<p>Or using bxslider, <code>{PLUGIN:pictures('gallery', 'bxslider4');}</code>:</p>
<div>{{{PLUGIN:pictures('gallery', 'bxslider4');}}}</div>
<p>Note that some CSS in the template is required for the bxslider to work:</p>
<pre>
.bx-wrapper {
    position: relative;
    margin: 0 auto 60px;
    padding: 0;
    *zoom: 1;
}
 
.bx-wrapper img {
    max-width: 100%;
    display: block;
}
 
.bx-wrapper .bx-viewport {
    -moz-box-shadow: 0 0 5px #ccc;
    -webkit-box-shadow: 0 0 5px #ccc;
    box-shadow: 0 0 5px #ccc;
    border: solid #989D9D 3px;
    left: -5px;
    background: #989D9D;
}
 
.bx-wrapper .bx-pager,
.bx-wrapper .bx-controls-auto {
    position: absolute;
    bottom: -30px;
    width: 100%;
}
 
.bx-wrapper .bx-prev {
    left: -40px;
}
 
.bx-wrapper .bx-next {
    right: -40px;
}
 
.bx-wrapper .bx-controls-direction a {
    color: #989D9D;
    position: absolute;
    top: 50%;
    margin-top: -16px;
    outline: 0;
    width: 21px;
    height: 32px;
    text-indent: -9999px;
    z-index: 9;
    border: none;
    padding: 0;
}
 
.bx-wrapper .bx-controls-direction a img {
    color: #989D9D;
    border: none !important;
    border-color: transparent;
}
 
.bx-wrapper .bx-controls-direction a.disabled {
    display: none;
}
 
.bx-wrapper .bx-caption {
    position: absolute;
    bottom: 0;
    left: 0;
    background: #666\9;
    background: rgba(80, 80, 80, 0.75);
    width: 100%;
}
 
.bx-wrapper .bx-caption span {
    color: #fff;
    font-family: Arial;
    display: block;
    font-size: .85em;
    padding: 10px;
}
</pre>
<p>Images taken from the <a href="https://www2.eecs.berkeley.edu/Research/Projects/CS/vision/bsds/" target="_blank">BSDS300</a>.</p>
<h1>Youtube</h1>

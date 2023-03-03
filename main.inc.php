<?php
/*
Plugin Name: Download Formats Buttons
Version: auto
Description: Display buttons on picture page to download different formats (if enabled)
Plugin URI: https://github.com/Piwigo/Piwigo-download_formats_buttons
Author: HWFord
Author URI: https://github.com/HWFord
Has Settings: false
*/

defined('PHPWG_ROOT_PATH') or die('Hacking attempt!');

define('DWNFB_ID',      basename(dirname(__FILE__)));
define('DWNFB_PATH' ,   PHPWG_PLUGINS_PATH . DWNFB_ID . '/');
add_event_handler('loc_end_picture', 'dwnfb_loc_end_picture');

function dwnfb_loc_end_picture()
{

  global $template, $picture;

  $template->set_prefilter('picture', 'dwnfb_picture_prefilter');
  $template->set_filename('dwnfb_picture', realpath(DWNFB_PATH.'download_buttons.tpl'));
  $template->assign_var_from_handle('DWNFB_PICTURE_CONTENT', 'dwnfb_picture');
  load_language('plugin.lang', DWNFB_PATH);

}

function dwnfb_picture_prefilter($content)
{
  $search = '<div id="info-content" class="info">';
  $replace = $search.'{$DWNFB_PICTURE_CONTENT}';
  return preg_replace('/'.$search.'/s', $replace, $content);

}

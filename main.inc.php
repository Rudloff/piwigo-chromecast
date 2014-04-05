<?php
/*
Version: 0.1.1
Plugin Name: ChromeCast
Plugin URI: http://piwigo.org/ext/extension_view.php?eid=764
Author: Pierre Rudloff <contact@rudloff.pro>
Description: Cast your pictures to a ChromeCast
*/

if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');
 
add_event_handler('loc_begin_page_tail', 'cast_add_api');
function cast_add_api()
{
  global $page, $template;
  $template->append('footer_elements', '
    <script type="text/javascript" src="https://www.gstatic.com/cv/js/sender/v1/cast_sender.js"></script>
    <script src="plugins/chromecast/cast.js"></script>
  ');
}
add_event_handler('loc_begin_page_header', 'cast_add_btn');
function cast_add_btn()
{
    global $template;
    $template->add_picture_button('
    <a id="cast_btn_launch" rel="nofollow" class="pwg-state-default pwg-button" title="Cast this picture"> <span class="pwg-icon pwg-icon-cast"></span><span class="pwg-button-text">Cast</span></a>
    ', EVENT_HANDLER_PRIORITY_NEUTRAL);
    $template->append('head_elements', '
        <link rel="stylesheet" href="plugins/chromecast/style.css" />
    ');
}

?>

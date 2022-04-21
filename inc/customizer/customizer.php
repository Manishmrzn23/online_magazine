<?php

define('ONLINE_MAGAZINE_CUSTOMIZER_URL', get_template_directory_uri() . '/inc/customizer/');
define('ONLINE_MAGAZINE_CUSTOMIZER_PATH', get_template_directory() . '/inc/customizer/');

require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'customizer-custom-controls.php';
require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'custom-controls/typography/typography.php';
require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'customizer-control-sanitization.php';
require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'customizer-functions.php';
require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'customizer-fonts-icons.php';
require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'customizer-panel/register-customizer-controls.php';

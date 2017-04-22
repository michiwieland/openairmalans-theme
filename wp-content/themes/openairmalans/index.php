<?php
if (defined('ABSPATH')) {
    update_option('template', get_option('template') . '/templates');
}
die('Templates are not located here - sorry');
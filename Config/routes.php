<?php
Router::parseExtensions('rss');

Router::connect('/emails', array('plugin' => 'gtw_mailing_list', 'controller' => 'emails'));
Router::connect('/emails/:action/*', array('plugin' => 'gtw_mailing_list', 'controller' => 'emails'));

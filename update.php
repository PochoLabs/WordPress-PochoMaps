<?php
// Include our updater file
include_once( plugin_dir_path( __FILE__ ) . 'update.php');

$updater = new Smashing_Updater( __FILE__ ); // instantiate our class
$updater->set_username( 'rayman813' ); // set username
$updater->set_repository( 'smashing-plugin' ); // set repo
$updater->initialize(); // initialize the updater

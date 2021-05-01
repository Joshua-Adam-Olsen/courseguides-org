<?php

// Get URI
$request_uri = $_SERVER['REQUEST_URI'];

// include model and view
include_once('model.php');
include_once('view.php');
$model = new model();
$view  = new view();

// get model status
$status = $model->status();

$model->turn_on();

// connect db
$connection = $model->connect_db();

// get page
$view->load($connection, $request_uri);

// run
while ( "on" == $status ) {

	// update
	$model->update($connection);

}

// connect db
$model->close_db($connection);

?>

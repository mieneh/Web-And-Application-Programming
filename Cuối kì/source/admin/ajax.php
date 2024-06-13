<?php
ob_start();
$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();

if($action == "save_flight"){
	$save = $crud->save_flight();
	if($save)
		echo $save;
}

if($action == "delete_flight"){
	$save = $crud->delete_flight();
	if($save)
		echo $save;
}

//Users
if($action == 'update_user'){
	$save = $crud->update_user();
	if($save)
		echo $save;
}
if($action == 'delete_user'){
	$save = $crud->delete_user();
	if($save)
		echo $save;
}

// Booking
if($action == "update_booked"){
	$save = $crud->update_booked();
	if($save)
		echo $save;
}

if($action == "delete_booked"){
	$save = $crud->delete_booked();
	if($save)
		echo $save;
}
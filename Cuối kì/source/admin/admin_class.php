<?php
session_start();
ini_set('display_errors', 1);
Class Action {
	private $db;
	public function __construct() {
		ob_start();
   	include '../connect.php';
    
    $this->db = $conn;
	}
	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}

	function save_flight(){
		extract($_POST);
		$data = " code = '$code'";
		$data .= ", origin = '$origin'";
		$data .= ", destination = '$destination'";
		$data .= ", departure_datetime = '$departure_datetime'";
		$data .= ", arrival_datetime = '$arrival_datetime'";
		$data .= ", seats = '$seats' ";
		$data .= ", price = '$price' ";
		if(empty($id)){
			$save = $this->db->query("INSERT INTO flights set ".$data);
		}else{
			$save = $this->db->query("UPDATE flights set ".$data." where filght_id = ".$filght_id);
		}
		if($save)
			return 1;
	}
	function delete_flight(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM flights where flight_id = ".$flight_id);
		if($delete)
			return 1;
	}

	function update_user(){
		extract($_POST);
		$data = " username = '$username' ";
		$data .= ", email = '$email' ";
		$data .= ", fullname = '$fullname' ";
		$data .= ", gender = '$gender' ";
		$data .= ", phone = '$phone' ";
		$data .= ", address = '$address' ";
		$save = $this->db->query("UPDATE users set ".$data." where uid = ".$uid);
		if($save){
			return 1;
		}
	}

	function delete_user(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM users where uid = ".$uid);
		if($delete)
			return 1;
	}

	// booking
	function update_booked(){
		extract($_POST);
			$data = "  fullname = '$fullname' ";
			$data .= " , phone = '$phone' ";
			$data .= " , address = '$address' ";
			$save= $this->db->query("UPDATE booking set ".$data." where id =".$id);
		if($save)
			return 1;
	}
	
	function delete_booked(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM booking where id = ".$id);
		if($delete)
			return 1;
	}
}
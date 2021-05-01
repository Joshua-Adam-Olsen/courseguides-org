<?php

class model {

	// property declarations
    public $status = "off";

    // method declarations
    public function status() {

		return $this->status;
	}

	public function turn_on() {

		$this->status = "on";
	}

	public function turn_off() {

		$this->status = "off";
	}

	public function connect_db() {

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "cg";


		// Create connection
		$connection = new mysqli($servername, $username);

		// Check connection
		if ($connection->connect_error) {
		  die("Connection failed: " . $connection->connect_error);
		}

		// Check database
		if (empty (mysqli_fetch_array(mysqli_query($connection,"SHOW DATABASES LIKE '$dbname'")))) {
		    // Create database
			$sql = "CREATE DATABASE cg";
			if ($connection->query($sql) === TRUE) {
				echo "Database created successfully";
			} else {
				echo "Error creating database: " . $connection->error;
			}
		} else {

		}


		// Select Database
		$connection->select_db($dbname);


		// Settings Table
		if(mysqli_num_rows(mysqli_query($connection,"SHOW TABLES LIKE 'settings'"))) {

		} else {
			// sql to create table
			$sql = "CREATE TABLE settings (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			label VARCHAR(30) NOT NULL,
			value VARCHAR(30) NOT NULL,
			reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
			)";
			if ($connection->query($sql) === TRUE) {
			  echo "Table settings created successfully";
			} else {
			  echo "Error creating table: " . $connection->error;
			}
		}


		return $connection;

	}

	public function close_db($connection) {

		$connection->close();
	}

	public function update($connection) {

		$this->turn_off();
	}

}


?>

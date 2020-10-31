<?php

function connect($host = 'localhost:/tmp/mysql.sock', $username, $password, $db = null)
{
	$conn = mysqli_connect($host, $username, $password);

	// if ( !$conn ) die('Could not connect.');

	if ( $db ) {
		mysql_select_db($db, $conn);
	}

	return $conn;
}

function query($query, $conn)
{
	$results = mysqli_query($query, $conn);

	if ( $results ) {
		$rows = array();
		while($row = mysql_fetch_object($results)) {
			$rows[] = $row;
		}
		return $rows;
	}

	return false;
}

require 'functions.php';
require 'config.php';

$conn = connect($config['DB_HOST'],
				$config['DB_USERNAME'],
				$config['DB_PASSWORD'],
				'practice');

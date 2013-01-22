<?php

require "database.php";

$db = YourSiteDB::getInstance();

// Retrieving a single value
$password = $db->fetch_scalar(
	"SELECT password FROM users WHERE login = :login",
	array(
		"login" => "johndoe"
	)
);

// Retrieving a single record
$user = $db->fetch_one(
	"SELECT * FROM users WHERE login = :login",
	array(
		"login" => "johndoe"
	)
);

// Retrieving all records at once
$users = $db->fetch_all("SELECT * FROM users");

// Updating records
$number_of_hidden_documents = $db->modify(
	"UPDATE docs
	SET hidden = 1
	WHERE user = :user",

	array(
		"user" => 42
	)
);
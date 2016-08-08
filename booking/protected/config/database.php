<?php

// This is the database connection configuration.
return array(
	//'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database

	'connectionString' => 'mysql:host=localhost;dbname=rcidirect_db1',
	//'connectionString' => 'mysql:host=localhost;dbname=rcibooking_db1',
	'emulatePrepare' => true,
	/* Local database. Unused because we want to use directsales data
	'username' => 'rcclhk_db1',
	'password' => 'R!c@183890',
	*/
	//'username' => 'rcibooking_db1',
	//'password' => 'R!c@123456',
	'username' => 'rcidirect_db1',
	'password' => 'R!c@200101',
	'charset' => 'utf8',
		/**/
);
<?php

/**
 * A class file to connect to database
 */
class DB_CONNECT {

    // constructor
    function __construct() {
        // connecting to database
        $this->connect();
    }

    // destructor
    function __destruct() {
        // closing db connection
        $this->close();
    }

    /**
     * Function to connect with database
     */
    function connect() {
        // import database connection variables
		
        require_once dirname(__FILE__) . '/db_config.php';
		
        // Connecting to mysql database
        $con = mssql_connect(DB_SERVER, DB_USER, DB_PASSWORD) or die(mysql_error());
		
        // Selecing database
     
		//select a database to work with
		$selected = mssql_select_db(DB_DATABASE, $con)
        or die("Couldn't open database "); 
        // returing connection cursor
		
        return $con;
    }

    /**
     * Function to close db connection
     */
    function close() {
        // closing db connection
        mssql_close();
    }

}

?>
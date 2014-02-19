<?php
/*
 * Digital Skills Academy. WEBELEVATE 1.2 - Internet Development Assignment
 *
 * Create a cloud-based property listings website
 * with a front end and an admin back end.
 * The site is to be driven by PHP and MySQL.
 * 
 * Date: 01 January 2013
 * @author Padraic McElroy (Student ID: D11128427)
 * 
 */

/*
 * Constant below is declared in index.php
 * It prevents this file being called directly
 */
defined('MY_APP') or die('Restricted access');


$link_id=@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
if($link_id) {
	
	//echo "Successful Connection";
} else {

	echo "UnSuccessful Connection: " . DB_HOST;
	EXIT;
}

if(mysql_select_db(DB_DATABASE,$link_id)) {
	//echo "<p>Connection to database successful </p>";
} else {

	echo "<p>Connection to database failed  </p>";
}
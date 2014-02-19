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

/*
 * Declare a number of constants that you can change depending on your application
 */
// Direct link to cloud-based phpmyadmin is...
// https://cp.blacknight.com/phpmyadmin/446/index.php?db=db1095971_padraic&server=1592
// DB_HOST below doesn't seem to open in browser... so try link in above line
// Server - 172.16.3.158

define("DB_HOST","mysql1592int.cp.blacknight.com");
define("DB_USER","u1095971_padraic");
define("DB_PASSWORD","pmedsa0213");
define("DB_DATABASE","db1095971_padraic"); 

// Change to below for a Localhost setup...
/*
define("DB_HOST","localhost");
define("DB_USER","root");
define("DB_PASSWORD","");
define("DB_DATABASE","padraicmcelroy");
*/

/*
 * Declare a number of constants that you can change depending on your application
*/

define("VERSION_NUMBER","1.0");

define("COMPANY_NAME","Digital Skills Academy");

define("APPLICATION_NAME","Internet Development Assignment");

define("UPLOAD_PATH",  realpath(dirname(__FILE__)) . "\\..\\uploads\\");
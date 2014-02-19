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
 * Set up constant to ensure include files cannot be called on their own
 */
define("MY_APP", 1);
define("APPLICATION_PATH", "../application");
define("TEMPLATE_PATH", APPLICATION_PATH . "/view");

/*
 * Include the config.inc.php file
 */
include (APPLICATION_PATH . "/inc/config.inc.php");
include (APPLICATION_PATH . "/inc/db.inc.php");
include (APPLICATION_PATH . "/inc/functions.inc.php");
include (APPLICATION_PATH . "/inc/queries.inc.php");


//Very simple security check to set jsonOutput to a default 'Not authorised' if action request is not recognised
$jsonOutput = json_encode("Not Authorised");

$action = $_REQUEST['action'];

//var_dump($action); die; 
switch ($action) {

    case 'api_property_get_all_filtered':

        //var_dump($action); die;
// test test
        $type = (int) $_REQUEST['house_type'];
        $county = (int) $_REQUEST['county'];
        $pricerange = (int) $_REQUEST['pricebracket'];
        //Make the query
        $records = property_get_all_filtered($type, $county, $pricerange);
        //Encode as json

        $jsonOutput = json_encode($records);
        //print_r($records);

        break;


    case 'api_property_get_all_by_type_id':

        //var_dump($action); die;
        //Make the query
        $type = (int) $_REQUEST['house_type'];

        $records = property_get_all_by_type_id($type);

        //Encode as json
        $jsonOutput = json_encode($records);

        break;


    case 'api_property_get_all_by_county_id':

        //Make the query
        $county = (int) $_REQUEST['county'];

        $records = property_get_all_by_county_id($county);

        //Encode as json
        $jsonOutput = json_encode($records);

        break;

    case 'api_property_get_all_by_price_id':

        //Make the query
        $price = (int) $_REQUEST['pricebracket'];

        $records = property_get_all_by_price_id($price);

        //Encode as json
        $jsonOutput = json_encode($records);

        break;
}


header('Content-Type: application/json');

/* Output the JSON data */
echo $jsonOutput;

//var_dump($jsonOutput); die;
?>
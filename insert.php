<?php

session_start();

define("MY_APP", 1);
define("APPLICATION_PATH", "application");
define("TEMPLATE_PATH", APPLICATION_PATH . "/view");

include_once(APPLICATION_PATH . "/inc/session.inc.php");
include (APPLICATION_PATH . "/inc/config.inc.php");
include (APPLICATION_PATH . "/inc/db.inc.php");
include (APPLICATION_PATH . "/inc/functions.inc.php");
include (APPLICATION_PATH . "/inc/queries.inc.php");
include (APPLICATION_PATH . "/inc/ui_helpers.inc.php");


//$property = array();
$property['address1'] = "";
$property['_county_id'] = 0;
$property['_typeofhouse_id'] = 0;
$property['price'] = "";
$property['_price_id'] = 0;
$property['status'] = 0	;
$property['property_id'] = 0;

//print_r ($_POST);

if (!empty($_POST)) {

    //var_dump($_FILES);
    //die;

    $property = array();
    $property['address1'] = htmlspecialchars(strip_tags($_POST["address1"]));
    $property['_county_id'] = htmlspecialchars(strip_tags($_POST["_county_id"]));
    $property['_typeofhouse_id'] = htmlspecialchars(strip_tags($_POST["_typeofhouse_id"])); 
    $property['price'] = htmlspecialchars(strip_tags($_POST["price"]));
    $property['_price_id'] = htmlspecialchars(strip_tags($_POST["_price_id"]));
    $property['status'] = htmlspecialchars(strip_tags($_POST["status"]));
    $property['_status_id'] = htmlspecialchars(strip_tags($_POST["_status_id"]));
    $property['property_id'] = (int) $_POST["property_id"];
    
	
    
    //var_dump($property); die();
    
    
    
     $flashMessage = "";
    if (validateProperty($property)) {

       
        $property_id = $property['property_id'];

        if ($property_id == 0) {

            
            $property_id = saveProperty($property);
            
            uploadFiles($property_id);

            $flashMessage = "Record has been saved";
        } else {
            
            updateProperty($property);
           
            uploadFiles($property_id);

            header("Location: admin.php");
        }
    } 



}
?>
<?php

$activeInsert = "active";
$buttonLabel = "Insert New Property";
include (TEMPLATE_PATH . "/header.html");
include (TEMPLATE_PATH . "/form_insert.html");
include (TEMPLATE_PATH . "/footer.html");
?>
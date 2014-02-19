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

defined('MY_APP') or die('Restricted access');

function validateProperty($property) {
    return true;
}

/*
 * Query below will display list of properties on the index.php screen 
 */
function list_all_properties() {
    $sqlQuery = "SELECT property.address1, typeofhouse.house_type, property.imagefile, property.price, county.county 
    FROM property
    JOIN typeofhouse ON typeofhouse.typeofhouse_id = property._typeofhouse_id
    JOIN county ON county.county_id = property._county_id
    JOIN houseprice ON houseprice.houseprice_id = property._houseprice_id
    WHERE property.status = 'For Sale'";

    $result = mysql_query($sqlQuery);

    //var_dump($records); die();
    return $result;
}

// Function below saves a new record to the property table using MySQL
function saveProperty($property) {

    $sqlQuery = "INSERT INTO property (property_id, _typeofhouse_id, _county_id, address1, dateoflisting, price, imagefile, _houseprice_id, status)
	values ('','{$property['_typeofhouse_id']}','{$property['_county_id']}','{$property['address1']}', NOW(),'{$property['price']}','','{$property['_houseprice_id']}','{$property['status']}')";
    $result = mysql_query($sqlQuery);
    
    if (!$result) {
        echo $sqlQuery;
        die("error" . mysql_error());
    }
    return mysql_insert_id();
}

// Function below uploads a new image file
function uploadFiles($property_id) {

    if ($_FILES['uploadedfile']['name'] != '') {
        
        if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], UPLOAD_PATH . $_FILES['uploadedfile']['name'])) {

            saveImageRecord($property_id, basename($_FILES['uploadedfile']['name']));
            // See function below...
        } else {
            echo "<p>Error uploading file, please try again.";
        }
    }
}

// Function below saves image file name to the database.
    function saveImageRecord($property_id, $imageName) {
    $sqlQuery = "UPDATE property SET imagefile = '$imageName' where property_id = $property_id";
    $result = mysql_query($sqlQuery);
}

// Function below generates SQL query to update the property details in database
function updateProperty($property) {
    $propertyID = (int) $property['property_id'];
    $sqlQuery = "UPDATE property SET ";
    $sqlQuery .= " _typeofhouse_id = '" . $property['_typeofhouse_id'] . "',";
    $sqlQuery .= " _county_id = '" . $property['_county_id'] . "',";
    $sqlQuery .= " address1 = '" . $property['address1'] . "',";
    $sqlQuery .= " price = '" . $property['price'] . "', ";
    $sqlQuery .= " _houseprice_id = '" . $property['_houseprice_id'] . "', ";
    $sqlQuery .= " status = '" . $property['status'] . "'";

    $sqlQuery .= " WHERE property_id = $propertyID";

    $result = mysql_query($sqlQuery);

    if (!$result) {
        die("error" . mysql_error());
    }
}

// Function below deletes a property
function deleteProperty($id) {
    $propertyID = (int) $id;
    $sqlQuery = "DELETE FROM PROPERTY where property_id = $propertyID";

    $result = mysql_query($sqlQuery);
    if (!$result) {
        die("error" . mysql_error());
    }
}

function retrieveProperty($id) {

    $sqlQuery = "SELECT property.property_id, typeofhouse.house_type, property.address1, county.county, property.price, property.dateoflisting, property.imagefile, property._typeofhouse_id, property._county_id, property._houseprice_id, county.county, houseprice.pricebracket, property.status 
        FROM property, typeofhouse, county, houseprice 
        WHERE property._typeofhouse_id  = typeofhouse.typeofhouse_id AND property._county_id = county.county_id AND property._houseprice_id = houseprice.houseprice_id AND property_id = $id";

    $result = mysql_query($sqlQuery);

    if (!$result)
        die("error" . mysql_error());

    return mysql_fetch_assoc($result);
}

function output_edit_link($id) {
    return "<a href='edit.php?id=$id'>Edit</a>";
}

function output_delete_link($id) {
    return "<a href='delete.php?id=$id'>Delete</a>";
}

function output_selected($currentValue, $valueToMatch) {
	
	if ($currentValue == $valueToMatch) {
		return "selected ='selected'";
	}
}

// Function below authenticates login
function authenticate($username, $password) {
    $boolAuthenticated = false;

    $sqlQuery = "SELECT * from adminusers WHERE ";
    $sqlQuery .= "username = '" . $username . "'";
    $sqlQuery .= " AND ";
    $sqlQuery .= "password = '" . $password . "'";

    $result = mysql_query($sqlQuery);

    if (!$result)
        die("Error: " . $sqlQuery . mysql_error());

    if (mysql_num_rows($result) == 1) {
        $boolAuthenticated = true;
    }

    return $boolAuthenticated;
}
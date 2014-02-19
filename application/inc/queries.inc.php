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
 * Function below passes values for dropdown menus on index page
 * for house type, county and price bracket 
 */

function property_get_all_filtered($housetype, $county, $pricerange) {

    $sqlQuery = "SELECT property.address1, typeofhouse.house_type, property.imagefile, property.price, county.county FROM property
    JOIN typeofhouse on typeofhouse.typeofhouse_id = property._typeofhouse_id and property._typeofhouse_id = $housetype
    JOIN county on county.county_id = property._county_id and property._county_id = $county
    JOIN houseprice on houseprice.houseprice_id = property._houseprice_id and property._houseprice_id = $pricerange
    WHERE property.status = 'For Sale'";

    $result = mysql_query($sqlQuery);
    $records = array();

    if ($result) {
        while ($records [] = mysql_fetch_assoc($result));

        array_pop($records);
    }
    
    return $records;
}

function property_get_all_by_type_id($housetype) {

    $sqlQuery = "SELECT property.address1, typeofhouse.house_type, property.imagefile, property.price, county.county FROM property
    JOIN typeofhouse on typeofhouse.typeofhouse_id = property._typeofhouse_id and property._typeofhouse_id = $housetype
    JOIN county on county.county_id = property._county_id 
    JOIN houseprice on houseprice.houseprice_id = property._houseprice_id
    WHERE property.status = 'For Sale'";

    $result = mysql_query($sqlQuery);
    $records = array();

    if ($result) {
        while ($records [] = mysql_fetch_assoc($result));

        array_pop($records);
    }
    return $records;
}

function property_get_all_by_county_id($county) {

    $sqlQuery = "SELECT property.address1, typeofhouse.house_type, property.imagefile, property.price, county.county FROM property
    JOIN typeofhouse on typeofhouse.typeofhouse_id = property._typeofhouse_id 
    JOIN county on county.county_id = property._county_id and property._county_id = $county
    JOIN houseprice on houseprice.houseprice_id = property._houseprice_id
    WHERE property.status = 'For Sale'";

    $result = mysql_query($sqlQuery);
    $records = array();

    if ($result) {
        while ($records [] = mysql_fetch_assoc($result));

        array_pop($records);
    }
    return $records;
}

function property_get_all_by_price_id($pricerange) {

    $sqlQuery = "SELECT property.address1, typeofhouse.house_type, property.imagefile, property.price, county.county FROM property
    JOIN typeofhouse on typeofhouse.typeofhouse_id = property._typeofhouse_id
    JOIN county on county.county_id = property._county_id
    JOIN houseprice on houseprice.houseprice_id = property._houseprice_id and property._houseprice_id = $pricerange
    WHERE property.status = 'For Sale'";

    $result = mysql_query($sqlQuery);
    $records = array();

    if ($result) {
        while ($records [] = mysql_fetch_assoc($result));

        array_pop($records); 
    }

    return $records;
}

function properties_get_all() {

    $sqlQuery = "SELECT * FROM typeofhouse where 1 order by typeofhouse_id asc";
    $result = mysql_query($sqlQuery);
    $records = array();

    if ($result) {
        while ($records [] = mysql_fetch_assoc($result));

        array_pop($records);
    }
    return $records;
}

// Function below displays all counties in the drop down menu
function counties_get_all() {

    //sql query to get all results from the county table
    $sqlQuery = "SELECT * FROM county where 1 order by county_id asc";
    $result = mysql_query($sqlQuery);
    $records = array();

    if ($result) {
        while ($records [] = mysql_fetch_assoc($result));

        array_pop($records);
    }
    return $records;
}

// Function below displays all price ranges in the drop down menu
function prices_get_all() {

    $sqlQuery = "SELECT * FROM houseprice where 1 order by houseprice_id asc";
    $result = mysql_query($sqlQuery);
    $records = array();

    if ($result) {
        while ($records [] = mysql_fetch_assoc($result));

        array_pop($records);
    }
    return $records;
}


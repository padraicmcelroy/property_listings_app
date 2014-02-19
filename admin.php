<?php
session_start();

/*
 * Set up constant to ensure include files cannot be called on their own
*/
define ( "MY_APP", 1 );
/*
 * Set up a constant to your main application path
 */
define ( "APPLICATION_PATH", "application" );
define ( "TEMPLATE_PATH", APPLICATION_PATH . "/view" );

include_once(APPLICATION_PATH . "/inc/session.inc.php");


/*
 * Include the config.inc.php file
 */
include (APPLICATION_PATH . "/inc/config.inc.php");
include (APPLICATION_PATH . "/inc/db.inc.php");
include (APPLICATION_PATH . "/inc/functions.inc.php");

//Set up variable so 'active' class set on navbar link
$activeHome = "active";

include (TEMPLATE_PATH . "/header.html");

?>
<div class="container">
<div class="row">
<div class="span12">
<h1>Administration</h1>
<p>Update the listings</p>
</div>
</div>
<div clas="row">
<div class="span9">

<?php
            $sqlQuery = "SELECT property.property_id, typeofhouse.house_type, property.address1, county.county, property.price, property.dateoflisting, property.imagefile, property._typeofhouse_id, property._county_id,property._houseprice_id, county.county, houseprice.pricebracket, property.status
    FROM property, typeofhouse, county, houseprice 
    WHERE property._typeofhouse_id  = typeofhouse.typeofhouse_id AND property._county_id = county.county_id AND property._houseprice_id = houseprice.houseprice_id";
            $result = mysql_query($sqlQuery);

            if ($result) {
                $htmlString = "";
                $htmlString .= "<table class='table table-bordered table-condensed table-striped' border='1'>\n";

                $htmlString .= "<tr>";
                $htmlString .= "<th>ID</th>";
                $htmlString .= "<th>House Type</th>";
                $htmlString .= "<th>Address</th>";
                $htmlString .= "<th>County</th>";
                $htmlString .= "<th>Picture</th>";
                $htmlString .= "<th>Price</th>";
                $htmlString .= "<th>Price Range</th>";
                $htmlString .= "<th>Date Created</th>";
                $htmlString .= "<th>Sale Status</th>";
                $htmlString .= "<th colspan='2'>Actions</th>";

                $htmlString .= "</tr>";

                while ($property = mysql_fetch_assoc($result)) {

                    $htmlString .= "<tr>";
                    $htmlString .= "<td>";
                    $htmlString .= $property["property_id"];
                    $htmlString .= "</td>";
                    $htmlString .= "<td>";
                    $htmlString .= $property["house_type"];
                    $htmlString .= "</td>";
                    $htmlString .= "<td>";
                    $htmlString .= $property["address1"];
                    $htmlString .= "</td>";
                    $htmlString .= "<td>";
                    $htmlString .= $property["countyname"];
                    $htmlString .= "</td>";
                    $htmlString .= "<td>";

                    if ($property["imagefile"] != '') {
                        if (($property["status"] == 'Sale Agreed') || ($property["salestatus"] == 'sale agreed')) {
                            $htmlString .= "<img src='uploads/sold{$property["imagefile"]}' class='property'>";
                        } else {
                            $htmlString .= "<img src='uploads/{$property["imagefile"]}' class='property'>";
                        }
                    }

                    $htmlString .= "</td>";
                    $htmlString .= "<td>";
                    $htmlString .= $property["price"];
                    $htmlString .= "</td>";
                    $htmlString .= "<td>";
                    $htmlString .= $property["pricebracket"];
                    $htmlString .= "</td>";
                    $htmlString .= "<td>";
                    $htmlString .= $property["dateoflisting"];
                    $htmlString .= "</td>";
                    $htmlString .= "<td>";
                    $htmlString .= $property["status"];
                    $htmlString .= "</td>";
                    $htmlString .= "<td>";
                    $htmlString .= output_edit_link($property["property_id"]);
                    $htmlString .= "</td>";

                    $htmlString .= "<td>";
                    $htmlString .= output_delete_link($property["property_id"]);
                    $htmlString .= "</td>";

                    $htmlString .= "</tr>\n";
                }
                $htmlString .= "</table>\n";

                echo $htmlString;
            } else {

                die("Failure: " . mysql_error($link_id));
            }
            ?>
    
</div> <!-- end of #span9 -->
<div class="span3"></div>

</div>


</div> <!-- end of #container -->
<?php 
include (TEMPLATE_PATH . "/footer.html");
?>

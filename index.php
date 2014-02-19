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

// Set up constant to ensure include files cannot be called on their own
define("MY_APP", 1);
/*
 * Set up a constant to your main application path
 */
define("APPLICATION_PATH", "application");
define("TEMPLATE_PATH", APPLICATION_PATH . "/view");

/*
 * Include the config.inc.php file
*/

include (APPLICATION_PATH . "/inc/config.inc.php");
include (APPLICATION_PATH . "/inc/db.inc.php");
include (APPLICATION_PATH . "/inc/functions.inc.php");
include (APPLICATION_PATH . "/inc/queries.inc.php");
include (APPLICATION_PATH . "/inc/ui_helpers.inc.php");

//Set up variable so 'active' class set on navbar link
$activeHome = "active";

include (TEMPLATE_PATH . "/public/header.html");

?>


<div class="container">
	<div class="row">
		<div class="span12">
			<h1>MyNewHome.ie</h1>
			<p>You'd be <i>daft</i> not to use this property website!</p>
		</div>
	</div>

    <?php
    
    // List all the properties
    $propertyList = list_all_properties();

    // Create filtered list, break down by house type, price, location 
    $records = properties_get_all();
    $arrayItemsHouse = array();
    $count = sizeof($records);

    for ($i = 0; $i < $count; $i++) {

        $arrayItemsHouse[$i]["label"] = $records[$i]['house_type'];
        $arrayItemsHouse[$i]["id"] = $records[$i]['typeofhouse_id'];
    }


    $records = counties_get_all();
    $arrayItemsCounty = array();
    $count = sizeof($records);

    for ($i = 0; $i < $count; $i++) {

        $arrayItemsCounty[$i]["label"] = $records[$i]['county'];
        $arrayItemsCounty[$i]["id"] = $records[$i]['county_id'];
    }


    $records = prices_get_all();
    $arrayItemsPrice = array();
    $count = sizeof($records);

    for ($i = 0; $i < $count; $i++) {

        $arrayItemsPrice[$i]["label"] = $records[$i]['pricebracket'];
        $arrayItemsPrice[$i]["id"] = $records[$i]['houseprice_id'];
    }

    echo "<hr />";
    ?>

    <div class="row">

        <?
        echo "<form>";
        echo "<div class='span3'>";
        echo uihelperSelect('typeofhouse_id', $arrayItemsHouse);
        echo "</div>";
        echo "<div class='span3'>";
        echo uihelperSelect('county_id', $arrayItemsCounty);
        echo "</div>";
        echo "<div class='span3'>";
        echo uihelperSelect('houseprice_id', $arrayItemsPrice);
        echo "</div>";
        echo "</form>";
        ?>
        <div class="span3">
            <button class="btn btn-info" id="btnFilter"><strong>Filter By All</strong></button>
        </div>


    </div>
    <div class="row">
        <div class="span3">
            <button class="btn btn-info" id="btnFilterType">Filter by house type</button>

            <p></p>

        </div>
        <div class="span3">
            <button class="btn btn-info" id="btnFilterCounty">Filter by County</button>
            <p></p>

        </div>
        <div class="span3">
            <button class="btn btn-info" id="btnFilterPrice">Filter by price</button>
            <p></p>

        </div>
    </div>

    <br />
    <div class="row">
        <div class="span12">

            <div id="ajaxContent1" class="ajaxContent">


                <?
                if ($propertyList) {
                    $htmlString = "";

                    while ($property = mysql_fetch_assoc($propertyList)) {

                        $htmlString .= "<div class='row-fluid'>";
                        $htmlString .= "<div class='span4'>";
                        $htmlString .= "<p>";
                        $htmlString .= "<img src='uploads/{$property["imagefile"]}' class='property'>";
                        $htmlString .= "</p>";
                        $htmlString .= "</div>";
                        $htmlString .= "<div class='span8'>";
                        $htmlString .= "<p>";
                        $htmlString .= "<strong>";
                        $htmlString .= "Address: ";
                        $htmlString .= "</strong>";
                        $htmlString .= $property["address1"] . ", Co. " . $property["county"];
                        $htmlString .= ".</p>";
                        $htmlString .= "<p>";
                        $htmlString .= "<strong>";
                        $htmlString .= "Price: ";
                        $htmlString .= "</strong>";
                        $htmlString .= $property["price"];
                        $htmlString .= " Euro</p>";
                        $htmlString .= "<p>";
                        $htmlString .= "<strong>";
                        $htmlString .= "House Type: ";
                        $htmlString .= "</strong>";
                        $htmlString .= $property["house_type"];
                        $htmlString .= "</p>";
                        $htmlString .= "</div>";

                        $htmlString .= "</div>";
                        $htmlString .= "<hr />";
                    }

                    echo $htmlString;
                } else {

                    die("Failure: " . mysql_error($link_id));
                }
                ?>

            </div> <!-- end of #ajaxContent1 div --> 

        </div><!-- end of #span12 div --> 

    </div><!-- end of #row div --> 

</div> <!-- end of #container div --> 

<?php include (TEMPLATE_PATH . "/public/footer.html"); ?>
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

function uihelperSelect($selectID, $arrayItems, $selectedItem = "") {
	

	$htmlString = "<select id='$selectID' name='$selectID'>";
	foreach($arrayItems as $option) {
		
		$optionLabel = $option["label"];
		$optionID = $option["id"];
		
		$selected = $optionID == $selectedItem ? " selected " : "";
		
		
		$htmlString .= "<option value='$optionID' $selected>$optionLabel</option>";
	
	}
	
	$htmlString .= "</select>";
	
	return $htmlString;
}
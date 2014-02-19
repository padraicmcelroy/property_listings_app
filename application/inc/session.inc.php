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
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != 1) {

header("Location: index.php");

}

?>

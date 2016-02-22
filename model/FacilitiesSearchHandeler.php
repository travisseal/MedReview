<?php
/**
 * Created by IntelliJ IDEA.
 * User: tseal
 * Date: 2/20/16
 * Time: 12:51 AM
 *
 * Obective: This is the handler for the Facility description search
 *
 */


require('../controller/FacilitiesSearchController.php');

if(isset($_GET['term']))
{
    echo json_encode(FacilitiesSearchController::getTerm());
    flush();
}
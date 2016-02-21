<?php
/**
 * Created by IntelliJ IDEA.
 * User: tseal
 * Date: 2/20/16
 * Time: 12:51 AM
 */


require('../controller/FacilitiesSearchController.php');

if(isset($_GET['term']))
{
    $controller = new FacilitiesSearchController();
    echo json_encode($controller->getTerm());
    flush();

}
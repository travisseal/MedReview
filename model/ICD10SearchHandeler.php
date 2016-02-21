<?php
/**
 * Created by IntelliJ IDEA.
 * User: tseal
 * Date: 2/19/16
 * Time: 11:47 PM
 */

require('../controller/ICD10SearchController.php');

if(isset($_GET['term']))
{
    $controller = new ICD10SearchController();
    $controller->getTerm();
    echo json_encode($controller->getTerm());
    flush();

}
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

    echo json_encode(ICD10SearchController::getTerm());
    flush();

}
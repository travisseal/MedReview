<?php
/**
 * Created by IntelliJ IDEA.
 * User: tseal
 * Date: 2/19/16
 * Time: 11:47 PM
 */

require('../model/ICD10ConnectionModel.php');

if(isset($_GET['term']))
{

    $controller = new ICD10SearchModel();

    echo json_encode($controller->getTerm());
    flush();

}
<?php
/**
 * Created by IntelliJ IDEA.
 * User: tseal
 * Date: 2/21/16
 * Time: 5:08 PM
 */
require('../controller/ZipcodeConnectionController.php');

if(isset($_GET['term']))
{

    echo json_encode(ZipcodeConnectionController::getTerm());
    flush();

}

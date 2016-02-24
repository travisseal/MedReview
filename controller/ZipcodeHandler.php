<?php
/**
 * Created by IntelliJ IDEA.
 * User: tseal
 * Date: 2/21/16
 * Time: 5:08 PM
 *
 * Objective: index.html calls this script in order to call into existence the zipcode model
 * output: sends Json data back to the view for user presentation
 *
 */
require('../model/ZipcodeConnectionModel.php');

if(isset($_GET['term']))
{

    $controller = new ZipcodeConnectionModel();

    echo json_encode($controller->getTerm());
    flush();

}

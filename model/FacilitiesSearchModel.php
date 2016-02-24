<?php
/**
 * Created by IntelliJ IDEA.
 * User: tseal
 * Date: 2/22/16
 * Time: 3:09 PM
 *
 * Objective: Class outlines the data we are looking for in the database. It calls its parent class method getTerm
 * that makes the module query the database for the information as defined by 'term', then returns it to the calling
 * script (handler)
 *
 */

require "../model/BaseModel.php";

class FacilitiesSearchModel extends BaseModel
{
    public function getTerm()
    {
        $this->selectValue = "ProviderName";
        $this->tableName = "medreview.facilities";
        $this->filter = $_GET['term'];

        return parent::getTerm();
    }

}
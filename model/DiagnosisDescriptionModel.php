<?php
/**
 * Created by IntelliJ IDEA.
 * User: tseal
 * Date: 2/22/16
 * Time: 3:24 PM
 */

require "../model/BaseModel.php";

class DiagnosisDescriptionModel extends BaseModel
{
    public function getTerm()
    {
        $this->selectValue = "Description";
        $this->tableName = "medreview.icd_10_procedures2";
        $this->filter = $_GET['term'];

        return parent::getTerm();
    }

}
